<?php
require_once "../configs/database.php";
require_once "member.php";

$database = new Database();
$conn = $database->getConnection();
$member = new Member($conn);

echo "=== Member Menu ===\n";
echo "1. Search a book\n";
echo "2. Borrow a book\n";
echo "3. Return a book\n";
echo "4. My current loans\n";
echo "0. Exit\n";

echo "Choose an option: ";
$choice = trim(fgets(STDIN));

switch ($choice) {
    case '1':
        echo "Enter title or author to search: ";
        $keyword = trim(fgets(STDIN));
        $member->search($keyword);
        break;

    case '2':
        echo "Enter your member ID: ";
        $memberId = trim(fgets(STDIN));
        echo "Enter book ID to borrow: ";
        $bookId = trim(fgets(STDIN));
        $member->borrow($memberId, $bookId);
        break;

    case '3':
        echo "Enter your member ID: ";
        $memberId = trim(fgets(STDIN));
        echo "Enter book ID to return: ";
        $bookId = trim(fgets(STDIN));
        $member->returnBook($memberId, $bookId);
        break;

    case '4':
        echo "Enter your member ID: ";
        $memberId = trim(fgets(STDIN));
        $member->myLoans($memberId);
        break;

    case '0':
        echo "Goodbye!\n";
        break;

    default:
        echo "Invalid option.\n";
        break;
}
?>