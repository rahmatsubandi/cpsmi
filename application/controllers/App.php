<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends MX_Controller
{
	function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model([
            'SettingModel',
            'ModuleModel',
            'StatisticModel',
            '../modules/contact/models/ContactModel'
        ]);
        $this->template->set_template($this->app()->template_frontend);
        $this->handleActiveModule();
        $this->createStatistic();
    }

	public function app() {
        $appData = $this->SettingModel->getAll();
        $config = array();
        
        if (count($appData) > 0) {
            foreach ($appData as $index => $item) {
                $config[$item->data] = $item->content;
            };
        };

        $activeClass = $this->router->fetch_class();
        $config['active_module'] = $this->getModule($activeClass);

        $contact = json_decode($this->ContactModel->getObject());
        $config['contact'] = $contact;

        return (object) $config;
    }

    public function getModule($path) {
        return $this->ModuleModel->getDetail('path', $path);
    }

    public function handleActiveModule() {
        $module = (!is_null($this->app()->active_module)) ?  (int) $this->app()->active_module->is_active : null;

        if ($module !== 1 && !is_null($module)) {
            show_404();
        };
    }
    
    public function handle_ajax_request() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        };
    }

    public function createStatistic() {
        $data = array(
            'controller' => $this->router->fetch_class(),
            'url' => base_url(uri_string()),
            'ip' => $this->getUserIP(),
            'agent' => $this->getUserAgent(),
            'os' => $this->agent->platform(),
            'region' => $this->getIpInfo($this->getUserIP(), 'Country'),
        );
        return $this->StatisticModel->insert($data);
    }

    private function getUserIP() {
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
            $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
        };

        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        };

        return $ip;
    }

    private function getUserAgent() {
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser().' '.$this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified';
        };

        return $agent;
    }

    private function getIpInfo($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
        $output = NULL;
        if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
            $ip = $_SERVER["REMOTE_ADDR"];
            if ($deep_detect) {
                if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
        }
        $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
        $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
        $continents = array(
            "AF" => "Africa",
            "AN" => "Antarctica",
            "AS" => "Asia",
            "EU" => "Europe",
            "OC" => "Australia (Oceania)",
            "NA" => "North America",
            "SA" => "South America"
        );
        if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
            $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
            if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
                switch ($purpose) {
                    case "location":
                        $output = array(
                            "city"           => @$ipdat->geoplugin_city,
                            "state"          => @$ipdat->geoplugin_regionName,
                            "country"        => @$ipdat->geoplugin_countryName,
                            "country_code"   => @$ipdat->geoplugin_countryCode,
                            "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                            "continent_code" => @$ipdat->geoplugin_continentCode
                        );
                        break;
                    case "address":
                        $address = array($ipdat->geoplugin_countryName);
                        if (@strlen($ipdat->geoplugin_regionName) >= 1)
                            $address[] = $ipdat->geoplugin_regionName;
                        if (@strlen($ipdat->geoplugin_city) >= 1)
                            $address[] = $ipdat->geoplugin_city;
                        $output = implode(", ", array_reverse($address));
                        break;
                    case "city":
                        $output = @$ipdat->geoplugin_city;
                        break;
                    case "state":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "region":
                        $output = @$ipdat->geoplugin_regionName;
                        break;
                    case "country":
                        $output = @$ipdat->geoplugin_countryName;
                        break;
                    case "countrycode":
                        $output = @$ipdat->geoplugin_countryCode;
                        break;
                }
            }
        }
        return $output;
    }
}
