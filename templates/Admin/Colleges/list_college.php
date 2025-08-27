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
                <h3>List College</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">List College</li>
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
                        <h3 class="card-title">List College</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-colleges" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>College Info</th>
                                    <th>Short Name</th>
                                    <th>Cover Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($colleges) > 0) {
                                    foreach ($colleges as $index => $college) {
                                ?>
                                        <tr>
                                            <td><?= $college->id  ?></td>
                                            <td><?= "<b class='text-muted'>Name: </b>" . $college->name . "<br><b class='text-muted'>Email: </b>" . $college->email . "<br>Phone Number: " . $college->contact_number ?></td>
                                            <td><?= $college->short_name  ?></td>
                                            <td>
                                                <?= $this->Html->image("/" . $college->cover_image, ["style" => "width: 70px; height: 70px"]);  ?>
                                            </td>
                                            <td>
                                                <form id="frm-delete-college-<?= $college->id ?>" action="<?= $this->Url->build('/admin/delete-college/' . $college->id) ?>" method="post">
                                                    <input type="hidden" value="<?= $college->id ?>" name="id">
                                                    <input type="hidden" name="_csrfToken" value="<?= $this->request->getAttribute('csrfToken') ?>">
                                                </form>
                                                <a href="<?= $this->Url->build('/admin/edit-college/' . $college->id, ['fullBase' => true]);   ?>" class="btn btn-warning">
                                                    <i class="fa fa-pencil-alt">

                                                    </i>
                                                </a>
                                                <a href="javascript:void(0)"
                                                    onclick="if(confirm('¿Estás seguro de que quieres eliminar esta universidad?')) { document.getElementById('frm-delete-college-<?= h($college->id) ?>').submit(); }"
                                                    class="btn btn-danger"
                                                    title="Eliminar universidad"
                                                    aria-label="Eliminar universidad">
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
                                    <th>College Info</th>
                                    <th>Short Name</th>
                                    <th>Cover Image</th>
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
echo '$("#tbl-colleges").DataTable();';
$this->Html->scriptEnd();
?>