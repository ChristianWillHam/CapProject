// Run server by running 'npm start' in terinal where server.js exists (same path)


var express = require('express'),
  app = express(),
  port = 8080;

var sql = require('mysql');
var database = sql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "website"
});

database.connect(function(err) {
  if (err) throw err;
  console.log("Connected to database!");
});

// Include http requests for handling cards
require('./httpsRequests/userCardRequests')(app, database)

// app.use(bodyParser.urlencoded({ extended: true }));
// app.use(bodyParser.json());

// logic here to get user card requests
//       essentially - transfer card request data here. 
//       userCardRequests handles all HTTP request for user cards
//       server.js is the entry point for the backend app
//       server.js is BASICALLY the "main" and 
//       the server.js is the "listener" and user card requests is what is being listed for

  
  // POST method route
app.post('/testPostCommand', function (req, res) {
    res.send('POST request to the homepage')
  })


app.listen(port);

console.log('RESTful API server started on: ' + port);