<?php
    class App
    {
        //Default routing options
        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];

        public function __construct()
        {
            //Parse URL
            $url = $this->parseUrl();
            //Check if controller name entered in URL and set $controller variable to it if true
            if (file_exists('../Controller/' . $url[0] . '.php')) 
            {
               
                $this->controller = $url[0];
                unset($url[0]);
            }

            //Require specified or default controller
            require_once('../Controller/' . $this->controller . '.php');

            //Create a controller object
            $this->controller = new $this->controller;

            //Check if url method is set
            if (isset($url[1])) 
            {
                if (method_exists($this->controller, $url[1])) 
                {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            //Set params or empty array if null
            $this->params = $url ? array_values($url) : [];

            //Call controller/method/params
            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl() 
        {
            if (isset($_GET['url'])) 
            {
                // return $url = explode('/',filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
                $urlWithForwardSlashes = str_replace('\\', '/', getcwd());
                $urlWithoutFilePath =  str_replace($urlWithForwardSlashes, '', $_GET['url']);
                $urlWithoutRightSlash = rtrim($urlWithoutFilePath, '/');
                $urlFiltered = filter_var($urlWithoutRightSlash, FILTER_SANITIZE_URL);
                $urlArray = explode('/', $urlFiltered);
                $urlWithoutEmptyArrayEl = array_filter($urlArray, 'strlen');
                $urlArrayFixedIndexes = array_values($urlWithoutEmptyArrayEl);
               
                return $urlArrayFixedIndexes;
               
            }
        }
    }

?>