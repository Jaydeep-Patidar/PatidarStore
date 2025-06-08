<?php
    $username = $_POST['username'];
    $phonenumber = $_POST['phonenumber'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $massage = $_POST['massage'];

    //database connection
    $conn = new mysqli('localhost','root','','contact');
    if($conn->connect_error){
        die('connection faild : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into contactdata(username, phonenumber, email, subject, massage)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sisss",$username, $phonenumber, $email, $subject, $massage);
        $stmt->execute();
        echo "Registration Successfully...<br>";
        echo "We can solve your query as soon as possible<br>";
        echo "<a href='Contacts.html'>back</a>";
        $stmt->close();
        $conn->close();
    }
?>