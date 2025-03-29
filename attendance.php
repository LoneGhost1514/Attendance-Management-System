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
    <title>Reports | Attendance Management System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="dashboard.php"><button class="btn">Back To Dashboard</button></a>
        </nav>
    </header>
    <main>
        <h1 class="tcenter">Viewing Attendance of <?php echo $_POST['txtdate'];?></h1>
        <div>
            <table id="records" border="1">
            <tr><th>Enroll</th><th>Name</th><th>Date</th><th>Status</th></tr>

            <?php
            $date=$_POST['txtdate'];
            $qry="SELECT * from attendance where date='$date'";
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

