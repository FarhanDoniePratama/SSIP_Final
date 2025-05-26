<?php
include 'db.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $conn->query("DELETE FROM cake_order WHERE order_id = $order_id");

    header("Location: order_list.php");
}
?>
