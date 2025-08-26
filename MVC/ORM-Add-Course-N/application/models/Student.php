<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends DataMapper {
    var $has_one = array ('course');
    public function __construct($id =null){
        parent::__construct($id);
    }
}