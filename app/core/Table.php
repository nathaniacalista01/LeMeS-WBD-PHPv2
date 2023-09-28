<?php
    class Table{
        public const USER_TABLE = 
        "CREATE TABLE IF NOT EXISTS user(
            user_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(256) UNIQUE NOT NULL,
            fullname VARCHAR(256) NOT NULL,
            password VARCHAR(256) NOT NULL,
            admin boolean not null,
        );";
    }
?>