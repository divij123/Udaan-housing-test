

live link = http://srmkzilla.net/udaan_divij/index.html


# Udaan Housing Test

This application is fully API Driven and will help you organize your team and can be viewed live [click](http://srmkzilla.net/udaan_divij/index.html)

## Tech Stack

Frontend - HTML5 , CSS , JS , JQUERY
Backend - PHP , MYSQL

Install [xampp](https://www.apachefriends.org/download.html)


install xampp/wampp and import the SQL file.


## Usage


After Including the sql file , you'll have a database named social with 4 tables namely asset,task,worker,allocate.

Open config/database.php and enter your localhost username,password.

After it is set up, Open /index.html 

If you want to test the API's on POSTMAN 

ASSET - 
http://localhost/udan_test/api/post/createAsset.php (POST REQUEST - Updates Data)
http://localhost/udan_test/api/post/allAsset.php  (GET REQUEST)

TASK - 
http://localhost/udan_test/api/post/createTask.php (POST - Updates Data)
http://localhost/udan_test/api/post/getTask.php?w=10 (GET - gets data specific to the Worker ID)

WORKER -
http://localhost/udan_test/api/post/createWorker.php (POST - Updates Data)
http://localhost/udan_test/api/post/getWorker.php (GET REQUEST)

ALLOCATE -
http://localhost/udan_test/api/post/allocate.php (POST REQ)
http://localhost/udan_test/api/post/getAllocate.php (GET REQUEST)
