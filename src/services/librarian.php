<?php
require_once "../config/database.php";
require_once "member.php";


$database = new Database();
$conn = $database->getConnection();


class Librarian {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // US1 - Add a new book
    public function addBook($title, $author, $isbn) {
        $stmt = $this->conn->prepare("INSERT INTO books (title, author, isbn) VALUES (?, ?, ?)");
        $stmt->execute([$title, $author, $isbn]);
        echo "Book added: $title\n";
    }

    // US2 - Create a member account
    public function addMember($name, $email, $type) {
        $stmt = $this->conn->prepare("INSERT INTO members (name, email, type) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $type]);
        echo "Member created: $name ($type)\n";
    }

    // US3 - See all books with their status
    public function allBooks() {
        $stmt = $this->conn->query("SELECT * FROM books");
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($books as $b) {
            echo "- [{$b['id']}] {$b['title']} by {$b['author']} | Status: {$b['status']}\n";
        }
    }

    // US4 - Remove a book from catalog
    public function removeBook($bookId) {
        $stmt = $this->conn->prepare("DELETE FROM books WHERE id = ?");
        $stmt->execute([$bookId]);
        echo "Book removed.\n";
    }

    // US4 - Mark a book as 'repair'
    public function markAsRepair($bookId) {
        $stmt = $this->conn->prepare("UPDATE books SET status = 'repair' WHERE id = ?");
        $stmt->execute([$bookId]);
        echo "Book marked as repair.\n";
    }
}



?>