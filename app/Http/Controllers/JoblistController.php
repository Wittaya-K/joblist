<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Joblist;
use Exception;

class JoblistController extends Controller
{
    public function index()
    {
        $data['joblists'] = Joblist::latest()->get();
        return view('joblist.index', $data);
    }

    public function create()
    {
        return view('joblist.create');
    }

    public function store(ProductRequest $request)
    {
        try{
            $joblist = Joblist::create($request->all());

            $notification = array(
                'message' => 'Product saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('joblist.index')->with($notification);

        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );

            return redirect()->route('joblist.index')->with($notification);
        }
    }

    public function show(Joblist $joblist)
    {
        //
    }

    public function edit(Joblist $joblist)
    {
        $data['joblists'] = $joblist;
        return view('joblist.edit', $data);
    }

    public function update(ProductRequest $request, Joblist $joblist)
    {
        try {
            $joblist = $joblist->update($request->all());

            $notification = array(
                'message' => 'Product saved successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('joblist.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('joblist.index')->with($notification);
        }
    }

    public function destroy(Joblist $joblist)
    {
        try{
            Joblist::find($joblist->id)->delete();

            $notification = array(
                'message' => 'Product deleted successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('joblist.index')->with($notification);
        } catch (Exception $e) {
            $notification = array(
                'message' => $e->getMessage(),
                'alert-type' => 'error'
            );
            return redirect()->route('joblist.index')->with($notification);
        }
    }
}
