<?
    // echo $this->Html->script(array('/Table/js/format'), array('inline' => false));
    if (isset($location) && $location) {
        //echo $location;
    } else {
        // echo "Редактирование карты - в разработке...";
    }
?>
<div id="div-map"></div>
<!--iframe id="i-map" src="/map_poly.html" width="100%" height="400"></iframe-->
<?
   /*
   Using simple <DIV> with map inside the page makes map laggy :(
   We need to calculate map container's height
   */
?>
<!--script>
$(function(){
    reloadMap();
});
</script-->
