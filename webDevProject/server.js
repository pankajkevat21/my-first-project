const express = require("express");
const cors = require("cors");
const mysql = require("mysql2");

const app = express();

app.use(cors());
app.use(express.json());

/* MySQL Connection */

const db = mysql.createConnection({

    host: "localhost",

    user: "root",

    password: "1234",

    database: "signupdb"

});

/* Connect */

db.connect((err)=>{

    if(err){

        console.log(err);

    }
    else{

        console.log("MySQL Connected");

    }

});

/* Signup API */

app.post("/signup",(req,res)=>{

    const {name,email,password} = req.body;

    const sql =
    "INSERT INTO users(name,email,password) VALUES(?,?,?)";

    db.query(
        sql,
        [name,email,password],
        (err,result)=>{

            if(err){

                console.log(err);

                res.send("Error");

            }
            else{

                res.send("Signup Successful");

            }

        }
    );

});

app.listen(5000,()=>{

    console.log("Server Started");

});