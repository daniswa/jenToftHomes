<!--This document serves as a PHP markup for the "Home Page" of www.jentofthomes.com.
    
    Designed by: Michael Costa
    On:02/22/2016
-->


<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Homes by Jennifer Toft</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel=stylesheet type="text/css" href="styleSheet.css">
    <link rel=stylesheet type="text/css" href="indexStyleSheet.css">
    <script type="text/javascript" src="javaSlide.js"></script>
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
        <div id='slidePosition'>
            <img id='slide' name="slideShows" src="slideShow/01.jpg">
            <body onLoad="switchImage('slideShows')">
            <!--<a href="#" onClick="switchImage('slideShows');">Play Slide Show</a>
            <a href="#" onClick="clearTimeout(timerID);">Pause</a>-->
        </div>
        <div>
            <a id='leftButton' href="#" onClick="prevImage('slideShows'); clearTimeout(timerId)">Previous</a>
        </div>
        <div>
            <a id='rightButton' href="#" onClick="switchImage('slideShows'); clearTimeout(timerID)">Next</a>
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