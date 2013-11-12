<?php
/* @var $this SiteController */
/*
$this->breadcrumbs=array(
	'private interior',
);
*/
include_once 'lib/core.php';

$img_dir='private';

$default_active_menu_item = 'ktyazh';

$menu_items=array(
    'ktyazh'=>array(    'name'=>'Коттедж деревня «Каменное-Тяжино»',
                        'info'=>'2008-2009 г. 300 м.кв.',
                        'numImg'=>5 ),

    'zykeevo'=>array(   'name'=>'Загородный дом деревня «Зыкеево»',
                        'info'=>'2013 г. 500 м.кв.',
                        'marginBlockLeft'=>'475px',
                        'marginLeft'=>'50px',
                        'numImg'=>2 ),

    'arub'=>array(      'name'=>'Квартира на Рублевском шоссе',
                        'info'=>'2010 г. 120 м.кв.',
                        'marginLeft'=>'50px',
                        'numImg'=>5 ),

    'yusupovo'=>array(  'name'=>'Таунхаус «Юсупово life park»',
                        'info'=>'2013 г. 130 м.кв.',
                        'marginLeft'=>'25px',
                        'numImg'=>6 ),

    'asev'=>array(      'name'=>'Квартира на Севастопольском проспекте' ),

    'acosv'=>array(     'name'=>'Квартира на улице Космонавта Волкова' ),

    'app'=>array(       'name'=>'Квартира на Патриарших прудах' ),

    'tlet'=>array(      'name'=>'Таунхаус в Летово' ),
);

$view = new InnerView($img_dir, $default_active_menu_item, $menu_items);
echo $view->view();

