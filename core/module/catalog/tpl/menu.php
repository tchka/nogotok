<?php

if (!function_exists('catalog_tpl_menu_child')) {

	function catalog_tpl_menu_child($child, $category=0){

		if (count($child)) {
			?><ul><?

			foreach ($child as $jj => $ii) {
				$subitem = $ii['object'];
				$child = is_array($ii['child']) ? $ii['child'] : array();

				?>
				<li 
					class="subcat 
						<?= (count($child) ? ' inner' : '') ?>"
				>
					<a <?= ( $subitem->href() == $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> href="<?= $subitem->href() ?>">
						<?= $subitem->title ?>
						<? catalog_tpl_menu_child($child); ?>
					</a>
				</li>
				<?
			}

			?></ul><?
		}

	}

}

function catalog_sub_child_ids($child){
	$ids = array();			
	foreach ($child as $j => $i) {
		$item = $i['object'];
		$ids[] = $item->category_id;
	}
//	return implode(",", $ids);
	return $ids;

}

function catalog_child_ids($data){
	$ids = array();			
	foreach ($data as $j => $i) {
		$item = $i['object'];
		$child = is_array($i['child']) ? $i['child'] : array();
		if (count($child)) {
			foreach ($child as $jj => $ii) {
				$subitem = $ii['object'];
				$child = is_array($ii['child']) ? $ii['child'] : array();
				$ids[] = (int) ($subitem->category_id);
			}
		}
	}
//	return implode(",", $ids);
	return $ids;

}

?>
	<?
		foreach ($data as $j => $i) {
			$item = $i['object'];
			$child = is_array($i['child']) ? $i['child'] : array();
//			var_dump(catalog_child_ids($child));
			?>
			<li>

				<a href="<?= $item->href() ?>" <?= ( $item->href() == $_SERVER['REQUEST_URI']) ? 'class="active"' : '' ?> ><?= $item->title ?></a>

				<? catalog_tpl_menu_child($child, $category); ?>
			</li>
			<?
		}
	?>



