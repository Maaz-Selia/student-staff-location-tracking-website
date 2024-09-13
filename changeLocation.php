
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
        <em>b. allows a user to change the location of a student</em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <form action="\563350\cLR.php" method="POST">
                <br />
                <select required class='selection' name='Username'>
                <option value='' selected='selected' Disabled='disabled'>Select a student...</option>
                <option value='newStudent'>(Add new student)</option>
                    <?php echo populateDatalistNames(); ?>
                </select>
                <br />
                <br />
                <input class="button" type="submit" name="submit" value="Update Location" />

            </form>

        </div>
    </div>









    <?php echo navMenu(); ?>
</body>
</html>
