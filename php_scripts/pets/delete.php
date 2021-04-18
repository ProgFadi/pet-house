<?php 
require_once "../dbCon.php";
if(isset($_POST['pet-id']))
{
    $target_dir = "../../assets/images/shops/";
    $petID = $_POST['pet-id'];
    $imageName = '';
    // first get image name from sent id
    $query1 = "select image from pets where id=".$petID;
    if($con)
    {
        
        $result =  mysqli_query($con,$query1);
        if($result)
        {
            $list = $result->fetch_all(MYSQLI_ASSOC);
            if($list && count($list) == 1)
            {
                $imageName = $list[0]['image'];
            }
        }
        $query2 = "delete from pets where id=".htmlspecialchars($petID);
   
        
        $result =  mysqli_query($con,$query2);
        if($result)
        {
            if(file_exists($target_dir.$imageName))
            {
                unlink($target_dir.$imageName);
            }

            header("location:../../../petsm.php");
        }
  


    }
   
    else{
        echo "<h1 style='color:red;'> Error 3</h1>";
    }
}
else{
    echo "<h1 style='color:red;'> Error 1</h1>";
}

?>