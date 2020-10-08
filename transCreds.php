<?php
$sen = $_COOKIE['nmCookie'];
$rec = $_POST['selectedUser'];
$creds =  $_POST['credsEntered'];


if ($sen == $rec) {
    echo "<script> alert('Oops! Can’t transfer credits to yourself.'); window.location.href='users.php'; </script>";
} else {
    if ($creds <= 0) {
        echo "<script> alert('Nahh, Can’t transfer nothing or negative value!'); window.location.href='users.php'; </script>";
    }

    function build_sql_insert($table, $data)
    {
        $key = array_keys($data);
        $val = array_values($data);
        $sql = "INSERT INTO $table (" . implode(', ', $key) . ") "
            . "VALUES ('" . implode("', '", $val) . "')";

        return ($sql);
    }

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

    $senqry = "SELECT Credits FROM users WHERE Name='$sen'";
    $resultSen = $conn->query($senqry);
    if ($resultSen->num_rows > 0) {
        $res = $resultSen->fetch_assoc();

        if ($creds > $res['Credits']) {
            echo "<script> alert('Sorry, Not enough Credits!'); window.location.href='users.php'; </script>";
        } else {
            $updatedCreds = $res['Credits'] - $creds;
            $sendec = "UPDATE users SET Credits = '$updatedCreds' WHERE Name='$sen'";

            if ($conn->query($sendec) === true) {
                $recqry = "SELECT Credits FROM users WHERE Name='$rec'";
                $resultRec = $conn->query($recqry);
                if ($resultRec->num_rows > 0) {
                    $r = $resultRec->fetch_assoc();

                    $updatedRCreds = $r['Credits'] + $creds;
                    $recdec = "UPDATE users SET Credits = '$updatedRCreds' WHERE Name='$rec'";
                    $table = 'transactions';
                    $data = array("Sender" => $sen, "Receiver" => $rec, "Credits" => $creds);

                    if ($conn->query($recdec) === true) {
                        $ans = build_sql_insert($table, $data);

                        if ($conn->query($ans) === true) {
                            echo "<script> alert('Yay, Transfer Successful!'); window.location.href='users.php'; </script>";
                        } else {
                            echo "<script> alert('Sorry, an error occured!'); window.location.href='users.php'; </script>";
                        }
                    } else {
                        echo "<script> alert('Nahh, Error!'); window.location.href='users.php'; </script>";
                    }
                } else {
                    echo "<script> alert('Nahh, Error!'); window.location.href='users.php'; </script>";
                }
            } else {
                echo "<script> alert('Nahh, Error!'); window.location.href='users.php'; </script>";
            }
        }
    }
}
