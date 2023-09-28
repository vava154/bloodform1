<?php
        header("location:listform.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student</title>
    <style type="text/css">
        body {
            background-color: black;
        }
        table {
            background-color: #F6F6F6;
        }
        table td, table th {
            border: inset 1px #000;
        }
    </style>
</head>
<body>
<br>

    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>form</title>
    
  </head>
  
<body>
<br>
<?php
    echo"<center><font size = 7 face ='ariel black'>Details</font></center><br><br>";
    
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"form");
    $name=$_REQUEST['name'];
    $add=$_REQUEST['add'];
    $phn=$_REQUEST['phn'];
    $blood_type=$_REQUEST['blood_type'];


    $sqlquery = "insert into bloodform (`name`, `phn`, `blood_type`, `add`) VALUES ('$name','$phn', '$blood_type', '$add')";
    ?>    
      
        
    
  <center> 
<table cellpadding="3" cellspacing="0">
  <tr>
  
    <th>name</th>
    <th>add</th>
    <th>phn</th>
    <th>blood_type</th>
   
<?php
if (mysqli_query($con,$sqlquery)) {
  $sn=1;
?>
  <tr>
  
    <td><?php echo $name?></td>
    <td><?php echo $add?></td>
    <td><?php echo $phn?></td> 
    <td><?php echo $blood_type?></td> 
    
</tr>
<?php echo"<font size=6 face='arialblack'>Successfully added</font>";
 $sn++;}?>
</table>
</center>
<br><br><br>

</body>
</html>