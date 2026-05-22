<?php
$connection = mysqli_connect("localhost", "root", "", "bookstore_db");

// Add to cart logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_to_cart'])) {
    $title = $_POST['book_title'];

    // Get book id
    $query = mysqli_query($connection, "SELECT id FROM books WHERE title = '$title'");
    $book = mysqli_fetch_assoc($query);
    $book_id = $book['id'];

    // Check if already in cart
    $check = mysqli_query($connection, "SELECT * FROM cart WHERE book_id = $book_id");
    if (mysqli_num_rows($check) > 0) {
        mysqli_query($connection, "UPDATE cart SET quantity = quantity + 1 WHERE book_id = $book_id");
    } else {
        mysqli_query($connection, "INSERT INTO cart (book_id, quantity) VALUES ($book_id, 1)");
    }

    echo "<script>alert('Book added to cart!');</script>";
}
?>
<html>
<head>
<title>programming books page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="styleprogrammingbookspage.css"/>
</head>
<body>
<h1 class="heading">Programming Books</h1>
<div class="border">
</div>
<section class="shop container">
<div class="shop-content">
<div class="product-box">
<img src="bookcover1.jpg" alt="" class="product-img">
<h2 class="product-title">Clean Code</h2>
<h3 class="author">By: Robert C. Martin</h3>
<p>Noted software expert Robert C. Martin presents a revolutionary paradigm with Clean Code:A Handbook of Agile Software Craftsmanship. Martin has teamed up with his colleagues from Object Mentor to distill their best agile practice of cleaning code "on the fly" into a book that will instill within you the values of a software craftsman and make you a better programmer-but only if you work at it.</p>
<h3 class="price">$40</h3>
<form method="post">
<input type="hidden" name="book_title" value="Clean Code">
<button class="add-cart" type="submit" name="add_to_cart">Add to cart</button>
<button><a href="https://amzn.in/d/a7BUSBF">More reads</a></button>
</form>
</div>
<div class="product-box">
<img src="bookcover3.jpg" alt="" class="product-img">
<h2 class="product-title">Coding</h2>
<h3 class="author">By: Alan Grid</h3>
<p>Programming has developed exponentially over the past 10 years, going from something used only in computer games and casual electronic devices, to something that shapes the way we live in the modern world. This means that now is a great time to learn it. Programming will give you fundamental skills. Learning to code will provide you with crucial skills and experience to pursue a career as coder. </p>
<h3 class="price">$30</h3>
<form method="post">
<input type="hidden" name="book_title" value="Coding">
<button class="add-cart" type="submit" name="add_to_cart">Add to cart</button>
<button><a href="#">More reads</a></button>
</form>
</div>
<div class="product-box">
<img src="bookcover4.jpg" alt="" class="product-img">
<h2 class="product-title">Introduction To Algorithms</h2>
<h3 class="author">By: Thomas H. Cormen</h3>
<p>This internationally acclaimed textbook provides a comprehensive introduction to the modern study of computer algorithms. It covers a broad range of algorithms in depth, yet makes their design and analysis accessible to all levels of readers. Each chapter is relatively selfcontained and presents an algorithm, a design technique, an application area or a related topic. The third edition has been updated.</p>
<h3 class="price">$28</h3>
<form method="post">
<input type="hidden" name="book_title" value="Introduction To Algorithms">
<button class="add-cart" type="submit" name="add_to_cart">Add to cart</button>
<button><a href="#">More reads</a></button>
</form>
</div>
<div class="product-box">
<img src="bookcover2.jpeg" alt="" class="product-img">
<h2 class="product-title">The Pragmatic Programmer</h2>
<h3 class="author">By: Andrew Hunt</h3>
<p>For twenty years, the lessons from The Pragmatic Programmer have helped a generation of programmers examine the very essence of software development, independent of any particular language, framework or methodology. The classic title is regularly featured on "Top Ten" lists and many corporations issue it to their new hires.</p>
<h3 class="price">$35</h3>
<form method="post">
<input type="hidden" name="book_title" value="The Pragmatic Programmer">
<button class="add-cart" type="submit" name="add_to_cart">Add to cart</button>
<button><a href="#">More reads</a></button>
</form>
</div>
</div>
</section>
</body>
</html>























