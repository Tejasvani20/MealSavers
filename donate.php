<?php
if(isset($_POST['Name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server,$username,$password);

    if(!$con){
        die("Connection to the database failed due to: " . mysqli_connect_error());
    }

    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $IdProof = $_POST['IdProof'];
    $phoneNumber = $_POST['phoneNumber'];
    $Date = $_POST['Date'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $category = $_POST['category'];
    $FoodCooked = $_POST['FoodCooked'];

    $sql = "INSERT INTO `database`.`data` (`Name`, `Age`, `Gender`, `IdProof`, `phoneNumber`, `Date`, `location`, `capacity`, `category`, `FoodCooked`) VALUES ('$Name', '$Age', '$Gender', '$IdProof', '$phoneNumber', '$Date', '$location', '$capacity', '$category', '$FoodCooked');";
    
    if($con->query($sql) == true){
        $insert = true; // Set $insert variable to true after successful insertion
    }
    else{
        echo "ERROR: $sql  <br> $con->error";
    }

    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MealSavers</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <nav>
       <!-- <a href="main.html" style="text-decoration: none;color:rgb(255,255,255);" class="top">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="our mission" class="top"><a href="ourmission.html" style="text-decoration: none;color: rgb(255, 255, 255);" class="top">Our Mission</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span is="how_we_work" class="top"><a href="aboutus.html" style="text-decoration:none; color: white;">About Us</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="contact_us" class="top"><a href="contact.html" style="text-decoration: none; color: white;">Contact us</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id="FAQ" class="top"><a href="faq.html" style="text-decoration: none; color: rgb(255, 255, 255);">FAQ</a></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
-->
    </nav>
</header>   
<div class="container">
    <h1>Welcome to MealSavers</h1>
    <p>Enter your details here  </p>
    <?php
    if(isset($insert) && $insert == true){
        echo "<p class='submitMsg'>Our team will be ready to coordinate with you for pick-up in 15 minutes.</p>";
    }
    ?>
    <form action="donate.php" method="post">
        <input type="text" name="Name" id="Name" placeholder="Enter your name">
        <input type="text" name="Age" id="Age" placeholder="Enter your Age">
        <input type="text" name="Gender" id="Gender" placeholder="Enter your gender">
        <input type="text" name="IdProof" id="IdProof" placeholder="Enter your Aadhar number">
        <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter your phone number">
        <input type="date" name="Date" id="Date" placeholder="Enter present date">
        <input type="text" name="location" id="location" placeholder="Enter pickup location">
        <input type="number" name="capacity" id="capacity" placeholder="What's the food's maximum serving capacity?">
        <input type="text" name="category" id="category" placeholder="Is it vegetarian or non-vegetarian?">
        <input type="text" name="FoodCooked" id="FoodCooked" placeholder="Is the food cooked within a 24-hour timeframe?  Yes/No?">
        <button class="btn">Submit</button> 
    </form>
</div>
<script src="index.js"></script>
</body>
</html>
