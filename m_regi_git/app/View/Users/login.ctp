ログイン画面
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('Shop');?>
<?php
//echo $this->Form->input('shop_name');
//echo $this->Form->input('shop_password');
?>
ID:<input type="text" name="data[Shop][shop_name]" id="ShopShopName" required="required" />
PASS:<input type="password" name="data[Shop][shop_password]" id="ShopShopPassword" required="required" />
<?php echo $this->Form->end('Login');?>