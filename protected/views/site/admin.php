<?php

include_once 'lib/core.php';

$view = new AdminView($params);
echo $view->view();