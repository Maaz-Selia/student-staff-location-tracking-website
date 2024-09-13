
<html>
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        Final Result
    </title>

</head>
<body>
    <?php require_once 'location.php'; ?>



    <div class="workArea">
        <div class="innerWorkArea">
            <br />

            <p style="color: snow; padding: 10px; font-size: 2vw;">
                
                <?php

                if($_POST['submitLocation'] == 'Update Location')
                {
                    echo updateLocation($_POST['Username'], $_POST['newLocation']);
                }
                else if($_POST['submitDetails'] == 'Update Details')
                {
                    echo updateDetails($_POST['Username'], $_POST['Firstname'], $_POST['Surname']);
                }
                else if($_POST['submitStudent'] == 'Create Student')
                {
                    echo addStudent($_POST['Username'], $_POST['Firstname'], $_POST['Surname'], $_POST['Location']);
                }
                ?>

            </p>


        </div>
    </div>
    <?php echo navMenu(); ?>
</body>
</html>
