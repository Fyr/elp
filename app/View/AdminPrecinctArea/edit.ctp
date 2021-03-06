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
    echo $this->PHForm->hidden('location');

    $tabs = array(
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('title', array(
                'label' => array('class' => 'col-md-3 control-label', 'text' => __('District Title')),
                'onchange' => 'onChangeTitle()'
            ))
            .$this->PHForm->input('town_id', array('type' => 'select', 'options' => $aTowns, 'label' => array('class' => 'col-md-3 control-label', 'text' => __('Town'))))
            .$this->PHForm->input('num', array('class' => 'form-control input-small', 'label' => array('class' => 'col-md-3 control-label', 'text' => __('Area Num'))))
            .$this->PHForm->input('published', array('type' => 'checkbox', 'label' => array('class' => 'col-md-3 control-label', 'text' => __('Published'))))
        ),
        __('Map') => $this->element('AdminUI/edit_map'),
    );

    echo $this->element('AdminUI/tabs', compact('tabs'));
    echo $this->element('AdminUI/form_actions');
    echo $this->PHForm->end();
?>
        </div>
    </div>
</div>
<script>
function onChangeTitle() {
    var item = admin_getGeoObjectData();
    item.title = $('#<?=$objectType?>Title').val();
    admin_setGetObjectData(item);
    reloadMap({type: 'poly', zoom: (item.location) ? 12 : 7});
}

$(function(){
    var item = <?=($id) ? json_encode($this->request->data($objectType)) : '""'?>;
    admin_setGetObjectData(item);
    reloadMap({type: 'poly', zoom: (item.location) ? 12 : 7});
    $('#<?=$objectType?>EditForm').on('submit', function(){
        var data = admin_getGeoObjectData();
        $('#<?=$objectType?>Location').val(JSON.stringify(data.location));
    });
});
</script>