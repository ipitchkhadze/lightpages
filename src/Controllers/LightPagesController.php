<?php namespace Kremlinpalace\LightPages\Http\Controllers;
/**
 * 
 * @author Mikhail Pichkhadze  <ipitchkhadze@gmail.com>
 */
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
class LightPagesController extends Controller
{
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		
		return view('contact::index');
	}
}