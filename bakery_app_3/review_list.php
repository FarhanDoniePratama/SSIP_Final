<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Review List</title>
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

<h1 class="mb-4"><i class="fas fa-comments me-2"></i>Cake Reviews</h1>

<table class="table table-striped table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Cake</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>

<?php
$sql = "SELECT review.review_id, customer.name AS customer_name, cake.cake_name, 
               review.rating, review.comment, review.review_date
        FROM review
        JOIN customer ON review.customer_id = customer.customer_id
        JOIN cake ON review.cake_id = cake.cake_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['review_id']}</td>";
        echo "<td>{$row['customer_name']}</td>";
        echo "<td>{$row['cake_name']}</td>";
        echo "<td>{$row['rating']}</td>";
        echo "<td>{$row['comment']}</td>";
        echo "<td>{$row['review_date']}</td>";
        echo "<td>
                <a href='edit_review.php?id={$row['review_id']}' class='btn btn-warning btn-sm'>Edit</a>
                <a href='delete_review.php?id={$row['review_id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure?\")'>Delete</a>
              </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7'>No reviews found</td></tr>";
}
?>

    </tbody>
</table>

<div class="text-end mt-4">
<a href="add_review.php" class="btn btn-primary">Add New Review</a>
    <a href="index.php" class="btn btn-secondary">Back to Home</a>
</div>

</body>
</html>
