<?php

foreach ($menu as $j => $i) {
	?><li>
	<a href="<?=$i['href']?>" rel="sub<?=$i['menu_id']?>" class="first <? if ($i['href'] == obj()->href()) { print 'active'; } ?>"><?=$i['title']?></a>
	<?

	if ($i['child'] and count($i['child'])) {
		?><div class="submenu" id="sub<?=$i['menu_id']?>"><?
		foreach ($i['child'] as $jj => $ii) {
			?>
			<a href="<?=$ii['href']?>" class="second <? if ($ii['href'] == obj()->href()) { print 'secondactive'; } ?>"><?=$ii['title']?></a>
			<?
		}
		?></div><?
	}
	?></li>
	<?

}