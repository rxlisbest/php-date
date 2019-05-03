# php-date
```$xslt
$time = time(); // $time = date('Y-m-d')
// begin
$chineseWeekBegin = (new ChineseWeek($time))->begin();
$weekBegin = (new Week($time))->begin();
$monthBegin = (new Month($time))->begin();
$yearBegin = (new Year($time))->begin();

// end
$chineseWeekEnd = (new ChineseWeek($time))->end();
$weekEnd = (new Week($time))->end();
$montEnd = (new Month($time))->end();
$yearEnd = (new Year($time))->end();
```