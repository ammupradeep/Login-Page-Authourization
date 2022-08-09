<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>PhP SignUP</title>
</head>
<body>
    <form action="signup-check.php" method="post">
        <h2>SIGNUP</h2>
        <?php if(isset($_GET['error'])){?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])){ ?>
            <p class="success"> <?php echo $_GET['success']; ?></p>
        <?php } ?>
        
        <label>UserName</label>
        <?php if(isset($_GET['uname'])) { ?>
            <input type="text" 
                   name="username" 
                   placeholder="User Name"
                   value="<?php echo $_GET['uname']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="username" 
                   placeholder="User Name"><br>
        <?php } ?>

        <label>Email ID</label>
        <?php if(isset($_GET['email'])) { ?>
            <input type="text" 
                   name="emailid" 
                   placeholder="Email ID"
                   value="<?php echo $_GET['email']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="emailid" 
                   placeholder="Email ID"><br>
        <?php } ?>

        <label>Password</label>
        <input type="password"
               name="password" 
               placeholder="Password"><br>

        <button type="submit">SIGNUP</button>
        <a href="login.php" class="ca">Already have an account?</a>
    </form>
</body>
</html>