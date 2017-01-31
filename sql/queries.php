//Created "books" table in database to store our sellable books
$books = "CREATE TABLE IF NOT EXISTS books (isbn int(20) not null primary key, title 
varchar(50), author varchar(50), publisher varchar(50), year int(4), genre varchar(50), price float(4), bookCover varchar(50))";

if ($link->query($books) === FALSE) {
	echo "Error creating table: " . $conn->error;
}

//Each of these statements inserts a book into our "books" table
$stmt = $link -> prepare ("INSERT INTO books (isbn, title, author, publisher, year, genre, price, bookCover) values (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $isbn, $title, $author, $publisher, $year, $genre, $price, $bookCover);

$isbn = "0747532699"; $title = "Harry Potter and the Philosopher's Stone"; $author = "J.K. Rowling"; $publisher = "Bloomsbury"; $year = "1997"; $genre = "Fantasy"; $price = "5.99"; $bookCover = "1";

$stmt->execute();

$stmt = $link -> prepare ("INSERT INTO books (isbn, title, author, publisher, year, genre, price, bookCover) values (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $isbn, $title, $author, $publisher, $year, $genre, $price, $bookCover);

$isbn = "7593237124"; $title = "Human Taxidermy: A Beginner's Guide"; $author = "Charles Waterton"; $publisher = "Charles Waterton"; $year = "2016"; $genre = "Nonfiction"; $price = "6.66"; $bookCover = "2";

$stmt->execute();

$stmt = $link -> prepare ("INSERT INTO books (isbn, title, author, publisher, year, genre, price, bookCover) values (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $isbn, $title, $author, $publisher, $year, $genre, $price, $bookCover);

$isbn = "0000000001"; $title = "Bible"; $author = "God"; $publisher = "God"; $year = "0001"; $genre = "Fiction"; $price = "10.00"; $bookCover = "3";

$stmt->execute();

$stmt = $link -> prepare ("INSERT INTO books (isbn, title, author, publisher, year, genre, price, bookCover) values (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $isbn, $title, $author, $publisher, $year, $genre, $price, $bookCover);

$isbn = "0987122342"; $title = "A** Eating Made Simple"; $author = "Nancy Mohrbacher"; $publisher = "Kathleen Tackett & Co."; $year = "2016"; $genre = "Nonfiction"; $price = "0.69"; $bookCover = "4";

$stmt->execute();