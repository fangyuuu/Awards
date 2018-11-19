<?php

include_once "../databaseFunctions.php";

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;

require_once '../spout/spout-2.4.3/src/Spout/Autoloader/autoload.php';
header('Content-Type: text/html; charset=UTF-8');

$remove_current_query = "DELETE FROM attendees";
$remove_current_result = mysqli_query($dblink, $remove_current_query);
$reset_query = "ALTER TABLE attendees AUTO_INCREMENT = 1";
$reset_result = mysqli_query($dblink, $reset_query);

$remove_current_atten_query = "DELETE FROM attendees_table";
$remove_current_atten_result= mysqli_query($dblink, $remove_current_atten_query);
$reset_current_atten_query = "ALTER TABLE attendees_table AUTO_INCREMENT = 1";
$reset_current_atten_result = mysqli_query($dblink, $reset_current_atten_query);

if (isset($_POST['import']) && !empty($_POST['import'])) {
    $ok = false;
     
    if (!empty($_FILES["IssuesToUpload"]["name"])) {
        $FileType = pathinfo($_FILES["IssuesToUpload"]["name"]);
        //check file has extension xlsx, xls
        //and file not empty
        if (($FileType['extension'] == 'xlsx' || $FileType['extension'] == 'xls') && $_FILES["IssuesToUpload"]["size"] > 0) {

            //temp file name
            $tempFile = $_FILES['IssuesToUpload']['tmp_name'];

            $reader = ReaderFactory::create(Type::XLSX);

            $reader->open($tempFile);
//            $count = 0;
           
            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $rowNumber => $row) {
                    if ($rowNumber > 1) {
                        //start import from 2nd row cus first row is headear.
                        $country = trim($row[0]);
                        $company = trim($row[1]);
                        $attendee = trim($row[2]);
                        $table_no = trim($row[3]);
                        
                        $ok = true;
                    }
                    if ($ok) {
                        
                        $insert_query = "INSERT INTO attendees SET country = '" . mysqli_real_escape_string($dblink, $country) . "', "
                                . "company = '" . mysqli_real_escape_string($dblink,$company) . "', name = '" . mysqli_real_escape_string($dblink, $attendee) . "', table_id = '" . mysqli_real_escape_string($dblink, $table_no) . "', attendance = 0";
//                         echo $insert_query;
                        $insert_result = mysqli_query($dblink, $insert_query);
//                            echo $insert_issues_query;
                        $getIssueNewestId = mysqli_insert_id($dblink);
//                         echo $getIssueNewestId;

                        $test = "INSERT INTO attendees_table(attendee_id, table_no)"
                                . "VALUES($getIssueNewestId, $table_no)";
//                         echo $test;
                        $insert_AD_result = mysqli_query($dblink, $test);
                    }
                    
                    //after successful insert, count availability
                    $count_current_occupancy_query = "SELECT COUNT(attendee_id) as current_occupy, table_no FROM attendees_table GROUP BY table_no";
                    $count_current_occupancy_result = mysqli_query($dblink, $count_current_occupancy_query);
                    if (mysqli_num_rows($count_current_occupancy_result) > 0) { // if one or more rows are returned do following
                        while ($count_current_occupancy_row = mysqli_fetch_array($count_current_occupancy_result)) {
                            $current_occupancy = $count_current_occupancy_row['current_occupy'];
                            $table_occupied = $count_current_occupancy_row['table_no'];
                            echo "Current Occupancy: ", $current_occupancy;
                            echo "Current Table: ", $table_occupied;
                            //get total seats that is initially available 
                            $get_initial_seats_query = "SELECT table_no, total_seats FROM all_table";
                            $get_initial_seats_result = mysqli_query($dblink, $get_initial_seats_query);
                            if (mysqli_num_rows($get_initial_seats_result) > 0) { // if one or more rows are returned do following
                                while ($get_initial_seats_row = mysqli_fetch_array($get_initial_seats_result)) {
                                    $initial_table = $get_initial_seats_row['table_no'];
                                    $initial_seats = $get_initial_seats_row['total_seats'];
                                    echo "Initial Table Seats: ", $initial_seats;
                                    echo "Initial Table No: ", $initial_table;
                                    //get balance seats
                                    $balance_seats = $initial_seats - $current_occupancy;
                                    
                                    //insert the balance to available seats
                                    $insert_balance_query =  "UPDATE all_table SET available_seats = $balance_seats WHERE table_no = $initial_table ";
                                    $insert_balance_result = mysqli_query($dblink, $insert_balance_query);
                                    echo $insert_balance_query;
                                }
                            }
                        }
                    }
//                    echo ("<script language='JavaScript'>
//    window.alert('File was successfully imported!')
//    window.location.href='../index.php';
//    </script>");
                }
            }
            $reader->close();
        } else {
//                header("Location: ../BA/all_issues.php");
            echo ("<script language='JavaScript'>
    window.alert('Invalid file uploaded. Please use the template provided to import.')
    window.location.href='../index.php';
    </script>");
        }
    } else {
//            header("Location: ../BA/all_issues.php");
        echo ("<script language='JavaScript'>
    window.alert('Please select an excel file!')
    window.location.href='../index.php';
    </script>");
    }
}
?>

