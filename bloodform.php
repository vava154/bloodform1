<?php
if (isset($_POST["name"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phn = $_POST["phn"];
    $blood_type = $_POST["blood_type"];
    $add = $_POST["add"];

    $con=mysqli_connect("localhost","root","");
     mysqli_select_db($con,"form");

     $sqlquery = "insert into bloodform (`name`, `phn`, `blood_type`, `add`) VALUES ('$name','$phn', '$blood_type', '$add')";
     


    mysqli_query($con,$sqlquery) or die(mysqli_error($con));
        
        header("location:bloodform.php");
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 20px;
    }

    .form-container {
      max-width: 400px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border: 1px solid #141414;
      border-radius: 5px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
      width: 90%;
      padding: 10px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type="radio"],
    input[type="checkbox"] {
      margin-right: 5px;
    }

    .form-check-label {
      display: inline-block;
      margin-bottom: 0;
    }

    .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8b0000; /* Dark Red button color */
            color: #fff; /* White button text color */
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #5a0000; /* Darker Red on hover */
        }
  </style>
</head>
<body>
  
<div class="form-container">
    <form action='response.php ' method='post' enctype="multipart/form-data">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name"  placeholder="Enter name" required>
      </div>
     
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email"  aria-describedby="emailHelp" placeholder="Enter email" required>
      </div>

      <div class="form-group">
        <label for="phone">Phone Number</label>
        <input type="tel" class="form-control" id="phone" placeholder="Phone Number"  name="phn" required>
      </div>

      <div class="form-group">
        <label for="bloodgrp">Blood Group</label>
        <select name="blood_type" id="bloodgrp" class="form-control"   required>
          <option value="">--- Choose your type ---</option>
          <option value="A-">A-</option>
          <option value="A+">A+</option>
          <option value="B-">B-</option>
          <option value="B+">B+</option>
          <option value="O-">O-</option>
          <option value="O+">O+</option>
          <option value="AB-">AB-</option>
          <option value="AB+">AB+</option>
        
        </select>
      </div>

      <div class="form-group">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" id="gender" name="gender" placeholder="Gender" required>
      </div>
      
      <div class="form-group">
  <label>Any Genetic Disease</label>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="disease" id="yesDisease" value="Yes" required onclick="toggleGeneticDiseaseOptions(this)">
    <label class="form-check-label" for="yesDisease"> Yes </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="disease" id="noDisease" value="No" required onclick="toggleGeneticDiseaseOptions(this)">
    <label class="form-check-label" for="noDisease"> No </label>
  </div>
</div>
<div class="form-group" id="geneticDiseaseOptions" style="display: none;">
  <label>Genetic Disease Options</label>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="diabetes" name="options[]" value="diabetes">
    <label class="form-check-label" for="diabetes">Diabetes</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="hiv" name="options[]" value="hiv">
    <label class="form-check-label" for="hiv">HIV</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="malaria" name="options[]" value="malaria">
    <label class="form-check-label" for="malaria">Malaria</label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="ebola" name="options[]" value="ebola">
    <label class="form-check-label" for="ebola">Ebola</label>
  </div>
</div>

<script>
function toggleGeneticDiseaseOptions(yesRadio) {
  var geneticDiseaseOptions = document.getElementById("geneticDiseaseOptions");

  if (yesRadio.value === "Yes") {
    geneticDiseaseOptions.style.display = "block";
  } else {
    geneticDiseaseOptions.style.display = "none";
  }
}
</script>
      
      <div class="form-group">
        <label>Blood Related Issue</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="issue" id="yesIssue" value="Yes" required>
          <label class="form-check-label" for="yesIssue"> Yes </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="issue" id="noIssue" value="No" required>
          <label class="form-check-label" for="noIssue"> No </label>
        </div>
      </div>
      <div class="form-group">
        <label for="add">Address</label>
        <input type="text" class="form-control" id="add" name="add" placeholder="Address" required>
      </div>

      
      <div class="form-group">
        <label for="famhist">Family history</label>
        <input type="text" class="form-control" id="famhist" placeholder="Family History" required>
      </div>

      <center>
        <div class="row">
          <div class="col text-left">
            <button type="submit" class="btn btn-primary" style="background-color: blue; color: white;">Submit</button>
          </div>
        </div>
        </center>
    </form>
  </div>
</body>
</html>