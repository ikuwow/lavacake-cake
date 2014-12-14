<?php

// /users/register.json
class UsersController extends AppController {

    public function beforefilter() {
        parent::beforeFilter();
    }

    /*
    public function index() {
        $data = array('test' => 3);
        $this->set(array(
            'data' => $data,
            '_serialize' => array('data')
        ));
    }
     */

    public function register() {

        if (!$this->request->is('post') || empty($this->request->data['username']) || empty($this->request->data['fb_access_token'])) {
            $this->badRequest(array());
            return;
        }

        $username = $this->request->data['username'];
        $fb_access_token = $this->request->data['fb_access_token'];

        $user = $this->User->find('first',array(
            'conditions' => array(
                'User.username' => $username,
            )
        ));


        if (empty($user)) { // まだ未登録なら追加
            $stat = $this->User->save(array(
                'User' => array(
                    'username' => $username,
                    'fb_access_token' => $fb_access_token
                )
            ));
        } else {
            $stat = $this->User->save(array(
                'User' => array(
                    'id' => $user['User']['id'], // 指定のユーザーで追加
                    'username' => $username,
                    'fb_access_token' => $fb_access_token
                )
            ));
        }

        $this->success($stat);
        
    }

}
