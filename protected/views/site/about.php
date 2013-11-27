<?php
/* @var $this SiteController */
//$this->pageTitle=Yii::app()->name;
/*
$this->breadcrumbs=array(
	'news',
);
*/
include_once('lib/admin.php');

$admin = new Admin();
$admin->get_content();
?>
<?php //echo CHtml::encode(Yii::app()->name); ?>
<?php //echo __FILE__; ?>
<?php //echo $this->getLayoutFile('main'); ?>
<!-- main content -->
<div style="width:100%; min-width:1333px">
    <div class="imgyp">
        <img src="images/yp.jpg" style="width:85px" alt="Ярослав Павлов архитектор" title="Ярослав Павлов архитектор" />
    </div>
    <div class="leftcol">
        <?=$admin->page_content;?>
    </div>
    <div class="indeximg">
        <img class="shadow" src="images/indeximg.jpg"/>
    </div>
</div>