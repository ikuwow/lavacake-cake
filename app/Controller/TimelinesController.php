<?php

class TimelinesController extends AppController {

    public function beforefilter() {
        parent::beforeFilter();
    }

    public function index() {
        if (!isset($this->request->query['uid'])) {
            throw new BadRequestException();
        }
        $user_id = $this->request->query['uid'];
        $timelines = $this->Timeline->find('all',array(
            'conditions' => array(
                'Timeline.user_id' => $user_id
            )
        ));
        $this->success($timelines);
    }

    public function create() {

        if (!$this->request->is('post')) {
            throw new BadRequestException();
        }

        $res = $this->Timeline->addNewTimeline($this->request->data);
        $this->success($res);
    }

}
