<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();

        return view('admin/supports/index', compact('supports'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('supports.index');
    }

    public function show(string|int $id, Support $support)
    {
        // Support::find($id) = Vai direto na coluna ID
        // Support::where('coluna', 'condicional (se for =, só n colocar nada)', 'valor a buscar') -> first() pegar o 1º resultado

        if(!$infoSupport = $support->find($id)) {
            return back();
        }

        return view('admin/supports/show', compact('infoSupport'));
    }

    public function edit(string|int $id, Support $support)
    {
        if(!$infoSupport = $support->find($id)) {
            return back();
        }

        return view('admin/supports/edit', compact('infoSupport'));
    }

    public function update(string|int $id, StoreUpdateSupport $request, Support $support)
    {
        if(!$infoSupport = $support->find($id)) {
            return back();
        }

        $infoSupport->update($request->validated());

        return redirect()->route('supports.index');
    }

    public function destroy(string|int $id, Support $support)
    {
        if(!$infoSupport = $support->find($id)) {
            return back();
        }

        $infoSupport->delete();

        return redirect()->route('supports.index');
    }
}
