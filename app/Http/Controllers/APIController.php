<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\DB;

class APIController extends Controller
{

    public function getCustomers()
    {
        $query = User::select('name', 'surname', 'email');
        return datatables($query)->make(true);
    }

}
