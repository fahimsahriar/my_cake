<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class UsersTable extends Table
{
    public function initialize(array $config): void{
        parent::initialize($config);
        $this->setTable('users');

        //loading behavior
        $this->addBehavior('Sluggable');
    }
}