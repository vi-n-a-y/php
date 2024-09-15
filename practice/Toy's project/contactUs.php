<?php
if (isset($_POST['submit'])) {
    include_once 'db_connect.php';
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert data into database
    $sql = "INSERT INTO contactUs (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        // echo "Thank you for your message!";
        header('location: home.php');
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .contact-form-full {
            background-color: #F4DEB3;
            font-family: Arial, sans-serif;
            /* height: 80vh; */
            padding: 20px; /* Optional padding */
        }

        .contact-form {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            top: 5%;
        }

        .contact-form h2 {
            margin-bottom: 20px;
        }

        .contact-form .form-group {
            margin-bottom: 15px;
        }

        .contact-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .contact-form .required:after {
            content: ' *';
            color: red;
        }

        .contact-form input,
        .contact-form textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .contact-form textarea {
            height: 150px;
            resize: vertical;
        }

        .contact-form button {
            padding: 10px 20px;
            border: none;
            background-color: #ff69b4;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #ff1493;
        }

        .error {
            color: red;
            margin-top: 5px;
        }

        .map-container {
            margin: 20px auto; /* Adds space around the map container */
            max-width: 800px;
            height: 400px;
            padding: 20px; /* Optional padding */
            margin-top:50px;
        }

        #map {
            height: 100%;
            width: 100%;
        }
    </style>
</head>

<body>
    <?php include_once 'header.php'; ?>
    <div class="contact-form-full">
        <div class="contact-form">
            <h2>Contact Us</h2>
            <form id="contactForm" method="post" onsubmit="return validateForm()">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email" class="required">Email</label>
                    <input type="email" id="email" name="email" required>
                    <div id="emailError" class="error"></div>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button name="submit" type="submit">Submit</button>
            </form>
            
        </div>
        
        <!-- Added map-container here -->
        
    </div>
    <!-- <div class="map-container" id="map"></div> -->
    <hr class="hr-to-margin-top">

        <?php include_once 'footer.php'; ?>



    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var emailError = document.getElementById('emailError');
            var valid = true;

            // Clear previous errors
            emailError.textContent = '';

            // Validate email
            if (!email) {
                emailError.textContent = 'Email is required.';
                valid = false;
            } else if (!validateEmail(email)) {
                emailError.textContent = 'Please enter a valid email address.';
                valid = false;
            }

            return valid;
        }

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Initialize the Leaflet map
        document.addEventListener('DOMContentLoaded', function () {
            var map = L.map('map').setView([51.505, -0.09], 13); // Coordinates for London; change as needed

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            L.marker([51.505, -0.09]).addTo(map)
                .bindPopup('A sample marker.')
                .openPopup();
        });
    </script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>

</html>
