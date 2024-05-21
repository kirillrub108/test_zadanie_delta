<?php

const DB_HOST = 'db';
const DB_USERNAME = 'root';
const DB_PASSWORD = 'root';
const DB_NAME = 'tz_delta';

function getDBConnection() {
    try {
        $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
        $options = array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        );
        return new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}