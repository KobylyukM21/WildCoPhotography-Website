<?php
  
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $session_type = "";
    $visitor_message = "";
    $email_body = "<div>";
      
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Name:</b></label>&nbsp;<span>".$visitor_name."</span>
                        </div>";
    }
 
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
        $email_body .= "<div>
                           <label><b>Email:</b></label>&nbsp;<span>".$visitor_email."</span>
                        </div>";
    }
      
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Date:</b></label>&nbsp;<span>".$email_title."</span>
                        </div>";
    }
      
    if(isset($_POST['session_type'])) {
        $session_type = filter_var($_POST['session_type'], FILTER_SANITIZE_STRING);
        $email_body .= "<div>
                           <label><b>Session Type:</b></label>&nbsp;<span>".$session_type."</span>
                        </div>";
    }
      
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
        $email_body .= "<div>
                           <label><b>Message:</b></label>
                           <div>".$visitor_message."</div>
                        </div>";
    }
      
    if($session_type == "Wedding") {
        $recipient = "kobylyukm2000@outlook.com";
    }
    else if($session_type == "Couples/Engagement") {
        $recipient = "kobylyukm2000@outlook.com";
    }
    else if($session_type == "Lifestyle/Family") {
        $recipient = "kobylyukm2000@outlook.com";
    }
    else {
        $recipient = "kobylyukm2000@outlook.com";
    }
      
    $email_body .= "</div>";
 
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
      
    if(mail($recipient, $email_title, $email_body, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
      
} else {
    echo '<p>Something went wrong</p>';
}
?>