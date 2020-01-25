<?php
namespace Kernel;
class defaultObject {
	private $_table = '';
	private $_field_id = '';

	private $_data = array();
	private $_fields = array();

	private $_sort = false;
	private $_sort_sc = 'desc';

	protected $_errors = array();
        
    public function __construct($i = null, $table, $field_id) {
        $this->_table = $table;
        $this->_field_id = $field_id;

        if (is_numeric($i)) $this->init($i);
        elseif (is_array($i)) $this->initFromRow($i);
    }

    public function __set($var, $value) {
        $this->_data[strtolower($var)] = $value;
    }
        
    public function __get($var) {
        return $this->_data[strtolower($var)];
    }

    public function id() {
        return $this->_data[$this->_field_id];
    }

    public function table() {
        return $this->_table;
    }

    public function fieldId() {
        return $this->_field_id;
    }

    public function addField($name) {
    	$n = count($this->_fields);
    	$this->_fields[$n] = new Field($name);
    	$this->_fields[$n]->Value($this->{$name});
    	return $this->_fields[$n];
    }

    public function getField($name) {
    	foreach ($this->_fields as $j => $i) {
    		if ($i->name == $name) {
    			return $this->_fields[$j];
    		}
    	}
    }

    public function getFields() {
    	return $this->_fields;
    }

    public function addSort() {
    	$this->_sort = true;
    }

    public function hasSort() {
    	return $this->_sort;
    }

    public function setSC($sc) {
    	$this->_sort_sc = $sc;
    }

    public function getSC() {
    	return $this->_sort_sc;
    }

    public function data($id = null) {
        if (is_null($id)) return $this->_data;
        else return $this->_data[$id];
    }
        
    public function property($id = null) {
        if (is_null($id)) return $this->_data;
        else return $this->_data[$id];
    }
        
    public function init($i) {
        $this->initFromRow(app()->db->getRow('select * from `prefix_'.$this->_table.'` where `'.$this->_field_id.'`='.intval($i)));
        return $this;
    }
        
    public function initFromRow($row) {
        $this->_data = $row;
    }

    public function findBy($field, $value) {
        $this->initFromRow(app()->db->getRow('select * from `prefix_'.$this->_table.'` where `'.htmlspecialchars($field).'`="'.htmlspecialchars($value).'"'));
    }

    public function findByAttributes($data) {
    	$query = array();
    	foreach ($data as $j => $i) {
    		$query[] = '`'.htmlspecialchars($j).'` = "'.htmlspecialchars($i).'"';
    	}

        $this->initFromRow(app()->db->getRow('select * from `prefix_'.$this->_table.'` where '.implode(' and ', $query) ));
        return $this;
    }

    public function findAll($params = array()) {
        $data = app()->db->getRows('select * 
        	from `prefix_'.$this->_table.'` 
        	where 1'.
        	($params['order'] ? ' order by '.$params['order'] : '').
        	($params['limit'] ? ' limit '.$params['limit'] : '')
        );
        foreach ($data as $j => $i) {
        	$data[$j] = new static($i);
        }
        return $data;
    }

    public function findAllBy($field, $value, $params = array()) {
        $data = app()->db->getRows('select * 
        	from `prefix_'.$this->_table.'` 
        	where `'.htmlspecialchars($field).'`="'.htmlspecialchars($value).'"'.
        	($params['order'] ? ' order by '.$params['order'] : '').
        	($params['limit'] ? ' limit '.$params['limit'] : '')
        );
        foreach ($data as $j => $i) {
        	$data[$j] = new static($i);
        }
        return $data;
    }

    public function findAllByAttributes($data, $params = array()) {
    	$query = array();
    	foreach ($data as $j => $i) {
    		$query[] = '`'.htmlspecialchars($j).'` = "'.htmlspecialchars($i).'"';
    	}

        $data = app()->db->getRows('select * 
        	from `prefix_'.$this->_table.'` 
        	where '.implode(' and ', $query).
        	($params['order'] ? ' order by '.$params['order'] : '').
        	($params['limit'] ? ' limit '.$params['limit'] : '')
        );
        foreach ($data as $j => $i) {
        	$data[$j] = new static($i);
        }
        return $data;
    }

    public function findAllByCondition($query, $params = array()) {
        $data = app()->db->getRows('select * 
        	from `prefix_'.$this->_table.'` 
        	where '.$query.
        	($params['order'] ? ' order by '.$params['order'] : '').
        	($params['limit'] ? ' limit '.$params['limit'] : '')
        );
        foreach ($data as $j => $i) {
        	$data[$j] = new static($i);
        }
        return $data;
    }

    public function countAll() {
        return app()->db->getVar('select count(*) from `prefix_'.$this->_table.'`');
    }

    public function countByAttributes($data) {
    	$query = array();
    	foreach ($data as $j => $i) {
    		$query[] = '`'.htmlspecialchars($j).'` = "'.htmlspecialchars($i).'"';
    	}

        return app()->db->getVar('select count(*) from `prefix_'.$this->_table.'` where '.implode(' and ', $query) );
    }

    public function countByCondition($query) {
    	return app()->db->getVar('select count(*) 
        	from `prefix_'.$this->_table.'` 
        	where '.$query
    	);
    }

    public static function make($id = null) {
    	global $collection;

    	if (is_numeric($id)) {
    		$class = get_called_class();

    		if (!$collection[$class][$id]) {
    			$collection[$class][$id] = new static($id);
    		}

			return clone $collection[$class][$id];
    	}
    	else {
    		return new static($id);
    	}

    }

    public function Refresh() {
        $this->initFromRow(app()->db->getRow('select * from `prefix_'.$this->_table.'` where `'.$this->_field_id.'`='.intval($this->{$this->_field_id})));
    }

    public function SetVar($var, $value) {
        $result = app()->db->query('update `prefix_'.$this->_table.'` set `'.$var.'` = "'.htmlspecialchars($value).'" where `'.$this->_field_id.'`='.intval($this->{$this->_field_id}));
        if (!$result) return false; else return $this;
    }

    public function SetVarForce($var, $value) {
        $result = app()->db->query('update `prefix_'.$this->_table.'` set `'.$var.'` = '.$value.' where `'.$this->_field_id.'`='.intval($this->{$this->_field_id}));
        if (!$result) return false; else return $this;
    }

    public function SetNow($var) {
        $result = app()->db->query('update `prefix_'.$this->_table.'` set `'.$var.'` = NOW() where `'.$this->_field_id.'`='.intval($this->{$this->_field_id}));
        if (!$result) return false; else return $this;
    }

    public function Drop() {
        $result = app()->db->query('delete from `prefix_'.$this->_table.'` where `'.$this->_field_id.'`='.intval($this->{$this->_field_id}));
        return $result;
    }

    public function Create($data = array()) {
    	$vars = array();
    	foreach ($data as $j => $i) {
    		if (strlen($j)) {
	    		$vars[] = '`'.$j.'` = '.$i;
    		}
    	}
    	$result = app()->db->query('insert into `prefix_'.$this->_table.'` set '.implode(', ', $vars));
    	if ($result and $id = app()->db->getId()) {
    		$this->init($id);
    		return $id;
    	} else return false;
    }

    public function addError($value, $field) {
    	$this->_errors[] = array(
    		'field' => $field,
    		'text' => $value
    		);
    }
        
}