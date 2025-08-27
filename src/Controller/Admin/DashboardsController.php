<?php

namespace App\Controller\Admin;
use App\Controller\AppController;

class DashboardsController extends AppController{

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Students");
        $this->loadModel("Colleges");
        $this->loadModel("Staffs");

    }

    public function index(){


        $userData = $this->Auth->user();
       

        //college
        $collegeQuery = $this->Colleges->find();
        $collegesData = $collegeQuery->select([
            "total_data" => $collegeQuery->func()->count("*")
        ])->first();

        $collegesCount = $collegesData->total_data;

        //student
        $studentQuery = $this->Students->find();
        $studentsData = $studentQuery->select([
            "total_data" => $studentQuery->func()->count("*")
        ])->first();

        $studentsCount = $studentsData->total_data;

        //staff

        $staffQuery = $this->Staffs->find();
        $staffsData = $staffQuery->select([
            "total_data" => $staffQuery->func()->count("*")
        ])->first();

        $staffsCount = $staffsData->total_data;

        $this->set(compact("studentsCount"));
        $this->set(compact("collegesCount"));
        $this->set(compact("staffsCount"));
         $this->set("title", "Admin Dashboard | Academics Managment");
    }
}



?>