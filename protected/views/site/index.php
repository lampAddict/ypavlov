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
<!-- landing -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<div id="landing" <?= (isset($_GET['r']) && ($_GET['r'] == 'site/index') ? 'style="display:none"' : 'class="landing"') ?>onclick="$('#landing:visible').hide(); window.location='index.php?r=site/index'">
    <div class="frame">
        <img class="logo" src="images/_landing.jpg" alt="Посетить сайт" title="Посетить сайт"/>
    </div>
</div>
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