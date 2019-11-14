<?php
App::uses('AppModel', 'Model');
App::uses('Locality', 'Model');
class District extends AppModel {
    protected $objectType = 'District';

    public $belongsTo = array(
        'DistrictTown' => array(
            'className' => 'Town',
            'foreignKey' => 'town_id',
            'dependent' => true
        )
    );
}
