<?php

foreach ($news as $j => $i) {
	?><div class="news"><?=htmlspecialchars_decode($i['text']);?></div><?
}
