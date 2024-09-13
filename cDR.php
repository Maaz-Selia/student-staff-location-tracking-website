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
    <title>Details Changer</title>

</head>
<body>
    <?php require_once 'location.php';

          if(isset($_POST['submit']) and !($_POST['Username'] == "New student."))
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
            <form action="\563350\finalResult.php" method="POST" onsubmit=" return validation();">
                <br />
                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Username</label><br />
                <input class="selection" type="text" disabled="disabled"  value="<?php echo $_POST['Username']; ?>" /><br /><br />

                <input type="text" hidden="hidden" name="Username"  value="<?php echo $_POST['Username']; ?>" />

                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Firstname</label><br />
                <input required pattern="^[A-Za-z]{3,10}$" title="Firstname may only contain letters. With a length of 3-10 letters. No spaces allowed." 
                       class="selection" type="text" name="Firstname" id="Firstname" value="<?php echo getFN($_POST['Username'], 'F'); ?>" /><br />
                <label class="selection" id="Firstname_error" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);"></label><br />

                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Surname</label><br />
                <input required pattern="^[A-Za-z]{3,10}$" title="Surname may only contain letters. With a length of 3-10 letters. No spaces allowed." 
                       class="selection" type="text" name="Surname" id="Surname" value="<?php echo getFN($_POST['Username'], 'S') ?>" />
                
                <?php unset($_POST); ?>
                <br />
                <br />
                <input class="button" type="submit" name="submitDetails" value="Update Details" />

            </form>
        </div>
    </div>
    <?php echo navMenu();  ?>
</body>
</html>