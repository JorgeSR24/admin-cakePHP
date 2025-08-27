<?php

namespace App\Controller\Admin;
use App\Controller\AppController;

class StudentsController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");
        $this->loadModel("Students");
        $this->loadModel("Colleges");
        $this->loadModel("Branches");
    }

    public function addStudent(){

        $student = $this->Students->newEmptyEntity();

        if($this->request->is("post")){

          $fileObject = $this->request->getData("profile_image");
          $fileName = $fileObject->getClientFilename();
          $fileExtension = $fileObject->getClientMediaType();

          $valid_extension = array("image/png", "image/jpg", "image/jpeg");

          if(in_array($fileExtension,$valid_extension)){

               $destination = WWW_ROOT . "students" . DS . $fileName;
               $fileObject->moveTo($destination);

               $studentData = $this->request->getData();
               $studentData["profile_image"] =  "students" . "/" . $fileName;

               $student = $this->Students->patchEntity($student, $studentData);

               if($this->Students->save($student)){
                    $this->Flash->success("Student has been created successfully");
               }
               else{
                     $this->Flash->error("Failed to create a student");
               }

               return $this->redirect(["action"=> "listStudent"]);
          }else{

               $this->Flash->error("Upload File is not a image");
          }

        }
          $this->set(compact("student"));
         $this->set("title", "Add Student | Academics Managment");
    }

    public function listStudent(){

         $students = $this->Students->find()->contain([
               "studentCollege" => function($q){
                    return $q->select(["id", "name"]);
               },
               "studentBranch" => function($q){
                    return $q->select(["id", "name"]);
               }
         ])->toList();

        // print_r($students);

         $this->set(compact("students"));

         $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
         $this->set("title", "List Student | Academics Managment");
         $this->set(compact("colleges"));

    }

    public function editStudent($id=null){

          $student = $this->Students->get($id);

          

          if($this->request->is(["post", "put", "patch"])){

               $studentData = $this->request->getData();

               $fileObject = $this->request->getData("profile_image");
               $fileName = $fileObject->getClientFilename();

               if(!empty($fileName)){
                    //uploaded a new image File
                    $fileExtension = $fileObject->getClientMediaType();

               
                     $valid_extension = array("image/png", "image/jpg", "image/jpeg");

                    if(in_array($fileExtension,$valid_extension)){

                    $destination = WWW_ROOT . "students" . DS . $fileName;
                    $fileObject->moveTo($destination);

               
                    $studentData["profile_image"] =  "students" . "/" . $fileName;

              
               }else{

                    $this->Flash->error("Upload File is not a image");
                    return $this->redirect(["action"=> "listStudent"]);
               }

               }else{
                    //we havent uploaded any image file
                    $studentData["profile_image"] = $student->profile_image;

               }
               

           $student = $this->Students->patchEntity($student, $studentData);

               if($this->Students->save($student)){
                    $this->Flash->success("Student has been updated successfully");
               }
               else{
                     $this->Flash->error("Failed to update a student");
               }

               return $this->redirect(["action"=> "listStudent"]);

          }

          $this->set(compact("student"));

         $this->set("title", "Edit Student | Academics Managment");

    }

    public function deleteStudent($id=null){
        $this->request->allowMethod(["post", "delete"]);
        $student = $this->Students->get($id);

        if($this->Students->delete($student)){
               $this->Flash->success("Student has been deleted successfully");
        }else{
               $this->Flash->error("Fail to delete student");
        }

        return $this->redirect(["action" => "listStudent"]);
    }

    public function getCollegeBranches(){
          $this->autoRender = false;
          $college_id = $this->request->getQuery("college_id");

          $branches = $this->Branches->find()->select(["id", "name"])->where([
               "college_id" => $college_id
          ])->toList();


          echo json_encode(array(
               "status" => 1,
               "message" => "Branches Found",
               "branches" => $branches
          ));
    }

    public function assingCollegeBranch(){

     if($this->request->is("post")){
           $student_id = $this->request->getData("student_id");

           $student = $this->Students->get($student_id, [
               "contain" => []
           ]);

           $studentData = $this->request->getData();

           $student = $this->Students->patchEntity($student,  $studentData);

           if($this->Students->save($student)){
               $this->Flash->success("College Branch Assign Successfully to student");
           }else{
               $this->Flash->error("Failed to assing College/Branch");
           }

           return $this->redirect(["action" => "listStudent"]);
     }
    
    }

    public function removeAssignedCollegeBranch($id = null){
          $student = $this->Students->get($id);

          $student['branch_id'] = null;
          $student['college_id'] = null;

          if($this->Students->save($student)){
               $this->Flash->success("Assigned College/Branch removed Successfully");
          }else{
               $this->Flash->error("Failed to remove College/Branch ");
          }

          return $this->redirect(["action" => "listStudent"]);

    }
}



?>