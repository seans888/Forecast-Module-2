//automatically change tab if triggered


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Revenue Project</h1>
        </div>


        <div class="col-lg-12">

            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <?php $tab = (isset($tab)) ? $tab : 'tab1'; ?>
                <ul class="nav nav-tabs" id="myTabs">
                    <li class="<?php echo ($tab == 'tab1') ? 'active' : ''; ?>" >
                        <a href="#tab_1_1" data-toggle="tab">Personal Info</a>
                    </li>
                    <li class="<?php echo ($tab == 'tab2') ? 'active' : ''; ?>" >
                        <a href="#tab_1_2" data-toggle="tab">Family Info</a>
                    </li>
                    <li class="<?php echo ($tab == 'tab3') ? 'active' : ''; ?>" >
                        <a href="#tab_1_3" data-toggle="tab">Upload Photo</a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="tab_1_1">
                        <h4>Import File</h4>
                        <p>
                            <?php echo form_open_multipart('projects/import-data');?>
                        <div class="form-group">
                            <?php echo form_upload('file');?>
                        </div>
                        <?php echo form_submit(null,'Upload'); ?>
                        <?php echo form_close();?>
                        </p>
                    </div>
                    <div class="tab-pane fade <?php echo ($tab == 'tab2') ? 'active' : ''; ?>" id="tab_1_2">
                        <h4>Files</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade <?php echo ($tab == 'tab3') ? 'active' : ''; ?>" id="messages">
                        <h4>Messages Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade <?php echo ($tab == 'tab1') ? 'active' : ''; ?>" id="settings">
                        <h4>Settings Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
