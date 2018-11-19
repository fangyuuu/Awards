<?php
include_once "databaseFunctions.php";
$query = $_GET['search'];
// gets value sent over search form


$query = htmlspecialchars($query);
// changes characters used in html to their equivalents, for example: < to &gt;

$query = mysql_real_escape_string($query);
// makes sure nobody uses SQL injection

$raw_results = mysqli_query($dblink, "SELECT * FROM attendees
            WHERE (`name` LIKE '%" . $query . "%') ") or die(mysqli_error($dblink));
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Asia Insurance Review Awards 2018</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="css/landing-page.min.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" href="index.php">Asia Insurance Review 2018</a>
                <a class="btn btn-primary" href="#">Add New</a>
            </div>
        </nav>

        <!-- Masthead -->
        <header class="masthead text-white text-center">
            <form data-toggle="validator" method="POST" action="showOthers.php" class="form-horizontal" role="form" enctype="multipart/form-data">
                <div class="col-12 col-md-9" id="table_attendees">
                    <div class="form-row" id="table-scroll">
                        <table class="table table-striped table-bordered col-md-12" cellspacing="0" width="100%" style="align-content: center;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Company</th>
                                    <th>Table No.</th>
                                    <th>Attendance</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                if (mysqli_num_rows($raw_results) > 0) { // if one or more rows are returned do following
                                    while ($results = mysqli_fetch_array($raw_results)) {
                                        // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                                        echo '<tr>
                                            <td>' . $results['name'] . '</td>
                                            <td>' . $results['country'] . '</td>
                                            <td>' . $results['company'] . '</td>
                                            <td>' . $results['table_id'] . '</td>
                                            <td><input type="hidden" name="attendance" class="form-control form-control-sm" value="' . $results['attendee_id'] . '">' .
                                            '<input type="submit" name="name" value="View" onclick="return confirm(`Are you sure?`)" /></td>
                                        </tr>';
                                    }
                                } else { // if there is no matching rows do following
                                    echo "No results";
                                }
                                ?>

 
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </header>


        <!-- Footer -->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                        <ul class="list-inline mb-2">
                            <li class="list-inline-item">
                                <a href="#">About</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#">Contact</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#">Terms of Use</a>
                            </li>
                            <li class="list-inline-item">&sdot;</li>
                            <li class="list-inline-item">
                                <a href="#">Privacy Policy</a>
                            </li>
                        </ul>
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018. All Rights Reserved.</p>
                    </div>
                    <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-3">
                                <a href="#">
                                    <i class="fab fa-facebook fa-2x fa-fw"></i>
                                </a>
                            </li>
                            <li class="list-inline-item mr-3">
                                <a href="#">
                                    <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fab fa-instagram fa-2x fa-fw"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        
    </body>

</html>
