<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
      integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
      integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./assets/styles/global.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      media="screen"
      href="./assets/styles/vendors.css"
    />
    <title>Vendors</title>
  </head>
  <body>
    <header>
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
                <li class="nav-item">
                  <a href="index.html"
                    >Home <span class="sr-only"></span></a
                  >
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="shop.php">Shop</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="vendors.php">Vendors</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="clinics.html">clinics</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about-us.html">About us</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-3 row justify-content-end align-items-center">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Login
            </button>

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

    <section id="1" class="common-for-sections">
      <div class="div-align-common">
        <div class="container-fluid pl-0 pr-0">
          <div class="row justify-content-between">
            <div class="col-12 col-sm-5 col-lg-3 m-1 nopadding">
              <div id="div-search">
                <input
                  id="pets-search-input"
                  type="text"
                  class="input"
                  placeholder="Search"
                />
              </div>
            </div>
            <div class="col-12 col-sm-5 col-lg-3 m-1 nopadding">
              <div id="div-filter">
                <div class="dropdown container">
                  <div class="row justify-content-end">
                    <button
                      class="btn btn-secondary dropdown-toggle"
                      type="button"
                      id="dropdownMenuButton"
                      data-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      Filter By Category
                    </button>
                    <div
                      class="dropdown-menu"
                      aria-labelledby="dropdownMenuButton"
                    >
                      <a id="dogs" class="dropdown-item" href="#">Dogs</a>
                      <a id="cats" class="dropdown-item" href="#">Cats</a>
                      <a id="birds" class="dropdown-item" href="#">Birds</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- containers for the vendors cards -->
          <div class="row mt-4 justify-content-between">
            <!-- <div class="card mb-4" style="width: 18rem;">
              <img
                width="200"
                height="250"
                src="./assets/images/blackcat.jpg"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">Vendor Name</h5>
                <div class="vendor-info">
                  <div class="p-info-div">
                    <p class="p-info-title">Location:</p>
                    <p class="p-info-value">Iraq, Baghdad</p>
                  </div>
                  <div class="p-info-div">
                    <p class="p-info-title">Category:</p>
                    <p class="p-info-value">Cats</p>
                  </div>
                  <div class="p-info-div">
                    <p class="p-info-title">Phone:</p>
                    <p class="p-info-value">+964-771XXXXXXXX</p>
                  </div>
                </div>
                <div class="visit-star-div">
                  <a href="#" class="btn btn-primary btn-visit">Visit</a>
                  <div class="starts-div">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </div>
                </div>
              </div>
           
            </div> -->
            <?php
            // 1- open connection with DB
            require_once './php_scripts/dbCon.php'; 
            
            // 3- draw them on the page
            if($con)
            {
              // 2- get or selet vendors
              $query = "SELECT * from vendors";
              $results = mysqli_query($con,$query); 
              $vendorsList = $results->fetch_all(MYSQLI_ASSOC);
              foreach($vendorsList as $key => $value)
              {
                $location = $value['location'];
                if($value['location'] == null)
                {
                  $location = 'لم يتم تحديد الموقع';
                }
                echo '<div class="card mb-4" style="width: 18rem;">
              <img
                width="200"
                height="250"
                src="./assets/images/vendors/'.$value['image'].'"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <h5 class="card-title">'.$value['full_name'].'</h5>
                <div class="vendor-info">
                  <div class="p-info-div">
                    <p class="p-info-title">Location:</p>
                    <p class="p-info-value">'.$location.'</p>
                  </div>
                  <div class="p-info-div">
                    <p class="p-info-title">Category:</p>
                    <p class="p-info-value">'.$value['categories'].'</p>
                  </div>
                  <div class="p-info-div">
                    <p class="p-info-title">Phone:</p>
                    <p class="p-info-value">'.$value['phone'].'</p>
                  </div>
                </div>
                <div class="visit-star-div">
                  <a href="#" class="btn btn-primary btn-visit">Visit</a>
                  <div class="starts-div">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                  </div>
                </div>
              </div>
           
            </div>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </section>
    <script src="./scripts/common.js"></script>
    <script src="./scripts/vendors.js"></script>

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
