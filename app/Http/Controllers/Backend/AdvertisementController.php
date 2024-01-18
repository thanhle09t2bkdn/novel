<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Advertisements\AdvertisementCreateRequest;
use App\Http\Requests\Backend\Advertisements\AdvertisementUpdateRequest;
use App\Repositories\AdvertisementRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class AdvertisementController extends Controller
{
    /**
     * Repository
     *
     * @var AdvertisementRepository
     */
    private $advertisementRepository;

    /**
     * Constructor.
     *
     * @param AdvertisementRepository $advertisementRepository
     */
    public function __construct(advertisementRepository $advertisementRepository)
    {
        $this->advertisementRepository = $advertisementRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     *
     * @return Renderable|void
     */
    public function index(Request $request)
    {
        try {
            $list = $this->advertisementRepository->searchFromRequest($request);

            return view('backend.advertisements.index', compact('list'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable|void
     */
    public function create()
    {
        try {
            return view('backend.advertisements.create');
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param advertisementCreateRequest $request
     * @return RedirectResponse
     */
    public function store(advertisementCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($request->rules()));
            $item = $this->advertisementRepository->create($attributes);

            $request->session()->flash('success', 'The advertisement has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.advertisements.edit', $item->id);
            }

            return redirect()->route('backend.advertisements.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the advertisement.');
        }

        return redirect()->route('backend.advertisements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param mixed $id
     *
     * @return View|RedirectResponse
     */
    public function show(Request $request, $id)
    {
        try {
            $item = $this->advertisementRepository->getById($id);

            return view('backend.advertisements.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the advertisement.');
        }

        return redirect()->route('backend.advertisements.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param string $id
     *
     * @return View|RedirectResponse
     */
    public function edit(Request $request, string $id)
    {
        try {
            $item = $this->advertisementRepository->getById($id);

            return view('backend.advertisements.edit', compact('item'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the advertisement.');
        }

        return redirect()->route('backend.advertisements.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param advertisementUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(advertisementUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($request->rules()));
            $this->advertisementRepository->update($attributes, $id);

            $request->session()->flash('success', 'The advertisement has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.advertisements.edit', $id);
            }

            return redirect()->route('backend.advertisements.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the advertisement.');
        }

        return redirect()->route('backend.advertisements.index');
    }

    /**
     * Delete multiple items
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function delete(Request $request)
    {
        try {
            $ids = $request->get('id');
            if (empty($ids)) {
                $request->session()->flash('error', 'Please choose any advertisements to delete.');
            } else {
                $this->advertisementRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The advertisements has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the advertisements.');
        }

        return redirect()->route('backend.advertisements.index');
    }
}
