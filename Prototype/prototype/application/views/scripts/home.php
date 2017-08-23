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
<script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo base_url();?>assets/vendor/raphael/raphael.min.js"></script>
<script src="<?php echo base_url();?>assets/vendor/morrisjs/morris.min.js"></script>
<script src="<?php echo base_url();?>assets/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>