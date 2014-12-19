<?php
/**
 * Created by IntelliJ IDEA.
 * User: LastyRain
 * Date: 2014/10/01
 * Time: 1:17
 */

App::uses('AppModel', 'Model');
class Customer extends AppModel{
    public $useTable = "customers";
    var $name = 'Customer';
}