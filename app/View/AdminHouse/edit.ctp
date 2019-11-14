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

    $tabs = array(
        __('General') => $this->Html->div('form-body',
            $this->PHForm->input('address')
            .$this->PHForm->input('town_id', array(
                'type' => 'select',
                'options' => $aTowns,
                'label' => array('class' => 'col-md-3 control-label', 'text' => __('Town')),
                'onchange' => 'onChangeLocality()'
            ))
            .$this->PHForm->input('district_id', array('type' => 'select', 'options' => $aEditOptions, 'label' => array('class' => 'col-md-3 control-label', 'text' => __('District'))))
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
var id;
function onChangeLocality(id) {
    var locality = $('#HouseTownId option:selected');
    $('#HouseDistrictId > optgroup > option').attr('disabled', true);
    var option = $('#HouseDistrictId > optgroup[label=' + locality.html() +'] > option').attr('disabled', false).get(0);
    if (!id) {
        option.selected = true;
    }
}

$(function(){
    id = <?=($id) ? $id : '""'?>;
    onChangeLocality(id);
});
</script>

