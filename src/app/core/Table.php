<?php
    class Table{
        public const ENUM_TYPE = "
            DROP TYPE IF EXISTS source CASCADE; 
            CREATE TYPE source AS ENUM('video','pdf');
        ";
        public const STUDENT_TABLE = 
        'CREATE TABLE IF NOT EXISTS students (
            student_id SERIAL PRIMARY KEY,
            username VARCHAR(256) UNIQUE NOT NULL,
            fullname VARCHAR(256) NOT NULL,
            password VARCHAR(256) NOT NULL,
            created_on TIMESTAMP NOT NULL
        )';

        public const TEACHER_TABLE =
        'CREATE TABLE IF NOT EXISTS lecturers (
            lecturer_id SERIAL PRIMARY KEY,
            username VARCHAR(256) UNIQUE NOT NULL,
            fullname VARCHAR(256) NOT NULL,
            password VARCHAR(256) NOT NULL,
            created_on TIMESTAMP NOT NULL
        )';

        public const COURSE_TABLE = 
        'CREATE TABLE IF NOT EXISTS courses(
            course_id SERIAL PRIMARY KEY, 
            lecturer_id INT REFERENCES lecturers(lecturer_id) NOT NULL,
            title varchar(256) NOT NULL,
            description VARCHAR(256),
            image_path VARCHAR(256),
            release_date TIMESTAMP NOT NULL
        )';

        public const COURSE_PARTICIPANT_TABLE = 
        'CREATE TABLE IF NOT EXISTS course_paricitpant(
            course_participant_id SERIAL PRIMARY KEY,
            course_id INT REFERENCES courses(course_id) NOT NULL,
            student_id INT REFERENCES students(student_id) NOT NULL,
            is_accepted boolean NOT NULL DEFAULT false
        )';
        public const COURSE_LECTURER_TABLE = 
        'CREATE TABLE IF NOT EXISTS course_lecturer(
            course_lecturer_id SERIAL PRIMARY KEY,
            course_id INT REFERENCES courses(course_id) NOT NULL,
            lecturer_id INT REFERENCES lecturers(lecturer_id) NOT NULL
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