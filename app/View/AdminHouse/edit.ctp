<?
    $id = $this->request->data($objectType.'.id');
    $title = __('Maps');
    $breadcrumbs = array(
        __('Maps') => 'javascript:;',
        $this->ObjectType->getTitle('index', $objectType) => array('action' => 'index'),
        __('Edit') => ''
    );
    echo $this->element('AdminUI/breadcrumbs', compact('breadcrumbs'));
    echo $this->element('AdminUI/title', compact('title'));
    echo $this->Flash->render();
?>

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">

<?
    echo $this->element('AdminUI/form_title', array('title' => $this->ObjectType->getTitle($id ? 'edit' : 'create', $objectType)));
    echo $this->PHForm->create($objectType);
    echo $this->PHForm->hidden("location");
    $tabs = array(
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('address', array('onchange' => 'onChangeAddress()'))
            .$this->PHForm->input('town_id', array(
                'type' => 'select',
                'options' => $aTowns,
                'label' => array('class' => 'col-md-3 control-label', 'text' => __('Town')),
                'onchange' => 'onChangeTown()'
            ))
            .$this->PHForm->input('precinctarea_id', array('type' => 'select', 'options' => $aEditOptions, 'label' => array('class' => 'col-md-3 control-label', 'text' => __('Precinct Area'))))
            .$this->PHForm->input('published', array('type' => 'checkbox', 'label' => array('class' => 'col-md-3 control-label', 'text' => __('Published'))))
        ),
        __('Params') => $this->Html->div('form-body',
            $this->PHForm->input('sections')
            .$this->PHForm->input('flats')
            .$this->PHForm->input('residents')
        ),
        __('Map') => $this->element('AdminUI/edit_map') // , array('location' => $this->request->data($objectType.'.location'))
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
    echo $this->element('AdminUI/form_actions');
    echo $this->PHForm->end();
?>
        </div>
    </div>
</div>
<script>
function onChangeTown(id) {
    var locality = $('#HouseTownId option:selected');
    $('#HouseDistrictId > optgroup > option').attr('disabled', true);
    var option = $('#HousePrecinctAreaId > optgroup[label=' + locality.html() +'] > option').attr('disabled', false).get(0);
    if (!id) {
        option.selected = true;
    }
}

function onChangeAddress() {
    var item = admin_getGeoObjectData();
    item.title = $('#<?=$objectType?>Address').val();
    admin_setGetObjectData(item);
    reloadMap({zoom: (item.location) ? 15 : 7});
}

$(function(){
    var item = <?=($id) ? json_encode($this->request->data($objectType)) : '""'?>;
    if (item.id) {
        onChangeTown(item.id);
        item.title = item.address;
    }
    admin_setGetObjectData(item);
    reloadMap({zoom: (item.location) ? 15 : 7});

    $('#HouseEditForm').on('submit', function(){
        var data = admin_getGeoObjectData();
        $('#HouseLocation').val(JSON.stringify(data.location));
    });
});
</script>

