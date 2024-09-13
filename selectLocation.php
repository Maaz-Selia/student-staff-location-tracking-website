<html>
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Location</title>

</head>
<body>
    <?php require_once 'location.php'; ?>

    <p id="HomeM" style="font-size:2vw;">
        <em>e. allows the user to select from a list of all locations used by people and show a list of the people currently in the selected location</em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <form action="\563350\sLR.php" method="POST">
                <br />
                <select required class='selection' name='Location'>
                <option value='' selected='selected' Disabled='disabled'>Select a Location...</option>
                    <?php echo populateDatalistLocation(); ?>
                </select>
                <br />
                <br />
                <input class="button" type="submit" name="submit" value="Show Attendees" />

            </form>

        </div>
    </div>









    <?php echo navMenu(); ?>
</body>
</html>