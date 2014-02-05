/*
    init_db.sql
    
    Run this .sql file whenever you are in a new environment with no sqlite3
    database initialized.
    
    It will create the necessary tables, as well as create the initial
    superuser.
    
    Note that we are lib
*/

-- Create the user table
CREATE TABLE user (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    username VARCHAR(30)  NOT NULL,
    -- password set to 48 chars, 40 needed by SHA1, 8 chars reserved for salt
    password TEXT NOT NULL,
    email TEXT NOT NULL,
    image TEXT,
    about TEXT
);

-- Create the anime table
CREATE TABLE anime (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    userID INTEGER NOT NULL,
    name TEXT NOT NULL,
    synopsis TEXT NOT NULL,
    episodes INTEGER NOT NULL,
    image VARCHAR(80),
    airing DATE NOT NULL,
    FOREIGN KEY (userID) REFERENCES user(id)
);

-- Create the rating table
CREATE TABLE rating (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    userID INTEGER NOT NULL,
    animeID INTEGER NOT NULL,
    rating INTEGER NOT NULL,
    FOREIGN KEY (userID) REFERENCES user(id),
    FOREIGN KEY (animeID) REFERENCES anime(id)
);

-- Create the watching table
CREATE TABLE watching (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    userID INTEGER NOT NULL,
    animeID INTEGER NOT NULL,
    currentEpisode INTEGER NOT NULL,
    FOREIGN KEY (userID) REFERENCES user(id),
    FOREIGN KEY (animeID) REFERENCES anime(id)
);

-- Populate the user table with the superuser
INSERT INTO user (
    username, password, email, about
)
VALUES (
    "admin",
    "bd85dd49d4cb9736bcc084c784701a807832952b14819bbd96dd5ccb6b3578bf",
    "admin@shounenwatch.com",
    "I'm the number one badass around here! You hear me!?"
);