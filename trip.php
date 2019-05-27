<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Trips</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
            width: 100%;
            margin: 10px;
        }

        .butt {
            border-width: 0px;
            font-weight: 500;
            padding: 6px;
            color: white;
            background-color: transparent;
            text-shadow: 1px 1px 2px grey;
        }

        .textcenter {
            text-align: center;
        }

        .butt:hover {
            background-color: white;
            color: black;
            text-shadow: 1px 1px 2px grey;
            border-radius: 15px
        }

        /* bold font */
        .fontclasss {
            text-shadow: 1px 1px 2px grey;
            font-weight: 500;

        }

        .fontt {
            text-shadow: 1px 1px 3px grey;
        }

        a {
            color: white;
        }

        /* CSS link color */
    </style>
    <link rel="stylesheet" type="text/css" href="css\trip.css">
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
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="trip.php">My Trip
                                    <span class="sr-only">(current)</span>
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
            <div class="jumbotron" style="background-color:#e6f5f9; padding: 1rem 2rem;margin-bottom : 4px;margin-left : 35px; margin-right : 35px;">
                <h1 style="text-align : center;">Plan Your Trip</h1><br>
                <div class="row">
                    <div class="col-sm-10">

                        <form method="POST" action="createPlan.php">
                            <div class="form-group row">
                                <label for="location" class="col-sm-3 trip1con">Where to visit :</label>
                                <div class="col-sm-9">
                                    <input type="text" id="location" class="form-control" required name="location" value="                                        <?php if (empty($_GET['location'])) { } else {
                                                                                                                                                                        $location = $_GET['location'];
                                                                                                                                                                        echo "$location";
                                                                                                                                                                    }
                                                                                                                                                                    ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="startdate" class="col-sm-3 col-form-label trip1con">Start Date : </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="startDate" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="enddate" class="col-sm-3 col-form-label trip1con">End Date : </label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="endDate" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tripname" class="col-sm-3 col-form-label trip1con">Trip Name : </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="tripName" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="textarea" class="col-sm-3 col-form-label trip1con">Description : </label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" rows="3" name="description" required></textarea>
                                </div>
                            </div>
                            <div id="submitbtn" class="col-sm-5">
                                <input type="submit" id="btnSubmit" class="btn btn-outline-light" style="padding: 6px 6px; border-radius: 20px;" value="Create Plan now!" />
                            </div>

                        </form>
                    </div>
                    <div class="col-sm-5" style="display:none">
                        <div class="container" id="map"></div>
                    </div>
                </div>

            </div>





            <div class="container currenttrip">
                <h1 style="font-family: 'Saira', sans-serif">Current Trip</h1>
                <div class="row" id="current">
                </div>
            </div>
            <br>
            <div class="container upcomingtrip">
                <h1 style="font-family: 'Saira', sans-serif">Upcoming Trip</h1>
                <div class="row" id="upcoming">
                </div>
            </div>
            <bR>
            <div class="container pasttrip">
                <h1 style="font-family: 'Saira', sans-serif">Past Trip</h1>
                <div class="row" id="past">
                    <br><br>
                </div>

            </div>
            <br><br>

        </div>
        <br><br>
        <footer class="bg-light py-5" id="footer">
            <div class="small text-center text-muted">
                Copyright &copy; 2019 - travellerplan.com
            </div>
        </footer>
    </div>
    <script>
        // This example requires the Places library. Include the libraries=places
        // parameter when you first load the API. For example:
        // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -33.8688,
                    lng: 151.2195
                },
                zoom: 13
            });
            var card = document.getElementById('pac-card');
            var input = document.getElementById('location');


            map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.setTypes([]);

            // Bind the map's bounds (viewport) property to the autocomplete object,
            // so that the autocomplete requests use the current map bounds for the
            // bounds option in the request.
            autocomplete.bindTo('bounds', map);

            // Set the data fields to return when the user selects a place.
            autocomplete.setFields(
                ['address_components', 'geometry', 'icon', 'name']);

            var infowindow = new google.maps.InfoWindow();
            var infowindowContent = document.getElementById('infowindow-content');
            infowindow.setContent(infowindowContent);
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17); // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                infowindowContent.children['place-icon'].src = place.icon;
                infowindowContent.children['place-name'].textContent = place.name;
                infowindowContent.children['place-address'].textContent = address;
                infowindow.open(map, marker);
            });



        }

        $(document).ready(function() {
            loadTrips("upcoming");
            loadTrips("current");
            loadTrips("past");

            function loadTrips(status) {
                $.ajax({
                    url: 'loadTrips.php',
                    data: {
                        status1: status
                    },
                    dataType: 'json',
                    success: function(data) {
                        console.log(data)
                        for ($i = 0; $i < data['length']; $i++) {
                            $id = "#" + status;
                            $div = $("<div/>").addClass("col-md-5 mt-3 text-white")
                            $card = $("<div/>").addClass("card ")
                            $card.attr("class", randomCardColor());
                            $image = $("<img/>").addClass("card-img-top")
                            $image.attr("src", "img/recommended/Banff.jpg")
                            $cardbody = $("<div/>").addClass("card-body")
                            $heading = $("<h3/>").addClass("card-title fontclasss")
                            $heading.text(data[$i]['TripName'])
                            $location = $("<h5/>").addClass("card-text fontt")
                            $location.text(data[$i]['Location'])
                            $description = $("<p/>").addClass("card-text fontt")
                            $date = $("<p/>").addClass("card-text fontt ")
                            $date.text(data[$i]['startDate'] + " ~ " + data[$i]['endDate'])
                            $description.text(data[$i]['Description'])
                            $footer = $("<div/>").addClass("card-footer")
                            $division = $("<div/>").addClass("row")
                            $division1 = $("<div/>").addClass("col-sm-4 p-1 textcenter")
                            $division2 = $("<div/>").addClass("col-sm-4 py-1 pl-0 pr-0 textcenter")
                            $division3 = $("<div/>").addClass("col-sm-3 textcenter")
                            $division.append($division1, $division2, $division3)
                            $view = $("<a/>")
                            $division1.append($view)
                            $view.text("View Plan").addClass("fontclasss")
                            $href = "activity.php?tripID=" + data[$i]['TripID']
                            $view.attr("href", $href)
                            $edit = $("<a/>").addClass("")
                            $division2.append($edit)
                            $href2 = "editPlan.php?tripID=" + data[$i]['TripID']
                            $edit.text("Edit Plan").addClass("fontclasss")
                            $edit.attr("href", $href2)
                            $form = $("<form/>")
                            $division3.append($form)
                            $php = "deletePlan.php"
                            $form.attr("action", $php)
                            $form.attr("method", "POST")
                            $input1 = $("<input/>")
                            $input1.attr("type", "hidden")
                            $input1.attr("value", data[$i]['TripID'])
                            $input1.attr("name", "tripID")
                            $input = $("<input/>")
                            $input.attr("type", "submit")
                            $input.attr("value", "Delete").addClass("butt")
                            $form.append($input1, $input)
                            // $delete = $("<a/>").addClass("ml-5")
                            // $delete.text("Delete")
                            // $delete.attr("href",$href2)
                            $footer.append($division)
                            $cardbody.append($heading, $location, $description, $date)
                            $card.append($image, $cardbody, $footer)
                            $div.append($card)
                            $($id).append($div)
                        }







                    }
                });
            };

            function randomCardColor() {
                var colors = ["bg-secondary", "bg-warning", "bg-info", "bg-success", "bg-dark"];
                $index = Math.floor(Math.random() * colors.length);
                return colors[$index];
            }
        });
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwk4OO9W_8MfNe_gcPNqpm7dpM5kPJrAc&libraries=places&callback=initMap" async defer></script>


    </div>
</body>

</html>