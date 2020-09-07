<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/AppBackend.php');

class Theme extends AppBackend
{
  function __construct()
  {
    parent::__construct();
    $this->load->model(['SettingModel']);
  }

  public function index()
  {
    $data = array(
      'app' => $this->app(),
      'main_js' => $this->load_main_js('theme'),
      'card_title' => 'Themes',
      'data' => $this->getThemes()
    );
    $this->template->set('title', 'Themes | ' . $data['app']->app_name, TRUE);
    $this->template->load_view('theme/index', $data, TRUE);
    $this->template->render();
  }

  private function getThemes()
  {
    include(APPPATH . 'config/template' . '.php');
    $template = (object) $template;
    $frontend = array();

    if ($count = (is_array($template)) ? count($template) : 0); {
      foreach ($template as $key => $item) {
        if (isset($item['category']) && $item['category'] == 'frontend') {
          $frontend[$key] = array(
            'name' => (isset($item['name'])) ? $item['name'] : 'Undefined',
            'path' => $key,
            'publisher' => (isset($item['publisher'])) ? $item['publisher'] : 'Undefined',
            'publisher_link' => (isset($item['publisher_link'])) ? $item['publisher_link'] : 'Undefined',
            'screenshot' => $this->getScreenshot($key)
          );
        };
      };
    };

    return $frontend;
  }

  private function getScreenshot($path)
  {
    $screenshot = array();
    $count = 0;
    $directory = APPPATH . '../themes/' . $path . '/screenshot/';

    if (file_exists($directory) && is_dir($directory)) {
      if ($handle = opendir($directory)) {
        while (false !== ($entry = readdir($handle))) {
          if (!in_array($entry, array('.', '..')) && !is_dir($directory . $entry)) {
            $ext = substr($entry, strrpos($entry, '.') + 1);
            if (in_array($ext, array('jpg', 'jpeg', 'png', 'gif'))) {
              $screenshot[] = base_url() . 'themes/' . $path . '/screenshot/' . $entry;
              $count++;
            };
          };
        };
        closedir($handle);
      };
    };

    if ($count === 0) {
      $screenshot[0] = base_url() . 'directory/theme/no-image.png';
    };

    return $screenshot;
  }

  public function ajax_detail($name = null)
  {
    $this->handle_ajax_request();

    if (!is_null($name)) {
      $themes = $this->getThemes();
      $theme = (isset($themes[$name])) ? $themes[$name] : false;

      if ($theme !== false) {
        echo json_encode(array('status' => true, 'data' => $theme));
      } else {
        $errors = 'Theme is not available.';
        echo json_encode(array('status' => false, 'data' => $errors));
      };
    } else {
      $errors = 'Specific parameter is required.';
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }

  public function ajax_save($name = null)
  {
    $this->handle_ajax_request();

    if (!is_null($name)) {
      echo json_encode($this->SettingModel->updateRecord('template_frontend', $name));
    } else {
      $errors = 'Specific parameter is required.';
      echo json_encode(array('status' => false, 'data' => $errors));
    };
  }
}
