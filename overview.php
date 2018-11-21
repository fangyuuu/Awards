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
 
                <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<!--        <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="js/bootstrap-datepicker.min.js"></script>-->
        <link rel='stylesheet' href='css/jquery.dataTables.min.css' />
        <link rel='stylesheet' href='css/dataTables.bootstrap.min.css' />
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <!--<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">-->
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="btn btn-success pull-right" href="index.php">Back to main page</a>
            </div>
        </nav>

        <!-- Masthead -->
        <header class="text-center">
            <div class="overlay"></div>
            </br>
            <div class="container">
                <div class="row">
                    <div class="mx-auto">
                        <h4 class="head2">Overview</h4>
                        <br>
                        <div class="form-row " id="table-scroll">
                            <table id="datatable_overview" class="table table-striped table-bordered col-lg-12" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Table No.</th>
                                        <th>Invitor</th>
                                        <th>Guest Name</th>
                                        <th>Guest Company</th>
                                        <th>Guest Country</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        </br>

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
                        <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
                <!-- Page level plugin JavaScript-->
                <script src="vendor/datatables/jquery.dataTables.js"></script>
                <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin.min.js"></script>
                <!-- Custom scripts for this page-->
                <script src="js/sb-admin-datatables.min.js"></script>
        <script>
            /* -------------------- START OF UNARCHIVE ISSUES ----------------------------*/
            $(document).ready(function () {
                // ALL ISSUES TAB
                var Overview = $('#datatable_overview').DataTable({
                    "ajax": {
                        "url": "Functions/doViewOverview.php",
                        "type": "POST",
                        "dataSrc": "data"
                    },
                    "bPaginate": true,
                    "bProcessing": true,
                    "createdRow": function (row, data, index) {
                        $('td', row).eq(10).attr('id', data["table_no"]);
                    },
                    "columns": [
                        {"data": "table_no"},
                        {"data": "invitor"},
                        {"data": "name"},
                        {"data": "company"},
                        {"data": "country"},
                        {
                            sortable: false,
                            // full is the data (each record)
                            // render is for customising the column; it can be in any form like buttons, dropdown list, etc
                            "render": function (data, type, full, meta) {
                                return "<form id=\"removeForm\" method=\"post\" action=\"Functions/doRemoveAttendee.php\"><input class=\"hidden\" type=\"hidden\" value=" + full["attendee_id"] + " id=\"attendeeID\" name=\"attendeeID\"><input name=\"removeAttendee\" id=\"removeAttendee\" type=\"submit\" class=\"btn btn-danger btn-sm del-user-btn\" value=\"Remove\"></form>";
                            }
                        }
                    ],
                    "order": [[1, 'asc']]
                });
                setInterval(function () {
                    Overview.ajax.reload(null, false);
                }, 300000);

                //Footer for all issues tab
                $("#datatable_unarchive_issues tfoot input").on('keyup change', function () {
                    Overview
                            .column($(this).parent().index() + ':visible')
                            .search(this.value)
                            .draw();
                });
            });
        </script>
    </body>

</html>
