

<?php

    if(isset($_POST['newReview']) || isset($_POST['preview']) || isset($_POST['submit'])){
        unset($_POST['newReview']);
        displayReviewForm();
    }else{
        unset($_POST['return']);
        displayReviewPage();
    }

    function displayReviewPage(){

        echo '<h3>CLICK BELOW TO LEAVE A REVIEW</H3>
            <form action="" method="POST">
                <button type="submit" class="reviewButton" name="newReview">LEAVE A REVIEW</button><br>
            </form>';
        $servername = 'localhost';
        $username = '***********';
        $password = '*******************';
        $dbname = '**************';
        $conn = mysql_connect($servername, $username, $password);
        if(!$conn){
            echo 'Not connected to database.';
            die('Connection failed: ' . $conn->connect_error);
        }
    
        $dbAccess = mysql_select_db($dbname);
        $countQuery = mysql_query("SELECT * FROM uReviews;");
        $recordCount = mysql_num_rows($countQuery);
        $dataArray = array();
        $entryCount = 0;
        echo '<table id="reviewTable">';
        while($row = mysql_fetch_array($countQuery)){
            $entryCount++;
            $reviewId[$entryCount] = $row['reviewId'];
            if($row['reviewVisible'] == TRUE){
                echo "<tr class='rHead'><td class='headL'><p class='stars'>";
                $starCount = $row['userStars'];
                for($i = 0;$i < $starCount;$i++){
                    echo "&#9733";
                }
                $lNString = $row['lastName'];
                $fNString = $row['firstName'];
                $lNString = (string)$lNString;
                $fNString = (string)$fNString;
                $lNString = $lNString[0];
                $lNString = ucfirst(strtolower($lNString));
                $fNString = ucfirst(strtolower($fNString));
                echo "</p><br>".$fNString." ".$lNString.".</td>";
                $city = $row['userCity'];
                $city = ucwords(strtolower($city));
                echo "<td class='headR'>".$row['reviewDate']."<br>".$city.", ".$row['userState']."</td></tr>";
                echo "<tr class='rBody'><td colspan='2' class='review'>".$row['userReview']."</td></tr>";
            }
        }
        echo '</table>';
    }

    function displayReviewForm(){

        if(isset($_POST['submit'])){
            $fName = $_POST['fName'];
            $lName = $_POST['lName'];
            $email = $_POST['email'];
            $review = $_POST['review'];
            $stars = $_POST['rating'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $date = date('Y-m-d');
            $timeOfDay = date('h:i:sa');
            composeEmail($fName, $lName);
            updateDB($fName, $lName, $email, $review, $stars, $city, $state, $date, $timeOfDay);
            displayConfirmPage();
        }else{
            echo '<h3>If you would like to leave a review please fill out the form below.</h3>
            <form action="" method="POST">
                *First Name:<br>
                <input type="text" name="fName" placeholder="First Name" required><br>
                *Last Name:<br>
                <input type="text" name="lName" placeholder="Last Name" required><br>
                *Email:<br>
                <input type="text" name="email" placeholder="Email Address" required><br>
                *Review:<br>
                <textarea name="review" rows="10" cols="50" placeholder="Please leave your review here." required></textarea><br>
                *Star Rating:<br>
                <div class="stars">
                    <fieldset class="rating" required>
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="5 Stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="4 Stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="3 Stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="2 Stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="1 Star"></label>
                    </fieldset><br>
                </div>
                *City:<br>
                <input type="text" name="city" placeholder="City" required><br>
                *State:<br>
                <select name="state" placeholder="State" required>
                	<option value="AL">Alabama</option>
                	<option value="AK">Alaska</option>
                	<option value="AZ">Arizona</option>
                	<option value="AR">Arkansas</option>
                	<option value="CA">California</option>
                	<option value="CO">Colorado</option>
                	<option value="CT">Connecticut</option>
                	<option value="DE">Delaware</option>
                	<option value="DC">District Of Columbia</option>
                	<option value="FL">Florida</option>
                	<option value="GA">Georgia</option>
                	<option value="HI">Hawaii</option>
                	<option value="ID">Idaho</option>
                	<option value="IL">Illinois</option>
                	<option value="IN">Indiana</option>
                	<option value="IA">Iowa</option>
                	<option value="KS">Kansas</option>
                	<option value="KY">Kentucky</option>
                	<option value="LA">Louisiana</option>
                	<option value="ME">Maine</option>
                	<option value="MD">Maryland</option>
                	<option value="MA">Massachusetts</option>
                	<option value="MI">Michigan</option>
                	<option value="MN">Minnesota</option>
                	<option value="MS">Mississippi</option>
                	<option value="MO">Missouri</option>
                	<option value="MT">Montana</option>
                	<option value="NE">Nebraska</option>
                	<option value="NV">Nevada</option>
                	<option value="NH">New Hampshire</option>
                	<option value="NJ">New Jersey</option>
                	<option value="NM">New Mexico</option>
                	<option value="NY">New York</option>
                	<option value="NC">North Carolina</option>
                	<option value="ND">North Dakota</option>
                	<option value="OH">Ohio</option>
                	<option value="OK">Oklahoma</option>
                	<option value="OR">Oregon</option>
                	<option value="PA">Pennsylvania</option>
                	<option value="RI">Rhode Island</option>
                	<option value="SC">South Carolina</option>
                	<option value="SD">South Dakota</option>
                	<option value="TN">Tennessee</option>
                	<option value="TX">Texas</option>
                	<option value="UT">Utah</option>
                	<option value="VT">Vermont</option>
                	<option value="VA">Virginia</option>
                	<option value="WA">Washington</option>
                	<option value="WV">West Virginia</option>
                	<option value="WI">Wisconsin</option>
                	<option value="WY">Wyoming</option>
                </select>
                <br><br><button type="submit" class="submitButton" name="submit">SUBMIT REVIEW</button><br>
            </form>';
        }
    }

    function displayConfirmPage(){
     
        unset($_POST['submit']);
        echo '<h3>THANK YOU FOR THE REVIEW<br>YOUR TIME AND BUSINESS ARE APPRECIATED</H3>
            <form action="" method="POST">
                <button type="submit" class="returnButton" name="return">RETURN TO REVIEWS</button><br>
            </form>';
    }

    function updateDB($fName, $lName, $email, $review, $stars, $city, $state, $date, $timeOfDay){
        
        $servername = "localhost";
        $username = "*********";
        $password = "*************";
        $dbname = "**************";
        $visible = FALSE;
    
        // Create connection
        $conn = mysql_connect($servername, $username, $password);
    
        // Check connection
        if(!$conn){
            echo "Not connected to database.";
            die("Connection failed: " . $conn->connect_error);
        }
        $dbAccess = mysql_select_db($dbname);
        $sql = mysql_query("INSERT INTO uReviews (firstName, lastName, userEmail, userReview, userStars, userCity, userState, reviewDate, reviewTime, reviewVisible)
            VALUES ('$fName', '$lName', '$email', '$review', '$stars', '$city', '$state', '$date', '$timeOfDay', '$visible')");
    
        if(!$sql){
            echo "Error: " . $sql . "<br>" . $conn->error;
        }else{
            echo "Your review has been submitted.\n\nThank you for taking the time to review our services.";
        }
        $conn = mysql_close();
    }

    function composeEmail($fName, $lName){
        $message = 'Hello Jennifer Toft,'."\n\n";
        $message .= $fName.' '.$lName.' left a review on your website.'."\n\n";
        $message .= 'Please log into your website dashboard to review and publish the review.'."\n\n";
        $message .= 'Log in by clicking the link below:'."\n\n";
        $message .= '***********************************';

        sendEmail($message);
    }

    function sendEmail($emailMessage){
        $emailTo = "**********************";
        $emailFrom = "**************************";
        $emailSubject = "Someone left a review on your website.";
        $headers .= "From: $emailFrom \r\n";
        $headers .= "Reply-To: $emailFrom \r\n";
        $headers .= "Return-Path: $emailFrom\r\n";
        $headers .= "X-Mailer: PHP \r\n";
        if(mail($emailTo, $emailSubject, $emailMessage, $headers)){
            $confirm = 'Your email has been sent. Thank you.';
        }else{
            $confirm = 'Email failed. Please try again later.';
        }
    }
?>