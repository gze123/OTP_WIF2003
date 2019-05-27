<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="ie=edge" http-equiv="X-UA-Compatible" />

    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" rel="stylesheet" />
    <!-- Font Awesome Icons -->

    <link crossorigin="anonymous" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" rel="stylesheet" />

    <!-- Font Awesome -->
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet" />
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />

    <link href="css\weather.css" rel="stylesheet" type="text/css">
    <title>Weather Forecast</title>


</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php
            session_start();
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
                            <li class="nav-item active">
                                <a class="nav-link" href="weatherForecast.php">Weather
                                    <span class="sr-only">(current)</span>
                                </a>
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
                                <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink-333">
                                    <i class="fas fa-user"></i>
                                </a>
                                <div aria-labelledby="navbarDropdownMenuLink-333" class="dropdown-menu dropdown-menu-right dropdown-default">
                                    <a class="dropdown-item" href="profile.php">Profile</a>
                                    <a class="dropdown-item" href="logoutphp.php">Log Out</a>

                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!--/.Navbar -->
                <div id="bgimg" style="background-image: url('img/bg2.png') ">
                    <section class="text-center" id="jumbotron1">


                        <div class="container ">
                            <br>
                            <br>
                            <h1 class="display-1 " style="font-weight: 500; text-shadow: 5px 5px 5px hsl(0, 0%, 64%);">

                                Weather Forecast
                            </h1>
                            <br><br>
                            <div>
                                <form class="form-inline" method="post"></form>
                                <div style="display: flex; justify-content:center; widows: 100%;text-align: center ">


                                    <input list="savedPlace" class="form-control  input myinput " id="destination" name="inputCity" placeholder="Enter destination" required style="border-width: 2px;border-color: #007e8f;; max-width:50vw;margin: 0 auto" type="text" />
                                    <datalist id="savedPlace">
                                        <?php
                                        include_once("config.php");

                                        $userID = $_SESSION['user_id'];
                                        echo $userID;

                                        $sql = "SELECT placeName FROM savedPlace where userid='$userID'";
                                        $result = $pdo->query($sql);
                                        foreach ($result as $row) : ?>
                                            <option><?= $row["placeName"] ?></option>
                                        <?php endforeach ?>


                                        <?
                                        $pdo = null;
                                        ?>

                                    </datalist>
                                    <input class="form-control ml-3 input myinput" id="date" name="date" placeholder="Select Your date" style="max-width:30vw;margin: 0 auto ;border-width: 2px;border-color: #007e8f;;" type="date">
                                </div>
                                <div class="col-auto">
                                    <br>
                                    <button id="testing" onclick="test()">
                                        Search
                                    </button>
                                    <br><br>

                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </header>
            <main style="background-image: url('img/bg3.svg');">
                <div class="container" id="weatherbox" style="display :none ">
                    <br />

                    <h5 id="currentweather" style="font-size: medium">
                        <?php
                        include_once("config.php");

                        $userID = $_SESSION['user_id'];
                        $sql = "SELECT * FROM members WHERE userid='$userID'";
                        $result = $pdo->query($sql);

                        while ($res = $result->fetch()) {

                            $userName = $res['name'];
                        }

                        ?>
                        Hi <?php echo $userName ?>, here is the weather forecasts in
                        <span id="des"></span>
                        on
                        <span id="date2"></span>
                        onwards

                    </h5>
                    <br />
                    <div class="row">
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                    <img alt="Card image cap" class="card-img-top" id="wI1" src="" />
                                    <p class="card-texts" id="temp1"></p>
                                    <p class="card-texts" id="wind1"></p>
                                    <p class="card-texts" id="wD1"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                    <img alt="Card image cap" class="card-img-top" id="wI2" src="" />
                                    <p class="card-texts" id="temp2"></p>
                                    <p class="card-texts" id="wind2"></p>
                                    <p class="card-texts" id="wD2"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <img alt="Card image cap" class="card-img-top" id="wI3" src="" />
                                    <p class="card-texts" id="temp3"></p>
                                    <p class="card-texts" id="wind3"></p>
                                    <p class="card-texts" id="wD3"></p>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <img alt="Card image cap" class="card-img-top" id="wI4" src="" />
                                    <p class="card-texts" id="temp4"></p>
                                    <p class="card-texts" id="wind4"></p>
                                    <p class="card-texts" id="wD4"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card ">
                                <div class="card-body">
                                    <img alt="Card image cap" class="card-img-top" id="wI5" src="" />
                                    <p class="card-texts" id="temp5"></p>
                                    <p class="card-texts" id="wind5"></p>
                                    <p class="card-texts" id="wD5"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br />
                    <br />
                </div>

            </main>
        </div>
        <br><br>
        <!-- Footer -->
        <footer class="bg-light py-5" id="footer">
            <div class="container">
                <div class="small text-center text-muted">
                    Copyright &copy; 2019 - travellerplan.com
                </div>
            </div>
        </footer>

        <script>
            function test() {
                var input = document.getElementById("destination").value;
                var datee = document.getElementById("date").value;

                var url = "https://afternoon-lake-52934.herokuapp.com/weather?city=" + input;
                var request = new XMLHttpRequest();
                request.open("GET", url, true);
                request.onload = function() {
                    var data = JSON.parse(this.response);
                    var Temp1 = (document.getElementById("temp1").innerHTML = data[0].temperature + " °C");
                    var Wind1 = (document.getElementById("wind1").innerHTML = data[0].wind + " KM/H");
                    var WeatherD1 = (document.getElementById("wD1").innerHTML = data[0].weatherDescription);
                    var Destination = (document.getElementById("des").innerHTML = input);
                    var forecastedDate = (document.getElementById("date2").innerHTML = datee);
                    var weatherIcon1 = document.getElementById("wI1").setAttribute("src", "img/icon/" + data[0]
                        .weatherIcon + ".png");

                    var Temp2 = (document.getElementById("temp2").innerHTML = data[1].temperature + " °C");
                    var Wind2 = (document.getElementById("wind2").innerHTML = data[1].wind + " KM/H");
                    var WeatherD2 = (document.getElementById("wD2").innerHTML = data[1].weatherDescription);
                    var weatherIcon2 = document.getElementById("wI2").setAttribute("src", "img/icon/" + data[1]
                        .weatherIcon + ".png");

                    var Temp3 = (document.getElementById("temp3").innerHTML = data[2].temperature + " °C");
                    var Wind3 = (document.getElementById("wind3").innerHTML = data[2].wind + " KM/H");
                    var WeatherD3 = (document.getElementById("wD3").innerHTML = data[2].weatherDescription);
                    var weatherIcon3 = document.getElementById("wI3").setAttribute("src", "img/icon/" + data[2]
                        .weatherIcon + ".png");

                    var Temp4 = (document.getElementById("temp4").innerHTML = data[3].temperature + " °C");
                    var Wind4 = (document.getElementById("wind4").innerHTML = data[3].wind + " KM/H");
                    var WeatherD4 = (document.getElementById("wD4").innerHTML = data[3].weatherDescription);
                    var weatherIcon4 = document.getElementById("wI4").setAttribute("src", "img/icon/" + data[3]
                        .weatherIcon + ".png");

                    var Temp5 = (document.getElementById("temp5").innerHTML = data[4].temperature + " °C");
                    var Wind5 = (document.getElementById("wind5").innerHTML = data[4].wind + " KM/H");
                    var WeatherD5 = (document.getElementById("wD5").innerHTML = data[4].weatherDescription);
                    var weatherIcon5 = document.getElementById("wI5").setAttribute("src", "img/icon/" + data[4]
                        .weatherIcon + ".png");
                    var abc = document.getElementById("weatherbox");
                    abc.style.display = "block";
                };

                request.send();
            }
        </script>

        <!-- JQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
        <!-- Bootstrap tooltips -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js" type="text/javascript">
        </script>
        <!-- Bootstrap core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- MDB core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js" type="text/javascript">
        </script>
    </div>
</body>

</html>