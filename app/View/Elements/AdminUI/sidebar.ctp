<div class="page-sidebar-wrapper">
	<div class="page-sidebar navbar-collapse collapse">
		<ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
			<li class="sidebar-toggler-wrapper hide">
				<div class="sidebar-toggler"> </div>
			</li>
			<li class="sidebar-search-wrapper">
			</li>
			<li class="nav-item start ">
				<a href="<?=$this->Html->url(array('controller' => 'Admin', 'action' => 'index'))?>" class="nav-link">
					<i class="icon-home"></i>
					<span class="title"><?=__('Dashboard')?></span>
				</a>

			</li>
			<li class="heading">
				<h3 class="uppercase"><?=__('Admin area')?></h3>
			</li>
<?
	$aMenu = array(
		array('label' => __('Maps'), 'icon' => 'icon-layers', 'url' => '', 'submenu' => array(
			array('label' => __('Towns'), 'url' => array('controller' => 'AdminTown', 'action' => 'index')),
			array('label' => __('Districts'), 'url' => array('controller' => 'AdminDistrict', 'action' => 'index')),
			array('label' => __('Precinct Areas'), 'url' => array('controller' => 'AdminPrecinctArea', 'action' => 'index')),
			array('label' => __('Houses'), 'url' => array('controller' => 'AdminHouse', 'action' => 'index')),
		)),
		array('label' => __('Settings'), 'icon' => 'icon-wrench', 'url' => '', 'submenu' => array(
			array('label' => __('System'), 'url' => array('controller' => 'AdminSettings', 'action' => 'index')),
		)),
	);

	$menuID = 0;
	$currMenu = 0;
	foreach($aMenu as $item) {
		$menuID++;
		$icon = (isset($item['icon']) && $item['icon']) ? '<i class="'.$item['icon'].'"></i>' : '';
		$label = '<span class="title">'.$item['label'].'</span>';
?>
			<li id="menu<?=$menuID?>" class="nav-item">
<?
		if (!isset($item['submenu'])) {
?>
				<a href="<?=$this->Html->url($item['url'])?>" class="nav-link">
					<?=$icon?>
					<?=$label?>
				</a>
<?
		} else {
?>
				<a href="javascript:;" class="nav-link nav-toggle">
					<?=$icon?>
					<?=$label?>
					<span class="arrow"></span>
				</a>
				<ul class="sub-menu">
<?
			$controller = $this->request->controller;
			if ($controller == 'AdminSubcategories') {
				$controller = 'AdminCategories';
			}
			foreach($item['submenu'] as $_item) {
				$menuID++;
				if ($controller == $_item['url']['controller']) {
					if ($controller == 'AdminSettings' && $this->request->action == $_item['url']['action']) {
						$currMenu = $menuID;
					} else {
						$currMenu = $menuID;
					}

				}
				$icon = (isset($_item['icon']) && $_item['icon']) ? '<i class="'.$_item['icon'].'"></i>' : '';
				$label = '<span class="title">'.$_item['label'].'</span>';
?>
					<li id="menu<?=$menuID?>" class="nav-item">
						<a href="<?=$this->Html->url($_item['url'])?>" class="nav-link">
							<span class="title"><?=$label?></span>
						</a>
					</li>
<?
			}
?>
				</ul>
<?
		}
?>
			</li>
<?
	}
?>
		</ul>
	</div>
</div>
<?
	if ($currMenu) {
?>
<script>
	$(function(){
		var $currMenu = $('#menu<?=$currMenu?>');
		$currMenu.addClass('active');
		$currMenu.addClass('open');
		$currMenu.parent().closest('li').addClass('active');
		$currMenu.parent().closest('li').addClass('open');
	});
</script>
<?
	}
?>
