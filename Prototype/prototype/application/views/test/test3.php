//list directory
<?php

echo "<pre>";
echo print_r($files);
echo "</pre>";
?>
<div class="form_group">
    <label>File to use</label>
    <select name="file_name" class="form-control">
        <?php foreach($files as $file):?>
            <option value="<?php echo $file;?>"><?php echo $file;?></option>
        <?php endforeach;?>
    </select>
</div>
<br>
<button type="submit" class="btn btn-default">Submit</button>
<ul class="list-group">
    <?php foreach($files as $file):?>
        <li class="list-group-item">
            <?php echo form_open('/files/del_dir/'.$file);?>
            <?php echo $file;?>
            <input type="submit" value="Delete" class="btn btn-danger pull-right">
            </form>
        </li>
    <?php endforeach;?>
</ul>