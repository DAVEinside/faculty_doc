<?php
/*echo "flag  : ".$_GET['flag']."<br>";*/

?>
<?php
ob_start();

session_start();


//check if user has logged in or not

if(!isset($_SESSION['loggedInUser'])){
    //send the iser to login page
    header("location:index.php");
}
//connect ot database
include_once("includes/connection.php");
include_once("includes/functions.php");

$flag = $_GET['flag'];

    $rid = $_SESSION['id'];

	if($flag == 1)
	{

	$sql = "delete from researchdetails WHERE research_Id = $rid";

			if ($conn->query($sql) === TRUE) {
				if($_SESSION['type'] == 'hod' )				{
					header("location:researchViewHOD.php?alert=delete");
				}
				else
					header("location:researchView.php?alert=delete");

			} 
			else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
	
	}
	else if($flag == 2)
	{
		if($_SESSION['type'] == 'hod' )				{
					header("location:researchViewHOD.php");
				}
				else
					header("location:researchView.php");
	}



?>