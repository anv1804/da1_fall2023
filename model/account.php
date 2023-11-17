<?php
session_start();
// LOGIN
function login($email, $password, $checkRemember = "no")
{
    $sql = "SELECT * FROM users WHERE `user_email`='$email' and `user_password`='$password'";
    $account = pdo_query_one($sql);

    if ($account) {
        $user = [$email, $password, $account["user_role"]];
        if ($checkRemember === 'yes') {
            setcookie("user", json_encode($user), time() + (86400), "/");
        } else {
            $_SESSION["user"] = $user;
        }
        return true;
    }
    return false;
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
    $sql = "INSERT INTO `users` ( `user_email`, `user_name`, `user_password`) VALUES ( '$email', '$name','$password'); ";
    pdo_execute($sql);
    return login($email, $password);
}
// FORGOT PASSWORD
function forgotPassword($email)
{
    $user = loadall_user("", $email);
    $newPassword = "";
    if ($user) {
        $bytes = random_bytes(3);
        $newPassword = bin2hex($bytes);
        pdo_execute("UPDATE `users` SET `user_password`='$newPassword' WHERE `user_email`='$email'");
    } else {
        return false;
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
        $noidungthu = "<p>Bạn nhận được thư do bạn hoặc ai đó yêu cầu cấp lại mật khẩu mới.
<p>
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
        // echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        // echo 'Error: ', $mail->ErrorInfo;
    }
    return true;
}

function loadall_user($user_name = '', $user_email = '', $user_role = false)
{
    $sql = "select * from users where 1";
    if ($user_name != '') {
        $sql .= " and user_name like '%" . $user_name . "%'";
    }
    if ($user_email != '') {
        $sql .= " and user_email = '" . $user_email . "'";
    }
    if ($user_role) {
        $sql .= " and user_role = 0";
    }
    $sql .= " order by user_id asc";
    $listUsers = pdo_query($sql);
    return $listUsers;
}
?>