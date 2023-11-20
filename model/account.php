<?php
    session_start();
    ob_start();
// LOGIN
function login($email, $password , $checkRemember = "no")
{
    $sql = "SELECT * FROM users WHERE `user_email`='$email' and  `user_password`='$password'";
    $account = pdo_query_one($sql);
<<<<<<< HEAD
=======
    
    if ($account) {
        $user = [ "user_email" => $email ,"user_password" => $password ,"user_role" => $account["user_role"]];
        if ($checkRemember === 'yes') {
            setcookie("user" , json_encode($user) , time() + (86400) ,"/");
        }else {
            $_SESSION["user"] = $user;
        }
        return true;
    }
    return false;
>>>>>>> d68d04204b8886ab2e7e8d58b890df66b2a8fa29
}
// LOGOUT
function logout()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }else {
        setcookie("user" , "" , time() - (86400) , "/");
    }
}
// REGISTER
function register($name, $email, $password)
{
    $sql = "INSERT INTO `users` ( `user_email`, `user_name`, `user_password`) VALUES ( '$email', '$name','$password'); ";
    pdo_execute($sql);

    return login($email, $password);
}

//CREATE RAMDOM PASSWORD 
function generateRandomString($length = 8) {
    $lowercaseChars = 'abcdefghijklmnopqrstuvwxyz';
    $uppercaseChars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numericChars = '0123456789';
    $specialChars = '!@#$%^&*()-_=+';

    // Kết hợp tất cả các ký tự để có được các ký tự sẽ xuất hiện trong chuỗi ngẫu nhiên
    $allChars = $lowercaseChars . $uppercaseChars . $numericChars . $specialChars;

    // Sinh ra chuỗi ngẫu nhiên
    $randomBytes = random_bytes($length);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $allChars[ord($randomBytes[$i]) % strlen($allChars)];
    }

    // Đảm bảo có ít nhất một chữ cái in hoa và một ký tự
    $randomString = str_replace([
        substr($lowercaseChars, -1),
        substr($uppercaseChars, -1),
        substr($numericChars, -1),
        substr($specialChars, -1)
    ], [
        substr($lowercaseChars, -2, 1),
        substr($uppercaseChars, -2, 1),
        substr($numericChars, -2, 1),
        substr($specialChars, -2, 1)
    ], $randomString);

    return $randomString;
}


// FORGOT PASSWORD
function forgotPassword($email)
{
<<<<<<< HEAD
=======
    $user = loadall_user("" , $email);
    $newPassword = "";
    if ($user) {
        $newPassword = generateRandomString();
        pdo_execute("UPDATE `users` SET `user_password`='$newPassword'  WHERE `user_email`='$email'");
    } else {
        return false;
    }
    ;
>>>>>>> d68d04204b8886ab2e7e8d58b890df66b2a8fa29
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
        // echo 'Đã gửi mail xong';
    } catch (Exception $e) {
        // echo 'Error: ', $mail->ErrorInfo;
    }
    return true;
}

function loadall_user($user_name = '',$user_email='' ,  $user_role = false)
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
