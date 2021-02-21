<?php

namespace App\Http\Controllers\Admin;

use App\FactoryPipe;
use App\Http\Requests\subProductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class FactoryPipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factoryPipe=FactoryPipe::latest()->paginate(20);
        return view('Admin.PipeFactory.all' , compact('factoryPipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('Admin.PipeFactory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasfile('logo_factory'))
        {
            $file = $request->file('logo_factory');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('uploads/logos/', $filename);
        }
        FactoryPipe::create([
            'name'=>$request->factory_name,
            'img'=> $filename
        ]);
        Session::flash('success', 'کارخانه با موفقیت ساخته شد');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param subProductRequest $factoryPipe
     * @return void
     */
    public function show(subProductRequest $factoryPipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param FactoryPipe $factoryPipe
     * @return void
     */
    public function edit(FactoryPipe $factoryPipe)
    {
        return view('Admin.PipeFactory.edit',compact('factoryPipe'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param FactoryPipe $factoryPipe
     * @return void
     */
    public function update(Request $request, FactoryPipe $factoryPipe)
    {
        dd($factoryPipe);
        if($request->hasFile('logo_factory')){
            $file = $request->file('logo_factory');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            if ($file->move('uploads/logos/', $filename)) {
                $factoryPipe->img = $filename;
            }
        }
        $factoryPipe->update($request->all());
        Session::flash('success', 'کارخانه با موفقیت آپدیت شد');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param FactoryPipe $factoryPipe
     * @return void
     * @throws \Exception
     */
    public function destroy(FactoryPipe $factoryPipe)
    {
        $url=$factoryPipe->img ;
        if (!empty($url)) {
            if (file_exists( $url)) {
                $factoryPipe->img = '';
                $factoryPipe->update();
                unlink($url);
            }
        }
        $factoryPipe->delete();
        return redirect(route('factoryPipe.index'));
    }
}
