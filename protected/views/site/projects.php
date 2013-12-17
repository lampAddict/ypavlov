<?php
include_once 'lib/core.php';

$img_dir='projects';

$default_active_menu_item = 'chulkovo';

$menu_items=array(
    'chulkovo'=>array(  'name'=>'Коттеджный поселок «Чулково-клаб»',
                        'info'=>'2009-2011 г.',
                        'marginLeft'=>'25px',
                        'numImg'=>6 ),

    'nahabino'=>array(  'name'=>'Реконструкция торгового центра в «Нахабино»',
                        'info'=>'2012 г.',
                        //'marginBlockLeft'=>'475px',
                        'numImg'=>5 ),

);

$view = new InnerView($img_dir, $default_active_menu_item, $menu_items);
echo $view->view();