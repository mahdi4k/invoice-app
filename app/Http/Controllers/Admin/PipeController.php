<?php

namespace App\Http\Controllers\Admin;

use App\FactoryPipe;
use App\Http\Controllers\Controller;
use App\Http\Requests\PipeRequest;
use App\Http\Requests\subProductRequest;
use App\Pipe;
use Illuminate\Http\Request;
use Session;

class PipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pipe=Pipe::with('factoryPipe')->get()->toArray();
        return view('Admin.Pipes.all' , compact('Pipe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $factoryPipe=FactoryPipe::all()->pluck('name','id');
        $MainPipe = Pipe::where('mainPipe','1')->get()->pluck('name','id');
        return view('Admin.Pipes.create',compact('factoryPipe','MainPipe'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( subProductRequest $request)
    {

         if($request->hasfile('img'))
        {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;

            $file->move('uploads/logos/', $filename);
        }



     $Pipe = Pipe::create([
            'name'=>$request->name,
            'img'=> $filename,
            'mainPipe'=>'1',
         ]);

         if ($request->has('factory')){
            $pipe=\App\Pipe::find($Pipe->id);
            $pipe->factoryPipe()->attach($request->factory);
         }
        Session::flash('success', 'محصول سر دسته با موفقیت ثبت شد');

        return redirect()->back();
    }

    public function subPipe(PipeRequest $request)
    {
        if($request->hasfile('img'))
        {
            $file = $request->file('img');

            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;

            $file->move('uploads/logos/', $filename);
        }
        $Pipe = Pipe::create([
            'name'=>$request->name,
            'img'=> $filename,
            'price'=>$request->price,
            'count'=>$request->count,
            'unit'=>$request->unit,
            'parentPipe'=>$request->parentPipe,
            'mainPipe'=>$request->mainPipe,

        ]);
        if ($request->has('factory')){
            $pipe=Pipe::find($Pipe->id);
            $pipe->factoryPipe()->attach($request->factory);
        }
        Session::flash('success', 'اطلاعات کالا با موفقیت ویرایش شد');

        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Pipe $Pipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Pipe $Pipe)
    {

        $factoryPipe=FactoryPipe::all()->pluck('name','id');
        return view('Admin.Pipes.edit',compact('factoryPipe','Pipe'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Pipe $pipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pipe $Pipe)
    {

        if($request->hasFile('logo_factory')){
            $file = $request->file('logo_factory');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            if ($file->move('uploads/logos/', $filename)) {
                $Pipe->img = $filename;
            }
        }

        $Pipe->update($request->all());

        if ($request->has('factory')){
            $AsyncPipe=\App\Pipe::find($request->pipeId);
            $AsyncPipe->factoryPipe()->sync($request->factory);
        }
        Session::flash('success', 'اطلاعات دسته بندی با موفقیت ویرایش شد');

        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Pipe $pipe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pipe::where('id',$id)->delete();
        return redirect(route('Pipe.index'));
    }
}
