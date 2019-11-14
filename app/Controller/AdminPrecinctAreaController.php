<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminPrecinctAreaController extends AdminContentController {
    public $name = 'AdminPrecinctArea';
    public $uses = array('PrecinctArea', 'Town');

    public $paginate = array(
        'fields' => array('id', 'created', 'PrecinctAreaTown.title', 'num', 'title', 'published'),
        'order' => array('published' => 'desc'),
        'limit' => 20
    );

    public function beforeRender() {
        parent::beforeRender();
        $this->set('aTowns', $this->Town->getOptions());
    }
}
