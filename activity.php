<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/checklist.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Kavivanar&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Saira&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link href="https://fonts.googleapis.com/css?family=Inder&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/activity.css" />

    <title>Edit Activity </title>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
        #map {
            height: 100%;
            width: 100%;
            margin: 10px;
        }

        .fonttype {
            font-family: Roboto, sans-serif;
        }
    </style>
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <div id="a">
                <header>
                    <!--Navbar -->
                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                        <a class="navbar-brand" href="#" style="font-weight: 800;text-shadow : 1px 2px 8px rgb(160, 160, 160); ">TravellerPlan</a>
                        <button aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent-333" data-toggle="collapse" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
                            <ul class="navbar-nav mr-auto fonttype">
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
                <?php
                include_once("config.php");
                $tripID = $_GET['tripID'];
                $createActivity = "createActivity.php?tripID=" . $tripID;

                $sql = "SELECT TripName from trips where TripID = '$tripID'";
                $result = $pdo->query($sql);
                $row = $result->fetch();
                $tripName = $row['TripName'];

                ?>

                <main id="allinfo" class="container">

                    <div class="row " style="font-family: 'Inder', sans-serif;color:white;">
                        <div class="col-sm-5">
                            <br>
                            <h1 class="mb-3 " style="text-align: center; color:white;text-shadow:3px 3px 3px black;">
                                <?php echo $tripName ?> </h1>
                            <form method="POST" action=<?php echo $createActivity ?>>
                                <div>
                                    <div class="col-md-12 mb-3">
                                        <label for="activity">Activity</label>
                                        <input style="color:black" type="text" placeholder="What are you going to do ..." class="form-control" id="activity" name="activityName" required>

                                    </div>
                                </div>

                                <div>
                                    <div class="col-md-12 mb-3">
                                        <label for="location">Location</label>
                                        <input style="color:black" type="text" class="form-control" id="location" name="location" required>

                                    </div>
                                </div>

                                <div>
                                    <div class="col-md-12 mb-3">
                                        <label for="description">Description</label>
                                        <textarea rows="4" cols="62" style="color:black" placeholder="Explain a bit about you activity " name="description" class="form-control" required></textarea>

                                    </div>
                                </div>

                                <div>
                                    <div class="col-md-12 mb-3">
                                        <label for="type">Type</label>
                                        <input style="color:black" type="text" placeholder="What kind of activity " class="form-control" id="type" name="type" required>

                                    </div>
                                </div>

                                <div style="color:black" class="row ml-1">
                                    <div class="col-md-6 mb-3">
                                        <label style="color:white" for="startDate">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" name="startDate" required>

                                    </div>

                                    <div class="col-md-5 mb-3">
                                        <label style="color:white" for="startTime">Start Time</label>
                                        <input type="time" class="form-control" id="startTime" name="startTime" required>

                                    </div>
                                </div>

                                <div style="color:black" class="row ml-1">
                                    <div class="col-md-6 mb-3">
                                        <label style="color:white" for="endDate">End Date</label>
                                        <input type="date" class="form-control" id="endDate" name="endDate" required>

                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label style="color:white" for="endTime">End Time</label>
                                        <input type="time" class="form-control" id="endTime" name="endTime" required>
                                    </div>
                                </div>
                                <div>
                                    <div class="col-sm-10">
                                        <input type="submit" id="btnSubmit" class="bttn" value="Add Activity" />

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-7">
                            <div class="container" id="map"></div>
                        </div>
                        <br>

                    </div><br>
            </div>
            <div style="background-color:white;font-family: 'Inder', sans-serif">
                <!-- timeline -->
                <div class="container mt-5">
                    <h1 id="tajuk">Timeline</h1>
                    <section class="cd-timeline js-cd-timeline">
                        <div class="container container--lg cd-timeline__container" id="timeline">

                            <?php
                            include_once("config.php");
                            $tripID = $_GET['tripID'];
                            $createPlan = "createActivity.php?tripID=" . $tripID;
                            $sql = "SELECT * FROM activity WHERE tripID=$tripID order by start_date,start_time";
                            $step = $pdo->prepare($sql);
                            $step->execute();
                            $steps = $step->fetchAll();
                            if ($step->rowCount() == 0) {
                                echo "No activity";
                            } else {
                                foreach ($steps as $row) {
                                    //create block
                                    echo '<div class="cd-timeline__block">';

                                    echo '<div class="cd-timeline__img cd-timeline__img--picture">';
                                    echo '<img src="img/cd-icon-picture.svg" alt="Picture" />';
                                    echo '</div>';

                                    echo '<div class="cd-timeline__content text-component">';
                                    echo "<h2>$row[activity_name]</h2>";
                                    echo '<p class="text--subtle">';
                                    echo "$row[description]";
                                    echo '</p>';
                                    echo '<p class="text--subtle">';
                                    echo " $row[start_time] -------- " . " $row[end_time]";
                                    echo '</p>';

                                    echo '<div class="flex flex--space-between flex--center-y">';
                                    echo '<span class="cd-timeline__date">';
                                    echo "$row[start_date]";
                                    $anchor = "<a href = editActivity.php?activityID=" . $row['activity_id'] . "&tripID=" . $tripID . ">Edit<a/>";
                                    echo '</span>';

                                    echo '</div>';
                                    echo '<div>';
                                    echo $anchor;
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                            ?>
                        </div>
                </div>
                <br><br>
                </section>
                <section class="container">

                    <h1 id=checklists>CheckList</h1>
                    <br>
                    <div id="myDIV" class="header1">
                        <h2 style="margin-bottom:20px; margin-top:10px;;">Things to bring</h2>
                        <form action="checklistphp.php" method="POST">
                            <input type="text" id="myInput" name="check" placeholder="What do you want to bring ?" />
                            <input type="hidden" name="state" value="0">
                            <?php $tripID = $_GET['tripID'];
                            echo "<input type='hidden' name='tripID' value='$tripID' >";
                            ?>
                            <input value="Add" type="submit" name="Submit" id="addBtn" class="addBtn" />

                        </form>

                    </div>

                    <div class="row mt-1">
                        <div class="col-sm-10 " style="padding-right:0px;background-color:azure;">

                            <?php
                            include_once("config.php");
                            $tripID = $_GET['tripID'];
                            $sql = "SELECT * FROM checklist where tripID='$tripID'";
                            $result = $pdo->query($sql);
                            $tripID = $_GET['tripID'];

                            echo "<div>";
                            if ($result->rowCount() == 0) {
                                echo "<div>Empty list</div>";
                            } else {
                                while ($res = $result->fetch()) {
                                    $check1 = $res['checkname'];
                                    $state = $res['state'];
                                    if ($state == 0) {
                                        $state2 = 'Pending';
                                        $style = "font-size:23px";
                                        $stylebg = "background-color : #ff4f4f;border: 1px solid black";
                                    } else {
                                        $state2 = 'Completed';
                                        $style = "text-decoration:line-through;color:grey";
                                        $stylebg = "background-color : #61ff61;border: 1px solid black;";
                                    }
                                    echo "<form action='checklistphp.php' method='post'>";
                                    echo "<input type='hidden' name='tripID' value='$tripID' >";
                                    echo "<input type='hidden' name='check_name' value='$check1'>";
                                    echo "<input type='hidden' name='state' value='$state2'>";
                                    echo "<script>console.log('$check1')</script>";
                                    echo "<input type='submit' style='$stylebg' name='checkState' value='$state2' class='col-sm-3 hoverbtn' required>";

                                    echo "<label class='col-sm-8' style='$style'>" . $check1 . "</label>";
                                    echo "</form>";
                                    // echo "<li class='check'>" . $check . "</li>";
                                }
                            }
                            echo "</div>";
                            ?>

                        </div>

                        <div class="col-sm-2" style="background-color:azure;">

                            <?php
                            include_once("config.php");
                            $tripID = $_GET['tripID'];
                            $sql = "SELECT * FROM checklist where tripID = '$tripID'";
                            $result = $pdo->query($sql);
                            while ($res = $result->fetch()) {
                                $checkd = $res['checkname'];
                                echo "<form action='checklistphp.php' method='post'>";
                                echo "<input type='hidden' name='tripID' value='$tripID' >";
                                echo "<input type='hidden' name='check_name' value='$checkd'>";
                                echo "<input type='submit' name='delete' Value='Delete'  class='col-sm-12' required>";
                                echo "</form>";

                                // echo "<li class='check'>" . $check . "</li>";
                            }


                            ?>

                        </div>
                    </div>
                    <br><br>
                </section>
            </div>



            </main>
            <script>
                // $(document).ready(function(){
                //   $.ajax({  
                //       url: 'loadTimeLine.php',
                //       // data: {id :tripID},
                //       dataType: 'json',
                //       success: function(data){
                //         for($i=0;$i<data['length'];$i++){
                //           $div = $("<div/>").addClass("cd-timeline__block")
                //           $div2 = $("<div/>").addClass("cd-timeline__img cd-timeline__img--picture ")
                //           $image = $("<img/>")
                //           $image.attr("src","assets/img/cd-icon-picture.svg")
                //           $div3 = $("<div/>").addClass("cd-timeline__content text-component")
                //           $heading = $("<h2/>")
                //           $heading.text(data[$i]['activity_name'])
                //           $description = $("<h4/>").addClass("text--subtle")
                //           $description.text(data[$i]['description'])
                //           $div4 = $("<div/>").addClass("flex flex--space-between flex--center-y")
                //           $date = $("<span/>").addClass("cd-timeline__date")
                //           $date.text(data[$i]['startDate']+" "+data[$i]['startTime']+"---"+data[$i]['endDate']+" "+data[$i]['endTime'])
                //           $div4.append($date)
                //           $div3.append($heading,$description,$div4)
                //           $div2.append($image)
                //           $div.append($div2,$div4)
                //           $("#timeline").append($div);

                //         }
                //           console.log(data);

                //       }
                //     });
                // });



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
            </script>
            <script src="js/main.js"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwk4OO9W_8MfNe_gcPNqpm7dpM5kPJrAc&libraries=places&callback=initMap" async defer></script>
        </div>
        <footer id="footer">
            <div class="small text-center text-muted">
                Copyright &copy; 2019 - travellerplan.com
            </div>
        </footer>
    </div>
</body>


</html>