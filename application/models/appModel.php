<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AppModel extends CI_Model
{
  function getData_dtAjax($config) {
		/**
		How to use? Call from controller.
		
		// Example
		$static_conditional = array(
			// 'col1_example' => 'value_col1_example',
			// 'col2_example' => 'value_col2_example',
		);

		// Specific condition or remove if no have
		$static_conditional_spec = array();
		if ( $this->session->userdata('type') == 'R04' ) {
			$static_conditional_spec = array(
				'SPVNIK' => $this->session->userdata('nik'),
			);
		};

		$dtAjax_config = array(
			'table_name'              => 'table_name',
			'static_conditional'      => $static_conditional,
			'static_conditional_spec' => $static_conditional_spec,
		);

		$response = $this->Public_models->getData_dtAjax( $dtAjax_config );

		echo json_encode( $response );
		// END - Example
		*/

		// Retrive from request header
		$draw    = $_REQUEST['draw'];
		$length  = $_REQUEST['length'];
		$start   = $_REQUEST['start'];
		$search  = $_REQUEST['search']['value'];
		$order   = $_REQUEST['order'][0];
		$columns = $_REQUEST['columns'];

		// Get config
		$table_name              = ( isset($config['table_name']) ) ? $config['table_name'] : null;
		$order_column            = ( isset($config['order_column']) ) ? $config['order_column'] : 1; // You can set to action column for default order by query
		$order_direction         = ( isset($config['order_direction']) ) ? $config['order_direction'] : 'asc';
		$static_conditional      = ( isset($config['static_conditional']) ) ? $config['static_conditional'] : array();
		$static_conditional_spec = ( isset($config['static_conditional_spec']) ) ? $config['static_conditional_spec'] : array();
		$filter_conditional      = array();

		// Get client params
		foreach ( $columns as $key => $item ) {
			$columnItem[] = $item['data'];

			// Set filter by datatable column
			if ( !empty($item['search']['value']) ) {
				$search_value = trim(stripslashes($item['search']['value']), '^$');
				$search_value = ( $search_value == 'null' ) ? null : $search_value;

				$filter_conditional[$item['data']] = $search_value;
			};
		};

		// Get column for search
		foreach ( $columnItem as $key => $item ) {
			if ( !empty($item) && !in_array($item, ['no']) ) {
				$columnSearch[$item] = $search;
			};
		};

		// Set order by
		$orderBy  = $columnItem[$order['column']];
		$orderBy  = ( !in_array($order['column'], [0]) ) ? $columnItem[$order['column']] : $columnItem[$order_column];
		$orderDir = ( !in_array($order['column'], [0]) ) ? $order['dir'] : $order_direction;
		$response = array();

		$conditional = array_merge( $static_conditional, $static_conditional_spec, $filter_conditional );

		// Set conditional for get rows count
		if ( count($conditional) > 0 ) {
			$this->db->where($conditional);
		};

		$totalRow = $this->db->count_all_results($table_name);

		$response['draw'] = $draw;
		$response['recordsTotal'] = $response['recordsFiltered'] = $totalRow;
		$response['data'] = array();

		if ( !empty($search) ) {
			$this->db->or_like($columnSearch);
		};
		
		// Set conditional for get rows data
		if ( count($conditional) > 0 ) {
			$this->db->where($conditional);
		};

		$this->db->limit($length, $start);
		$this->db->order_by($orderBy, $orderDir); // Uncomment for dynamic order by first column in datatables

		$query = $this->db->get($table_name);

		if ( !empty($search) ) {
			$this->db->or_like($columnSearch);
			$results = $this->db->get($table_name);
			$response['recordsTotal'] = $response['recordsFiltered'] = $results->num_rows();
		};

		// Fetch data
		foreach ( $query->result_array() as $item ) {
			$response['data'][] = $item;
		};
		
		$response['filter_cond'] = $filter_conditional;
		$response['column_rendered'] = $columnSearch;

		return $response;
	}
}
