<?php 
session_start();
if (!isset($_SESSION['adminMail'])) {
    header("Location: admin.php");
    exit();
} else {
    $stringPos = strpos($_SESSION['adminMail'], '@');
    $adminName = substr($_SESSION['adminMail'], 0, $stringPos);
    $adminName1 = ucfirst($adminName);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="https://kit.fontawesome.com/51ef45e87a.js" crossorigin="anonymous"></script>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        .action-btn {
            padding: 5px 10px;
            border: none;
            color: #fff;
            cursor: pointer;
            font-size: 14px;
            border-radius: 3px;
        }
        .update-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
        .action-btn:hover {
            opacity: 0.8;
        }

        a{
            text-decoration: none;
            color:black;
        }
        .modify-btn{
            text-decoration: none;
            color:white;

        }



 

/* Pagination container */
.pagination {
    display: flex;
    justify-content: center;
    margin: 20px 0;
}

.pagination a {
    color: #333;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    border: 1px solid #ddd;
    margin: 0 4px;
    border-radius: 4px;
    font-family: Arial, sans-serif;
}

.pagination a:hover {
    background-color: #ddd;
}

.pagination a.active {
    background-color: #4CAF50;
    color: white;
    border: 1px solid #4CAF50;
}

.pagination a.disabled {
    color: #ccc;
    pointer-events: none;
}

.pagination a.prev-next {
    font-weight: bold;
}

.pagination a.prev-next:hover {
    background-color: #4CAF50;
    color: white;
}


</style>

<body>

<form method="GET" action="">
    <input type="text" name="search" placeholder="Search..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
    <button type="submit" class="action-btn update-btn">Search</button>
</form>


<h1>Welcome, <?php echo $adminName1;  ?></h1>
<?php
include_once 'db_connect.php';

// Default sort settings
$sort_by = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'firstName'; // Default column to sort by
$sort_order = isset($_GET['sort_order']) ? $_GET['sort_order'] : 'ASC'; // Default order

// Ensure sort_order is either ASC or DESC
$sort_order = ($sort_order === 'DESC') ? 'DESC' : 'ASC';

// Ensure sort_by is a valid column
$valid_columns = ['Id', 'firstName', 'lastName', 'email', 'contact'];
if (!in_array($sort_by, $valid_columns)) {
    $sort_by = 'firstName';
}

// Pagination settings
$limit = 5; // Number of rows per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page number
$offset = ($page - 1) * $limit; // Calculate the offset for the query

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$search_query = '';
if (!empty($search)) {
    $search = $conn->real_escape_string($search);
    $search_query = " WHERE firstName LIKE '%$search%' OR lastName LIKE '%$search%' OR email LIKE '%$search%' OR contact LIKE '%$search%'";
}

// Count the total number of rows in the table with search filter
$sql_count = "SELECT COUNT(*) as total FROM signup" . $search_query;
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_rows = $row_count['total'];
$total_pages = ceil($total_rows / $limit); // Calculate total pages

// Fetch the data with sorting, pagination, and search filter
$sql = "SELECT * FROM signup" . $search_query . " ORDER BY $sort_by $sort_order LIMIT $offset, $limit";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
<table>
    <thead>
        <tr>
        <th><a href="?sort_by=Id&sort_order=<?= ($sort_by == 'Id' && $sort_order == 'ASC') ? 'DESC' : 'ASC' ?>">ID <?= $sort_by == 'Id' ? ($sort_order == 'ASC' ? '<i class="fa-solid fa-angle-up"></i>' : '<i class="fa-solid fa-angle-down"></i>') : '<i class="fa-solid fa-angle-down"></i>' ?></a></th>
            <th><a href="?sort_by=firstName&sort_order=<?= ($sort_by == 'firstName' && $sort_order == 'ASC') ? 'DESC' : 'ASC' ?>">First Name <?= $sort_by == 'firstName' ? ($sort_order == 'ASC' ? '<i class="fa-solid fa-angle-up"></i>' : '<i class="fa-solid fa-angle-down"></i>') : '<i class="fa-solid fa-angle-down"></i>' ?></a></th>
            <th><a href="?sort_by=lastName&sort_order=<?= ($sort_by == 'lastName' && $sort_order == 'ASC') ? 'DESC' : 'ASC' ?>">Last Name <?= $sort_by == 'lastName' ? ($sort_order == 'ASC' ? '<i class="fa-solid fa-angle-up"></i>' : '<i class="fa-solid fa-angle-down"></i>') : '<i class="fa-solid fa-angle-down"></i>' ?></a></th>
            <th><a href="?sort_by=email&sort_order=<?= ($sort_by == 'email' && $sort_order == 'ASC') ? 'DESC' : 'ASC' ?>">Email <?= $sort_by == 'email' ? ($sort_order == 'ASC' ? '<i class="fa-solid fa-angle-up"></i>' : '<i class="fa-solid fa-angle-down"></i>') : '<i class="fa-solid fa-angle-down"></i>' ?></a></th>
            <th><a href="?sort_by=contact&sort_order=<?= ($sort_by == 'contact' && $sort_order == 'ASC') ? 'DESC' : 'ASC' ?>">Contact <?= $sort_by == 'contact' ? ($sort_order == 'ASC' ? '<i class="fa-solid fa-angle-up"></i>' : '<i class="fa-solid fa-angle-down"></i>') : '<i class="fa-solid fa-angle-down"></i>' ?></a></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = $offset;
        while ($row = $result->fetch_assoc()) {
            $i++;
            echo "<tr><td>{$i}</td><td>{$row["firstName"]}</td><td>{$row["lastName"]}</td><td>{$row["email"]}</td><td>{$row["contact"]}</td><td>
                <button class='action-btn update-btn'><a class='modify-btn' href='update.php?updateId={$row["id"]}'> <i class='fa-regular fa-pen-to-square'></i> </a></button>
                <button class='action-btn delete-btn'><a class='modify-btn' href='delete.php?deleteId={$row["id"]}'> <i class='fa-solid fa-trash'></i></a></button>
            </td></tr>";
        }
        ?>
    </tbody>
</table>

<!-- Pagination Controls -->
<div class="pagination">
    <?php if ($page > 1): ?>
        <a href="?page=<?= $page - 1 ?>&sort_by=<?= $sort_by ?>&sort_order=<?= $sort_order ?>&search=<?= urlencode($search) ?>" class="prev-next">&laquo; Prev</a>
    <?php else: ?>
        <a class="prev-next disabled">&laquo; Prev</a>
    <?php endif; ?>

    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>&sort_by=<?= $sort_by ?>&sort_order=<?= $sort_order ?>&search=<?= urlencode($search) ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
    <?php endfor; ?>

    <?php if ($page < $total_pages): ?>
        <a href="?page=<?= $page + 1 ?>&sort_by=<?= $sort_by ?>&sort_order=<?= $sort_order ?>&search=<?= urlencode($search) ?>" class="prev-next">Next &raquo;</a>
    <?php else: ?>
        <a class="prev-next disabled">Next &raquo;</a>
    <?php endif; ?>
</div>
<?php
} else {
    echo "data not found";
}

$conn->close();
}
?>










</body>

</html>
<!-- color hunt -->
<!-- 
//alter table signup 
//ADD COLUMN updateAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP; -->

<!-- alter table signup add column contact varchar(20); -->