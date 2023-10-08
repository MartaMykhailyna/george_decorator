<?php
use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $body = $_POST['body-textarea'];

    require_once "../phpmailer/PHPMailer-6.8.1/src/PHPMailer.php";
    require_once "../phpmailer/PHPMailer-6.8.1/src/SMTP.php";
    require_once "../phpmailer/PHPMailer-6.8.1/src/Exception.php";

    $mail = new PHPMailer();

    // SMTP settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "martamykhailyna608@gmail.com";
    $mail->Password = '608marta6008';
    $mail->Port = 465;
    $mail->SMTPSecure = "ssl";

    // email settings
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("martamykhailyna608@gmail.com");
    // $mail->Subject = "$email()";
    $mail->Body = $body;

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong:<br>" . $mail->ErrorInfo;
    }

    exit(json_encode(array("status" => $status, "response" => $response)));
}
?>