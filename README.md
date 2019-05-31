# php-date
## 安装
```$xslt
composer require rxlisbest/php-date
```

## 用法
#### 1、当前时间点
```$xslt
$timestamp = 1558176210; // 2019-05-18 18:43:30

// 周
$week = (new PhpDate($timestamp))->week;
$week->today(); // 2019-05-18
$week->begin(); // 2019-05-12
$week->end(); // 2019-05-18
$week->sunday(); // 2019-05-13
$week->monday(); // 2019-05-14
$week->tuesday(); // 2019-05-15
$week->wednesday(); // 2019-05-16
$week->friday(); // 2019-05-17
$week->saturday(); // 2019-05-18

// 我们的周习惯，周一是一周第一天
$chineseWeek = (new PhpDate($timestamp))->chineseWeek;
$chineseWeek->today(); // 2019-05-18
$chineseWeek->begin(); // 2019-05-13
$chineseWeek->end(); // 2019-05-19
$chineseWeek->monday(); // 2019-05-14
$chineseWeek->tuesday(); // 2019-05-15
$chineseWeek->wednesday(); // 2019-05-16
$chineseWeek->friday(); // 2019-05-17
$chineseWeek->saturday(); // 2019-05-18
$chineseWeek->sunday(); // 2019-05-19

// 月
$month = (new PhpDate($timestamp))->month;
$month->today(); // 2019-05-18
$month->begin(); // 2019-05-01
$month->end(); // 2019-05-31

// 年
$year = (new PhpDate($timestamp))->year;
$year->today(); // 2019-05-18
$year->begin(); // 2019-01-01
$year->end(); // 2019-12-31

// 季度
$quarter = (new PhpDate($timestamp))->quarter;
$quarter->today(); // 2019-05-18
$quarter->begin(); // 2019-04-01
$quarter->end(); // 2019-06-30
```
#### 2、当前时间点 向前/向后 推移（以月为例，年、季度、周同月）
```$xslt
$timestamp = 1527729723; // 2018-05-31 09:22:03
$month = (new PhpDate($timestamp))->month;
$month->next()->today(); // 2019-06-30
$month->next(2)->today(); // 2019-07-31
$month->next(3)->today(); // 2019-08-31

$month->last()->today(); // 2019-04-30
$month->last(2)->today(); // 2019-03-31
$month->last(3)->today(); // 2019-02-28
```
说明：如果向前/向后的周期内天数小于当前日期天数，则取周期的最后一天

#### 3、输出格式化（以月为例，年、季度、周同月）
```$xslt
$timestamp = 1527729723; // 2018-05-31 09:22:03
$month = (new PhpDate($timestamp))->month;
$month->format('Y-m-d H:i:s')->today(); // 2018-05-31 09:22:03
```
说明：格式化参数格式同date函数第一个参数