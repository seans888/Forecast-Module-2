<?php
// Include PHPExcel library and create its object

require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

// Load an existing spreadsheet template

$phpExcel = PHPExcel_IOFactory::load('RFS2016.xlsx');

// Get the first sheet

$sheet = $phpExcel ->getActiveSheet();

function insert_values($col,$column,$sheet){
    $value = 45; //replace with db query

    while($col != $column){
        $row = 8;
        while($row != 10){
            $sheet -> setCellValueByColumnAndRow($col, $row, $value);
            $row++;
        }
        $col++;
    }
}

// Edit Cells for Individual
$col = 1;
//Rack

insert_values($col,4,$sheet);

/*
while($col != 4){
    $row = 8;
    while($row != 10){
        $sheet -> setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/

//Corporate
insert_values($col,7,$sheet);
/*
while($col != 7) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/


//Corporate Others
insert_values($col,10,$sheet);
/*
while($col != 10) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Packages/Promo
insert_values($col,13,$sheet);
/*
while($col != 13) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Wholesale Online
insert_values($col,16,$sheet);
/*
while($col != 16) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Wholesale Offline
insert_values($col,19,$sheet);
/*
while($col != 19) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Individual Others
insert_values($col,22,$sheet);
/*
while($col != 22) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Industry Rate
insert_values($col,25,$sheet);
/*
while($col != 25) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Edit Cells for Group
$col = 26;
$value = 60;

//Corporate Meetings
insert_values($col,28,$sheet);
/*
while($col != 28) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Convention/
insert_values($col,32,$sheet);
/*
while($col != 32) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Gov't/NGOs
insert_values($col,35,$sheet);
/*
while($col != 35) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Group Tours
insert_values($col,38,$sheet);
/*
while($col != 38) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/
//Group Others
insert_values($col,41,$sheet);
/*
while($col != 41) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}
*/




// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('Results2017.xlsx');