<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cake List</title>
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

<h1 class="mb-4"><i class="fas fa-list me-2"></i>Cake List</h1>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Size</th>
            <th>Price</th>
            <th>Actions</th> 
        </tr>
    </thead>
    <tbody>
    
<?php
// Join cake with cake_type and cake_size tables to get type and size names
$sql = "SELECT cake.cake_id, cake.cake_name, cake.price, 
               cake_type.type_name, cake_size.size_label 
        FROM cake 
        LEFT JOIN cake_type ON cake.type_id = cake_type.type_id 
        LEFT JOIN cake_size ON cake.size_id = cake_size.size_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['cake_id'] . "</td>";
        echo "<td>" . $row['cake_name'] . "</td>";
        echo "<td>" . $row['type_name'] . "</td>";
        echo "<td>" . $row['size_label'] . "</td>";
        echo "<td>Rp " . $row['price'] . "</td>";
        
        echo "<td>
                <a href='edit_cake.php?id=" . $row['cake_id'] . "' class='btn btn-warning btn-sm'>Edit</a> | 
                <a href='delete_cake.php?id=" . $row['cake_id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\");'>Delete</a>
              </td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6'>No cakes found</td></tr>"; 
}
?>
    </tbody>
</table>

<div class="text-end mb-3">
    <a href="add_cake.php" class="btn btn-primary">Add New Cake</a>
    <a href="index.php" class="btn btn-secondary">Home</a>
</div>

</body>
</html>