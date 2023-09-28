<!doctype html>
<html lang="en">
  <head>
  <style type="text/css">
    body{background-color:black}
    table    {  background-color:#F6F6F6;  }
    table td { border:inset 1px #000; }
    table th { border:inset 1px #000; }
        
        
          
          
        
        form{
          color:"black";
        }
        </style>
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form</title>
    
  </head>
  
<?php

if (isset($_POST["bt_sbmt"]) && isset($_POST["search"])) {
    $search = $_POST["search"];

    $con=mysqli_connect("localhost","root","");
     mysqli_select_db($con,"form");

    if (mysqli_connect_errno()) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $search = mysqli_real_escape_string($con, $search);

    $sqlquery = "select * from bloodform where blood_type = '$search' ";

    $result = mysqli_query($con, $sqlquery);

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<br><br>
    <center>
        <table cellpadding="3" cellspacing="0" >
            <tr>
                <th>Name</th>
                <th>ADD</th>
                <th>Phone</th>
                <th>Blood group</th>
                <th> </th>

                <?php
                if (isset($result) && $result->num_rows > 0) {
                    $sn = 1;
                    while ($data = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td><?php echo $data['name'] ?></td>
                            <td><?php echo $data['add'] ?></td>
                            <td><?php echo $data['phn'] ?></td>
                            <td><?php echo $data['blood_type'] ?></td>
                            <td><a href="tel:<?php echo $data['phn']; ?>">Call</a></td>

                        </tr>
                        <?php
                        $sn++;
                    }
                } 
                ?>
            </table>
        </center>
        <br><br><br><br>
    </body>
</html>
