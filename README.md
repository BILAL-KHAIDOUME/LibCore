# LibCore - Library Management App

A PHP console application to manage a library system using Object-Oriented Programming.

---

## Project Structure

```
LibCore/
├── src/
│   ├── entities/
│   │   ├── user.php
│   │   ├── member.php
│   │   ├── librarian.php
│   │   └── book.php
│   └── services/
│       └── library.php
├── docs/
│   ├── use-case.png
│   └── class-diagram.png
├── adminMenu.php
├── memberMenu.php
├── .env
├── .gitignore
└── README.md
```

---

## Features

### Librarian (Admin)
- **US1** - Add a new book to the catalog
- **US2** - Create a member account
- **US3** - View all books with their status (Available / Borrowed / Repair)
- **US4** - Remove a book or mark it as "repair"

### Member (User)
- **US5** - Search a book by title or author
- **US6** - Borrow a book (availability check included)
- **US7** - Return a book
- **US8** - View my current loans and due dates

---

## How to Run

Make sure you have PHP and a MySQL database set up.

1. Clone the repository:
```bash
git clone https://github.com/your-username/libcore.git
cd libcore
```

2. Set up your database and update `configs/database.php` with your credentials.

3. Run the admin menu:
```bash
php adminMenu.php
```

4. Run the member menu:
```bash
php memberMenu.php
```

---

## OOP Concepts Used

- **Classes** — `Book`, `User`, `Member`, `Librarian`, `Library`
- **Encapsulation** — All properties are private, accessed via getters/setters
- **Inheritance** — `Member` and `Librarian` extend `User`
- **PDO** — Used for all database interactions

---

## Business Rules

- A book can only be borrowed if its status is `available`
- A member cannot borrow a book that is not `active` in the system
- Student members can borrow a maximum of 3 books; Teacher members can borrow up to 10

---

## Database

The app uses a relational MySQL database with the following main tables:

- `books` — id, title, author, isbn, status
- `members` — id, name, email, type
- `loans` — id, member_id, book_id, due_date, returned_at

---

## Author

Built as part of the **LibCore** brief — Simplon Maroc  
Group project | Backend Development with PHP OOP
