<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title0?></h1>
        </div>


        <div class="col-lg-12">

                <!-- /.panel-heading -->
                <div class="panel-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#import" data-toggle="tab">Import File</a>
                        </li>
                        <li><a href="#files" data-toggle="tab">Files</a>
                        </li>
                        <li><a href="#messages" data-toggle="tab">N/A</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">N/A</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="import">
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
                        <div class="tab-pane fade" id="files">
                            <h4><?=$title1?></h4>
                            <p><ul class="list-group">
                                <?php foreach($files as $file):?>
                                    <li class="list-group-item">
                                        <a href="<?php echo site_url('/files/manipulate/'.$file['id']);?>">
                                            <?php echo $file['file_name'];?></a>
                                    </li>
                                <?php endforeach;?>
                            </ul></p>
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
