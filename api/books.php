<?php
require_once __DIR__ . '/src/connect.php';
require_once __DIR__ . '/src/Book.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!isset($_GET['id'])) {
        $books = Book::loadAllBooks($conn);
        header('Content-Type: application/json'); //nagłówek informujący że odpowiadamy jsonem
        echo json_encode($books);
    }
    if (isset($_GET['id'])) {
        $id = trim($_GET['id']);
        $book = Book::loadFromDB($conn, $id);
        $book->getName();
        header('Content-Type: application/json'); //nagłówek informujący że odpowiadamy jsonem
        echo json_encode($book->getName()); //wyświetla tylko tytuł
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['name'])&&isset($_POST['author'])) {
        $name=trim($_POST['name']);
        $author=trim($_POST['author']);

        $book1=new Book();
        $success=$book1->create($conn, "$name","$author");
        if($success===true){
            echo "Dodano nową książkę do bazy danych";
        }
    }
}
