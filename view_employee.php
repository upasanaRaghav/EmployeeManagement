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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">View Employee</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
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
        </div>
    </div>
</body>
</html>
