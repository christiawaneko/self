<?php

class Application
{

    //default
    protected $url_controller   = 'HomeController';
    protected $url_method       = 'index';
    protected $url_params       = [];

    public function __construct()
    { 
        $this->splitUrl();
        
        
        if (!$this->url_controller) {
            
            require APP . 'Controller/HomeController.php';
            $page = new HomeController();
            $page->index();

        } elseif (file_exists(APP . 'Controller/' . $this->url_controller . '.php')) {
            
            // echo 'file tersedia';
            require_once APP. 'Controller/'. $this->url_controller.'.php';
            $this->url_controller = new $this->url_controller;

            if (method_exists($this->url_controller, $this->url_method)) {

                if (!empty($this->url_params)) {
                    call_user_func_array(array($this->url_controller, $this->url_method), $this->url_params);
                } else {
                    $this->url_controller->{$this->url_method}();
                }

            } else {
                if (strlen($this->url_method) == 0) {
                    $this->url_controller->index();
                }
                else {
                    return require_once APP. 'View/Error/404.php';
                }
            }


        } else {
            return require_once APP. 'View/Error/404.php';
        }

    }

    
    private function splitUrl()
    {
        if (isset($_GET['url'])) {

            $url = trim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->url_controller = isset($url[0]) ? $url[0].'Controller' : null;
            $this->url_method = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->url_params = array_values($url);

            #for debugging. uncomment this if you have problems with the URL
            // echo 'Controller: ' . $this->url_controller . '<br>';
            // echo 'Action: ' . $this->url_method . '<br>';
            // echo 'Parameters: ' . print_r($this->url_params, true) . '<br>';
        }
    }
}
