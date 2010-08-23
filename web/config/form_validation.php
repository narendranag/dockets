<?php

$config = array(

        'dockets/create' => array(
                array(
                        'field' => 'name',
                        'rules' => 'required|trim',
                        'label' => 'name'
                ),
        ),

        'session/login' => array(
                array(
                        'field' => 'username',
                        'rules' => 'required|trim',
                        'label' => 'Username'
                ),
                array(
                        'field' => 'password',
                        'rules' => 'required|trim',
                        'label' => 'Password'
                ),
        ),
        'account/register' => array(
                array(
                        'field' => 'username',
                        'rules' => 'required|trim|callback_username_check',
                        'label' => 'Username'
                ),
                array(
                        'field' => 'password',
                        'rules' => 'required|trim',
                        'label' => 'Password'
                ),
                array(
                        'field' => 'email',
                        'rules' => 'required|trim|valid_email|callback_email_check',
                        'label' => 'Email'
                ),
                array(
                        'field' => 'captcha',
                        'rules' => 'trim|required|callback_captcha_check',
                        'label' => 'Confirmation Code'
                ),

        ),
        'account/forgot_password' => array(
                array(
                        'field' => 'username',
                        'rules' => 'required|trim',
                        'label' => 'Username or Email address'
                ),
        ),
        'account/manage' => array(
                array(
                        'field' => 'name',
                        'rules' => 'required|trim',
                        'label' => 'Name'
                ),
                array(
                        'field' => 'email',
                        'rules' => 'required|trim|valid_email',
                        'label' => 'Email Address'
                )
        ),
);