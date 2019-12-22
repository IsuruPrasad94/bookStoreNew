<?php
include('config.php');
include('session.php');

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM books 
  WHERE Name LIKE '%".$search."%'
  OR Author LIKE '%".$search."%' 
  OR Category LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM books ORDER BY Name
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Book Title</th>
     <th>Author</th>
     <th>Price</th>
     <th>Image</th>
     <th>ISBN</th>
     <th></th>
     <th></th>
     <th></th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["Name"].'</td>
    <td>'.$row["Author"].'</td>
    <td>'.$row["Price"].'</td>
    <td><img src="img/Books/'.$row["Image"].' " style="width:50px; height:60px;"></td>
    <td>'.$row["ISBN"].'</td>
   <td><button name="btn_view" class="btn btn-xs btn-success btn_view" id="btn_view" data-id1="'.$row["ISBN"].'"> View</button></td>
   <td><button name="btn_update" class="btn btn-xs btn-danger btn_update" id="btn_update" data-id2="'.$row["ISBN"].'"> Update</button></td>
   <td><button name="btn_delete" class="btn btn-xs btn-primary btn_delete" id="btn_delete" data-id3="'.$row["ISBN"].'"> Delete</button></td>

   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>