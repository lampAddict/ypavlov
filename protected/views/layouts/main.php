<?php
/* @var $this Controller */
include_once('lib/admin.php');

$admin = new Admin();
global $menu;
$menu = $admin->get_menu_items();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <script src="/ckeditor/ckeditor.js"></script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<img src="images/logo.jpg"/>
			<?php //echo CHtml::encode(Yii::app()->name); ?>
		</div>
	</div><!-- header -->
    <?
    function check_active_menu_link($get, $key){
        return (isset($get['r']) && ($get['r'] == $key) ? 'class="active"' : '');
    }
    function show_menu_item($index){
        global $menu;
        if( isset($menu[$index]) )
            return $menu[$index];
        else
            return 'Menu build fail';
    }
    ?>
	<div id="mainmenu">
        <table class="menu">
            <tr>
                <td <?= check_active_menu_link($_GET, 'site/index') ?>>
                    <a class="textBold" href="index.php?r=site/index"><?=show_menu_item(0)?></a>
                </td>
                <td <?= check_active_menu_link($_GET, 'site/public_interior') ?> style="text-align:center">
                    <a class="textBold" href="index.php?r=site/public_interior" style="margin-right: 60px;"><?=show_menu_item(1)?></a>
                </td>
                <td <?= check_active_menu_link($_GET, 'site/private_interior') ?> style="text-align:center">
                    <a class="textBold" href="index.php?r=site/private_interior" style="margin-left: 34px;" ><?=show_menu_item(2)?></a>
                </td>
                <td <?= check_active_menu_link($_GET, 'site/projects') ?> style="text-align:center">
                    <a class="textBold" href="index.php?r=site/projects"  style="margin-left: 76px;">проекты</a>
                </td>
                <td <?= check_active_menu_link($_GET, 'site/partners') ?> style="text-align:center">
                    <a class="textBold" href="index.php?r=site/partners" style="margin-left: 33px;">партнёры</a>
                </td>
                <td <?= check_active_menu_link($_GET, 'site/contact') ?> style="text-align:right">
                    <a class="textBold" href="index.php?r=site/contact" style="margin-right: 142px;">контакты</a>
                </td>
            </tr>
        </table>
		<?php
		/*$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'о мастерской', 'url'=>array('/site/index')),
				array('label'=>'общественные интерьеры', 'url'=>array('/site/public_interiors')),
				array('label'=>'частные интерьеры', 'url'=>array('/site/private_interiors')),
				array('label'=>'проекты', 'url'=>array('/site/projects')),
				array('label'=>'партнёры', 'url'=>array('/site/partners')),
				array('label'=>'контакты', 'url'=>array('/site/contact'))
			),
		)); */?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?><!-- breadcrumbs -->
	<?php endif?>
    <script type="text/javascript">
        function hideGallery(){

            $('#gallery').hide();

            if( $('#preview1:hidden') )
                hidePreview(false);

            $('#galContainer').attr('src','');

            $('#close').css('marginRight', 0);
            $('#close').css('marginTop', 0);
            $('#close').hide();

            $('#ra').css('marginRight', 0);
            $('#ra').hide();

            $('#la').css('marginLeft', 0);
            $('#la').hide();

            return false;
        }
    </script>
    <div id="gallery" class="gallery">
        <img id="galContainer" class="galContainer"/>
        <div id="close" class="close" onclick="hideGallery();"></div>
        <img id="la" class="la" src="images/la.png" />
        <img id="ra" class="ra" src="images/ra.png" />
    </div>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		<div style="float:left; width:50%; text-align:left; top: -7px; position: relative;"><img class="social" src="images/facebook.png" alt="Facebook"/></div>
		<div class="mail">pavlovarchitect@mail.ru</div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>