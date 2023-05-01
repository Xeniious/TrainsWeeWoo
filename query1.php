<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $conductorName = $_POST["conductorName"];
    }
	$sqlusername = 'c747b428';
	$sqlpassword = 'ni9Theem';
	// Connect to MySQL server, select database
		$conn = mysql_connect('mysql.eecs.ku.edu', $sqlusername, $sqlpassword)
				or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db($sqlusername) or die('Could not select database');

	// Send SQL query
		$query = "SELECT TRAIN.CONDUCTOR, TRAIN.TRAINNAME, STARTTIME, ENDTIME FROM TRIP JOIN TRAIN ON TRAIN.TRAINNAME = TRIP.TRAINNAME AND CONDUCTOR = '$conductorName'";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Print results in HTML
		while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
				foreach ($line as $col_value) {
					echo "<p>$col_value</p>";
				}
				echo "<hr>";
		}

	// Free resultset
		mysql_free_result($result);

	//Close connection
		mysql_close($link);
?> 
