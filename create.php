<?php
include 'db.php';

// Initialize variables
$instrumentName = '';
$instrumentDescription = '';
$quantityAvailable = '';
$price = '';
$imageURL = '';
$category = '';
$productAddedBy = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $instrumentName = $_POST['instrumentName'];
    $instrumentDescription = $_POST['instrumentDescription'];
    $quantityAvailable = $_POST['quantityAvailable'];
    $price = $_POST['price'];
    $imageURL = $_POST['imageURL'];
    $category = $_POST['category'];  
    $product_added_by = $_POST['product_added_by'];

    // Call the function and pass all the parameters
    if (createInstrument($instrumentName, $instrumentDescription, $quantityAvailable, $price, $imageURL, $category, $product_added_by)) {
        echo "<p>Instrument created successfully!</p>";
    } else {
        echo "<p>Error creating instrument.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Instrument</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<!-- Your HTML form -->
<h1>Create Instrument</h1>
<form method="POST" action="create.php">
    <label for="instrumentName">Instrument Name:</label>
    <input type="text" id="instrumentName" name="instrumentName" value="<?php echo htmlspecialchars($instrumentName); ?>" required>

    <label for="instrumentDescription">Instrument Description:</label>
    <input type="text" id="instrumentDescription" name="instrumentDescription" value="<?php echo htmlspecialchars($instrumentDescription); ?>" required>

    <label for="quantityAvailable">Quantity Available:</label>
    <input type="number" id="quantityAvailable" name="quantityAvailable" value="<?php echo htmlspecialchars($quantityAvailable); ?>" required>

    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($price); ?>" required>

    <label for="imageURL">Image URL:</label>
    <input type="text" id="imageURL" name="imageURL" value="<?php echo htmlspecialchars($imageURL); ?>" required>

    <label for="category">Category:</label>
    <select id="category" name="category" required>
        <option value="">Select a Category</option>
        <option value="Guitar" <?php if ($category == 'Guitar') echo 'selected'; ?>>Guitar</option>
        <option value="Piano" <?php if ($category == 'Piano') echo 'selected'; ?>>Piano</option>
        <option value="Drums" <?php if ($category == 'Drums') echo 'selected'; ?>>Drums</option>
        <option value="Violin" <?php if ($category == 'Violin') echo 'selected'; ?>>Violin</option>
    </select>

    <label for="product_added_by">Product Added By:</label>
    <input type="text" id="product_added_by" name="product_added_by" required>

    <button type="submit">Add Instrument</button>
</form>

</body>
</html>
