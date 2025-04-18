const express = require('express');
const mysql = require('mysql');

const app = express();
const port = 3000;

app.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html'); // Serve the HTML file
});



// Middleware to parse form data
app.use(express.urlencoded({ extended: true }));

// MySQL connection
const connection = mysql.createConnection({
    host: 'localhost', // Replace with your database host
    user: 'root',      // Replace with your database username
    password: '',      // Replace with your database password
    database: 'data'   // Replace with your database name
});

connection.connect((err) => {
    if (err) {
        console.error('Error connecting to the database:', err.stack);
        return;
    }
    console.log('Connected to the database');
});

// Handle form submission
app.post('/register', (req, res) => {
    const { password } = req.body;

    const query = 'INSERT INTO users (password) VALUES (?)';
    connection.query(query, [password], (err, results) => {
        if (err) {
            console.error('Error inserting data:', err);
            res.status(500).send('Error saving data');
            return;
        }
       
    });
});

// Handle login
app.post('/login', (req, res) => {
    const { password } = req.body;

    const query = 'SELECT * FROM users WHERE password = ?';
    connection.query(query, [password], (err, results) => {
        if (err) {
            console.error('Error querying data:', err);
            res.status(500).send('Error during login');
            return;
        }

        if (results.length > 0) {
            res.send('Login successful');
        } else {
            res.status(401).send('Invalid password');
        }
    });
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
