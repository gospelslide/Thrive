<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DateTime;
use App\Http\Controllers\Controller;
use Khill\Lavacharts\Lavacharts;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Regression\LeastSquares;
use Phpml\Regression\SVR;
use Input;
class MLC extends Controller
{
    public function demo()
    {
        ini_set('max_execution_time','1500');
        $map=array('CHF'=>1,'HKD'=>2,'INR'=>3,'USD'=>5,'EURO'=>4,'GBP'=>6);
        
        $country=Input::get();
        $country1=$country['currency1'];
        $country2=$country['currency2'];
    

        $name_1="";
        if($country1=='1')
            $name_1="swisData";
        else if($country1=='2')
            $name_1="HongKongData";
        else if($country1=='3')
            $name_1="IndiaData";
        else if($country1=='4')
            $name_1="euroData";
        else if($country1=='5')
            $name_1="usaData";    
        $name1=$name_1.".json";

        $name_2="";
       if($country2=='1')
            $name_2="swisData";
        else if($country2=='2')
            $name_2="HongKongData";
        else if($country2=='3')
            $name_2="IndiaData";
        else if($country2=='4')
            $name_2="euroData";
        else if($country2=='5')
            $name_2="usaData";
        $name2=$name_2.".json";


        $data1=json_decode(file_get_contents("C:\\laravel\\Thrive\\resources\\".$name1),'true');
        $data2=json_decode(file_get_contents("C:\\laravel\\Thrive\\resources\\".$name2),'true');
        $samples=array();
        $labels=array();
        for($i=0;$i<50;$i++)
        {
            $temp=array();
            array_push($temp,floatval($data1[$i]["termsOfTrade"]),floatval($data1[$i]["index"]),floatval($data1[$i]["interest_rates"]),floatval($data1[$i]["inflation"]),floatval($data1[$i]["currentBalance"]));
            array_push($samples, $temp);
        
            array_push($labels,$data1[$i]["currency"]);
        }
        $regression=new SVR(Kernel::LINEAR);
        $regression->train($samples,$labels);

        $currency=\Lava::DataTable();
        $currency->addNumberColumn('Date');
        $currency->addNumberColumn('Pred');
        $currency->addNumberColumn('Real');


        $samples=array();
        $labels=array();
        for($i=0;$i<50;$i++)
        {
            $temp=array();
            array_push($temp,floatval($data2[$i]["termsOfTrade"]),floatval($data2[$i]["index"]),floatval($data2[$i]["interest_rates"]),floatval($data2[$i]["inflation"]),floatval($data2[$i]["currentBalance"]));
            array_push($samples, $temp);
        
            array_push($labels,$data2[$i]["currency"]);
        }
        $regression1=new SVR(Kernel::LINEAR);
        $regression1->train($samples,$labels);


//        dd($samples)

        for($i=0;$i<200;$i++)
        {
            $pred1=$regression->predict([floatval($data1[$i]["termsOfTrade"]),floatval($data1[$i]["index"]),floatval($data1[$i]["interest_rates"]),floatval($data1[$i]["inflation"]),floatval($data1[$i]["currentBalance"])]);
            $pred2=$regression1->predict([floatval($data2[$i]["termsOfTrade"]),floatval($data2[$i]["index"]),floatval($data2[$i]["interest_rates"]),floatval($data2[$i]["inflation"]),floatval($data2[$i]["currentBalance"])]);
            
            //dd($pred2);
            $pred_val=$pred2*1.0/$pred1;
            $real_val=floatval($data2[$i]["currency"])*1.0/floatval($data1[$i]["currency"]);
//            dd($real_val);
            $currency->addRow([$data1[$i]["index"],$pred_val,$real_val]);//$data1[$i]["currency"]]);        

        }
        \Lava::AreaChart('Currency',$currency,['title'=>'Currency Change']);

        return view('graph');


    }

    public function compute()
    {
        return view('graph');
    }
}