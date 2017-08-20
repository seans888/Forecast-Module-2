<?php
/**
 * PHPExcel
 *
 * Copyright (c) 2006 - 2015 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2015 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    ##VERSION##, ##DATE##
 */

require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

$phpExcel = new PHPExcel;

// Setting font to Arial Black

$phpExcel->getDefaultStyle()->getFont()->setName('Arial Black');

// Setting font size to 14

$phpExcel->getDefaultStyle()->getFont()->setSize(14);

//Setting description, creator and title

$phpExcel ->getProperties()->setTitle("Vendor list");

$phpExcel ->getProperties()->setCreator("Robert");

$phpExcel ->getProperties()->setDescription("Excel SpreadSheet in PHP");

// Creating PHPExcel spreadsheet writer object

// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// When creating the writer object, the first sheet is also created

// We will get the already created sheet

$sheet = $phpExcel ->getActiveSheet();

// Setting title of the sheet

$sheet->setTitle('My product list');

// Creating spreadsheet header

$sheet ->getCell('A1')->setValue('Vendor');

$sheet ->getCell('B1')->setValue('Amount');

$sheet ->getCell('C1')->setValue('Cost');

// Making headers text bold and larger

$sheet->getStyle('A1:D1')->getFont()->setBold(true)->setSize(14);

// Insert product data


//Set Column/Width Value

$sheet->getColumnDimension('A')->setWidth(65);

$sheet->getRowDimension(1)->setRowHeight(65);

// Autosize the columns

$sheet->getColumnDimension('B')->setAutoSize(true);

$sheet->getColumnDimension('C')->setAutoSize(true);

// Save the spreadsheet

$writer->save('products.xlsx');