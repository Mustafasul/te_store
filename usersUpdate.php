<?php  

  include_once "dbCon.php";

  $userId = $_GET['ID'];

     $rows = mysqli_query($Con, "SELECT * FROM `users` WHERE id = $userId");

     $row = mysqli_fetch_assoc($rows);


    if (isset($_POST['submit'])) {
    
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $address = $_POST['address'];

      if ($name == "" || $email == "" || $phone == "" || $address == "" ){
        
          echo "<span style='color:red;'>Fill all the fields!!!</span>";

      }
      else{

          $res = mysqli_query($Con, "UPDATE `users` SET `name` = '$name', `email` = '$email', `phone` = '$phone', `address` = '$address' WHERE `users`.`id` = $userId;");

          if ($res == 1) {
            header("location:home.php?usersUpdate=true");
          }
          else{
            echo "<span style='color:red;'>Opps!!! an error occured, record doesn't updated.</span>";
          }

      }
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>update users</title>
</head>
<body>

 <h2 align="center">Update User</h2>
 <hr/>

   <table align="center">
   		
   		<form method="POST">
   			
   			<tr>
   				<td>Name:</td>
   				<td><input type="text" name="name" value="<?php echo $row['name']; ?>"></td>
   			</tr>
   			<tr>
   				
   				<td>Email:</td>
   				<td><input type="email" name="email" value="<?php echo $row['email']; ?>"></td>
   			</tr>
   			<tr>
   				<td>Phone:</td>
   				<td><input type="number" name="phone" value="<?php echo $row['phone']; ?>"></td>
   			</tr>
   			<tr>
   				<TD>Address:</TD>
   				<td><textarea name="address" cols="20" rows="8"><?php echo $row['address']; ?> </textarea></td>
   			</tr>
   			<tr>
   				<TD></TD>
   				<td><input type="submit" name="submit" value="Update"></td>
   			</tr>

   		</form>

   </table>

</body>
</html>