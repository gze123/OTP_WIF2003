<!DOCTYPE html>
<html lang="en">

<head>
    <title>Rate Us</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">


    <link ref="stylesheet" type="text/css" href="css\rateus.css">

    <style>
        .heading {
            font-size: 25px;
            margin-right: 25px;
        }

        .fa {
            font-size: 15px;
        }

        .checked {
            color: orange;
        }

        /* Responsive layout - make the columns stack on top of each other instead of next to each other */
        @media (max-width: 400px) {

            .side,
            .middle {
                width: 100%;
            }

            .right {
                display: none;
            }
        }

        .card {
            border: none;
        }

        @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        .star-rating {
            font-size: 0;
        }

        .star-rating__wrap {
            display: inline-block;
            font-size: 1rem;
        }

        .star-rating__wrap:after {
            content: "";
            display: table;
            clear: both;
        }

        .star-rating__ico {
            float: right;
            padding-left: 2px;
            cursor: pointer;
            color: orange;
        }

        .star-rating__ico:last-child {
            padding-left: 0;
        }

        .star-rating__input {
            display: none;
        }

        .star-rating__ico:hover:before,
        .star-rating__ico:hover~.star-rating__ico:before,
        .star-rating__input:checked~.star-rating__ico:before {
            content: "\f005";
        }

        .mg {
            margin: 20px;
        }

        .btn {
            border-radius: 25px;
            background-color: #ff7b7b;
            /* Blue background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            padding: 4px 11px;
            /* Some padding */
            font-size: 16px;
            /* Set a font size */
            cursor: pointer;
            /* Mouse pointer on hover */
        }

        .btn:hover {
            background-color: #dc3545;
        }
    </style>

</head>


<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php
            include_once("config.php");
            session_start();
            $userID = $_SESSION['user_id'];
            ?>
            <header>
                <!--Navbar -->
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="#" style="font-weight: 800;text-shadow : 1px 2px 8px rgb(160, 160, 160); ">TravellerPlan</a>
                    <button aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent-333" data-toggle="collapse" type="button">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                        <ul class="navbar-nav mr-auto fonttype">
                            <li class="nav-item">
                                <a class="nav-link" href="trip.php">My Trip

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="weatherForecast.php">Weather</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="recommendation.php">Recommendation

                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="myPlace.php">Saved Places

                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="RateUs.php">Rate Us
                                    <span class="sr-only">(current)</span>
                                </a>
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
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>

                <!-- The slideshow -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="img/rate/kl.jpg" width="100%" height="500" />
                    </div>
                    <div class="carousel-item">
                        <img src="img/rate/batu.jpg" width="100%" height="500" />
                    </div>
                    <div class="carousel-item">
                        <img src="img/rate/pavi.jpg" width="100%" height="500" />
                    </div>
                </div>

                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
            <br><br>
            <div class="container-fluid mb-3">
                <div class="row">
                    <div class="col-sm-2"></div>

                    <div style="background-color:azure;box-shadow:0px 5px 20px #9b9a9a;" class="col-sm-8">
                        <div class="mb-3">
                            <!-- comment box-->
                            <br>
                            <div class="container" id="comment">
                                <h2 style="font-weight:600">User Review</h2>
                                <hr />
                                <?php
                                // $sqlGetName = "SELECT members.name from members inner join review on members.userid=review.userid  ";
                                // $name = $pdo->query($sqlGetName);
                                // $result = $name ->fetch();
                                // $userName = $result['name'];
                                // $userid = $row['userid'];
                                $sql = "SELECT members.name, review.ReviewID, review.Comment, review.rate, review.Comment_Date,review.userid from members inner join review on members.userid=review.userid order by ReviewID desc";
                                $results = $pdo->query($sql);
                                if ($results->rowCount() == 0) {
                                    echo "No comments";
                                } else {
                                    foreach ($pdo->query($sql) as $row) {

                                        $action = "<input value=" . $row['ReviewID'] . " type=hidden name='reviewID'>";
                                        echo "<div class='row mg'>";
                                        echo "<div class='col-sm-3'>";
                                        echo "<div style='font-weight:500'>";
                                        echo $row['name'];
                                        echo "</div>";
                                        echo "<div style='font-size:13px'>";
                                        echo $row['Comment_Date'];
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<div class = 'col-sm-8 card-text' style='font-size: 18px'>";
                                        echo "<div>";
                                        for ($i = 0; $i < 5; $i++) {
                                            if ($i < $row['rate']) {
                                                echo "<span class = 'fa fa-star checked'></span>";
                                            } else {
                                                echo "<span class = 'fa fa-star'></span>";
                                            }
                                        }
                                        echo "</div>";

                                        echo $row['Comment'];

                                        echo "</div>";
                                        echo "<br>";
                                        echo "<div class = 'col-sm-1'>";

                                        if ($userID == $row['userid']) {
                                            echo "<form action='deleteComment.php' method='POST'>";
                                            echo $action;
                                            echo "<button class='btn' name='delete'><i class='fa fa-trash'></i></button>";

                                            echo "</form>";
                                        }

                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                                ?>



                                <!-- textbox -->
                                <br>
                                <div class="container">
                                    <h4>Rate this website</h4>
                                    <?php
                                    if (isset($_GET['action']) == false) {
                                        //nothing happens
                                    } elseif ($_GET['action'] == 'empty') {
                                        echo "<p style='background-color:IndianRed'>Textbox or rating is empty!</p>";
                                    }
                                    ?>
                                    <div class="container">
                                        <form class="form-group" action="processReview.php" method="POST">
                                            <label for="commentInput"></label>
                                            <textarea class="form-control" id="textarea" rows="3" placeholder="Enter your review here!" name="text" ;></textarea>
                                            <br />
                                            <!-- star input -->
                                            <div class="star-rating">
                                                <div class="star-rating__wrap" style="margin-left: 5px;">
                                                    <input class="star-rating__input" id="star-rating-5" type="radio" name="rating" value="5" />
                                                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-5" title="5 out of 5 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-4" type="radio" name="rating" value="4" />
                                                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-4" title="4 out of 5 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-3" type="radio" name="rating" value="3" />
                                                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-3" title="3 out of 5 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-2" type="radio" name="rating" value="2" />
                                                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-2" title="2 out of 5 stars"></label>
                                                    <input class="star-rating__input" id="star-rating-1" type="radio" name="rating" value="1" />
                                                    <label class="star-rating__ico fa fa-star-o fa-lg" for="star-rating-1" title="1 out of 5 stars"></label>
                                                </div>
                                            </div>

                                            <br />
                                            <input class="btn btn-primary pull-right" type="submit" id="submit" value="Submit" name="Submit">

                                            </button>
                                            <br><br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-light py-5" id="footer">
                <div class="small text-center text-muted">
                    Copyright &copy; 2019 - travellerplan.com
                </div>
            </footer>
            <div>
</body>

</html>