<h2>index post</h2>

<?php
echo $this->Form->create('Post');
echo $this->Form->input('customer_id');
echo $this->Form->input('sele_time');
echo $this->Form->input('shop_id');
echo $this->Form->end('Save Post');


