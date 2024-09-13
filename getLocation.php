<?php

if(isset($_GET['submit']) and ($_GET['Username'] == "showAll"))
{
    header('Location:gLR.php');
}

?>

<html>
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Location</title>

</head>
<body>

    <p id="HomeM" style="font-size:2vw;">
        <em>a. shows the current locations of all students</em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <form action="" method="GET">
                <br />
                    <select required class='selection' name='Username'>
                    <option value='' selected='selected' Disabled='disabled'>Select a student...</option>
                    <option value='showAll'>(Show all)</option>
                        <?php
                        require_Once 'location.php';
                        echo populateDatalistNames(); 
                        ?>
                    </select>
                <br /><br />               
                <input class="button" type="submit" name="submit" value="Show Location" />

            </form>
			<?php
			if(isset($_GET['Username'])){
				 getLocation($_GET['Username']); 
			}
			?>
        </div>
    </div>

    <?php echo navMenu(); ?>
</body>
</html>
