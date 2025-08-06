<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Tiffin;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index()
    {
        $today = Carbon::today()->format('Y-m-d');
        $tiffins = Tiffin::where('date', $today)->get();
        $total_customers = Tiffin::where('date', $today)->distinct('customer_id')->count('customer_id');        
        $total_orders = Tiffin::where('date', $today)->where('quantity', '>', 0)->sum('quantity');
        $total_delivered = Tiffin::where('date', $today)->where('status', 'delivered')->count();
       

        $data = [
            'total_customers' => $total_customers,
            'total_orders' => $total_orders,
            'total_delivered' => $total_delivered,
            'tiffins' => $tiffins,
        ];
        return view('layouts.home', $data);
    }
}
