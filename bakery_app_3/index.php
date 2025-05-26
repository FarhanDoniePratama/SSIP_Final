<!DOCTYPE html>
<html>
<head>
    <title>Bakery Management System</title>
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
 
<h1 class="mb-4 text-center">Anugerah Bakery</h1>

<div class="row g-4">

    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="card-title">Cakes</h3>
            <p class="card-text">View, add, edit, or delete cakes.</p>
            <a href="cake_list.php" class="btn btn-primary">Manage Cakes</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="card-title">Customers</h3>
            <p class="card-text">View, add, edit, or delete customer information.</p>
            <a href="customer_list.php" class="btn btn-primary">Manage Customers</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="card-title">Orders</h3>
            <p class="card-text">Manage customer orders and payments.</p>
            <a href="order_list.php" class="btn btn-primary">Manage Orders</a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-4">
            <h3 class="card-title">Reviews</h3>
            <p class="card-text">View and manage cake reviews.</p>
            <a href="review_list.php" class="btn btn-primary">Manage Reviews</a>
        </div>
    </div>

</div>

</body>
</html>
