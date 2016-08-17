<?php

/**
 * Created by PhpStorm.
 * User: nghia
 * Date: 8/11/16
 * Time: 10:14 AM
 */
require dirname(PATH_APPLICATION) . "/libs/PHPMailer/PHPMailerAutoload.php";

class mail_controller extends base_controller
{
    function view()
    {

        if (empty($_POST['name']) ||
            empty($_POST['email']) ||
            empty($_POST['phone']) ||
            empty($_POST['message']) ||
            !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        ) {
            echo "No arguments Provided!";
            return false;
        }

        $name = strip_tags(htmlspecialchars($_POST['name']));
        $email_address = strip_tags(htmlspecialchars($_POST['email']));
        $phone = strip_tags(htmlspecialchars($_POST['phone']));
        $message = strip_tags(htmlspecialchars($_POST['message']));


        $mail = new PHPMailer();


        $mail->SMTPDebug = 3;
        //Set PHPMailer to use SMTP.
        $mail->isSMTP();
        //Set SMTP host name
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;
        //Provide username and password
        $mail->Username = "spdoan0111@gmail.com";
        $mail->Password = "nghia1993";
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";
        //Set TCP port to connect to
        $mail->Port = 587;
        $mail->CharSet = "utf8";

        $mail->setFrom("spdoan0111@gmail.com", "Supporter Phản hồi người dùng");
        $mail->addAddress("nghiait0111@gmail.com", "Mình chứ ai!"); // den dia chỉ nao
        $mail->isHTML(true);

        $mail->Subject = "Phản hồi từ thằng " . $name . " có mail là: " . $email_address;
        $mail->Body = "<h2>" . $name . "</h2>
                        <p>Với số điện thoại: " . $phone . "</p>
                        <p>Chửi mày là: " . $message . "</p>
        ";

        $mail->AltBody = "This is the plain text version of the email content";

        header("Location: " . BASE_PATH . "/contact");

        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message has been sent successfully";
        }

    }
}