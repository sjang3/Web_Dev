<?php
$page = "login";
$title = "Login - ";
include('header.php');
?>

<style>
    * {
        box-sizing: border-box
    }

    /* Add padding to containers */
    .container {
        padding: 16px;
    }

    /* Full-width input fields */
    input[type=text],
    input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    /* Set a style for the submit/register button */
    .submit {
        background-color: black;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 100%;
        opacity: 0.9;
    }

    .submit:hover {
        opacity: 1;
    }


</style>

<body>

    <h3>Customer Login</h3>
    <br />
    <form id="userLogin">
        <!--User Email -->
        <label for="email">Email: </label>
        <input type="text" size="40" class="emailBox" name="email">

        <!--User Password -->
        <label for="passwordField">Password: </label>
        <input name="passwordField" required="" type="password">
        <button type="submit" class="submit" value="LOGIN">LOGIN</button> &nbsp;
    </form>

    <!--print the response of the server login inside the div-->
    <br />
    <div class="return" id="loginStatus"> </div>

    <!-- JavaScript to display the server response without having to reload the page -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js "></script>
    <script>
        $("#userLogin").submit(function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = "loginCustomer.php"; //get form action url
            var form_data = $(this).serialize(); //Encode form elements for submission

            $.post(post_url, form_data, function(response, status) {
                //	$("#loginStatus").html( response );	
                var result = $.trim(response);
                var myVar = "Login success. Redirecting to home page in 5 seconds...";
                if (result === "Success") {
                    $("#loginStatus").html(myVar);
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 5000); //if login is success, wait 5 seconds, then open the post login page
                } else {
                    $("#loginStatus").html(response); //If login is failure, display login failure in the login page
                }
                //setTimeout(function() { window.location.href = "homePostLogin.php"; }, 5000); 
            }).fail(function(err, status) {
                $("#loginStatus").html(err);
            });
        });

    </script>

</body>

<?php
include('footer.php');
?>
