<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\User;

class UserController extends Controller
{
    public function userslist(): View
    {
      $users = User::all();
      return view('all-users', [
          'users'=>$users,
      ]);
    }

    public function modifuserform($id)
  {
    $user = User::find($id);
    return view('modif-user', [
      'user'=>$user,
    ]);
  }

  public function update(Request $request, $id)
    {
      $request->validate([
          'name' => 'required|max:255',
          'role' => 'required|max:255',
          'email' => 'required|max:255',
      ]);
      $user = User::find($id);
      $user->update($request->all());
      return redirect()->route('userslist')
        ->with('success', 'User updated successfully.');
    }


    public function destroy($id)
    {
      $user = User::find($id);
      $user->delete();
      return redirect()->route('userslist')
        ->with('success', 'User deleted successfully');
    }
}
