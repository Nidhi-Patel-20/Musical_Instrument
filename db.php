<?php
$host = 'localhost'; // or your host
$db   = 'guitar_store'; // replace with your database name
$user = 'root'; // replace with your database username
$pass = ''; // replace with your database password
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Function to create an instrument
function createInstrument($instrumentName, $instrumentDescription, $quantityAvailable, $price, $imageURL, $category, $product_added_by) {
    global $pdo; // Use the global PDO connection
    $sql = "INSERT INTO instruments (instrument_name, instrument_description, quantity_available, price, image_url, category, product_added_by) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$instrumentName, $instrumentDescription, $quantityAvailable, $price, $imageURL, $category, $product_added_by]);
}

// Fetch all instruments from the database
function readInstruments() {
    global $pdo;
    $sql = "SELECT * FROM instruments";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll();
}

// Fetch a single instrument by ID
function getInstrumentById($id) {
    global $pdo;
    $sql = "SELECT * FROM instruments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch();
}

// Update an instrument
function updateInstrument($id, $instrumentName, $instrumentDescription, $quantityAvailable, $price, $imageURL, $category) {
    global $pdo;
    $sql = "UPDATE instruments SET instrumentName = ?, instrumentDescription = ?, quantityAvailable = ?, price = ?, imageURL = ?, category = ? 
            WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$instrumentName, $instrumentDescription, $quantityAvailable, $price, $imageURL, $category, $id]);
}

// Delete an instrument
function deleteInstrument($id) {
    global $pdo;
    $sql = "DELETE FROM instruments WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}
?>