<?php

namespace App\Model\Behavior;

use ArrayObject;
use Cake\Datasource\EntityInterface;
use Cake\Event\EventInterface;
use Cake\ORM\Behavior;
use Cake\Utility\Text;

// class SluggableBehavior extends Behavior
// {
//     protected $_defaultConfig = [
//         'field' => 'name',
//         'slug' => 'slug',
//         'replacement' => '-',
//     ];

//     public function slug(EntityInterface $entity)
//     {
//         $config = $this->getConfig();
//         $value = $entity->get($config['field']);
//         $entity->set($config['slug'], Text::slug($value, $config['replacement']));
//     }

//     public function beforeSave(EventInterface $event, EntityInterface $entity, ArrayObject $options): void
//     {
//         $this->slug($entity);
//     }

// }

class SluggableBehavior extends Behavior
{
    protected $_defaultConfig = [
        "field" => "name",
        "slug" => "slug",
        "replacement" => "-",
    ];

    public function slug(EntityInterface $entity)
    {
        $config = $this->getConfig();
        $value = $entity->get($config['field']);
        $entity->set($config['slug'], Text::slug($value, $config['replacement']));
    }
    public function beforeSave(EventInterface $eventInterface, EntityInterface $entityInterface, ArrayObject $option): void
    {
        $this->slug($entityInterface);
    }
}