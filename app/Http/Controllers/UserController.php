<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Exception;
use App\Enums\User\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application/Factory/View
     */
    public function index(): View
    {
        return view('users.index', [
            'users' => User::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('users.create', [
            'userrole' => Role::TYPES,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @return RedirectResponse
     */
    public function store(UpdateUserRequest $request): RedirectResponse
    {
        $user = new User($request->all());

        $user->save();

        return redirect(route('users.index'))->with('status', __('crud.message.users.success_user_add'));
    }

    /**
     * Display the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function show(User $user): View
    {
        return view("user.show", [
            'user' => $user,
            'userrole' => Role::TYPES,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
        return view('users.edit', [
            'user' => $user,
            'userrole' => Role::TYPES,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateUserRequest  $request
     * @param  User  $user
     * @return RedirectResponse
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $user->fill($request->validated());

        $user->save();

        return redirect(route('users.index'))->with('status', __('crud.message.users.success_user_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User  $user
     * @param  JsonResponse
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();
            Session::flash('status', __('crud.message.users.success_user_deleted'));
            return response()->json([
                'status' => 'success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Wystąpił błąd'
            ])->setStatusCode(500);
        }
    }
}
