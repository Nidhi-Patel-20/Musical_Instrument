<?php
require 'db.php';

// Check if an ID is provided
if (!isset($_GET['id'])) {
    echo "No instrument ID provided.";
    exit;
}

$id = $_GET['id'];

// Fetch the existing instrument data
$stmt = $pdo->prepare("SELECT * FROM instruments WHERE id = ?");
$stmt->execute([$id]);
$instrument = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$instrument) {
    echo "Instrument not found.";
    exit;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $instrumentName = $_POST['instrumentName'] ?? '';
    $instrumentDescription = $_POST['instrumentDescription'] ?? '';
    $quantityAvailable = $_POST['quantityAvailable'] ?? '';
    $price = $_POST['price'] ?? '';
    $imageURL = $_POST['imageURL'] ?? '';
    $category = $_POST['category'] ?? '';

    // Update the instrument in the database
    $stmt = $pdo->prepare("UPDATE instruments SET instrument_name = ?, instrument_description = ?, quantity_available = ?, price = ?, image_url = ?, category = ? WHERE id = ?");
    $stmt->execute([$instrumentName, $instrumentDescription, $quantityAvailable, $price, $imageURL, $category, $id]);

    // Redirect to read.php after updating
    header("Location: read.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Instrument</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Instrument</h1>
        <form method="post">
            <div class="form-group">
                <label for="instrumentName">Instrument Name</label>
                <input type="text" class="form-control" id="instrumentName" name="instrumentName" value="<?php echo htmlspecialchars($instrument['instrument_name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="instrumentDescription">Description</label>
                <textarea class="form-control" id="instrumentDescription" name="instrumentDescription" required><?php echo htmlspecialchars($instrument['instrument_description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="quantityAvailable">Quantity Available</label>
                <input type="number" class="form-control" id="quantityAvailable" name="quantityAvailable" value="<?php echo htmlspecialchars($instrument['quantity_available']); ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($instrument['price']); ?>" required>
            </div>
            <div class="form-group">
                <label for="imageURL">Image URL</label>
                <input type="text" class="form-control" id="imageURL" name="imageURL" value="<?php echo htmlspecialchars($instrument['image_url']); ?>" required>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($instrument['category']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
