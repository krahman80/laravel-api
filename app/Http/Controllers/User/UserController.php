<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsersResource;
use Spatie\QueryBuilder\QueryBuilder;
use App\Http\Resources\UsersCollection;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::jsonPaginate();
        $users = QueryBuilder::for(User::class)
                ->allowedFilters(['name', 'email'])
                ->allowedSorts('name', 'email')
                ->jsonPaginate();
                
        // return UsersResource::collection($users);
        return new UsersCollection($users);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->input('data.attributes.name'),
            'email' => $request->input('data.attributes.email'),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
            'verified' => 0,
            'verification_token' => null,
            'admin' => 'false',
        ]);

        return (new UsersResource($user))->response()->header('Location', route('users.show', ['user' => $user]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return new UsersResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->update($request->input('data.attributes'));
        return new UsersResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(null, 204);
    }
}
