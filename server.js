const express = require("express");

const mysql = require("mysql2");

const cors = require("cors");

const app = express();

/* MIDDLEWARE */

app.use(cors());

app.use(express.json());

/* MYSQL CONNECTION */

const db = mysql.createConnection({

    host:"localhost",

    user:"root",

    password:"1234",

    database:"pankajdb",

    port:3306

});

/* CONNECT MYSQL */

db.connect((err)=>{

    if(err){

        console.log("Database Error");

        console.log(err);

    }

    else{

        console.log("MySQL Connected");

    }

});

/* SIGNUP API */

app.post("/signup",(req,res)=>{

    const {name,email,password} = req.body;

    const sql =
    "INSERT INTO users(name,email,password) VALUES(?,?,?)";

    db.query(sql,[name,email,password],(err,result)=>{

        if(err){

            console.log(err);

            res.send("Error Saving Data");

        }

        else{

            res.send("Signup Successful");

        }

    });

});

/* SERVER */

app.listen(5000,()=>{

    console.log("Server Running On Port 5000");

});