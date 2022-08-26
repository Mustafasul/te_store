<?php 

 include "dbCon.php";

 $userId = $_GET['ID'];

   $result = mysqli_query($Con, "DELETE FROM users WHERE users.id = $userId");

     if ($result == 1) {
            header("location:home.php?usersDelete=true");
          }
          else{
            echo "<span style='color:red;'>Opps!!! an error occured, record doesn't deleted.</span>";
          }


?>