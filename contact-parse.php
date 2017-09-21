<?php
//if they pressed the button, pull out the user inputs
if($_POST['did_send'] == 1){
    // Create local variables from the Flash ActionScript posted variables
    $senderName = $_POST['the_name'];
    $senderEmail = $_POST['the_email'];
    $senderInquiries = $_POST['the_inquiries'];



// Strip slashes on the Local typed-in variables for security and run any php based error check here
    $senderName = clean_string($senderName);
    $senderEmail = clean_string($senderEmail);
    $senderInquiries = clean_string($senderInquiries);





    // IMPORTANT - Change these lines to be appropriate for your needs - IMPORTANT !!!!!!!!!!!!!!!!!!
    $to = "joemo@mojoezone.come";
    $from = "$senderEmail";
    $subject = "Class form Test";
    // Modify the Body of the message however you like
    $message = "form info:

        Name:  $senderName
        Email:  $senderEmail
        Inquiries: $senderInquiries";


        // Build $headers Variable
        $headers = "From: $from\r\n";
        $headers .= "Content-type: text\r\n";


    //send the mail!
    $mail_sent = mail($to, $subject, $message, $headers);

    //success/error
    if($mail_sent == 1){
        //success
        $display_msg = 'Thank you for filling in the form ' .$senderName.'.I will reply as soon as possible';
        $status = 'success';
        //to open a new thank you page use: header( 'Location: thankYou.html' ) ;
    }else{
        //failure
        $display_msg = 'Sorry, something went wrong, and the form was not submitted. Please try again';
        $status = 'error';
    }

}

?>
