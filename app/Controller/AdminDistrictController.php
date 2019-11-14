<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminDistrictController extends AdminContentController {
    public $name = 'AdminDistrict';
    public $uses = array('District', 'Town');

    public $paginate = array(
        'fields' => array('id', 'created', 'DistrictTown.title', 'title', 'published'),
        'order' => array('published' => 'desc'),
        'limit' => 20
    );

    public function beforeRender() {
        parent::beforeRender();
        $this->set('aTowns', $this->Town->getOptions());
    }
}
