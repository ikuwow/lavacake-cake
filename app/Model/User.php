<?php

class User extends AppModel {

    public $hasMany = array(
        'Timeline'
    );

    public $validate = array(
        'username' => 'notEmpty'
    );

    public function fbRegister($username, $fb_access_token) {
        $this->save(array(
            'User' => array(
                'username' => $username,
                'fb_access_token' => $fb_access_token
            )
        ));
        return $this->getLastInsertId();
    }
}
