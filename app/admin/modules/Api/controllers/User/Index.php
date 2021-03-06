<?php
class User_IndexController extends AbstractController
{
    public function init()
    {
        parent::init();
        $this->model = new \User\IndexModel($this->getRequest()->get('id'));
    }

    public function GETAction()
    {
        $data = $this->model->get();
        foreach ($data as &$v) {
            $v['lang_id'] = $this->model::read('hp_lang', $v['lang_id'])['name'];
            $v['status'] = l('status.'.$v['status']);
        }
        return $this->send($data);
    }

    public function POSTAction()
    {
        return $this->send($this->model->create());
    }

    public function PUTAction()
    {
        return $this->send($this->model->update());
    }

    public function DELETEAction()
    {
        return $this->send($this->model->delete());
    }
}