<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateKajianAPIRequest;
use App\Http\Requests\API\UpdateKajianAPIRequest;
use App\Models\Kajian;
use App\Repositories\KajianRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Carbon\Carbon;

/**
 * Class KajianController
 * @package App\Http\Controllers\API
 */

class KajianAPIController extends AppBaseController
{
    /** @var  KajianRepository */
    private $kajianRepository;

    public function __construct(KajianRepository $kajianRepo)
    {
        $this->kajianRepository = $kajianRepo;
    }

    /**
     * Display a listing of the Kajian.
     * GET|HEAD /kajians
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kajianRepository->pushCriteria(new RequestCriteria($request));
        $this->kajianRepository->pushCriteria(new LimitOffsetCriteria($request));
        $kajians = $this->kajianRepository->with('mosque')->all();

        return $this->sendResponse($kajians->toArray(), 'Kajians retrieved successfully');
    }

    /**
     * Store a newly created Kajian in storage.
     * POST /kajians
     *
     * @param CreateKajianAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateKajianAPIRequest $request)
    {
        $input = $request->all();

        $kajians = $this->kajianRepository->create($input);

        return $this->sendResponse($kajians->toArray(), 'Kajian saved successfully');
    } 

    public function kajiaByDate(Request $request)
    {
        $input = $request->input('date');
        // $myDate = new Carbon($input);
        // dd($myDate->toDayDateTimeString());
        $kajians = Kajian::where('waktu',$input)->with('mosque')->get();

        return $this->sendResponse($kajians->toArray(), 'Kajian retrieved successfully');
    }

    public function kajianByMosque($id)
    {
        // $myDate = new Carbon($input);
        // dd($myDate->toDayDateTimeString());
        $kajians = Kajian::where('id_mosque',$id)->get();

        return $this->sendResponse($kajians->toArray(), 'Kajian retrieved successfully');
    }

    /**
     * Display the specified Kajian.
     * GET|HEAD /kajians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Kajian $kajian */
        $kajian = $this->kajianRepository->findWithoutFail($id);

        if (empty($kajian)) {
            return $this->sendError('Kajian not found');
        }

        return $this->sendResponse($kajian->toArray(), 'Kajian retrieved successfully');
    } 



    /**
     * Update the specified Kajian in storage.
     * PUT/PATCH /kajians/{id}
     *
     * @param  int $id
     * @param UpdateKajianAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKajianAPIRequest $request)
    {
        $input = $request->all();

        /** @var Kajian $kajian */
        $kajian = $this->kajianRepository->findWithoutFail($id);

        if (empty($kajian)) {
            return $this->sendError('Kajian not found');
        }

        $kajian = $this->kajianRepository->update($input, $id);

        return $this->sendResponse($kajian->toArray(), 'Kajian updated successfully');
    }

    /**
     * Remove the specified Kajian from storage.
     * DELETE /kajians/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Kajian $kajian */
        $kajian = $this->kajianRepository->findWithoutFail($id);

        if (empty($kajian)) {
            return $this->sendError('Kajian not found');
        }

        $kajian->delete();

        return $this->sendResponse($id, 'Kajian deleted successfully');
    }
}
