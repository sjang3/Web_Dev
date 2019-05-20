<?php
session_start();
$_SESSION['customerName'];

if (isset($_SESSION['email'])) 
	{
    	$loginEmail = $_SESSION['email'];
	}

$customerName = getName($loginEmail); //get the users firstname and lastname using his email address

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
    <div class="logo"><a href="indexPost.php"><img src="images/logo.png" alt="" /></a></div>
    <div class="mainmenu">
      <div id="mainmenu">
        <ul class="sf-menu">
          <li><a href="indexPost.php" id="visited">Home</a></li>
          <li><a href="about.html">About</a></li>     
          <li><a href="contact.html">Contact</a></li>
		  <li><a href="index.html">Logout</a></li>
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

<div class="infobox">
  <div class="container info">
    <header>
      <h1>Your Game History!</h1>
     
    </header>
    <hr class="separator">
  </div>
  <!-- container ends here --> 
</div>
<!-- infobox ends here --> 
<!--Latest Photos ==================================================
================================================== -->
<div class="container latest">
  <?php
    $email = $_SESSION['email'];

    getGame($email); //get the users firstname and lastname using his email address

//function to get customers first name and last name based on his email address
function getGame($loginEmail)
  {
        $servername = "localhost";
        $username = "ajikee1";
        $password = "ranjithajith";
        $db = "gamesfortotos";
    
      //set the connection
      $dbConnection = mysqli_connect($servername, $username, $password, $db);
      
        
      $stmt = "SELECT DISTINCT gameName FROM History WHERE email='$loginEmail' order by hindex DESC LIMIT 3";
    
      //execute the query and assign the result
      $result = mysqli_query($dbConnection, $stmt);
      $row_counter = 0;
    while ($row = $result->fetch_assoc()) 
      {
          $gameName   = $row['gameName']; //password that is stored in the database

          if($row_counter != 2){
            echo '<div class="one_third">
            <figure class="shadow"><a href="'.$gameName.'.php" class="thumb"><img src="images/portfolio/'.$gameName.'.jpg" alt="alt" /></a>
            <figcaption> <a href="#">
            <h3 class="heading">'.$gameName.'</h3>
            </a>
            </figcaption>
            </figure>
            </div>';
            $row_counter++;
          }
          else
          {
            echo '<div class="one_third lastcolumn">
            <figure class="shadow"><a href="'.$gameName.'.php" class="thumb"><img src="images/portfolio/'.$gameName.'.jpg" alt="alt" /></a>
            <figcaption> <a href="#">
            <h3 class="heading">'.$gameName.'</h3>
            </a>
            </figcaption>
            </figure>
            </div>';

            $row_counter = 0;
          }
         

      }
     
  }

  ?>  
  <!-- one_third ends here --> 
</div>
<!-- end container --> 
<!--Heading Box ==================================================
================================================== -->


<!--Breadcrumbs ==================================================
================================================== -->
<div class="breadcrumbs">
  <div class="container">
    <header>
      <h3>OUR GAMES</h3>
     
    </header>
  </div>
  <!-- container ends here -->
  <hr class="separator1">
</div>
<!-- breadcrumbs ends here --> 
<!-- Portfolio ==================================================
================================================== -->
<div class="container portfolio">
  <div class="one_third shadow">
    <div class="view view-first"> <img src="images/portfolio/a.jpg" alt="" />
      <div class="mask">
        <h2><a href="mergeit.php">Merge IT</a></h2>
      </div>
      <!-- mask ends here --> 
    </div>
    <!-- view ends here --> 
  </div>
  <!--end one_third-->
  <div class="one_third shadow">
    <div class="view view-first"> <img src="images/portfolio/b.png" alt="" />
      <div class="mask">
        <h2><a href="shipgame.php">Ship Game</a></h2>
      </div>
      <!-- mask ends here --> 
    </div>
    <!-- view ends here --> 
  </div>
  <!--end one_third-->
  <div class="one_third lastcolumn shadow">
    <div class="view view-first"> <img src="game/mountain.png" alt="" />
      <div class="mask">
        <h2><a href="doomrunner.php">Doom Runner</a></h2>
      </div>
      <!-- mask ends here --> 
    </div>
    <!-- view ends here --> 
  </div>
  <!--end one_third-->
  <div class="one_third shadow">
    <div class="view view-first"> <img src="images/portfolio/neonbubble.jpg" alt="" />
      <div class="mask">
        <h2><a href="neonbubble.php">Neon Bubble</a></h2>
      </div>
      <!-- mask ends here --> 
    </div>
    <!-- view ends here --> 
  </div>
  <!--end one_third-->
  <div class="one_third shadow">
    <div class="view view-first"> <img src="images/portfolio/fishingtrip.jpg" alt="" />
      <div class="mask">
        <h2><a href="fishingtrip.php">Fishing Trip</a></h2>
      </div>
      <!-- mask ends here --> 
    </div>
    <!-- view ends here --> 
  </div>
  <!--end one_third-->
  <div class="one_third lastcolumn shadow">
    <div class="view view-first"> <img src="images/portfolio/alieninvader.jpg" alt="" />
      <div class="mask">
        <h2><a href="alieninvader.php">Alien Invader</a></h2>
      </div>
      <!-- mask ends here --> 
    </div>
    <!-- view ends here --> 
  </div>
  <!--end one_third-->
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

      <div class="one_fourth lastcolumn">
        <h3>About</h3>
        <p>Team 3 made this website to acheive a great grade. I don't even think that you will read this all. This is why I'm typing any words in this <a href="about.html" rel="nofollow">About</a> section</p>
        <p>Please do not visit <a href="about.html" rel="nofollow">Team3 Design</a> and go up to top.</p>
      </div>
      <!-- container ends here --> 

      <div class="one_fourth">
        <h3>Subscription</h3>
        <p>Support us by enrolling in a subscription plan by paying a recurring monthly fee and get priority access to new games a week before others. <br>$ 3.99/month<br> </p>
        <div class="paypal">
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick">
            <input type="hidden" name="hosted_button_id" value="3DD9AQ43AUSNA">
            <table>
              <tr>
                <td><input type="hidden" name="on0" value="Subscription Options"></td>
              </tr>
              <tr>
                <td><select name="os0">
                  <option value="Silver">Silver : $3.99 USD - monthly</option>
                  <option value="Gold">Gold : $5.99 USD - monthly</option>
                  <option value="Platinum">Platinum : $8.99 USD - monthly</option>
                </select> </td>
              </tr>
            </table>
            <input type="hidden" name="currency_code" value="USD">
            <input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_subscribeCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
          </form>
        </div>
      </div>

      <div class="one_fourth">
        <h3>Donation</h3>
        <p>Lets be charitable. Please donate so that we can fund our research on developing new and exciting games for all to enjoy <br>$ 5.99/once <br>
        </p>
        <div class="paypal">
          <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" value="QZAFEX378LPQN" />
            <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
            <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
          </form>
        </div>
      </div>
      <!-- container ends here --> 
    </div>
<!-- footer ends here --> 
<!-- Copyright ==================================================
================================================== -->
<div id="copyright">
  <div class="container">
    <p class="copyright">&copy; Copyright 2013. &quot;Freebix&quot; by <a href="http://www.anarieldesign.com/" rel="nofollow">Anariel Design</a>. All rights reserved.</p>
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
