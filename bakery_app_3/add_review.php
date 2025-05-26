<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Review</title>
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

<h1 class="mb-4"><i class="fas fa-star me-2"></i>Add Review</h1>

<div class="card p-4">
    <form method="post">
        <div class="mb-3">
            <label>Customer</label>
            <select name="customer_id" class="form-select" required>
                <option disabled selected>Select Customer</option>
                <?php
                $customers = $conn->query("SELECT * FROM customer");
                while ($c = $customers->fetch_assoc()) {
                    echo "<option value='{$c['customer_id']}'>{$c['name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Cake</label>
            <select name="cake_id" class="form-select" required>
                <option disabled selected>Select Cake</option>
                <?php
                $cakes = $conn->query("SELECT * FROM cake");
                while ($c = $cakes->fetch_assoc()) {
                    echo "<option value='{$c['cake_id']}'>{$c['cake_name']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Rating (1–5)</label>
            <input type="number" name="rating" min="1" max="5" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Comment</label>
            <textarea name="comment" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="review_date" class="form-control" required>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button type="submit" name="submit" class="btn btn-primary">Submit Review</button>
            <a href="review_list.php" class="btn btn-secondary">Back to Review List</a>
        </div>
    </form>
</div>
<div class="text-end mb-3">
</div>
<?php
if (isset($_POST['submit'])) {
    $customer_id = $_POST['customer_id'];
    $cake_id     = $_POST['cake_id'];
    $rating      = $_POST['rating'];
    $comment     = $_POST['comment'];
    $review_date = $_POST['review_date'];

    $sql = "INSERT INTO review (customer_id, cake_id, rating, comment, review_date)
            VALUES ('$customer_id', '$cake_id', '$rating', '$comment', '$review_date')";

    if ($conn->query($sql)) {
        echo "<div class='alert alert-success mt-3'>Review added!</div>";
    } else {
        echo "<div class='alert alert-danger mt-3'>Error: {$conn->error}</div>";
    }
}
?>

</body>
</html>
