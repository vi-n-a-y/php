<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    ul {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
        background-color: orange;
        height: 60px;
        /* text-decoration: none; */
    }

    ul,
    li,
    a {
        list-style-type: none;
        text-decoration: none;
        color: black;
        font-size: 18px;
        cursor: pointer;
    }

    a:hover {
        color: white;
    }

    h1 {
        padding-top: 50px;
        padding-left: 10px;

    }
</style>

<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="home.php">Home</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">About Us</a>
                </li>
                <li>
                    <a href="login.php">Logout</a>
                </li>
            </ul>
        </nav>
    </header>


    <?php
    if (isset($_GET['firstName']) && isset($_GET['lastName'])) {
        $firstName = ucfirst($_GET['firstName']);
        $lastName = ucfirst($_GET['lastName']);

        echo " <h1>Hello, {$firstName} {$lastName} </h1>";
    }
    ?>


</body>

</html>