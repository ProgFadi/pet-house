<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Shop</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./assets/styles/shop.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./assets/styles/global.css"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <header>
      <!-- <div id="main-items-div">
        <img id="logo" src="./assets/images/Logo.svg" />
        <div id="list-items-div">
          <ul id="top-list">
            <a href="index.html"><li class="li-top-list ">Home</li></a>
            <a href="shop.html"><li class="li-top-list active">Shop</li></a>
            <a href="vendors.html"><li class="li-top-list">Vendors</li></a>
            <a href="#"><li class="li-top-list">Clinics</li></a>
            <a href="#"><li class="li-top-list">About us</li></a>
          </ul>
        </div>
        <button class="login-btn">Login</button>
      </div> -->
      <nav
        class="container-fluid navbar navbar-expand-lg navbar-light bg-light div-align-common"
      >
        <div class="row justify-content-between w-100">
          <div class="col-2">
            <a class="navbar-brand" href="#"
              ><img id="logo" src="./assets/images/Logo.svg"
            /></a>
          </div>
          <div class="col-4 row justify-content-center">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                  <a class="nav-link" href="index.html"
                    >Home <span class="sr-only"></span></a
                  >
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="vendors.php">Vendors</a>
                </li>
                <li class="nav-item">
                  <a id="a_clinic" class="nav-link" href="#" onclick="scrollDown()">clinics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about-us.html">About us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-3 row justify-content-end align-items-center">
            <a href="login.php">
              <button  class="btn btn-outline-success my-2 my-sm-0" type="button">
                Login
              </button>
            </a>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>
      </nav>
    </header>

    <section class="common-for-sections" id="section1">
      <div class="div-align">
        <div class="div-content">
          <div id="div-search">
            <input
              id="pets-search-input"
              type="text"
              class="input"
              placeholder="Search"
            />
          </div>
          <div id="cards-div-container">
            <?php
            require_once './php_scripts/dbCon.php';  
            if($con)
            {
              $query = "SELECT * from pets";
              $result = mysqli_query($con,$query);
              $petsList = $result->fetch_all(MYSQLI_ASSOC);
              for($i=0;$i<count($petsList);$i++)
            {
              echo '<div class="pet-card">
              <img src="./assets/images/shops/'.$petsList[$i]["image"].'" class="pet-image-size" />
              <div class="div-details">
                <div class="div-details-sub">
                  <div class="pet-info">
                    <div class="pet-info-p">
                      <p class="title">Category:</p>
                      <p class="pet-info-p-value">'.$petsList[$i]["category"].'</p>
                    </div>
                    <div class="pet-info-p">
                      <p class="title">Name:</p>
                      <p class="pet-info-p-value">'.$petsList[$i]["pet_name"].'</p>
                    </div>
                    <div class="pet-info-p">
                      <p class="title">Age:</p>
                      <p class="pet-info-p-value">'.$petsList[$i]["age"].'</p>
                    </div>
                    <div class="pet-info-p">
                      <p class="title">Publisher:</p>
                      <p class="pet-info-p-value">'.$petsList[$i]["vendor_id"].'</p>
                    </div>
                    <div class="pet-info-p">
                    <p class="title">Published at:</p>
                    <p class="pet-info-p-value">'.$petsList[$i]["published_at"].'</p>
                  </div>
                  </div>
                  <div class="see-more-price fit-div">
                    <a href="#">
                      <p class="pet-info-p-see-more ">See More</p>
                    </a>
                    <span class="pet-price">Price '.$petsList[$i]["price"].'$</span>
                  </div>
                </div>
              </div>
            </div>';
            }
            }
           
            

            ?>
            <!-- <div class="pet-card">
              <img src="./assets/images/cat.jpg" class="pet-image-size" />
              <div class="div-details">
                <div class="div-details-sub">
                  <div class="pet-info">
                    <div class="pet-info-p">
                      <p class="title">Category:</p>
                      <p class="pet-info-p-value">Cats</p>
                    </div>
                    <div class="pet-info-p">
                      <p class="title">Name:</p>
                      <p class="pet-info-p-value">Losa</p>
                    </div>
                    <div class="pet-info-p">
                      <p class="title">Age:</p>
                      <p class="pet-info-p-value">5 Months</p>
                    </div>
                    <div class="pet-info-p">
                      <p class="title">Publisher:</p>
                      <p class="pet-info-p-value">P-A</p>
                    </div>
                  </div>
                  <div class="see-more-price fit-div">
                    <a href="#">
                      <p class="pet-info-p-see-more ">See More</p>
                    </a>
                    <span class="pet-price">Price 150$</span>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </section>

    <script src="./scripts/common.js"></script>
    <script src="./scripts/shop.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
