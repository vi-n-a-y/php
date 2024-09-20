<div class="footer-php">
    <!-- Your other content goes here -->

    <!-- Footer Section -->
    <footer>
        <div class="footer-container">
            <!-- Quick Links Section -->
            <div class="footer-links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>

            <!-- Toy Categories Section -->
            <div class="footer-categories">
                <h3>Toy Categories</h3>
                <ul>
                    <li><a href="#">Educational Toys</a></li>
                    <li><a href="#">Outdoor Toys</a></li>
                    <li><a href="#">Plush Toys</a></li>
                    <li><a href="#">Puzzles & Games</a></li>
                </ul>
            </div>

            <!-- Newsletter Subscription Section -->
            <div class="footer-newsletter">
                <h3>Newsletter</h3>
                <p>Subscribe to our newsletter for the latest toys and special offers!</p>
                <form>
                    <input name="email" type="email" placeholder="Enter your email" required>
                    <button name="submit" type="submit">Subscribe</button>
                </form>
            </div>

            <!-- Contact Us Section -->
             <div>
            <div class="footer-contact">
                <h3>Contact Us</h3>
                <p>Email: support@kidstoys.com</p>
                <p>Phone: 123-456-7890</p>
                <p>Address: 123 Toy Street, Toyland</p>
            </div>

            <!-- Social Media Section -->
            <div class="footer-social">
                <h3>Follow Us</h3>
                <div class="social-icons">
                   <div>
                   <a href="#">Facebook</a>
                   <a href="#">Instagram</a>
                   </div>
                    <div class="twi-you">
                    <a href="#">Twitter</a>
                    <a href="#">YouTube</a>
                    </div>
                </div>
            </div>

            </div> 
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p>&copy; 2024 Kids Toys. All Rights Reserved.</p>
        </div>
    </footer>
  </div> 



<style>

    
.footer-php {
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    
    /* min-height: 100vh; Ensure body takes full viewport height */
    display: flex;
    flex-direction: column; /* Makes footer stay at bottom */
    background: #f0f8ff; /* Light background */
    /* margin-top:50px; */
}

footer {
    background-color: #ffe4e1; /* Soft pink background */
    padding: 30px 40px;  /* Added padding to the left and right */
    color: #333;
    
    width: 100%;  /* Stretches the footer across the entire width */
    z-index: 100; /* Ensures it stays above other content */
    box-sizing: border-box; /* Ensures padding is inside the width */
}

.footer-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 20px;
}

footer h3 {
    color: #ff69b4; /* Bright color for headings */
    font-size: 1.5em;
}

footer p {
    font-size: 1em;
}

footer a {
    color: #ff1493; /* Vivid pink for links */
    text-decoration: none;
}

footer a:hover {
    color: #ff4500; /* Orange hover effect */
}

.footer-links ul,
.footer-categories ul {
    list-style: none;
    padding: 0;
}

.footer-links li,
.footer-categories li {
    margin: 5px 0;
}

.footer-newsletter form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.footer-newsletter input {
    padding: 10px;
    border: none;
    border-radius: 5px;
    margin-bottom: 10px;
    width: 80%;
}

.footer-newsletter button {
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #ff69b4;
    color: white;
    cursor: pointer;
    width: 50%;
}

.footer-newsletter button:hover {
    background-color: #ff4500;
}

/* Social media icons styles (Vertically aligned) */
 .social-icons {
    display: grid;
    grid-template-columns: 1fr 1fr;
    flex-direction: column; /* Makes social icons vertical */
    gap: 10px;
    margin-top:20px;

    
}

.social-icons{
    display:grid;
    grid-template-columns: 1fr 1fr;
   
}


.twi-you a{
    margin-top:15px;
    padding: 8px 35px;
}


.footer-social .social-icons a {
    background-color: #ffdab9; /* Peach background for icons */
    padding: 8px 15px;
    border-radius: 5px;
    color: #333;
    text-align: center;
    margin:10px;
    /* width: 50px; */
    
}



/* .footer-social a:hover {
    background-color: #ff4500;
    color: #fff;
} */

/* Footer Bottom Section */
.footer-bottom {
    text-align: center;
    margin-top: 20px;
    padding-top: 10px;
    border-top: 1px solid #ffdab9;
}

.footer-bottom p {
    color: #ff69b4;
    font-size: 0.9em;
    padding:5px;
}

.footer-contact{
    margin-bottom:15px;
}

/* Responsive design */
@media screen and (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        text-align: center;
    }

    .footer-newsletter input,
    .footer-newsletter button {
        width: 100%;
    }
}

</style>
