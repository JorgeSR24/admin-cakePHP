<?php
if (!empty($title)) {
    $this->assign("title", $title);
}

$this->Html->css([
    "/plugins/datatables-bs4/css/dataTables.bootstrap4.css",
     "buttons.dataTables.min.css"
], ["block" => "TopStyleLinks"]);

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Staffs Report</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Staffs Report</li>
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
                        <h3 class="card-title">Staffs Report</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="tbl-staffs" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#ID</th>
                                    <th>Staff Info</th>
                                    <th>College/Branch</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    if(count($staffs)>0){

                                        foreach($staffs as $index => $staff){
                                                ?>
                                                    <tr>
                                                        <td><?= $staff->id  ?></td>
                                                        <td>
                                                            <?= "<b>Name : </b>" . $staff->name  ?><br/>
                                                            <?= "<b>Email : </b>" . $staff->email  ?><br/>
                                                            <?= "<b>Phone : </b>" . $staff->phone  ?><br/>
                                                            <?= "<b>BG : </b>" . $staff->blood_group  ?><br/>                                                   
                                                            <?= "<b>Staff Type : </b>" . $staff->staff_type  ?><br/>                                                   
                                                            <?= "<b>Designation : </b>" . $staff->designation  ?><br/>                                                   
                                                    </td>
                                                    <td>
                                                        <?php
                                                                if(isset($staff->staff_college->name) && isset($staff->staff_branch->name)){
                                                                    echo "College: " . $staff->staff_college->name;
                                                                    echo "<br>";
                                                                    echo "Branch: " . $staff->staff_branch->name;
                                                                    echo "<br>";
                                                                    ?>
                                                                    
                                                                    <?php
                                                                }else{
                                                                        echo "<i>N/A </i>";
                                                                        }

                                                        ?>
                                                       
                                                    </td>

                                                    <td><?= strtoupper($staff->gender)  ?> </td>
                                                    <td>
                                                        <?= $this->Html->image("/" . $staff->profile_image,[
                                                            "style" => "width: 70px; height:70px"
                                                        ]);  ?> </td>

                                                        <td>
                                                            <?= $staff->status == 1 ? "<button class='btn btn-success'>Active</button>" : "<button class='btn btn-danger'>InActive</button>"  ?>
                                                        </td>

                                                        <td>
                                                            
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
                                    <th>Staff Info</th>
                                    <th>College/Branch</th>
                                    <th>Gender</th>
                                    <th>Profile Image</th>
                                    <th>Status</th>
                                   
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
        "/plugins/datatables-bs4/js/dataTables.bootstrap4.js",
        "dataTables.buttons.min.js",
        "jszip.min.js",
        "pdfmake.min.js",
        "vfs_fonts.js",
        "buttons.html5.min.js"
    ], ["block" => "bottomScriptLinks"]);
?>

<?php
$this->Html->scriptStart(["block" => true]);
echo "$('#tbl-staffs').DataTable({
    dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    });";
$this->Html->scriptEnd();
?>