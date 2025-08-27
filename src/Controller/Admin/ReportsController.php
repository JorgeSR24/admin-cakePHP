<?php

namespace App\Controller\Admin;
use App\Controller\AppController;

class ReportsController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
         $this->viewBuilder()->setLayout("admin");
         $this->loadModel("Colleges");
         $this->loadModel("Students");
         $this->loadModel("Staffs");
    }

    public function collegesReport(){

         $colleges = $this->Colleges->find()->toList();
         $this->set("title", "Colleges Report | Academics Managment");
         $this->set(compact("colleges"));
    }

    public function studentsReport(){
     $students = $this->Students->find()->contain([
               "studentCollege" => function($q){
                    return $q->select(["id", "name"]);
               },
               "studentBranch" => function($q){
                    return $q->select(["id", "name"]);
               }
         ])->toList();
         $this->set(compact("students"));
         $this->set("title", "Students Report | Academics Managment");
    }

    public function staffsReport(){
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
         $this->set("title", "Staffs Report | Academics Managment");
    }
}



?>