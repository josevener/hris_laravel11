<?php

namespace App\Http\Controllers;

use App\Models\RoleTypeUser;
use App\Models\User;
use App\Models\UserType;
use Exception;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $currentUserId = Auth::id();
        $users = User::where('id', '!=', $currentUserId)->get();
        $user_types = UserType::all();
        $role_name = RoleTypeUser::all();

        return view('users.index', compact('users', 'user_types', 'role_name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone_number' => 'nullable|string|max:25',
            'role_name' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        try {
            User::create([
                'employeeId' => $this->employeeId(),
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role_name' => $request->role_name,
                'status' => $request->status,
                'profile_image' => $this->uploadImage($request),
                'password' => bcrypt($request->password),
            ]);

            flash()->success('New user has been created successfully');
            return to_route('users.index');
        } catch (Exception $e) {
            flash()->error('Failed to save user record: ' . $e->getMessage());
            return redirect()->redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role_name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:25',
            'status' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $user = User::findOrFail($id);

            // Handle profile image upload if provided
            if ($request->hasFile('profile_image')) {
                $imagePath = $request->file('profile_image')->store('assets/images', 'public');
                $user->profile_image = $imagePath;
            }

            // Update user details
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'role_name' => $request->role_name,
                'status' => $request->status,
                'profile_image' => $this->uploadImage($request),
            ]);

            flash()->success('User information has been updated successfully');
            return to_route('users.index');
        } catch (Exception $e) {
            flash()->error('Failed to update user record: ' .$e->getMessage());
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // $profile_image = $request->profile_image;

            $user = User::findOrFail($id);
            if ($user->employee) {
                $user->employee->delete();
            }

            $user->delete();

            // if($profile_image !== 'photo_defaults.jpg'){
            //     unlink('assets/images/'. $profile_image);
            // }

            flash()->success('User has been deleted successfully');
            return to_route('users.index');
        } catch (Exception $e) {
            flash()->error('Failed to delete record: ' .$e->getMessage());
            return redirect()->back();
        }
    }

    private function uploadImage($request)
    {
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/images'), $filename);
            return 'assets/images/' . $filename;
        }
        return null;
    }

    private function employeeId()
    {
        // Get the latest employee ID from 'employee_id' column
        $getLatestUser = User::whereNotNull('employeeId')->orderBy('employeeId', 'desc')->first();

        // Extract the numeric part of the employee ID and increment
        if ($getLatestUser && preg_match('/EMP-(\d+)/', $getLatestUser->employee_id, $matches)) {
            $getNextEmployeeId = intval($matches[1]) + 1;
        } else {
            $getNextEmployeeId = 1;
        }

        // Generate new Employee ID
        $generatedEmployeeId = 'EMP-' . sprintf('%04d', $getNextEmployeeId);

        // Ensure uniqueness
        while (User::where('employeeId', $generatedEmployeeId)->exists()) {
            $getNextEmployeeId++;
            $generatedEmployeeId = 'EMP-' . sprintf('%04d', $getNextEmployeeId);
        }

        return $generatedEmployeeId;
    }
}
