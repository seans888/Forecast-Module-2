<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Test Project</h1>
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
                        <li><a href="#builder" data-toggle="tab">Query Builder</a>
                        </li>
                        <li><a href="#forecast" data-toggle="tab">Forecast</a>
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
                                        <?php echo form_open('/files/del_dir/'.$file);?>
                                        <?php echo $file;?>
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
                                        <option value="<?php echo $file;?>"><?php echo $file;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-default">Submit</button>
                            </form>
                            </p>
                        </div>

                        <!-- FROM HERE JASON -->
                        <div class="tab-pane fade" id="builder">
                            <h4>Query Builder</h4>
                        <p>
                            <?php echo form_open('files/select');?>
                            <label>Choose Data Set</label>
                            <div class="form-group">
                                <label class="radio-inline">
                                    <input type="radio" name="data-set" value="room_actual">Actual Data
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="data-set" value="room_forecast">Forecast Data
                                </label>
                            </div>
                            <label>Select Desired Data</label>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="1">Budget - Room Nights Sold
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="2">Budget - Average Room Rate
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="3">Budget - Revenue
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="4">Actual - Room Nights Sold
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="5">Actual - Average Room Rate
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="6">Actual - Revenue
                                </label>
                            </div>
                            <div class="form-group">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="7">Forecast - Room Nights Sold
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="8">Forecast - Average Room Rate
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="data-desired[]" value="9">Forecast - Revenue
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Select Individual Room Segments</label>
                                <script language="JavaScript">
                                    function toggle(source) {
                                        checkboxes = document.getElementsByName('segment-desired[]');
                                        for(var i=0, n=checkboxes.length;i<n;i++) {
                                            checkboxes[i].checked = source.checked;
                                        }
                                    }
                                </script>

                                <input type="checkbox" onClick="toggle(this)" /> Select All<br/>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="1">Rack
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="2">Corporate
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="3">Corporate Others
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="4">Individual Others
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="5">Industry Rate
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="6">Package/Promo
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="7">Quantity Demanded
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="8">Wholesale Online
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="9">Wholesale Offline
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Select Group Room Segments </label>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="10">Convention/Association
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="11">Corporate Meetings
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="12">Government/NGO
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="13">Group Others
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="segment-desired[]" value="14">Group Tours
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                            <label>Start Year</label>
                            <input class="form-control" type="number" name="start-year" placeholder="2015" value="2015">
                            </div>
                            <div class="form-group">
                                <label>End Year</label>
                                <input class="form-control" type="number" name="end-year" placeholder="2016" value="2016">
                            </div>
                            <div class="form-group">
                            <label>Start Month</label>
                            <select class="form-control" name="start-month">
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
                            <label>End Month</label>
                            <select class="form-control" name="end-month">
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
                            <input class="btn btn-default" type="submit" value="Submit">
                            <button type="reset" class="btn btn-default">Reset</button>
                            </form>
                        </p>
                        </div>
                        <div class="tab-pane fade" id="forecast">
                            <h4>Static Forecast</h4>
                            <div class="form-group">
                                <?php echo form_open('forecast/get_forecast');?>
                                <input type="submit" value='Forecast from 2015-2016 "Static Version"' class="btn btn-success">
                                </form>
                            </div>
                            <hr>
                            <script language="JavaScript">
                                function myFunction(){
                                    if(document.getElementById('sel').selected==true) {
                                        document.getElementById('in').removeAttribute('disabled');
                                        document.getElementById('in').value = 3;
                                    }
                                    else{
                                        document.getElementById('in').disabled=true;
                                        document.getElementById('in').value = null;
                                    }
                                }
                                function setSelValue(){
                                    document.getElementById('sel').value = document.getElementById('in').value;
                                }
                            </script>
                            <h4>Forecasting with Timespan</h4>
                            <h5>Select Timespan</h5>
                            <div class="form-group">
                                <?php echo form_open('forecast/forecast_time');?>
                                <select class="form-control" id="selectid" name="selectTimeSpan" onchange="myFunction()">
                                    <option value=""> All Past Data</option>
                                    <option value="12">Past Year</option>
                                    <option value="6">Past 6 Months</option>
                                    <option  value="3">Past 3 Months</option>
                                    <option id="sel">Indicate Timespan</option>
                                </select>
                                <br>
                                <div class="form-group">
                                    <input class="form-control" disabled id="in" type="number" name="monthNum" min="3" max="24">
                                </div>
                                <input class="btn btn-success" type="submit" value="Forecast with Timespan" onclick="setSelValue()"/>
                                </form>
                            </div>

                            <ul class="list-group">

                                <?php foreach($forecasts as $forecast):?>
                                    <li class="list-group-item">
                                        <?php echo form_open('/forecast/del_forecast/'.$forecast);?>
                                        <a href="<?php echo base_url()?>forecast/download/<?php echo $forecast;?>"><?php echo $forecast;?></a>
                                        <input type="submit" value="Delete" class="btn btn-danger pull-right">
                                        </form>
                                    </li>
                                <?php endforeach;?>
                            </ul>

                        </div>

