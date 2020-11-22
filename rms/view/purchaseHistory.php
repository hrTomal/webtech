<?php
include '../view/header.php'
?>

<!DOCTYPE html>
<html>
<head>
	<title>History</title>

	<style>
	
	</style>

	<h1 style="text-align: center;">Purchase History</h1>
	<hr>

</head>
<body style="background-color:#cccccc;">
	<hr>
	<center>
	<?php
	$fn = fopen("../data/tickets.txt", "r") or die("Unable to open file!");
	$print_status = 0;
	while (! feof($fn)) {
		$line = fgets($fn);
		$words = explode(",",$line);
		$status = $words[0];
		$sold_to = $words[1] ?? null;
    	
    	if(strcmp($status,"archieved") == 0 or strcmp($status,"returned") == 0){
    		if (strcmp($_SESSION["mail"],$sold_to) == 0) {
    			$date = $words[2];
    			$from = $words[3];
    			$to = $words[4];
    			$ticket_number = $words[5];

    			echo "Ticket number: " . $ticket_number;
    			echo "<br/>";
    			echo "Status: " . $status;
				echo "<br/>";
				echo "Email: " . $_SESSION["mail"];
				echo "<br/>";
				echo "Date: " . $date;
				echo "<br/>";
				echo "From: " . $from;
				echo "<br/>";
				echo "To: " . $to;
				echo "<br/>";
				echo "---------------------------";
				echo "<br/>";
				$print_status = 1;
    		}
    		else{}    		
    	}
    	else{
    	}
		
	}

	if($print_status == 0){
		echo "No purchase history!!!";
		echo "<br/>";
	}

	fclose($fn)
	?>
	<input type=button onClick="location.href='http://localhost/rms/view/uHome.php'" value='Back'>

	</center>

</body>
</html>

<?php include 'footer.php';?>