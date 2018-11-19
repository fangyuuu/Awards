<?php
include_once "databaseFunctions.php";
include_once "Modal/importFile_modal.php";
// include_once "Modal/add_attendee_modal.php";
include_once "Functions/tableInformation.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Asia Insurance Review Awards 2018</title>

<!-- Bootstrap core CSS -->
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="vendor/simple-line-icons/css/simple-line-icons.css"
	rel="stylesheet" type="text/css">
<link
	href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic"
	rel="stylesheet" type="text/css">

<!-- Custom styles for this template -->
<link href="css/landing-page.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-light bg-light static-top">
		<div class="container">
			<a class="navbar-brand" href="#">Asia Insurance Review 2018</a> <a
				data-toggle="modal" data-target="#addAttendeeModal"
				class="btn btn-primary" href="#">Add New Attendee</a> <input
				data-toggle="modal" data-target="#importModal"
				class="btn btn-primary" href="#" value="Import">
		</div>
	</nav>

	<!-- Masthead -->
	<header class="masthead text-white text-center">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-xl-9 mx-auto">
					<h1 class="mb-5">Welcome to the Middle East Industry Awards Night!</h1>
				</div>
				<div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
					<form action="search.php" method="GET">
						<div class="form-row">
							<div class="col-12 col-md-9 mb-2 mb-md-0">
								<input type="text" name="search"
									class="form-control form-control-lg"
									placeholder="Please enter your name">
							</div>
							<div class="col-12 col-md-3">
								<button type="submit" class="btn btn-block btn-lg btn-primary">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</header>


	<!-- Footer -->
	<footer class="footer bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 h-100 text-center text-lg-left my-auto">
					<ul class="list-inline mb-2">
						<li class="list-inline-item"><a href="#">About</a></li>
						<li class="list-inline-item">&sdot;</li>
						<li class="list-inline-item"><a href="#">Contact</a></li>
						<li class="list-inline-item">&sdot;</li>
						<li class="list-inline-item"><a href="#">Terms of Use</a></li>
						<li class="list-inline-item">&sdot;</li>
						<li class="list-inline-item"><a href="#">Privacy Policy</a></li>
					</ul>
					<p class="text-muted small mb-4 mb-lg-0">&copy; Your Website 2018.
						All Rights Reserved.</p>
				</div>
				<div class="col-lg-6 h-100 text-center text-lg-right my-auto">
					<ul class="list-inline mb-0">
						<li class="list-inline-item mr-3"><a href="#"> <i
								class="fab fa-facebook fa-2x fa-fw"></i>
						</a></li>
						<li class="list-inline-item mr-3"><a href="#"> <i
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
	
	<!--Add Attendee modal-->
	<div class="modal fade" id="addAttendeeModal" tabindex="-1"
		role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<form data-toggle="validator" name="f1"
					enctype="multipart/form-data" method="post"
					action="../Functions/doAddAttendee.php" class="form-horizontal"
					role="form">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold head2">Add New
							Attendee</h4>
						<button type="button" class="close" data-dismiss="modal"
							aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="container-fluid">
							<div class="col"></div>
							<!--Create issue form-->
							<div class="col-sm-12">
								<div class="form-group">
									<div class="form-row">
										<div class="col-sm-3 col-md-3 col-lg-3 control-label">
											<label for="client_ticket_id">Guest Name</label><label
												id="mandatory">*</label>
										</div>
										<div class="col-sm-9 col-md-9 col-lg-9">
											<input class="form-control" name="attendee_name"
												id="attendee_name" data-error="Enter a name." type="text"
												aria-describedby="nameHelp" placeholder="Enter Name">
										</div>
									</div>
									</br>
									<div class="form-row">
										<div class="col-sm-3 col-md-3 col-lg-3 control-label">
											<label for="country">Guest Country</label><label id="mandatory">*</label>
										</div>
										<div class="col-sm-9 col-md-9 col-lg-9">
											<input class="form-control" name="attendee_name"
												id="country" data-error="Enter a name." type="text"
												aria-describedby="nameHelp" placeholder="Enter Country">
										</div>
									</div>
									</br>
									<div class="form-row">
										<div class="col-sm-3 col-md-3 col-lg-3 control-label">
											<label for="company">Guest Company</label><label id="mandatory">*</label>
										</div>
										<div class="col-sm-9 col-md-9 col-lg-9">
											<input class="form-control" name="company"
												id="company" data-error="Enter a company." type="text"
												aria-describedby="nameHelp" placeholder="Enter Company">
										</div>
									</div>
									</br>
									<div class="form-row">
										<div class="col-sm-3 col-md-3 col-lg-3 control-label">
											<label for="company">Guest of</label><label id="mandatory">*</label>
										</div>
										<div class="col-sm-9 col-md-9 col-lg-9">
											<select class="form-control" name="invitor" id="invitor"
												required>
												<option value="">Select Invitor</option>
												<?php getInvitor();?>
											</select>
										</div>
									</div>
									</br>
									<div class="form-row">
										<div class="col-sm-3 col-md-3 col-lg-3 control-label">
											<label for="table_no">Table No.</label><label id="mandatory">*</label>
										</div>
										<div class="col-sm-9 col-md-9 col-lg-9">
											<select class="form-control" name="table_no" id="table_no"
												required>
												<option value="">Select Table</option>
											</select>
										</div>
									</div>
									</br>
									<div class="form-group">
										<div class="col-md-3 col-lg-3 col-md-offset-9 pull-right">
											<input type="submit" name="add_attendee_submit" tabindex="4"
												id="addbtn" class="form-control btn btn-success" value="Add">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript -->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
<script>
//Get Table
$(document).ready(function () {
    $("#invitor").change(function () {
        var invitor = $(this).val();
        console.log("Invitor Selected: " + invitor);
        if (invitor != "") {
            $.ajax({
                url: "Functions/get-table.php",
                data: {c_id: invitor},
                type: 'POST',
                success: function (response) {
                    var resp = $.trim(response);
                    $("#table_no").html(resp);
                }
            });
        } else {
            $("#table_no").html("<option value=''>Select Table</option>");
        }
    });
});
</script>

</body>

</html>
