<?php

namespace App\Http\Controllers;
use App\Models\Datatunggal;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DatatunggalControler extends Controller
{
    public function index():view
    {
        $datatunggals = Datatunggal::get();
        return view('datatunggals.index', compact('datatunggals'));
    }

    public function create(): View
    {
        return view('datatunggals.create');
    }

    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'skor'=> 'required',
        ]);

        //create post
        Datatunggal::create([
            'skor'=> $request->skor,
        ]);

        //redirect to index
        return redirect()->route('datatunggals.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        //get post by ID
        $datatunggal = Datatunggal::findOrFail($id);

        //render view with post
        return view('datatunggals.edit', compact('datatunggal'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'skor'     => 'required',
        ]);

        //get by ID
        $datatunggal = Datatunggal::findOrFail($id);

        //update post without image
        $datatunggal->update([
            'skor'     => $request->skor,
        ]);

            //redirect to index
            return redirect()->route('datatunggals.index')->with(['success' => 'Data Berhasil Diubah!']);
        
    }

    public function destroy(string $id): RedirectResponse
    {
        $datatunggal = Datatunggal::find($id);
        if ($datatunggal) {
            $datatunggal->delete();
        } else{

        }
        return redirect()->route('datatunggals.index')->with('success', 'Data berhasil dihapus.');
    }
}
