<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateJadwalAPIRequest;
use App\Http\Requests\API\UpdateJadwalAPIRequest;
use App\Models\Jadwal;
use App\Repositories\JadwalRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class JadwalController
 * @package App\Http\Controllers\API
 */

class JadwalAPIController extends AppBaseController
{
    /** @var  JadwalRepository */
    private $jadwalRepository;

    public function __construct(JadwalRepository $jadwalRepo)
    {
        $this->jadwalRepository = $jadwalRepo;
    }

    /**
     * Display a listing of the Jadwal.
     * GET|HEAD /jadwals
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->jadwalRepository->pushCriteria(new RequestCriteria($request));
        $this->jadwalRepository->pushCriteria(new LimitOffsetCriteria($request));
        $jadwals = $this->jadwalRepository->all();

        return $this->sendResponse($jadwals->toArray(), 'Jadwals retrieved successfully');
    }

    /**
     * Store a newly created Jadwal in storage.
     * POST /jadwals
     *
     * @param CreateJadwalAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateJadwalAPIRequest $request)
    {
        $input = $request->all();

        $jadwals = $this->jadwalRepository->create($input);

        return $this->sendResponse($jadwals->toArray(), 'Jadwal saved successfully');
    }

    /**
     * Display the specified Jadwal.
     * GET|HEAD /jadwals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Jadwal $jadwal */
        $jadwal = $this->jadwalRepository->findWithoutFail($id);

        if (empty($jadwal)) {
            return $this->sendError('Jadwal not found');
        }

        return $this->sendResponse($jadwal->toArray(), 'Jadwal retrieved successfully');
    }

    /**
     * Update the specified Jadwal in storage.
     * PUT/PATCH /jadwals/{id}
     *
     * @param  int $id
     * @param UpdateJadwalAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateJadwalAPIRequest $request)
    {
        $input = $request->all();

        /** @var Jadwal $jadwal */
        $jadwal = $this->jadwalRepository->findWithoutFail($id);

        if (empty($jadwal)) {
            return $this->sendError('Jadwal not found');
        }

        $jadwal = $this->jadwalRepository->update($input, $id);

        return $this->sendResponse($jadwal->toArray(), 'Jadwal updated successfully');
    }

    /**
     * Remove the specified Jadwal from storage.
     * DELETE /jadwals/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Jadwal $jadwal */
        $jadwal = $this->jadwalRepository->findWithoutFail($id);

        if (empty($jadwal)) {
            return $this->sendError('Jadwal not found');
        }

        $jadwal->delete();

        return $this->sendResponse($id, 'Jadwal deleted successfully');
    }
}
