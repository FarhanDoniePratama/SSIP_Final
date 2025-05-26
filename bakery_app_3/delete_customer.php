<?php
include 'db.php';

if (isset($_GET['id'])) {
    $customer_id = $_GET['id'];

    $conn->query("DELETE FROM customer WHERE customer_id = $customer_id");

    header("Location: customer_list.php");
}
?>
