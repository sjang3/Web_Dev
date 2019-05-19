<?php
$page = "registration";
$title = "Registration - ";
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

    /* Add a blue text color to links */
    a {
        color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
        background-color: #f1f1f1;
        text-align: center;
    }

</style>

<body>

    <h3>New Customer Registeration</h3>
    <br />
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
            <br>
            <button type="submit" class="submit" value="REGISTER">REGISTER</button> &nbsp;

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
                            window.location.href = "portfolio.php";
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
</body>

<?php
include('footer.php');
?>
