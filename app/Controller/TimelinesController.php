<?php

class TimelinesController extends AppController {

    public function beforefilter() {
        parent::beforeFilter();
    }

    public function index() {
        if (!isset($this->request->query['uid'])) {
            $this->badRequest();
        }
        $user_id = $this->request->query['uid'];
        $timelines = $this->Timeline->find('all',array(
            'conditions' => array(
                'Timeline.user_id' => $user_id
            )
        ));
        $this->success($timelines);
    }

    // 引数
    // user_id
    // name
    // fb_user_id or
    // tw_user_id
    public function create() {

        if (!$this->request->is('post')) {
            throw new BadRequestException();
        }

        $data = $this->request->data;

        if (empty($data['user_id']) || empty($data['name'])) {
            throw new BadRequestException();
        }
        $timeline = array(
            'Timeline' => array(
                'user_id' => $data['user_id'],
                'name' => $data['name']
            )
        );

        if (empty($data['fb_user_id']) && empty($data['tw_user_id'])) {
            throw new BadRequestException();
        } elseif (!empty($data['fb_user_id'])) {
            $timeline['TimelinesFacebook'] = array(
                'facebook_user_id' => $data['fb_user_id']
            );
        } elseif (!empty($data['tw_user_id'])) {
            $timeline['TimelinesTwitter'] = array(
                'twitter_user_id' => $data['tw_user_id']
            );
        }

        $res = $this->Timeline->addNewTimeline($data);
        $this->success($res);
    }

}
