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
$remove_current_atten_result = mysqli_query($dblink, $remove_current_atten_query);
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

            foreach ($reader->getSheetIterator() as $sheet) {
                foreach ($sheet->getRowIterator() as $rowNumber => $row) {
                    if ($rowNumber > 1) {
                        //start import from 2nd row cus first row is headear.
                        $country = trim($row[0]);
                        $company = trim($row[1]);
                        $attendee = trim($row[2]);
                        $table_no = trim($row[3]);


                        $insert_query = "INSERT INTO attendees SET country = '" . mysqli_real_escape_string($dblink, $country) . "', "
                                . "company = '" . mysqli_real_escape_string($dblink, $company) . "', name = '" . mysqli_real_escape_string($dblink, $attendee) . "', "
                                . "table_id = '" . mysqli_real_escape_string($dblink, $table_no) . "', attendance = 0";

                        $insert_result = mysqli_query($dblink, $insert_query);

                        $getIssueNewestId = mysqli_insert_id($dblink);

                        $test = "INSERT INTO attendees_table(attendee_id, table_no)"
                                . "VALUES($getIssueNewestId, $table_no)";

                        $insert_AD_result = mysqli_query($dblink, $test);

                    }
                }
            }
            $reader->close();
//          get available seats that is initially available
            $get_available_seats_query = "SELECT att.table_no,
                                                    att.available_seats,
                                                    COUNT(a.attendee_id),
                                                    att.total_seats,
                                                    (att.total_seats - COUNT(a.attendee_id)) AS available
                                                    FROM  all_table att
                                                    LEFT JOIN attendees a ON att.table_no = a.table_id
                                                    GROUP BY att.table_no";
            $get_available_seats_result = mysqli_query($dblink, $get_available_seats_query);
            if (mysqli_num_rows($get_available_seats_result) > 0) { // if one or more rows are returned do following
                while ($get_available_seats_row = mysqli_fetch_array($get_available_seats_result)) {
                    $table_no = $get_available_seats_row['table_no'];
                    $available_seats = $get_available_seats_row['available'];
                    //update the balance to available seats
                    $update_balance_query = "UPDATE all_table SET available_seats = $available_seats WHERE table_no = $table_no ";
                    $update_balance_result = mysqli_query($dblink, $update_balance_query);
                    echo $update_balance_query;
                }
            }
            echo ("<script language='JavaScript'>
                        window.alert('File was successfully imported!')
                        window.location.href='../index.php';
                        </script>");
        } else {
            echo ("<script language='JavaScript'>
    window.alert('Invalid file uploaded. Please use the template provided to import.')
    window.location.href='../index.php';
    </script>");
        }
    } else {
        echo ("<script language='JavaScript'>
    window.alert('Please select an excel file!')
    window.location.href='../index.php';
    </script>");
    }
}
?>

