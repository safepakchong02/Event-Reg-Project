<?php
    namespace ResponseObj;
    class responseObject{

        private $code;
        private $msg;
        private $data;
        public function __construct($code, $msg, $data){
            $this->code = $code;
            $this->msg = $msg;
            $this->data = $data;
        }

        public function getResponse() {
            return [
                "code" => $this->code,
                "message" => $this->msg,
                "resultData" => $this->data,
            ];
        }
    }

?>