<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKajianRequest;
use App\Http\Requests\UpdateKajianRequest;
use App\Repositories\KajianRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Mosque;

class KajianController extends AppBaseController
{
    /** @var  KajianRepository */
    private $kajianRepository;

    public function __construct(KajianRepository $kajianRepo)
    {
        $this->kajianRepository = $kajianRepo;
    }

    /**
     * Display a listing of the Kajian.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kajianRepository->pushCriteria(new RequestCriteria($request));
        $kajians = $this->kajianRepository->all();

        return view('kajians.index')
            ->with('kajians', $kajians);
    }

    /**
     * Show the form for creating a new Kajian.
     *
     * @return Response
     */
    public function create()
    {
        $mosque = Mosque::select('nama','id')->get();
        return view('kajians.create',compact('mosque',$mosque));
    }

    /**
     * Store a newly created Kajian in storage.
     *
     * @param CreateKajianRequest $request
     *
     * @return Response
     */
    public function store(CreateKajianRequest $request)
    {
        $input = $request->all();

        $kajian = $this->kajianRepository->create($input);

        Flash::success('Kajian saved successfully.');

        return redirect(route('kajians.index'));
    }

    /**
     * Display the specified Kajian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kajian = $this->kajianRepository->findWithoutFail($id);

        if (empty($kajian)) {
            Flash::error('Kajian not found');

            return redirect(route('kajians.index'));
        }

        return view('kajians.show')->with('kajian', $kajian);
    }

    /**
     * Show the form for editing the specified Kajian.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kajian = $this->kajianRepository->findWithoutFail($id);
        $mosque = Mosque::select('nama','id')->get();

        if (empty($kajian)) {
            Flash::error('Kajian not found');

            return redirect(route('kajians.index'));
        }

        return view('kajians.edit',compact('mosque',$mosque))->with('kajian', $kajian);
    }

    /**
     * Update the specified Kajian in storage.
     *
     * @param  int              $id
     * @param UpdateKajianRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKajianRequest $request)
    {
        $kajian = $this->kajianRepository->findWithoutFail($id);

        if (empty($kajian)) {
            Flash::error('Kajian not found');

            return redirect(route('kajians.index'));
        }

        $kajian = $this->kajianRepository->update($request->all(), $id);

        Flash::success('Kajian updated successfully.');

        return redirect(route('kajians.index'));
    }

    /**
     * Remove the specified Kajian from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kajian = $this->kajianRepository->findWithoutFail($id);

        if (empty($kajian)) {
            Flash::error('Kajian not found');

            return redirect(route('kajians.index'));
        }

        $this->kajianRepository->delete($id);

        Flash::success('Kajian deleted successfully.');

        return redirect(route('kajians.index'));
    }
}
