<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use DataTables;
use Illuminate\Support\Facades\Validator;
use Auth;

class OrderApprovalController extends Controller
{
    public function index() 
    {
        return view('user.order-approval.index');
    }

    public function dataTables(Request $request) 
    {
        $id = Auth::user()->id;
        if ($request->ajax()) {
            $data = Order::with(['driver', 'vehicle', 'staf_one', 'staf_two'])
                    ->where('staf_one', $id)
                    ->orWhere('staf_two', $id)
                    ->latest()
                    ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) { 
                    if($row->acc_mark<'2') {
                        $actionBtn = '<a href="'.route('approval.aprove', ['id' => $row->id]).'" class="btn btn-info btn-sm">Aprove</a>';
                    }elseif($row->acc_mark=='2') {
                        $actionBtn = '<a href="'.route('approval.cancel', ['id' => $row->id]).'" class="btn btn-danger btn-sm">Cancel</a>';
                    }
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function aprove($id) {
        $findOrder = Order::find($id);
        if ($findOrder->acc_mark == 0) {
            $dataUpdate = ['acc_mark' => '1'];
        }elseif ($findOrder->acc_mark == 1) {
            $dataUpdate = ['acc_mark' => '2'];
        }
    
        Order::where('id', $id)->update($dataUpdate);
        return redirect()->route('approval.index');
    }

    public function cancel($id) {
        $findOrder = Order::find($id);
        if ($findOrder->acc_mark == 2) {
            $dataUpdate = ['acc_mark' => '1'];
        }elseif ($findOrder->acc_mark == 1) {
            $dataUpdate = ['acc_mark' => '0'];
        }
    
        Order::where('id', $id)->update($dataUpdate);
        return redirect()->route('approval.index');
    }
}
