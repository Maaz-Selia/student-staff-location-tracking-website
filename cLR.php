<?php

if(isset($_POST['submit']) and ($_POST['Username'] == "newStudent"))
{
    header('Location:newStudent.php');
}

?>
<html>
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Location Changer</title>

</head>
<body>
    <?php require_once 'location.php';

        if(isset($_POST['submit']))
        {
            $msg = "You have selected {$_POST['Username']}.";
        }
    ?>

    <p id="HomeM" style="font-size:2vw; text-align: center;">
        <em><?php echo $msg; ?></em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <form action="\563350\finalResult.php" method="POST">
                <br />
                <input type="text" hidden="hidden" name="Username" value="<?php echo $_POST['Username']; ?>" />
                <input required class="selection" list="Locations" name="newLocation" placeholder="Enter Location..." />
                <datalist id="Locations">
                    <?php echo populateLocationList(); ?>
                </datalist>
                <br />
                <br />
                <input class="button" type="submit" name="submitLocation" value="Update Location" />

            </form>
        </div>
    </div>
    <?php echo navMenu(); ?>
</body>
</html>
