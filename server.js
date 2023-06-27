const express = require('express');
const multer = require('multer');
const { MongoClient } = require('mongodb');
const { v4: uuidv4 } = require('uuid');

const app = express();
const port = 3000;

const storage = multer.diskStorage({
    destination: function (req, file, cb) {
        cb(null, 'uploads/');
    },
    filename: function (req, file, cb) {
        const ext = file.originalname.split('.').pop();
        const filename = `${uuidv4()}.${ext}`;
        cb(null, filename);
    }
});

const upload = multer({ storage: storage });

const uri = 'mongodb://localhost:27017';
const client = new MongoClient(uri);

app.use(express.urlencoded({ extended: true }));
app.use(express.static('public'));
app.set('view engine', 'ejs');

app.get('/', (req, res) => {
    res.render('index');
});

app.post('/submit-user-data', upload.single('image'), async (req, res) => {
    const { username, age } = req.body;
    const imagePath = req.file.path;

    try {
        await client.connect();
        const database = client.db('mydatabase');
        const collection = database.collection('users');
        const result = await collection.insertOne({ username, age, imagePath });
        console.log(`Inserted ${result.insertedCount} documents into the users collection`);
        res.redirect('/');
    } catch (err) {
        console.error(err);
        res.status(500).send('Error submitting user data');
    }
});

app.get('/users', async (req, res) => {
    try {
        await client.connect();
        const database = client.db('mydatabase');
        const collection = database.collection('users');
        const users = await collection.find().toArray();
        res.render('users', { users });
    } catch (err) {
        console.error(err);
        res.status(500).send('Error fetching users');
    }
});

app.listen(port, () => {
    console.log(`App listening at http://localhost:${port}`);
});
