<?php
namespace Kernel;
class gateway {
	private $output = array("success" => false, "status" => "", "content" => "", "html" => "");
	private $errors = array();
	private $type = "json";

	public $action_return = "";

	public function __construct($type = 'json') {
		$this->type = $type;
	}

	function error($s) { $this -> add_error($s); }

	function addError($s) { array_push($this -> errors, $s); }
	function add_error($s) { array_push($this -> errors, $s); }

	function set_var($j, $i) { $this -> output[$j] = $i; }
	function setVar($j, $i) { $this -> output[$j] = $i; }

	function getData() { return $this->get_data(); }
	function get_data() {
        	$this -> output["success"] = (count($this -> errors) == 0);
        	$this -> output["status"] = (count($this -> errors) > 0) ? "error" : "done";
        	if (count($this -> errors)) $this -> output["content"] = implode(" <br />", $this -> errors);

        	/*

                global $Author;
                if ($Author->isAdmin()) {
                        global $time_start;
                        $time_end = getmicrotime();
                        $this->output['gen_time'] = sprintf("%01.3f", ($time_end - $time_start));
                        global $qlogn;
                        $this->output['gen_query'] = $qlogn;
                }
            */

        	return json_encode($this -> output);
        }

        function get_html() {
			if (!$this->output['content'] and !$this->output['html']) $this->output['html'] = $this->action_return;

        	if (count($this -> errors) and $this -> output["html"] == "") return implode("<br />", $this -> errors);
        	elseif (count($this -> errors) == 0 and $this -> output["html"] == "") return $this -> output["content"];
        	else return $this -> output["html"];
        }

        function print_data() {
        	if ($this -> type == "json") {
        		header('Content-Type: application/json; charset=utf-8');
        	        print $this -> get_data();
                } 
                
        	elseif ($this -> type == "json_html" or $this -> type == "html_json") {
        		header('Content-Type: text/html; charset=utf-8');
        	        print $this -> get_data();
                } 

                else {
        	        header('Content-Type: text/html; charset=utf-8');
        	        print $this -> get_html();
                }
        }

}