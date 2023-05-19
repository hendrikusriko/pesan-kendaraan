<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Driver;
use App\Models\User;
use App\Models\Vehicle;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index() 
    {
        return view('admin.order.index');
    }

    public function dataTables(Request $request) 
    {
        if ($request->ajax()) {
            $data = Order::with(['driver', 'vehicle', 'staf_one', 'staf_two'])->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="' . route('admin.order.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> 
                                  <a href="' . route('admin.order.delete', ['id' => $row->id]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('acc_mark', function($row){
                    if($row->acc_mark == 0) {
                        return '<i class="fas fa-fw fa-times"></i>';
                    }elseif($row->acc_mark == 1) {
                        return '<i class="fas fa-fw fa-check"></i>';
                    }elseif($row->acc_mark == 2) {
                        return '<i class="fas fa-fw fa-check"></i><i class="fas fa-fw fa-check"></i>';
                    }
                })
                ->rawColumns(['action', 'acc_mark'])
                ->make(true);
        }
    }

    public function create()
    {
        $driver = Driver::get();
        $vehicle = Vehicle::get();
        $user = User::where('is_admin', '0')->get();
        return view('admin.order.create', ['driver' => $driver, 'vehicle' => $vehicle, 'user' => $user]);
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'driver_id' => $request->input('driver_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'order_date' => $request->input('order_date'),
            'staf_one' => $request->input('staf_one'),
            'staf_two' => $request->input('staf_two'),
            'acc_mark' => 0,
        ];

        Validator::make($request->all(), [
            'driver_id' => 'required',
            'vehicle_id' => 'required',
            'order_date' => 'required|date',
            'staf_one' => 'required',
            'staf_two' => 'required',
        ])->validate();

        try {
            Order::create($dataCreate);
        } catch (\Throwable $th) {
            return redirect()->route('admin.order.create');
        }
        return redirect()->route('admin.order.index');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $driver = Driver::get();
        $vehicle = Vehicle::get();
        $user = User::where('is_admin', '0')->get();
        return view('admin.order.edit', ['driver' => $driver, 'vehicle' => $vehicle, 'user' => $user, 'order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = [
            'driver_id' => $request->input('driver_id'),
            'vehicle_id' => $request->input('vehicle_id'),
            'order_date' => $request->input('order_date'),
            'staf_one' => $request->input('staf_one'),
            'staf_two' => $request->input('staf_two'),
            'acc_mark' => 0,
        ];

        Validator::make($request->all(), [
            'driver_id' => 'required',
            'vehicle_id' => 'required',
            'order_date' => 'required|date',
            'staf_one' => 'required',
            'staf_two' => 'required',
        ])->validate();

        try {
            Order::where('id', $id)->update($dataUpdate);
        } catch (\Throwable $th) {
            return redirect()->route('admin.order.edit');
        }
        return redirect()->route('admin.order.index');
    }

    public function delete($id)
    {
        try {
            Order::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('admin.order.index');
        }
        return redirect()->route('admin.order.index');
    }
}
