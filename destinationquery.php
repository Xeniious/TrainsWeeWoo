<?php
	$sqlusername = 'c747b428';
	$sqlpassword = 'ni9Theem';
	// Connect to MySQL server, select database
		$conn = mysql_connect('mysql.eecs.ku.edu', $sqlusername, $sqlpassword)
				or die('Could not connect: ' . mysql_error());
		//echo 'Connected successfully';
		mysql_select_db($sqlusername) or die('Could not select database');

	// Send SQL query
		$query = 'SELECT CITY FROM STATION';
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());

	// Print results in HTML
    while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
        foreach ($line as $col_value) {
            echo "<p>$col_value</p>";
        }
    }

	// Free resultset
		mysql_free_result($result);

	//Close connection
		mysql_close($link);
?> 
