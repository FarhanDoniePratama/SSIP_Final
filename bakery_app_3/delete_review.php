<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM review WHERE review_id = $id");
    header("Location: review_list.php");
}
?>
