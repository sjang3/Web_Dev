<?php
session_start();
$_SESSION['customerName'];

if (isset($_SESSION['email'])) 
  {
      $loginEmail = $_SESSION['email'];
  }

//$email = $_SESSION["email"];

$servername = "localhost";
$username = "ajikee1";
$password = "ranjithajith";
$db = "gamesfortotos";
  
$dbConnection = mysqli_connect($servername, $username, $password, $db);
 
//get the password associated with the email
$sql = "SELECT Age FROM customer WHERE email ='$loginEmail' LIMIT 1";

$result = mysqli_query($dbConnection, $sql);

while ($row = $result->fetch_assoc()) 
      {
          $age = $row['Age'];

          if (($age < 18)) 
            {
              echo "<script>alert('You need to ba 18 or older!!');history.go(-1);</script>";
            }
          else
          {
            mysqli_free_result($result);
            mysqli_close($dbConnection);
            $customerName = getName($loginEmail); //get the users firstname and lastname using his email address
            $nameofGame = "doomrunner";
            insertHistory($loginEmail, $nameofGame);
          }
      }

//function to get customers first name and last name based on his email address
function getName($loginEmail)
  {
        $servername = "localhost";
        $username = "ajikee1";
        $password = "ranjithajith";
        $db = "gamesfortotos";
    
      //set the connection
      $dbConnection = mysqli_connect($servername, $username, $password, $db);
    
    
      $stmt = "SELECT FirstName, LastName FROM customer WHERE email='$loginEmail'";
    
      //execute the query and assign the result
      $result = mysqli_query($dbConnection, $stmt);
    
      if (mysqli_num_rows($result) > 0) 
      {
          while ($row = mysqli_fetch_array($result)) 
            {
                $_SESSION['customerName'] = $row['FirstName']. ' ' . $row['LastName'];
            }
        
            mysqli_free_result($result);
            mysqli_close($dbConnection);
      }
      
      return $_SESSION['customerName'];
  }

function insertHistory($loginEmail, $gameName) 
  {

    $servername = "localhost";
    $username = "ajikee1";
    $password = "ranjithajith";
    $db = "gamesfortotos";

    //set the connection
    $dbConnection = mysqli_connect($servername, $username, $password, $db);

    $stmt = "INSERT INTO History(email, gameName, view) VALUES('$loginEmail', '$gameName', '1')";
    //execute the query and assign the result
      $result = mysqli_query($dbConnection, $stmt);
    
      if (mysqli_query($dbConnection, $stmt)) 
        {
          //echo 'Success';
        } 
      else
        {
          //echo "History not logged";
        }
  }
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

<!-- Basic Page Needs ================================================== 
================================================== -->

<meta charset="utf-8">
<title>Gamefortots.com</title>
<meta name="description" content="Place to put your description text">
<meta name="author" content="">
<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

<!-- Mobile Specific Metas ================================================== 
================================================== -->

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

<!-- CSS ==================================================
================================================== -->

<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/skeleton.css">
<link rel="stylesheet" href="css/screen.css">
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />

<!-- Favicons ==================================================
================================================== -->

<link rel="shortcut icon" href="images/logo.png">
<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

<!-- Google Fonts ==================================================
================================================== -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body> 

<!--Content Part ==================================================
================================================== -->
<div id="header">
  <div class="container"> 
    <!-- Header | Logo, Menu
		================================================== -->
    <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" /></a></div>
    <div class="mainmenu">
      <div id="mainmenu">
        <ul class="sf-menu">
          <li><a href="index.html" id="visited">Home</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="portfolio.html">Games</a>
           
          </li>          
          <li><a href="contact.html">Contact</a></li>
		  <li><a href="logout.php">Logout</a></li>
      <li><a href ="">Hello,  <?php echo $customerName ?></a></li>
        </ul>
      </div>
      <!-- mainmenu ends here --> 
      
      <!-- Responsive Menu -->
      
    </div>
    <!-- mainmenu ends here --> 
  </div>
  <!-- container ends here --> 
</div>
<!-- header ends here --> 
<!--Breadcrumbs ==================================================
================================================== -->
<div class="breadcrumbs">
  <div class="container">
    <header>
      <h3>Doom Runer</h3>
      <p> Run for your life </p>
    </header>
  </div>
  <!-- container ends here -->
  <hr class="separator1">
</div>
<!-- breadcrumbs ends here --> 
<!-- Blog Single ==================================================
================================================== -->
<div class="container">
  <section class="slider" align="middle">
    <iframe src="game/index.html"
" name="game" width="800" height="600" frameborder="0" scrolling="no" text-align: center align="middle">
            <p>Your browser does not support iframes.</p> >
        </iframe>
    <!-- flexslider ends here --> 
  </section>
  <!-- slider ends here -->
  <hr class="separator1">
  <div class="rating">

        <div class='ratingStar'>
            <form id="rateSubmit">
                Rate this game:
                <select name="ratingNumber">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <input type="hidden" name="gameName" id="gameName" value="ShipGame">
                <button type="submit" name="submit" value="rate">RATE</button> &nbsp;
            </form>
        </div>

        <!-- JavaScript to display the server response without having to reload the page -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
        <script>
            $("#rateSubmit").submit(function(event) {
                event.preventDefault(); //prevent default action 
                var post_url = "saveRating.php"; //get form action url
                var form_data = $(this).serialize(); //Encode form elements for submission

                $.post(post_url, form_data, function(response, status) {
                    $("#response").html(response);

                }).fail(function(err, status) {
                    $("#response").html(err);
                });
            });

        </script>

        <div id="response"> </div>
        <br />
    </div>
    
     <!-- twitter comment box -->
    <div class="twitter_share">
        <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-size="large" data-text="Go check out this amazing game I found..." data-show-count="false">Tweet</a>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>

    <!-- facebook comment box-Ship game only -->
    <div class="facebook">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=2212809772366987&autoLogAppEvents=1"></script>
        <div class="fb-comments" data-href="http://bookbarter.us/gamesfortots/shipgame.html" data-numposts="20">
        </div>
    </div>
</div>
<!-- container ends here --> 

<!-- Socialize ==================================================
================================================== -->
<hr class="separator2">
<div class="socialsblock">
  <div class="container socialize">
    
  </div>
  <!-- container ends here --> 
</div>
<!-- socialsblock ends here --> 
<!-- Footer ==================================================
================================================== -->
<div class="footer">
  <div class="container">
    <div class="one_fourth">
      <h3>Contact Informations</h3>
      <p><span class="orange"><strong>Address:</strong></span> <br>
        8000 York Rd, Towson, MD 21286</p>
      <p><span class="orange"><strong>Phone:</strong></span> <br>
        + 1 (111) 111 1111<br>
      </p>
      <p><span class="orange"><strong>Email:</strong></span> <br>
        info@towson.edu<br>
      </p>
    </div>
    <!-- four columns ends here -->
    
    <!-- four columns ends here -->
    
    <!-- four columns ends here -->
    <div class="one_fourth lastcolumn">
      <h3>About</h3>
      <p>Team 3 made this website to acheive a great grade. I don't even think that you will read this all. This is why I'm typing any words in this <a href="about.html" rel="nofollow">About</a> section</p>
      <p>Please do not visit <a href="about.html" rel="nofollow">Team3 Design</a> and go up to top.</p>
    </div>
    <!-- four columns ends here --> 
  </div>
  <!-- container ends here --> 
</div>
<!-- footer ends here --> 
<!-- Copyright ==================================================
================================================== -->
<div id="copyright">
  <div class="container">
    <p class="copyright">&copy; Copyright 2019. &quot;Gamefortots&quot; by <a href="http://www.anarieldesign.com/" rel="nofollow">Team 3</a>. All rights reserved.</p>
  </div>
  <!-- container ends here --> 
</div>
<!-- copyright ends here --> 
<!-- End Document
================================================== --> 
<!-- Scripts ==================================================
================================================== --> 
<script src="js/jquery-1.8.0.min.js" type="text/javascript"></script> 
<!-- Main js files --> 
<script src="js/screen.js" type="text/javascript"></script> 
<!-- Tabs --> 
<script src="js/tabs.js" type="text/javascript"></script> 
<!-- Include prettyPhoto --> 
<script src="js/jquery.prettyPhoto.js" type="text/javascript"></script> 
<!-- Include Superfish --> 
<script src="js/superfish.js" type="text/javascript"></script> 
<script src="js/hoverIntent.js" type="text/javascript"></script> 
<!-- Flexslider --> 
<script src="js/jquery.flexslider-min.js" type="text/javascript"></script> 
<!-- Modernizr --> 
<script type="text/javascript" src="js/modernizr.custom.29473.js"></script>
</body>
</html>