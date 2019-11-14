<?php
App::uses('AppModel', 'Model');
App::uses('Locality', 'Model');
class PrecinctArea extends AppModel {
    protected $objectType = 'PrecinctArea';

    public $belongsTo = array(
        'PrecinctAreaTown' => array(
            'className' => 'Town',
            'foreignKey' => 'town_id',
            'dependent' => true
        )
    );

    public function getOptions() {
        $conditions = array('PrecinctArea.published' => 1);
        $order = array('PrecinctArea.num' => 'asc');
        $options = $this->find('all', compact('conditions', 'order'));
        $aOptions = array();
        foreach($options as $row) {
            $aOptions[$row['PrecinctArea']['id']] = 'N '.$row['PrecinctArea']['num'].' '.$row['PrecinctArea']['title'];
        }
        return $aOptions;
    }
}
