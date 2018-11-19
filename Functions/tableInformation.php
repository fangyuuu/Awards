<?php

function getCompany() {
    
    
    global $dblink;
    
    $get_company_name_query = "SELECT company FROM attendees GROUP BY company";
    $get_company_name_result = mysqli_query($dblink, $get_company_name_query);
    while ($get_company_name_row = mysqli_fetch_assoc($get_company_name_result)) {
        echo '<option value="' . $get_company_name_row['company'] . '">' . $get_company_name_row['company'] . '</option>';
    }
}

function getInvitor() {
    
    
    global $dblink;
    
    $get_country_name_query = "SELECT table_name FROM all_table GROUP BY table_name";
    $get_country_name_result = mysqli_query($dblink, $get_country_name_query);
    while ($get_country_name_row = mysqli_fetch_assoc($get_country_name_result)) {
        echo '<option value="' . $get_country_name_row['table_name'] . '">' . $get_country_name_row['table_name'] . '</option>';
    }
}

function getTable() {
    
    
    global $dblink;
    
    $get_table_name_query = "SELECT * FROM all_table WHERE available_seats > 0;";
    $get_table_name_result = mysqli_query($dblink, $get_table_name_query);
    while ($get_table_name_row = mysqli_fetch_assoc($get_table_name_result)) {
        echo '<option value="' . $get_table_name_row['table_no'] . '"> Table ' . $get_table_name_row['table_no'] . ' - ' . $get_table_name_row['table_name'] . ' Availability: ' . $get_table_name_row['available_seats'] . '</option>';
    }
}

?>