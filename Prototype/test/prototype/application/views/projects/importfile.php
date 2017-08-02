<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Hello, This is where you will import</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h2>Import Here</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
            echo form_open_multipart('import/import-data');
            echo form_upload('file');
            echo '<br/>';
            echo form_submit(null,'Upload');
            echo form_close();
            ?>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <?php

        require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
        $tmpfname=FCPATH."upload/sample.xlsx";
        $excelReader=PHPExcel_IOFactory::createReaderForFile($tmpfname);
        $excelObj=$excelReader->load($tmpfname);
        $worksheet=$excelObj->getActiveSheet();
        $lastRow=$worksheet->getHighestRow();

        echo "<table>";
        for ($row=1;$row<= $lastRow;$row++){
            echo "<tr><td>";
            echo $worksheet->getCell('A'.$row)->getValue();
            echo "</td><td>";
            echo $worksheet->getCell('B'.$row)->getValue();
            echo "</td><td>";
            echo $worksheet->getCell('C'.$row)->getValue();
            echo "</td><tr>";
        }
        echo "</table>";
        ?>
    </div>
</div>
</div>