<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orderStat = Order::select(DB::raw('MONTH(order_date) as month'), DB::raw('COUNT(*) as count'))
        ->whereYear('order_date', date('Y'))
        ->where('acc_mark', '2')
        ->groupBy(DB::raw('MONTH(order_date)'))
        ->get();

        return view('user.home', ['orderStat' => $orderStat]);
    }

    public function adminHome()
    {
        $orderStat = Order::select(DB::raw('MONTH(order_date) as month'), DB::raw('COUNT(*) as count'))
                    ->whereYear('order_date', date('Y'))
                    ->where('acc_mark', '2')
                    ->groupBy(DB::raw('MONTH(order_date)'))
                    ->get();
                    
        return view('admin.home', ['orderStat' => $orderStat]);
    }
}
