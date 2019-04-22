<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css"> <!-- Link to Main CSS -->
</head>


<style>
    .paypal {
        color: #ffffff;
        text-align: center;
        display: inline-block;
        width: 34%;
    }

</style>

<body>
    <div class="footer">
        <h2>You can support us in two ways</h2>
        <div class="support">
            <h3>Subscription</h3>
            Support us by enrolling in a subscription plan by paying a recurring monthly fee and get priority access to new games a week before others.
            <br>$ 3.99/month<br>

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
        <div class="support">
            <h3>Donation</h3>
            Lets be charitable. Please donate so that we can fund our research on developing new and exciting games for all to enjoy
            <br>$ 5.99/once <br>

            <div class="paypal">
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
                    <input type="hidden" name="cmd" value="_s-xclick" />
                    <input type="hidden" name="hosted_button_id" value="QZAFEX378LPQN" />
                    <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Donate with PayPal button" />
                    <img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1" />
                </form>

            </div>

            <!-- Advertisement -->
        </div>


    </div>


</body>

</html>
