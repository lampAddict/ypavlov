<?php

class Admin {

    public  $data=null;

    private $data_filename = 'data/site.xml';
    //private $data_fields = array('key','name','info','num_images');

    public function readXML($filename = 'data/site.xml'){
        $this->data = simplexml_load_file($filename);
    }

    public function saveXML($data_xml){
        if( $file = fopen($this->data_filename,'w+') )
            fwrite($file, $data_xml->asXML());
    }

    public $page_content = '';
    public function get_content(){
        $this->readXML();
        foreach( $this->data->sections->section as $section ){
            if( strpos(Yii::app()->request->url, (string)$section['page'] ) !== false ){
                $this->page_content = $section->content;
                break;
            }
        }
    }

    public function get_menu_items(){
        $menu_items = array();
        $this->readXML();
        foreach( $this->data->sections->section as $section ){
            $menu_items[] = (string)$section->name;
        }
        return $menu_items;
    }
}