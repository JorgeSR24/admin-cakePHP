<?php

namespace App\Controller\Admin;

use App\Controller\AppController;

class CollegesController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Colleges");
        $this->viewBuilder()->setLayout("admin");
    }

    public function addCollege()
    {

        $college = $this->Colleges->newEmptyEntity();
        if ($this->request->is("post")) {

            $fileObject = $this->request->getData("cover_image");
            //print_r($fileObject);
            $fileName =  $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            $validExtensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");

            if (in_array($fileExtension,  $validExtensions)) {
                $destination = WWW_ROOT . "colleges" . DS . $fileName;
                $fileObject->moveTo($destination);

                $collegeData = $this->request->getData();
                $collegeData['cover_image'] = "colleges" . "/" . $fileName;

                $college = $this->Colleges->patchEntity($college, $collegeData);

                if ($this->Colleges->save($college)) {
                    $this->Flash->success("College has been created successfully");

                    return $this->redirect(["action" => "listCollege"]);
                } else {
                    $this->Flash->error("Failed to create College");
                }
            } else {
                $this->Flash->error("Uploaded File is not an image");
            }
        }

        $this->set(compact("college"));
        $this->set("title", "Add College | Academics Managment");
    }

    public function listCollege()
    {

        $colleges = $this->Colleges->find()->toList();
        $this->set(compact("colleges"));
        $this->set("title", "List College | Academics Managment");
    }

    public function editCollege($id = null)
    {
        $college = $this->Colleges->get($id, [
            "contain" => []
        ]);

        if ($this->request->is(["post", "put", "patch"])) {

            $collegeData = $this->request->getData();
            $fileObject = $this->request->getData("cover_image");
            //print_r($fileObject);
            $fileName =  $fileObject->getClientFilename();
            $fileExtension = $fileObject->getClientMediaType();

            if (!empty($fileName)) {
                
                $validExtensions = array("image/png", "image/jpg", "image/jpeg", "image/gif");

                if (in_array($fileExtension,  $validExtensions)) {
                    $destination = WWW_ROOT . "colleges" . DS . $fileName;
                    $fileObject->moveTo($destination);


                    $collegeData['cover_image'] = "colleges" . "/" . $fileName;
                } else {
                    $this->Flash->error("Uploaded File is not an image");
                }
            } else {
                
                $collegeData['cover_image'] = $college->cover_image;
            }

            $college = $this->Colleges->patchEntity($college, $collegeData);

            if ($this->Colleges->save($college)) {
                $this->Flash->success("College has been updated successfully");

                return $this->redirect(["action" => "listCollege"]);
            } else {
                $this->Flash->error("Failed to update College");
            }
        }


        $this->set(compact("college"));
        $this->set("title", "Edit College | Academics Managment");
    }

    public function deleteCollege($id = null) 
    {
        $this->request->allowMethod(["post", "delete"]);
        $college = $this->Colleges->get($id);

        if($this->Colleges->delete($college)){
            $this->Flash->success("College had been deleted successfully");
        }else{
            $this->Flash->error("Failed to delete college");
        }

        return $this->redirect(["action" => "listCollege"]);
    }
}
