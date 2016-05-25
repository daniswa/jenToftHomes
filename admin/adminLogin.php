
    

<?php

    include("config.php");
    session_start();
    $error = "";
    if(isset($_POST['update'])){
        displayPage();
    }elseif(isset($_POST['submit'])){
        $myusername = $_POST['username'];
        $mypassword = $_POST['password'];
        checkDB($myusername, $mypassword);
    }else{
        $GLOBALS['$error'] = "**All Fields Must Be Entered.";
        displayLogin();
    }

    function checkDB($myusername, $mypassword){
        $servername = "localhost";
        $username = "***********";
        $password = "*******************";
        $dbname = "************";
        $conn = mysql_connect($servername, $username, $password);
        if(!$conn){
            echo "Not connected to database.";
            die("Connection failed: " . $conn->connect_error);
        }
        $dbAccess = mysql_select_db($dbname);
        $sql = "SELECT * FROM members WHERE userName = '$myusername'";
        $result = mysql_query($sql);
        $count = mysql_num_rows($result);

        if($count != 1){
            $GLOBALS['$error'] = "Your Login Name or Password is invalid.";
            displayLogin();
        }else{
            $row = mysql_fetch_array($result);
            if($row['locked'] == TRUE){
                $GLOBALS['$error'] = "This account is locked.<br>Please contact administrator.";
                displayLogin();
            }elseif($row['userPass'] != $mypassword){
                $GLOBALS['$error'] = "Your Login Name or Password is invalid.<br>";
                $failCount = $row['numOfAttempts'];
                $failCount++;
                if($failCount < 5){
                    $loginFail = "UPDATE members SET numOfAttempts = '$failCount' WHERE userName = '$myusername'";
                    $incCount = mysql_query($loginFail);
                    $GLOBALS['$error'] = $GLOBALS['$error'].(5 - $failCount)." attempts left.";
                }else{
                    $loginLocked = "UPDATE members SET locked = TRUE WHERE userName = '$myusername'";
                    $lockMember = mysql_query($loginLocked);
                    $GLOBALS['$error'] = $GLOBALS['$error']."Your account has been locked.<br>Please contact administrator.";
                }
                displayLogin();
            }elseif($row['userPass'] == $mypassword){
                $loginPass = "UPDATE members SET numOfAttempts = 0 WHERE userName = '$myusername'";
                $zeroCount = mysql_query($loginPass);
                $_SESSION['login_user'] = $myusername;
                displayPage();
            }else{
                 $GLOBALS['$error'] = "Could not connect.<br>Please try again later.";
                 displayLogin();
            }
        }
        $conn = mysql_close();
    }

    function displayLogin(){
        echo '<!DOCTYPE html>
            <head>
                <title>Login Page</title>
                <style type = "text/css">
                     body{
                         font-family:Arial, Helvetica, sans-serif;
                         font-size:14px;
                     }
                     label{
                         font-weight:bold;
                         width:100px;
                         font-size:14px;
                     }
                     .box{
                         border:#666666 solid 1px;
                     }
                </style>
            </head>
            <body bgcolor = "#FFFFFF">
                <div align = "center">
                    <div style = "width:300px; border: solid 1px #333333; " align = "left">
                        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Administrative Login</b></div>
                            <div style = "margin:30px">
                                <form action = "" method = "POST">
                                    <label>UserName  :</label><input type="text" name="username" class="box"/><br /><br />
                                    <label>Password  :</label><input type="password" name="password" class="box" /><br/><br />
                                    <input type = "submit" name="submit" value="Submit"/><br />
                                </form>
                            <div style = "font-size:11px; color:#cc0000; margin-top:10px">';
                            
        echo $GLOBALS['$error'];
        echo '
                            </div>
                        </div>
                    </div>
                </div>
            </body>
            </html>';
    }
    
    function displayPage(){
        echo '<!--This document serves as an HTML5 markup for the "myAdmin.php" page of www.jentofthomes.com.
    
                Designed by: Michael Costa
                On:02/22/2016
            -->
            
            
            <!DOCTYPE html>
            <html lang="en-US">
            <head>
                <title>My Admin Page</title>
                <!--<link rel="icon" href="favicon.ico" type="image/x-icon">-->
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel=stylesheet type="text/css" href="styleSheet.css">
                <link rel=stylesheet type="text/css" href="adminStyleSheet.css">
                <!-- Latest compiled and minified CSS -->
                <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
                <!-- jQuery library -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                <!-- Latest compiled JavaScript -->
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
            </head>
            <body>
                <div class="welcome">
                     <h3>HELLO JENNIFER TOFT</h3>
                     <h3>Welcome to Your Website Dashboard</h3>
                </div>
                <div class="reviewList">
                    <h3>Reviews Control Panel</h3>
                    <form action="" method="POST">
                    <table border="1">
                        <tr>
                            <th width="2%">Visible</th>
                            <th width="7%">Date</th>
                            <th width="5%">Time</th>
                            <th width="3%">Number of Stars</th>
                            <th width="10%">First Name</th>
                            <th width="10%">Last Name</th>
                            <th width="15%">Email</th>
                            <th width="10%">City</th>
                            <th width="5%">State</th>
                            <th>Review</th>
                        </tr>';
                    
        $servername = "localhost";
        $username = "***********";
        $password = "*******************";
        $dbname = "**************";
        $conn = mysql_connect($servername, $username, $password);
        if(!$conn){
            echo "Not connected to database.";
            die("Connection failed: " . $conn->connect_error);
        }
    
        $dbAccess = mysql_select_db($dbname);
        $countQuery = mysql_query("SELECT * FROM uReviews;");
        $recordCount = mysql_num_rows($countQuery);
        $dataArray = array();
        $entryCount = 0;
        while($row = mysql_fetch_array($countQuery)){
            $entryCount++;
            $reviewId[$entryCount] = $row['reviewId'];
            if($row['reviewVisible'] == TRUE){
                $checkMark = "checked";
            }else{
                $checkMark = "";
            }
            echo "<tr><td><input type='checkbox' name='checkBox".$entryCount."' ".$checkMark."></td>";
            echo "<td>".$row['reviewDate']."</td>";
            echo "<td>".$row['reviewTime']."</td>";
            echo "<td>".$row['userStars']."</td>";
            echo "<td>".$row['firstName']."</td>";
            echo "<td>".$row['lastName']."</td>";
            echo "<td>".$row['userEmail']."</td>";
            echo "<td>".$row['userCity']."</td>";
            echo "<td>".$row['userState']."</td>";
            echo "<td>".$row['userReview']."</td></tr>";
        }
        echo '</table>
              <input type="submit" name="update" value="Update Database">
            </form>
                
                
            </div>
            <div class="blogList">
                <h3>Blog Control Panel</h3>';
        
        /***************INSERT PHP CODE FOR BLOG HERE**********************/

        echo '</div>
        </body>
        </html>';

        if(isset($_POST['update'])){
            for($i = 1;$i <= $entryCount;$i++){
                $id = $reviewId[$i];
                $element = 'checkBox'.$i;
                if(isset($_POST[$element])){
                    $updateQuery = "UPDATE uReviews SET reviewVisible = TRUE WHERE reviewId = '".$id."'";
                }else{
                    $updateQuery = "UPDATE uReviews SET reviewVisible = FALSE WHERE reviewId = '".$id."'";
                }
                $updateDB = mysql_query($updateQuery);
                    sleep(1);
            }
            unset($_POST['update']);
            $conn = mysql_close();
        }
    }
?>