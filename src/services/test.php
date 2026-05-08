<?php
require_once "../config/database.php";
require_once "librarian.php";
require_once "member.php";




$database = new Database();
$conn = $database->getConnection();
// ═════════════════════════════════════════════════════════════════════════════
//  TEST EVERYTHING
// ═════════════════════════════════════════════════════════════════════════════

$librarian = new Librarian($conn);
$member    = new Member($conn);

echo "===== US1 - Add Book =====\n";
$librarian->addBook("Don Quichotte", "Cervantes", "978-4");

echo "\n===== US2 - Add Member =====\n";
$librarian->addMember("Youssef", "youssef@mail.com", "student");

echo "\n===== US3 - All Books =====\n";
$librarian->allBooks();

echo "\n===== US4 - Mark as Repair =====\n";
$librarian->markAsRepair(3);

echo "\n===== US5 - Search =====\n";
$member->search("camus");

echo "\n===== US6 - Borrow =====\n";
$member->borrow(1, 2);

echo "\n===== US8 - My Loans =====\n";
$member->myLoans(1);

echo "\n===== US7 - Return =====\n";
$member->returnBook(1, 2);

echo "\n===== US8 - My Loans After Return =====\n";
$member->myLoans(1);


?>