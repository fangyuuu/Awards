<?php
header("Cache-Control: no-cache"); 

include_once "../databaseFunctions.php";

if (isset($_POST['add_attendee_submit'])) {

    $getName = mysqli_real_escape_string($dblink, $_POST['attendee_name']);
    $getCountry = mysqli_real_escape_string($dblink,$_POST['attendee_country']);
    $getCompany= mysqli_real_escape_string($dblink,$_POST['attendee_company']);
    $getTable = mysqli_real_escape_string($dblink,$_POST['table_no']);
    $attended = 1;
    
    $insert_new_attendee_query = $dblink->prepare("INSERT INTO attendees(name, country, company, "
            . "table_id, attendance) "
            . "VALUES(?,?,?,?,?)");

    $insert_new_attendee_query->bind_param("sssii", $getName, $getCountry, $getCompany, 
            $getTable, $attended);
    
    $insert_new_attendee_query->execute();
    $getIssueNewestId = mysqli_insert_id($dblink);
    $insert_new_attendee_query->close();
    
    //reduce available seat for that table
    $update_availability_query = "UPDATE all_table SET available_seats = available_seats - 1 WHERE table_no = $getTable";
    $update_availability_result = mysqli_query($dblink, $update_availability_query);
        echo ("<script language='JavaScript'>
    window.alert('Attendee added successfully!')
    window.location.href='../index.php';
    </script>");
    
} else {
    echo ("<script language='JavaScript'>
        window.alert('An error occurred, unsuccessful add!')
        window.location.href='../index.php';
        </script>");
}
?>