<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=$title?></h1>
        </div>
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
        <button type="submit" class="btn btn-default">Submit</button>
        </form>

        </div>


</div>

