<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masukan;

class MasukanController extends Controller
{
    public function index()
     {
         $masukans = masukan::orderBy('created_at', 'DESC')->get();
         // CODE DIATAS SAMA DENGAN > select * from `masukans` order by `created_at` desc
         return view('masukan.index', compact('masukans'));
     }
 
     public function create()
     {
        return view('masukan.create', ['masukan' => new \stdClass()]);
     }
 
     public function save(Request $request)
     {
        $request->validate([
             'name' => 'required|string|max:100',
             'address' => 'required|string',
             'totalitem' => 'required|numeric',
             'subtotal' => 'required|numeric',
             'tax' => 'required|numeric',
             'total' => 'required|numeric',
         ]);
             //print_r($validator);exit();
         try
         {
             $masukan = masukan::create([
                 'name' => $request->name,
                 'address' => $request->address,
                 'totalitem' => $request->totalitem,
                 'subtotal' => $request->subtotal,
                 'tax' => $request->tax,
                 'total' => $request->total
             ]);
             //print_r($masukan);exit();
             return redirect('/masukan')->with(['success' => '<strong>'.$masukan->title.'</strong> Telah Disimpan']);
         }
         catch(\Exception $e)
         {
             return redirect('/masukan/new')->with(['error' => $e->getMessage()]);
         }
     }
 
     public function edit($id)
     {
         $masukan = masukan::find($id);
         return view('masukan.edit', compact('masukan'));
     }
 
     public function update(Request $request, $id)
     {
         $masukan = masukan::find($id);
 
         $masukan->update([
            'name' => $request->name,
            'address' => $request->address,
            'totalitem' => $request->totalitem,
            'subtotal' => $request->subtotal,
            'tax' => $request->tax,
            'total' => $request->total
         ]);
         return redirect('/masukan')->with(['success' => '<strong>'.$masukan->title.'</strong> Diperbaharui']);
     }
 
     public function destroy($id)
     {
         $masukan = masukan::find($id);
 
         $masukan->delete();
         return redirect('/masukan')->with(['success' => '<strong>'.$masukan->title.'</strong> Dihapus']);
     }
 }
