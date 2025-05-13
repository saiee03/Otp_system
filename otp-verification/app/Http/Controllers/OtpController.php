<?php

namespace App\Http\Controllers;

use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class OtpController extends Controller
{
    public function showLoginForm()
    {
        session()->forget('email');
        return view('auth.login');
    }

    public function showOtpForm()
    {
        if (!session('email')) {
            return redirect()->route('login');
        }
        return view('auth.otp');
    }

    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $user = User::where('email', $request->email)->first();

        $otp = rand(100000, 999999);
        $user->update([
            'otp' => Hash::make($otp),
            'otp_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        session(['email' => $user->email]);

        return redirect()->route('otp.verify');
    }

    public function resendOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        $user = User::where('email', $request->email)->first();

        $otp = rand(100000, 999999);
        $user->update([
            'otp' => Hash::make($otp),
            'otp_expires_at' => Carbon::now()->addMinutes(5),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return back()->with('status', 'A new OTP has been sent to your email.');
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => ['required', 'string', 'size:6'],
        ]);

        $email = session('email');
        $user = User::where('email', $email)->first();

        if ($user && Hash::check($request->otp, $user->otp) && Carbon::now()->lessThan($user->otp_expires_at)) {
            $user->update(['otp' => null, 'otp_expires_at' => null]);
            Auth::login($user);
            session()->forget('email');
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['otp' => 'Invalid or expired OTP']);
    }
}