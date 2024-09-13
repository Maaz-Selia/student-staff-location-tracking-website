<html>
<head>

    <meta charset="utf-8" />
    <link rel="stylesheet" href="StyleSheet.css" />
    <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Student</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    

</head>
<body>
    <!-- INSERT VALIDATION SCRIPT -->
    <?php require_once 'location.php'; ?>

    


    <p id="HomeM" style="font-size:2vw; text-align: center;">
        <em>
            You have chosen to add a new student.
        </em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">
            <form action="\563350\finalResult.php" method="POST" name="form">
                <br />
                <select id="Usernames" hidden="hidden" class='selection' name='Username'>
                        <?php echo populateDatalistNames(); ?>
                    </select>
                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Username</label>
                <br />
                <input class="selection" required type="text" name="Username" id="Username" placeholder="Enter a username..." />
                <br />
                <label class="selection" style="color: snow; color:orangered; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);" id="UN_msg"></label>
                <br />
                <br />

                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Firstname</label>
                <br />
                <input required class="selection" type="text" name="Firstname" pattern="^[A-Za-z]{3,10}$" title="Firstname may only contain letters. With a length of 3-10 letters. No spaces allowed." id="Firstname" placeholder="Enter a Firstname..." />
                <br />
                <label class="selection" style="color: snow; color:orangered; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);" id="FN_msg"></label>
                <br />
                <br />

                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Surname</label>
                <br />
                <input required class="selection" type="text" name="Surname" pattern="^[A-Za-z]{3,10}$" title="Surname may only contain letters. With a length of 3-10 letters. No spaces allowed." id="Surname" placeholder="Enter a Surname..." />
                <br />
                <label class="selection" style="color: snow; color:orangered; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);" id="SN_msg"></label>
                <br /><br />

                <label class="selection" style="color: snow; text-shadow: 0 24px 32px 0 rgba(0,0,0,0.24);">Location</label>
                <br />
                <input required class="selection" list="Locations" name="Location" placeholder="Enter Location..." />
                <datalist id="Locations">
                    <?php echo populateLocationList(); ?>
                </datalist>

                <?php unset($_POST); ?>
                <br />
                <br />
                <input class="button" type="submit" name="submitStudent" value="Create Student" />
                
                <script src="\563350\validation.js"></script>

            </form>
        </div>
    </div>
    <?php echo navMenu();  ?>
    
    
</body>
</html>