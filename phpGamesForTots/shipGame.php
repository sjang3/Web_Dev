<?php
$page = "ShipGame";
$title = "ShipGame - ";
include('header.php');
?>

<style>
    .game {
        width: 50%;
        margin: 0 auto;
    }

    .twitter_share {
        width: 50%;
        margin: 0 auto;
    }

    .facebook {
        width: 50%;
        margin: 0 auto;
    }

    .rating {
        width: 50%;
        margin: 0 auto;
    }

</style>

<body>
    <!-- game embed -->
    <div class="game">
        <h3>ShipGame</h3>;
        <iframe src="http://gamesfortots.us/phaser-3.16.2/FirstGame/ShipGame.html" name="game" width="800" height="500" frameborder="0" scrolling="no" text-align: center>
            <p>Your browser does not support iframes.</p> >
        </iframe>
    </div>

    <!-- embedd the rating system here -->
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

        Average Rating:
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
        <div class="fb-comments" data-href="http://gamesfortots.us/Kentico12/Game/MergeIt/Game.aspx" data-numposts="20">
        </div>
    </div>

</body>


<?php
include('footer.php');
?>
