<?php

                                    /* NAV MENU */
/*------------------------------------------------------------------------------------------------------------------------*/

    function navMenu()
    {
        $result = '<div style="padding: 1vh;"></div>
        <ul>
        <li><a href="\563350\index.php">Home</a></li>
        <li><a href="\563350\getLocation.php">Get Location</a></li>
        <li><a href="\563350\changeLocation.php">Change Location</a></li>
        <li><a href="\563350\changeDetails.php">Change Details</a></li>
        <li><a href="\563350\24hours.php">24 Hours</a></li>
        <li><a href="\563350\selectLocation.php">Location Select</a></li>
        </ul>';
        return $result;
    }


                                /* DATALIST POPULATOR */
/*------------------------------------------------------------------------------------------------------------------------*/

    function populateDatalistNames()
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT DISTINCT Username FROM StudentLocation");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {

                    $resultStr .= "<option value='{$row["Username"]}'>{$row["Username"]}</option>";

                }
            }
        }
        sqlsrv_close($conn);
        return $resultStr;
    }


                            /* QUERY HANDLER FOR Live Location PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function getLocation($Username)
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT TOP 1 * FROM StudentLocation WHERE Username = '{$Username}' ORDER BY ID DESC");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
		        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

		        if($row['Firstname'])
		        {
					echo "<table>
							<thead>
								<tr>
									<th>Username</th>
									<th>Location</th>
								</tr>
							</thead>
							<tbody>
								<tr><td>{$row['Username']}</td><td>{$row['Location']}</td></tr>
							</tbody>
						</table>";
		        }
            }
        }
        sqlsrv_close($conn);
        return $resultStr;
    }




    function getAllLocations()
    {
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ echo "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, ";WITH DistinctLocations AS
                                            (
                                            SELECT Username, Location,
                                            ROW_NUMBER() OVER(PARTITION BY Username ORDER BY ID DESC) AS 'RowNum'
                                            FROM StudentLocation
                                            )
                                            SELECT *
                                            FROM DistinctLocations
                                            WHERE RowNum = 1");
            if(!$result){ echo "Query Failed!";}
            else
            {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {

                    echo "<tr><td>{$row['Username']}</td><td>{$row['Location']}</td></tr>";

                }
            }
        }
        sqlsrv_close($conn);
    }
                                        /* QUERY HANDLER FOR Change Location PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function updateLocation($Username, $Location)
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT TOP 1 * FROM StudentLocation WHERE Username = '{$Username}'");
            $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
            date_default_timezone_set ("Europe/London");
            $date = new DateTime();
            $dateF = date_format($date, 'Y-m-d H:i:s');


            $result = sqlsrv_query($conn, "INSERT INTO StudentLocation (Username, Firstname, Surname, Location, DateTime)
                                            VALUES ('{$row['Username']}', '{$row['Firstname']}', '{$row['Surname']}',
                                                '{$Location}', '{$dateF}')");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {

                $resultStr .= "Location for {$row['Firstname']} {$row['Surname']} was succesfully updated.";

            }

        }
        sqlsrv_close($conn);
        return $resultStr;
    }




    function populateLocationList()
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT DISTINCT Location FROM StudentLocation");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {

                    $resultStr .= "<option value='{$row["Location"]}'>";

                }
            }
        }
        sqlsrv_close($conn);
        return $resultStr;
    }

                                        /* QUERY HANDLER FOR Change Location PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function getFN($Username, $FS)
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT TOP 1 * FROM StudentLocation WHERE Username = '{$Username}'");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
                $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
                if($FS=='F')
                {
                    $resultStr .= $row['Firstname'];
                }
                if($FS=='S')
                {
                    $resultStr .= $row['Surname'];
                }

            }
        }
        sqlsrv_close($conn);
        return $resultStr;
    }

                                /* QUERY HANDLER FOR Change Details PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function updateDetails($Username, $FName, $SName)
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "UPDATE StudentLocation SET Firstname = '{$FName}', Surname = '{$SName}' WHERE Username = '{$Username}'");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {

                $resultStr .= "Details for {$FName} {$SName} were succesfully updated.";

            }
        }
        sqlsrv_close($conn);
        return $resultStr;
    }

                                     /* QUERY HANDLER FOR Select Location PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function populateDatalistLocation()
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT DISTINCT Location FROM StudentLocation");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {

                    $resultStr .= "<option value='{$row["Location"]}'>{$row["Location"]}</option>";

                }
            }
        }
        sqlsrv_close($conn);
        return $resultStr;
    }

                                    /* QUERY HANDLER FOR Select Location PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function getAttendees($Location)
    {
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ echo "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, ";WITH DistinctLocations AS
                                            (
                                            SELECT Username, Location,
                                            ROW_NUMBER() OVER(PARTITION BY Username ORDER BY ID DESC) AS 'RowNum'
                                            FROM StudentLocation
                                            )
                                            SELECT *
                                            FROM DistinctLocations
                                            WHERE RowNum = 1 AND Location = '{$Location}'");
            if(!$result){ echo "Query Failed!";}
            else
            {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {

                    echo "<tr><td>{$row['Username']}</td></tr>";

                }
            }
        }
        sqlsrv_close($conn);
    }

                                    /* QUERY HANDLER FOR New Student PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function addStudent($Username, $FName, $SName, $Location)
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            date_default_timezone_set ("Europe/London");
            $date = new DateTime();
            $dateF = date_format($date, 'Y-m-d H:i:s');

            $result = sqlsrv_query($conn, "INSERT INTO StudentLocation (Username, Firstname, Surname, Location, DateTime) VALUES ('{$Username}', '{$FName}', '{$SName}','{$Location}','{$dateF}')");

            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {

                $resultStr .= "{$FName} {$SName} was succesfully created.";

            }

        }
        sqlsrv_close($conn);
        return $resultStr;
    }

                                        /* QUERY HANDLER FOR 24 Hours PAGE */
/*------------------------------------------------------------------------------------------------------------------------*/

    function get24Hours($Username)
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT * FROM StudentLocation WHERE DateTime >= DATEADD(day, -1, GETDATE()) AND Username = '{$Username}' ORDER BY DateTime DESC");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
                while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
                {

                    $resultStr .= "<tr><td>{$row['Location']}</td><td>{$row["DateTime"]->format("Y-m-d")}<br />{$row["DateTime"]->format("H:i")}</td></tr>";

                }
            }

        }
        sqlsrv_close($conn);
        return $resultStr;
    }

                                            /* GET & POST */
/*------------------------------------------------------------------------------------------------------------------------*/

    if(isset($_GET['Username']))
    {
        $resultStr = '';
        $connInfo = array("Database"=>"rde_563350");
        $conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);
        if(!$conn){ $resultStr .= "Connection Failed!";}
        else
        {
            $result = sqlsrv_query($conn, "SELECT TOP 1 * FROM StudentLocation WHERE Username = '{$_GET['Username']}' ORDER BY ID DESC");
            if(!$result){ $resultStr .= "Query Failed!";}
            else
            {
		        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

		        if($row['Firstname'])
		        {
                    $resultStr .= "{$row['Firstname']} {$row['Surname']}'s last sign-in was:\n{$row['Location']}\n"; /* Add date */
		        }
            }
        }
        sqlsrv_close($conn);
        echo $resultStr;
    }

	function IsAllLetter($str){
		
		if (preg_match('/[^A-Za-z]/', $str))
		{
			return true;
		}
		return false;
	}

	/*if(isset($_POST['Username']) && isset($_POST['Firstname']) && isset($_POST['Surname']))
    {
		$Username = $_POST['Username'];
		$Firstname = $_POST['Firstname'];
		$Surname = $_POST['Surname'];
		$Location = $_POST['Location'];
		
		if((IsAllLetter($Firstname) && IsAllLetter($Surname) && $Firstname.length > 2 && $Surname.length > 2))
		{
			echo "Validation of values failed. Firstname and Surname may not contain any spaces or numbers and must be a minimum length of 3.";
		}
		else{

			$resultStr = '';
			$connInfo = array("Database"=>"rde_563350");
			$conn = sqlsrv_connect("sql.rde.hull.ac.uk", $connInfo);

			if(!$conn){ $resultStr .= "Connection Failed!";}
			else
			{
				date_default_timezone_set ("Europe/London");
				$date = new DateTime();
				$dateF = date_format($date, 'Y-m-d H:i:s');


				$result = sqlsrv_query($conn, "SELECT * FROM StudentLocation WHERE Username = '{$Username}'");
				if($result == null)
				{
					$result = sqlsrv_query($conn, "INSERT INTO StudentLocation (Username, Firstname, Surname, Location, DateTime) VALUES ('{$Username}', '{$Firstname}', '{$Surname}','{$Location}','{$dateF}')");
					if(!$result){ $resultStr .= "Query Failed!";}
					else
					{
						echo "Student added succesfully!";
					}
				}
				else
				{
					if($Location == null)
					{
						$result = sqlsrv_query($conn, "UPDATE StudentLocation SET Firstname = '{$Firstname}', Surname = '{$Surname}' WHERE Username = '{$Username}'");
						if(!$result){ $resultStr .= "Query Failed!";}
						else
						{
							echo "Student updated succesfully!";
						}
					}
					else
					{
						$result = sqlsrv_query($conn, "INSERT INTO StudentLocation (Username, Firstname, Surname, Location, DateTime) VALUES ('{$Username}', '{$Firstname}', '{$Surname}', '{$Location}', '{$dateF}')");
						if(!$result){ $resultStr .= "Query Failed!";}
						else
						{
							echo "Student updated succesfully!";
						}
					}
				}
			}
			sqlsrv_close($conn);
			echo $resultStr;
		}
    }
	else{
	}*/
?>
