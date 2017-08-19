<?php
// Include PHPExcel library and create its object

require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

// Load an existing spreadsheet template

$phpExcel = PHPExcel_IOFactory::load('RFS2016.xlsx');

// Get the first sheet

$sheet = $phpExcel ->getActiveSheet();

// Edit Cells for Individual

//Rack
$col = 1;
$value = 45;

while($col != 4){
    $row = 8;
    while($row != 10){
        $sheet -> setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Corporate
while($col != 7) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}


//Corporate Others
while($col != 10) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Packages/Promo
while($col != 13) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Wholesale Online
while($col != 16) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Wholesale Offline
while($col != 19) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Individual Others
while($col != 22) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Industry Rate
while($col != 25) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Edit Cells for Group
$col = 26;
$value = 60;

//Corporate Meetings
while($col != 28) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Convention/Association
while($col != 32) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Gov't/NGOs
while($col != 35) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Group Tours
while($col != 38) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//Group Others
while($col != 41) {
    $row = 8;
    while ($row != 10) {
        $sheet->setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}





// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('Results2016.xlsx');