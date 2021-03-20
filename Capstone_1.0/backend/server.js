// Run server by running 'npm start' in terinal where server.js exists (same path)


var express = require('express'),
  app = express(),
  port = 8080;

var sql = require('sql')

// app.use(bodyParser.urlencoded({ extended: true }));
// app.use(bodyParser.json());

// logic here to get user card requests
//       essentially - transfer card request data here. 
//       userCardRequests handles all HTTP request for user cards
//       server.js is the entry point for the backend app
//       server.js is BASICALLY the "main" and 
//       the server.js is the "listener" and user card requests is what is being listed for

// GET method route
var defaultNumberOfPostsToReturn = 10
app.get('/api/v1/getPosts', function (req, res) {
    // REQ passes params 
    // TODO:
    // CALL ANOTHER FUNCTION HERE TO RETRIEVE DATA FROM SQL DATABASE
    var numberOfPosts = req.query.numberOfPosts
    console.log(numberOfPosts)

    if (numberOfPosts === undefined) {
        // If you do not pass in numberOfPosts in the http request,
        // then set the numberOfPosts to the defaultNumberOfPosts
        numberOfPosts = defaultNumberOfPostsToReturn
    }

    // Quary the database here using SQL and the SQL module


    // anything in beliow line is RETURNED to the site 
    res.send('TODO: Code this request/function/method to return x number of posts to the database' + numberOfPosts)
  })
  
  // POST method route
app.post('/testPostCommand', function (req, res) {
    res.send('POST request to the homepage')
  })


app.listen(port);

console.log('RESTful API server started on: ' + port);