<?php

class Admin {

    public  $data;

    private $data_filename = 'data/site.xml';
    private $data_fields = array('key','name','info','num_images');

    public function readXML($filename){
        $this->data = simplexml_load_file($filename);
    }

    public function saveXML($data_xml){
        if( $file = fopen($this->data_filename,'w+') )
            fwrite($file, $data_xml->asXML());
    }
}