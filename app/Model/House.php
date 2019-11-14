<?php
App::uses('AppModel', 'Model');
App::uses('District', 'Model');
class House extends AppModel {
    protected $objectType = 'House';

    public $belongsTo = array(
        'HouseTown' => array(
            'className' => 'Town',
            'foreignKey' => 'town_id',
            'dependent' => true
        ),
        'HousePrecinctArea' => array(
            'className' => 'PrecinctArea',
            'foreignKey' => 'precinctarea_id',
            'dependent' => true
        )
    );

    public function getEditOptions() {
        $this->PrecinctArea = $this->loadModel('PrecinctArea');
        $conditions = array('PrecinctArea.published' => 1);
        $order = array('PrecinctAreaTown.title' => 'ASC', 'PrecinctArea.title' => 'ASC');
        $aAreas = $this->PrecinctArea->find('all', compact('conditions', 'order'));
        $aOptions = Hash::combine($aAreas, '{n}.PrecinctArea.id', '{n}.PrecinctArea.title', '{n}.PrecinctAreaTown.title');
        return $aOptions;
    }
}
