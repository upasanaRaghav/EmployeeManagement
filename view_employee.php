<?php
include 'includes/session.php';
requireLogin();
include 'includes/db.php';

$id = $_GET['id'];
$sql = "SELECT * FROM employees WHERE id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $employee = $result->fetch_assoc();
} else {
    echo "Employee not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, rgb(237, 59, 118), rgb(146, 221, 244));
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .card {
            border-radius: 10px;
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #f8f9fa;
            border-bottom: none;
        }
        .card-title {
            color: #343a40;
            font-weight: 600;
        }
        .card-body p {
            color: #495057;
        }
        .btn-secondary {
            background-color: pink;
            border-color: white;
            border-radius: 5px;
            width: 100%;
            padding: 10px;
            text-decoration: none;

        }
        .btn-secondary:hover {
            background-color: #ADD8E6 ;
            border-color: white;

            
        }
        .img-thumbnail {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">View Employee</h2>
        <div class="card mb-3">
            <div class="card-header">
                <h4 class="card-title"><?php echo $employee['firstname'] . ' ' . $employee['lastname']; ?></h4>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> <?php echo $employee['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $employee['phone']; ?></p>
                <p><strong>Position:</strong> <?php echo $employee['position']; ?></p>
                <p><strong>Profile Picture:</strong></p>
                <img src="<?php echo $employee['profile_picture']; ?>" alt="Profile Picture" class="img-thumbnail">
            </div>
        </div>
        <a href="index.php" class="btn btn-secondary">Back to List</a>
    </div>
</body>
</html>
