<?php
require_once 'db.php';

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the instrument by ID
    deleteInstrument($id);

    // Redirect back to read.php
    header('Location: read.php');
    exit;
} else {
    // Redirect if no ID is provided
    header('Location: read.php');
    exit;
}
?>
