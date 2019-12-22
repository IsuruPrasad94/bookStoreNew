<?php
  include('session.php');
   include('config.php');
   $sql="DELETE FROM books WHERE ISBN ='".$_POST["id"]."'";
   if(mysqli_query($con,$sql))
   {
   	echo "Data Deleted";
   }
?>