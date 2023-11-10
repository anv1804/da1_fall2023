<?php
// LOGIN
function login($email, $password)
{
    $sql = "SELECT * FROM user WHERE email=$email and password =$password";
    $account = pdo_query_one($sql);


}
// LOGOUT
function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
}
// REGISTER
function register($name, $email, $password)
{
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email','$password')";
    pdo_execute($sql);
}
// FORGOT PASSWORD
function forgotPassword($name, $email, $password)
{
    pdo_query_one($email);
    if (isset($data)) {

    } else {

    }
    ;
    require 'PHPMailer-master/src/PHPMailer.php';
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';
    $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();
        $mail->CharSet = "utf-8";
        $mail->Host = 'smtp.gmail.com'; //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'annvph41556@fpt.edu.vn'; // SMTP username
        $mail->Password = 'ikxezdanaqzaboka'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // encryption TLS/SSL 
        $mail->Port = 465; // port to connect to                
        $mail->setFrom('annguyen04@hotmail.com', 'Admin POLY TRAVEL');
        $mail->addAddress($email);
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Thư gửi lại mật khẩu mới';
        $noidungthu = "<p>Bạn nhận được thư do bạn hoặc ai đó yêu cầu cấp lại mật khẩu mới. <p>
            <p>Mật khẩu của bạn là: <strong style='color:red'>" . $newPassword . "</strong> </p> ";
        $mail->Body = $noidungthu;
        $mail->smtpConnect(
            array(
                "ssl" => array(
                    "verify_peer"       => false,
                    "verify_peer_name"  => false,
                    "allow_self_signed" => true
                )
            )
        );
        $mail->send();
        echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        echo 'Error: ', $mail->ErrorInfo;
    }

}
?>