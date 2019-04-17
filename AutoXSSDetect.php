<?php
/**
 * Created by PhpStorm.
 * User: M4xR0
 * Date: 2019/4/17
 * Time: 9:35
 */


# SSRF bug
function curl($url){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_exec($ch);
    curl_close($ch);
}
$url = $_GET['url'];
# curl($url);


if($url != '')
{
    $file = fopen("temp.txt","w"); //此方法会自动生成文件temp.txt,用于保存当前测试的payload情况，每次请求都会更新
    fwrite($file,$url . "\r\n");
    fclose($file);
}

$flag = $_GET['flag'];

if($flag == "a")
{
    $fileRead = fopen("temp.txt","r"); //此方法会读取temp.txt，并将内容赋值
    $urlRead = fread($fileRead,filesize("temp.txt")); //读取相应的测试payload。
    fclose($fileRead);
    /* 写下成功的payload具体情况，即请求过来的URL值*/
    $file = fopen("success.txt","a+"); //此方法会自动生成文件success,txt,a表示追加写入
    fwrite($file,$urlRead . "\r\n");
    fclose($file);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Auto XSS Detect</title>
</head>
<script>
    //检测alert是否执行
    var flag = false;         //定义状态标志
    var alertFunc = window.alert;
    window.alert = function(str){
        flag = true;
        //alertFunc(str);
        if(flag)
        {
            // 生成一个标签，只为了让其传输一个确认成功调用了alert函数的值至服务器中
            var var_img = document.createElement("img");
            var img_src = document.createAttribute("src");
            img_src.value = "http://127.0.0.1/phpCode/XSSTools/AutoXSSDetect.php?flag=a";
            var_img.setAttributeNode(img_src);
        }
    };
</script>

<body>
<?php curl($url);?>
</body>

</html>
