<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Trip</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css\trip.css">
</head>

<body>
    <?php
    include_once("config.php");
    $tripID = $_GET['tripID'];
    $sqlStatement = " SELECT * FROM trips WHERE TripID = '$tripID' ";
    $results = $pdo->query($sqlStatement);
    $row = $results->fetch();
    $location = $row['Location'];
    $startDate = $row['startDate'];
    $endDate = $row['endDate'];
    $tripName = $row['TripName'];
    $description = $row['Description'];
    $editTrip = "editPlanphp.php?tripID=" . $tripID;
    ?>
    <div class="jumbotron" style="background-color:#e6f5f9; padding: 1rem 2rem;margin-bottom : 4px;margin-left : 35px; margin-right : 35px;">

        <h1 style="text-align : center;">Trips</h1><br>
        <form method="POST" action=<?php echo $editTrip ?>>
            <div class="form-group row">
                <label for="location" class="col-sm-3 trip1con">Where to visit </label>
                <div class="col-sm-9">
                    <input type="text" id="location" value="<?php echo $location ?>" class="form-control" required name="location">
                </div>
            </div>

            <div class="form-group row">
                <label for="startdate" class="col-sm-3 col-form-label trip1con">Start Date: </label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?php echo $startDate ?>" name="startDate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="enddate" class="col-sm-3 col-form-label trip1con">End Date: </label>
                <div class="col-sm-9">
                    <input type="date" class="form-control" value="<?php echo $endDate ?>" name="endDate" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="tripname" class="col-sm-3 col-form-label trip1con">Trip Name: </label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" value="<?php echo $tripName ?>" name="tripName" required>
                </div>
            </div>

            <div class="form-group row">
                <label for="textarea" class="col-sm-3 col-form-label trip1con">Description: </label>
                <div class="col-sm-9">
                    <textarea class="form-control" rows="3" name="description" required><?php echo $description ?></textarea>
                </div>
            </div>
            <div class="col-sm-5" style="float:center;">
                <input type="submit" id="btnSubmit2" class="btn btn-outline-light" style="padding: 6px 6px; border-radius: 20px;" value="Save" />
            </div>
            <div class="col-sm-5" style="display:none">
                <div class="container" id="map"></div>

        </form>
    </div>
    <script>
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
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwk4OO9W_8MfNe_gcPNqpm7dpM5kPJrAc&libraries=places&callback=initMap" async defer></script>



</body>

</html>