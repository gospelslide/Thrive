<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;
class MLController extends Controller
{
    public function demo()
    {
        $samples=array();
        $labels =array();
        $file=fopen("C:\\CodeShastra\\Thrive\\resources\\stocks_data.csv","r");
        for($i=1;$i<=688;$i++)
        {
            $temp=array();
            $line=fgets($file);
            $line=explode(',',$line);   
            array_push($temp,$line[1],$line[2],$line[3],$line[4]);
            array_push($samples,$temp);
            array_push($labels,$line[5]);
        }
        $classifier = new SVC(Kernel::LINEAR, $cost = 1000, $degree = 6);
        $classifier->train($samples, $labels);
        $data=$classifier->predict([57.44,57.63,56.75,34.43]);
        return view('welcome')->with('data',$data);
    }
}
