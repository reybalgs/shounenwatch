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

Setting up the database
-----------------------

If you haven't set up your database yet, just run the
`application/db/shounenwatch.sql` file into MySQL and it will automatically
create the table structures for you, as well as create a default admin user.
