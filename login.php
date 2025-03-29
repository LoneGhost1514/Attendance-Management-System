<html>
<head>
    <title>Login | Attendance Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><button class="btn">Back To Home</button></a>
            <a href="register.php"><button class="btn">Register New Teacher</button></a>
        </nav>
    </header>
    <main>
        <div id="form">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <table>
                    <tr><td><input class="inp" placeholder="Email" type="email" name="txtemail" required></td></tr>
                    <tr><td><input class="inp" placeholder="Password" type="password" name="txtpass" required></td></tr>

                    <tr><td><center><input  class="btn btn-submit" type="submit" value="Login" name="btnlogin" ></center></tr>
                </table>
            </form>
        </div>
    </main>
    
</body>
</html>

<?php
include 'db.php';
session_start();

if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
}

if (isset($_POST["btnlogin"])) 
{
    $email = $_POST['txtemail'];
    $pass = $_POST['txtpass'];
    $qry = "SELECT * FROM teacher WHERE email='$email' and password='$pass'";
    $result=mysqli_query($conn,$qry);
    if (mysqli_num_rows($result) == 1 ) {
        $_SESSION['user']=$email;
        header('location:dashboard.php');
    } else {
        echo "<script type='text/javascript'>showAlert('Incorrect username or password');</script>";
    }
}
?>
