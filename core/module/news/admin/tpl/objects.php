
<div class="news-visible-button">
	<a href="#" id="objects_select_all">Отметить все</a>
	<a href="#" id="objects_unselect_all">Убрать все</a>
</div>

<div style="max-height: 250px; overflow: auto;">
<?php

if (!is_array($checked)) { $checked = array(); }

tplTree($objects, $checked);

function tplTree($obj, $checked, $parent = 0) {
	foreach ($obj as $j => $i) {
		?><div class="news-visible" style="padding-left: <?=($parent*20)?>px;"><label>
			<input type="checkbox" name="objects[]" value="<?=$i['object_id']?>" <? if (in_array($i['object_id'], $checked)) { print 'checked="checked"'; } ?> />
			<?=$i['title']?>
		</label></div><?

		if ($i['child'] and count($i['child'])) {
			tplTree($i['child'], $checked, $parent+1);
		}
	}
}

?>
</div>

<script type="text/javascript">
$(function(){
	$('#objects_select_all').click(function(){
		$(this).parent().parent().find('input[type=checkbox]').prop('checked', true);
		return false;
	});
	$('#objects_unselect_all').click(function(){
		$(this).parent().parent().find('input[type=checkbox]').prop('checked', false);
		return false;
	});
});
</script>

