<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMosqueRequest;
use App\Http\Requests\UpdateMosqueRequest;
use App\Repositories\MosqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MosqueController extends AppBaseController
{
    /** @var  MosqueRepository */
    private $mosqueRepository;

    public function __construct(MosqueRepository $mosqueRepo)
    {
        $this->mosqueRepository = $mosqueRepo;
    }

    /**
     * Display a listing of the Mosque.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mosqueRepository->pushCriteria(new RequestCriteria($request));
        $mosques = $this->mosqueRepository->all();

        return view('mosques.index')
            ->with('mosques', $mosques);
    }

    /**
     * Show the form for creating a new Mosque.
     *
     * @return Response
     */
    public function create()
    {
        return view('mosques.create');
    }

    /**
     * Store a newly created Mosque in storage.
     *
     * @param CreateMosqueRequest $request
     *
     * @return Response
     */
    public function store(CreateMosqueRequest $request)
    {
        $input = $request->all();

        $mosque = $this->mosqueRepository->create($input);

        Flash::success('Mosque saved successfully.');

        return redirect(route('mosques.index'));
    }

    /**
     * Display the specified Mosque.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            Flash::error('Mosque not found');

            return redirect(route('mosques.index'));
        }

        return view('mosques.show')->with('mosque', $mosque);
    }

    /**
     * Show the form for editing the specified Mosque.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            Flash::error('Mosque not found');

            return redirect(route('mosques.index'));
        }

        return view('mosques.edit')->with('mosque', $mosque);
    }

    /**
     * Update the specified Mosque in storage.
     *
     * @param  int              $id
     * @param UpdateMosqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMosqueRequest $request)
    {
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            Flash::error('Mosque not found');

            return redirect(route('mosques.index'));
        }

        $mosque = $this->mosqueRepository->update($request->all(), $id);

        Flash::success('Mosque updated successfully.');

        return redirect(route('mosques.index'));
    }

    /**
     * Remove the specified Mosque from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            Flash::error('Mosque not found');

            return redirect(route('mosques.index'));
        }

        $this->mosqueRepository->delete($id);

        Flash::success('Mosque deleted successfully.');

        return redirect(route('mosques.index'));
    }
}
