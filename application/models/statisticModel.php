<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatisticModel extends CI_Model
{
  public function getStatistic() {
    return $this->db->get('view_statistic')->row();
  }

  public function getByPeriod($year = null, $formated = false) {
    $query = "
      select (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 1
        ) as b1
      ) as januari, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 2
        ) as b2
      ) as februari, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 3
        ) as b2
      ) as maret, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 4
        ) as b2
      ) as april, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 5
        ) as b2
      ) as mei, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 6
        ) as b2
      ) as juni, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 7
        ) as b2
      ) as juli, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 8
        ) as b2
      ) as agustus, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 9
        ) as b2
      ) as september, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 10
        ) as b2
      ) as oktober, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 11
        ) as b2
      ) as november, (
        select count(*)
        from (
          select *
          from view_statistic_detail
          where tahun = '".$year."' and bulan = 12
        ) as b2
      ) as desember
      from view_statistic_detail
      limit 1
    ";
    $data = $this->db->query($query)->row();

    if ($formated === false) {
      $temp = [1=>0, 2=>0, 3=>0, 4=>0, 5=>0, 6=>0, 7=>0, 8=>0, 9=>0, 10=>0, 11=>0, 12=>0];
      if (count($data) > 0) {
        $month = 1;
        foreach ($data as $item) {
          $temp[$month++] = (int) $item;
        };
      };
      return $temp;
    } else {
      $temp = '[1,0],[2,0],[3,0],[4,0],[5,0],[6,0],[7,0],[8,0],[9,0],[10,0],[11,0],[12,0]';
      if (count($data) > 0) {
        $month = 1;
        $temp = '';
        foreach ($data as $item) {
          $temp .= '['.$month++.','.(int) $item.'],';
        };
        $temp = rtrim($temp, ',');
      };
      return $temp;
    };
  }

  public function getBlogRank() {
    return $this->db->order_by('visit_count', 'desc')->limit(4)->get('view_blog')->result();
  }

  public function getPageRank() {
    return $this->db->order_by('visit_count', 'desc')->limit(4)->get('page')->result();
  }

  public function insert($data) {
    $response = array('status' => false, 'data' => 'No operation.');

    try {
      $this->controller = $data['controller'];
      $this->url = $data['url'];
      $this->ip = $data['ip'];
      $this->agent = $data['agent'];
      $this->os = $data['os'];
      $this->region = $data['region'];
      $this->db->insert('statistic', $this);

      $response = array('status' => true, 'data' => 'Data has been saved.');
    } catch (\Throwable $th) {
      $response = array('status' => false, 'data' => 'Failed to save your data.');
    };

    return $response;
  }
}
