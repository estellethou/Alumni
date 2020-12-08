const express = require('express')
const serveStatic = require('serve-static')
const path = require ('path')
//To solve Heroku pb with direct URL access
var history = require('connect-history-api-fallback');

const app= express()

//To solve Heroku pb with direct URL access
app.use(history({
    // verbose: true
    }));

//serves files from our dist directory which now contains out index.html file  
app.use('/', serveStatic(path.join(__dirname, '/dist')))

const port = process.env.PORT || 8080
app.listen(port)

console.log('Listening on port: ' + port)