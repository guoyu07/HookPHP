<?php
class Hook_IndexController extends AbstractController
{
    public function init()
    {
        parent::init();
        $this->model = new Hook\IndexModel();
    }
    
    public function GETAction()
    {
        return $this->send($this->model->get());
    }
    
    public function POSTAction()
    {
        return $this->send($this->model->create());
    }
    
    public function PUTAction()
    {
        $id = (int) $this->getRequest()->getPut('id');
        return $this->send($this->model->update($id));
    }
    
    public function DELETEAction()
    {
        $id = (int) $this->getRequest()->getDelete('id');
        return $this->send($this->model->delete($id));
    }
}