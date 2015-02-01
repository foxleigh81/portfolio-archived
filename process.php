<?php
    if($_POST['js']) {
        $name = stripslashes($_POST['user-name']);
        $enquiry = stripslashes($_POST['user-content']);
        $email = stripslashes($_POST['user-email']);
        $tel = stripslashes($_POST['user-tel']);
        $type = $_POST['contract-type'];

        $message  = '<h1>'.$name .' has just sent a message!</h1>';

        $message .= '<p><h2>Contact details</h2>';
        $message .= '<strong>Name:</strong> '.$name.'<br />';
        $message .= '<strong>Email:</strong> <a href="mailto:'.$email.'">'.$email.'</a><br />';
        if ($tel) $message .= '<strong>Telephone number:</strong> ' .$tel. '<br />';
        $message .= '</p><p><strong>They are interested in contacting you about a: </strong> '.$type.'  <strong>opportunity.</strong></p>';
        $message .= '</p><p><strong>The message is as follows</strong><br />'.$enquiry.'</p>';

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'From: mailerbot@alexward.me.uk' . "\r\n" ;
        $headers .= 'Reply-To:'. $email . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
       mail('alex.ward@bbqdigital.com', 'Email from Portfolio Website', $message, $headers);
       header('Location: '. '/index.php?posted=true');
       die();
    } else {
      header('Location: '. '/error');
    }
?>
