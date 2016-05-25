<!--This document serves as an HTML5 markup for the "Reviews" of www.jentofthomes.com.
    
    Designed by: Michael Costa
    On:02/22/2016
-->


<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Jennifer Toft Reviews</title>
    <!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=stylesheet type="text/css" href="styleSheet.css">
    <link rel=stylesheet type="text/css" href="reviewsStyleSheet.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include 'navBar.php'; ?>
    <?php include 'header.php'; ?>
    <section>
        <div>
            <?php include 'reviewsBody.php'; ?>
        </div>
    </section>
    <div id='contactAnimate'>
        <a href='contact_us.php'>
            <img id='contactLink' src='contactBubble.png'>
        </a>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>