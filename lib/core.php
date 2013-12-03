<?php
/**
 * User: Makarov Roman
 * Date: 05.11.13
 * Time: 15:24
 */

include_once('interfaces.php');
include_once('admin.php');

class InnerView implements IView{

    private $img_dir = '';

    private $default_active_menu_item = '';

    private $menu_items = array();

    public function __construct($idir, $defmenuitem, $menuitems){
        $this->img_dir = $idir;
        $this->default_active_menu_item = $defmenuitem;
        $this->menu_items = $menuitems;
    }

    public function view(){
    ?>
    <div style="width:100%; margin:20px 0px; min-width:1065px; position:relative; z-index:1;">
        <div class="private_menu">
            <?
            $page_uri = Yii::app()->request->requestUri;
            //cut first /
            $page_uri = substr($page_uri, 1);
            //cut params
            $page_uri = explode('&', $page_uri);
            $page_uri = $page_uri[0];
            //cut duplicated parts
            $page_uri = substr($page_uri, strpos($page_uri,'index'));

            foreach($this->menu_items as $key=>$menu_item){

                if( isset($_GET['show']) && $_GET['show'] == $key  ){
                    $class = 'class="active textBold"';
                    $info_class = 'class="info_view"';
                }
                elseif( !isset($_GET['show']) && $key == $this->default_active_menu_item ){
                    $class = 'class="active textBold"';
                    $info_class = 'class="info_view"';
                }
                else{
                    $class = 'class="textBold"';
                    $info_class = 'class="info"';
                }

                $href = 'href="'.$page_uri.'&show='.$key.'"';
                if( !isset($menu_item['numImg']) ){
                    $href = '';
                    $class = 'class="inactive"';
                }

                echo'   <div class="menu_item">
                           <a '.$class.' '.$href.' >'.$menu_item['name'].'</a>
                           <div id="info'.$key.'" '.$info_class.'>
                           '.$menu_item['info'].'
                           </div>
                        </div>';
            }

            $show = isset($_GET['show']) ? $_GET['show'] : $this->default_active_menu_item;
            ?>
        </div>
        <div style="float:left; margin: 0 0 50px 30px; <?= isset($this->menu_items[$show]['marginBlockLeft']) ? 'margin-left:'.$this->menu_items[$show]['marginBlockLeft']: '' ?>">
            <script type="text/javascript">
                function hidePreview(hide){
                    var prevNum = parseInt($('#previewNum').val());
                    if( prevNum )
                        for( var i=1; i<=prevNum; i++ ){
                            if( hide )
                                $('#preview'+i).css('visibility', 'hidden');
                            else
                                $('#preview'+i).css('visibility', 'visible');
                        }
                }

                function showGallery( galname, index, maxNum ){

                    //assume minimum 1 preview image
                    if( $('#preview1:visible') )
                        hidePreview(true);

                    $('#gallery').show();

                    $('#galContainer').attr('src','images/<?=$this->img_dir ?>/' + galname + index + 'f.jpg');

                    $('#galContainer').load(
                        function (){

                            var aHeight =  $('#galContainer').innerHeight();

                            var galWidth = parseInt($('#galContainer').innerWidth());

                            var wWidth =  window.innerWidth;

                            var marginVal = parseInt(700/2 - galWidth/2);

                            $('#close').css('marginRight', marginVal + 'px' );
                            $('#close').css('marginTop', -parseInt(aHeight) + 'px' );

                            $('#close').show();


                            $('#la').css('marginTop', -parseInt(aHeight/2 + 25) + 'px' );
                            $('#la').css('marginLeft', marginVal + 'px' );
                            $('#la').attr('onclick','viewImages("'+galname+'", "'+index+'", "'+maxNum+'", "-")');
                            $('#la').show();

                            $('#ra').css('marginTop', -parseInt(aHeight/2 + 25) + 'px' );
                            $('#ra').css('marginRight', marginVal + 'px' );
                            $('#ra').attr('onclick','viewImages("'+galname+'", "'+index+'", "'+maxNum+'", "+")');
                            $('#ra').show();

                            $('#galContainer').unbind('load');
                        }
                    );
                }
                function viewImages(galName, index, maxNum, dir){

                    if( dir == '+' && parseInt(index) == parseInt(maxNum) )
                        index = 1;
                    else if( dir == '-' && parseInt(index) == 1 )
                        index = parseInt(maxNum);
                    else if( dir == '+' )
                        index = parseInt(index) + 1;
                    else if( dir == '-' )
                        index = parseInt(index) - 1;

                    $('#close').css('marginRight', 0);
                    $('#close').css('marginTop', 0);
                    $('#close').hide();

                    $('#ra').css('marginRight', 0);
                    $('#ra').hide();

                    $('#la').css('marginLeft', 0);
                    $('#la').hide();

                    showGallery(galName, index, maxNum);
                }
            </script>
            <?php

            if( isset($this->menu_items[$show]['numImg']) &&  intval($this->menu_items[$show]['numImg']) > 0 ){

                echo '<input id="previewNum" style="display: none" value="'.$this->menu_items[$show]['numImg'].'"/>';

                for($i=1; $i<=$this->menu_items[$show]['numImg']; $i++){
                    $file = 'images/'.$this->img_dir.'/'.$show.$i.'.jpg';
                    if(file_exists($file))
                        echo '	<div id="preview'.$i.'" class="preview" '.( isset($this->menu_items[$show]['marginLeft']) ? 'style="margin-left:'.$this->menu_items[$show]['marginLeft'].'"': '' ).' >
                                    <img id="'.$show.$i.'" src="'.$file.'" onmouseover="$(\'#'.$show.$i.'\').attr(\'src\',\'images/'.$this->img_dir.'/'.$show.$i.'c.jpg\');" onmouseout="$(\'#'.$show.$i.'\').attr(\'src\',\'images/'.$this->img_dir.'/'.$show.$i.'.jpg\');" onclick="showGallery(\''.$show.'\','.$i.','.$this->menu_items[$show]['numImg'].')"/>
                                </div>';
                }
            }

            ?>
        </div>
    </div>
    <?
    }
}

class AdminView extends Admin implements IView{

    private $params;

    public function __construct($data=null){
        $this->params = $data;
    }

    private $pwd_hash = '9834616805b5504f995d94231422a9b5';

    private $salt = 'read_sea_salt';

    private function auth(){

        //var_dump($_POST);

        if( !isset($_SESSION) ) session_start();

        if( isset($_POST['user']) && isset($_POST['pwd']) ){
            $usr = $_POST['user'];
            $pwd = $_POST['pwd'];

            $result = $pwd . $usr . $this->salt;
            $result = md5( $result );
            for( $j=1; $j<=3; $j++ ){
                $result .= $this->salt;
                $result = md5( $result );
            }

            if( $result == $this->pwd_hash ){
                $_SESSION['sign'] = $result;
            }
            else{
                unset($_SESSION['sign']);
                session_destroy();
            }
            unset($_POST);
        }

    }

    public function view(){

     $this->auth();

    if( !isset($_SESSION['sign']) || ( isset($_SESSION['sign']) && $_SESSION['sign'] != $this->pwd_hash) ){ ?>
        <a alt="Авторизация" title="Авторизация" class="loginout" href="#" onclick="showHideLoginForm()" style="background-image: url('images/_login.png'); background-repeat: no-repeat;"></a>
    <? }
    if( isset($_SESSION['sign']) && $_SESSION['sign'] == $this->pwd_hash ){ ?>
        <a alt="Выход" title="Выход" class="loginout" href="#" onclick="$('form#signout').submit(); return false;" style="background-image: url('images/_logout.png'); background-repeat: no-repeat;"></a>
        <div style="width:100%; float:left">
        <form id="signout" action="" method="POST">
            <input type="hidden" name="user" value=""/>
            <input type="hidden" name="pwd" value=""/>
        </form>
        </div>
    <? }

        if( !isset($_SESSION['sign']) || ( isset($_SESSION['sign']) && $_SESSION['sign'] != $this->pwd_hash) ){
            ?>
            <style>
                form {
                    width: 100px;
                    margin-left: 10px;
                }
                input[type="submit"]{
                    margin-left: 0px;
                }
                td{
                //padding: 3px;
                }
                .form-signin {
                    max-width: 300px;
                    padding: 19px 29px 29px;
                    margin: 0 auto 20px;
                    background-color: #fff;
                    border: 1px solid #e5e5e5;
                    -webkit-border-radius: 5px;
                    -moz-border-radius: 5px;
                    border-radius: 5px;
                    -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    box-shadow: 0 1px 2px rgba(0,0,0,.05);
                    width: 202px;
                }
                .form-signin .form-signin-heading,
                .form-signin .checkbox {
                    margin-bottom: 10px;
                }
                .form-signin input[type="text"],
                .form-signin input[type="password"] {
                    font-size: 16px;
                    height: auto;
                    margin-bottom: 15px;
                    padding: 7px 9px;
                }
                .inner{
                    padding: 8px 10px 0px 0px;
                }
                .tint {
                    position: fixed;
                    left: 0;
                    top: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0,0,0,.4);
                    z-index: 1000;
                    display: none;
                }
                .auth {
                    z-index: 1000;
                    display: none;
                    position: fixed;
                    top: 185px;
                    left: 40%;
                }
                .cross{
                    font-family: arial;
                    font-size: 1.5em;
                    line-height: 1;
                    color: #999;
                    position: relative;
                    left: 11.5em;
                    top: -.75em;
                    vertical-align: middle;
                    cursor: pointer;
                }
            </style>
            <script type="text/javascript" src="js/bootstrap.js"></script>
            <script type="text/javascript">
                function showHideLoginForm(){
                    $('div#auth').css('display') == 'block' ? $('div#auth').css('display','none') : $('div#auth').css('display','block');
                    $('div#tint').css('display') == 'block' ? $('div#tint').css('display','none') : $('div#tint').css('display','block');
                }
            </script>
            <div class="tint" id="tint"></div>
            <div id="auth" class="auth">
                <form method="POST" action="" class="form-signin">
                    <span class="cross" alt="Закрыть" title="Закрыть" onclick="showHideLoginForm()">&#10005;</span>
                    <input name="user" type="text" class="input-block-level" placeholder="Имя пользователя">
                    <input name="pwd" type="password" class="input-block-level" placeholder="Пароль">
                    <button class="btn btn-large btn-primary" type="submit" style="float: right; margin-top: -4px;">Войти</button>
                </form>
            </div>
            <?
        }
        else{
            //save changes to xml
            if( !empty($this->params) ){
                $this->readXML();
                foreach( $this->data->sections->section as $section ){
                    //try upfate appropriate data section
                    if( is_numeric($this->params['id']) && $this->params['id'] == $section['id'] ){
                        $section->content = $this->params['editor'];
                        if( isset($this->params['sname']) && $this->params['sname'] != '' && $this->params['sname'] != ' ' && trim($this->params['sname']) != $section->name ){
                            $section->name = $this->params['sname'];
                        }
                        break;
                    }
                }

                $this->saveXML($this->data);
            }

            //read xml data file
            $this->readXML('data/site.xml');
            if( $this->data ){

                $url = Yii::app()->request->url;
                $url_parts = explode('&', $url);
                if( is_array($url_parts) ){
                    $url = $url_parts[0];
                }

                //render admin sections
                foreach( $this->data->sections->section as $section ){
                    //var_dump($section);
                    echo '  <div class="alink">
                            <a href="'.$url.'&edit='.$section['id'].'">'.$section->name.'</a>
                        </div>';

                    if( is_numeric($this->params) && $this->params == $section['id'] ){
                        echo '<form action="" method="POST">';
                        switch( $section['type'] ){
                            case 'text':
                                echo '    <div>
                                        <input style="margin-left:0" type="text" name="sname" value="'.(string)$section->name.'"/>
                                        <input type="hidden" name="id" value="'.$section['id'].'"/>
                                        <textarea name="editor" >
                                        '.$section->content.'
                                        </textarea>
                                        <script>
                                            CKEDITOR.replace( "editor",{width:1021} );
                                        </script>
                                      </div>';
                                break;
                            case 'img':
                                echo '    <div style="margin:5px 0; padding:3px 0; border-bottom:1px solid #778899">
                                        <input style="margin-left:0" type="text" name="sname" value="'.(string)$section->name.'"/>
                                        <input type="hidden" name="id" value="'.$section['id'].'"/>
                                      </div>';

                                $prefix = array(1=>'',2=>'c',3=>'f');
                                $pic_name = array(1=>'чб превью',2=>'цветная превью',3=>'полноразмерная');
                                foreach($section->content->imglist as $project){
                                    echo '  <div style="float:left; border-bottom:1px solid #555555; padding: 5px 0">
                                            <input type="hidden" name="pid" value="'.$project['id'].'"/>
                                            <div style="width:100%; float:left;">
                                                <input style="margin-left:0;" type="text" name="pname" value="'.$project->name.'"/>
                                                <input style="margin-left:0;" type="text" name="pinfo" value="'.$project->info.'"/>
                                            </div>';

                                    for($i=1; $i<=$project->numimg; $i++){
                                        echo '  <div style="float:left; padding: 5px 0;"><span>'.$i.'.</span><input style="margin-left:0; float:left; width:100%" type="file" name="img'.$i.'" value=""/>';
                                        for( $j=1; $j<=3; $j++){
                                            echo '<img style="width:100px; height:200px; float:left; border:1px solid white" src="images/'.(string)$section['page'].'/'.(string)$project->keyword.$i.$prefix[$j].'.jpg" />';
                                        }
                                        echo '  </div>';
                                    }

                                    echo '  </div>';
                                }
                                break;

                        }
                        echo '<input class="submit" type="submit" value="Сохранить"/></form>';
                    }

                }

            }
        }

    }
}
?>