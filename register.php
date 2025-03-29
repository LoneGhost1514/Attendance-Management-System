<html>
<head>
    <title>Register | Attendance Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.php"><button class="btn">Back To Home</button></a>
            <a href="login.php"><button class="btn btn-login">Login</button></a>
        </nav>
    </header>
    <main>
        <h1 class="tcenter">Register New Teacher </h1>
        <div id="form">
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <table>
                    <tr><td><input class="inp" placeholder="First Name" type="text" name="txtfname" required></td></tr>
                    <tr><td><input class="inp" placeholder="Last Name" type="text" name="txtlname" required></td></tr>
                    <tr><td>Gender : <input type="radio" name="rdgender" id="gender" value="Male" checked > Male <input type="radio" name="rdgender" id="gender" value="Female"> Female</td></tr>
                    <tr><td><input class="inp" placeholder="Contact no." type="number" name="txtnumber" required></td></tr>
                    <tr><td><input class="inp" placeholder="Email" type="email" name="txtemail" required></td></tr>
                    <tr><td><input class="inp" placeholder="Password" type="password" name="txtpass" required></td></tr>

                    <tr><td><center><input  class="btn btn-submit" type="submit" value="Register" name="btnregister" ></center></tr>
                </table>
            </form>
        </div>
    </main>
    
</body>
</html>

<?php
if(isset($_POST['btnregister']))
{
    include 'db.php';
    $fname=$_POST['txtfname'];
    $lname=$_POST['txtlname'];
    $gender=$_POST['rdgender'];
    $email=$_POST['txtemail'];
    $number=$_POST['txtnumber'];
    $pass=$_POST['txtpass'];
    $qry="insert into teacher values('$fname','$lname','$gender','$email',$number,'$pass');";
    $ans=mysqli_query($conn,$qry);
    if($ans)
    {
        echo "<center>Regustration Completed successfully</center>";
    } 
}
?>