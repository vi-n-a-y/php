<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
</head>
<style>

</style>

<body>
    <?php
    // $email = "something@gmail.com";
    // $position = strpos($email, '@');
    // $beforeAt = substr($email, 0, $position);
    // echo $beforeAt; // Outputs: something
    session_start();
    if (!isset($_SESSION['adminMail'])) {
        header("Location: admin.php");
        exit();
    } else {
        $stringPos = strpos($_SESSION['adminMail'], '@');
        $adminName = substr($_SESSION['adminMail'], 0, $stringPos);
        $adminName1 = ucfirst($adminName);

        echo " <h1>Welcome, {$adminName1} <?</h1>";

        include_once 'db_connect.php';



        $sql = "SELECT * FROM signup";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data for each row
            echo "<table>";
            echo "<tr><th>FirstName</th><th>LastName</th><th>Email</th></tr>";
            while ($row = $result->fetch_assoc()) {
                // echo " - FirstName: " . $row["firstName"] ."-lastName :".$row['lastName']. " - Email: " . $row["email"] . "<br>";
                echo "<tr><td>.{$row["firstName"]}</td><td>.{$row["lastName"]}</td><td>.{$row["email"]}</td></tr>";
            }
            echo "</table>";
        } else {
            echo "data not found";
        }

        $conn->close();
    }
    ?>



</body>

</html>