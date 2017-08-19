<html>
<head>
    <title>Query Results</title>
</head>
<body>
<?php
//Connection details
$host="localhost";
$user='root';
$pass='';
$db="rfsa";
//Make a connection profile
$conn = new mysqli($host,$user,$pass,$db); //An instance of a new mysqli database connection

$table = $_POST['data-set'];
$desiredDataArray = $_POST['data-desired']; // either individual or group
$segmentArray = $_POST['segment-desired'];


$segmentMap=
    [
        "1" => "RCK",
        "2" => "CORP",
        "3" => "CORPO",
        "4" => "INDO",
        "5" => "INDR",
        "6" => "PKG/PRM",
        "7" => "QD",
        "8" => "WSOL",
        "9" => "WSOF",
        "10" => "CON/ASSOC",
        "11" => "CORPM",
        "12" => "GOV/NG0",
        "13" => "GRPO",
        "14" => "GRPT",
    ];
$desiredDataMap =
    [
        "1" => "budget_rns",
        "2" => "budget_arr",
        "3" => "budget_revenue",
        "4" => "actual_rns",
        "5" => "actual_arr",
        "6" => "actual_revenue"
    ];
$dayMap = [
    "JAN" => "31",
    "FEB" =>"28",
    "MAR" =>"31",
    "APR" =>"30",
    "MAY" =>"31",
    "JUN" =>"30",
    "JUL" =>"31",
    "AUG" =>"31",
    "SEPT" =>"30",
    "OCT" =>"31",
    "NOV" =>"30",
    "DEC" =>"31"
];

//Get the DATES
$startYear = $_POST['start-year'];
$startMonth= $_POST['start-month'];
$endYear = $_POST['end-year'];
$endMonth = $_POST['end-month'];

$startDate = $startYear ."-". $startMonth . "-" . $dayMap[$startMonth];
$endDate = $endYear ."-" . $endMonth ."-" . $dayMap[$endMonth];
//END dates

echo "<strong>You chose the following data: </strong>";
echo "<br/>";
foreach($desiredDataArray as $desiredData)
{
    echo $desiredDataMap[$desiredData];
    echo "<br/>";
}

echo "<strong>You chose the following segments: </strong>";
echo "<br/>";
foreach($segmentArray as $segment)
{
    echo $segmentMap[$segment];                     //lists all the segments
    echo "<br/>";
}

//echo "Data desired: " .  $desiredData[0];
echo "<strong>Table Desired: </strong>" . $table;
echo "<br/>";
echo "<strong>Time Period: </strong>" . $startDate . " to " . $endDate;
echo "<br/>";

$query = "select ".  ?>
?>

</body>
</html>