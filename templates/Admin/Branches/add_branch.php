<?php

if (!empty($title)) {
    $this->assign("title", $title);
}

?>

    
<?=
$this->Html->css([
    "pickmeup.css"
],
["block"=> "TopStyleLinks"])

?>


<style>
    #frm-add-branch label.error {
        color: red;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h3>Add Branch Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Branch</li>
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

                        <h3 class="card-title">Add Branch</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                    <?=
                            $this->Form->create($branch,[
                                "id" => "frm-add-branch"]);

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
                                            placeholder="Enter name"
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
                                            class="form-control"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select College*</label>
                                            <select required name="college_id" id="college_id" class="form-control">
                                                <option value="1">Choose college</option>

                                                <?php
                                                if(count($colleges)>0){
                                                        foreach($colleges as $index=>$college){
                                                            ?>
                                                    <option value="<?=  $college->id   ?>"><?=  strtoupper($college->name)   ?></option>
                                                            <?php
                                                        }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                  
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Total Seats*</label>
                                        <input
                                            required
                                            type="number"
                                            min="150"
                                            name="total_seats"
                                            id="total_seats"
                                            placeholder="Enter Total Seats"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Session Start Date</label>
                                        <input
                                            required
                                            type="text"
                                            name="start_date"
                                            id="start_date"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Session Start End</label>
                                        <input
                                            required
                                            type="text"
                                            name="end_date"
                                            id="end_date"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Total Durations*</label>
                                        <input 
                                            type="number" 
                                            min="1" 
                                            name="total_durations" 
                                            id="total_durations"
                                            placeholder="Total Durations"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select required name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="2">Inactive</option>
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button name="btn_submit" class="btn btn-success">Submit</button>
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
$this->Html->script(
    [
        "jquery.validate.min.js",
        "pickmeup.js"
    ],
    ["block" => "bottomScriptLinks"]
);


?>

<?php

$this->Html->scriptStart(["block" => true]);
echo '$("#frm-add-branch").validate();';
echo 'pickmeup("input#start_date", {hide_on_select:true, position:"right"});';
echo 'pickmeup("input#end_date");';
$this->Html->scriptEnd();
?>