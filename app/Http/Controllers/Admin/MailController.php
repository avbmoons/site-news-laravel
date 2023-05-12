<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\MailStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Forms\Mails\EditRequest;
use App\Models\Mail;
use App\QueryBuilders\MailsQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        MailsQueryBuilder $mailsQueryBuilder
    ): View {
        $mailsList = $mailsQueryBuilder->getMailsWithPagination();

        return \view('admin.mails.index', [
            'mailsList' => $mailsList
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = Mail::findOrFail($id);
        return \view('admin.mails.show', ['mail' => $mail]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        $statuses = MailStatus::all();
        return \view('admin.mails.edit', [
            'mail' => $mail,
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
    public function update(EditRequest $request, Mail $mail): RedirectResponse
    {
        $mail = $mail->fill($request->validated());

        if ($mail->update()) {
            return redirect()->route('admin.mails.index')
                ->with('success', 'Сообщение успешно обновлено');
        }
        return \back()->with('error', 'Не удалось сохранить обновление');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        try {
            $mail->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
