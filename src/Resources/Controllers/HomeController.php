<?php
namespace App\Http\Controllers\Lawn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller as BaseController;
use Tkusa\Lawn\Parser;

class HomeController extends BaseController
{

    public function home(Request $request)
    {
        $entities = Parser::entities_with_index();

        return view('lawn.home', compact('entities'));
    }



}
