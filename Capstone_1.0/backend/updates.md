# BACKEND NOTES THUSFAR March-19:

# backend tech:
    - JavaScript
        backend lang

    - node.js
        backend runtime environment

    - express.js
        server framework

# package.json
    - this is a json file that contains all the dependencis for the backend
    - when run, it should install all dependencies required to run the backend
    - it should be able to be run from the terminal using "npm install"
    - NOTE: node and angular require the same dependencies

# server.js
    - server.js is essentially the "main" file:
        It will contain all the logic for sorting through information 
        that was gathered from the database.
        It also essentially "listens" for http requests to execute.
        These http requests will be separated into different files.

# httpsRequests:
    - a folder that will contain all httpsrequests
    - https requests will be subdivided into post and get
    - post will put information in the database
    - get will pull from the database
    - userCardRequests is an example of a reauest/get

# userCardRequests.js
    - serverCardrequests.js contains/ will contain all http requests that relate to posts.
        This file will manage pulling information regarding the posts (or cards) from the database

# TODO:
    - use https get requests made by the frontend to the backend to pull from the database
    - use https post requests made by the frontend to the backend to post/save to the database
    - ADD: more files for the different kinds of httpsrequests





        
        