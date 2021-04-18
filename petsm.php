<?php
session_start();

if(isset($_SESSION))
{
  $username = $_SESSION['username'];
  $id = $_SESSION['id'];
 if(!$username)
 {
  Header("Location:login.php");
  die;
 }

}
else{
  Header("Location:login.php");
  die;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pets Management</title>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

  <link rel="stylesheet" href="./assets/bootstrap-4.6.0-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="./assets/icons-1.4.1/font/bootstrap-icons.css">


  <link rel="stylesheet" type="text/css" media="screen" href="./assets/styles/global.css" />
  <link rel="stylesheet" type="text/css" media="screen" href="./assets/styles/petsm.css" />
</head>

<body>
  <header>
    <div id="main-items-div">
      <img id="logo" src="./assets/images/Logo.svg" />
      <div id="list-items-div">
        <h3 style="color:white;">Pets Management</h3>
      </div>
      <div>
        <img class="user-profile" src="assets/images/user-profile.png" />
      </div>
    </div>
  </header>

  <section id="sec1" class="common-for-sections">

    <div class="div-align-common">
      <div class="container-fluid">
        <div class="row mt-1">
          <div class="col-8">
            <div class="row justify-content-between" id="filteration-div">
              <div class="col-1">
                <button type="button" class="btn btn-primary">New</button>
              </div>
              <div class="col-4">
                <input onkeyup="searchByName(this)" id="pets-search-input" type="text" class="input" placeholder="Search" />
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-5 table-container-1 justify-content-between min-max">
          <!-- col-8 for table, width == 8 cols, height = 80% -->
          <div class="col-8 table-container min-max table-responsive">

            <table class="table table-bordered table-sm table-pets min-max">
              <thead class="theader">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Cetegory</th>
                  <th scope="col">Age</th>
                  <th scope="col">Price $</th>
                  <th scope="col">Picture</th>
                  <th scope="col">Edit</th>
                  <th scope="col">Delete</th>
                </tr>
              </thead>
              <tbody id="pets-tbody">

                <?php
                require_once "./php_scripts/dbCon.php";
                $query = "SELECT * from pets where vendor_id=$id order by published_at DESC";
                $results = mysqli_query($con, $query);
                $list = $results->fetch_all(MYSQLI_ASSOC);
                if ($list) {
                  for ($i = 0; $i < count($list); $i++) {
                    $imagePath = "./assets/images/shops/".$list[$i]["image"];
                    echo '
                               <tr id="'.$list[$i]['id'].'">
                              <td>' . ($i + 1) . '</td>
                              <td>' . $list[$i]['pet_name'] . '</td>
                              <td>' . $list[$i]['category'] . '</td>
                              <td>' . $list[$i]['age'] . '</td>
                              <td>' . $list[$i]['price'] . '</td>
                              <td><i  id="show-icon" data-toggle="modal" data-target="#show-pet-modal" onclick="showImage(this)" class="bi bi-image-fill icons-actions"></i>                              </td>
                              <td ><i id="edit-icon" onclick="showEditDialog(this)" data-toggle="modal" data-target="#edit-pet-modal" style="color:green;" class="bi bi-pencil icons-actions"></i>
                              </td>
                              <td ><i data-toggle="modal" data-target="#delete-pet-modal" id="delete-icon" onclick="showDialog(this)"  style="color:red;" class="bi bi-x-square-fill icons-actions"></i>
                              </td>
                              <td id ="td-img-path" style="display:none;">' . $imagePath . '</td>
                             
                            </tr>';
                  }
                }
                ?>

              </tbody>
            </table>
          </div>
          <div class="col-3 table-container create-div">
            <form action="./php_scripts/pets/create.php" method="POST" enctype="multipart/form-data" id="create-div-content">
              <h4>Add New Pet</h4>
              <div class="info-fields">
                <div class="input-fields">
                  <span>Name:<span class="required-input">* </span></span>
                  <input minlength="4" maxlength="255" type="text" name="pet_name" class="form-control" id="pet-name" placeholder="pet name" required>
                </div>
                <div style="margin-top:15px;" class="form-group">
                  <label for="categories">Category:<span class="required-input">*</span></label>
                  <select class="form-control" name="categories" id="categories">
                    <option value="dogs">Dogs</option>
                    <option value="cats">Cats</option>
                    <option value="birds">Birds</option>
                    <option value="monkeys">Monkys</option>
                  </select>
                </div>
                <div class="input-fields">
                  <span>Age:<span class="required-input">* </span></span>
                  <input minlength="4" maxlength="255" type="text" name="pet_age" class="form-control" id="pet-age" placeholder="pet age" required>
                </div>
                <div class="input-fields">
                  <span>Price($):</span>
                  <input min="1" type="number" name="pet_price" class="form-control" id="pet-price" placeholder="pet price in $">
                </div>
                <div class="">
                  <span>Image:</span>
                  <div>
                  <label for="pet-image" >
                  <img src="./assets/images/cat.svg" />
                  <input  style="display:none;" type="file" name="pet_image" class="form-control" id="pet-image" required accept="image/*">
                  </label>

                  </div>

                </div>
              </div>
              <div id="div-btn">
                <input type="submit" value="Create" name="create" class="btn btn-outline-success"></input>
              </div>
              </form>


          </div>
        </div>
      </div>
    </div>
  </section>

 <!-- Modal -->
<div class="modal fade" id="delete-pet-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deletion Alert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Are you sure to delete this item <b id="pet-name-b"></b> ? 
      </div>
      <div class="modal-footer">
      <form action="./php_scripts//pets/delete.php" method="POST">
      <input type="text" id="pet-id" name="pet-id" style="display:none;"/>
      <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button name="delete-pet" type="submit" class="btn btn-primary">Yes</button>
      </form>
      
      </div>
    </div>
  </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="edit-pet-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit information <b id='pet-name-edit'></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="./php_scripts/pets/edit.php" method="POST" enctype="multipart/form-data" id="edit-div-content">
             
              <div class="info-fields">
                <div class="input-fields">
                  <span>Name:<span class="required-input">* </span></span>
                  <input id="name-edit" minlength="4" maxlength="255" type="text" name="pet_name" class="form-control" id="pet-name" placeholder="pet name" required>
                </div>
                
               
                <div class="input-fields">
                  <span>Price($):</span>
                  <input id="price-edit" min="1" type="number" name="pet_price" class="form-control" id="pet-price" placeholder="pet price in $">
                </div>
                <div class="">
                  <span>Image:</span>

                  <input id="image-edit" type="file" name="pet_image" class="form-control" id="pet-image" accept="image/*">

                </div>
              </div>
              <input style="display:hidden;" id="pet-id-edit" type="text" name="pet_id" class="form-control" required>
            
              <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Save</button>
      </div>
              </form>
      
      </div>
      
    </div>
  </div>
</div>

<!-- for displaying image -->
<div class="modal" tabindex="-1" id="show-pet-modal">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pet Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img width="500px" height="500px" id="pet_image_display" src="" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>

  <script src="./scripts/common.js"></script>
  <script src="./scripts/petsm.js"></script>

  <script src="./assets/bootstrap-4.6.0-dist/js/jquery-3.6.0.min.js"></script>
  <script src="./assets/bootstrap-4.6.0-dist/js/bootstrap.bundle.js"></script>
</body>

</html>