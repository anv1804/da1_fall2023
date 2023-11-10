<?php
// PDO CONNECT
function pdo_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=da1_fall2023", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
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
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);

    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
?>