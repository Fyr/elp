<?php
App::uses('AppHelper', 'View/Helper');
class ObjectTypeHelper extends AppHelper {
    public $helpers = array('Html');
    
    private function _getTitles() {
        $aTitles = array(
            'index' => array(
                'Article' => __('Articles'),
                'Town' => __('Towns'),
                'District' => __('Districts'),
                'House' => __('Houses'),
                'User' => __('User profiles'),
            ),
            'create' => array(
                'Article' => __('Create article'),
                'Town' => __('Create Town'),
                'District' => __('Create District'),
                'House' => __('Create House'),
                'User' => __('Create user'),
            ),
            'edit' => array(
                'Article' => __('Edit article'),
                'Town' => __('Edit Town'),
                'District' => __('Edit District'),
                'House' => __('Edit House'),
                'User' => __('Edit user'),
            ),
            'view' => array(
            	'Article' => __('View Article'),
            )
        );
        return $aTitles;
    }
    
    public function getTitle($action, $objectType) {
        $aTitles = $this->_getTitles();
        return (isset($aTitles[$action][$objectType])) ? $aTitles[$action][$objectType] : $aTitles[$action]['Article'];
    }
    
    public function getBaseURL($objectType, $objectID = '') {
        return $this->Html->url(array('action' => 'index', $objectType, $objectID));
    }
}