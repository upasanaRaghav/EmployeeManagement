<?php
include 'includes/db.php';
include 'includes/session.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == 'root@gmail.com' && $password == 'root') {
        $_SESSION['user_id'] = 1;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid Credentials..!!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Dancing+Script|Roboto">
</head>
<body>
    <div class="panda">
        <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
            <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
        <div class="body"></div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>
    </div>
    <form action="login.php" method="post" class="<?php echo !empty($error) ? 'wrong-entry' : ''; ?>">
        <div class="hand"></div>
        <div class="hand rgt"></div>
        <h1>Employee Login</h1>
        <div class="form-group">
            <input type="email" name="email" required="required" class="form-control"/>
            <label class="form-label">Email</label>
        </div>
        <div class="form-group">
            <input id="password" type="password" name="password" required="required" class="form-control"/>
            <label class="form-label">Password</label>
            <p class="alert"><?php echo $error; ?></p>
            <button type="submit" class="btn">Login</button>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>