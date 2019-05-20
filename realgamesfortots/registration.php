<?php

?>


<html lang="en">
<head>

<!-- Basic Page Needs ================================================== 
================================================== -->

<meta charset="utf-8">
<title>BookBarter Registeration</title>
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

<link rel="shortcut icon" href="images/favicon.png">
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
          <li><a href="portfolio.php">Games</a>
          </li>          
          <li><a href="contact.html">Contact</a></li>
        </ul>
      </div>
      <!-- mainmenu ends here --> 
      
      <!-- Responsive Menu -->
      <form id="responsive-menu" action="#" method="post">
        <select>
          <option value="">Navigation</option>
          <option value="index.html">Home</option>
          <option value="about.html">About</option>
          <option value="portfolio.html">Portfolio</option>
          <option value="portfolioproject.html">Portfolio Project</option>
          <option value="blog.html">Blog</option>
          <option value="singleblog.html">Single Post</option>
          <option value="features.html">Features</option>
          <option value="contact.html">Contact</option>
        </select>
      </form>
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
      <h3>New User Registeration</h3>
    </header>
  </div>
  <!-- container ends here -->
  <hr class="separator1">
</div>
<!-- breadcrumbs ends here --> 
<!-- Contact Content Part - GoogleMap ==================================================
================================================== -->


<!-- Contact Content Part - Contact Form ==================================================
================================================== -->
<div class="container contact"> 
  <!-- Contact Sidebar ==================================================
================================================== -->
  <div class="one_third">
    
    
  </div>
  <!-- one_third ends here -->

<div class="registration">
        <form id="userRegisteration">
            <!--User FirstName -->
            <label for="FirstName">First Name: </label>
            <input type="text" size="40" name="FirstName">
            <br>
            <!--User LastName -->
            <label for="LastName">Last Name: </label>
            <input type="text" size="40" name="LastName">
            <br>
            <!--User Age -->
            <label for="Age">Age: </label>
            <input type="text" size="40" name="Age">
            <br>
            <!--User Email -->
            <label for="email">Email: </label>
            <input type="text" size="40" class="emailBox" name="email">
            <br>
            <!--User Password -->
            <label for="passwordField">Password (8 characters minimum): </label>
            <input name="passwordField" required="" type="password">
            <br>
            <!--User Phone Number -->
            <label for="phoneNumber">Phone Number: </label>
            <input type="text" name="phoneNumber">
            <br/><br/>
            <button type="submit" class="submit" value="REGISTER">REGISTER</button> &nbsp;

            <br/><br/>
            <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

            <div class="container signin">
                <p>Already have an account? <a href="login.php">Sign in</a>.</p>
            </div>
        </form>
        
        <!--print the response of the server registeration inside the div-->
        <br />
        <div class="return" id="registerationStatus"> </div>

        <!-- JavaScript to display the server response without having to reload the page -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
        <script>
            $("#userRegisteration").submit(function(event) {
                event.preventDefault(); //prevent default action 
                var post_url = "registerationCustomer.php"; //get form action url
                var form_data = $(this).serialize(); //Encode form elements for submission

                $.post(post_url, form_data, function(response, status) {
                    //	$("#loginStatus").html( response );	
                    var result = $.trim(response);
                    var myVar = "Registeration success. Redirecting to home page in 5 seconds...";
                    if (result === "Success") {
                        $("#registerationStatus").html(myVar);
                        setTimeout(function() {
                            window.location.href = "indexPost.php";
                        }, 5000); //if login is success, wait 5 seconds, then open the post login page
                    } else {
                        $("#registerationStatus").html(response); //If login is failure, display login failure in the login page
                    }
                    //setTimeout(function() { window.location.href = "homePostLogin.php"; }, 5000); 
                }).fail(function(err, status) {
                    $("#registerationStatus").html(err);
                });
            });

        </script>
    </div>
</div>
<div class="blankSeparator"></div>

<!-- Socialize ==================================================
================================================== -->
<hr class="separator2">
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
    <p class="copyright">&copy; Copyright 2019. &quot;Gamefortots&quot; by <a href="about.html" rel="nofollow">Team 3</a>. All rights reserved.</p>
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

