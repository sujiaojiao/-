<?php

//��ӭ�տ��������Ƶ�̳� ���ǵ����������� www.houdunwang.com


echo issum("6666","5");
echo "<br>";
echo strl("��ӭ�տ��������Ƶ�̳�oo oooooo????ASDsadasD#@!#123",10,'---');
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
