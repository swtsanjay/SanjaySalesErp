<?php
    $qs=$_GET;
?>

<div class="clearfix " style="margin-top: 20px">
    <div class="float-left pdT15 " style="    padding-top: 6px;">
        <h5 class="no-margin uc">List of Invoices</h5>
    </div>
</div>
<hr>

<div class="form-inline d-block">
    <form action="index.php/parties/load_parties">
        <input type="search" class="form-control " placeholder="Keywords..." name="key" value="<?php echo $qs['key']?>">&nbsp;
        <select class="form-control inpt-lg " name="type">
            <option value="">Type (All)</option>
            <option value="customer" <?php if ($qs['type'] == 'customer') echo 'selected' ?>>CUSTOMER</option>
            <option value="vendor" <?php if ($qs['type'] == 'vendor') echo 'selected' ?>>VENDOR</option>
        </select>&nbsp;
        <button type="submit" class="btn btn-info btn-md " onclick="">Search</button>
        <button type="button" class="btn btn-success float-right " onclick="open_party_form(0)"> <i class="fa fa-plus-circle"></i> Add New</button>
    </form>
</div>


<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-hover">
        <thead class="thead-dark uc">
            <tr>
                <th style="width: 60px;">SN</th>
                <!-- <th style="width: 100px;">Id</th> -->
                <th>Name</th>
                <th style="width: 150px;">Mobile</th>
                <th style="width: 200px;">Email</th>
                <th style="width: 120px;">Type</th>
                <th style="width: 250px;">Date Time</th>
                <th style="width: 85px;"></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach ($dt as $i=>$r) : ?>
                <td><?php echo $i+1; ?>.</td>
                <!-- <td><?php echo $r['id'] ?></td> -->
                <td><?php echo $r['name'] ?></td>
                <td><?php echo $r['mobile'] ?></td>
                <td><?php echo $r['email'] ?></td>
                <td><?php echo $r['type'] ?></td>
                <td><?php echo date("D, j M y <br> h:i A"); ?></td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="javascript:;;;" onclick="open_party_form('<?php echo $r['id'] ?>')" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <a href="javascript:;;;" onclick="delete_party('<?php echo $r['id'] ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                    </div>
                </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="party_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>