ini_set('max_execution_time',1000);
$startDate = new DateTime("2014-09-12");
$endDate   = new DateTime("2016-09-19");
$file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv", "a+");
for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
{
    $date=$i->format("Y-m-d");
    $data=json_decode(file_get_contents("http://api.fixer.io/".(string)$date."?base=GBP"),true);
    $pass=array();
    foreach($data as $key=>$value)
    {
        $temp=array();
        array_push($temp,$key,$value);
        array_push($pass,$temp);
    }
    $str=null;
    $pass=$pass[2][1];
    
    foreach($pass as $key=>$value)
       if($key=='CHF' || $key=='EUR' || $key=='HKD' || $key=='INR' || $key=="USD")
            $str=$str.",".$value;
    $str=$str."\n";
    fwrite($file,$str);
}
fclose($file);