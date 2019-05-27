<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <!-- Plugin CSS -->

    <!-- Theme CSS - Includes Bootstrap -->
    <!-- <link rel="stylesheet" href="style.css" /> -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css\style1.css">
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> -->
    <title>Profile</title>
</head>

<body>

    <body>
        <div id="page-container">
            <div id="content-wrap">
                <?php
                session_start();
                include_once("config.php");
                $userID = $_SESSION['user_id'];
                $sql2 = "SELECT * FROM members WHERE userid='$userID'";
                $result2 = $pdo->query($sql2);
                while ($res = $result2->fetch()) {
                    $userEmail = $res['email'];
                    $userName = $res['name'];
                }

                ?>
                <header>
                    <!--Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="#" style="font-weight: 800;text-shadow : 1px 2px 8px rgb(160, 160, 160); ">TravellerPlan</a>
                        <button aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent-333" data-toggle="collapse" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="trip.php">My Trip
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="weatherForecast.php">Weather</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="recommendation.php">Recommendation</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="myPlace.php">Saved Places</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="RateUs.php">Rate Us</a>
                                </li>

                            </ul>
                            <ul class="navbar-nav ml-auto nav-flex-icons">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
                                        <a class="dropdown-item" href="profile.php">Profile</a>
                                        <a class="dropdown-item" href="logoutphp.php">Log Out</a>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <!--/.Navbar -->
                </header>
                <main>
                    <?php
                    if (empty($_GET['status'])) { } else if ($_GET['status'] == "changePassword") {
                        echo "<script type='text/javascript'> alert('Password Changed!');</script>";
                    } else if ($_GET['status'] == "changeName") {
                        echo "<script type='text/javascript'> alert('Name Changed!');</script>";
                    } else if ($_GET['status'] == "profileUpdated") {
                        echo "<script type='text/javascript'> alert('Profile Updated!');</script>";
                    } else {
                        echo "<script type='text/javascript'> alert('Nothing Updated!');</script>";
                    }
                    ?>
                    <div class="container">
                        <br>
                        <h3 style="text-align:center;font-weight:900;">Hi <?php echo $userName ?> ,welcome back !</h3>
                        <br>
                    </div>
                    <br>
                    <div class="container">
                        <div id="all" class="row m-y-2">
                            <div id="all1" class="col-lg-8 push-lg-4">
                                <ul class="nav nav-pills">
                                    <li class="nav-item ">
                                        <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Edit</a>
                                    </li>
                                </ul>
                                <div class="tab-content p-b-3">
                                    <div class="tab-pane active" id="profile">
                                        <br>
                                        <h4 class="m-y-2">User Profile</h4>
                                        <div class="row">
                                            <div class="col">
                                                <h6>Name :</h6>
                                                <p id="fullname">
                                                    <h5>&nbsp&nbsp<?php echo $userName ?></h5>
                                                </p>
                                            </div>
                                            <!-- <div class="col-md-auto"></div>
                  <div class="col col-lg-2">
                    <button type="button" class="btn btn-primary">
                      Edit
                    </button>
                  </div> -->
                                        </div>
                                        <div class="row">
                                            <!-- <div class="col-md-6">
                    <h6>Detail</h6>
                    <p>
                      Gan gan
                      <button type="button" class="btn btn-primary">
                        Edit
                      </button>
                    </p>
                  </div> -->
                                            <div class="col-md-12">
                                                <h6>Email Address :</h6>
                                                <p id="email">
                                                    <h5>&nbsp&nbsp<?php echo $userEmail ?></h5>
                                                </p>

                                            </div>


                                        </div>
                                        <!--/row-->
                                    </div>

                                    <div class="tab-pane" id="edit">
                                        <br>
                                        <h4 class="m-y-2 ">Edit Profile</h4>
                                        <form class="form-signin" method="POST" action="processEdit.php">
                                            <div class="form-label-group">
                                                <label for="email">Email address</label>
                                                <h5><?php echo $userEmail ?></h5>
                                            </div>
                                            <div class="form-label-group"><br>
                                                <label for="newFirstName">Name</label>
                                                <input type="text" id="newFirstName" name="newName" value="<?php echo $userName ?>" class="form-control" placeholder="First Name" autofocus>

                                            </div>
                                            <br>
                                            <div id="password" class="form-label-group">
                                                <label for="psw">Password <span><a href="#" title="Password Requirements" data-toggle="popover" data-placement="right" class="fa fa-info-circle" style="font-size:15px ; color:orange"></a></span></label>
                                                <input name="newPassword" type="password" id="psw" class="form-control" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" autofocus>
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
                                            <br>
                                            <div class="form-label-group">
                                                <label for="repeatPassword">Repeat Password</label>
                                                <input type="password" id="confirm_password" class="form-control" placeholder="Repeat Password" autofocus>
                                                <div id="repeat"></div>
                                            </div>
                                            <button type="submit" class="btnSubmit">Edit Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <footer id="footer">
                <div class="small text-center text-muted">
                    Copyright &copy; 2019 - travellerplan.com
                </div>
            </footer>
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
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            <!-- JQuery -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js">
            </script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js">
            </script>
        </div>
    </body>

</html>