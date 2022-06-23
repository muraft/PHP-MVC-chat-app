<?php
define('BASEURL',(isset($_SERVER['HTTPS'])&&$_SERVER['HTTPS']==='on')?'https':'http'.'://'.$_SERVER['HTTP_HOST']);

//Database
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','mvcchat');
