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

        if (!$this->request->is('post') || empty($this->request->data['username'])) {
            throw new BadRequestException();
        }

        $username = $this->request->data['username'];

        $user = $this->User->find('first',array(
            'conditions' => array(
                'User.username' => $username
            )
        ));

        if (empty($user)) { // まだ未登録なら追加
            $stat = $this->User->register($username);
        } else {
            $stat = $user['User']['id'];
        }
        
        $this->success($stat);
    }

}
