

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

                <input type="text" name="search_header" id="search_header" class="search_header">
                <button class="search-btn-header">Search</button>
                <!-- <div class="love-icon-header"><i class="fa-regular fa-heart"></i></div> -->
                <div class="wishlist-icon-header">
                    <a class='modify-btn' href="import.php"><i class="fa-solid fa-file-import"></i></a>

                </div>

                <div class="wishlist-icon-header">

                    <a class='modify-btn' href="downloadRecordFile.php"> <i class="fa-solid fa-download"></i></a>
                </div>
                <div class="wishlist-icon-header">
                    <a class='modify-btn' href="index.php"> <i class="fa-solid fa-house"></i></a>
                </div>
                <div class="wishlist-icon-header">
                    <a class='modify-btn' href="home.php"> <i class="fa-solid fa-right-from-bracket"></i>
                </div>



            </div>


            <!-- <div class="nav-btns">
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="aboutUs.php">about</a>
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
            </div> -->

        </div>





        <div class="nav-a-div">

            <nav>
                <ul class="section-ul">
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section1">Products</a></li>
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section2">Customers</a></li>
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section3">Brands</a></li> 
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section5">Category</a></li>
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section8">Sub-Category</a></li>
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section6">Age Group</a></li>
                    <li><a href="#" onclick="navigateToExample(); return false;" class="nav-a" data-target="section7">About Us</a></li>
                </ul>
            </nav>

        </div> 
        
        





            <style>
                       .nav-a-div {
        font-family: Arial, sans-serif;
        /* display: flex;
        
        flex-direction: row; */
    }

   

    .toys-header-container{
        position:fixed;
        top:0;
        width: 100%;
    }




    nav {

        position: fixed; /* Fixes the sidebar in the viewport */
    top: 16%; /* Aligns it to the top of the viewport */
    left: 0; /* Aligns it to the left side of the viewport */
    width: 250px; /* Adjust the width of the sidebar */
    height: 100vh;
        width: 190px;
        background: #333;
        color: #fff;
        padding: 10px;
        font-size: 20px;
    }


    .section-ul {
        display: flex;
        flex-direction: column;
    }

    nav ul {
        list-style: none;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 10px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        display: block;
        padding: 10px;
    }

    .nav-a.active {
        font-weight: bold;
        /* text-decoration: underline; */
        background-color: white;
        color: black;
    }

    .section {
        display: none;
        padding: 20px;
    }

    .section.active {
        display: block;
    }
</style>


<script>
        function navigateToExample() {
            window.location.href = "http://localhost/dashboard/practice/Toy's%20project/adminHome.php";
        }
    </script>

