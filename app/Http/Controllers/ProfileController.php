<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\DonationNotification;
use App\Mail\NewsNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        // Ambil semua postingan dan pengguna
        $posts = Post::with('user')->latest()->get(); // Mengambil postingan dengan relasi user
        $users = User::all(); // Mengambil semua pengguna

        return view('posts.index', compact('posts', 'users'));
    }
    /**
     * Display the user's profile
     */
    public function show()
    {
        return view('profile');
    }

    /**
     * Show the settings page
     */
    public function showSettings()
    {
        return view('profile.setting');
    }

    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        return view('profile.edit');
    }

    /**
     * Update the user's profile.
     */
    public function update(Request $request)
    {
        // Validate request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'location' => 'nullable|string|max:255',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.edit')
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $user = User::find(Auth::id());

            if (!$user) {
                return redirect()
                    ->route('profile.edit')
                    ->with('error', 'User  not found.');
            }

            // Prepare data for update
            $updateData = [
                'name' => $request->name,
                'location' => $request->location,
            ];

            // If user is logged in with Google, don't update email
            if (!$user->google_id) {
                $updateData['email'] = $request->email;
            }

            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                // If there is an existing avatar, delete it
                if ($user->avatar) {
                    Storage::delete($user->avatar);
                }

                // Store the new avatar
                $path = $request->file('avatar')->store('avatars', 'public');
                $updateData['avatar'] = $path; // Update the avatar path
            }

            // Update user data
            $user->fill($updateData);
            $user->save();

            return redirect()
                ->route('profile.edit')
                ->with('success', 'Profile updated successfully!');

        } catch (\Exception $e) {
            // Log the error
            Log::error('Profile update error: ' . $e->getMessage());

            return redirect()
                ->route('profile.edit')
                ->with('error', 'An error occurred while updating your profile. Please try again.');
        }
    }

    public function settings()
    {
        $theme = session('theme', 'light'); // Ambil tema dari session, default ke 'light'
        return view('profile.setting', compact('theme'));
    }

    public function updateTheme(Request $request)
    {
        $request->validate(['theme' => 'required|in:light,dark']);
        session(['theme' => $request->theme]);
        return redirect()->back()->with('success', 'Theme updated successfully!');
    }

    public function processDonation(Request $request)
    {
        // Process the donation...

        // Prepare donation details
        $donationDetails = [
            'amount' => $request->input('amount'),
            'transaction_id' => '123456', // Replace with actual transaction ID
        ];

        // Send email notification
        Mail::to(Auth::user()->email)->send(new DonationNotification($donationDetails));

        return redirect()->back()->with('success', 'Donation processed successfully! A confirmation email has been sent to you.');
    }

    public function createAnnouncement(Request $request)
    {
        // Validate and create the announcement...

        // Prepare the news content
        $newsContent = $request->input('news');

        // Send email notification to all users (you may want to adjust this logic)
        $users = User::all(); // Fetch all users or filter as needed
        foreach ($users as $user) {
            Mail::to($user->email)->send(new NewsNotification($newsContent));
        }

        return redirect()->back()->with('success', 'Announcement created and notifications sent!');
    }

    public function updateNotifications(Request $request)
    {
        try {
            $status = $request->has('email_notifications') ? 1 : 0;
            $userId = Auth::id();
            
            // Log untuk debugging
            Log::info('Updating notifications:', [
                'user_id' => $userId,
                'new_status' => $status,
                'request_data' => $request->all()
            ]);

            $updated = DB::table('users')
                ->where('id', $userId)
                ->update([
                    'email_notifications' => $status
                ]);

            // Log hasil update
            Log::info('Update result:', ['updated' => $updated]);

            if ($updated) {
                $message = $status ? 
                    'Notifikasi email berhasil diaktifkan' : 
                    'Notifikasi email berhasil dinonaktifkan';
                return redirect()->back()->with('success', $message);
            } else {
                throw new \Exception('Gagal mengupdate status notifikasi');
            }
            
        } catch (\Exception $e) {
            Log::error('Error updating notifications: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal memperbarui pengaturan notifikasi: ' . $e->getMessage());
        }
    }
}