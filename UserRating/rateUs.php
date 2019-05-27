<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rate Us</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
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
      .star-rating__ico:hover ~ .star-rating__ico:before,
      .star-rating__input:checked ~ .star-rating__ico:before {
        content: "\f005";
      }
      .mg {
        margin: 20px;
      }
      .btn {
        background-color: DodgerBlue; /* Blue background */
        border: none; /* Remove borders */
        color: white; /* White text */
        padding: 12px 16px; /* Some padding */
        font-size: 16px; /* Set a font size */
        cursor: pointer; /* Mouse pointer on hover */
      }
    </style>
 
  </head>
  <body>
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
          <img src="kl.jpg" width="100%" height="500" />
        </div>
        <div class="carousel-item">
          <img src="batu.jpg" width="100%" height="500" />
        </div>
        <div class="carousel-item">
          <img src="pavi.jpg" width="100%" height="500" />
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

    <div class="container-fluid mb-3">
      <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <div class="mb-3">
            <!-- comment box-->

            <div class="container" id="comment">
              <h2 class="font-weight-medium">Reviews</h2>
              <hr />
              <?php
              include_once("config.php");
              $sql = "SELECT * FROM usercomment ORDER BY reviewid DESC";
              foreach($conn->query($sql) as $row){
                $userid = $row['userid'];
                echo "<div class='row mg'>";
                        echo "<div class='col-sm-3'>";
                            echo "<div>";
                            echo $row['userid'];
                            echo "</div>";
                            echo "<div>";
                            echo $row['comment_date'] ;
                            echo "</div>";
                        echo "</div>";
                        echo "<div class = 'col-sm-8 card-text'>";
                            echo "<div>";
                                for($i=0;$i<5;$i++){
                                  if($i<$row['rating']){
                                    echo "<span class = 'fa fa-star checked'></span>";
                                  }
                                  else{
                                    echo "<span class = 'fa fa-star'></span>";
                                  }
                                }
                            echo "</div>";
                            echo $row['comment']; 
                        echo "</div>"; 
                        echo "<div class = 'col-sm-1'>";
                          echo "<form action='deleteComment.php' method='POST'>";
                                echo "<button class='btn' name='delete'><i class='fa fa-close'></i></button>";
                                
                          echo "</form>";
                        
                        echo "</div>";
                echo "</div>";
              }
                ?>



            <!-- textbox -->
            <div class="container">
              <h4>Rate this place</h4>
              <?php
              if(isset($_GET['action'])==false){
              //nothing happens
              }
              elseif($_GET['action']=='empty'){
                echo "<p style='background-color:IndianRed'>Textbox or rating is empty!</p>";
              }
              ?>
              <div class="container">
                <form class="form-group" action="processReview.php" method="POST">
                  <label for="commentInput"></label>
                  <textarea
                    class="form-control"
                    id="textarea"
                    rows="3"
                    placeholder="Enter your review here!"
                    name="text";
                  ></textarea>
                  <br />
                  <!-- star input -->
                  <div class="star-rating">
                    <div class="star-rating__wrap">
                      <input
                        class="star-rating__input"
                        id="star-rating-5"
                        type="radio"
                        name="rating"
                        value="5"
                      />
                      <label
                        class="star-rating__ico fa fa-star-o fa-lg"
                        for="star-rating-5"
                        title="5 out of 5 stars"
                      ></label>
                      <input
                        class="star-rating__input"
                        id="star-rating-4"
                        type="radio"
                        name="rating"
                        value="4"
                      />
                      <label
                        class="star-rating__ico fa fa-star-o fa-lg"
                        for="star-rating-4"
                        title="4 out of 5 stars"
                      ></label>
                      <input
                        class="star-rating__input"
                        id="star-rating-3"
                        type="radio"
                        name="rating"
                        value="3"
                      />
                      <label
                        class="star-rating__ico fa fa-star-o fa-lg"
                        for="star-rating-3"
                        title="3 out of 5 stars"
                      ></label>
                      <input
                        class="star-rating__input"
                        id="star-rating-2"
                        type="radio"
                        name="rating"
                        value="2"
                      />
                      <label
                        class="star-rating__ico fa fa-star-o fa-lg"
                        for="star-rating-2"
                        title="2 out of 5 stars"
                      ></label>
                      <input
                        class="star-rating__input"
                        id="star-rating-1"
                        type="radio"
                        name="rating"
                        value="1"
                      />
                      <label
                        class="star-rating__ico fa fa-star-o fa-lg"
                        for="star-rating-1"
                        title="1 out of 5 stars"
                      ></label>
                    </div>
                  </div>

                  <br />
                  <input
                    class="btn btn-primary pull-right"
                    type="submit"
                    id="submit"
                    value="Submit"
                    name="Submit"
                  >
                    
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
