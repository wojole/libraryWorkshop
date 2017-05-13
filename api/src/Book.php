<?php


class Book
{
    private $id;
    private $name;
    private $author;

    public function __construct()
    {
        $this->id = -1;
        $this->name = "";
        $this->author = "";
    }

    public function getId()
    {
        return $this->id;
    }


    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getname()
    {
        return $this->name;
    }

    public function setname($name)
    {
        $this->name = $name;
    }

    static public function loadFromDB(PDO $conn, $id)
    {
        $stmt = $conn->prepare('SELECT * FROM books WHERE id=:id');
        $result = $stmt->execute(['id' => $id]);

        if ($result === true && $stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $loadedBook = new Book();
            $loadedBook->id = $row['id'];
            $loadedBook->name = $row['name'];
            $loadedBook->author = $row['author'];


            return $loadedBook; //zwracany jest obiekt
        }
        return null;
    }

    public function create(PDO $conn, $name, $author)
    {
        $stmt = $conn->prepare('INSERT INTO books(name, author) VALUES (:name, :author)');
        $result = $stmt->execute(
            ['name' => $name,
                'author' => $author,
            ]
        );
        if ($result !== false) {
            $this->id = $conn->lastInsertId();
            return true;
        } else echo "Błąd dodawania nowej książki!";
    }
    public function update(PDO $conn, $name, $author)
    {
        if($this->id != -1){
            $stmt = $conn->prepare(
                'UPDATE books SET name=:name, author=:author WHERE id=:id'
            );
            $result = $stmt->execute(
                ['name' => $name,
                    'author' => $author,
                    'id' => $this->id]
            );
            if ($result === true) {
                return true;
            }else "Nieudana aktualizacja danych w bazie";
        }
    }
    public function delete(PDO $conn)
    {
        if ($this->id != -1) {
            $stmt = $conn->prepare('DELETE FROM books WHERE id=:id');
            $result = $stmt->execute(['id' => $this->id]);

            if ($result === true) {
                $this->id = -1;

                return true;
            }
            return false;
        }
        return true;
    }

}