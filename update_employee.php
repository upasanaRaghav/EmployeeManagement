<?php
include 'includes/session.php';
requireLogin();
include 'includes/db.php';

$errorMessages = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $profile_picture = $_POST['existing_picture'];

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($_FILES['profile_picture']['name']) {
        $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
        if ($check === false) {
            $errorMessages[] = "File is not an image.";
            $uploadOk = 0;
        }

        if (file_exists($target_file)) {
            $errorMessages[] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["profile_picture"]["size"] > 500000) {
            $errorMessages[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            $errorMessages[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk && move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $profile_picture = $target_file;
        } else {
            $errorMessages[] = "Sorry, there was an error uploading your file.";
        }
    }

    if (empty($errorMessages)) {
        $sql = "UPDATE employees SET firstname='$firstname', lastname='$lastname', email='$email', phone='$phone', position='$position', profile_picture='$profile_picture' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            header("Location: index.php");
        } else {
            $errorMessages[] = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        die("Employee not found");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Employee</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, rgb(237, 59, 118), rgb(146, 221, 244));
            font-family: 'Arial', sans-serif;
        }
        .container {
            max-width: 600px;
            margin-top: 50px;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border-radius: 10px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #343a40;
        }
        .form-group label {
            color: #495057;
            font-weight: 600;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .error-message {
            color: red;
            background-color: black;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Employee</h2>
        <?php if (!empty($errorMessages)): ?>
            <div class="error-message">
                <?php foreach ($errorMessages as $errorMessage): ?>
                    <p><?php echo $errorMessage; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
        <form action="update_employee.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <input type="hidden" name="existing_picture" value="<?php echo $row['profile_picture']; ?>">
            <div class="form-group">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="firstname" name="firstname" required pattern="[A-Za-z]{2,}" title="First name must be at least 2 letters" value="<?php echo $row['firstname']; ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name:</label>
                <input type="text" class="form-control" id="lastname" name="lastname" required pattern="[A-Za-z]{2,}" title="Last name must be at least 2 letters" value="<?php echo $row['lastname']; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required value="<?php echo $row['email']; ?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required pattern="\d{10}" title="Phone number must be exactly 10 digits" value="<?php echo $row['phone']; ?>">
            </div>
            <div class="form-group">
                <label for="position">Position:</label>
                <input type="text" class="form-control" id="position" name="position" required value="<?php echo $row['position']; ?>">
            </div>
            <div class="form-group">
                <label for="profile_picture">Profile Picture:</label>
                <input type="file" class="form-control-file" id="profile_picture" name="profile_picture">
                <?php if ($row['profile_picture']): ?>
                    <img src="<?php echo $row['profile_picture']; ?>" alt="Profile Picture" class="img-thumbnail" style="margin-top: 10px;">
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update</button>
        </form>
    </div>
</body>
</html>
