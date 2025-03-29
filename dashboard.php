<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user']))
{
    header("location:index.php");
}
?>

<html>
<head>
    <title>Dashboard | Attendance Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <h1> Attandance Management System</h1>
            <a href="logout.php"><button class="btn btn-logout" >Logout</button></a>
        </nav>
    </header>   
    <main>
        <div id="hero">
            <h1 class="tcenter">Welcome Teacher !</h1>
            <p class="tcenter">Welcome To Attendance Management System, here you can add students and view student reports</p>
            <br><br>
            <table>
                <form method="post">
                    <tr>
                        <td colspan=4><input type="date" name="txtdate" required></td>
                       
                    </tr>
                    <tr>
                        <td><input type="submit" name="btnadd" class="btn" value="Add attendance"></td>
                        <td><input type="submit" name="btnview" class="btn" formaction="attendance.php" value="View Attendance"></td>
                        <td><input type="submit" name="btnupdate" class="btn" formaction="updateattendance.php" value="Update Attendance"></td>
                        <td><input type="submit" name="btndelete" class="btn" formaction="deleteattendance.php" value="Delete Attendance"></td>

                    </tr>
                </form>

            </table>    
        </div>
        <?php
            $date = $_POST['txtdate'];
            if(isset($_POST['btnadd'])){
                $qry= "SELECT * FROM attendance WHERE date='$date'";
                $result = mysqli_query($conn, $qry);
                if(mysqli_num_rows($result)>0)
                {
                    echo "<center><h1>Attendance Already Exists for $date</h1></center>";
                }
                else
                {
                    setcookie('date',$date,time()+(24*60*60));
                    header('location:addattendance.php');
                }
            }
        ?>
        <div>
            <h1 class="tcenter">All Records</h1>
            <table id="records" border="1">
            <tr><th>Enroll</th><th>Name</th><th>Date</th><th>Status</th></tr>

            <?php
            $date=$_POST['txtdate'];
            $qry="SELECT * from attendance";
            $result = mysqli_query($conn,$qry);
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>
                <td>".$row[0]."</td>
                <td>".$row[1]."</td>
                <td>".$row[2]."</td>
                <td>".$row[3]."</td>
                </tr>";
            }
            ?>
            </table>
        </div>
    </main> 
  
</body>
</html>

