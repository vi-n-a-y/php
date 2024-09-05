<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy's</title>
    <link rel="stylesheet" href="style.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
   

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>
<style>
    .nav-btns {
   
    margin-bottom:150px;
    
    
    
}
</style>
</head>
<body>

<!-- <div class="teddy-bear-img-header"> -->

    <div class="toys-header-container">

        <div class="white-shade-toy-header">
            <div class="call">
            <i class="fa-solid fa-phone-volume"></i>
            <a href="tel:1234567890">1234567890</a>
            </div>
            <div class="call">
            <i class="fa-solid fa-envelope"></i>
            <a href="mailto:toysstoreinfo@test.com">toysstoreinfo@test.com</a>
            </div>
        </div>

        <div class="bg-black-header">
            <h3 class="toy-text-header">Toys-Shop</h3>

            <input type="text" name="search_header" id="search_header" class="search_header" >
            <button class="search-btn-header">Search</button>
            <div class="love-icon-header"><i class="fa-regular fa-heart"></i></div>
            <div class="wishlist-icon-header">
            <i class="fa-solid fa-cart-plus"></i>
            </div>
        </div>

        <div class="nav-btns">
            <ul>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="#">about</a>
                </li>
                <li>
                    <a href="#">shop now</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                <li>
                    <a href="#">WishList</a>
                </li>
                <li>
                    <a href="myAccount.php">my account </a>
                </li>

            </ul>
        </div>

    </div>
    <!-- <img src="images/teddy_bear_3.jpg"> -->


    <!-- <h1 class="text-bold-header">
        Pick the Best Toy for 
    </h1>
    <h1 class="text-bold-header">your kid</h1> -->

<!-- </div> -->



<div class="banner">
        <div class="slider">
            <div class="slides">
                <div class="slide">
                    <img src="./images/teddy_bear_2.avif" alt="img 1">
                    <h1 id="text01">Pic the best Toy For<br>Your Kid<br>
                    <button id="read">read more</button>
                    </h1>
                </div>
                <div class="slide">
                    <img src="./images/teddy_bear_3.jpg" alt="img 2">
                    <h1 id="text01">Pic the best Toy For<br>Your Kid<br>
                    <button id="read">read more</button>
                    </h1>
                </div>
  
            </div>
            <div class="overlay"></div> <!-- Black overlay -->
            <button class="prev" id="bu" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" id="bu" onclick="moveSlide(1)">&#10095;</button>
        </div>
    </div> 

   

    <main id="shop">
                    
        <h1 class="toys-collecton-text">Toys Collections</h1>
       <div class="toys-collection">

       <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Item 1">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Teddy">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Teddy">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Teddy">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>


        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Item 1">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Teddy">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Teddy">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        <section class="product">
            <img src="images/photo-1533859583213-c4e11b597ee0.avif" alt="Teddy">
            <h2>Teddy</h2>
            <p class="price">$10.00</p>
            <button class="btn-cart">Add to Cart</button>
        </section>
        
       </div>

       <div class="btn-load-more">
       <button class="load-more-items"><a class="load-more-items-a" href="showNow.php">Load More</a></button>
       </div>
        <!-- Add more items as needed -->
    </main>





    
    
</body>

<script>
        let slideIndex = 0;

        function showSlide(index) {
            const slides = document.querySelector('.slides');
            const totalSlides = slides.children.length;
            if (index >= totalSlides) {
                slideIndex = 0;
            } else if (index < 0) {
                slideIndex = totalSlides - 1;
            } else {
                slideIndex = index;
            }
            slides.style.transform = `translateX(${-slideIndex * 100}%)`; // Adjusted to percentage
        }

        function moveSlide(step) {
            showSlide(slideIndex + step);
        }

        // Initialize the slider
        showSlide(slideIndex);

        // Auto slide every 3 seconds
        setInterval(() => moveSlide(1), 3000);
    </script>
</html>