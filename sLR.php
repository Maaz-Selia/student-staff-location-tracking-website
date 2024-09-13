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
              $msg = "You have selected {$_POST['Location']}.";
          }
    ?>

    <p id="HomeM" style="font-size:2vw; text-align: center;">
        <em>
            <?php echo $msg; ?>
        </em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <table>
                <thead>
            <tr>
                <th>Username</th>
            </tr></thead><tbody>
            <?php getAttendees($_POST['Location']); ?>               
            </tbody></table>
        </div>
    </div>
    <?php echo navMenu(); ?>
</body>
</html>
