<?php
header("Cache-Control: no-cache"); 

include_once "../databaseFunctions.php";

if (isset($_POST['removeAttendee'])) {

    $getAttendeeID = mysqli_real_escape_string($dblink, $_POST['attendeeID']);
    //get Table No of attendee
    $get_table_no_query = "SELECT table_id FROM attendees WHERE attendee_id = $getAttendeeID";
    $get_table_no_result = mysqli_query($dblink, $get_table_no_query);
    while ($row = mysqli_fetch_assoc($get_table_no_result)) {
        $table_no = $row['table_id'];
    //increase available seat for that table
    $update_availability_query = "UPDATE all_table SET available_seats = available_seats + 1 WHERE table_no IN (SELECT table_id FROM attendees WHERE attendee_id = $getAttendeeID)";
    $update_availability_result = mysqli_query($dblink, $update_availability_query);
    
    $update_table_id_query = "UPDATE attendees SET table_id = 0 WHERE attendee_id = $getAttendeeID";
    $update_table_id_result = mysqli_query($dblink, $update_table_id_query);
        echo ("<script language='JavaScript'>
    window.alert('Attendee has been removed from table successfully!')
    window.location.href='../index.php';
    </script>");
    }
} else {
    echo ("<script language='JavaScript'>
        window.alert('An error occurred, unsuccessful remove!')
        window.location.href='../index.php';
        </script>");
}
?>