<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
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

<h1 class="mb-4"><i class="fas fa-user-plus me-2"></i>Add New Customer</h1>

<div class="card p-4">
    <form method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Customer Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address"></textarea>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" name="submit" class="btn btn-primary">Add Customer</button>
            <a href="customer_list.php" class="btn btn-secondary">Back to Customer List</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO customer (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-4'>Customer added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-4'>Error: " . $conn->error . "</div>";
    }
}
?>

</body>
</html>
