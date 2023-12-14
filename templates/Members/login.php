<?php
echo $this->Flash->render();

echo $this->Form->create(null, [
    'url' => [
        "controller" => "Members",
        "action" => "login"
    ]
]);

echo $this->Form->control('email');
// The following generates a Password input
echo $this->Form->control('password');

echo $this->Form->button('Submit');
echo $this->Form->end();