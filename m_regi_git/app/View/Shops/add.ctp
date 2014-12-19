<h2>Add Shop</h2>

<?php
    echo $this->Form->create('Shop');
    echo $this->Form->input('shop_name');
    echo $this->Form->input('shop_password');
    echo $this->Form->input('category_display');
    echo $this->Form->input('shop_goal');
    echo $this->Form->end('Save Shop');
?>