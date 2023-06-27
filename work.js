var express = require("express")
var bodyParser = require("body-parser")
var mongoose = require("mongoose")

const app = express()

app.use(bodyParser.json())
app.use(express.static('public'))
app.use(bodyParser.urlencoded({
    extended: true
}))

mongoose.connect('mongodb://localhost:27017/Order', {
    useNewUrlParser: true,
    useUnifiedTopology: true
});

var db = mongoose.connection;
// ---------------
const MongoClient = require('mongodb').MongoClient;
const uri = 'mongodb+srv://<username>:<password>@<cluster>.mongodb.net/<database>?retryWrites=true&w=majority';

MongoClient.connect(uri, { useNewUrlParser: true, useUnifiedTopology: true })
    .then(client => {
        const db = client.db('<database>');
        console.log('Connected to MongoDB');
    })
    .catch(error => console.error(error));


const multer = require('multer');
const upload = multer({ dest: 'uploads/' });

app.post('/upload', upload.single('image'), (req, res) => {
    const { username, age } = req.body;
    const image = req.file.filename;

    db.collection('users').insertOne({ username, age, image })
        .then(result => {
            console.log(result);
            res.redirect('/');
        })
        .catch(error => console.error(error));
});

app.get('/', (req, res) => {
    db.collection('users').find().toArray()
        .then(users => {
            res.render('index.ejs', { users });
        })
        .catch(error => console.error(error));
});
