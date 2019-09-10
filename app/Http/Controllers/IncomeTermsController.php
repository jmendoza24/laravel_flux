<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIncomeTermsRequest;
use App\Http\Requests\UpdateIncomeTermsRequest;
use App\Repositories\IncomeTermsRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class IncomeTermsController extends AppBaseController
{
    /** @var  IncomeTermsRepository */
    private $incomeTermsRepository;

    public function __construct(IncomeTermsRepository $incomeTermsRepo)
    {
        $this->incomeTermsRepository = $incomeTermsRepo;
    }

    /**
     * Display a listing of the IncomeTerms.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $incomeTerms = $this->incomeTermsRepository->all();

        return view('income_terms.index')
            ->with('incomeTerms', $incomeTerms);
    }

    /**
     * Show the form for creating a new IncomeTerms.
     *
     * @return Response
     */
    public function create()
    {
        return view('income_terms.create');
    }

    /**
     * Store a newly created IncomeTerms in storage.
     *
     * @param CreateIncomeTermsRequest $request
     *
     * @return Response
     */
    public function store(CreateIncomeTermsRequest $request)
    {
        $input = $request->all();

        $incomeTerms = $this->incomeTermsRepository->create($input);

        Flash::success('Income Terms saved successfully.');

        return redirect(route('incomeTerms.index'));
    }

    /**
     * Display the specified IncomeTerms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $incomeTerms = $this->incomeTermsRepository->find($id);

        if (empty($incomeTerms)) {
            Flash::error('Income Terms not found');

            return redirect(route('incomeTerms.index'));
        }

        return view('income_terms.show')->with('incomeTerms', $incomeTerms);
    }

    /**
     * Show the form for editing the specified IncomeTerms.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $incomeTerms = $this->incomeTermsRepository->find($id);

        if (empty($incomeTerms)) {
            Flash::error('Income Terms not found');

            return redirect(route('incomeTerms.index'));
        }

        return view('income_terms.edit')->with('incomeTerms', $incomeTerms);
    }

    /**
     * Update the specified IncomeTerms in storage.
     *
     * @param int $id
     * @param UpdateIncomeTermsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIncomeTermsRequest $request)
    {
        $incomeTerms = $this->incomeTermsRepository->find($id);

        if (empty($incomeTerms)) {
            Flash::error('Income Terms not found');

            return redirect(route('incomeTerms.index'));
        }

        $incomeTerms = $this->incomeTermsRepository->update($request->all(), $id);

        Flash::success('Income Terms updated successfully.');

        return redirect(route('incomeTerms.index'));
    }

    /**
     * Remove the specified IncomeTerms from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $incomeTerms = $this->incomeTermsRepository->find($id);

        if (empty($incomeTerms)) {
            Flash::error('Income Terms not found');

            return redirect(route('incomeTerms.index'));
        }

        $this->incomeTermsRepository->delete($id);

        Flash::success('Income Terms deleted successfully.');

        return redirect(route('incomeTerms.index'));
    }
}
