# XSSDetect


工具实现的是在输入测试的网址进入到URL中，在测试的服务器应该带上相应的测试payload，使用的paylaod需要可触发alert函数的payload，
当成功触发alert后，会在后台生成temp.txt和success.txt文件，success.txt文件保存的是成功的payload情况。


# 实现的功能

1、直接提交测试的url+paylaod的形式到测试程序中，直接在后台就可以当前paylaod判断是否成功利用（后续批量可获取有效的paylaod）；

2、目前只支持单个参数的利用，暂未实现进行批量paylaod测试；

3、GET请求提交的参数测试；

# 特点

1、若有结果，直接是可用的paylaod，而非漏洞扫描器中的根据关键字进行搜索判断漏洞及许哟啊进行手工验证；

2、可使用该方式来获取其他JavaScript函数的触发情况；


# 缺点

1、性能方面，由于是根据浏览器加载页面的形式实现，所以在速度方面是不足的；

2、要使用alert函数执行的payload才可测试成功；


# 后续

1、批量paylaod测试；

2、GET请求的多个参数测试；

3、完善POST参数测试；

4、完善其他参数测试。



# 测试例子

http://127.0.0.1/AutoXSSDetect.php?url=127.0.0.1/test.php?content=aaaaaa<script>alert(/vvvvv/)</script>

# 测试效果
![image](https://github.com/c0d1007/XSSDetect/blob/master/images/3.png)
![image](https://github.com/c0d1007/XSSDetect/blob/master/images/1.png)
![image](https://github.com/c0d1007/XSSDetect/blob/master/images/2.png)

