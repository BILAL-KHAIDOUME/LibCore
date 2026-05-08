<?php
require_once "../configs/database.php";
require_once "member.php";
require_once "librarian.php";
 
$database = new Database();
$conn = $database->getConnection();
$librarian = new Librarian($conn);
 
echo "=== Library Menu ===\n";
echo "1. Add a book\n";
echo "2. Add a member\n";
echo "3. See all books\n";
echo "4. Remove a book\n";
echo "5. Mark book as repair\n";
echo "0. Exit\n";
 
echo "Choose an option: ";
$choice = trim(fgets(STDIN));
 
switch ($choice) {
    case '1':
        echo "Enter title: ";
        $title = trim(fgets(STDIN));
        echo "Enter author: ";
        $author = trim(fgets(STDIN));
        echo "Enter ISBN: ";
        $isbn = trim(fgets(STDIN));
        $librarian->addBook($title, $author, $isbn);
        break;
 
    case '2':
        echo "Enter name: ";
        $name = trim(fgets(STDIN));
        echo "Enter email: ";
        $email = trim(fgets(STDIN));
        echo "Enter type (standard/premium): ";
        $type = trim(fgets(STDIN));
        $librarian->addMember($name, $email, $type);
        break;
 
    case '3':
        $librarian->allBooks();
        break;
 
    case '4':
        echo "Enter book ID to remove: ";
        $id = trim(fgets(STDIN));
        $librarian->removeBook($id);
        break;
 
    case '5':
        echo "Enter book ID to mark as repair: ";
        $id = trim(fgets(STDIN));
        $librarian->markAsRepair($id);
        break;
 
    case '0':
        echo "Goodbye!\n";
        break;
 
    default:
        echo "Invalid option.\n";
        break;
}

?>