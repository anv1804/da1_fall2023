<?php
include './model/pdo.php';
include './model/account.php';
include './model/hotels.php';
include './model/rooms.php';
include './model/users.php';
if (isset($_POST['submit'])) {
    $name = array();
    $tmp_name = array();
    $error = array();
    $ext = array();
    $size = array();
    foreach ($_FILES['file']['name'] as $file) {
        $name[] = $file;
    }
    foreach ($_FILES['file']['tmp_name'] as $file) {
        $tmp_name[] = $file;
    }
    foreach ($_FILES['file']['error'] as $file) {
        $error[] = $file;
    }
    foreach ($_FILES['file']['type'] as $file) {
        $ext[] = $file;
    }
    foreach ($_FILES['file']['size'] as $file) {
        $size[] = round($file / 1024, 2);
    } //Phần này lấy giá trị ra từng mảng nhỏ

    echo "Tổng số file được tải lên: " . count($name) . " file";
    echo "\n\nTên file\nLoại\nKích thước\nThư mục";
    $full = array();
    for ($i = 0; $i < count($name); $i++) {
        if ($error[$i] < 0) {
            echo "Lỗi: " . $error[$i];
        } else {
            $temp = preg_split('/[\/\\\\]+/', $name[$i]);
            $filename = $temp[count($temp) - 1];
            $upload_dir = "./assets/images/";
            $upload_file = $upload_dir . $filename;
            if (file_exists($upload_file)) {
                echo 'File đã tồn tại';
            } else {
                if (move_uploaded_file($tmp_name[$i], $upload_file)) {
                    echo "\n<p>" . $name[$i] . "</p>\n";
                    echo "\n<p>" . $ext[$i] . "</p>\n";
                    echo "\n<p>" . $size[$i] . " kB</p>\n";
                    echo "\n<p>" . $upload_file . "</p>\n";
                }
                array_push($full,$name[$i]);
            }
        } //End khoi cau lenh up file va them vao CSDL;
    }
//    $abc = array($full);
    $listImages = implode(',',$full);
    $ccc = explode(',',$listImages);
    print_r($ccc);
    $sql = "UPDATE `hotels` SET `hotel_image`='{$listImages}' WHERE hotel_id =1";
    pdo_execute($sql);
     //End vong lap for cho tat ca cac file;
    echo '</p>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="test.php" enctype="multipart/form-data" method="POST">
        <input multiple="multiple" name="file[]" size="141" type="file" />
        <input name="submit" type="submit" name="submit" value="Upload" />
    </form>

</body>

</html>