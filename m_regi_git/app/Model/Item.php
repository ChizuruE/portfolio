<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 15:59
 */

App::uses('AppModel', 'Model');
class Item extends AppModel{
    var $name = 'Item';
    var $belongsTo = array(
        'Category' => array (               // ここから追加
            'className' => 'Category',
            'conditions' => 'Item.category_id = Category.id',
            'order' => 'Item.id ASC',
            'foreignKey' => ''
        )
    );

}