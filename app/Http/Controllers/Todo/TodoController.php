<?php

namespace App\Http\Controllers\Todo;

use App\Models\Todo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\search;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(request('search')){
            $user = Auth::id();
            $data = Todo::where('is_done', 0)->where('title','like','%'.request('search').'%')->where('user_id', $user)->get();
            $datadone = Todo::where('is_done', 1)->where('title','like','%'.request('search').'%')->where('user_id', $user)->get();
        }else{
            $user = Auth::user();
            $data = $user->todos->where('is_done', 0); 
            $datadone = $user->todos->where('is_done', 1);
        }
        return view('todo.app', compact('data', 'datadone'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'task' => 'required|max:100'
        ],[
            'task.required' => 'Isikan task terlebih dahulu',
            'task.max' => 'Task maksimal berisi 100 karakter',
        ]);

        $data = [
            'title'=>$request->input('title'),
            'tasks' => $request->input('task'),
            'user_id'=> Auth::id(),
        ];

        Todo::create($data);

        return redirect()->route('todo')->with('success', 'Berhasil menambahkan task');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'task' => 'required|max:100'
        ],[
            'task.required' => 'Isikan task terlebih dahulu',
            'task.max' => 'Task maksimal berisi 100 karakter',
        ]);

        $data = [
            'title'=>$request->input('title'),
            'tasks' => $request->input('task'),
            'is_done' => $request->input('is_done'),
            'user_id'=> Auth::id(),
        
        ];

        Todo::where('id', $id)->update($data);
        return redirect()->route('todo')->with('success', 'Berhasil memperbarui task');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::where('id',$id)->delete();
        return redirect()->route('todo')->with('success', 'Berhasil menghapus task');
    }
}
