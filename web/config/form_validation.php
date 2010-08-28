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
                )
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
                        'field' => 'website',
                        'rules' => 'trim|valid_url',
                        'label' => 'Website'
                )
        ),
        'account/activate' => array(
                array(
                        'field' => 'username',
                        'rules' => 'trim|required',
                        'label' => 'Username'
                ),
            array(
                        'field' => 'key',
                        'rules' => 'trim|required',
                        'label' => 'Activation Key'
                )
        ),
);