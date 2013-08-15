## rentph Clone 

Project for learning Laravel 4 Framework.

## Installation

rentph is only a demo application I wrote for learning Laravel 4 Framework.

First up, your system will need to install the prerequisties for running Php applications.

After that you have to do these commands:
    
    //Checkout the project
    $ git clone https://github.com/codenut/rentph
    $ cd rentph

    //Install project dependencies
    $ composer install

    //Setup development database
    $ mysql -u[username] -p[password] -e "create database rentph;"
    $ php artisan migrate

    //create folder for images
    $ mkdir data

    //Start the development web server
    $ php artisan serve

Then open this url in your browser http://localhost:8000
