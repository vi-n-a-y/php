<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
   

    <!-- <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <?php
    include_once 'header.php';
    ?>
<!-- <div class="for-grid-accordian-fixed"> -->
    <!-- <div class="accordion-container">
        <div class="accordion">
            <button class="accordion-button">Category <span class="arrow">&#9660;</span></button>
            <div class="accordion-content">
                <a href="#">Action Figures</a>
                <a href="#">Dolls</a>
                <a href="#">Building Blocks</a>
            </div>
        </div>
        <div class="accordion">
            <button class="accordion-button">Brand <span class="arrow">&#9660;</span></button>
            <div class="accordion-content">
                <a href="#">LEGO</a>
                <a href="#">Mattel</a>
                <a href="#">Hasbro</a>
            </div>
        </div>
        <div class="accordion">
            <button class="accordion-button">Age <span class="arrow">&#9660;</span></button>
            <div class="accordion-content">
                <a href="#">0-2 years</a>
                <a href="#">3-5 years</a>
                <a href="#">6-8 years</a>
            </div>
        </div>
    </div> -->




<!-- </div>     -->

<div class="accordian-container">
    <!-- Filters Section -->
    <div class="filters">
        <div class="accordion">
            <div class="accordion-item">
                <div class="accordion-header">Category <i class="fa fa-chevron-down"></i></div>
                <div class="accordion-body">
                    <input type="checkbox" id="category1" name="category" value="Electronics">
                    <label for="category1">Electronics</label><br>
                    <input type="checkbox" id="category2" name="category" value="Clothing">
                    <label for="category2">Clothing</label><br>
                    <!-- More categories -->
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">Age <i class="fa fa-chevron-down"></i></div>
                <div class="accordion-body">
                    <input type="checkbox" id="age1" name="age" value="Kids">
                    <label for="age1">Kids</label><br>
                    <input type="checkbox" id="age2" name="age" value="Adults">
                    <label for="age2">Adults</label><br>
                    <!-- More age groups -->
                </div>
            </div>
            <div class="accordion-item">
                <div class="accordion-header">Brand <i class="fa fa-chevron-down"></i></div>
                <div class="accordion-body">
                    <input type="checkbox" id="brand1" name="brand" value="BrandA">
                    <label for="brand1">Brand A</label><br>
                    <input type="checkbox" id="brand2" name="brand" value="BrandB">
                    <label for="brand2">Brand B</label><br>
                    <!-- More brands -->
                </div>
            </div>
        </div>
    </div>
  
  
  
      <section id="product1" class="section-p1">
        <h2 class="feature-products-text">Featured Products</h2>
        <p>Summer Collection New Modern Design</p>
        <div class="pro-container">
            <div class="pro">
                <img src="images/for sample.jpeg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/little_girl2.jpeg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/siri.jpeg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/products/f4.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/products/f5.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/products/f6.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/products/f7.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
            <div class="pro">
                <img src="images/products/f8.jpg" alt="">
                <div class="des">
                    <span>adidas</span>
                    <h5>Cartoon Astronaut T-Shirts</h5>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h4>$78</h4>
                </div>
                <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
            </div>
        </div>
    </section>




</body>


<script>

// document.querySelectorAll('.accordion-button').forEach(button => {
//     button.addEventListener('click', () => {
//         const content = button.nextElementSibling;
//         const isVisible = content.style.display === 'block';
        
//         document.querySelectorAll('.accordion-content').forEach(accContent => {
//             accContent.style.display = 'none';
//         });

//         document.querySelectorAll('.arrow').forEach(arrow => {
//             arrow.innerHTML = '&#9660;';
//         });

//         if (!isVisible) {
//             content.style.display = 'block';
//             button.querySelector('.arrow').innerHTML = '&#9650;';
//         }
//     });
// });



document.querySelectorAll('.accordion-header').forEach(header => {
        header.addEventListener('click', () => {
            const body = header.nextElementSibling;
            body.style.display = body.style.display === 'block' ? 'none' : 'block';
            const icon = header.querySelector('i');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        });
    });

</script>
</html>





  <!-- https://github.com/codewithmawais/ecommerce-website-html-css -->

    <!-- https://github.com/devarsh-mavani-19/EcommerceWebsite/tree/master/admin -->
       
