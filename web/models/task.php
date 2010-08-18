<?php
class Task extends DataMapper {
    var $table = 'tasks';
    var $has_one = array('docket', 'user');
}