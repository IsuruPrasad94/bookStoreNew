<?php
include('config.php');
include('session.php');

$ref1 = $_GET['id'];

$getData="SELECT * FROM books WHERE ISBN='$ref1'";
$result = $con->query( $getData );
$row = $result->fetch_assoc();

            $name = $row['Name'];
            $category = $row['Category'];
            $author = $row['Author'];
            $year = $row['Year'];
            $price = $row['Price'];
            $isbn = $row['ISBN'];
            $medium = $row['Medium'];
            $image = $row['Image'];
         
if(isset($_POST['save']))
{
  $bname=$_POST['bname'];
  $bcat=$_POST['bcat'];
  $bauthor=$_POST['bauthor'];
  $byear=$_POST['byear'];
  $bprice=$_POST['bprice'];
  $bisbn=$_POST['bisbn'];
  $bmedium=$_POST['bmedium'];
  $bimage=$_POST['bimage'];

  $update="UPDATE books set Name='$bname',Category='$bcat',Author='$bauthor',Year='$byear',Price='$bprice',ISBN='$bisbn',Medium='$bmedium',Image='$bimage' WHERE ISBN='$ref1' ";
  $res=mysqli_query($con,$update);
  if($res>0)
  {
    echo "<script>alert('Update Success'); window.location.href = 'welcome.php'; </script>";
  }
  else{
    echo "<script>alert('Update Failed'); window.location.href = 'welcome.php'; </script>";
  }
}   
?>
<!DOCTYPE html>
<html>
<head>
  <title>Update Book Details</title>
  <link rel="stylesheet" type="text/css" href="CSS/form.css">
</head>
<body>
  <img src="img/hand_with_pen_50px.png" style="margin-left: 50%;background-color: #F1F1F1;border-radius: 50px;width:70px;">
  <div class="form-style-6">

    <h1 style="text-align: center;">Update Book Details</h1>
  <form method="POST">
    <label>Book Name</label>
    <input type="text" value="<?php echo $name ?>" name="bname">
    <label>Book Category</label>
    <input type="text" value="<?php echo $category ?>" name="bcat">
    <label>Author</label>
    <input type="text" value="<?php echo $author ?>" name="bauthor">
    <label>Year</label>
    <input type="number" min="1900" max="2019" value="<?php echo $year ?>" name="byear">
    <label>Book Price</label>
    <input type="text" value="<?php echo $price ?>" name="bprice">
    <label>ISBN</label>
    <input type="text" value="<?php echo $isbn ?>" name="bisbn">
    <label>Medium</label>
    <input type="text" value="<?php echo $medium ?>" name="bmedium">
    <label>Image</label>
    <input type="text" value="<?php echo $image ?>" name="bimage">
    <input type="submit" name="save" value="Update">
    <input type="button" value="Back"  onclick="window.location.href='welcome.php'">
  </form>
</div>

</body>
</html>