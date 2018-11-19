<?php
header("Cache-Control: no-cache");
include_once '../dbFunctions.php';

if (isset($_POST['c_id'])) {
    
    $sql = "SELECT att.table_id, att.table_name, att.available_seats FROM all_table att, attendees a 
WHERE att.table_no = a.table_id AND att.available_seats > 0 AND att.table_name = 
'" . mysqli_real_escape_string($dblink, $_POST['c_id']) . "' GROUP BY att.table_id" ;
    
    $result = mysqli_query($dblink, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        echo "<option value=''>Select Table</option>";
        while ($row = mysqli_fetch_object($result)) {
            echo "<option value='" . $row->table_id . "'>" . $row->table_name . "</option>";
        }
    } else {
        ?><script>console.log("No query result.");</script><?php
    }
} else {
    ?><script>console.log('Get-module query fail');</script><?php
    header('location: ./');
}
?>