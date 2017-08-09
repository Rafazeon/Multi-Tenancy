<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function update($id)
    {
        $user = User::find($id);
        $validation = Validator::make($input, User::rolesUpdate($user->id));

        if ($validation->passes())
        {
            $user->update($input);

            return Redirect::route('admin.user.show', $id);
        }

        return Redirect::route('admin.user.edit', $id)->withInput()->withErrors($validation);
    }

}
