<?php 

    $servername = "localhost";
    $username = "id15005517_root";
    $password = "ds/_m2FIs4xNnPr(";
    $dbname = "id15005517_gripspark";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $credits = (int)$_POST['creds'];

    $sql = "SELECT Email FROM users WHERE Email='$email'";
    $res = $conn->query($sql);
    if($res->num_rows > 0) {
        echo "<script> alert('Same Email already exists! Please use another email!!'); window.location.href='index.php'; </script>";
    }

    function insert_data( $table_name, $data ) {
        $key = array_keys($data);  
        $value = array_values($data);

        $query ="INSERT INTO $table_name ( ". implode(',' , $key) .") VALUES('". implode("','" , $value) ."')";

        return $query;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $credits = (int)$_POST['creds'];

    $data = array("Name"=>$name , "Email"=>$email , "Credits"=>$credits);
    $table_name = "users";
  
    $sql = insert_data($table_name , $data);

    if ($conn->query($sql) === TRUE) {
        echo "<script> alert('Woohoo, User created successfully!'); window.location.href='users.php'; </script>";
    } else {
        echo "<script> alert('Oops! User not created. Let's Try Again!!'); window.location.href='index.php'; </script>";
    }
