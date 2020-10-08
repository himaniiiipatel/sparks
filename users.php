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

    <title>View Users | CMS</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity=""></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity=""></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity=""></script>
</head>

<body>
    <h1>users details</h1>
  
    <nav class="navbar navbar-dark navbar-expand-sm fixed-top" id="navbar_top">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

         
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto nav-options">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><span class="fa fa-home fa-lg"></span> Home &nbsp;</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><span class="fa fa-eye fa-lg"></span> View Users &nbsp;</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="transHistory.php"><span class="fa fa-history fa-lg"></span> Transaction History &nbsp;</a>
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

        $sql = "SELECT * FROM users";
        $result = $conn->query($sql);

        if ($result->num_rows == 0) {
            echo '<tr><td colspan="3">No Rows Returned</td></tr>';
        }

        if ($result->num_rows > 0) {
        ?>
            

            <div class="table-responsive" style="font-size: 16px;">
                <table class="table table-striped table-dark table-md table-hover table-bordered w-auto sort" align="center" style="margin-top: 40px; margin-bottom: 90px; text-align: center;" id="userTable">
                    <thead style="font-size: 18px">
                        <tr>
                            <th scope="col-sm">Name</th>
                            <th scope="col-sm">Email</th>
                            <th scope="col-sm">Credits</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {

                            echo "<tr><td>" . $row["Name"] . "</td><td>" . $row["Email"] . "</td><td>" . $row["Credits"] . "</td></tr>\n";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </div>

    <div id="userModal" class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Welcome <strong id="userID"></strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="body1"></div>
                    <br />
                    <div class="transferDet">
                        <form action="transCreds.php" method="post">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <select class="custom-select" name="selectedUser">

                                        <option value="Select"></option>

                                        <?php $drop = $conn->query("SELECT Name FROM users");
                                        if ($drop->num_rows > 0) {
                                            while ($r = $drop->fetch_assoc()) { ?>
                                                <option value="<?php echo $r['Name'] ?>"><?php echo $r['Name'] ?></option>
                                        <?php
                                            }
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm">
                                    <input type="number" class="form-control" placeholder="Enter Credits" min="0" name="credsEntered" value="" required="true" />
                                </div>
                            </div>

                            <br />

                            <div class="col-12 col-sm offset-sm-7">
                                <button type="submit" class="btn btn-secondary" style="font-weight: 700;"><span class="fa fa-exchange fa-sm"></span> Transfer Credits</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
        } else {
        }

        $conn->close();
?>

<footer class="footer mt-auto">
    <div class="footerText">
    
              
           <p> </span>  <a href="https://www.thesparksfoundationsingapore.org/" class="footerLink">The Sparks Foundation</a>
        </p>
    </div>
</footer>

<script>
    $('#userTable tbody').on('click', 'tr', function() {
        let currow = $(this).closest('tr');
        let name = currow.find('td:eq(0)').text();
        document.cookie = 'nmCookie=' + name;
        console.log(document.cookie);
        let credits = currow.find('td:eq(2)').text();

        $('#userID').text(name + ',');
        $('.body1').text('Your Credits: ' + credits);
        $('#userModal').modal('show');
    })
</script>

</body>

</html>