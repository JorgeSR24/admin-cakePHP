<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class BranchesController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("admin");

        $this->loadModel("Colleges");
        $this->loadModel("Branches");
    }

    public function addBranch()
    {
        $branch = $this->Branches->newEmptyEntity();

        if ($this->request->is("post")) {

            $branchData = $this->request->getData();
            $branch = $this->Branches->patchEntity($branch, $branchData);

            if ($this->Branches->save($branch)) {

                $this->Flash->success("Branch has been created successfully");
                return $this->redirect(["action" => "listBranch"]);
            } else {

                $this->Flash->error("Failed to create branch");
            }
        }
        // get list of colleges
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("colleges", "branch"));

        $this->set("title", "Add Branch | Academics Management");
    }

    public function listBranch()
    {
        $branches = $this->Branches->find()
            ->select([
                "id",
                "name",
                "college_id",
                "start_date",
                "end_date",
                "total_seats",
                "total_durations",
                "branch_college.name"
            ])
            ->contain(["branch_college"])
            ->toList();
        //echo "<pre>";
        //print_r($branches);

        $this->set(compact("branches"));
        $this->set("title", "List Branch | Academics Management");
    }

    public function editBranch($id = null)
    {
        $branch = $this->Branches->get($id, [
            "contain" => []
        ]);

        if ($this->request->is(["post", "put", "patch"])) {

            $branchData = $this->request->getData();
            $branch = $this->Branches->patchEntity($branch, $branchData);

            if ($this->Branches->save($branch)) {

                $this->Flash->success("Branch has been updated successfully");
                return $this->redirect(["action" => "listBranch"]);
            } else {

                $this->Flash->error("Failed to update branch");
            }
        }

        $this->set(compact("branch"));

        // get list of colleges
        $colleges = $this->Colleges->find()->select(["id", "name"])->toList();
        $this->set(compact("colleges", "branch"));

        $this->set("title", "Edit Branch | Academics Management");
    }

    public function deleteBranch($id = null)
    {
        $this->request->allowMethod(["post", "delete"]);

        $branch = $this->Branches->get($id);

        if ($this->Branches->delete($branch)) {

            $this->Flash->success("Branch has been deleted successfully");
        } else {

            $this->Flash->error("Failed to delete branch");
        }

        return $this->redirect(["action" => "listBranch"]);
    }
}
