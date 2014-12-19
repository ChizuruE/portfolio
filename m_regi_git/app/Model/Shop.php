<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 15:59
 */

App::uses('AppModel', 'Model');
class Shop extends AppModel{
    public $validate = array(
        'shop_name' => array(
            array(
                'rule' => 'isUnique', //重複禁止
                'message' => '既に使用されている名前です。'
            ),
            array(
                'rule' => 'alphaNumeric', //半角英数字のみ
                'message' => '名前は半角英数字にしてください。'
            ),
            array(
                'rule' => array('between', 2, 32), //2～32文字
                'message' => '名前は2文字以上32文字以内にしてください。'
            )
        ),
        'shop_password' => array(
            array(
                'rule' => 'alphaNumeric',
                'message' => 'パスワードは半角英数字にしてください。'
            ),
            array(
                'rule' => array('between', 8, 32),
                'message' => 'パスワードは8文字以上32文字以内にしてください。'
            )
        )
    );

    public function beforeSave($options = array()) {
        $this->data['Shop']['shop_password'] = AuthComponent::password($this->data['Shop']['shop_password']);
        return true;
    }
//    function itemsLoad($params){
//        App::import('Model','Item');
//        $Items = new Item;
//        return $Items->find('all',$params);
//    }
}
