<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{

    public function index(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        //$analyticsData = Analytics::fetchVisitorsAndPageViews(Period::days(7));
        if (!auth()->check()) {
            return view('login');
        }
        $user_count = User::count();
        $produit_count = Produit::count();
        $use_all = User::all();
        return view('admin.dashboard.index', [
            //'analyticsData' => $analyticsData,
            'user_count' => $user_count,
            'user_all' => $use_all,
            'produit_count' => $produit_count
        ]);
    }


}
