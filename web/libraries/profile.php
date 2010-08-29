<?php

class Profile {
    function get_name($user_id) {
        $userProfile = new userProfile();
        $userProfile->where('user_id', $user_id)->get();
        return $userProfile->name;
    }
}