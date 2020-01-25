<?

$q = 2;
$qq = $q*2 + 1;

$first = $navi[0];
$last = $navi[(count($navi) - 1)]; 

foreach ($navi as $j => $el) {
	if ($el->active) {
		$n = $j;
		break;
	}
}

$act_num = $n + 1;
$n-= $q;

if ($n < 0) {
	$n = 0;
}

if ($n + $qq > count($navi)) {
	$n = count($navi) - $qq;

	if ($n < 0) {
		$n = 0;
	} 
}

$navi = array_slice($navi, $n, $qq);

?>

<div class="paginator">
	<div class="pages-border">
		<div class="pages">
			<? if ($act_num != 1)  print '<a href="' . $first->link . '"><<</a>'; ?>
			<? if ($first->link != $navi[0]->link) print '...'; ?>
			<? foreach ($navi as $el): ?>
				<? if ($el->active): ?>
					<b class="active"><?= $el->num ?></b>
				<? else: ?>
					<a href="<?= $el->link ?>"><?= $el->num ?></a>
				<? endif; ?>
			<? endforeach; ?>
			<? if ($last->link != $navi[(count($navi) - 1)]->link) print '...'; ?>
			<? if ($act_num != $navi[(count($navi) - 1)]->num)  print '<a href="' . $last->link . '">>></a>'; ?>
		</div>
	</div>

	<!--div class="button">
		<button class="btn btn-primary jCatalogPages" data-target="#jCatalog">Показать еще <?= $page_size ?></button>
	</div-->
</div>