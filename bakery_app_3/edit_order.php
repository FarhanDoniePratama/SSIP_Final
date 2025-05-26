<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM cake_order WHERE order_id = $id");
    $order = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $customer_id = $_POST['customer_id'];
    $order_date = $_POST['order_date'];
    $payment_status = $_POST['payment_status'];

    $conn->query("UPDATE cake_order SET customer_id='$customer_id', order_date='$order_date', payment_status='$payment_status' WHERE order_id=$id");

    header("Location: order_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
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

<h1>Edit Order</h1>

<form method="post" class="card p-4">
    <div class="mb-3">
        <label>Customer</label>
        <select name="customer_id" class="form-select" required>
            <?php
            $customers = $conn->query("SELECT * FROM customer");
            while ($c = $customers->fetch_assoc()) {
                $selected = ($c['customer_id'] == $order['customer_id']) ? "selected" : "";
                echo "<option value='{$c['customer_id']}' $selected>{$c['name']}</option>";
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label>Order Date</label>
        <input type="date" name="order_date" value="<?php echo $order['order_date']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Payment Status</label>
        <select name="payment_status" class="form-select">
            <?php
            foreach (['Pending', 'Paid', 'Cancelled'] as $status) {
                $selected = ($order['payment_status'] === $status) ? "selected" : "";
                echo "<option $selected>$status</option>";
            }
            ?>
        </select>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update Order</button>
</form>

</body>
</html>
