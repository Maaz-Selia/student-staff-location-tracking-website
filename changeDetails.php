
<html>
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Details</title>

</head>
<body>
    <?php require_once 'location.php'; ?>

    <p id="HomeM" style="font-size:2vw;">
        <em>c. allows a user to edit the details of a student</em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <form action="\563350\cDR.php" method="POST">
                <br />
                <select required class='selection' name='Username'>
                <option value='' selected='selected' Disabled='disabled'>Select a student...</option>
                <option value='newStudent'>(Add new student)</option>
                <?php echo populateDatalistNames(); ?>
                </select>
                <br />
                <br />
                <input class="button" type="submit" name="submit" value="Show Details" />

            </form>

        </div>
    </div>









    <?php echo navMenu(); ?>
</body>
</html>
