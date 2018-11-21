<?php
include_once "databaseFunctions.php";
$person_id = $_POST['attendance'];
$update_attendance = "UPDATE attendees SET attendance = 1 WHERE attendee_id = $person_id";
$update_attendance_result = mysqli_query($dblink, $update_attendance);

$get_table_number = "SELECT table_id FROM attendees WHERE attendee_id = $person_id";
$get_table_number_result = mysqli_query($dblink, $get_table_number);
$result = mysqli_fetch_array($get_table_number_result);
$tableNo = $result['table_id'];

$get_people_from_table_query = "SELECT * FROM attendees WHERE table_id = $tableNo";
$get_people_from_table_result = mysqli_query($dblink, $get_people_from_table_query);
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
                <a class="btn btn-success pull-right" href="index.php">Back to main page</a>
            </div>
        </nav>

        <!-- Masthead -->
        <header class="sechead text-white text-center">
            
        </header>
        </br>
        <div class="row">
                <div class ="col-md-6">
                    <img id="floorplan" src="img/floorplan.png" alt="Floor Plan">
                </div>
                <div class="col-6 col-md-6" id="table_attendees">
                    <h4>Table 
                        <?php
                        echo $tableNo;
                        ?>
                    </h4>
                    <div class="form-row" id="table-scroll">
                        <table class="table table-striped table-bordered col-md-12" cellspacing="0" width="100%" style="align-content: center;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Country</th>
                                    <th>Company</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row = mysqli_fetch_assoc($get_people_from_table_result)) {
                                    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                                    echo '<tr>
                                            <td>' . $row['name'] . '</td>
                                            <td>' . $row['country'] . '</td>
                                            <td>' . $row['company'] . '</td>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

       <!-- Footer -->
	<footer class="footer bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 text-center text-lg-left my-auto">
					<ul class="list-inline mb-2">
						<li class="list-inline-item"><a href="http://www.meinsurancereview.com/">About</a></li>
						<li class="list-inline-item">&sdot;</li>
						<li class="list-inline-item"><a href="http://www.meinsurancereview.com/About-Us/Contact-Us">Contact</a></li>
					</ul>
					<p class="text-muted small mb-4 mb-lg-0">&copy; Asia Insurance Review 2018.
						All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 text-center text-lg-right my-auto">
					<ul class="list-inline mb-0">
						<li class="list-inline-item mr-3"><a href="https://www.facebook.com/asiainsurancereview/"> <i
								class="fab fa-facebook fa-2x fa-fw"></i>
						</a></li>
						<li class="list-inline-item mr-3"><a href="https://twitter.com/AIReDaily?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"> <i
								class="fab fa-twitter-square fa-2x fa-fw"></i>
						</a></li>
						<li class="list-inline-item"><a href="#"> <i
								class="fab fa-instagram fa-2x fa-fw"></i>
						</a></li>
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
