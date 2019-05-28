# php-date
## 安装
```$xslt
composer require rxlisbest/php-date
```

## 用法
```$xslt
$timestamp = 1558176210; // 2019-05-18 18:43:30

// 周
$week = (new PhpDate($timestamp))->week;
$week->format('Y-m-d')->begin(); // 2019-05-12
$week->format('Y-m-d')->end(); // 2019-05-18
$week->format('Y-m-d')->sunday(); // 2019-05-13
$week->format('Y-m-d')->monday(); // 2019-05-14
$week->format('Y-m-d')->tuesday(); // 2019-05-15
$week->format('Y-m-d')->wednesday(); // 2019-05-16
$week->format('Y-m-d')->friday(); // 2019-05-17
$week->format('Y-m-d')->saturday(); // 2019-05-18

// 我们的周习惯，周一是一周第一天
$chineseWeek = (new PhpDate($timestamp))->chineseWeek;
$chineseWeek->format('Y-m-d')->begin(); // 2019-05-13
$chineseWeek->format('Y-m-d')->end(); // 2019-05-19
$chineseWeek->format('Y-m-d')->monday(); // 2019-05-14
$chineseWeek->format('Y-m-d')->tuesday(); // 2019-05-15
$chineseWeek->format('Y-m-d')->wednesday(); // 2019-05-16
$chineseWeek->format('Y-m-d')->friday(); // 2019-05-17
$chineseWeek->format('Y-m-d')->saturday(); // 2019-05-18
$chineseWeek->format('Y-m-d')->sunday(); // 2019-05-19

// 月
$month = (new PhpDate($timestamp))->month;
$month->format('Y-m-d')->begin(); // 2019-05-01
$month->format('Y-m-d')->end(); // 2019-05-31

// 年
$year = (new PhpDate($timestamp))->year;
$year->format('Y-m-d')->begin(); // 2019-01-01
$year->format('Y-m-d')->end(); // 2019-12-31
```