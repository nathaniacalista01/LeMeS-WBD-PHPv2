<?php
    class Table{
        public const ENUM_TYPE = "
            DROP TYPE IF EXISTS source CASCADE; 
            CREATE TYPE source AS ENUM('video','pdf');
        ";
        public const ENUM_ROLE = "
            DROP TYPE IF EXISTS role CASCADE;
            CREATE TYPE role as ENUM('STUDENT','TEACHER','ADMIN');
        ";
        public const USER_TABLE = 
        "CREATE TABLE IF NOT EXISTS users (
            user_id SERIAL PRIMARY KEY,
            username VARCHAR(256) UNIQUE NOT NULL,
            fullname VARCHAR(256),
            password VARCHAR(256) NOT NULL,
            user_role role DEFAULT 'STUDENT',
            image_path VARCHAR(256),
            created_on TIMESTAMP DEFAULT NOW()
        )";

        public const COURSE_TABLE = 
        'CREATE TABLE IF NOT EXISTS courses(
            course_id SERIAL PRIMARY KEY, 
            title varchar(256) NOT NULL,
            description VARCHAR(256),
            image_path VARCHAR(256),
            release_date TIMESTAMP NOT NULL
        )';

        public const COURSE_PARTICIPANT_TABLE = 
        'CREATE TABLE IF NOT EXISTS course_paricitpant(
            course_participant_id SERIAL PRIMARY KEY,
            course_id INT REFERENCES courses(course_id) NOT NULL,
            participant_id INT REFERENCES users(user_id) NOT NULL,
            is_accepted boolean
        )';
       
        public const MODULE_TABLE = 
        ' CREATE TABLE IF NOT EXISTS modules(
            module_id SERIAL PRIMARY KEY,
            title VARCHAR(256) UNIQUE NOT NULL,
            description VARCHAR(256)    
        )';
       public const COURSE_MODULE_TABLE = 
       ' CREATE TABLE IF NOT EXISTS course_module(
           course_module_id SERIAL PRIMARY KEY,
           course_id INT REFERENCES courses(course_id),
           module_id INT REFERENCES modules(module_id) 
       )';
       public const MATERIAL_TABLE = 
       "CREATE TABLE IF NOT EXISTS materials(
        material_id SERIAL PRIMARY KEY,
        title VARCHAR(256) NOT NULL,
        description VARCHAR(256),
        material_type source
        )";
        public const MODULE_MATERIAL_TABLE =
        ' CREATE TABLE IF NOT EXISTS module_material(
            module_material_id SERIAL PRIMARY KEY,
            module_id INT REFERENCES modules(module_id),
            material_id INT REFERENCES materials(material_id)
        )';
    }
    
?>