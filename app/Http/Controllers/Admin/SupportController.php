<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
            page        : $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter      : $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/supports/index', compact('supports', 'filters'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function show(string $id)
    {
        // Support::find($id) = Vai direto na coluna ID
        // Support::where('coluna', 'condicional (se for =, só n colocar nada)', 'valor a buscar') -> first() pegar o 1º resultado

        if (!$infoSupport = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/show', compact('infoSupport'));
    }

    public function edit(string $id)
    {
        if (!$infoSupport = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports/edit', compact('infoSupport'));
    }

    public function update(string $id, StoreUpdateSupport $request)
    {
        $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
