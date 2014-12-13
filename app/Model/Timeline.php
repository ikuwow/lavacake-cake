<?php

class Timeline extends AppModel {

    public $validate = array(
        'name' => 'notEmpty',
    );

    public function addNewTimeline($data) {
        if (empty($data['TimelinesFacebook']['facebook_user_id']) || empty($data['TimelineTwitter']['twitter_user_id'])) {
            throw new BadRequestException();
        }
        $stat = $this->saveAssociated($data);
        return $stat;
    }
}
