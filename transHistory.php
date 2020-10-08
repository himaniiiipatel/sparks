<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">

    <title>Transaction History | CMS</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity=""></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity=""></script>
</head>

<body>
    <h1>transactions history</h1>
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

           
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-options">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><span class="fa fa-home fa-lg"></span> Home &nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="users.php"><span class="fa fa-eye fa-lg"></span> View Users &nbsp;</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><span class="fa fa-history fa-lg"></span> Transaction History &nbsp;</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
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

        $sql = "SELECT * FROM transactions ORDER BY ID DESC";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            echo '<tr><td colspan="3">No Rows Returned</td></tr>';
        }

        if ($result->num_rows > 0) {
        ?>
           

            <div class="table-responsive" style="font-size: 16px;">
                <table class="table table-striped table-dark table-hover table-bordered w-auto table-sort" align="center" style="margin-top: 40px; margin-bottom: 80px; text-align: center;" id="transHistTable">
                    <thead>
                        <tr>
                            <th scope="col-sm">Sender</th>
                            <th scope="col-sm">Receiver</th>
                            <th scope="col-sm">Credits Transferred</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {

                            echo "<tr><td>" . $row["Sender"] . "</td><td>" . $row["Receiver"] . "</td><td>" . $row["Credits"] . "</td></tr>\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>
<?php
        } else {
        }
        $conn->close();

?>


<footer class="footer mt-auto">
    <div class="footerText">
        
            <p></span>  <a href="https://www.thesparksfoundationsingapore.org/" class="footerLink">The Sparks Foundation</a>
        </p>
    </div>
</footer>

</body>

</html>