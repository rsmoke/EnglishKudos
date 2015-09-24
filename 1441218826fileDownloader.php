<?php
  session_start();
  require_once $_SERVER["DOCUMENT_ROOT"] . '/../Support/configEnglishKudos.php';
  require_once($_SERVER["DOCUMENT_ROOT"] . "/../Support/basicLib.php");


// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="EnglishKudos.csv"');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('RecordID', 'Uniqname', 'First Name', 'Last Name', 'Title', 'Type of Kudo', 'Edited By', 'Deleted'));

if ($login_name === "janej" || $login_name === "janesull" || $login_name === "rsmoke" || $login_name === "dporter") {
            $sqlSelect = <<<SQL
                SELECT
                    id,
                    uniqname,
                    userFname,
                    userLname,
                    kudoTitle,
                    kudoDesc,
                    kudoType,
                    edited,
                    selectedDelete
                FROM  tbl_kudos
                ORDER BY userLname ASC
SQL;

}
if (!$result = $db->query($sqlSelect)) {
            db_fatal_error("data select issue", $db->error);
            exit;
}

// loop over the rows, outputting them
while ($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
}
