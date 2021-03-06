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
		//mySQL parameters
		$servername = "localhost";
		$username = "root";
		$password = "";
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
<meta name="description" content="Game for tots">
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
          <li><a href="login.html">About</a></li>
          <li><a href="login.html">Games</a>
          </li>          
          <li><a href="login.html">Contact</a></li>
		  <li><a href="login.html">LogOut</a></li> <!-- this is linked -->
        </ul>
        
        <h4>Hello,  <?php echo $customerName ?></h4>
    </div>
      <!-- mainmenu ends here --> 
      
      <!-- Responsive Menu -->
      
    </div>
    <!-- mainmenu ends here --> 
  </div>
  <!-- container ends here --> 
</div>
<!-- header ends here --> 
<!-- Slider ==================================================
================================================== -->
<section class="slider">
  <div class="flexslider">
    <ul class="slides">
      <li> <a href="#"><img src="images/flexslider/1.gif" alt="" width="100%" height="400"/></a>
        <section class="caption">
          <h2 class="shadow3">GameForToTs</h2>
          <p>Join us from <a href=login.html rel="nofollow"><strong>Here</strong></a></p>
          <a class="button" href="login.html">Let's begin</a></section>
      </li>
      <li> <img src="images/flexslider/2.gif" alt="" width="100%" height="400"/>
        <section class="caption">
          <h2 class="shadow3">We have no game</h2>
          <p>Join us from <a href=login.html rel="nofollow"><strong>Here</strong></a></p>
          <a class="button" href="login.html">Let's begin</a></section>
      </li>
    </ul>
  </div>
  <!-- flexslider ends here --> 
</section>
<!-- slider ends here --> 
<!-- info Box ==================================================
================================================== -->
<div class="infobox">
  <div class="container info">
    <header>
      <h1>Introducing Our Games!</h1>
     
    </header>
    <hr class="separator">
  </div>
  <!-- container ends here --> 
</div>
<!-- infobox ends here --> 
<!--Latest Photos ==================================================
================================================== -->
<div class="container latest">
  <div class="one_third">
    <figure class="shadow"><a href="login.html" class="thumb"><img src="images/portfolio/a.jpg" alt="alt" /></a>
      <figcaption> <a href="#">
        <h3 class="heading">Merge it</h3>
        </a>
        <p class="bioquote">Description</p>
      </figcaption>
    </figure>
  </div>
  <!-- one_third ends here -->
  <div class="one_third">
    <figure class="shadow"><a href="login.html" class="thumb"><img src="images/portfolio/b.png" alt="alt" /></a>
      <figcaption> <a href="#">
        <h3 class="heading">Space Ship</h3>
        </a>
        <p class="bioquote">Description </p>
      </figcaption>
    </figure>
  </div>
  <!-- one_third ends here -->
  <div class="one_third lastcolumn">
    <figure class="shadow"><a href="login.html" class="thumb"><img src="images/portfolio/c.jpg" alt="alt" height="200" /></a>
      <figcaption> <a href="#">
        <h3 class="heading">FIFAke 2030</h3>
        </a>
        <p class="bioquote">Description</p>
      </figcaption>
    </figure>
  </div>
  <!-- one_third ends here --> 
</div>
<!-- end container --> 
<!--Heading Box ==================================================
================================================== -->



<section class="slider">
  <div class="flexslider">
    <ul class="slides">
      <li> 
        <div style="display: flex; justify-content: center;">
          <a href="https://card.americanexpress.com/d/american-express/?utm_mcid=3569918&utm_source=google&utm_medium=cpc&utm_term=amex&utm_cmpid=1711237649&utm_adgid=69797469267&utm_tgtid=aud-434822525019:kwd-13337556&utm_mt=e&utm_adid=344057220697&utm_dvc=c&utm_ntwk=g&utm_adpos=1t1&utm_plcmnt=&utm_locphysid=9007924&utm_locintid=&utm_feeditemid=&utm_devicemdl=&utm_plcmnttgt=&utm_programname=brandtp-cm&gclid=CjwKCAjw_YPnBRBREiwAIP6TJx78AD6fmJVJr6zWeditwzjEPUN0gpEEyxKfmTd24Nf2Uk9X3lUf2BoCduQQAvD_BwE"><img src="./images/ads1.jpg" align="middle"></a></div>
      </li>
      <li>
        <div style="display: flex; justify-content: center;" >
          <a href="https://www.betonline.ag/?btag=Ll1moMBPL95xFViVLa5JkGNd7ZgqdRLk&affid=101788"><img src="./images/ads2.gif" align="middle"></a>
      </li>
    </ul>
  </div>
  <!-- flexslider ends here --> 
</section>
<hr class="separator2">
<div class="socialsblock">
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
<!-- footer ends here --> 
<!-- Copyright ==================================================
================================================== -->

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