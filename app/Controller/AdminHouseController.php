<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminHouseController extends AdminContentController {
    public $name = 'AdminHouse';
    public $uses = array('House', 'District', 'Town');

    public $paginate = array(
        'fields' => array('id', 'created', 'town_id', 'HouseDistrict.title', 'address', 'published'),
        'order' => array('created' => 'desc'),
        'limit' => 20
    );

    public function beforeRender() {
        parent::beforeRender();
        $this->set('aTowns', $this->Town->getOptions());
        $this->set('aEditOptions', $this->House->getEditOptions());
    }
}
