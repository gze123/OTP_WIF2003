<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css\trip.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\recommendation.css">
    <style>
        .jumbotron {
            min-height: 350px;
        }

        .checked {
            color: orange;
        }

        .fa {
            font-size: 25px;

        }
    </style>
    <title>Recommendation</title>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
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
                            <li class="nav-item active">
                                <a class="nav-link" href="recommendation.php">Recommendation
                                    <span class="sr-only">(current)</span>
                                </a>
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
            <div class="jumbotron jumbotron-fluid " style="background-image: url(img/recommended/home.jpg); background-size: 100%; ">
                <div class="container mt-auto">
                    <h1 class="display-1 text-center" style="color:white;font-weight: 500; text-shadow: 5px 5px 7px hsl(0, 0%, 5%);">DISCOVER NEW
                        WORLD</h1>
                    <br>
                    <form>
                        <div class="row" style="text-align: center">
                            <div class="col ">
                                <select class="custom-select d-block w-100 " id="state">
                                    <option value="">Choose Preferred Weather</option>
                                    <option>Sunny</option>
                                    <option>Cloudy</option>
                                    <option>Fog</option>
                                    <option>Raining</option>
                                    <option>Lightning</option>
                                    <option>Snow</option>
                                    <option>Wind</option>
                                    <option>Tornado</option>
                                </select>
                            </div>
                            <div class="col-5">
                                <select id="interestOption" class="custom-select d-block w-100" id="state" required>
                                    <option value="">Choose Your Interest</option>
                                    <option value="Food Lover">Food Lover</option>
                                    <option value="Adventure">Adventure</option>
                                    <option value="Wellness Break">Wellness Break</option>
                                    <option value="Shopping">Shopping</option>
                                    <option value="Historical">Historical</option>
                                    <option value="Nature Lover">Nature Lover</option>
                                    <option value="Sightseeing">Sightseeing</option>
                                    <option value="Wildlife-watching">Wildlife-watching</option>
                                </select>
                            </div>
                            <div class="col-xs-2">
                                <input id="interestInput" type="Button" class="btn btn-danger form-control" value="Search"></input>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="container">
                <h1 class="display-4" id="setText">Popular Places</h1>
            </div>
            <div class="container" id="content">



            </div>
        </div>
        <footer class="bg-light py-5" id="footer">
            <div class="small text-center text-muted">
                Copyright &copy; 2019 - travellerplan.com
            </div>
        </footer>
        <script>
            $(document).ready(function() {

                $.getJSON("http://afternoon-lake-52934.herokuapp.com/recommendation", function(json) {
                    $content = json
                    for ($j = 0; $j < $content.length; $j++) {
                        $anchor = $("<a/>")
                        $anchor.attr("href", "https://www.tripadvisor.com.my/Search?q=" + $content[$j].name)
                        $jumbo = $("<div/>").addClass("jumbotron")
                        $jumbo.attr("href", "https://www.tripadvisor.com.my/Search?q=" + $content[$j].name)
                        $image = $("<img/>").addClass("float-right ml-3 img-fluid")
                        $image.css({
                            "width": "300px",
                            "height": "300px"
                        });
                        $image.attr("src", "img/recommended/" + $content[$j].name + ".jpg")
                        $paragraph = $("<div/>").addClass("mr-5 pr-5")
                        $paragraph.text("Description: " + $content[$j].description)
                        $paragraph.css({
                            "text-align": "justify",
                            "font-size": "1vw",
                            "font-family": "Quicksand, sans-serif"

                        })
                        $heading = $("<h1/>")
                        $form = $("<form/>").addClass("mt-2 mb-2");
                        $form.attr("method", "POST");
                        $action = "savePlace.php?placeName=" + $content[$j].name;
                        $form.attr("action", $action);
                        $input = $("<input/>")
                        $input.attr("type", "submit")
                        $input.attr("value", "Save")
                        $input.addClass("btn btn-info")
                        $input.css({
                            "padding": "10px",
                            "width": "100px"


                        })
                        $form.append($input);
                        $heading.text($content[$j].name)
                        $("#content").append($jumbo)
                        $star = $("<div/>");
                        $star.text("Rating: ")
                        $spanchecked = $("<span/>").addClass("fa fa-star checked");
                        $span = $("<span/>").addClass("fa fa-star");
                        for ($i = 0; $i < 5; $i++) {
                            if ($i < $content[$j].rating) {
                                $star.append($spanchecked.clone());
                            } else {
                                $star.append($span.clone());
                            }
                        }
                        $jumbo.append($image, $anchor, $star, $paragraph, $form)
                        $anchor.append($heading)
                    }

                });

                $("#interestInput").click(function() {
                    $("#content").empty()
                    $selectedInterest = $("#interestOption").children("option:selected").val()
                    $("#setText").text("Places for " + $selectedInterest)
                    $url = "http://afternoon-lake-52934.herokuapp.com/recommendation?interest=" +
                        $selectedInterest
                    $.getJSON($url, function(json) {
                        $content = json
                        for ($j = 0; $j < $content.length; $j++) {
                            $anchor = $("<a/>")
                            $anchor.attr("href", "https://www.tripadvisor.com.my/Search?q=" +
                                $content[$j].name)
                            $jumbo = $("<div/>").addClass("jumbotron")
                            $jumbo.css({
                                "height": "450px"
                            })
                            $jumbo.attr("href", "https://www.tripadvisor.com.my/Search?q=" +
                                $content[$j].name)
                            $image = $("<img/>").addClass("float-right ml-3 img-fluid")
                            $image.css({
                                "width": "300px",
                                "height": "300px"
                            });
                            $image.attr("src", "img/recommended/" + $content[$j].name + ".jpg")
                            $paragraph = $("<div/>").addClass("mr-5 pr-5")
                            $paragraph.text("Description: " + $content[$j].description)
                            $paragraph.css({
                                "text-align": "justify",
                                "font-size": "1vw"
                            })
                            $heading = $("<h1/>")
                            $heading.text($content[$j].name)
                            $form = $("<form/>").addClass("mt-2");
                            $form.attr("method", "POST");
                            $action = "savePlace.php?placeName=" + $content[$j].name;
                            $form.attr("action", $action);
                            $input = $("<input/>")
                            $input.attr("type", "submit")
                            $input.attr("value", "Save")
                            $form.append($input);
                            $heading.text($content[$j].name)
                            $("#content").append($jumbo)
                            $star = $("<div/>");
                            $star.text("Rating: ")
                            $spanchecked = $("<span/>").addClass("fa fa-star checked");
                            $span = $("<span/>").addClass("fa fa-star");
                            for ($i = 0; $i < 5; $i++) {
                                if ($i < $content[$j].rating) {
                                    $star.append($spanchecked.clone());
                                } else {
                                    $star.append($span.clone());
                                }
                            }
                            $jumbo.append($image, $anchor, $star, $paragraph, $form)
                            $anchor.append($heading)
                        }

                    });



                });


            })
        </script>
    </div>
</body>

</html>