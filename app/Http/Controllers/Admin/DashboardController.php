<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Surcharge;
use App\Quota;
use App\Loan;
use App\Customer;
use App\Notification;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller {

    public function index() {
        $surcharges = Surcharge::orderBy('surcharges.id', 'desc')
                ->join('quotas', 'surcharges.quota_id', '=', 'quotas.id')
                ->select('surcharges.*', 'quotas.loan_id', 'quotas.number')
                ->paginate(5);
        $notifications = Notification::orderBy('id', 'desc')
                ->paginate(5);
        return view('admin.dashboard.index', ['surcharges' => $surcharges], ['notifications' => $notifications])
        ;
    }

}
