<h2>index post</h2>


<php echo  json_encode($data); ?>

<?php

echo $this->Form->create('Profit');
$list =  array(0 => 0, 1=> 1, 2=>2, 3=>3,4=>4);

//profitsテーブルを見に行く
echo $this->Form->input('customer_id', array('type' => 'select', 'empty'=>'選択しろ', 'options'=>$list));
echo $this->Form->input('shop_id', array('type' => 'select', 'empty'=>'選択しろ', 'options'=>$list));


//salesテーブルを見に行く

echo '1<br />';
echo $this->Form->input('Sale.0.item_id', array('type' => 'select', 'empty'=>'選択しろ', 'options'=>$list));
echo $this->Form->input('Sale.0.sale_price', array('value' => 100));
echo $this->Form->input('Sale.0.sale_quantity', array('value' => 1));

echo '2<br />';
echo $this->Form->input('Sale.1.item_id', array('type' => 'select', 'empty'=>'選択しろ', 'options'=>$list));
echo $this->Form->input('Sale.1.sale_price', array('value' => 100));
echo $this->Form->input('Sale.1.sale_quantity', array('value' => 1));

echo '3<br />';
echo $this->Form->input('Sale.2.item_id', array('type' => 'select', 'empty'=>'選択しろ', 'options'=>$list));
echo $this->Form->input('Sale.2.sale_price', array('value' => 100));
echo $this->Form->input('Sale.2.sale_quantity', array('value' => 1));

echo $this->Form->end('Save Post');

?>

