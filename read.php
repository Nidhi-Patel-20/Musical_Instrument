<?php
require 'db.php';

// Fetch all instruments from the database
$instruments = $pdo->query("SELECT * FROM instruments")->fetchAll(PDO::FETCH_ASSOC);

if (!$instruments) {
    echo "No instruments found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Instruments</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 2rem;
            background-color: #fff;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
        }
        th, td {
            padding: 1rem;
            text-align: left;
            border-top: 1px solid #dee2e6;
        }
        th {
            background-color: #343a40;
            color: #fff;
        }
        .btn {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: white;
            border: none;
        }
        .btn-primary:hover {
            background-color: #45a049;
        }
        .btn-warning {
            background-color: #ffc107;
            color: white;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Instrument Inventory</h1>

        <?php if (count($instruments) > 0): ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Instrument Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($instruments as $instrument): ?>
                        <tr>
                            <td><?php echo $instrument['id']; ?></td>
                            <td><?php echo htmlspecialchars($instrument['instrument_name']); ?></td>
                            <td><?php echo htmlspecialchars($instrument['instrument_description']); ?></td>
                            <td><?php echo htmlspecialchars($instrument['quantity_available']); ?></td>
                            <td><?php echo htmlspecialchars($instrument['price']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($instrument['image_url']); ?>" alt="Instrument Image" width="100">
                            </td>
                            <td><?php echo htmlspecialchars($instrument['category']); ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $instrument['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $instrument['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No instruments found.</p>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
