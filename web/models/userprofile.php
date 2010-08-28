<?php

class userProfile extends DataMapper {
    var $table = 'user_profile';
    var $has_one = array('user', 'country');
}