var express = require('express');
const mongoose = require('mongoose');
const bodyparser= require('body-parser');
const { urlencoded } = require('body-parser');

const app = express();

app.use(express.static('public'));
app.use(bodyparser.json());
app.use(urlencoded({
    extended:true
}));

mongoose.connect('mongodb://localhost:27017/bharathdb');

var db =mongoose.connection;

app.get('/',(req,res)=>{
    res.sendFile(__dirname+'index.html');
    
})
app.get('/names',(req,res)=>{
    db.collection('dummy').find({}).toArray((err,result)=>res.send(result));
})

app.post('/add',(req,res)=>{
    var name = req.body.name;
    var number = req.body.number;
    var password = req.body.password;

    var data={
        "name":name,
        "number":number,
        "password":password
    }

    db.collection('dummy').insertOne(data,(err,collection)=>{
        if(err){
            throw err;
        }console.log("plan success")
    })
    return res.end("success")
})

app.listen(3000);