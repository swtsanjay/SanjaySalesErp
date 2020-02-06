<?php ///pr($this_month) 
?>

<div class="row" style="margin-top: 40px !important">
    <div class="col-3">
        <div class="border border-info">
            <div class="panel-heading bg-info">
                <h1>RS <?php echo$this_month['sale']  ?> </h1>
            </div>
            <div class="panel-body">
                Sales this month
            </div>
        </div>
    </div>

    <div class="col-3">
        <div class="b-nd-bg-purchase">
            <div class="panel-heading">
                <h1>RS <?php echo$this_month['purchase']  ?> </h1>
            </div>
            <div class="panel-body bg-white">
                Purchase this month
            </div>
        </div>
    </div>
<!-- 
    <div class="col-3">
        <div class="b-nd-bg-stock">
            <div class="panel-heading">
                <h1>RS <?php //echo$this_month['']  ?> </h1>
            </div>
            <div class="panel-body bg-white">
                Stock Value This Month
            </div>
        </div>
    </div> -->

    <div class="col-3">
        <div class="b-nd-bg-profit">
            <div class="panel-heading">
                <h1>RS <?php echo$this_month['profit']  ?> </h1>
            </div>
            <div class="panel-body bg-white">
                Income this month
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>


<div class="chart-bx">
    <div class="chart-bx-head">
        <div class="chart-bx-title">Sales Report</div>
        <div class="chart-bx-filter">
            <div class="form-inline" style="padding-right: 20px">
                <form id="dashboard_sales" class="form-inline" type="post">
                    <input type="hidden" name="type" value="sale">
                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">Party:</label>
                    </div>
                    <?php echo form_dropdown('party', $party, $party['selected'], 'id="dashboard_sales_party"'); ?>

                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">User:</label>
                    </div>
                    <?php echo form_dropdown('user', $user, $user['selected'], 'id="dashboard_sales_user"'); ?>

                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">Year:</label>
                    </div>
                    <?php echo form_dropdown('year', $year, $year['selected'], 'id="dashboard_sales_year"'); ?>
                </form>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div id="sales_report_graph"></div>
</div>

<div class="chart-bx">
    <div class="chart-bx-head">
        <div class="chart-bx-title">Purchase Report</div>
        <div class="chart-bx-filter">
            <div class="form-inline" style="padding-right: 20px">
                <form id="dashboard_purchase" class="form-inline" type="post">
                    <input type="hidden" name="type" value="purchase">
                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">Party:</label>
                    </div>
                    <?php echo form_dropdown('party', $party, $party['selected'], 'id="dashboard_purchase_party"'); ?>
                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">User:</label>
                    </div>
                    <?php echo form_dropdown('user', $user, $user['selected'], 'id="dashboard_purchase_user"'); ?>

                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">Year:</label>
                    </div>
                    <?php echo form_dropdown('year', $year, $year['selected'], 'id="dashboard_purchase_year"'); ?>
                </form>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div id="purchase_report_graph"></div>
</div>



<div class="chart-bx">
    <div class="chart-bx-head">
        <div class="chart-bx-title">Profit Report</div>
        <div class="chart-bx-filter">
            <div class="form-inline" style="padding-right: 20px">
                <form id="dashboard_profit" class="form-inline" type="post">
                    <input type="hidden" name="type" value="profit">
                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">Party:</label>
                    </div>
                    <?php echo form_dropdown('party', $party, $party['selected'], 'id="dashboard_profit_party"'); ?>
                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">User:</label>
                    </div>
                    <?php echo form_dropdown('user', $user, $user['selected'], 'id="dashboard_profit_user"'); ?>

                    <div class="input-group-prepend bg-f5f5f5">
                        <label class="input-group-text border-0 bg-f5f5f5">Year:</label>
                    </div>
                    <?php echo form_dropdown('year', $year, $year['selected'], 'id="dashboard_profit_year"'); ?>
                </form>
            </div>
        </div>
        <div class="clr"></div>
    </div>
    <div id="profit_report_graph"></div>
</div>
<!-- <button type="button" onclick="sales_report()">bbb</button> -->
<!-- <script>sales_report()</script> -->