<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Places</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Maven+Pro&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css\myplace.css">
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
                            <li class="nav-item">
                                <a class="nav-link" href="recommendation.php">Recommendation

                                </a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="myPlace.php">Saved Places
                                    <span class="sr-only">(current)</span>
                                </a>
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
            <?php
            if (empty($_GET['status'])) { } else {
                echo "<script type='text/javascript'> alert('Place exist!');</script>";
            }
            ?>

            <div class="container">
                <h1>Saved Places</h1>
                <div class="row" id="saved">
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    loadPlaces();

                    function loadPlaces() {
                        $.ajax({
                            url: 'loadPlaces.php',
                            dataType: 'json',
                            success: function(data) {
                                console.log(data)

                                for ($i = 0; $i < data['length']; $i++) {
                                    $id = "#saved";
                                    $div = $("<div/>").addClass("col-md-3 mt-3 text-white boxx")
                                    $card = $("<div/>").addClass("card ")
                                    $card.attr("class", randomCardColor());
                                    $image = $("<img/>").addClass("card-img-top")
                                    $picture = "img/recommended/" + data[$i]['placeName'] + ".jpg"
                                    $image.attr("src", $picture)
                                    $cardbody = $("<div/>").addClass("card-body")
                                    $heading = $("<h4/>").addClass("card-title")
                                    $heading.text(data[$i]['placeName']).addClass("fontt")
                                    $footer = $("<div/>").addClass("card-footer")
                                    $division = $("<div/>").addClass("row")
                                    $division1 = $("<div/>").addClass("col-sm-6")
                                    $division2 = $("<div/>").addClass("col-sm-6")
                                    $view = $("<a/>")
                                    $view.attr("style", "color:white")
                                    $view.text("Add to trip").addClass("fontt")
                                    $division1.append($view)
                                    $action = "deletePlace.php?placeID=" + data[$i]['placeID']
                                    $form = $("<form/>")
                                    $form.attr("method", "POST")
                                    $form.attr("action", $action)
                                    $input = $("<input/>")
                                    $input.attr("type", "submit")
                                    $input.attr("value", "Delete").addClass("butt")
                                    $form.append($input)
                                    $division2.append($form)
                                    $division.append($division1, $division2)
                                    $href = "trip.php?location=" + data[$i]['placeName'];
                                    $view.attr("href", $href)
                                    $footer.append($division)
                                    $cardbody.append($heading)
                                    $card.append($image, $cardbody, $footer)
                                    $div.append($card)
                                    $($id).append($div)
                                }





                            }
                        });
                    };

                    function randomCardColor() {
                        var colors = ["bg-secondary", "bg-warning", "bg-info", "bg-success", "bg-danger",

                        ];
                        $index = Math.floor(Math.random() * colors.length);
                        return colors[$index];
                    }
                });
            </script>

        </div>
        <br><br><br><br>
        <footer class="bg-light py-5" id="footer">
            <div class="small text-center text-muted">
                Copyright &copy; 2019 - travellerplan.com
            </div>
        </footer>

    </div>
</body>

</html>