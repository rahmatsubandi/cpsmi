<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | Template List
  |--------------------------------------------------------------------------
  |
  | The $template['active_template'] setting lets you choose which template
  | group to make active.  By default there is only one group (the
  | "default" group).
  |
 */

$template = array(
  'active_template' => 'rapid', // FrontEnd

  // BackEnd
  'material_admin' => array(
    'category'       => 'backend',
    'name'           => 'Material Admin 2.6',
    'publisher'      => 'Sani Malik Ibrahim',
    'publisher_link' => 'http://tasik.dev',
    'template'       => '../theme_layouts/material_admin/main',
    'regions'        => array('title', 'content'),
    'parser'         => 'parser',
    'parser_method'  => 'parse',
    'parse_template' => TRUE
  ),

  // FrontEnd
  'rapid' => array(
    'category'       => 'frontend',
    'name'           => 'Rapid',
    'publisher'      => 'BootstrapMade',
    'publisher_link' => 'https://bootstrapmade.com/',
    'template'       => '../theme_layouts/rapid/main',
    'regions'        => array('title', 'content'),
    'parser'         => 'parser',
    'parser_method'  => 'parse',
    'parse_template' => TRUE
  ),
  'my_portfolio' => array(
    'category'       => 'frontend',
    'name'           => 'My Portfolio',
    'publisher'      => 'BootstrapMade',
    'publisher_link' => 'https://bootstrapmade.com/',
    'template'       => '../theme_layouts/my_portfolio/main',
    'regions'        => array('title', 'content'),
    'parser'         => 'parser',
    'parser_method'  => 'parse',
    'parse_template' => TRUE
  ),
  'enlight' => array(
    'category'       => 'frontend',
    'name'           => 'Enlight',
    'publisher'      => 'ProBootstrap',
    'publisher_link' => 'https://probootstrap.com/',
    'template'       => '../theme_layouts/enlight/main',
    'regions'        => array('title', 'content'),
    'parser'         => 'parser',
    'parser_method'  => 'parse',
    'parse_template' => TRUE
  )
);

/* End of file template.php */
/* Location: ./application/config/template.php */
