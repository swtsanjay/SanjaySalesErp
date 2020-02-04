<?php //pr($party) ?>
<div class="chart-bx">
    <div class="chart-bx-head">
        <div class="chart-bx-title">Sales Report</div>
        <div class="chart-bx-filter">
            <div class="form-inline" style="padding-right: 20px">

                <div class="input-group-prepend bg-f5f5f5">
                    <label class="input-group-text border-0 bg-f5f5f5">Party:</label>
                </div>
                <?php echo form_dropdown('party', $party, $party['selected']); ?>


                <div class="input-group-prepend bg-f5f5f5">
                    <label class="input-group-text border-0 bg-f5f5f5">User:</label>
                </div>
                <?php echo form_dropdown('user', $user, $user['selected']); ?>
                
                <div class="input-group-prepend bg-f5f5f5">
                    <label class="input-group-text border-0 bg-f5f5f5">Year:</label>
                </div>
                <?php echo form_dropdown('year', $year, $year['selected']); ?>

            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div id="chartdiv"></div>
</div>