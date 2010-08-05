<?php

class Treasure {

    function initialize($user_id) {
        $user = new User();
        $gold = new gold();

        if($user->where('id', $user_id)->count() == 0) {
            return false;
        }

        $user->get_by_id($user_id);
        $gold->where_related_user('id', $user->id)->get();
        if($gold->amount == NULL) {
            $gold->amount = 5000;
            $gold->save($user);
            return $gold->amount;
        }
        else return false;
    }

    function increase($user_id) {
        $user = new User();
        $gold = new gold();

        if($user->where('id', $user_id)->count() == 0) {
            return false;
        }

        $user->get_by_id($user_id);
        $gold->where_related_user('id', $user->id)->get();
        if($gold->amount == NULL) {
            $gold->amount = 5000;
            $gold->save($user);
        }
        else {
            $gold->amount = $gold->amount + 10;
            $gold->save();
        }
        return $gold->amount;
    }

    function decrease($user_id) {
        $user = new User();
        $gold = new gold();

        if($user->where('id', $user_id)->count() == 0) {
            return false;
        }

        $user->get_by_id($user_id);
        $gold->where_related_user('id', $user->id)->get();
        if($gold->amount == NULL || $gold->amount <= 0) {
            $gold->amount = 5000;
            $gold->save($user);
        }
        else {
            $gold->amount -= 10;
            if($gold->amount < 5000) {
                $gold->amount = 5000;
                $gold->save();
            }
        }
        return $gold->amount;
    }

    function get_amount($user_id) {
        $user = new User();
        $gold = new gold();

        if($user->where('id', $user_id)->count() == 0) {
            return false;
        }

        $user->get_by_id($user_id);
        $gold->where_related_user('id', $user->id)->get();
        return $gold->amount;

    }

}