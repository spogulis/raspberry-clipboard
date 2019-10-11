<?php
    class Home extends Controller {
        public function index() {
            //Get latest msg
            $msg = file_get_contents('../Persistency/message.txt');
            
            //Show home view
            $this->getView('main', ['latestMessage' => $msg]);
        }
    }
?>