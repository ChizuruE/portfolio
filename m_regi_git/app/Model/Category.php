<?php
/**
 * Created by PhpStorm.
 * User: LastyRain
 * Date: 2014/08/14
 * Time: 15:59
 */

App::uses('AppModel', 'Model');
class Category extends AppModel{
    public $useTable = "categorys";
    var $name = 'Category';

}