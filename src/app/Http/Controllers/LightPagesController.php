<?php namespace Ipitchkhadze\LightPages\App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;

class LightPagesController extends BaseController
{
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('lightpages::index');
	}
}