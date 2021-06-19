<?php defined('BASEPATH') or exit('No direct script access allowed');

class UtilityHelper
{

	private $CI;
	function __construct()
	{
		$this->CI = &get_instance();
	}


	// order by  added example = order by name asc
	public static function get_dropdown_value($table, $field1, $field2, $condition = '', $limitstart = '', $limit = '', $order_by = '')
	{

		global $CI;

		$value = array();
		$sql = 'Select ' . $field1 . ', ' . $field2 . ' From ' . $table;

		$sql .= (strlen($condition) > 0) ? ' where ' . $condition : '';

		$sql .= (strlen($order_by) > 0) ? ' ' . $order_by : '';

		if (strlen($limitstart) > 0) {

			$sql .= " LIMIT {$limitstart}";

			if (strlen($limit) > 0) {

				$sql .= "," . $limit;
			}
		}

		//echo $sql; exit;

		$data = $CI->db->query($sql);

		if ($data->num_rows() > 0) {

			foreach ($data->result_array() as $r) {

				$value[$r[$field1]] = $r[$field2];
			}
		}

		return $value;
	}

}
