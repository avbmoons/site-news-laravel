<?php

namespace App\Http\Controllers\Admin;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\EditRequest;
use App\Models\User;
use App\QueryBuilders\UsersQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(
        UsersQueryBuilder $usersQueryBuilder
    ): View {
        $usersList = $usersQueryBuilder->getUsersWithPagination();
        return \view('admin.users.index', ['usersList' => $usersList]);
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
        $user = User::findOrFail($id);
        return \view('admin.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $statuses = UserStatus::all();
        $userroles = UserRole::all();

        return \view('admin.users.edit', [
            'user' => $user,
            'statuses' => $statuses,
            'userroles' => $userroles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, User $user): RedirectResponse
    {
        $user = $user->fill($request->validated());

        if ($user->update()) {
            return redirect()->route('admin.users.index')
                ->with('success', 'Профиль успешно обновлен');
        }
        return \back()->with('error', 'Не удалось сохранить обновление');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return \response()->json('ok');
        } catch (\Exception $exception) {

            return \response()->json('error', 400);
        }
    }
}
