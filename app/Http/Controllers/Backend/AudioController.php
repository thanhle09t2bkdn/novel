<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Audios\AudioCreateRequest;
use App\Http\Requests\Backend\Audios\AudioUpdateRequest;
use App\Repositories\postRepository;
use App\Repositories\AudioRepository;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class AudioController extends Controller
{
    /**
     * Repository
     *
     * @var audioRepository
     * @var postRepository
     */
    private $audioRepository;
    private $postRepository;

    /**
     * Constructor.
     *
     * @param AudioRepository $audioRepository
     */
    public function __construct(AudioRepository $audioRepository, postRepository $postRepository)
    {
        $this->audioRepository = $audioRepository;
        $this->postRepository = $postRepository;
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
            $list = $this->audioRepository->searchFromRequest($request);

            return view('backend.audios.index', compact('list'));
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
            $posts = $this->postRepository->all();
            return view('backend.audios.create', compact('posts'));
        } catch (Exception $exception) {
            Log::error($exception);
            abort(500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @param AudioCreateRequest $request
     * @return RedirectResponse
     */
    public function store(AudioCreateRequest $request)
    {
        try {
            $attributes = $request->only(array_keys($request->rules()));
            $item = $this->audioRepository->create($attributes);

            $request->session()->flash('success', 'The post has been successfully created.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.audios.edit', $item->id);
            }

            return redirect()->route('backend.audios.show', $item->id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while creating the post.');
        }

        return redirect()->route('backend.audios.index');
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
            $item = $this->audioRepository->getById($id);
            return view('backend.audios.show', compact('item'));
        } catch (ModelNotFoundException $exception) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the post.');
        }

        return redirect()->route('backend.audios.index');
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
            $posts = $this->postRepository->all();
            $item = $this->audioRepository->getById($id);

            return view('backend.audios.edit', compact('item', 'posts'));
        } catch (ModelNotFoundException $e) {
            $request->session()->flash('error', 'Sorry, the page you are looking for could not be found.');
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while showing the post.');
        }

        return redirect()->route('backend.audios.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AudioUpdateRequest $request
     * @param mixed $id
     *
     * @return RedirectResponse
     */
    public function update(AudioUpdateRequest $request, $id)
    {
        try {
            $attributes = $request->only(array_keys($request->rules()));
            $this->audioRepository->update($attributes, $id);

            $request->session()->flash('success', 'The audio has been successfully updated.');

            if ($request->get('action') === 'edit') {
                return redirect()->route('backend.audios.edit', $id);
            }

            return redirect()->route('backend.audios.show', $id);
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while updating the post.');
        }

        return redirect()->route('backend.audios.index');
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
                $request->session()->flash('error', 'Please choose any audios to delete.');
            } else {
                $this->audioRepository->deleteByIds($ids);
                $request->session()->flash('success', 'The audios has been successfully deleted.');
            }
        } catch (Exception $exception) {
            Log::error($exception);
            $request->session()->flash('error', 'An error occurred while deleting the audios.');
        }

        return redirect()->route('backend.audios.index');
    }
}
