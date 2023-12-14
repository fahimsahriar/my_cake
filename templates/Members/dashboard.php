
<h4>
    <?php 
        echo "Hello ".$user_info['name'];
    ?>
</h4>
<?= $user_message ?>
<h4>
    <?php 
        echo $this->Html->link("Logout", [
            "controller"=> "Members",
            "action"=> "logout"
        ]);
    ?>
</h4>