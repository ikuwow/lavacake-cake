<?php

class User extends AppModel {

    public $hasMany = array(
        'Timeline'
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
