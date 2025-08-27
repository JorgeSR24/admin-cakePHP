<?php
if (!empty($title)) {
    $this->assign("title", $title);
}

$this->Html->css([
    "/plugins/datatables-bs4/css/dataTables.bootstrap4.css"
], ["block" => "TopStyleLinks"]);

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>List Branch</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List Branch</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="card card-secondary">
                    <div class="card-header">
                        <h3 class="card-title">List Branch</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-branch" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Branch Info</th>
                                    <th>College Name</th>
                                    <th>Total Seats</th>
                                    <th>Total Durations</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    if(count($branches)>0){
                                        foreach($branches as $branch){
                                            ?>
                                                <tr>
                                                    <td><?= $branch->id   ?></td>
                                                    <td><?= "<b>Name: </b>" . $branch->name . "<br><b>NSessionStart:</b>" . $branch->start_date . "</br><b>SessionEnd</b>" . $branch->end_date  ?></td>
                                                    <td><?= isset($branch->branch_college->name) ? $branch->branch_college->name : "N/A";    ?></td>
                                                    <td><?= $branch->total_seats   ?></td>
                                                    <td><?= $branch->total_durations   ?></td>
                                                    <td>
                                                        <form id="frm-delete-branch-<?= $branch->id ?>" action="<?= $this->Url->build('/admin/delete-branch/' . $branch->id) ?>" method="post">
                                                            <input type="hidden" value="<?= $branch->id ?>" name="id">
                                                            <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                                                    </form>
                                                        <a href="<?= $this->Url->build('/admin/edit-branch/' . $branch->id, ['fullBase'=>true]);  ?>" class="btn btn-warning">
                                                            <i class="fa fa-pencil-alt"></i>
                                                            
                                                        </a>

                                                        <a href="javascript:void(0)"
                                                            onclick="if(confirm('¿Estás seguro de que quieres eliminar esta Branch?')) { document.getElementById('frm-delete-branch-<?= h($branch->id) ?>').submit(); }"
                                                            class="btn btn-danger"
                                                            title="Eliminar Branch"
                                                            aria-label="Eliminar Branch">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>

                                            <?php
                                        }    
                                    }

                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#ID</th>
                                    <th>Branch Info</th>
                                    <th>College Name</th>
                                    <th>Total Seats</th>
                                    <th>Total Durations</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?=
    $this->Html->script([
        "/plugins/datatables/jquery.dataTables.js",
        "/plugins/datatables-bs4/js/dataTables.bootstrap4.js"
    ], ["block" => "bottomScriptLinks"]);
?>

<?php
$this->Html->scriptStart(["block" => true]);
echo '$("#tbl-branch").DataTable();';
$this->Html->scriptEnd();
?>