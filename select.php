
<?php  
include('session.php');
 if(isset($_POST["id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "bookstore");  
      $query = "SELECT * FROM books WHERE ISBN = '".$_POST["id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["Name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Category</label></td>  
                     <td width="70%">'.$row["Category"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Author</label></td>  
                     <td width="70%">'.$row["Author"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Year</label></td>  
                     <td width="70%">'.$row["Year"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Price</label></td>  
                     <td width="70%">Rs.'.$row["Price"].'.00</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>ISBN</label></td>  
                     <td width="70%">'.$row["ISBN"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Medium</label></td>  
                     <td width="70%">'.$row["Medium"].'</td>  
                </tr>
                <tr>  
                     <td width="30%"><label>Book Image</label></td>  
                     <td width="70%"><img src="img/Books/'.$row["Image"].' " style="width:100px; height:150px;"></td>  
                </tr>   
                ';  
      }  
      $output .= "</table></div>";  
      echo $output;  
 }  
 ?>
