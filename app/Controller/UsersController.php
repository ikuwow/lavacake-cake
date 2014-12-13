<?php

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

}
