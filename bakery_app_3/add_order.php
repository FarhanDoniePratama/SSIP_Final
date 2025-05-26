<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Order</title>
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

<h1 class="mb-4"><i class="fas fa-cart-plus me-2"></i>Add New Order</h1>

<div class="card p-4">
    <form method="post">
        <div class="mb-3">
            <label for="customer_id" class="form-label">Select Customer</label>
            <select class="form-select" id="customer_id" name="customer_id" required>
                <option value="" disabled selected>Select Customer</option>
                <?php
                $customer_query = $conn->query("SELECT * FROM customer");
                while ($customer = $customer_query->fetch_assoc()) {
                    echo "<option value='" . $customer['customer_id'] . "'>" . $customer['name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Order Date</label>
            <input type="date" class="form-control" id="order_date" name="order_date" required>
        </div>

        <div class="mb-3">
            <label for="payment_status" class="form-label">Payment Status</label>
            <select class="form-select" id="payment_status" name="payment_status" required>
                <option value="Pending">Pending</option>
                <option value="Paid">Paid</option>
                <option value="Cancelled">Cancelled</option>
            </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
        <button type="submit" name="submit" class="btn btn-primary">Add Order</button>
            <a href="order_list.php" class="btn btn-secondary">Back to Order List</a>
        </div>
    </form>
</div>

<?php
if (isset($_POST['submit'])) {
    $customer_id = $_POST['customer_id'];
    $order_date = $_POST['order_date'];
    $payment_status = $_POST['payment_status'];

    $sql = "INSERT INTO cake_order (customer_id, order_date, payment_status) VALUES ('$customer_id', '$order_date', '$payment_status')";

    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-4'>Order added successfully!</div>";
    } else {
        echo "<div class='alert alert-danger mt-4'>Error: " . $conn->error . "</div>";
    }
}
?>

</body>
</html>
