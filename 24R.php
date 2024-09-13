
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
        <em>
            <?php echo $msg; ?>
        </em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <table class="table-fill">
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo get24Hours($_POST['Username']); ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php echo navMenu(); ?>
</body>
</html>
