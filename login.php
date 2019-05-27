<!doctype html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        /* The message box is shown when the user clicks on the password field */
        #message {
            display: none;
            background: #f1f1f1;
            color: #000;
            position: relative;
            padding: 20px;
            margin-top: 10px;
        }



        #message p {
            padding: 10px 35px;
            font-size: 1vw;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -35px;
            content: "✔";
        }

        /* Add a red text color and an "x" when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -35px;
            content: "✖";
        }



        footer {
            background: #fff;

            margin-bottom: 0;
            margin-top: 5.2vw;
        }

        #btnSubmit {
            margin-top: 1vw;
        }

        .cpryt {
            margin-top: 0px;
            text-align: center;
            color: #777;
        }

        .cpryt a,
        .cpryt a:hover {
            color: #fff;
        }

        @media (max-width: 992px) {
            footer {
                background: #fff;
                margin-top: 0;
            }
        }
    </style>
    <script src="js/confirmPassword.js"></script>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css\login.css">



    <title>Join Us!</title>
</head>


<body>
    <div id="page-container" style="background-image: url(img/login/bg.jpeg) ">

        <div id="content-wrap">
            <header>
                <br>
                <h1>
                    Welcome to Traveller Plan</h1>
            </header>

            <div class="container pt-5">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div id="loginbox" class="card-body">
                                <h5 class="card-title text-center">Sign In</h5>
                                <form class="form-signin" method="POST" action="processLogin.php">
                                    <div class="form-label-group" style="padding-top:28px;">
                                        <label for="inputEmail">Email address</label>
                                        <input type="email" name="userEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

                                    </div>

                                    <div class="form-label-group" style="padding-top:25px;">
                                        <label for="inputPassword">Password</label>
                                        <input type="password" name="userPassword" id="inputPassword" class="form-control" placeholder="Password" required>

                                    </div>
                                    <?php
                                    if (empty($_GET['status'])) { } else if ($_GET['status'] == "login_failed") {
                                        echo "<p style='color:red'>Incorrect Email or Password!<p>";
                                    }
                                    ?>

                                    <!-- <div class="custom-control custom-checkbox mb-2">
                <p id="forgot_email">Forgot your password? <a id="forgot_psw" href="forgetPassword.php"
                    style="cursor: default; color:#f4623a">Click here</a></p>
              </div> -->
                                    <!-- <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"  style="margin-top:30px;">Sign in</button> -->
                                    <div class="form-label-group" style="padding-top:25px;">
                                        <input type="submit" value="Sign In" class="btn btn-lg btn-primary btn-block text-uppercase">
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-12 control">

                                        </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto h-100">
                    <div class="card card-signin my-5 h-100">
                        <div id="signupbox" class="card-body">
                            <h5 class="card-title text-center">Sign Up</h5>

                            <form class="form-signin" method="POST" action="processSignup.php">
                                <div class="form-label-group">
                                    <label for="email">Email address</label>
                                    <input type="email" id="newEmail" name="newEmail" class="form-control" placeholder="Email address" required autofocus>
                                    <?php
                                    if (empty($_GET['status'])) { } else if ($_GET['status'] == "signup_failed") {
                                        echo "<p style='color:red'>Incorrect Email or Password!<p>";
                                        echo "<p style='color:red'>Email already registered!<p>";
                                    } ?>
                                </div>
                                <div class="form-label-group">
                                    <label for="newFirstName">Name</label>
                                    <input type="text" id="newFirstName" name="newName" class="form-control" placeholder="Name" required autofocus>

                                </div>

                                <div id="password" class="form-label-group">
                                    <label for="psw">Password <span><a href="#" title="Password Requirements" data-toggle="popover" data-placement="right" class="fa fa-info-circle" style="font-size:15px ; color:orange"></a></span></label>
                                    <input name="newPassword" type="password" id="psw" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autofocus>
                                    <div id="validate"></div>
                                </div>

                                <div id="message">
                                    <ul>
                                        <li>A lowercase letter</li>
                                        <li>A uppercase letter</li>
                                        <li>A number</li>
                                        <li>Minimum 8 characters</li>
                                    </ul>
                                </div>


                                <div class="form-label-group">
                                    <label for="repeatPassword">Repeat Password</label>
                                    <input type="password" id="confirm_password" class="form-control" placeholder="Repeat Password" required autofocus>
                                    <div id="repeat"></div>
                                </div>
                                <input type="submit" id="btnSubmit" class="pure-button pure-button-primary btn btn-lg btn-primary btn-block text-uppercase" value="Sign Up" />

                                <!-- <button id="signupbtn" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" onclick="testing()" method="post">Sign Up</button> -->
                                <!-- <a id="signupbtn" class="btn btn-lg btn-primary btn-block text-uppercase" href="profile.html">Sign Up</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer" class="bg-light py-5">
            <div class="container">
                <div class="small text-center text-muted">
                    Copyright &copy; 2019 - travellerplan.com
                </div>
            </div>
    </div>
    </footer>
    <!-- Footer -->
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover({
                html: true,
                content: function() {

                    return $('#message').html();
                }
            });
        });
    </script>
    <script src="js/confirmPassword.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <!-- <script src="loginjs.js"></script> -->
    </div>

</body>

</html>