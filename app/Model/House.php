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
        'HouseDistrict' => array(
            'className' => 'District',
            'foreignKey' => 'district_id',
            'dependent' => true
        )
    );

    public function getEditOptions() {
        $this->District = $this->loadModel('District');
        $conditions = array('District.published' => 1);
        $order = array('DistrictTown.title' => 'ASC', 'District.title' => 'ASC');
        $aDistricts = $this->District->find('all', compact('conditions', 'order'));
        $aOptions = Hash::combine($aDistricts, '{n}.District.id', '{n}.District.title', '{n}.DistrictTown.title');
        fdebug($aOptions, 'tmp1.log');
        return $aOptions;
    }
}
