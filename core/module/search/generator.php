<?php
namespace Search;
class Generator {
	private $object;
	private $object_uri;

	protected $page = 1;
	protected $one_page = 10;

	public function __construct($obj, $obj_uri) {
		$this->object = $obj;
		$this->object_uri = $obj_uri;

		if (count($this->object_uri) == 1 and substr($this->object_uri[0], 0, 4) == 'page' and is_numeric(substr($this->object_uri[0], 4)) ) {
			$this->page = intval(substr($this->object_uri[0], 4));
			$this->object_uri = array();
		}
	}

	public function run() {
		if ($_POST["search"]) $word = htmlspecialchars($_POST["search"]);

		$result = app()->db->query("select * from `prefix_object` where `search` like \"%".$word."%\"");
		$n = app()->db->numRows($result);

		if ($n == 0 or $word == '') {
			$output = "По запросу \"".$word."\" ничего не найдено.";
		} else {

			$output.= "Результаты поиска по запросу <b>".$word."</b>. Всего найдено ".$n." страниц.<br /><br />";

			while ($row = app()->db->FetchAssoc($result)) {
				$obj = new \Object($row);

				$output.= $this -> EchoLine($obj->title, $obj->href(), $obj->search, $word);
				$j++;
			}
		}

		app()->template->setVar('text', $output);
		app()->template->setVar('mainpart', '<h1>Поиск по сайту</h1>'.$output);
	}

	private function EchoLine($title, $href, $text, $word) {
                $output.= "<h3 class=\"search-title\"><a href=\"".$href."\" >".$title."</a></h3>";

                $tmp = $text;
                $t_pos = strpos($tmp, $word);
                $t_start = $t_pos - 50;
                if ($t_start <= 0) $t_start = 0;
                else {
                        while (true) {
                                $t_start--;
                                if ($tmp[$t_start] == " " or $tmp[$t_start] == "." or $tmp[$t_start] == "!") break;
                                if ($t_start == 0) break;
                        }
                }

                $t_finish = $t_pos + 50 + strlen($word);
                if ($t_finish >= strlen($tmp)) $t_finish = strlen($tmp);
                else {
                        while (true) {
                                $t_finish--;
                                if ($tmp[$t_finish] == " " or $tmp[$t_finish] == "." or $tmp[$t_finish] == "!") break;
                                if ($t_finish == 0) break;
                        }
                }

                $tmp = substr($tmp, $t_start, $t_finish - $t_start);
                $tmp = str_replace($word, "<b>".$word."</b>", $tmp);

                $output.= "<div class=\"anons\">".$tmp."</div><div class=\"more\"><a href=\"".$href."\" >перейти...</a></div><br /><br />";
                return $output;
        }

}



