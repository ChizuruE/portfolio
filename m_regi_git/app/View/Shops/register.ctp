<h1>新規登録</h1>
<?php print(
  $this->Form->create('Shop'))
?>
ID:<input type="text" name="data[Shop][shop_name]" id="ShopShopName" required="required" /><br />
PASS:<input type="password" name="data[Shop][shop_password]" id="ShopShopPassword" required="required" />

<?php
print(
$this->Form->input('category_display') .
$this->Form->input('shop_goal',array('value' => 0)) .
$this->Form->end('Submit')
); ?>