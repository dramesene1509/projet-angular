const express = require ('express')
const bodyParser = require('body-parser')
 
const PORT = 8000
const app = express() 
const api = require ('.routes/api')
app.use(cors())


app.use(bodyParser.json()) 

app.use('/api',api)