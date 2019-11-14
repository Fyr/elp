<?php
App::uses('AppController', 'Controller');
App::uses('AdminController', 'Controller');
App::uses('AdminContentController', 'Controller');
class AdminTownController extends AdminContentController {
    public $name = 'AdminTown';
    public $uses = array('Town');

    public $paginate = array(
        'fields' => array('id', 'created', 'title', 'published'),
        'order' => array('published' => 'desc'),
        'limit' => 20
    );
}
