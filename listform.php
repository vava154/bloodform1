
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
 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Form</title>
    
  </head>
  
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Details</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Portal</a>
      </li>
      
      
    </ul>
    <form class="d-flex" role="Search">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
  </div>
</nav>
<br>
    <?php
        echo"<center><font size = 7 face ='ariel black'>Doctor Portal</font></center><br><br>";

    
    $con=mysqli_connect("localhost","root","");
    mysqli_select_db($con,"form");
    $sqlquery="Select* from bloodform order by Sno DESC";
    $result= mysqli_query($con,$sqlquery);

?>    
        
        <form action="search.php" method="post">
        <input type="text" name="search"  placeholder="Search"/>

            <input type="submit" name="bt_sbmt" value="Go"/>
</form>

</form>
    
<center> 
<table cellpadding="3" cellspacing="0">
  <tr>
    <th>Name</th>
    <th>ADD</th>
    <th>Phone</th>
    <th>Blood group</th>
    <th> </th>


    <?php
    if ($result-> num_rows > 0) {
      $sn=1;
      while($data = $result->fetch_assoc()) {
     ?>
    <tr>
    <td><?php echo $data['name']?></td>
    <td><?php echo $data['add']?></td>
    <td><?php echo $data['phn']?></td> 
    <td><?php echo $data['blood_type']?></td>
    <td><a href="tel:<?php echo $data['phn']; ?>">Call</a></td>
 

    


</tr>
<?php
$sn++;}}
?>
</table>
</center>
<br><br><br><br>

</body>
</html>