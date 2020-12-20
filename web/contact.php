<?php 
define("TITLE" ,"la poma | Contact");

include('./scripts/array.php');

include('./cmps/banner.php');
include('./cmps/nav.php');

?>
<img class="hr" src="./assets/img/hr.png">

<div class="contact flex col align-center justify-center text-center">
    <h1>Get in touch with us!</h1>

    <?php 
    // Check for header injections.
    function hasHeaderInjection($str) {
        return preg_match('/[\r\n]/',$str);
    }
    if (isset($_POST['contact_submit'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $msg = $_POST['msg'];

        //Check to see if $name or $email have header injections
        if(hasHeaderInjection($name) || hasHeaderInjection($email)) {
            die();
        }

        if( !$name || !$email || !$msg) {
            echo '<h4 class="error">All fields required.<h4> <button><a href="contact.php">Go back and try again.</a></button>';
            exit;
        }
        
        $to = "liamfitstandarts@gmail.com";
        $subject = "$name sent you a message via contact form.";
        $message = "Name $name\r\n";
        $message .= "Email $email\r\n";
        $message .= "Message \r\n$msg";

        if(isset($_POST['newsletter'])) {

            $message .= "\r\n\r\nPlease add $email to the mailing list.\r\n";
        }
        $message = wordwrap($message,72);
        $headers = "MIME-VERSION: 1.0\r\n";
        $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";
        $headers .= "From: $name <$email>\r\n";
        $headers .= "X-Priority: 1\r\n";
        $headers .= "X-MSMail-Priority: High 1\r\n\r\n";

        mail($to,$subject,$message,$headers);
    
    ?>
    <!-- Show success message after email has sent -->
    <h5>Thanks for contacting la poma's</h5>
    <p>Please allow 24 hours for a response</p>
    <button><a href="index.php">Go to Home Page</a></button>

    <?php } else { ?>
    <form class="flex col justify-center text-center w100" method="post" id="contact-form">
        <div class="input-container flex col align-start w100">
            <label for="name">YOUR NAME</label>
            <input class="w100" name="name" id="name" type="text">
        </div>

        <div class="input-container flex col align-start w100">
            <label for="email">YOUR EMAIL</label>
            <input class="w100" name="email" id="email" type="text">
        </div>

        <div class="input-container flex col align-start w100">
            <label for="msg">AND YOUR MESSAGE</label>
            <textarea class="w100" id="msg" name="msg" id="msg" cols="30" rows="10"></textarea>
        </div>
        <div class="input-container flex align-center  w100">
            <input type="checkbox" name="newsletter" id="newsletter">
            <label for="newsletter">SUBMIT TO OUR NEWSLETTER.</label>
        </div>
        <input class="w100" type="submit" name="contact_submit" value="SEND MESSAGE">
    </form>
    <?php }  ?>
</div>
<img class="hr" src="./assets/img/hr.png">

<?php 

include('./cmps/details.php');
include('./cmps/footer.php');

?>