ShounenWatch
============

ShounenWatch is a Web application written in PHP and built with the help of the
CodeIgniter PHP Web Framework. It's a small simple Web application that allows
its users to submit shounen anime, track their progress on their watching
habits, and rate other shounen anime submitted by other users.

How to work on this project
---------------------------

1.  Get a PHP-capable server. XAMPP may be a good place to start.

2.  Clone the ShounenWatch project into the directory of your PHP-capable
    server. If you are using XAMPP, this should be
    `/path/to/xampp/htdocs/`.

3.  Be sure to **not** work directly with the master branch.

4.  Set up the SQLite database server. For more info, see below.

Setting up an SQLite database
-----------------------------

##HOLD IT!##

I removed support for SQLite3...for now. It's because I can't insert anything
into the database using SQLite3 and the sloppy PDO driver that CodeIgniter
provides. Retrieving works fine, however.

For now, ignore this part and just set up your databases by copying the entire
init_db.sql file and run it through MySQL, either through its command line
interface or through PHPMyAdmin.

1.  Install SQLite3 first, as well as the necessary packages to interface
    SQLite3 with PHP such as `php5-sqlite`.
2.  Create an empty SQLite3 database with the filename
    `shounenwatch.sqlite` in the directory `application/db`. You can do
    this by running the following command on your terminal:
    
        sqlite3 shounenwatch.sqlite
        
3.  Once you're inside the sqlite3 command prompt, you need to read the
    prepared .sql file that will automatically create the necessary
    tables as well as the admin user for you. To do this, input the
    following inside the sqlite3 command prompt:
    
        .read init_db.sql
        
4.  If there are no errors, use `.tables` within the sqlite3 command
    prompt to check if all the tables were created. Also, perform a
    `SELECT * from user;` to check if the default user was
    created as well.
