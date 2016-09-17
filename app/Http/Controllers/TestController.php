<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Phpml\Classification\KNearestNeighbors;

class TestController extends Controller
{
    public function aiTool() 
    {
    	$samples = [[1, 3], [1, 4], [2, 4], [3, 1], [4, 1], [4, 2]];
		$labels = ['a', 'a', 'a', 'b', 'b', 'b'];

		$classifier = new KNearestNeighbors();
		$classifier->train($samples, $labels);

		echo $classifier->predict([3, 2]); 
    }
}
