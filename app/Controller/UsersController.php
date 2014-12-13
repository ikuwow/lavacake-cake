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

        if (!$this->request->is('post') || !isset($this->request->data['username'])) {
            throw new BadRequestException();
        }

        $username = $this->request->data['username'];

        $count = $this->User->find('count',array(
            'conditions' => array(
                'User.username' => $username
            )
        ));

        $stat = 0;
        if ($count==0) { // まだ未登録なら追加
            $stat = $this->User->register($username);
        }
        

        $response = array(
            'message' => 'Success',
            'data' => $stat
        );

        $this->set(array(
            'response' => $response,
            '_serialize' => 'response'
        ));

    }

}
