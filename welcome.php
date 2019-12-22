<?php
   include('session.php');
   include('config.php');

//FETCH BOOK DETAILS
	$query = "SELECT DISTINCT Category FROM books ORDER BY Name ASC";
	$result = mysqli_query($con,$query);

   
?>
<html">
    <head>
      <title>Welcome </title>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  <title>Webslesson Tutorial</title>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
		  <link href="css/bootstrap-select.min.css" rel="stylesheet" />
		  <script src="js/bootstrap-select.min.js"></script>
		  
    </head>
    <body>
   		<h2 style="text-align: left;padding-left: 5%;font-family:Comic Sans MS">Welcome <?php echo $login_session; ?></h2> 
        <h4 style="text-align: left;padding-left: 5%;"><a href = "logout.php">Sign Out</a></h4>
		<div class="container">
   			
   			<h2 align="center" ><img src="img/manage30px.png"> Manage Stocks</h2>
   			<input style="margin-bottom: 3%;margin-left: 90%;" class="btn btn-primary " value="+ New Book"  onclick="window.location.href='insert.php'">
			<div class="container">
			   
			   <div class="form-group">
			    <div class="input-group">
			     <span class="input-group-addon" style="background-color: #449D44;color: black;"><img src="img/search_50px.png" style="height:20px;"> Search</span>
			     <input type="text" name="search_text" id="search_text" placeholder="Search by Book Title Or Author Or Category" class="form-control" />
			    </div>
			   </div>
			   <br />
			   <div id="result"></div>
			</div>
			   
		</div>

		<!-- FORM MODAL FOR VIEWING BOOKS -->
		<div id="dataModal" class="modal fade">  
			<div class="modal-dialog">  
			    <div class="modal-content">  
			        <div class="modal-header">  
			            <button type="button" class="close" data-dismiss="modal">&times;</button>  
			            <h4 class="modal-title">Book Details</h4>  
			        </div>  
			        <div class="modal-body" id="employee_detail">  
			        </div>  
			        <div class="modal-footer">  
			            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
			        </div>  
			    </div>  
			</div>  
		</div>  


		

</body>   
</html>

<!-- VIEW DATA -->
<script>
		$(document).on('click', '.btn_view', function(){  
		           var id=$(this).data("id1");  
		            
		                $.ajax({  
		                     url:"select.php",  
		                     method:"POST",  
		                     data:{id:id},  
		                     dataType:"text",   
		                success:function(data){  
		                     $('#employee_detail').html(data);  
		                     $('#dataModal').modal("show");  
		                }  
		           });  
		      });  


		  
		/*RETRIEVE DATA*/
		$(document).ready(function(){
		load_data();
		function load_data(query='')
		{
		  $.ajax({
		   url:"fetch.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('tbody').html(data);
		   }
		  })
		}



		/*CATOGRIES*/
		$('#multi_search_filter').change(function(){
		  $('#hidden_country').val($('#multi_search_filter').val());
		  var query = $('#hidden_country').val();
		  load_data(query);
		 });
		 
		});


</script>

<!-- DELETE DATA -->
<script>

	$(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id3");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);
                          location.reload();
                           
                     }  
                });  
            }  
    });

    /*UPDATE DATA */
	$(document).on('click', '.btn_update', function(){  
           var id=$(this).data("id2");  
           if(confirm("Are you sure you want to Update this?"))  
           {  
                $.ajax({  
                     url:"update.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",
                     success:function(data){  
                          
                          window.location = '/bookstore/update.php?id='+id;
                           
                     }    
                      
                });  
           }  
      }); 

	

		$(document).ready(function(){

		 load_data();

		 function load_data(query)
		 {
		  $.ajax({
		   url:"fetchS.php",
		   method:"POST",
		   data:{query:query},
		   success:function(data)
		   {
		    $('#result').html(data);
		   }
		  });
		 }
		 $('#search_text').keyup(function(){
		  var search = $(this).val();
		  if(search != '')
		  {
		   load_data(search);
		  }
		  else
		  {
		   load_data();
		  }
		 });
		});
</script>