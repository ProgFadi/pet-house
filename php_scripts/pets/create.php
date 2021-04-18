<?php
require_once "../dbCon.php";

    if(isset($_POST['create']))
    {
        $target_dir = "../../assets/images/shops/";
        $petName = $_POST['pet_name'];
        $petAge = $_POST['pet_age'];
        $category = $_POST['categories'];
        $price = 0;
        if($_POST['pet_price']  && strlen($_POST['pet_price']) > 0)
        {
            $price = $_POST['pet_price'];
        }

        $imageName = basename($_FILES["pet_image"]["name"]);
        $target_file = $target_dir . basename($_FILES["pet_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // png, jpg
        $isImage = getimagesize($_FILES["pet_image"]["tmp_name"]);
        if(!$isImage)
        {
            die("File is not an image!");
        }
        // check for duplication in name for image
        if(file_exists($target_file))
        {
            $imageName = time().'_'.$imageName;
            $target_file = $target_dir.$imageName;
        }

        // get current datetime in the following format: YYYY-MM-dd HH:mm:ss
        // $publishedAt = time(); // 197686323321
        date_default_timezone_set("Asia/Baghdad");
        $publishedAt = date('Y-m-d H:i:s',time());
        // before save image to our server, we neee to insert data
        if($con)
        {
            $query = "INSERT into pets(pet_name,age,category,image,price,published_at,vendor_id)values('$petName','$petAge','$category','$imageName',$price,'$publishedAt',1)";
            $isInserted = mysqli_query($con,$query);
            if($isInserted)
            {
                if (move_uploaded_file($_FILES["pet_image"]["tmp_name"], $target_file)) {
                    header("location:../../petsm.php");
                  } else {
                    echo "Sorry, there was an error uploading your file.";
                  }
            }
            else{
                echo "The data did not inserted";
            }
        }
        else{
            mysqli_errno($con);
        }
        
       
    }
  


?>