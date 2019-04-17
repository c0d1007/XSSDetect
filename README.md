# XSSDetect


工具实现的是在输入测试的网址进入到URL中，在测试的服务器应该带上相应的测试payload，使用的paylaod需要可触发alert函数的payload，
当成功触发alert后，会在后台生成temp.txt和success.txt文件，success.txt文件保存的是成功的payload情况。


# 实现的功能

1、直接提交测试的url+paylaod的形式到测试程序中，直接在后台就可以判断是否成功利用；

2、目前只支持单个参数的利用，暂未实现进行批量paylaod测试；

3、GET请求提交的参数测试；


# 测试例子

http://127.0.0.1/AutoXSSDetect.php?url=127.0.0.1/test.php?content=test<script>alert(1)</script>
