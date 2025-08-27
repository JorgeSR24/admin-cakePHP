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
    #frm-edit-staff label.error {
        color: red;
    }
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h3>Edit Staff Form</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Staff</li>
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

                        <h3 class="card-title">Edit Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?= $this->Form->create($staff,[
                            "id" => "frm-edit-staff",
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
                                            value="<?= $staff->name ?>"
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
                                            value="<?= $staff->email ?>"
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
                                            value="<?= $staff->phone ?>"
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
                                            placeholder="Enter Address"><?= $staff->address ?></textarea>
                                    </div>
                                </div>

                             

                            </div>

                                                          <div class="row">
                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Designation*</label>
                                        <input
                                            required
                                            type="text"
                                            name="designation"
                                            id="designation"
                                            value="<?= $staff->designation ?>"
                                            placeholder="Enter Designation"
                                            class="form-control">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <label for="">Select Type</label>
                                        <select required name="staff_type" id="staff_type" class="form-control">
                                            <option <?= $staff->staff_type == "instructor" ? "selected" : "" ?> value="instructor">Instructor</option>
                                            <option <?= $staff->staff_type == "librarian" ? "selected" : "" ?> value="librarian">Librarian</option>
                                            <option <?= $staff->staff_type == "lab-instructor" ? "selected" : "" ?>value="lab-instructor">Lab Instructor</option>
                                            <option <?= $staff->staff_type == "workshop-instructor" ? "selected" : "" ?>value="workshop-instructor">Workshop Instructor</option>
                                            <option <?= $staff->staff_type == "financial-manager" ? "selected" : "" ?> value="financial-manager">Financial Manager</option>
                                            <option <?= $staff->staff_type == "head-of-department" ? "selected" : "" ?> value="head-of-department">Head of department</option>
                                            <option <?= $staff->staff_type == "non-technical" ? "selected" : "" ?> value="non-technical">Non technical</option>
                                            <option <?= $staff->staff_type == "others" ? "selected" : "" ?> value="others">Others</option>
                                        </select>
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select Gender*</label>
                                            <select required name="gender" id="gender" class="form-control">
                                                <option <?= $staff->gender == "male" ? "selected" : '' ?> value="male">male</option>
                                                <option <?= $staff->gender == "female" ? "selected" : '' ?> value="female">female</option>
                                                <option <?= $staff->gender == "others" ? "selected" : '' ?> value="others">others</option>

                                            </select>
                                        </div>
                                  
                                </div>

                                <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Select Blood Group*</label>
                                            <select required name="blood_group" id="blood_group" class="form-control">
                                                <option <?= $staff->blood_group == "A+" ? "selected" : '' ?> value="A+">A+</option>
                                                <option <?= $staff->blood_group == "A-" ? "selected" : '' ?> value="A-">A-</option>
                                                <option <?= $staff->blood_group == "B+" ? "selected" : '' ?> value="B+">B+</option>
                                                <option <?= $staff->blood_group == "B-" ? "selected" : '' ?> value="B-">B-</option>
                                                <option <?= $staff->blood_group == "O+" ? "selected" : '' ?> value="O+">O+</option>
                                                <option <?= $staff->blood_group == "AB+" ? "selected" : '' ?> value="AB+">AB+</option>
                                                <option <?= $staff->blood_group == "AB-" ? "selected" : '' ?> value="AB-">AB-</option>

                                            </select>
                                        </div>
                                  
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Profile Image*</label>
                                        <input
                                            type="file"
                                            name="profile_image"
                                            id="profile_image"
                                            class="form-control">
                                            <br>
                                            <?=
                                                $this->Html->image("/" . $staff->profile_image, 
                                                ["style"=>"height:70px; width: 70px;"]);
                                            ?>
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
                                            <option <?= $staff->status == 1 ? "selected" : '' ?> value="1">Active</option>
                                            <option <?= $staff->status == 0 ? "selected" : '' ?> value="0">Inactive</option>
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
echo '$("#frm-edit-staff").validate();';
echo 'pickmeup("input#dob", {hide_on_select:true, position:"right"}).set_date("'.$staff->dob.'");';
$this->Html->scriptEnd();
?>