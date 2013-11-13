<?php

class Admin {

    public  $data;
    private $data_filename = 'data/data.xml';
    private $data_fields = array('key','name','info','num_images');

    public function readXML(){
        $this->data = simplexml_load_file($this->data_filename);
        var_dump($this->data);
    }

    public function saveXML(){
        //post data processing
        if( !empty($_POST) ){
            $data_xml = new SimpleXMLElement("<datum></datum>");
            $pcount = 1;
            while( isset($_POST[ $this->data_fields[0] . $pcount ]) ){

                if( $_POST[ $this->data_fields[0] . $pcount ] == '' ){ $pcount++; continue; }

                $data_xml = $data_xml->addChild('data');
                $data_xml->addAttribute('id', $pcount);

                foreach( $this->data_fields as  $count => $field ){
                    $data_xml->addChild($field, $_POST[ $field . $pcount ]);
                }

                $pcount++;
            }

            if(($file = fopen($this->data_filename,'w+')) && ($pcount > 1) )
                fwrite($file, $data_xml->asXML());
        }
    }
}