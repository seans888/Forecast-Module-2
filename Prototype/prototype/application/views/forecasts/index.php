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
