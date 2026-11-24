<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::paginate(10);

        return view('admin.users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        /**
         * performs validation check on the request passed data
         * from the create user form.
         */
        $validated = $request->validate([
            'name' => ['string', 'max: 128'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::defaults(), 'string'],
        ]);

        /**
         * performing hashing on the new users password
         */
        $password = Hash::make($validated['password']);
       
        /**
         * creating the new user in the database
         */
        User::create([
            ...$validated,
            'password' => $password,
        ]);

        /**
         * redirecting back to the create page with the session 
         * profile created so a feed back message can be shown to 
         * show the create was finished.
         */
        return redirect()->route('admin.users.create')
            ->with('status', 'profile-created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

        return view('admin.users.show' ,compact('user',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('admin.users.edit') -> with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminUserProfileUpdateRequest $request, User $user)
    {
        // dd($request->all());

        /**
         * mapping the user data to the User model af the
         * validated method comes back as true based on the 
         * AdminUserProfileUpdateRequest validation rules
         */
        $user->fill($request->validated());

        
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        /**
         * saves user update to the database
         */
        $user->save();

        /**
         * redirecting back to the create page with the session 
         * profile updated so a feed back message can be shown to 
         * show the create was finished.
         */

        return redirect()->route('admin.users.edit', $user)
            ->with('status', 'profile-updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        //dd($user, $request->user());

        /**
         * validated that the text "delete user"
         * was input to confirm deletion
         */
        $request->validateWithBag('userDeletion', [
            'confirm' => ['required', 'in:delete user'],
        ]);

        /**
         * deleting user
         */
        $user->delete();

        /**
         * redirect to users index, with a user deleted status
         * confiming the deletion is complete
         */
        return redirect()->route('admin.users.index')
            ->with('status', 'user-deleted');
    }
}
