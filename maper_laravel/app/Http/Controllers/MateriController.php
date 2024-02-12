<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Materi;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function index(Request $request)
    {
        $limit = Helper::limitList($request->limit);
        $page = Helper::pageList($request->page, $limit);
        $columns = ['id', 'title', 'description', 'type', 'file_path'];
        $keyword = $request->search;

        $data = Materi::orderBy('id', 'desc')
                    ->select($columns)
                    ->where(function($result) use ($keyword,$columns){
                        foreach($columns as $column)
                        {
                            if($keyword != ''){
                                $result->orWhere($column,'ILIKE','%'.$keyword.'%');
                            }
                        }
                    })
                    ->get();

        return view('admin.materi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();

            if ($request->has('file_path')) {
                $data['file_path'] = $request->file('file_path')->store('materi', 'public');
            }

            if ($data['type'] == 'on') {
                $data['type'] = 1;
            }

            return $this->atomic(function () use ($data) {
                $create =  Materi::create($data);
                
                return redirect()->route('materi.index')->with('sucess', 'Data Berhasil Ditambahkan');
            });
        } catch (\Exception $e) {
            return redirect()->route('materi.index')->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(!is_numeric($id)) {
            return abort(404);
        }
        $data =  Materi::findOrFail($id);

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(empty($id)) {
            return abort(404);
        }
        
        $data =  Materi::find($id);

        return view('admin.materi.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $data = $request->all();
            $this->validasiUpdate($request);
            if ($request->has('file_path')) {
                $data['file_path'] = $request->file('file_path')->store('materi', 'public');
            }

            if ($data['type'] == 'on') {
                $data['type'] = 1;
            }

            return $this->atomic(function () use ($data, $id) {
                $update = Materi::find($id)->update($data);

                return redirect()->route('materi.index')->with('sucess', 'Data Berhasil Diupdate');
            });
        } catch (\Exception $e) {
            return redirect()->route('materi.index')->with('danger', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $destroy = Materi::find($id);
            $destroy->delete();

            return view('admin.materi.index')->with('sucess', 'Data Berhasil Dihapus');
        } catch (\Throwable $e) {
            return view('admin.materi.index')->with('danger', $e->getMessage());
        }
    }

    public function validasi($request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'type'  => 'required',
            'file_path' => 'mimes:mp4,ogx,oga,ogv,ogg,webm|max:10000',
        ]);
    }

    public function validasiUpdate($request)
    {
        $this->validate($request, [
            'title'  => 'required',
            'type'  => 'required',
            'file_path' => 'mimes:mp4,ogx,oga,ogv,ogg,webm|max:10000',
        ]);
    }
}
