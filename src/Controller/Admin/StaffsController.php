<?php

namespace App\Controller\Admin;
use App\Controller\AppController;

class StaffsController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
        $this->loadModel("Staffs");
        $this->loadModel("Colleges");
    }

    public function addStaff(){

           $staff = $this->Staffs->newEmptyEntity();

        if($this->request->is("post")){

          $fileObject = $this->request->getData("profile_image");
          $fileName = $fileObject->getClientFilename();
          $fileExtension = $fileObject->getClientMediaType();

          $valid_extension = array("image/png", "image/jpg", "image/jpeg");

          if(in_array($fileExtension,$valid_extension)){

               $destination = WWW_ROOT . "staffs" . DS . $fileName;
               $fileObject->moveTo($destination);

               $staffData = $this->request->getData();
               $staffData["profile_image"] =  "staffs" . "/" . $fileName;

               $staff = $this->Staffs->patchEntity($staff, $staffData);

               if($this->Staffs->save($staff)){
                    $this->Flash->success("Staff has been created successfully");
               }
               else{
                     $this->Flash->error("Failed to create a staff");
               }

               return $this->redirect(["action"=> "listStaff"]);
          }else{

               $this->Flash->error("Upload File is not a image");
          }

        }
          $this->set(compact("staff"));

         $this->set("title", "Add Staff | Academics Managment");
    }

    public function listStaff(){

          $staffs = $this->Staffs->find()->contain([
               "staffCollege" => function($q){
                    return $q->select(["id", "name"]);
               },
               "staffBranch" => function($q){
                    return $q->select(["id", "name"]);
               }
         ])->toList();

        // print_r($students);

         $this->set(compact("staffs"));

         $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
         $this->set(compact("colleges"));
         $this->set("title", "List Staff | Academics Managment");
    }

    public function editStaff($id=null){

          $staff = $this->Staffs->get($id);

        if($this->request->is(["post", "put"])){

          $staffData = $this->request->getData();

          $fileObject = $this->request->getData("profile_image");
          $fileName = $fileObject->getClientFilename();
          $fileExtension = $fileObject->getClientMediaType();

          if(!empty($fileName)){
               //uploaded new profile
               $valid_extension = array("image/png", "image/jpg", "image/jpeg");

               if(in_array($fileExtension,$valid_extension)){

               $destination = WWW_ROOT . "staffs" . DS . $fileName;
               $fileObject->moveTo($destination);

               
               $staffData["profile_image"] =  "staffs" . "/" . $fileName;

          
               }else{


               $this->Flash->error("Upload File is not a image");
               }

          }else{
               //we have our old image
               $staffData["profile_image"] =  $staff->profile_image;

          }

          

                $staff = $this->Staffs->patchEntity($staff, $staffData);

               if($this->Staffs->save($staff)){
                    $this->Flash->success("Staff has been updated successfully");
               }
               else{
                     $this->Flash->error("Failed to update a staff");
               }
               return $this->redirect(["action"=> "listStaff"]);

        }
          $this->set(compact("staff"));
         $this->set("title", "Edit Staff | Academics Managment");
    }

     public function assingCollegeBranch(){

     if($this->request->is("post")){
           $staff_id = $this->request->getData("staff_id");

           $staff = $this->Staffs->get($staff_id);

           $staffData = $this->request->getData();

           $staff = $this->Staffs->patchEntity($staff,  $staffData);

           if($this->Staffs->save($staff)){
               $this->Flash->success("College Branch Assign Successfully to staff");
           }else{
               $this->Flash->error("Failed to assing College/Branch");
           }

           return $this->redirect(["action" => "listStaff"]);
     }
    
    }

     public function removeAssignedCollegeBranch($id = null){
          $staff = $this->Staffs->get($id);

          $staff['branch_id'] = null;
          $staff['college_id'] = null;

          if($this->Staffs->save($staff)){
               $this->Flash->success("Assigned College/Branch removed Successfully");
          }else{
               $this->Flash->error("Failed to remove College/Branch ");
          }

          return $this->redirect(["action" => "listStaff"]);

    }

    public function deleteStaff($id=null){

     $this->request->allowMethod(["post", "delete"]);
     $staff = $this->Staffs->get($id);

     if($this->Staffs->delete($staff )){
          $this->Flash->success(" Staff has been delete successfully");
     }
     else{
          $this->Flash->error("Failed to delete Staff");
     }
        
    }
}



?>