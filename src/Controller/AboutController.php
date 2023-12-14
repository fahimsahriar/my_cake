<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

class AboutController extends AppController
{
    public $usersTable;
    public function initialize(): void
    {
        parent::initialize();
        // $this->usersTable = TableRegistry::getTableLocator()->get("Users");
        $this->loadModel('Users');
    }

    public function aboutUs()
    {
        // $this->autoRender = false;

        //passing parameter to the view file
        $name = "Fahim Sahriar";
        $this->set("name", $name);
    }
    public function about()
    {
        $this->autoRender = false;
        echo "Ha ha ha";
    }
    public function ormInsertData()
    {
        $this->autoRender = false;
        $query = $this->Users->query();
        $data = $query->insert(['name', 'dept'])->values([
            'name' => 'Fahim',
            'dept' => 'cse',
        ])->execute();

        print_r($data);
        // echo "Ha ha ho";
    }
    public function useBehavior()
    {
        $this->autoRender = false;
        $userEntity = $this->Users->newEmptyEntity();

        $userEntity->name = "Fahim Sahriar Shishir";
        $userEntity->dept = 'EEE';

        if($this->Users->save($userEntity)){
            echo "<h2>Data Saved Succesfuylly</h2>";
        }

    }
}