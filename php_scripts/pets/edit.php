<?php
require_once "../dbCon.php";
if($con)
{
    $target_dir = "../../assets/images/shops/";
    $oldImageName = '';
    $newImageName = '';
    if(isset($_FILES['pet_image']) && $_FILES['pet_image']['size'] > 0)
    {
    
        // select old one
        $q1 = "select image from pets where id=".$_POST['pet_id'];
        $result = mysqli_query($con,$q1);
        $list = $result->fetch_all(MYSQLI_ASSOC);
        if($list && count($list) == 1)
        {
            $oldImageName = $list[0]['image'];
        }
        // update in db
        $newImageName = basename($_FILES["pet_image"]["name"]);
        $newImageName = time().'_'.$newImageName; // .png
        $target_file = $target_dir.$newImageName;
        $query = "update pets set pet_name='".$_POST['pet_name']."',price=".$_POST['pet_price'].",image='".$newImageName."' where id=".$_POST['pet_id'] ;
        $result = mysqli_query($con,$query);
        if($result)
        {
             // delete old image
             if(file_exists($target_dir.$oldImageName))
             {
                 unlink($target_dir.$oldImageName);
             }
              // add new image to images folder
             if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file)) {
                header("location:../../petsm.php");
              } else {
                echo "Sorry, there was an error uploading your new image.";
              }
        }
       
       
    }
    else{
        $query = "update pets set pet_name='".$_POST['pet_name']."',price=".$_POST['pet_price']." where id=".$_POST['pet_id'] ;
        echo $query;
        $result = mysqli_query($con,$query);
        if($result)
        {
            header('location:../../petsm.php');
        }
        else{
            echo "Updating failed";
        }
    }
}
else{
    echo "error 1";
}
?>