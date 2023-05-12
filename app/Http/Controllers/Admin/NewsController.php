<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use App\QueryBuilders\NewsSourcesQueryBuilder;
use App\Services\UploadService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Log;
use Illuminate\Log\Logger;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        NewsQueryBuilder $newsQueryBuilder
    ): View {

        $newsList = $newsQueryBuilder->getNewsWithPagination();

        return \view('admin.news.index', [
            'newsList' => $newsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(
        CategoriesQueryBuilder $categoriesQueryBuilder,
        NewsSourcesQueryBuilder $newsSourcesQueryBuilder,
    ): View {

        $statuses = NewsStatus::all();

        return \view('admin.news.create', [
            'categories' => $categoriesQueryBuilder->getAll(),
            'newssources' => $newsSourcesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $news = News::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());

            return redirect()->route('admin.news.index')
                ->with('success', __('messages.admin.news.success'));
        }
        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        $statuses = NewsStatus::all();

        return \view('admin.news.edit', [
            'news' => $news,
            'categories' => $categoriesQueryBuilder->getAll(),
            'statuses' => $statuses,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news, UploadService $uploadService): RedirectResponse
    {
        $validated = $request->validated();
        $news = $news->fill($request->validated());
        //
        $request->input('description');
        //

        if ($request->hasFile('image')) {
            $validated['image'] = $uploadService->uploadImage($request->file('image'));
        }

        if ($news->update($validated)) {
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')
                ->with('success', 'Новость успешно обновлена');
        }
        return \back()->with('error', 'Не удалось сохранить обновление');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news): JsonResponse
    {
        try {
            $news->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
