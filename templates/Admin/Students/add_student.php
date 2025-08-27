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
    #frm-add-student label.error {
        color: red;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h3>Add Student Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add Student</li>
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

                        <h3 class="card-title">Add Student</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->Form->create($student,[
                            "id" => "frm-add-student",
                            "type" => "file"
                        ]) ?>
                        
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
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Email*</label>
                                        <input
                                            required
                                            type="email"
                                            name="email"
                                            id="email"
                                            placeholder="Enter Email"
                                            class="form-control">
                                    </div>
                                </div>

                             

                            </div>

                             <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Phone Number*</label>
                                        <input
                                            required
                                            type="text"
                                            name="phone"
                                            id="phone"
                                            placeholder="Enter Phone Number"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Address*</label>
                                        <textarea 
                                            required 
                                            name="address" 
                                            id="address"
                                            class="form-control"
                                            placeholder="Enter Address"></textarea>
                                    </div>
                                </div>

                             

                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select Gender*</label>
                                            <select required name="gender" id="gender" class="form-control">
                                                <option value="male">male</option>
                                                <option value="female">female</option>
                                                <option value="others">others</option>

                                            </select>
                                        </div>
                                  
                                </div>

                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select Blood Group*</label>
                                            <select required name="blood_group" id="blood_group" class="form-control">
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="O+">O+</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>

                                            </select>
                                        </div>
                                  
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Profile Image*</label>
                                        <input
                                            required
                                            type="file"
                                            name="profile_image"
                                            id="profile_image"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">DOB*</label>
                                        <input
                                            required
                                            type="text"
                                            name="dob"
                                            id="dob"
                                            placeholder="Enter DOB"
                                            class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                
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
                      <?=  $this->Form->end(); ?>
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
echo '$("#frm-add-student").validate();';
echo 'pickmeup("input#dob", {hide_on_select:true, position:"right"});';
$this->Html->scriptEnd();
?>