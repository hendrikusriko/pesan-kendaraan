<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;
use DataTables;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{
    public function index() 
    {
        return view('admin.driver.index');
    }

    public function dataTables(Request $request) 
    {
        if ($request->ajax()) {
            $data = Driver::latest()->get();
            
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="' . route('admin.driver.edit', ['id' => $row->id]) . '" class="edit btn btn-success btn-sm">Edit</a> 
                                  <a href="' . route('admin.driver.delete', ['id' => $row->id]) . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    public function create()
    {
        return view('admin.driver.create');
    }

    public function store(Request $request)
    {
        $dataCreate = [
            'name' => $request->input('name'),
        ];

        Validator::make($request->all(), [
            'name' => 'required',
        ])->validate();

        try {
            Driver::create($dataCreate);
        } catch (\Throwable $th) {
            return redirect()->route('admin.driver.create');
        }
        return redirect()->route('admin.driver.index');
    }

    public function edit($id)
    {
        $driver = Driver::find($id);
        return view('admin.driver.edit', ['driver' => $driver]);
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = [
            'name' => $request->input('name'),
        ];

        Validator::make($request->all(), [
            'name' => 'required'
        ])->validate();

        try {
            Driver::where('id', $id)->update($dataUpdate);
        } catch (\Throwable $th) {
            return redirect()->route('admin.driver.edit');
        }
        return redirect()->route('admin.driver.index');
    }

    public function delete($id)
    {
        try {
            Driver::where('id', $id)->delete();
        } catch (\Throwable $th) {
            return redirect()->route('admin.driver.index');
        }
        return redirect()->route('admin.driver.index');
    }
}
