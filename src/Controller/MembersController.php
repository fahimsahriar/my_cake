<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;

class MembersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadModel("Members");
    }

    public function members()
    {
    }

    public function register(): void
    {
        $this->autoRender = false;

        $userEntity = $this->Members->newEmptyEntity();
        $userEntity->name = "Fahim Sahriar2";
        $userEntity->email = "test2@email.com";

        $passwordHash = new DefaultPasswordHasher();

        $userEntity->password = $passwordHash->hash("123");

        if ($this->Members->save($userEntity)) {
            echo "<h5>User registered</h5>";
        }

    }

    public function login()
    {
        // echo "Hitted";
        if ($this->request->is("post")) {
            $userData = $this->Auth->identify();
            if ($userData) {
                $this->Auth->setUser($userData);
                return $this->redirect($this->Auth->redirectUrl());

            } else {
                $this->Flash->error("Invalid Login");
                // $this->Flash->success("Login succesfull");
            }
        }
    }

    public function dashboard(){
        $this->set('user_message', 'Welcome to dashboard');
        $userInfo = $this->Auth->user();
        $this->set('user_info', $userInfo);
    }
    public function logout(){
        return $this->redirect($this->Auth->logout());
    }
}