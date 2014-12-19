<h1>ログイン</h1>
<?php print(
  $this->Form->create('Shop') .
$this->Form->input('shop_name') .
$this->Form->input('shop_password') .
$this->Form->end('Submit')
); ?>