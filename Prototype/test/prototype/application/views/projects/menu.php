<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Revenue Project <button type="button" class="btn btn-success disabled">Validated</button></h1>
        </div>


        <div class="col-lg-12">

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#import" data-toggle="tab">Import File</a>
                        </li>
                        <li><a href="#profile" data-toggle="tab">Profile</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">Messages</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">Settings</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="import">
                            <h4>Import File</h4>
                            <p><?php
                                echo form_open_multipart('import/import-data');
                                echo form_upload('file');
                                echo '<br/>';
                                echo form_submit(null,'Upload');
                                echo form_close();
                                ?></p>
                            </div>
                        <div class="tab-pane fade" id="profile">
                            <h4>Profile Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="messages">
                            <h4>Messages Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                        <div class="tab-pane fade" id="settings">
                            <h4>Settings Tab</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        </div>
                    </div>
                </div>
                <!-- /.panel-body -->

            <!-- /.panel -->
        </div>


    </div>
    <div class="row">
    <div class="col-lg-12">
<!--
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
-->
    </div>
</div>
</div>