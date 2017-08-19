//redirect to controller when tab is pressed


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">cfgnfghdh</h1>
        </div>


        <div class="col-lg-12">

            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <?php $tab = (isset($_GET['tab'])) ? $_GET['tab'] : null; ?>
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="<?php echo ($tab == 'tab1') ? 'active' : ''; ?>"><a href="<?php echo site_url('hoteldetails/showHotel/13?tab=tab1'); ?>" data-toggle="tab">Import File</a>
                    </li>
                    <li class="<?php echo ($tab == 'tab2') ? 'active' : ''; ?>"><a href="<?php echo site_url('hoteldetails/showHotel/13?tab=tab2'); ?>" data-toggle="tab">Files</a>
                    </li>
                    <li><a href="#messages" data-toggle="tab">N/A</a>
                    </li>
                    <li><a href="#settings" data-toggle="tab">N/A</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="tabs1-pane1">
                        dfdfgdfgd
                    </div>
                    <div class="tab-pane <?php echo ($tab == 'tab2') ? 'active' : ''; ?>" id="tabs1-pane2">
                            dgdfg
                    </div>
                    <div class="tab-pane fade" id="messages">
                        </div>
                    <div class="tab-pane fade" id="settings">
                        </div>
                </div>
            </div>
            <!-- /.panel-body -->
            <!--Flash messages-->
            <?php if($this->session->flashdata('file_upload')):?>
                <?php echo '<p class="alert alert-success">'.$this->session->flashdata('file_upload').'</p>';?>
            <?php endif;?>
            <?php if($this->session->flashdata('file_no_upload')):?>
                <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('file_no_upload').'</p>';?>
            <?php endif;?>
            <!-- /.panel -->
        </div>


    </div>
</div>
