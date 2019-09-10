<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFormaRequest;
use App\Http\Requests\UpdateFormaRequest;
use App\Repositories\FormaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class FormaController extends AppBaseController
{
    /** @var  FormaRepository */
    private $formaRepository;

    public function __construct(FormaRepository $formaRepo)
    {
        $this->formaRepository = $formaRepo;
    }

    /**
     * Display a listing of the Forma.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $formas = $this->formaRepository->all();

        return view('formas.index')
            ->with('formas', $formas);
    }

    /**
     * Show the form for creating a new Forma.
     *
     * @return Response
     */
    public function create()
    {
        return view('formas.create');
    }

    /**
     * Store a newly created Forma in storage.
     *
     * @param CreateFormaRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaRequest $request)
    {
        $input = $request->all();

        $forma = $this->formaRepository->create($input);

        Flash::success('Forma saved successfully.');

        return redirect(route('formas.index'));
    }

    /**
     * Display the specified Forma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $forma = $this->formaRepository->find($id);

        if (empty($forma)) {
            Flash::error('Forma not found');

            return redirect(route('formas.index'));
        }

        return view('formas.show')->with('forma', $forma);
    }

    /**
     * Show the form for editing the specified Forma.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $forma = $this->formaRepository->find($id);

        if (empty($forma)) {
            Flash::error('Forma not found');

            return redirect(route('formas.index'));
        }

        return view('formas.edit')->with('forma', $forma);
    }

    /**
     * Update the specified Forma in storage.
     *
     * @param int $id
     * @param UpdateFormaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaRequest $request)
    {
        $forma = $this->formaRepository->find($id);

        if (empty($forma)) {
            Flash::error('Forma not found');

            return redirect(route('formas.index'));
        }

        $forma = $this->formaRepository->update($request->all(), $id);

        Flash::success('Forma updated successfully.');

        return redirect(route('formas.index'));
    }

    /**
     * Remove the specified Forma from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $forma = $this->formaRepository->find($id);

        if (empty($forma)) {
            Flash::error('Forma not found');

            return redirect(route('formas.index'));
        }

        $this->formaRepository->delete($id);

        Flash::success('Forma deleted successfully.');

        return redirect(route('formas.index'));
    }
}
