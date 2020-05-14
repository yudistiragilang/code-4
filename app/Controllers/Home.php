<?php 

/**
 *  desc : Home Controllers
 *  created : 15 mei 2020
 *  author : yudhistiragilang22@gmail.com
 */

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{

		$data['title'] = "Dashboard";
		return view('dashboard', $data);
		
	}

	//--------------------------------------------------------------------

}
