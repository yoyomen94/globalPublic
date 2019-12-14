<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Frontamodel extends CI_Model {

	public function __construct() {
        parent::__construct();
		$this->load->database();
    }
	
	public function getData($tb){
		return $this->db->get($tb)->result();
	}
	
	public function getDataRow($tb){
		return $this->db->get($tb)->row();
	}
		
	function get_data($tb,$where_array)
	{
		return $this->db->get_where($tb,$where_array)->result();
	}
	function get_data_offset($tb,$start,$end)
	{
		
		$this->db->limit($end,$start);
		return $this->db->get($tb)->result();
	}
	
	function get_data_where($tb,$where_array)
	{
		$this->db->where($where_array);
		return $this->db->get($tb)->result();
	}
	
	function get_data_or_where_row($tb,$where,$where2)
	{
		$this->db->where($where);	
		$this->db->or_where($where2);	
		return $this->db->get($tb)->row();
	}
	
	function get_data_one_with($tb,$by)
	{
		$this->db->limit("1");
		$this->db->order_by($by, "desc");
		return $this->db->get($tb)->result();
	}
	
	function getDataSelect($tb,$select)
	{
		$this->db->select($select);
		return $this->db->get($tb)->result();
	}
	
	function get_data_select($tb,$where_array,$select)
	{
		$this->db->select($select);
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function get_data_select_asc($tb,$where_array,$select,$by)
	{
		$this->db->select($select);
		$this->db->order_by($by, "asc");
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function get_data_select3where($tb,$where,$where2,$where3,$select)
	{
		$this->db->select($select);
		$this->db->where($where3);
		$this->db->or_where($where);
		$this->db->or_where($where2);
		return $this->db->get($tb)->result();
	}
	
	function get_trend_post($tb,$where_array,$select,$by,$limit)
	{
		$this->db->limit($limit);
		$this->db->order_by($by, "desc");
		$this->db->select($select);
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function custom_query($query)
	{
		return $this->db->query($query)->result();
		///return $this->db->get_where($tb,$where_array)->result();
	}
	function custom_query2($query)
	{
		return $this->db->query($query);
		///return $this->db->get_where($tb,$where_array)->result();
	}
	function get_data_multiple_select($tb,$where_array,$select)
	{
		$this->db->select($tb.".*")->select('('.$select.') as ch',FALSE);
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	
	public function get_data_row($tb,$where){
		return $this->db->get_where($tb,$where)->row();
		
	}
	
	public function get_data_or_where($tb,$where,$where2)
	{
		$this->db->where($where);
		$this->db->or_where($where2);
		return $this->db->get($tb)->result();
		
	}
	
	public function get_data_in_where($tb,$where,$where2)
	{
		$this->db->where($where);
		$this->db->or_where($where2);
		return $this->db->get($tb)->result();
		
	}
	
	public function get_data_or_where_select($tb,$where,$where2,$select)
	{
		$this->db->select($select);
		$this->db->where($where);
		$this->db->or_where($where2);
		return $this->db->get($tb)->result();
		
	}
	
	public function get_data_where_select_asc($tb,$where,$where2,$select,$by)
	{
		$this->db->select($select);
		$this->db->where($where);
		$this->db->where($where2);
		$this->db->order_by($by, "asc");
		return $this->db->get($tb)->result();
		
	}
	
	public function get_data_in_where_select($tb,$where,$where2,$select)
	{
		$this->db->select($select);
		$this->db->where($where);
		$this->db->where_in($where2);
		return $this->db->get($tb)->result();
		
	}
	
	public function get_data_or_where_select_main($tb,$where2,$select,$main_where)
	{
		$this->db->select($select);
		$this->db->where($where2);
		return $this->db->get_where($tb,$main_where)->result();
		
		
	}
	
	function getDataLatest($tb,$by)
	{	
		$this->db->order_by($by, "desc");
		return $this->db->get($tb)->result();
	}
	
	function getDataLatestWhere($tb, $where_array, $by)
	{	
		$this->db->order_by($by, "desc");
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function get_data_latest_where_asc($tb,$where_array,$by,$select)
	{
		$this->db->select($select);
		$this->db->order_by($by, "asc");
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function get_data_latest_where_asc_limit($tb,$where_array,$by,$select,$start,$end)
	{
		$this->db->select($select);
		$this->db->limit($end,$start);
		$this->db->order_by($by, "asc");
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function get_data_latest_where_desc($tb,$where_array,$by,$select)
	{
		$this->db->select($select);
		$this->db->order_by($by, "desc");
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	function get_data_latest_where_random($tb,$where_array,$by,$select)
	{
		$this->db->select($select);
		$this->db->order_by($by, "random");
		return $this->db->get_where($tb,$where_array)->result();
	}
	
	public function get_joins_where($table, $columns, $joins,$where)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_where_desc($table, $columns, $joins,$where,$by)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->order_by($by, "desc");
		return $this->db->get_where($table,$where)->result();
	}
	public function get_joins_where_asc($table, $columns, $joins,$where,$by)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->order_by($by, "asc");
		return $this->db->get_where($table,$where)->result();
	}
	public function get_joins_where_desc_random($table, $columns, $joins,$where,$by)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->order_by($by, "random");
		$this->db->limit(10);
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_where_desc_scroll($table, $columns, $joins,$where,$by,$start,$end)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->limit($end,$start);
		$this->db->order_by($by, "desc");
		return $this->db->get_where($table,$where)->result();
	}
	public function get_joins_where_type_scroll($table, $columns, $joins,$where,$by,$start,$end,$type)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->limit($end,$start);
		$this->db->order_by($by, $type);
		return $this->db->get_where($table,$where)->result();
	}
	
	
	public function get_joins_where_like($table, $columns, $joins,$where,$like,$by)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->like('product_name',$like);
		$this->db->order_by($by, "desc");
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_where_group($table, $columns, $joins,$where,$group_by)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->group_by($group_by);
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_group_by_where($table, $columns, $joins, $by ,$group_by,$where)
	{
		$this->db->select($columns);	
		
		if (is_array($joins) && count($joins) > 0){			
			foreach($joins as $k => $v){	
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		}
		$this->db->order_by($by, "desc");
		$this->db->group_by($group_by);	
	
		return $this->db->get_where($table,$where)->result();
	}
	public function get_joins_group_by_asc($table, $columns, $joins, $by ,$group_by,$where)
	{
		$this->db->select($columns);	
		
		if (is_array($joins) && count($joins) > 0){			
			foreach($joins as $k => $v){	
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		}
		$this->db->order_by($by, "asc");
		$this->db->group_by($group_by);	
	
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_group_where($table, $columns, $joins,$group_by,$where,$where2)
	{
		$this->db->select($columns);	
		if (is_array($joins) && count($joins) > 0){			
			foreach($joins as $k => $v){	
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		}
		//$this->db->group_by($group_by);	
		$this->db->where($where);	
		$this->db->or_where($where2);	
	
		return $this->db->get($table)->result();
	}
	
	public function get_joins_group_where_custom_by($table, $columns, $joins,$group_by,$where,$by)
	{
		$this->db->select($columns);	
		if (is_array($joins) && count($joins) > 0){			
			foreach($joins as $k => $v){	
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		}
		$this->db->group_by($group_by);
		$this->db->order_by($by, "desc");		
		$this->db->where($where);	
	
		return $this->db->get($table)->result();
	}
	
	
	public function get_joins_trending_post($table, $columns, $joins,$where,$by,$limit)
	{
		$this->db->select($columns);	
		
		if (is_array($joins) && count($joins) > 0){			
			foreach($joins as $k => $v){	
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		}
		$this->db->order_by($by, "desc");
		$this->db->limit($limit);	
	
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_where_desc_scroll_custom($table, $columns, $joins,$where,$by,$start,$end,$type)	{
		
		$this->db->select($columns);
		if (is_array($joins) && count($joins) > 0)	
		{			
			foreach($joins as $k => $v)	
			{	
				
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		
		}
		$this->db->limit($end,$start);
		$this->db->order_by($by, $type);
		return $this->db->get_where($table,$where)->result();
	}
	
	public function get_joins_where_row($table , $columns, $joins, $where)
	{
		$this->db->select($columns);	
		if (is_array($joins) && count($joins) > 0){			
			foreach($joins as $k => $v){	
				$this->db->join($v['table'], $v['condition'], $v['jointype'], false);		
			}
		}	
		return $this->db->get_where($table,$where)->row();
	}
}
