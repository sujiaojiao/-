<?php

//欢迎收看后盾网视频教程 我们的永久域名是 www.houdunwang.com


echo issum("6666","5");
echo "<br>";
echo strl("欢迎收看后盾网视频教程oo oooooo????ASDsadasD#@!#123",10,'---');
function issum($str,$int=0)
{
    if(is_numeric($str))
        {
        return "$str";
        }
    return $int;
}

function strl($str,$int,$hl='...',$yy='gb2312')
{
    $info=$str;
    $cd=strlen($str);
    if($cd>$int)
    {
        $info=mb_substr($str,0,$int,$yy).$hl;
    }
    return $info;
}
?>
