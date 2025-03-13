<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class ReportController extends Controller
{
    public function financialReport()
    {
        $totalRevenue = Transaction::sum('total_price');
        $totalTransactions = Transaction::count();

        return view('reports.financial', compact('totalRevenue', 'totalTransactions'));
    }
}