<?php

header("Cache-Control: no-cache");

include_once "../databaseFunctions.php";

$get_overview_query = "SELECT a.attendee_id, a.name, a.table_id, a.company, a.country, att.table_name FROM attendees a INNER JOIN all_table att ON att.table_no = a.table_id GROUP BY a.attendee_id";
$get_overview_result = mysqli_query($dblink, $get_overview_query);

$AllList = array();
$AI = array();

while ($get_overview_row = mysqli_fetch_array($get_overview_result)) {

    $AI['attendee_id'] = $get_overview_row['attendee_id'];
    $AI['name'] = $get_overview_row['name'];
    $AI['company'] = $get_overview_row['company'];
    $AI['table_no'] = $get_overview_row['table_id'];
    $AI['country'] = $get_overview_row['country'];
    $AI['invitor'] = $get_overview_row['table_name'];
    $AllList[] = $AI;
}

$json_data = array(
    "data" => $AllList
);

echo json_encode($json_data);  // convert into json format
