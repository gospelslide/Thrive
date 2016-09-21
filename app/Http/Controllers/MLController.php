<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DateTime;
use App\Http\Controllers\Controller;

use Khill\Lavacharts\Lavacharts;

use Phpml\SupportVectorMachine\Kernel;

use Phpml\Regression\SVR;
use Phpml\Regression\LeastSquares;
use Phpml\Classification\SVC;
use Phpml\Classification\NaiveBayes;

class MLController extends Controller
{
    public function demo()
    {
        ini_set('max_execution_time',1500);  
        $samples=array();
        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $temp=array();
            $date=$i->format("Y-m-d");
            $date=strtotime($date);
            array_push($temp, $date);
            array_push($samples, $temp);
        }

        $targets =array();
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");
        for($i=1;$i<=2800;$i++)
        {
            $line=fgets($file);
            $line=explode(',',$line);
            array_push($targets,floatval($line[5]));
        }
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $currency = \Lava::DataTable();
        $currency->addDateColumn('Day of Month');
        $currency->addNumberColumn('Official');
        $currency->addNumberColumn('Predicted');

        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");

        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $line=fgets($file);
            $line=explode(',',$line);

            $date=$i->format("Y-m-d");
            $unix_date=strtotime($date);

            $predict=$regression->predict([$unix_date]);
            
            $currency->addRow([$date,floatval($line[5]),$predict]);
        }       
        $data['currency'] = \Lava::AreaChart('Temps',$currency,['title'=>'GBP vs USD']);

        $samples=array();
        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $temp=array();
            $date=$i->format("Y-m-d");
            $date=strtotime($date);
            array_push($temp, $date);
            array_push($samples, $temp);
        }

        $targets =array();
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");
        for($i=1;$i<=2800;$i++)
        {
            $line=fgets($file);
            $line=explode(',',$line);
            array_push($targets,floatval($line[3]));
        }
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $currency = \Lava::DataTable();
        $currency->addDateColumn('Day of Month');
        $currency->addNumberColumn('Official');
        $currency->addNumberColumn('Predicted');

        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");

        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $line=fgets($file);
            $line=explode(',',$line);

            $date=$i->format("Y-m-d");
            $unix_date=strtotime($date);

            $predict=$regression->predict([$unix_date]);
            
            $currency->addRow([$date,floatval($line[3]),$predict]);
        }       
        $data1['currency'] = \Lava::AreaChart('Temps1',$currency,['title'=>'GBP vs INR']);

                $samples=array();
        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $temp=array();
            $date=$i->format("Y-m-d");
            $date=strtotime($date);
            array_push($temp, $date);
            array_push($samples, $temp);
        }

        $targets =array();
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");
        for($i=1;$i<=2800;$i++)
        {
            $line=fgets($file);
            $line=explode(',',$line);
            array_push($targets,floatval($line[1]));
        }
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $currency = \Lava::DataTable();
        $currency->addDateColumn('Day of Month');
        $currency->addNumberColumn('Official');
        $currency->addNumberColumn('Predicted');

        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");

        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $line=fgets($file);
            $line=explode(',',$line);

            $date=$i->format("Y-m-d");
            $unix_date=strtotime($date);

            $predict=$regression->predict([$unix_date]);
            
            $currency->addRow([$date,floatval($line[1]),$predict]);
        }       
        $data2['currency'] = \Lava::AreaChart('Temps2',$currency,['title'=>'GBP vs CHF']);

                $samples=array();
        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $temp=array();
            $date=$i->format("Y-m-d");
            $date=strtotime($date);
            array_push($temp, $date);
            array_push($samples, $temp);
        }

        $targets =array();
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");
        for($i=1;$i<=2800;$i++)
        {
            $line=fgets($file);
            $line=explode(',',$line);
            array_push($targets,floatval($line[2]));
        }
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $currency = \Lava::DataTable();
        $currency->addDateColumn('Day of Month');
        $currency->addNumberColumn('Official');
        $currency->addNumberColumn('Predicted');

        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");

        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $line=fgets($file);
            $line=explode(',',$line);

            $date=$i->format("Y-m-d");
            $unix_date=strtotime($date);

            $predict=$regression->predict([$unix_date]);
            
            $currency->addRow([$date,floatval($line[2]),$predict]);
        }       
        $data3['currency'] = \Lava::AreaChart('Temps3',$currency,['title'=>'GBP vs HKD']);

        $samples=array();
        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $temp=array();
            $date=$i->format("Y-m-d");
            $date=strtotime($date);
            array_push($temp, $date);
            array_push($samples, $temp);
        }

        $targets =array();
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");
        for($i=1;$i<=2800;$i++)
        {
            $line=fgets($file);
            $line=explode(',',$line);
            array_push($targets,floatval($line[4]));
        }
        $regression = new LeastSquares();
        $regression->train($samples, $targets);
        $currency = \Lava::DataTable();
        $currency->addDateColumn('Day of Month');
        $currency->addNumberColumn('Official');
        $currency->addNumberColumn('Predicted');

        $startDate = new DateTime("2009-01-01");
        $endDate   = new DateTime("2016-08-31");
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\currency_data.csv","r");

        for($i = $startDate ;$i<=$endDate ;$i->modify('+1 day'))
        {
            $line=fgets($file);
            $line=explode(',',$line);

            $date=$i->format("Y-m-d");
            $unix_date=strtotime($date);

            $predict=$regression->predict([$unix_date]);
            
            $currency->addRow([$date,floatval($line[4]),$predict]);
        }       
        $data4['currency'] = \Lava::AreaChart('Temps4',$currency,['title'=>'GBP vs EUR']);
        return view('welcome');//->with('data',$data)->with('data1',$data1);
    }
}
