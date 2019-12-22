<?php
include('session.php');
$link = mysqli_connect("localhost", "root", "", "bookstore");

  $bname=mysqli_real_escape_string($link, $_REQUEST['bname']);
  $bcat=mysqli_real_escape_string($link, $_REQUEST['bcat']);
  $bauthor=mysqli_real_escape_string($link, $_REQUEST['bauthor']);
  $byear=mysqli_real_escape_string($link, $_REQUEST['byear']);
  $bprice=mysqli_real_escape_string($link, $_REQUEST['bprice']);
  $bisbn=mysqli_real_escape_string($link, $_REQUEST['bisbn']);
  $bmedium=mysqli_real_escape_string($link, $_REQUEST['bmedium']);
  $bimage=mysqli_real_escape_string($link, $_REQUEST['bimage']);

  $update="UPDATE books set Name='bname',Category='bcat',Author='bauthor',Year='byear',Price='bprice',ISBN='bisbn',Medium='bmedium',Image='bimage' WHERE ISBN='$bisbn' ";
  $res=mysqli_query($link,$update);
  if($res>0)
  {
    echo("Successfully Updated");
  }
  else{
    echo("Failed");
  }
  
?>