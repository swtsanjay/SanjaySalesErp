<?php //echo $msg ?>
<div class="clearfix " style="margin-top: 20px">
    <div class="float-left pdT15 " style="    padding-top: 6px;">
        <h5 class="no-margin uc">List of Users</h5>
    </div>
    <button type="button" class="btn btn-success float-right " onclick="open_user_form(0)"><i class="fa fa-plus-circle"></i> Add New</button>
</div>
<hr>


<div class="table-responsive">
    <table class="table table-bordered table-sm table-striped table-hover">
        <thead class="thead-dark uc">
            <tr>
                <th style="width: 60px;">SN</th>
                <th>Name</th>
                <th style="width: 250px;">User Id</th>
                <th style="width: 150px;">Password</th>
                <th style="width: 200px;">Email</th>
                <th style="width: 150px;">Mobile</th>
                <th style="width: 100px;">Status</th>
                <th style="width: 200px;">Created</th>
                <th style="width: 85px;"></th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($dtl as $i=>$r) : ?>
                <tr>
                    <td><?php echo $i+1; ?>.</td>
                    <td><?php echo $r['name'] ?></td>
                    <td><?php echo $r['user_name'] ?></td>
                    <td><?php echo $r['password'] ?></td>
                    <td><?php echo $r['email'] ?></td>
                    <td><?php echo $r['mobile'] ?></td>
                    <?php   if($r['status']): ?>
                        <td><span class="badge badge-success">Active</span></td>
                    <?php endif ?>
                    <?php   if(!$r['status']): ?>
                        <td><span class="badge badge-danger">Not Active</span></td>
                    <?php endif ?>
                    <td><?php echo $r['created'] ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <a href="javascript:;;" onclick="open_user_form(<?php echo $r['id']?>)" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                            <!-- <a href="javascript:;;" onclick="item_delete('<?php echo $r['id'] ?>')" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i></a> -->
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="user_form_modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
        </div>
    </div>
</div>