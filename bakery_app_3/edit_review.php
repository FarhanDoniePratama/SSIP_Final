<?php
include 'db.php';

$id = $_GET['id'];
$review = $conn->query("SELECT * FROM review WHERE review_id = $id")->fetch_assoc();

if (isset($_POST['update'])) {
    $customer_id = $_POST['customer_id'];
    $cake_id     = $_POST['cake_id'];
    $rating      = $_POST['rating'];
    $comment     = $_POST['comment'];
    $review_date = $_POST['review_date'];

    $conn->query("UPDATE review SET customer_id='$customer_id', cake_id='$cake_id', rating='$rating', comment='$comment', review_date='$review_date' WHERE review_id=$id");

    header("Location: review_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Review</title>
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
<body class="container mt-5">

<h1>Edit Review</h1>

<form method="post" class="card p-4">
    <div class="mb-3">
        <label>Customer</label>
        <select name="customer_id" class="form-select">
            <?php
            $customers = $conn->query("SELECT * FROM customer");
            while ($c = $customers->fetch_assoc()) {
                $sel = ($c['customer_id'] == $review['customer_id']) ? "selected" : "";
                echo "<option value='{$c['customer_id']}' $sel>{$c['name']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Cake</label>
        <select name="cake_id" class="form-select">
            <?php
            $cakes = $conn->query("SELECT * FROM cake");
            while ($c = $cakes->fetch_assoc()) {
                $sel = ($c['cake_id'] == $review['cake_id']) ? "selected" : "";
                echo "<option value='{$c['cake_id']}' $sel>{$c['cake_name']}</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Rating</label>
        <input type="number" name="rating" value="<?php echo $review['rating']; ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Comment</label>
        <textarea name="comment" class="form-control"><?php echo $review['comment']; ?></textarea>
    </div>

    <div class="mb-3">
        <label>Date</label>
        <input type="date" name="review_date" value="<?php echo $review['review_date']; ?>" class="form-control">
    </div>

    <button type="submit" name="update" class="btn btn-primary">Update Review</button>
</form>

</body>
</html>
