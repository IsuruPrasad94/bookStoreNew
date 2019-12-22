<?php
include('session.php');
include('config.php');

if(isset($_POST['submit']))
{
      $book_name =$_POST['bname'];
      $Category = $_POST['bcat'];
      $Author = $_POST['bauth'];
      $Year = $_POST['byear'];
      $Price = $_POST['bprice'];
      $ISBN = $_POST['bisbn'];
      $medium = $_POST['bmedium'];

      $picture_name1=$_FILES['picture1']['name'];
      $picture_type1=$_FILES['picture1']['type'];
      $picture_tmp_name1=$_FILES['picture1']['tmp_name'];
      $picture_size1=$_FILES['picture1']['size'];

      if($picture_size1<=50000000)
      {
        $pic_name1=time()."_".$picture_name1;
        move_uploaded_file($picture_tmp_name1,"img/Books/".$pic_name1);
        $res=mysqli_query($con,"INSERT INTO books(Name, Category,Author,Year,Price,ISBN,Medium,Image) VALUES ('$book_name','$Category','$Author','$Year','$Price','$ISBN','$medium','$pic_name1')");
        if($res>0)
        {
          echo "<script>alert('Successfully Completed!'); window.location.href = 'welcome.php'; </script>";
        }
        else
        {
         echo "<script>alert('Action Failed'); window.location.href = 'welcome.php'; </script>";
        }

      
      }
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Add New Book</title>
  <link rel="stylesheet" type="text/css" href="CSS/form.css">
</head>
<body>
  
  <div class="form-style-6">
    <h1 style="text-align: center;">Insert New Book</h1>
  <form method="POST" enctype='multipart/form-data'>
    <label>Image</label>
    <input type="file" style="width:100%" name="picture1" class="btn thumbnail" id="picture" required >
    <label>Book name</label>
    <input type="text" name="bname">
    <label>Book Category</label>
    <input type="text" name="bcat">
    <label>Author</label>
    <input type="text" name="bauth">
    <label>Year</label>
    <input type="number" min="1900" max="2019" name="byear">
    <label>Price</label>
    <input type="text" name="bprice">
    <label>ISBN</label>
    <input type="text" name="bisbn">
    <label>Medium</label>
    <select name="bmedium">
      <option>Sinhala</option>
      <option>English</option>
      <option>Tamil</option>
    </select> 
    <input type="submit" name="submit" value="submit">
    <input type="button" value="Back"  onclick="window.location.href='welcome.php'">

  </form>

</body>
</html>