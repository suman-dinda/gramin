# Project Gramin

## Project Features:

- Single Page Architecture
- user tree management (user chain [currently upto lvl 4 chain])
- stock management
- sell specific service
- selling products
- add to cart functionality
- printing bill for both service and products
- carry forward of service amount (installment basis payment)
- admin dashboard to view realtime data
- user dashboard to view stocks, sales and products he own
- commission structure (Coming Soon)

## Requirements

- Angular JS v1.6x and above
- PHP v5.6
- MySql DB

## Install App

    $ git clone https://github.com/suman-dinda/gramin.git

- copy the folder to LAMP/XAMP/WAMP -> www/htdocs/www folder or public_html folder of the server
- create a table `gramin` in MySql
- import the 'gramin.sql' file in root app directory
- change the server credntials in root/server/connection.php

Check for this set of code

    $this->host = 'localhost'; //hostname
    $this->user = 'root'; //username
    $this->password = ''; //password
    $this->baseName = 'gramin'; //name of your database
    $this->port = '3306';


