<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM customer WHERE customer_id = $id");
    $customer = $result->fetch_assoc();
}

if (isset($_POST['update'])) {
    $name    = $_POST['name'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $address = $_POST['address'];

    $conn->query("UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address' WHERE customer_id=$id");

    header("Location: customer_list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
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

<h1>Edit Customer</h1>

<form method="post" class="card p-4">
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $customer['name']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $customer['email']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="<?php echo $customer['phone']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"><?php echo $customer['address']; ?></textarea>
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

</body>
</html>
