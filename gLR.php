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
        <em>Showing All</em>
    </p>

    <div class="workArea">
        <div class="innerWorkArea">

            
            <table>
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    require_once 'location.php';
                    getAllLocations(); ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php echo navMenu(); ?>
</body>
</html>