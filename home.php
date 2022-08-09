<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['username'])){


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HOME</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Hello , <?php echo $_SESSION['username']; ?></h1><br>
    <a href="logout.php">LogOut</a>
</body>
</html>

<?php
}else{
    header("Location: login.php");
    exit();
}
?>