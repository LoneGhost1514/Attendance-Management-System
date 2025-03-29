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
    <title>Mark Attendance</title>
    <link rel="stylesheet" href="style.css">
    </head>
<body>
    <header>
        <nav>
            <a href="dashboard.php"><button class="btn">Back To Dashboard</button></a>
        </nav>
    </header>
    <main>
        <h2 class="tcenter"> Adding attendance for <?php echo $_POST['txtdate']; ?> </h2>
        <form method="post">
        <table id="records" border="1">
            <tr><th>Enroll</th><th>Name</th><th>Date</th><th>Status</th></tr>
            <?php
            $date=$_COOKIE['date'];
            $qry="SELECT * from students";
            $result = mysqli_query($conn,$qry);
            while($row = mysqli_fetch_array($result))
            {
                echo "<tr>
                <td><input type='hidden' name='enroll[]' value='".$row[0]."'>".$row[0]."</td>
                <td><input type='hidden' name='name[]' value='".$row[1]."'>".$row[1]."</td>
                <td>$date<input type='hidden' name='date[]' value='$date'></td>
                <td>
                    <select name='status[]' required> 
                        <option value='Present'>Present</option>
                        <option value='Absent'>Absent</option>
                        <option value='On leave'>On leave</option>
                    </select>
                </td>
              </tr>";
            }
            ?>
            
        </table>
        <center><input type="submit" class="btn" name="btnsubmit" value="Add attendance"></center>
        </form>
    </main>

</body>
</html>

<?php
if (isset($_POST['btnsubmit'])) {
    
    $enrolls = $_POST['enroll'];
    $names = $_POST['name'];
    $dates = $_POST['date'];
    $statuses = $_POST['status'];

    for ($i = 0; $i < count($enrolls); $i++) {
        $enroll =  $enrolls[$i];
        $name =  $names[$i];
        $date =  $dates[$i];
        $status = $statuses[$i];

        $qry = "INSERT INTO attendance (enroll,name, date, status) VALUES ('$enroll','$name', '$date', '$status')";

        if (!mysqli_query($conn, $qry)) {
            echo "Error Inserting record for $enroll";
        }
    }
    header("location:dashboard.php");
}

?>
