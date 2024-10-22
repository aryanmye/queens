
<!-- icon list-->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('smtp/PHPMailerAutoload.php');

function smtp_mailer($to, $subject, $message) {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "smtp.gmail.com";
    $mail->Port = 587;
    $mail->IsHTML(true);
    $mail->CharSet = 'UTF-8';
    $mail->Username = "jadhavaryan467@gmail.com";
    $mail->Password = "oozzyqfwnpufjuqi";
    $mail->SetFrom("jadhavaryan467@gmail.com");
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AddAddress($to);
    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
        return $mail->ErrorInfo;
    } else {
        return 'Sent';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mailid = $_POST['email'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];
    $subject="Enquiry for product";
    $message = "
<html>
<head>
    <title>New Mail Enquiry</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #ccc; border-radius: 5px; }
        h2 { color: #333; }
        p { margin: 10px 0; }
        .footer { margin-top: 20px; font-size: 0.9em; color: #777; }
    </style>
</head>
<body>
    <div class='container'>
        <h2>New Product Enquiry from $mailid</h2>
        <p><strong>Product:</strong> $product</p>
        <p><strong>Quantity:</strong> $quantity</p>
        
    
        <div class='footer'>
            <p>This email was sent from your website contact form.</p>
        </div>
    </div>
</body>
</html>
";
    $to = 'aryanjadhav686@gmail.com';
    $result = smtp_mailer($to, $subject, $message);

    if ($result === 'Sent') {
      echo "
      <div class='alert alert-success alert-dismissible fade show' role='alert' style='position: fixed; bottom: 20px; right: 20px; z-index: 1050;'>
          <strong>Success!</strong> Your mail has been sent successfully.
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
      ";
  }
  
   else {
        echo "<script>alert('Mail sending failed: " . $result . "');</script>";
    }
}
?>