<?php

// /users/register.json
class UsersController extends AppController {

    public function beforefilter() {
        parent::beforeFilter();
    }

    public function index() {
        $data = array('test' => 3);
        $this->set(array(
            'data' => $data,
            '_serialize' => array('data')
        ));
    }

    public function register() {
        $api_tokens = $this->request->data;
        $stat = $this->User->register($api_tokens);

        if ($stat) {
            $response = array('message' => 'Register success');
        } else {
            $response = array('message' => 'Register failure');
        }

        $this->set(array(
            'response' => $response,
            '_serialize' => 'response'
        ));

    }

}
