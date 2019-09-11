<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDocumentosRequest;
use App\Http\Requests\UpdateDocumentosRequest;
use App\Repositories\DocumentosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DocumentosController extends AppBaseController
{
    /** @var  DocumentosRepository */
    private $documentosRepository;

    public function __construct(DocumentosRepository $documentosRepo)
    {
        $this->documentosRepository = $documentosRepo;
    }

    /**
     * Display a listing of the Documentos.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $documentos = $this->documentosRepository->all();

        return view('documentos.index')
            ->with('documentos', $documentos);
    }

    /**
     * Show the form for creating a new Documentos.
     *
     * @return Response
     */
    public function create()
    {
        return view('documentos.create');
    }

    /**
     * Store a newly created Documentos in storage.
     *
     * @param CreateDocumentosRequest $request
     *
     * @return Response
     */
    public function store(CreateDocumentosRequest $request)
    {
        $input = $request->all();

        $documentos = $this->documentosRepository->create($input);

        Flash::success('Documentos saved successfully.');

        return redirect(route('documentos.index'));
    }

    /**
     * Display the specified Documentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            Flash::error('Documentos not found');

            return redirect(route('documentos.index'));
        }

        return view('documentos.show')->with('documentos', $documentos);
    }

    /**
     * Show the form for editing the specified Documentos.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            Flash::error('Documentos not found');

            return redirect(route('documentos.index'));
        }

        return view('documentos.edit')->with('documentos', $documentos);
    }

    /**
     * Update the specified Documentos in storage.
     *
     * @param int $id
     * @param UpdateDocumentosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocumentosRequest $request)
    {
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            Flash::error('Documentos not found');

            return redirect(route('documentos.index'));
        }

        $documentos = $this->documentosRepository->update($request->all(), $id);

        Flash::success('Documentos updated successfully.');

        return redirect(route('documentos.index'));
    }

    /**
     * Remove the specified Documentos from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $documentos = $this->documentosRepository->find($id);

        if (empty($documentos)) {
            Flash::error('Documentos not found');

            return redirect(route('documentos.index'));
        }

        $this->documentosRepository->delete($id);

        Flash::success('Documentos deleted successfully.');

        return redirect(route('documentos.index'));
    }
}
