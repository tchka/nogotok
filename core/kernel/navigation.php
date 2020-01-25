<?php
namespace Kernel;
class Navigation {

	public function __construct($page, $items, $page_size = 20, $link_pre = "", $link_to = "/page/", $link_post = "") {
		$this->page = $page;
		$this->items = $items;
		$this->page_size = $page_size;
		$this->link_pre = $link_pre;
		$this->link_to = $link_to;
		$this->link_post = $link_post;
	}

        function Pages($CurrentPage = 1, $SummaryItems, $ItemsPerPage, $LinkTo="?", $linkpage = "&page=", $linkpost = "") {
                global $locale;

                $CurrentPage--;
                if ($CurrentPage < 0) $CurrentPage = 0;

                if ($ItemsPerPage < 1) $ItemsPerPage = 1;

                $n = floor(($SummaryItems-1)/$ItemsPerPage);

                ob_start();

                if ($CurrentPage > 0) {
                        $active = "-active";
                        $go_end = "</a>";
                        $go_start = "<a href='".$LinkTo.$linkpost."'>";
                        $go_prev = ($CurrentPage == 1) ? $go_start : "<a href='".$LinkTo.$linkpage.$CurrentPage.$linkpost."'>";
                }
                else {
                        $active = "";
                        $go_end = "";
                        $go = "";
                        $go_start = "";
                }


                ?>
                <table cellspacing='0'><tr>

                  <td><?=$go_start;?><img src="images/navi-icon/start<?=$active?>.gif" width="11px" height="12px" border="0px" alt="Ïåðâàÿ" /><?=$go_end;?></td>
                  <td><?=$go_start;?>Ïåðâàÿ<?=$go_end;?></td>

                  <td><?=$go_prev;?><img src="images/navi-icon/prev<?=$active?>.gif" width="11px" height="12px" border="0px" alt="Ïðåäûäóùàÿ" /><?=$go_end;?></td>
                  <td><?=$go_prev;?>Ïðåäûäóùàÿ<?=$go_end;?></td>

                  <td>(<? $tmp = $CurrentPage*$ItemsPerPage + 1; if ($tmp > $SummaryItems) print $SummaryItems; else print $tmp; ?> - <? $tmp = ($CurrentPage + 1)*$ItemsPerPage; if ($tmp > $SummaryItems) print $SummaryItems; else print $tmp; ?> èç <?=$SummaryItems?>)</td>

                  <?

                    for ($j = 0; $j <= $n; $j++) {
                            if ($j == $CurrentPage) print "<td><b>".($j+1)."</b></td>";
                            else { ?><td><a href="<?=$LinkTo?><? if ($j+1 > 1) print $linkpage.($j+1); ?><?=$linkpost?>"><?=($j+1)?></a></td><? }
                    }

                  ?>

                  <?

                    if ($CurrentPage < $n) {
                            $active = "-active";
                            $go_end = "</a>";
                            $go_last = "<a href='".$LinkTo.$linkpage.($n+1).$linkpost."'>";
                            $go_next = ($CurrentPage == $n-1) ? $go_last : "<a href='".$LinkTo.$linkpage.($CurrentPage+2).$linkpost."'>";
                    }
                    else {
                            $active = "";
                            $go_end = "";
                            $go = "";
                            $go_start = "";
                    }

                  ?>

                  <td><?=$go_next;?>last<?=$go_end;?></td>
                  <td><?=$go_next;?><img src="images/navi-icon/next<?=$active?>.gif" width="11px" height="12px" border="0px" alt="Ñëåäóþùàÿ" /><?=$go_end;?></td>

                  <td><?=$go_last;?>first<?=$go_end;?></td>
                  <td><?=$go_last;?><img src="images/navi-icon/end<?=$active?>.gif" width="11px" height="12px" border="0px" alt="Ïîñëåäíÿÿ" /><?=$go_end;?></td>

                </tr></table>

                <?

                $output = ob_get_contents();
                ob_end_clean();
                return $output;
        }

	public function render() {
		$page = $this->page-1; 
		if ($page < 0) $page = 0;

		$n = floor(($this->items-1)/$this->page_size);
		if ($n < 1) return '';

		for ($j = 0; $j <= $n; $j++) {
			if ($j == $page) {
				$output.= " <b>".($j+1)."</b> ";
			} else {
				$output.= ' <a href="'.$this->link_pre.($j > 0 ? $this->link_to.($j+1) : '').$this->link_post.'">'.($j+1).'</a> ';
			}
		}

		if ($page > 0) {
			$j = $page-1;
			$output = ' <a href="'.$this->link_pre.($j > 0 ? $this->link_to.($j+1) : '').$this->link_post.'">&#8592; предыдущая</a> '.$output;
		}
		else {
			$output = ' &#8592; предыдущая '.$output;
		}

		if ($page < $n) {
			$j = $page+1;
			$output.= ' <a href="'.$this->link_pre.($j > 0 ? $this->link_to.''.($j+1) : '').$this->link_post.'">следующая &#8594;</a> ';
		}
		else {
			$output.= ' следующая &#8594; ';
		}

		return $output;
	}

	public function renderTemplate( $tpl_name ) {
		$pages = $this->getPagesObject();

		if (count($pages) <= 1) return '';

		$tpl = new Template;
		$tpl->setVars(array(
			'page' => $this->page,
			'items' => $this->items,
			'page_size' => $this->page_size,
		));
		
		$tpl->setVar('navi', $pages);
		return $tpl->parse( $tpl_name );
	}

	public function getPages() {
		$result = array();

		$page = $this->page-1; 
		if ($page < 0) $page = 0;

		$n = floor(($this->items-1)/$this->page_size);
		if ($n < 1) return $result;

		for ($j = 0; $j <= $n; $j++) {
			$result[] = array(
				'num' => $j+1,
				'link' => $this->link_pre.($j > 0 ? $this->link_to.($j+1) : '').$this->link_post,
				'active' => ($j == $page),
			);
		}

		return $result;
	}

	public function getPagesObject() {
		$r = $this->getPages();

		foreach ($r as $j => $i) {
			$r[$j] = (object) $i;
		}

		return $r;
	}

	public function slice( $data ) {
		$page = $this->page - 1;

		if ($page < 0) {
			$page = 0;
		}

		return array_slice($data, $page * $this->page_size, $this->page_size);
	}

	public function isFirstPage() {
		$page = $this->page-1; 
		if ($page < 0) $page = 0;

		return ($page == 0);
	}

	public function isLastPage() {
		$result = array();

		$page = $this->page-1; 
		if ($page < 0) $page = 0;

		$n = floor(($this->items-1)/$this->page_size);

		return ($page == $n);
	}

}
