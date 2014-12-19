ログイン画面
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('HogeUser');?>
<?php
echo $this->Form->input('user_email');
echo $this->Form->input('user_pass');
?>
<?php echo $this->Form->end('Login');?>