<?php
 namespace App\Controller\Admin;

use App\Controller\AppController;




class UsersController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();
        $this->viewBuilder()->setLayout("user");
        $this->loadModel("Users");
    }

    public function login(){
        //login page
        $user_id = $this->Auth->user("id");

        if(!empty($user_id)){
            return $this->redirect("/admin");
        }
        else{
            if($this->request->is("post")){

            //validate the user form tbl user
            $userData = $this->Auth->identify();

            if($userData){
                //setting user data
                $this->Auth->setUser($userData);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error("Invalid login");
            }
        }
        

        }

        $this->set("title", "Login Academics");
    }


     public function logout(){
       //logout page
       $this->Flash->success("Logged out successfully");
       $this->redirect($this->Auth->logout());
    }
}
