<?php
try {
    $dsn = 'sqlite:' . __DIR__ . '/db.sqlite';
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "CREATE TABLE IF NOT EXISTS expenses (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        date DATE NOT NULL,
        amount INTEGER NOT NULL,
        payment_type TEXT NOT NULL
    )";
    $pdo->exec($query);

    $query1 = "CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL,
        password TEXT NOT NULL,
        role TEXT NOT NULL
    )";

    $pdo->exec($query1);

} catch (PDOException $e) {
    die($e->getMessage());
}
?>