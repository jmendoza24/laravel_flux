<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createproducto_dibujoRequest;
use App\Http\Requests\Updateproducto_dibujoRequest;
use App\Repositories\producto_dibujoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class producto_dibujoController extends AppBaseController
{
    /** @var  producto_dibujoRepository */
    private $productoDibujoRepository;

    public function __construct(producto_dibujoRepository $productoDibujoRepo)
    {
        $this->productoDibujoRepository = $productoDibujoRepo;
    }

    /**
     * Display a listing of the producto_dibujo.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $productoDibujos = $this->productoDibujoRepository->all();

        return view('producto_dibujos.index')
            ->with('productoDibujos', $productoDibujos);
    }

    /**
     * Show the form for creating a new producto_dibujo.
     *
     * @return Response
     */
    public function create()
    {
        return view('producto_dibujos.create');
    }

    /**
     * Store a newly created producto_dibujo in storage.
     *
     * @param Createproducto_dibujoRequest $request
     *
     * @return Response
     */
    public function store(Createproducto_dibujoRequest $request)
    {
        $input = $request->all();

        $productoDibujo = $this->productoDibujoRepository->create($input);

        Flash::success('Producto Dibujo saved successfully.');

        return redirect(route('productoDibujos.index'));
    }

    /**
     * Display the specified producto_dibujo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $productoDibujo = $this->productoDibujoRepository->find($id);

        if (empty($productoDibujo)) {
            Flash::error('Producto Dibujo not found');

            return redirect(route('productoDibujos.index'));
        }

        return view('producto_dibujos.show')->with('productoDibujo', $productoDibujo);
    }

    /**
     * Show the form for editing the specified producto_dibujo.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $productoDibujo = $this->productoDibujoRepository->find($id);

        if (empty($productoDibujo)) {
            Flash::error('Producto Dibujo not found');

            return redirect(route('productoDibujos.index'));
        }

        return view('producto_dibujos.edit')->with('productoDibujo', $productoDibujo);
    }

    /**
     * Update the specified producto_dibujo in storage.
     *
     * @param int $id
     * @param Updateproducto_dibujoRequest $request
     *
     * @return Response
     */
    public function update($id, Updateproducto_dibujoRequest $request)
    {
        $productoDibujo = $this->productoDibujoRepository->find($id);

        if (empty($productoDibujo)) {
            Flash::error('Producto Dibujo not found');

            return redirect(route('productoDibujos.index'));
        }

        $productoDibujo = $this->productoDibujoRepository->update($request->all(), $id);

        Flash::success('Producto Dibujo updated successfully.');

        return redirect(route('productoDibujos.index'));
    }

    /**
     * Remove the specified producto_dibujo from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $productoDibujo = $this->productoDibujoRepository->find($id);

        if (empty($productoDibujo)) {
            Flash::error('Producto Dibujo not found');

            return redirect(route('productoDibujos.index'));
        }

        $this->productoDibujoRepository->delete($id);

        Flash::success('Producto Dibujo deleted successfully.');

        return redirect(route('productoDibujos.index'));
    }
}
