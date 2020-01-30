<div class="clearfix " style="margin-top: 20px">
    <div class="float-left pdT15 " style="    padding-top: 6px;">
        <h5 class="no-margin uc">List of Items</h5>
    </div>
    <!-- <button type="button" class="btn btn-success float-right " onclick="open_item_form(0)"><i class="fa fa-plus-circle"></i> Add New</button> -->
</div>
<hr>

<div class="form-inline d-block">
    <form action="index.php/items/load_items" method="POST">
        <input type="search" class="form-control " id="exampleInputPassword1" placeholder="Keywords..." name="key"value="<?php echo $key ?>">&nbsp;
        <select class="form-control inpt-lg " name="type">
            <option value="">Type (All)</option>
            <option value="product" <?php if($type=='product') echo 'selected'?> >PRODUCT</option>
            <option value="service" <?php if($type=='service') echo 'selected'?> >SERVICE</option>
        </select>&nbsp;
        <button type="submit" class="btn btn-info btn-md " onclick="">Search</button>
        <button type="button" class="btn btn-success float-right" onclick="open_item_form(0)"><i class="fa fa-plus-circle"></i> Add New</button>
    </form>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-hover">
        <thead class="thead-dark uc">
            <tr>
                <th style="width: 60px;">SN</th>
                <th>Name</th>
                <th style="width: 250px;">Item Code</th>
                <th style="width: 150px;">Type</th>
                <th style="width: 150px;">Cost</th>
                <th style="width: 150px;">Sale Price</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 85px;"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($dt as $i=>$r) : ?>
                <tr>
                    <td><?php echo $i+1; ?>.</td>
                    <td><?php echo $r['name'] ?></td>
                    <td><?php echo $r['item_code'] ?></td>
                    <td><?php echo $r['type'] ?></td>
                    <td><?php echo $r['unit_cost'] ?></td>
                    <td><?php echo $r['sale_cost'] ?></td>
                    <td><?php echo $r['status'] ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="javascript:;;" onclick="open_item_form('<?php echo $r['id'] ?>')" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <a href="javascript:;;" onclick="item_delete('<?php echo $r['id'] ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="item_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>