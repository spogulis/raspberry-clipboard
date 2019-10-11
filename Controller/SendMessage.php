<?php
    class SendMessage extends Controller 
    {
        public function index() 
        {
            //Show product list view
            $this->getView('main', []);
        }

        public function submit()
        {
            //Navigate to Add Product page upon successful record insertion
            if (!empty($_POST))
            {
                $msg = $_POST['messageInput'];
                $file = fopen('../Persistency/message.txt', "w");
                fwrite($file, $msg);
            }
            
            header('Location: /');
        }
    }
?>