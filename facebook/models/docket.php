<?php

class Docket extends DataMapper {
    var $table = 'dockets';
    var $has_many = array('tasks');
    var $has_one = array('user');
}