<?php
    class Controller 
    {
        public function __construct()
        {
            $filePath = '../Model/storage/message.php';
            if (file_exists($filePath))
            {
                require_once($filePath);
            }
        }

        public function createMessageModel($model)
        {
            $filePath = '../Model/' . $model . '.php';

            if (file_exists($filePath)) 
            {
                require_once($filePath);
            }

            return new $model();
        }

        public function getView($view, $data = []) 
        {
            $filePath = '../View/' . $view . '.php';

            if (file_exists($filePath)) 
            {
                require_once($filePath);
            }
        }
    }
?>