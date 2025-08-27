<?php

if (!empty($title)) {
    $this->assign("title", $title);
}

?>

<style>
#frm-add-college label.error{
    color: red;
}

</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h3>Edit College Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit College</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-6">
                <div class="card card-secondary">
                    <div class="card-header">

                        <h3 class="card-title">Edit College</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <?=
                            $this->Form->create($college,[
                                "id" => "frm-edit-college",
                                "type" => "file"
                            ])

                        ?>
                    
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Name*</label>
                                        <input
                                            required
                                            type="text"
                                            name="name"
                                            id="name"
                                            value="<?= $college->name;   ?>"
                                            placeholder="Enter name"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Short Name*</label>
                                        <input
                                            required
                                            type="text"
                                            name="short_name"
                                            id="short_name"
                                            value="<?= $college->short_name;   ?>"
                                            placeholder="Enter Short Name"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Description</label>
                                        <textarea
                                            name="description"
                                            id="description"
                                            placeholder="Enter Description"
                                            class="form-control"><?= $college->description;   ?></textarea>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Location*</label>
                                        <textarea
                                            required
                                            name="location"
                                            id="location"
                                            placeholder="Enter location"
                                            class="form-control"> <?= $college->location;   ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Total Faculty*</label>
                                        <input
                                            required
                                            type="number"
                                            name="total_faculty"
                                            min="10"
                                            id="total_faculty"
                                            placeholder="Total faculty"
                                            value="<?= $college->total_faculty;   ?>"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Contact Number*</label>
                                        <input
                                            required
                                            type="text"
                                            name="contact_number"
                                            id="contact_number"
                                            value="<?= $college->contact_number;   ?>"
                                            placeholder="Enter Contact Number"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Email*</label>
                                        <input
                                            required
                                            type="email"
                                            name="email"
                                            value="<?= $college->email;   ?>"
                                            id="email"
                                            placeholder="Enter email"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Cover Image*</label>
                                        <input
                                            type="file"
                                            name="cover_image"
                                            id="cover_image"
                                            class="form-control">
                                            <br>

                                            <?=
                                                $this->Html->image("/" . $college->cover_image, ["style" =>"width:100px; height:100px"])

                                            ?>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select required name="status" id="status" class="form-control">
                                                <option <?= $college->status==1 ? "selected" : "" ?> value="1">Active</option>
                                                <option <?= $college->status==0 ? "selected" : "" ?> value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button name="btn_submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                                

                            </div>
                        <?=
                            $this->Form->end();
                        ?>
                    </div>
                </div>
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<?=
    $this->Html->script([
        "jquery.validate.min.js"
    ],
    ["block"=>"bottomScriptLinks"]);


?>

<?php

    $this->Html->scriptStart(["block"=>true]);
    echo '$("#frm-edit-college").validate()';
    $this->Html->scriptEnd();
?>