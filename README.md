# XSSDetect


工具实现的是在输入测试的网址进入到URL中，在测试的服务器应该带上相应的测试payload，使用的paylaod需要可触发alert函数的payload，
当成功触发alert后，会在后台生成success.txt文件，保存的是成功的payload情况。


测试例子：

http://127.0.0.1/AutoXSSDetect.php?url=127.0.0.1/test.php?content=test<script>alert(1)</script>
