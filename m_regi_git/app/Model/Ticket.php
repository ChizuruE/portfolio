<?php
/**
 * Created by IntelliJ IDEA.
 * User: LastyRain
 * Date: 2014/10/01
 * Time: 1:18
 */


App::uses('AppModel', 'Model');
class Ticket extends AppModel{
    public $useTable = "tickets";
    var $name = 'Ticket';
}