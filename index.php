<?php
include_once('Scrapper.php');
//https://www.youtube.com/watch?v=_8FKdlfj7yc&ab_channel=%D0%90%D0%BB%D0%B5%D0%BA%D1%81%D0%B5%D0%B9%D0%9D%D0%B0%D0%B2%D0%B0%D0%BB%D1%8C%D0%BD%D1%8B%D0%B9#t=308.841376

$res=new Scrapper();
echo"<pre>";print_r($res->getResponse());die();
