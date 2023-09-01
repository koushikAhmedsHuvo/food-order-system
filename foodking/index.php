<?php
@include 'config.php';
@include 'authentication_functions.php'; 
session_start();
if (!isUserLoggedIn()) {
  
   header('Location:login.php');
    exit(); 
}


if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    $userID = $_SESSION['u_id'];

    
} else {
    
}



if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    
    $insert = "INSERT INTO contract_t (name, email, phone, message) VALUES ('$name', '$email', '$phone', '$message')";
    if (mysqli_query($con, $insert)) {
        echo "<script>alert('Successfully submitted');</script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
    

}


 

$sql = "SELECT * FROM dishes LIMIT 6"; 
$result = mysqli_query($con, $sql);

$sql1 = "SELECT * FROM restaurant"; 
$result1 = mysqli_query($con, $sql1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>FOOD King</title>

</head>
<body>
    <div class="container">
        <div class="header">
            
            <div class="logo">
                <img src="images/logo.png" alt="">
            </div>
            <div class="nav">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="#about">About Us</a></li>
                    <li><a href="restaurant.php">Restaurant</a></li>
                    <li><a href="#contract">Contract Us</a></li>
                    <li><a href="login.php">LogIn</a></li>
                    <li><a href="logout.php">LogOut</a></li>
                    
                </ul>

            </div>
        </div>
        <div class="home">
     <img src="images/img/pimg.jpg" alt="">
     <div class="overlay">
        <p>Order Delivery or Take Out</p>
        <ul>
            
        </ul>
    </div>
  </div>
    
  <div class="about" id="about">
    <h1>About Us</h1>

            <div class="content1">
   
               <p>This is the best online food order website<br>
               Lorem ipsum, dolor sit amet consectetur adipisicing elit. At placeat doloremque ut, voluptatem cumque ducimus esse alias quibusdam, molestias commodi quaerat voluptate numquam animi repudiandae rerum reiciendis dolores exercitationem qui illo nesciunt laboriosam consequatur nobis assumenda? Vitae, dolorum? Facere cum asperiores quaerat dignissimos accusamus velit consectetur! Temporibus aliquam totam quisquam id itaque, dicta culpa sapiente rerum quae voluptatibus possimus minus dolorum impedit, commodi perferendis, praesentium labore voluptatum consequatur ratione! Eos.
               Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati dicta nulla praesentium dolore dolorem, iure molestias eaque quod in? Quisquam, saepe ab quae rem totam placeat necessitatibus ipsam. Assumenda, debitis ducimus animi sint saepe eveniet nemo recusandae et ab labore, voluptas rerum cumque hic, nobis veritatis sit quos illo quia quam. Quod quia ratione quo odio quam repellat perferendis, pariatur eligendi blanditiis cumque facilis debitis numquam dolores. Recusandae molestiae vitae vero, repellat consequatur quasi, neque modi officiis dignissimos quia laborum doloremque beatae nemo necessitatibus, ullam culpa. Ut deserunt in omnis laudantium, quibusdam ipsam minima temporibus tempore vero velit facilis delectus.
               </p><br>
                
            </div>
            <div class="sidebar">
                <img src="images/about.jpg" alt="">

            </div>
        </div>

       <div class="menu" id="menu">
        <div class="heading">
            <h1>Popular Dishes of the Month</h1>
            <p>Easiest way to order your favourite food among these top 6 dishes</p>

        </div>
        <div class="items">
    <?php
   
    while ($row = mysqli_fetch_assoc($result)) {
     
     echo '<div class="menu1">';
     echo '<div class="des">';
     echo '<img src="dishes/' . $row['img'] . '" alt="">';
     echo '<p>' . $row['slogan'] . '</p>';
     echo '<p style="font-size: 26px;">' .  $row['price'] . '</p>';
     echo '<button>Order</button>';
     echo '</div>';
     echo '</div>';
   

    }
    ?>
  </div>
      
       </div>
       
      <div class="restaurant">
        <div class="txt2">
            <div class="logo">
                <h1>Featured Restaurants</h1>

            </div>
            <div class="nav">
                <ul>
                    <li><a href="" style="color: black;">All</a></li>
                    <li><a href="" style="color: black;">Continental</a></li>
                    <li><a href="" style="color: black;">Italian</a></li>
                    <li><a href="" style="color: black;">Chinese</a></li>
                    <li><a href="" style="color: black;">American</a></li>
                </ul>

            </div>

        </div>
        <div class="list">
    <?php
    while ($row1 = mysqli_fetch_assoc($result1)) {
        echo '<div class="res">';
        echo '<div class="pic">';
        echo '<img src="' . $row1['image'] . '" alt="Restaurant Image">';
        echo '</div>';
        echo '<div class="info">';
        echo '<p>' . $row1['title'] . '</p>';
        echo '<p>' . $row1['address'] . '</p>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>


        
     
        </div>

        <div class="contract" id="contract">
            <div class="content3">
                <h1>Contract Us</h1>
                <form action="" method="post">
                    Name <input type="text" name="name"><br><br>
                    Email  <input type="email" name="email"><br><br>
                    Phone  <input type="number" name="phone"><br><br>
                    Message <textarea name="message" rows="5" cols="30"></textarea>
                    <br><br>
                    <input type="submit" value="submit" name="submit">
                </form>
            </div>
        </div>

        <div class="footer">
            <p>&copy;Foodking</p>
        </div>

      </div>

</div>
</body>
</html>
