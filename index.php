<?php
include_once "databaseFunctions.php";
include_once "Modal/importFile_modal.php";
// include_once "Modal/add_attendee_modal.php";
include_once "Functions/tableInformation.php";

$get_table_infor_query = "SELECT * FROM all_table";
$get_table_infor_result = mysqli_query($dblink, $get_table_infor_query);
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
                <a data-toggle="modal" data-target="#addAttendeeModal" class="btn btn-primary" href="#" >Add New Attendee</a> 
                <a data-toggle="modal" data-target="#importModal" class="btn btn-primary" href="#" >Import</a>
                <a data-toggle="modal" data-target="#layoutModal" class="btn btn-primary" href="#" >Table Layout</a>
                <a data-toggle="modal" data-target="#listModal" class="btn btn-primary" href="#" >Table List</a>
                <a class="btn btn-primary" href="overview.php" >Overview</a>
                <!--<form method="post" action="Functions/doViewOverview.php"><input type="submit" value="Test"></form>-->
            </div>
        </nav>

        <!-- Masthead -->
        <header class="masthead text-white text-center">
            <div class="overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-lg-8 col-xl-7" style="border-right-width: 1000px;margin-right: 0px;right: 10px;">
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

        <!--Table List modal-->
        <div class="modal fade" id="listModal" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold head2">5th Middle East Insurance Industry Awards 2018</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="col"></div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class ="col-md-12 col-lg-12 col-xl-12 mx-auto">
                                    <div class="form-row" id="table-scroll">
                                        <table class="table table-striped table-bordered col-md-12" cellspacing="0" width="100%" style="align-content: center;">
                                            <thead>
                                                <tr>
                                                    <th>Table No.</th>
                                                    <th>Inviter</th>
                                                    <th>Seating Arrangement</th>
                                                    <th>Seat Count</th>
                                                    <th>Available Seats</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($row = mysqli_fetch_assoc($get_table_infor_result)) {
                                                    // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                                                    echo '<tr>
                                            <td>' . $row['table_no'] . '</td>
                                            <td>' . $row['table_name'] . '</td>
                                            <td>' . $row['seating_arrangement'] . '</td>
                                            <td>' . $row['total_seats'] . '</td>
                                            <td>' . $row['available_seats'] . '</td>
                                                        </tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Table Layout modal-->
        <div class="modal fade" id="layoutModal" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold head2">Floor Plan</h4>
                        <button type="button" class="close" data-dismiss="modal"
                                aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="col"></div>
                            <div class="col-sm-12">
                                <div class ="col-md-12 col-lg-12 col-xl-12 mx-auto">
                                    <img id="floorplan" src="img/floorplan.jpg" alt="Floor Plan" style="width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Add Attendee modal-->
        <div class="modal fade" id="addAttendeeModal" tabindex="-1"
             role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form data-toggle="validator" name="f1"
                          enctype="multipart/form-data" method="post"
                          action="Functions/doAddAttendee.php" class="form-horizontal"
                          role="form" onSubmit="window.location.reload();">
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
                                                <label for="name">Guest Name</label><label
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
                                                <input class="form-control" name="attendee_country"
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
                                                <input class="form-control" name="attendee_company"
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
                                                    <?php getInvitor(); ?>
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
