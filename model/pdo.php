<?php
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=da1_fall2023", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
<<<<<<< HEAD
// PDO QUERY
function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = pdo_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $data = $stmt->fetchAll();
        return $data;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// PDO QUERY ONE
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);

    try {
        $conn = pdo_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $data = $stmt->fetchAll();
        return $data;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// PDO EXECUTE
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_connection();
        $stmt = $conn->prepare($sql);
=======
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
>>>>>>> d68d04204b8886ab2e7e8d58b890df66b2a8fa29
        $stmt->execute($sql_args);

    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
// truy vấn nhiều dữ liệu
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);

    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// truy vấn  1 dữ liệu
function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
pdo_get_connection();
?>