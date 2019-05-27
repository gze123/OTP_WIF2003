<!DOCTYPE html>
<html lang="en">

<head>
  <title>Edit Activity</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/activity.css" />

    <title>Activity </title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
        width: 100%;
        margin: 10px;
      }
    </style>
  </head>

  <body>
    <?php
    include_once("config.php");
    $activityID = $_GET['activityID'];
    $tripID = $_GET['tripID'];
    $sqlStatement = " SELECT * FROM activity WHERE activity_id = '$activityID' ";
    $results = $pdo->query($sqlStatement);
    $row = $results->fetch();
    $activity = $row['activity_name'];
    $description = $row['description'];
    $location = $row['location'];
    $type = $row['type'];
    $startDate = $row['start_date'];
    $startTime = $row['start_time'];
    $endDate = $row['end_date'];
    $endTime = $row['end_time'];
    $editActivity = "editActitvityphp.php?activityID=" . $activityID . "&tripID=" . $tripID;
    ?>
    <?php
    include_once("config.php");
    $tripID = $_GET['tripID'];
    $createActivity = "createActivity.php?tripID=" . $tripID;

    $sql = "SELECT TripName from trips where TripID = '$tripID'";
    $result = $pdo->query($sql);
    $row = $result->fetch();
    $tripName = $row['TripName'];
    ?>


    <main class="container">

      <div class="row">
        <div class="col-sm-5">

          <h1 class="mb-3 " style="text-align: center; color:white;text-shadow:3px 3px 3px black;"><?php echo $tripName ?> </h1>
          <form method="POST" action="<?php echo $editActivity ?>">
            <div>
              <div class="col-md-12 mb-3">
                <label style="color:white" for="activity">Activity</label>
                <input type="text" class="form-control" id="activity" name="activityName" required value="<?php echo $activity ?>">

              </div>
            </div>

            <div>
              <div class="col-md-12 mb-3">
                <label style="color:white" for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" required value="<?php echo $location ?>">

              </div>
            </div>

            <div>
              <div class="col-md-12 mb-3">
                <label style="color:white" for="description">Description</label>
                <textarea rows="4" cols="62" name="description" class="form-control" required><?php echo $activity ?></textarea>

              </div>
            </div>

            <div>
              <div class="col-md-12 mb-3">
                <label style="color:white" for="type">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="<?php echo $type ?>" required>

              </div>
            </div>

            <div class="row ml-1">
              <div class="col-md-6 mb-3">
                <label style="color:white" for="startDate">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo $startDate ?>" required>

              </div>

              <div class="col-md-5 mb-3">
                <label style="color:white" for="startTime">Start Time</label>
                <input type="time" class="form-control" id="startTime" name="startTime" value="<?php echo $startTime ?>" required>

              </div>
            </div>

            <div class="row ml-1">
              <div class="col-md-6 mb-3">
                <label style="color:white" for="endDate">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo $endDate ?>" required>

              </div>
              <div class="col-md-5 mb-3">
                <label style="color:white" for="endTime">End Date</label>
                <input type="time" class="form-control" id="endTime" name="endTime" value="<?php echo $endTime ?>" required>

              </div>
            </div>


            <div class="row">
              <div class="col-sm-5">
                <input type="submit" name="button" id="btnSubmit" class="ml-3 bttn" value="Save" />
              </div>
              <div class="col-sm-5">
                <input type="submit" name="button" id="btnSubmit" class="ml-5 bttD" value="Delete" />
              </div>
            </div>

          </form>
        </div>
        <div class="col-sm-7">
          <div class="container" id="map"></div>
        </div>
      </div>
      <br>
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