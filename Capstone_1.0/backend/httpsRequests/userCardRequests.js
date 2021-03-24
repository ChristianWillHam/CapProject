
// This file will handle all requests related to posts and cards in the social media application.

// this file handles all communication between the front-end and back-end regarding post requests.

// app is defined in server.js, hence we need to require()(app) in server.js to have these wor
module.exports = function(app, database){

    var defaultNumberOfPostsToReturn = 10
    
    // THIS WILL BE THE SSTRUCTURE FOR ALL REQUESTS
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

        // Below is just for testing.

        // Make Database Call
        // THIS IS AN A-SYNCHRONOUS FUNCTION (PUT ON RESUME)
        // starting with database.query(sql....) this code will finish execution AFTER function queryCardTable
        // looking like the code does not return anything 
        // EX: if a variable R = 1 is defined HERE, and we test for the result after the whole function is run,
        //     then it will return R = 1 even if R is updated to "x" in the anonymous function.
        //
        //          This is powerful because large scale applications execute things in sequence

        var sql = "SELECT * FROM post" // Will want to change this later so you can use numberOfPosts to only return the number of posts
        database.query(sql, function (err, result) {
            if (err) throw err
            // here is error handling if query is wrong or database connections are messed up
            // can have additional things happen "on error" here
            
            // sends to front end in this manner 
            res.send(result)
        });

    })
    // All routes in this scope.
    // More routes here..
}

// GET method route


// var defaultNumberOfPostsToReturn = 10
// // Pass in numberOfPosts in URL (from front-end by using '?')
// // I.e http://localhost/api/v1/getPosts?numberOfPosts=5&onlyDescription=false

// app.get('/api/v1/getPosts', function (req, res) {
//     // REQ passes params 
//     // TODO:
//     // CALL ANOTHER FUNCTION HERE TO RETRIEVE DATA FROM SQL DATABASE

//     // I.e http://localhost/api/v1/getPosts?NUMBEROFPOSTS look below
//     var numberOfPosts = req.query.numberOfPosts
//     console.log(numberOfPosts)
//     // CONSOLE>LOG EVERYTHING
//     // logs whats going on and maybe even errors to the console
//     // does not effect the frontend

//     // Quary the database here using SQL and the SQL module
    

//     // anything in beliow line is RETURNED to the site 
//     res.send('TODO: Code this request/function/method to return x number of posts to the database' + numberOfPosts)

//     // If you call the function getPostsFromSQLDatabase then all you need in this function is the following, belw
//     var numberOfPosts = req.query.numberOfPosts

//     res.send(getPostsFromSQLDatabase(numberOfPosts))
//   })


  /** 
// LOOK UP RIGHT WAY TO MAKE A FUNCTION IN JAVASCRIPT, belw could be wrong.
function getPostsFromSQLDatabase(numberOfPosts = undefined) {
    var defaultNumberOfPostsToReturn = 10
    posts = undefined

        var numberOfPosts = req.query.numberOfPosts
    console.log(numberOfPosts)
    
    if (numberOfPosts === undefined) {
        // If you do not pass in numberOfPosts in the http request,
        // then set the numberOfPosts to the defaultNumberOfPosts
        numberOfPosts = defaultNumberOfPostsToReturn
    } 

    // Make call fromSQL here 
    // posts = FUNCTION from SQL here

    return posts
}

*/