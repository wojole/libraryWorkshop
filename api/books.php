<?php
require_once __DIR__ . '/src/connect.php';
require_once __DIR__ . '/src/Book.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $books = Book::loadAllBooks($conn);
    header('Content-Type: application/json'); //nagłówek informujący że odpowiadamy jsonem
    echo json_encode($books);
}