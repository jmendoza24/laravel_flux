<?php

namespace App\Http\Controllers;

use App\Http\Requests\Createcat_beneficiariosRequest;
use App\Http\Requests\Updatecat_beneficiariosRequest;
use App\Repositories\cat_beneficiariosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class cat_beneficiariosController extends AppBaseController
{
    /** @var  cat_beneficiariosRepository */
    private $catBeneficiariosRepository;

    public function __construct(cat_beneficiariosRepository $catBeneficiariosRepo)
    {
        $this->catBeneficiariosRepository = $catBeneficiariosRepo;
    }

    /**
     * Display a listing of the cat_beneficiarios.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $catBeneficiarios = $this->catBeneficiariosRepository->all();

        return view('cat_beneficiarios.index')
            ->with('catBeneficiarios', $catBeneficiarios);
    }

    /**
     * Show the form for creating a new cat_beneficiarios.
     *
     * @return Response
     */
    public function create()
    {
        return view('cat_beneficiarios.create');
    }

    /**
     * Store a newly created cat_beneficiarios in storage.
     *
     * @param Createcat_beneficiariosRequest $request
     *
     * @return Response
     */
    public function store(Createcat_beneficiariosRequest $request)
    {
        $input = $request->all();

        $catBeneficiarios = $this->catBeneficiariosRepository->create($input);

        Flash::success('Cat Beneficiarios saved successfully.');

        return redirect(route('catBeneficiarios.index'));
    }

    /**
     * Display the specified cat_beneficiarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $catBeneficiarios = $this->catBeneficiariosRepository->find($id);

        if (empty($catBeneficiarios)) {
            Flash::error('Cat Beneficiarios not found');

            return redirect(route('catBeneficiarios.index'));
        }

        return view('cat_beneficiarios.show')->with('catBeneficiarios', $catBeneficiarios);
    }

    /**
     * Show the form for editing the specified cat_beneficiarios.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $catBeneficiarios = $this->catBeneficiariosRepository->find($id);

        if (empty($catBeneficiarios)) {
            Flash::error('Cat Beneficiarios not found');

            return redirect(route('catBeneficiarios.index'));
        }

        return view('cat_beneficiarios.edit')->with('catBeneficiarios', $catBeneficiarios);
    }

    /**
     * Update the specified cat_beneficiarios in storage.
     *
     * @param int $id
     * @param Updatecat_beneficiariosRequest $request
     *
     * @return Response
     */
    public function update($id, Updatecat_beneficiariosRequest $request)
    {
        $catBeneficiarios = $this->catBeneficiariosRepository->find($id);

        if (empty($catBeneficiarios)) {
            Flash::error('Cat Beneficiarios not found');

            return redirect(route('catBeneficiarios.index'));
        }

        $catBeneficiarios = $this->catBeneficiariosRepository->update($request->all(), $id);

        Flash::success('Cat Beneficiarios updated successfully.');

        return redirect(route('catBeneficiarios.index'));
    }

    /**
     * Remove the specified cat_beneficiarios from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $catBeneficiarios = $this->catBeneficiariosRepository->find($id);

        if (empty($catBeneficiarios)) {
            Flash::error('Cat Beneficiarios not found');

            return redirect(route('catBeneficiarios.index'));
        }

        $this->catBeneficiariosRepository->delete($id);

        Flash::success('Cat Beneficiarios deleted successfully.');

        return redirect(route('catBeneficiarios.index'));
    }
}
