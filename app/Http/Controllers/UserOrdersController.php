<?php 
namespace App\Http\Controllers;





use App\ShoppingCart;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;



class UserOrdersController extends Controller {



    public function __construct()

    {

        $this->middleware('auth');

    }



    public function index()

    {

        $orders = ShoppingCart::where('user_id', Auth::user()->id)->where('status','approve')->get();

            // dd($orders);

        return view('user.orders', compact('orders'));

    }



    public function getReceta(Request $request)

    {

        return response()->download(storage_path('app/' . $request->input('url_receta_path')));

    }

    public function wish()
    {
        $shoppingcarts = ShoppingCart::where('user_id',Auth::user()->id)->where('status','create')->orderBy('updated_at','desc')->get();
        return view('user.wish',['shoppingcarts'=>$shoppingcarts]);
    }

}