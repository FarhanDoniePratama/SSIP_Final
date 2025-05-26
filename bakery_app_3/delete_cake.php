<?php
include 'db.php';

if (isset($_GET['id'])) {
    $cake_id = $_GET['id'];

    $conn->query("DELETE FROM cake WHERE cake_id = $cake_id");

    header("Location: cake_list.php");
}
?>
