
<!--Add Attendee modal-->
<div class="modal fade" id="addAttendeeModal" tabindex="-1"
	role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form data-toggle="validator" name="f1" enctype="multipart/form-data"
				method="post" action="../Functions/doAddAttendee.php"
				class="form-horizontal" role="form">
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
										<label for="client_ticket_id">Name</label><label
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
										<label for="country">Country</label><label id="mandatory">*</label>
									</div>
									<div class="col-sm-9 col-md-9 col-lg-9">
										<select class="form-control" name="country" id="country"
											required>
											<option value="">Select Country</option>
											<?php echo "hi";?>
										</select>
									</div>
								</div>
								</br>
								<div class="form-row">
									<div class="col-sm-3 col-md-3 col-lg-3 control-label">
										<label for="company">Company</label><label
											id="mandatory">*</label>
									</div>
									<div class="col-sm-9 col-md-9 col-lg-9">
										<select class="form-control" name="company" id="company"
											required>
											<option value="">Select Company</option>
										</select>
									</div>
								</div>
								</br>
								<div class="form-row">
									<div class="col-sm-3 col-md-3 col-lg-3 control-label">
										<label for="table_no">Table No.</label><label
											id="mandatory">*</label>
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
											id="addbtn" class="form-control btn btn-success"
											value="Add">
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




<script>
    function disableselect()
    {
        <?php
        if (isset($cat) and strlen($cat) > 0) {
            echo "document.f1.subcat.disabled = false;";
        } else {
            echo "document.f1.subcat.disabled = true;";
        }
        ?>
    }
    
    //Get Module
    $(document).ready(function () {
        $("#projectName").change(function () {
            var projectName = $(this).val();
            console.log("Project Selected: " + projectName);
            if (projectName != "") {
                $.ajax({
                    url: "../Functions/get-module.php",
                    data: {p_id: projectName},
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#module").html(resp);
                    }
                });
            } else {
                $("#module").html("<option value=''>Select Module</option>");
            }
        });
    });
    
    //Get Category
    $(document).ready(function () {
        $("#projectName").change(function () {
            var projectName = $(this).val();
            console.log("Project Selected: " + projectName);
            if (projectName != "") {
                $.ajax({
                    url: "../Functions/get-category.php",
                    data: {p_id: projectName},
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#category").html(resp);
                    }
                });
            } else {
                $("#category").html("<option value=''>Select Category</option>");
            }
        });
    });
    
    //Get Country/Environment
    $(document).ready(function () {
        $("#projectName").change(function () {
            var projectName = $(this).val();
            console.log("Project Selected: " + projectName);
            if (projectName != "") {
                $.ajax({
                    url: "../Functions/get-country.php",
                    data: {p_id: projectName},
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#country").html(resp);
                    }
                });
            } else {
                $("#country").html("<option value=''>Select Country</option>");
            }
        });
    });
    
    //Get Priority
    $(document).ready(function () {
        $("#projectName").change(function () {
            var projectName = $(this).val();
            console.log("Project Selected: " + projectName);
            if (projectName != "") {
                $.ajax({
                    url: "../Functions/get-priority.php",
                    data: {p_id: projectName},
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#priority").html(resp);
                    }
                });
            } else {
                $("#priority").html("<option value=''>Select Priority</option>");
            }
        });
    });
    
    //Get Team
    $(document).ready(function () {
        $("#projectName").change(function () {
            var projectName = $(this).val();
            console.log("Project Selected: " + projectName);
            if (projectName != "") {
                $.ajax({
                    url: "../Functions/get-team.php",
                    data: {p_id: projectName},
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#actionby").html(resp);
                    }
                });
            } else {
                $("#actionby").html("<option value=''>Select Team</option>");
            }
        });
    });
    
    //Get Person
   $(document).ready(function () {
       $("#actionby").change(function () {
           var teamName = $("#actionby").val();
           console.log("Team Selected: " + teamName);
           if (teamName != "") {
               $.ajax({
                   url: "../Functions/get-person.php",
                   data: {t_id: teamName},
                   type: 'POST',
                   success: function (response) {
                       var resp = $.trim(response);
                       $("#assigned_person").html(resp);
                   }
               });
           } else {
               $("#assigned_person").html("<option value=''>Select Person</option>");
           }
       });
   });
    
    //Get Status
    $(document).ready(function () {
        $("#projectName").change(function () {
            var projectName = $(this).val();
            console.log("Project Selected: " + projectName);
            if (projectName != "") {
                $.ajax({
                    url: "../Functions/get-status.php",
                    data: {p_id: projectName},
                    type: 'POST',
                    success: function (response) {
                        var resp = $.trim(response);
                        $("#status").html(resp);
                    }
                });
            } else {
                $("#status").html("<option value=''>Select Status</option>");
            }
        });
    });
    

</script>

<!-- Add attendee modal end-->

