<?php

class User extends AppModel {

    public $hasMany = array(
        'Timeline'
    );

    public $validate = array(
        'username' => 'notEmpty'
    );

    public function register($username) {
        $this->save(array(
            'User' => array(
                'username' => $username
            )
        ));
        return $this->getLastInsertId();
    }
}
