<?php
/* @var $this SiteController */
/*
$this->breadcrumbs=array(
	'public interior',
);
*/
include_once 'lib/core.php';

$img_dir='public_interior';

$default_active_menu_item = 'homnet';

$menu_items=array(
    'homnet'=>array(    'name'=>'Офис компании «Хомнет-Лизинг»',
                        'info'=>'2012-2013 г. 450 м.кв.',
                        'numImg'=>5 ),

    'kamatsu'=>array(   'name'=>'Офис компании «KOMATSU»',
                        'info'=>'2012 г. 2500 м.кв.',
                        'marginLeft'=>'11px',
                        'numImg'=>7 ),

    'kasper'=>array(    'name'=>'Офис компании «Лаборатория Касперского»',
                        'info'=>'2007-2010 г. 10 500 м.кв.',
                        'marginLeft'=>'25px',
                        'numImg'=>6 ),

    'hcred'=>array(     'name'=>'Банк «HOME CREDIT»',
                        'info'=>'2003-2007 г. 100 отделений',
                        'numImg'=>5 ),

    'aqualeto'=>array(  'name'=>'Спортивный клуб-отель «Акватория лета»',
                        'info'=>'2... г. 5 000 кв.м. 82 номера различных категорий',
                        'marginLeft'=>'25px',
                        'numImg'=>6 ),

    'rrg'=>array(       'name'=>'Офис компании «RRG»',
                        'info'=>'2000-2001 г. 450 м.кв.',
                        'marginLeft'=>'87px',
                        'numImg'=>4 ),

    'cmg'=>array(       'name'=>'Офис компании «CMG»' ),

    'metall'=>array(    'name'=>'Офис компании «Металлолайн»' ),
);

$view = new InnerView($img_dir, $default_active_menu_item, $menu_items);
echo $view->view();