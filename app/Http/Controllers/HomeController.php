<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

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
        $chart_options = [
            'chart_title' => 'Abertura de contas',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Account',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            // 'aggregate_function' => 'sum',
            // 'aggregate_field' => 'amount',
            'chart_type' => 'line',
            // 'filter_days' => 30, // show only last 30 days

        ];
    
        $chart1 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Transações realizadas',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\TransactionDetail',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
            'filter_field' => 'created_at',
            'filter_days' => 30, // show only last 30 days
        ];
        
        $chart2 = new LaravelChart($chart_options);

        $chart_options = [
            'chart_title' => 'Tipos de transações',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\TransactionDetail',
            'group_by_field' => 'transaction_type',
            'chart_type' => 'pie',
            'filter_field' => 'created_at',
            'filter_period' => 'month', // show users only registered this month
        ];
        
        $chart3 = new LaravelChart($chart_options);
       
        return view('home', compact('chart1', 'chart2', 'chart3'));
    }

}
