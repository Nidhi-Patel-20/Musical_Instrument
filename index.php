<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Musical Instruments Store</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .navbar {
            background-color: #0056a6;
            color: #fff;
            padding: 1rem;
            text-align: center;
        }
        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff;
        }
        .nav-link {
            color: #fff;
            transition: color 0.2s ease;
        }
        .nav-link:hover {
            color: #121212;
        }

        .hero {
            position: relative;
            text-align: center;
            color: white;
            background: url('image/main_image_instruments.jpg') no-repeat center center/cover;
            height: 60vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: rgba(0, 86, 166, 0.8);
            padding: 20px 40px;
            border-radius: 10px;
        }

        .container h1 {
            font-size: 3em;
            margin: 0 0 20px;
        }
        .container p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        section {
            margin-bottom: 40px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        section h2 {
            font-size: 2.2em;
            margin-bottom: 20px;
            color: #0056a6;
        }
        section p {
            font-size: 1.2em;
            margin: 0;
        }
        .btn {
            padding: 1rem 2rem;
            font-size: 1.2rem;
            border-radius: 10px;
        }
        .btn-primary {
            background-color: #4CAF50;
            color: #fff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #3e8e41;
        }
        footer {
            background: #0056a6;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.1);
        }
        footer p {
            margin: 0;
            font-size: 1em;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">Musical Instruments Store</a>
        <ul class="nav justify-content-end">
            <li class="nav-item">
                <a class="nav-link" href="create.php"><i class="fas fa-plus"></i> Add Instrument</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="read.php"><i class="fas fa-list"></i> View Instruments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="edit.php"><i class="fas fa-edit"></i> Update Instrument</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="delete.php"><i class="fas fa-trash"></i> Delete Instrument</a>
            </li>
        </ul>
    </nav>

    <section class="hero">
        <div class="container">
            <h1>Welcome to Your Music Store</h1>
            <p>Find a wide selection of musical instruments at affordable prices. Start your musical journey today!</p>
        </div>
    </section>

    <section class="mission">
        <h2>Our Mission</h2>
        <p>We strive to provide high-quality musical instruments to musicians of all skill levels.</p>
    </section>

    <footer>
        <p>© 2024 Musical Instruments Store. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
