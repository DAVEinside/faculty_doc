<?php
session_start();
if(!isset($_SESSION['loggedInUser'])){
    //send them to login page
    header("location:index.php");
}
$_SESSION['currentTab'] = "technical_review";

if(isset($_SESSION['type'])){
    if($_SESSION['type'] != 'hod' && $_SESSION['type'] != 'cod' && $_SESSION['type'] != 'com'){
    //if not hod then send the user to login page
    session_destroy();
    header("location:index.php");
  }
}

//connect to database
include("includes/connection.php");
include("head.php");
include("header.php");

$fid = $_SESSION['Fac_ID'];
//query and result
$query = "SELECT * FROM faculty";
$result = mysqli_query($conn,$query);
$successMessage="";
?>

<?php include_once('head.php'); ?>
<?php include_once('header.php'); ?>
<?php 
if($_SESSION['type'] == 'hod'){
       include_once('sidebar_hod.php');

}elseif ($_SESSION['type']=='cod' || $_SESSION['type']=='com' ) {
          include_once('sidebar_cod.php');
}
else{
     include_once('sidebar.php');
}
 ?>

<!DOCTYPE html>  
 <html>  
      <head> 
            <style>
            </style> 
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
            <div class="content-wrapper" id="pagination_data"></div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"paginationReview_hod.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  


