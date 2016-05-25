<!--This document serves as an HTML5 markup as well as the email functions for the "Contact Us" page for www.jentofthomes.com.
    
    Designed by: Michael Costa
    On:02/22/2016
-->


<section>
    <div class='container-fluid'>
        <form class='emailForm' name='contactForm' method='POST' action='contact_us.php'>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2'>
                    <h3 id='contactWelcome'>Let Us Know How We Can Help You<br></h3>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2'>
                    <div class='contactPosition'>
                        <p class='contactForm'>*First Name:</p>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <input class='contactElements' type="text" name="firstName" placeholder='First Name' required>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2'>
                    <div class='contactPosition'>
                        <p class='contactForm'>*Last Name:</p>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <input class='contactElements' type="text" name="lastName" placeholder='Last Name' required>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2'>
                    <div class='contactPosition'>
                        <p class='contactForm'>*Email:</p>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <input class='contactElements' type="text" name="email" placeholder='Email' required>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2'>
                    <div class='contactPosition'>
                        <p class='contactForm'>Phone:</p>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <input id='areaCode' type="text" name="areaCode" placeholder='123'>
                    <input id='prefix' type="text" name="phonePrefix" placeholder='456'>
                    <input id='suffix' type="text" name="phoneSuffix" placeholder='7890'>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2'>
                    <div class='contactPosition'>
                        <p class='contactForm'>Best Time To Reach You:</p>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <select id='contactElements' name='timeOfDay'>
                        <option value='anytime'>Anytime</option>
                        <option value='morning'>Morning</option>
                        <option value='afternoon'>Afternoon</option>
                        <option value='evening'>Evening</option>
                    </select>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-12 col-sm-12 col-md-4 col-md-offset-2 col-lg-4 col-lg-offset-2'>
                    <div class='contactPosition'>
                        <p class='contactForm'>Comments:</p>
                    </div>
                </div>
                <div class='col-xs-12 col-sm-12 col-md-6 col-lg-6'>
                    <textarea class='contactComment' name='commentMessage' rows='20' cols='30' >
                    </textarea>
                </div>
            </div>
            <div class='row'>
                <div class='col-xs-2 col-xs-offset-0 col-sm-2 col-sm-offset-0 col-md-4 col-md-offset-4 col-lg-4 col-lg-offset-4'>
                    <div id='contactSubmit'>
                        <input type="submit" name="submit" value="Send Email">
                    </div>
                </div>
            </div>
            <div class='row'>
                <div id='fieldRequire'>
                    <?php echo $confirm ?>
                    <!--<p>*Fields must be completed.</p>-->
                </div>
            </div>
        </form>
    </div>
</section>
<?php
if(isset($_POST['submit'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $areaCode = $_POST['areaCode'];
    $phonePrefix = $_POST['phonePrefix'];
    $phoneSuffix = $_POST['phoneSuffix'];
    $timeOfDay = $_POST['timeOfDay'];
    $commentMessage = $_POST['commentMessage'];
    $phoneNumber = $areaCode.'-'.$phonePrefix.'-'.$phoneSuffix;
    composeEmail($firstName, $lastName, $email, $phoneNumber, $timeOfDay, $commentMessage);
}else{
    $confirm = '*Fields must be completed.';
}
function composeEmail($fName, $lName, $eMail, $pNumber, $time, $cMessage){
    $message = $fName.' '.$lName.' would like you to contact them.'."\n\n";
    $message .= 'Name: '.$fName.' '.$lName."\n\n";
    $message .= 'Email: '.$eMail."\n\n";
    if($pNumber > 0){
        $message .= 'Phone: '.$pNumber."\n\n";
    }
    $message .= 'Best Time to Reach: '.$time."\n\n";
    if(strlen($cMessage) > 1){
        $message .= 'Comments: '.$cMessage."\n\n";
    }
    sendEmail($message);
}
function sendEmail($emailMessage){
    $emailTo = "**********************";
    $emailFrom = "******************************";
    $emailSubject = "A Client Would Like To Contact you.";
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















