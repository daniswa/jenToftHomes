<!--This document serves as an HTML5 markup for the "Home Search" of www.jentofthomes.com.
    
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
    <link rel=stylesheet type="text/css" href="home_searchStyleSheet.css">
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
        <div id='contactAnimate'>
            <a href='contact_us.php'>
                <img id='contactLink' src='contactBubble.png'>
            </a>
        </div>
        <div id='homeSearch'>
            <iframe src="http://www.searchpoint.net/search.asp?_org_id=CAMRMLS&_agent_public_id=SR207062752&_sponsor_office_id=SR0067100"></iframe>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>