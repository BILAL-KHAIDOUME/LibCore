<?php
require_once "../configs/database.php";
require_once "librarian.php";




$database = new Database();
$conn = $database->getConnection();


class Member {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // US5 - Search a book by title or author
    public function search($keyword) {
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE title LIKE ? OR author LIKE ?");
        $stmt->execute(["%$keyword%", "%$keyword%"]);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($books as $b) {
            echo "- [{$b['id']}] {$b['title']} by {$b['author']} | Status: {$b['status']}\n";
        }
    }

    // US6 - Borrow a book
    public function borrow($memberId, $bookId) {
        // Check if book is available
        $stmt = $this->conn->prepare("SELECT * FROM books WHERE id = ?");
        $stmt->execute([$bookId]);
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($book['status'] != 'available') {
            echo "This book is not available.\n";
            return;
        }

        // Add loan
        $dueDate = date('Y-m-d', strtotime('+14 days'));
        $stmt = $this->conn->prepare("INSERT INTO loans (member_id, book_id, due_date) VALUES (?, ?, ?)");
        $stmt->execute([$memberId, $bookId, $dueDate]);

        // Update book status
        $stmt = $this->conn->prepare("UPDATE books SET status = 'borrowed' WHERE id = ?");
        $stmt->execute([$bookId]);

        echo "Book borrowed! Return by: $dueDate\n";
    }

    // US7 - Return a book
    public function returnBook($memberId, $bookId) {
        // Close the loan
        $stmt = $this->conn->prepare("UPDATE loans SET returned_at = NOW() WHERE member_id = ? AND book_id = ? AND returned_at IS NULL");
        $stmt->execute([$memberId, $bookId]);

        // Mark book as available
        $stmt = $this->conn->prepare("UPDATE books SET status = 'available' WHERE id = ?");
        $stmt->execute([$bookId]);

        echo "Book returned successfully.\n";
    }

    // US8 - Show my current loans
    public function myLoans($memberId) {
        $stmt = $this->conn->prepare("
            SELECT books.title, books.author, loans.due_date
            FROM loans
            JOIN books ON books.id = loans.book_id
            WHERE loans.member_id = ? AND loans.returned_at IS NULL
        ");
        $stmt->execute([$memberId]);
        $loans = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$loans) {
            echo "No active loans.\n";
            return;
        }
        foreach ($loans as $l) {
            echo "- {$l['title']} by {$l['author']} | Due: {$l['due_date']}\n";
        }
    }
}



?>