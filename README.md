

```
  $needle_mode = 0775;
  $mask = 0777;
```

При запуске с SUID/SGID биты игнорируются:

```
➜  php-fileperm  chmod 0775 /Users/bbo/tmp/logs
➜  php-fileperm  php test.php
   actual_mode : 100000111111101 : 40775
          mask :       111111111 :   777
========================================
  current_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
   needle_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
Права на каталог менять не надо
➜  php-fileperm  chmod 2775 /Users/bbo/tmp/logs
➜  php-fileperm  php test.php
   actual_mode : 100010111111101 : 42775
          mask :       111111111 :   777
========================================
  current_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
   needle_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
Права на каталог менять не надо
```


В случае если:

```
  $needle_mode = 00775;
  $mask = 07777;
```

При запуске с SUID/SGID биты **НЕ игнорируются**:

```
➜  php-fileperm  chmod 0775 /Users/bbo/tmp/logs
➜  php-fileperm  php test.php
   actual_mode : 100000111111101 : 40775
          mask :    111111111111 :  7777
========================================
  current_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
   needle_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
Права на каталог менять не надо
➜  php-fileperm  chmod 2775 /Users/bbo/tmp/logs
➜  php-fileperm  php test.php
   actual_mode : 100010111111101 : 42775
          mask :    111111111111 :  7777
========================================
  current_mode :     10111111101 :  2775
++++++++++++++++++++++++++++++++++++++++
   needle_mode :       111111101 :   775
++++++++++++++++++++++++++++++++++++++++
Права на каталог НАДО БЫ ПОМЕНЯТЬ!
```