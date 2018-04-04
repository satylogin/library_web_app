<?php

require "connect.php";

if (isset($_SESSION['id'])) {
    header("LOCATION: displaying_data.php");
}

?>

<html>
  <head>
    <title>LOGIN/SIGNUP</title>
    <link rel="stylesheet" type="text/css" href="login.css">
  </head>
  <body>
    <div class="login-wrap">
        <div class="login-html">
                <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">LOGIN</label>
                <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">REGISTER</label>
                <div class="login-form">
                     <div class="sign-up-htm">
                        <form action = "register.php" method = "POST">
                            <div class="group">
                                <label for="user" class="label">Name</label>
                                <input id="user" type="text" class="input" name="name">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Contact</label>
                                <input  id="pass" name="contact" type="number" class="input" >
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" name="register_password" class="input" data-type="password">
                            </div>
                            <div class="group">
                                <label for="pass" class="label">Email Address</label>
                                <input id="pass" type="text" class="input" name="email">
                            </div>
                            <div class="group">
                                <input type="submit" class="button" value="Sign Up" name="register">
                            </div>
                            <div class="hr"></div>
                        </form>
                    </div>
                    <div class="sign-in-htm">
                        <form action = "login.php" method = "POST">
                            <div class="group">
                                <label for="user" class="label">EmailID</label>
                                <input id="user" type="text" name="id" class="input">
                            </div><br>
                            <div class="group">
                                <label for="pass" class="label">Password</label>
                                <input id="pass" type="password" name="password" class="input" data-type="password">
                            </div>
                            <br>
                            <div class="group">
                                <input type="submit" class="button" name = "login" value="Log In">
                            </div>
                            <div class="hr"></div>
                        </form>
                    </div>
                   
                </div>
        </div>
    </div>
  </body>
</html>