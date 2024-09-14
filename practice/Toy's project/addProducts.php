
<?php

// Start output buffering
ob_start();

// Include database connection
require 'db_connect.php';

// Initialize variables
$action = isset($_GET['type']) ? $_GET['type'] : '';
$updateId = isset($_GET['updateId']) ? intval($_GET['updateId']) : 0;
$errorMsg = '';
$product = []; // Initialize product array

if (isset($_GET['type']) && $_GET['type'] === 'delete' && isset($_GET['deleteId']) && $_GET['deleteId'] > 0) {
    $deleteId = intval($_GET['deleteId']);

    $sql = "DELETE FROM `products` WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $deleteId);
    $result = $stmt->execute();
    
    if ($result) {
        header('Location: adminHome.php');
        exit();
    } else {
        die(mysqli_error($conn));
    }
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $SKU = $_POST['SKU'];
    $categoryId = $_POST['categoryId'];
    $brandId = $_POST['brandId'];
    $ageGroupId = $_POST['ageGroupId'];
    $stockQuantity = $_POST['stockQuantity'];
    $discount = $_POST['discount'];
    $status = $_POST['status'];
    echo $status;
    // $subCategoryId=$_POST['subCategory'];

    // Handle file upload
    $imageUrl = '';
    if (isset($_FILES['imageUrl']) && $_FILES['imageUrl']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['imageUrl']['tmp_name'];
        $originalName = basename($_FILES['imageUrl']['name']);
        $uploadDir = 'images/';
        $uploadFile = $uploadDir . $originalName;

        // Validate file type and size
        $allowedTypes = ['image/jpeg', 'image/png','image/jpg','image/webp','image/avif', 'image/gif'];
        $fileType = mime_content_type($tmpName);
        
        if (in_array($fileType, $allowedTypes) && $_FILES['imageUrl']['size'] < 2000000) { // Limit size to 2MB
            if (move_uploaded_file($tmpName, $uploadFile)) {
                $imageUrl = $originalName; // Save only the file name in the database
            } else {
                $errorMsg = "Failed to upload image.";
            }
        } else {
            $errorMsg = "Invalid file type or size.";
        }
    } else if ($action === 'update' && isset($product['imageUrl'])) {
        // Retain existing image URL if no new image is uploaded
        $imageUrl = $product['imageUrl'];
    }

    if ($action === 'update' && $updateId > 0) {
        // Update product logic
        $stmt = $conn->prepare("UPDATE products SET name=?, description=?, price=?, SKU=?, categoryId=?, brandId=?, ageGroupId=?, stockQuantity=?, imageUrl=?, discount=?, `status`=? WHERE id=?");
        $stmt->bind_param("ssdsiiiisisi", $name, $description, $price, $SKU, $categoryId, $brandId, $ageGroupId, $stockQuantity, $imageUrl, $discount, $status, $updateId);
        // print_r($stmt);
        
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while updating the product.";
        }
    } else {
        
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, SKU, categoryId, brandId, ageGroupId, stockQuantity, imageUrl, discount, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdsiiiisis", $name, $description, $price, $SKU, $categoryId, $brandId, $ageGroupId, $stockQuantity, $imageUrl, $discount, $status);
        if ($stmt->execute()) {
            header('Location: adminHome.php'); // Redirect on success
            exit();
        } else {
            $errorMsg = "Something went wrong while adding the product.";
        }
    }
}

// Fetch category, brand, and age group options
$categories = $conn->query("SELECT id, name FROM categories");
$brands = $conn->query("SELECT id, name FROM brands");
$ageGroups = $conn->query("SELECT id, ageGroup FROM agegroup");
// $subCategory = $conn->query("SELECT id, name FROM subCategories");

// Fetch product data if updating
if ($action === 'update' && $updateId > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $updateId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        $errorMsg = "Product not found.";
    }
}

// Close the database connection
$conn->close();

// End output buffering
ob_end_flush();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo ($action === 'update' ? 'Update Product' : 'Add Product'); ?></title>
    <link rel="stylesheet" href="style.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

 

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">



<style>


.error { color: red; }
        .error-message { display: block; color: red; font-size: 0.875em; margin-top: 0.5em; }
        /* .required:after { content: " *"; color: red; } */
        .error-icon { color: red; margin-right: 0.5em; }
        .error-icon::before { content: "\f071"; font-family: "Font Awesome 6 Free"; font-weight: 900; } /* ⚠️ icon */
        


.section{
    /* position:absolute; */
    height: 100vh;
    position:absolute;
        top:20%;
        left:30%;
}


    .form-container {
        width: 100%;
        max-width: 600px;
        /* Set a max width for the form container */
        margin: 0 auto;
        /* Center horizontally */
        padding: 20px 20px 20px 40px;
        /* Add some padding */
        border: 1px solid #ddd;
        /* Optional: Add border */
        border-radius: 8px;
        /* Optional: Add border radius for rounded corners */
        background-color: #f9f9f9;
        /* Optional: Add background color */
    }

    .form-container button {

        /* width: 94%; */
    }

    .form-container h1 {
        width: 94%;
        margin: 15px 0;
    }

    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}


.quill-container{
    width: 96%;
    /* height: 120px; */
    /* padding:10px; */
    margin-bottom:15px;
}

.form-container  input[type="text"],
        .form-container input[type="number"],
        .form-container input[type="file"],
        .form-container  textarea,
        .form-container  select {
            margin-bottom:0;
            
            margin-top: 10px;
            
            
        }


</style>






<body>

    <?php include_once 'adminHeader.php';  ?>
    <div class="container-admin-panel">






        <main class="content">

            <section id="section1" class="section products-db">


            <div class="form-container">
        <h1><?php echo ($action === 'update' ? 'Update Product' : 'Add Product'); ?></h1>
        <?php if (!empty($errorMsg)) { ?>
            <p style="color: red; text-align: center;"><?php echo $errorMsg; ?></p>
        <?php } ?>
<form  method="post" id="product-form" enctype="multipart/form-data">
    <input type="hidden" name="action" value="<?php echo $action; ?>">
    <?php if ($action === 'update') { ?>
        <input type="hidden" name="updateId" value="<?php echo $updateId; ?>">
    <?php } ?>

    <input type="text" name="name" id="name" value="<?php echo isset($product['name']) ? htmlspecialchars($product['name']) : ''; ?>"  placeholder="Enter product name">
    <span id="productNameError" class="error-message"></span>

    <div class="quill-container">
        <div id="quill-editor1"></div>
    </div>
    <input type="hidden" name="description" id="quill-editor-content">
    <!-- <span id="productDesError" class="error-message"></span> -->

    <!-- <textarea name="description" id="description"  placeholder="Enter product description"><?php /* echo isset($product['description']) ? htmlspecialchars($product['description']) : '' */; ?></textarea> -->


    <input type="number" step="0.01" name="price" id="price" value="<?php echo isset($product['price']) ? htmlspecialchars($product['price']) : ''; ?>"  placeholder="Enter price">
    <span id="productPriceError" class="error-message"></span>

    <input type="text" name="SKU" id="SKU" value="<?php echo isset($product['SKU']) ? htmlspecialchars($product['SKU']) : ''; ?>" placeholder="Enter SKU">
    <span id="productSkuError" class="error-message"></span>

    <select name="categoryId" id="categoryId" onchange="fetchSubcategories(this.value)" >
        <option value="">Select Category</option>
        <?php while ($row = $categories->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>" <?php echo (isset($product['categoryId']) && $product['categoryId'] == $row['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($row['name']); ?>
            </option>
        <?php } ?>
    </select>
    <span id="productCatError" class="error-message"></span>
    
    <select id="subcategory" name="subcategory">
        <option value="">Select Subcategory</option>
    </select>
    <span id="productSubCatError" class="error-message"></span>

    <select name="brandId" id="brandId" >
        <option value="">Select Brand</option>
        <?php while ($row = $brands->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>" <?php echo (isset($product['brandId']) && $product['brandId'] == $row['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($row['name']); ?>
            </option>
        <?php } ?>
    </select>
    <span id="productBrandError" class="error-message"></span>

    <select name="ageGroupId" id="ageGroupId" >
    <option value="">Select Age</option>
        <?php while ($row = $ageGroups->fetch_assoc()) { ?>
            <option value="<?php echo $row['id']; ?>" <?php echo (isset($product['ageGroupId']) && $product['ageGroupId'] == $row['id']) ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($row['ageGroup']); ?>
            </option>
        <?php } ?>
    </select>
    <span id="productAgeGroupError" class="error-message"></span>

    <input type="number" name="stockQuantity" id="stockQuantity" value="<?php echo isset($product['stockQuantity']) ? htmlspecialchars($product['stockQuantity']) : ''; ?>" placeholder="Enter stock quantity">
    <span id="productQuantityError" class="error-message"></span>

    <input type="file" name="imageUrl" id="imageUrl" <?php echo ($action === 'update' ? '' : ''); ?>>
    <span id="fileError" class="error-message"></span>

<?php if(isset($product['imageUrl'])){
    $imagePath = 'images/' . htmlspecialchars($product["imageUrl"], ENT_QUOTES, 'UTF-8');
?>
<img src="<?php echo $imagePath ?>" height="100px" width=100px alt="some">


<?php

}
    ?>
    

    <input type="number" name="discount" id="discount" value="<?php echo isset($product['discount']) ? htmlspecialchars($product['discount']) : ''; ?>" placeholder="Enter discount">
    <span id="productDiscountError" class="error-message"></span>

    <select name="status" id="status" >
        <option value="">Select Status</option>
        <option value="active" <?php echo (isset($product['status']) && $product['status'] === 'active') ? 'selected' : ''; ?>>Active</option>
        <option value="discontinued" <?php echo (isset($product['status']) && $product['status'] === 'discontinued') ? 'selected' : ''; ?>>Inactive</option>
    </select>
    <span id="productStatusError" class="error-message"></span>

    <button name="submit" type="submit"><?php echo ($action === 'update' ? 'Update Product' : 'Add Product'); ?></button>
</form>




<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>




    <!-- <script>
        // Initialize Quill editor
        var quill1 = new Quill('#quill-editor1', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{ 'header': 1 }, { 'header': 2 }],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'script': 'sub'}, { 'script': 'super' }],
                    [{ 'indent': '-1'}, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }],
                    [{ 'size': ['small', false, 'large', 'huge'] }],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'font': [] }],
                    [{ 'align': [] }],
                    ['link', 'image', 'video']
                ]
            }
        });

        // Load existing data into Quill editor
        var existingDescription = <?php /* echo json_encode(isset($product['description']) ? htmlspecialchars($product['description']) : '') */; ?>;
        
        quill1.root.innerHTML = existingDescription;

        // Update the hidden field when Quill content changes
        quill1.on('text-change', function() {
            document.getElementById('quill-editor-content').value = quill1.root.innerHTML;
        });
    </script> -->



    <script>
    document.addEventListener('DOMContentLoaded', function() {
    var quill1 = new Quill('#quill-editor1', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                ['blockquote', 'code-block'],
                [{ 'header': 1 }, { 'header': 2 }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                ['link', 'image']
            ]
        }
    });


    var existingDescription = <?php echo json_encode(isset($product['description']) ? htmlspecialchars($product['description']) : ''); ?>;
        
        quill1.root.innerHTML = existingDescription;

    quill1.on('text-change', function() {
        document.getElementById('quill-editor-content').value = quill1.root.innerHTML;
    });

    function validateProductDes() {
        const description = document.getElementById('quill-editor-content').value.trim();
        const descriptionError = document.getElementById('productDesError');
        if (!description) {
            descriptionError.innerHTML = '<span class="error-icon"></span>Product Description is Required.';
            return false;
        } else {
            descriptionError.textContent = '';
            return true;
        }
    }

    function validateForm(event) {
        let isValid = true;
        isValid &= validateProductDes();

        if (!isValid) {
            event.preventDefault();
        }
    }

    document.getElementById('product-form').addEventListener('submit', validateForm);
});

</script>

<script>




function validateProductName() {
    const name = document.getElementById('name').value.trim();
    const nameError = document.getElementById('productNameError');
    if (!name) {
        nameError.innerHTML = '<span class="error-icon"></span>Product Name is Required.';
        return false;
    } else {
        nameError.textContent = '';
        return true;
    }
}

function validateProductDes() {
        const description = document.getElementById('quill-editor-content').value.trim();
        const descriptionError = document.getElementById('productDesError');
        if (!description) {
            descriptionError.innerHTML = '<span class="error-icon"></span>Product Description is Required.';
            return false;
        } else {
            descriptionError.textContent = '';
            return true;
        }
    }

function validateProductPrice() {
    const price = parseFloat(document.getElementById('price').value.trim());
    const priceError = document.getElementById('productPriceError');
    if (price <= 0) {
        priceError.innerHTML = '<span class="error-icon"></span>Please Enter a Positive Price.';
        return false;
    }
    if (isNaN(price)) {
        priceError.innerHTML = '<span class="error-icon"></span>Please Enter a Valid Price.';
        return false;
    } else {
        priceError.textContent = '';
        return true;
    }
}

function validateProductSku() {
    const sku = document.getElementById('SKU').value.trim();
    const skuError = document.getElementById('productSkuError');
    if (!sku) {
        skuError.innerHTML = '<span class="error-icon"></span>Product SKU is Required.';
        return false;
    } else {
        skuError.textContent = '';
        return true;
    }
}

function validateProductCat() {
    const category = document.getElementById('categoryId').value.trim();
    const categoryError = document.getElementById('productCatError');
    if (!category) {
        categoryError.innerHTML = '<span class="error-icon"></span>Select Product Category';
        return false;
    } else {
        categoryError.textContent = '';
        return true;
    }
}

function validateProductSubCat() {
    const subCategory = document.getElementById('subcategory').value.trim();
    const subCategoryError = document.getElementById('productSubCatError');
    if (!subCategory) {
        subCategoryError.innerHTML = '<span class="error-icon"></span>Select Product Sub-Category';
        return false;
    } else {
        subCategoryError.textContent = '';
        return true;
    }
}

function validateProductBrand() {
    const brand = document.getElementById('brandId').value.trim();
    const brandError = document.getElementById('productBrandError');
    if (!brand) {
        brandError.innerHTML = '<span class="error-icon"></span>Select Product Brand';
        return false;
    } else {
        brandError.textContent = '';
        return true;
    }
}

function validateProductAgeGroup() {
    const ageGroup = document.getElementById('ageGroupId').value.trim();
    const ageGroupError = document.getElementById('productAgeGroupError');
    if (!ageGroup) {
        ageGroupError.innerHTML = '<span class="error-icon"></span>Select Product Age-Group';
        return false;
    } else {
        ageGroupError.textContent = '';
        return true;
    }
}

function validateProductQuantity() {
    const quantity = parseInt(document.getElementById('stockQuantity').value.trim(), 10);
    const quantityError = document.getElementById('productQuantityError');
    if (quantity < 0) {
        quantityError.innerHTML = '<span class="error-icon"></span>Please Enter Positive Quantity.';
        return false;
    }
    if (isNaN(quantity)) {
        quantityError.innerHTML = '<span class="error-icon"></span>Please Enter the Product Quantity.';
        return false;
    } else {
        quantityError.textContent = '';
        return true;
    }
}

function validateProductImage() {
    const fileInput = document.getElementById('imageUrl');
    const fileError = document.getElementById('fileError');
    if (fileInput.files.length === 0) {
        fileError.innerHTML = '<span class="error-icon"></span>File is required.';
        return false;
    } else {
        fileError.textContent = '';
        return true;
    }
}

function validateProductDiscount() {
    const discount = parseFloat(document.getElementById('discount').value.trim());
    const discountError = document.getElementById('productDiscountError');
    if (discount < 0) {
        discountError.innerHTML = '<span class="error-icon"></span>Please Enter a Positive Discount Value.';
        return false;
    }
    if (isNaN(discount)) {
        discountError.innerHTML = '<span class="error-icon"></span>Please Enter the Product Discount.';
        return false;
    } else {
        discountError.textContent = '';
        return true;
    }
}

function validateProductStatus() {
    const status = document.getElementById('status').value.trim();
    const statusError = document.getElementById('productStatusError');
    if (!status) {
        statusError.innerHTML = '<span class="error-icon"></span>Select Product Status';
        return false;
    } else {
        statusError.textContent = '';
        return true;
    }
}

function validateForm(event) {
    let isValid = true;
    isValid &= validateProductName();
   
    isValid &= validateProductPrice();
    isValid &= validateProductSku();
    isValid &= validateProductCat();
    isValid &= validateProductSubCat();
    isValid &= validateProductBrand();
    isValid &= validateProductAgeGroup();
    isValid &= validateProductQuantity();
    isValid &= validateProductImage();
    isValid &= validateProductDiscount();
    isValid &= validateProductStatus();
    // isValid &= validateProductDes();

    if (!isValid) {
        event.preventDefault(); // Prevent form submission
    }
}

function addEventListeners() {
    // Add input event listeners for real-time validation
    document.getElementById('name').addEventListener('input', validateProductName);
    // Quill editor
    document.getElementById('price').addEventListener('input', validateProductPrice);
    document.getElementById('SKU').addEventListener('input', validateProductSku);
    document.getElementById('categoryId').addEventListener('change ', validateProductCat);
    document.getElementById('subcategory').addEventListener('change', validateProductSubCat);
    document.getElementById('brandId').addEventListener('change', validateProductBrand);
    document.getElementById('ageGroupId').addEventListener('change', validateProductAgeGroup);
    document.getElementById('stockQuantity').addEventListener('input', validateProductQuantity);
    document.getElementById('imageUrl').addEventListener('change', validateProductImage);
    document.getElementById('discount').addEventListener('input', validateProductDiscount);
    document.getElementById('status').addEventListener('change', validateProductStatus);
    // document.getElementById('description').addEventListener('input', validateProductDes); 

    // Form validation on submit
    document.getElementById('product-form').addEventListener('submit', validateForm);
}

// Initialize event listeners
addEventListeners();



</script>






</div>




            </section>

        </main>
    </div>

    <script>
function fetchSubcategories(categoryId) {
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'addSubCategory.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById('subcategory').innerHTML = xhr.responseText;
        }
    };
    xhr.send('category_id=' + categoryId);
}
</script>

    

</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-a');
        const sections = document.querySelectorAll('.section');

        // Function to show the selected section and hide others
        function showSection(targetId) {
            sections.forEach(section => {
                if (section.id === targetId) {
                    section.classList.add('active');
                } else {
                    section.classList.remove('active');
                }
            });

            navLinks.forEach(link => {
                if (link.getAttribute('data-target') === targetId) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });
        }

        // Set up click event handlers for the navigation links
        navLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                event.preventDefault();
                const targetId = link.getAttribute('data-target');
                showSection(targetId);
                // Optionally, remember the last active section in localStorage
                localStorage.setItem('activeSection', targetId);
            });
        });

        // Show the section that was last active, if any
        const lastActiveSection = localStorage.getItem('activeSection');
        if (lastActiveSection) {
            showSection(lastActiveSection);
        } else {
            // Optionally, show the first section by default
            if (sections.length > 0) {
                showSection(sections[0].id);
            }
        }
    });
</script>

</html>



    <?php
// Database connection
include_once'db_connect.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for product name
    if (isset($_POST['product_name']) && !empty($_POST['product_name'])) {
        $productName = $_POST['product_name'];
        
        // Insert product into database
        $stmt = $conn->prepare("INSERT INTO products (product_name) VALUES (?)");
        $stmt->bind_param("s", $productName);
        if ($stmt->execute()) {
            $productId = $stmt->insert_id; // Get the ID of the newly inserted product
            $stmt->close();
            
            // Check if images were uploaded
            if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
                $uploadDir = 'uploads/';
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                // Loop through each uploaded file
                foreach ($_FILES['images']['name'] as $key => $name) {
                    $fileTmpPath = $_FILES['images']['tmp_name'][$key];
                    $fileName = $_FILES['images']['name'][$key];
                    $fileSize = $_FILES['images']['size'][$key];
                    $fileType = $_FILES['images']['type'][$key];
                    $fileNameCmps = explode('.', $fileName);
                    $fileExtension = strtolower(end($fileNameCmps));

                    // Validate file type
                    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
                    if (in_array($fileExtension, $allowedExtensions)) {
                        // Move file to upload directory
                        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                        $destination = $uploadDir . $newFileName;

                        if (move_uploaded_file($fileTmpPath, $destination)) {
                            // Insert image record into the database
                            $stmt = $conn->prepare("INSERT INTO images (product_id, image_path) VALUES (?, ?)");
                            $stmt->bind_param("is", $productId, $destination);
                            $stmt->execute();
                            $stmt->close();
                        } else {
                            echo "Error uploading file: " . $fileName;
                        }
                    } else {
                        echo "Invalid file type: " . $fileName;
                    }
                }
            } else {
                echo "No images uploaded.";
            }
        } else {
            echo "Error inserting product.";
        }
    } else {
        echo "Product name is required.";
    }

    // Close database connection
    $conn->close();
}
?>



