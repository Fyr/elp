<?
    $title = __('Maps');
    $breadcrumbs = array(
        __('Maps') => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();

    $columns = $this->PHTableGrid->getDefaultColumns($objectType);
    $columns['House.town_id']['label'] = __('Town');
    $columns['House.town_id']['format'] = 'string';
    $columns['HousePrecinctArea.id']['format'] = 'string';
    $columns['HousePrecinctArea.id']['label'] = __('Precinct Area');

    $rowset = $this->PHTableGrid->getDefaultRowset($objectType);
    foreach($rowset as &$row) {
        $row['House']['town_id'] = $aTowns[$row['House']['town_id']];
        $row['HousePrecinctArea']['id'] = $aPrecinctAreas[$row['HousePrecinctArea']['id']];
    }
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <?=$this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle('index', $objectType)))?>
            <div class="portlet-body dataTables_wrapper">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <a class="btn green" href="<?=$this->Html->url(array('action' => 'edit', 0))?>">
                                    <i class="fa fa-plus"></i> <?=$this->ObjectType->getTitle('create', $objectType)?>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                </div>
                <?=$this->PHTableGrid->render($objectType, compact('rowset', 'columns'))?>
            </div>
        </div>
    </div>
</div>
