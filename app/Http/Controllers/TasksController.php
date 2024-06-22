<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $task = task::all();
        return view('task', ['task' => $task]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$task = new Task;
        //$task->nama = $request->nama;

        //$task->save();

        //return redirect('task');

        $request->validate([
            'nama'=> 'required',
            'detail'=> 'required'
        ]);

        task::create([
            'nama' => $request->nama,
            'detail' => $request->detail
        ]);

        return redirect('admin')->with('status', 'Aktivitas berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $tasks = $task;
        return view('detail', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        Task::where('id', $task->id)
            ->update([
                'nama' => $request->nama,
                'detail' => $request->detail
            ]);

            return redirect('admin')->with('status', 'Aktivitas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->id);
        return redirect('admin')->with('status', 'Aktivitas berhasil dihapus');
    }

    public function done(Task $task)
    {
        Task::where('id', $task->id)
            ->update([
                'status'=> "1"
            ]);
        
            return redirect('admin')->with('status', 'Aktivitas Telah dilakukan');     
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function zero()
    {
        $task = Task::where('status', '0')->get();
        $belum = Task::where('status', '0')->count();
        return view('layout/undone',[
            'tugas'=>$task,
            'belum'=>$belum
        ]);
    }

    public function one()
    {
        $task = Task::where('status', '1')->get();
        $belum = Task::where('status', '0')->count();
        return view('layout/done',[
            'tugas'=>$task,
            'belum'=>$belum
        ]);
    }

    public function admin()
    {
        $tabel = task::all();
        $tot = task::all()->count();
        $sudah = Task::where('status', '1')->count();
        $belum = Task::where('status', '0')->count();
        $t_done = Task::where('status', '1')->get();
        $t_un = Task::where('status', '0')->get();
        
        return view('layout.admin', [
            'tot' => $tot,
            'tabel' => $tabel,
            'sudah' => $sudah,
            'belum' => $belum,
            'tbdone' => $t_done,
            'tbun' => $t_un
        ]);
    }

    public function counter()
    {
        $belum = Task::where('status', '0')->count();
        return view('layout.admin', ['bg' => $belum]);
    }

    public function sudah()
    {
        $sudah = Task::where('status', '1')->count();
        return $sudah;
    }

    /* DONE DETAIL */

    public function showdone(Task $task)
    {
        $tasks = $task;
        return view('info', ['task' => $task]);
    }

    public function roll(Task $task)
    {
        Task::where('id', $task->id)
            ->update([
                'status'=> "0"
            ]);
        
            return redirect('done')->with('status', 'Aktivitas di Rollback');     
    }

    public function delete(Task $task)
    {
        Task::destroy($task->id);
        return redirect('done')->with('status', 'Aktivitas berhasil dihapus');
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama'=> 'required|max:191',
            'detail' => 'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                
            ]);
        }
        else
        {
            $task = new Task;
            $task->nama = $request->input('nama');
            $task->detail = $request->input('detail');
            $task->save();
            return response()->json([
                'status'=>200,
                'message'=>'Task berhasil ditambahkan',
            ]);

        }
    }
}
