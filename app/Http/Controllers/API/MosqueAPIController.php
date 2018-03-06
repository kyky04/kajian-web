<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMosqueAPIRequest;
use App\Http\Requests\API\UpdateMosqueAPIRequest;
use App\Models\Mosque;
use App\Repositories\MosqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MosqueController
 * @package App\Http\Controllers\API
 */

class MosqueAPIController extends AppBaseController
{
    /** @var  MosqueRepository */
    private $mosqueRepository;

    public function __construct(MosqueRepository $mosqueRepo)
    {
        $this->mosqueRepository = $mosqueRepo;
    }

    /**
     * Display a listing of the Mosque.
     * GET|HEAD /mosques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->mosqueRepository->pushCriteria(new RequestCriteria($request));
        $this->mosqueRepository->pushCriteria(new LimitOffsetCriteria($request));
        $mosques = $this->mosqueRepository->all();

        return $this->sendResponse($mosques->toArray(), 'Mosques retrieved successfully');
    }

    /**
     * Store a newly created Mosque in storage.
     * POST /mosques
     *
     * @param CreateMosqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMosqueAPIRequest $request)
    {
        $input = $request->all();

        $mosques = $this->mosqueRepository->create($input);

        return $this->sendResponse($mosques->toArray(), 'Mosque saved successfully');
    }

    /**
     * Display the specified Mosque.
     * GET|HEAD /mosques/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Mosque $mosque */
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            return $this->sendError('Mosque not found');
        }

        return $this->sendResponse($mosque->toArray(), 'Mosque retrieved successfully');
    }

    /**
     * Update the specified Mosque in storage.
     * PUT/PATCH /mosques/{id}
     *
     * @param  int $id
     * @param UpdateMosqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMosqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Mosque $mosque */
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            return $this->sendError('Mosque not found');
        }

        $mosque = $this->mosqueRepository->update($input, $id);

        return $this->sendResponse($mosque->toArray(), 'Mosque updated successfully');
    }

    /**
     * Remove the specified Mosque from storage.
     * DELETE /mosques/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Mosque $mosque */
        $mosque = $this->mosqueRepository->findWithoutFail($id);

        if (empty($mosque)) {
            return $this->sendError('Mosque not found');
        }

        $mosque->delete();

        return $this->sendResponse($id, 'Mosque deleted successfully');
    }
}
