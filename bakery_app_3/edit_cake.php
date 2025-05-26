<?php
include 'db.php';

if (isset($_GET['id'])) {
    $cake_id = $_GET['id'];

    // Get cake details including type and size
    $result = $conn->query("SELECT * FROM cake WHERE cake_id = $cake_id");
    $cake = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $cake_name = $_POST['cake_name'];
    $price = $_POST['price'];
    $type_id = $_POST['type_id'];
    $size_id = $_POST['size_id'];

    // Update with all fields including type and size
    $conn->query("UPDATE cake SET cake_name='$cake_name', price='$price', 
                  type_id='$type_id', size_id='$size_id' 
                  WHERE cake_id=$cake_id");

    // Show success message and redirect after brief delay
    echo "<div class='alert alert-success mt-4'>Cake updated successfully!</div>";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'cake_list.php';
            }, 1500);
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Cake</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
body {
    background-color: #fffaf0;
    font-family: 'Poppins', sans-serif;
}
.navbar-brand {
    color: #8B4513 !important;
}
h1, h2, h3 {
    color: #8B4513;
}
.card {
    background-color: #ffffff;
    border-radius: 1rem;
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.1);
}
.btn-primary {
    background-color: #d2691e;
    border: none;
}
.btn-primary:hover {
    background-color: #c15817;
}
.btn-secondary {
    background-color: #f4a460;
    border: none;
}
.btn-secondary:hover {
    background-color: #e9967a;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-4">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="index.php"><i class="fas fa-bread-slice"></i> Anugerah Bakery</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="cake_list.php">Cakes</a></li>
        <li class="nav-item"><a class="nav-link" href="customer_list.php">Customers</a></li>
        <li class="nav-item"><a class="nav-link" href="order_list.php">Orders</a></li>
        <li class="nav-item"><a class="nav-link" href="review_list.php">Reviews</a></li>
      </ul>
    </div>
  </div>
</nav>
 <class="container mt-5">

<h1 class="mb-4"><i class="fas fa-edit me-2"></i>Edit Cake</h1>

<div class="card p-4">
    <form method="post">
        <div class="mb-3">
            <label for="cake_name" class="form-label">Cake Name</label>
            <input type="text" class="form-control" id="cake_name" name="cake_name" 
                   value="<?php echo $cake['cake_name']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price (Rp)</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" 
                   value="<?php echo $cake['price']; ?>" required>
        </div>

        <div class="mb-3">
            <label for="type_id" class="form-label">Cake Type</label>
            <select class="form-select" id="type_id" name="type_id" required>
                <?php
                $type_query = $conn->query("SELECT * FROM cake_type");
                while ($type = $type_query->fetch_assoc()) {
                    $selected = ($type['type_id'] == $cake['type_id']) ? "selected" : "";
                    echo "<option value='" . $type['type_id'] . "' $selected>" . $type['type_name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="size_id" class="form-label">Cake Size</label>
            <select class="form-select" id="size_id" name="size_id" required>
                <?php
                $size_query = $conn->query("SELECT * FROM cake_size");
                while ($size = $size_query->fetch_assoc()) {
                    $selected = ($size['size_id'] == $cake['size_id']) ? "selected" : "";
                    echo "<option value='" . $size['size_id'] . "' $selected>" . $size['size_label'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" name="update" class="btn btn-primary">Update Cake</button>
            <a href="cake_list.php" class="btn btn-secondary">Back to Cake List</a>
        </div>
    </form>
</div>

</body>
</html>