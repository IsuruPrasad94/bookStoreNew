<?php
include('session.php');

$connect = new PDO("mysql:host=localhost;dbname=bookstore", "root", "");

if($_POST["query"] != '')
{
 $search_array = explode(",", $_POST["query"]);
 $search_text = "'" . implode("', '", $search_array) . "'";
 $query = "
 SELECT * FROM books 
 WHERE Category IN (".$search_text.") 
 ORDER BY Name DESC
 ";
}
else
{
 $query = "SELECT * FROM books ORDER BY Name DESC";
}

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

$total_row = $statement->rowCount();

$output = '';

if($total_row > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row["Name"].'</td>
   <td>'.$row["Author"].'</td>
   <td>'.$row["Price"].'</td>
   <td><img src="img/Books/'.$row["Image"].' " style="width:50px; height:60px;"></td>

   <td>'.$row["ISBN"].'</td>
   <td><button  name="btn_view" class="btn btn-xs btn-success btn_view" id="btn_view" data-id1="'.$row["ISBN"].'"> View</button></td>
   <td><button name="btn_update" class="btn btn-xs btn-danger btn_update" id="btn_update" data-id2="'.$row["ISBN"].'"> Update</button></td>
   <td><button name="btn_delete" class="btn btn-xs btn-primary btn_delete" id="btn_delete" data-id3="'.$row["ISBN"].'"> Delete</button></td>
   

  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="5" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;


?>