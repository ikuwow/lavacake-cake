<?php

class Timeline extends AppModel {

    public $hasMany = array(
        'TimelinesTwitter',
        'TimelinesFacebook'
    );

    public $validate = array(
        'name' => 'notEmpty',
    );

    public function addNewTimeline($data) {
        $stat = $this->saveAssociated($data);
        return $stat;
    }
}
