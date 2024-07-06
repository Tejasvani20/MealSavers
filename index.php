<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    echo "Success connecting to the db";

    // Collect post variables
    $Name = $_POST['Name'];
    $Age = $_POST['Age'];
    $Gender = $_POST['Gender'];
    $IdProof = $_POST['IdProof'];
    $phoneNumber = $_POST['phoneNumber'];
    $Date = $_POST['Date'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $category = $_POST['category'];
    $FoodCooked = $POST['FoodCooked'];
    
    $sql = "INSERT INTO `database`.`data` (`Name`, `Age`, `Gender`, `IdProof`, `phoneNumber`, `Date`, `location`, `capacity`, `category`, `FoodCooked`) VALUES ('$Name', '$Age', '$Gender', '$IdProof', '$phoneNumber', '$Date', '$Location', '$capacity', '$category', '$type')";
   //$sql = "INSERT INTO `donor`.`person` (`Name`, `Age` , `Gender`, `Location`, `Phone Number`, `Other`) VALUES ('$name', '$age', '$gender', '$location', '$phone_number', '$other');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
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
                                                 <!-- edit.. -->
<header>
<nav>
        
            <a href="main.html" style="text-decoration: none;color:rgb(255,255,255);" class="top">Home</span> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span id="our mission" class="top"><a
            href="ourmission.html" style="text-decoration: none;color: rgb(255, 255, 255);" class="top">Our
            Mission</a></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <span is="how_we_work" class="top"><a href="aboutus.html"
            style="text-decoration:none; color: white;">About Us</a></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            <span id="contact_us" class="top"><a href="contact.html" style="text-decoration: none; color: white;">Contact
            us</a></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span id="FAQ" class="top"><a href="faq.html"
            style="text-decoration: none; color: rgb(255, 255, 255);">FAQ</a></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
</nav>
</header>   
    <div class="container">
        <h1>Welcome to MealSavers</h3>
        <p>Enter your details here  </p>
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Our team will be ready to coordinate with you for pick-up in 15 minutes.</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="Name" id="Name" placeholder="Enter your name">
            <input type="text" name="Age" id="Age" placeholder="Enter your Age">
            <input type="text" name="Gender" id="Gender" placeholder="Enter your gender">
            <input type="text" name="IdProof" id="IdProof" placeholder="Enter youd Aadhar number">
            <input type="text" name="phoneNumber" id="phoneNumber" placeholder="Enter youd phone number">

            <input type="date" name="Date" id="Date" placeholder="Enter present date">
            <input type="text" name="location" id="location" placeholder="Enter pickup location">
            <input type="number" name="capacity" id="capacity" placeholder="What's the food's maximum serving capacity?">
            <input type="category" name="category" id="category" placeholder="It is vegeterain or non-vegeterian?">
            <input type="FoodCooked" name="FoodCooked" id="FoodCooked" placeholder="Is the food cooked within a 24-hour timeframe?  Yes/No?">
            <button class="btn">Submit</button> 
        </form>1
    </div>
    <script src="index.js"></script>
    
</body>
</html>
