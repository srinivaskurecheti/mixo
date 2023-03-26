<?php
// check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
  // collect form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  
  // validate form data
  if (empty($name) || empty($email) || empty($message)) {
    die('Please fill in all required fields.');
  }
  
  // configure PHPMailer
  require_once('path/to/PHPMailerAutoload.php'); // replace with the actual path to PHPMailerAutoload.php
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; // replace with your SMTP server address
  $mail->SMTPAuth = true;
  $mail->Username = 'snivas456k@gmail.com'; // replace with your SMTP username
  $mail->Password = 'yourpassword'; // replace with your SMTP password
  $mail->SMTPSecure = 'ssl';
  $mail->Port = 465;
  
  // compose email
  $mail->setFrom($email, $name);
  $mail->addAddress('youremail@example.com'); // replace with your own email address
  $mail->Subject = 'New contact form submission';
  $mail->Body = "Name: $name\nEmail: $email\nMessage:\n$message";
  
  // send email
  if ($mail->send()) {
    echo 'Message sent successfully.';
  } else {
    echo 'There was a problem sending the message. Please try again later.';
  }
  
}
?>
