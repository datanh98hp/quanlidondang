<?php

namespace App\Http\Controllers;
use App\Models\Thuchi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ThuchiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // date("Y-m-d H:i:s");
       // $tc = Thuchi::where('created_at','')->get('created_at');
        $thuchi = Thuchi::whereDate('created_at','=', date('Y-m-d'))->get();
        $TongThu = 0;
        foreach ($thuchi as $key => $value) {
            $TongThu+=( $thuchi[$key]->SoTen_Thu - $thuchi[$key]->SoTen_Chi);
        }

        return view('Thuchi.Bangthuchi',
        [
            'thuchi'=>$thuchi,
            'Tongthu'=>$TongThu
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        foreach ($request->input('NDCV') as $key=>$id) {
         
            $thuchi = new Thuchi;
            $thuchi->NDCV = $request->NDCV[$key];
            $thuchi->SoTen_Thu = $request->SoTen_Thu[$key];
            $thuchi->SoTen_Chi = $request->SoTen_Chi[$key];
            $thuchi->id_user  = Auth::user()->id;
            $thuchi->save();
        }
        return redirect('thuchi')->with('status','Thêm thành công...');
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
        $thuchi = Thuchi::find($id);

        return view('Thuchi.EditThuchi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $thuchi = Thuchi::find($id);
        $thuchi->delete();

        return redirect('thuchi')->with('status','Xóa thành công...');
    }
}