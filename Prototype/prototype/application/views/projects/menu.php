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
                        <li class="active"><a href="#import" data-toggle="tab">Upload File</a>
                        </li>
                        <li><a href="#files" data-toggle="tab">Files</a>
                        </li>
                        <li><a href="#insert" data-toggle="tab">Insert to DB</a>
                        </li>
                        <li><a href="#settings" data-toggle="tab">N/A</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="import">
                            <h4>Upload File</h4>
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
                                        <?php echo form_open('/files/delete/'.$file['id']);?>
                                        <?php echo $file['file_name'];?>
                                        <input type="submit" value="Delete" class="btn btn-danger pull-right">
                                        </form>
                                    </li>
                                <?php endforeach;?>
                            </ul></p>
                        </div>
                        <div class="tab-pane fade" id="insert">
                            <h4><?=$title2?></h4>
                            <p>
                                <?php echo form_open('files/insert');?>
                            <div class="form-group">
                                <label>Month</label>
                                <select name="month" class="form-control">
                                    <option value="JAN">January</option>
                                    <option value="FEB">February</option>
                                    <option value="MAR">March</option>
                                    <option value="APR">April</option>
                                    <option value="MAY">May</option>
                                    <option value="JUN">June</option>
                                    <option value="JUL">July</option>
                                    <option value="AUG">August</option>
                                    <option value="SEPT">September</option>
                                    <option value="OCT">October</option>
                                    <option value="NOV">November</option>
                                    <option value="DEC">December</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Year</label>
                                <input type="number" class="form-control" name="year" value="2015" min="1997" max="2050">
                            </div>
                            <div class="form_group">
                                <label>File to use</label>
                                <select name="file_name" class="form-control">
                                    <?php foreach($files as $file):?>
                                        <option value="<?php echo $file['file_name'];?>"><?php echo $file['file_name'];?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                            </p>
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
                <?php echo '<div class="alert alert-success">'.$this->session->flashdata('file_upload').'</div>';?>
            <?php endif;?>
            <?php if($this->session->flashdata('file_no_upload')):?>
                <?php echo '<div class="alert alert-danger">'.$this->session->flashdata('file_no_upload').'</div>';?>
            <?php endif;?>
            <!-- /.panel -->
        </div>


    </div>
</div>
