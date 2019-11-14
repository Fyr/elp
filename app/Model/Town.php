<?php
App::uses('AppModel', 'Model');
class Town extends AppModel {
    protected $objectType = 'Town';

    public function getOptions() {
        $conditions = array('published' => 1);
        $order = 'title';
        return $this->find('list', compact('conditions', 'order'));
    }
}
