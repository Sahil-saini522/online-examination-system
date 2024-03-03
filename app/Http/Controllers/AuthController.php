<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\PasswordReset;
use App\Mail\ResetPasswordMail;


class AuthController extends Controller
{           
    public function showLogin()
    
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::guard('admin')->attempt($credentials)) {
            $user = Auth::guard('admin')->user();
    
            if ($user->is_admin == 1) {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/dashboard');
            }
        } else {
            return redirect('/login')->with('error', 'Invalid login credentials');
        }
    }
    

    public function showRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users|max:100|email',
            'password' => 'required|confirmed|min:4',
        ]);

        // Perform user registration logic here, e.g., create user, store in the database, etc.

        // Redirect to the dashboard view after successful registration
        return redirect('dashboard');
    }
      public function showadmindashboard(){
       return view('admin.dashboard');

      }

public function showstudentdashboard(){
    
    return view('student.dashboard');
}
 public function logout(Request $request){
    $request->session()->flush();
    
    Auth::logout();
    return redirect('/login');

 }
 public function showForgotPasswordForm()
    {
        return view('forgotpass');
    }
 public function sendResetLink(Request $request)
 {
     $request->validate([
         'email' => 'required|email|exists:users,email',
     ]);

     $token = sha1(time());

     PasswordReset::updateOrInsert(
         ['email' => $request->email],
         ['token' => $token, 'created_at' => now()]
     );

     Mail::to($request->email)->send(new ResetPasswordMail($token));

     return redirect()->back()->with('message', 'Password reset link sent to your email.');
 }

 public function resetPassword(Request $request, $token)
 {
     $request->validate([
         'password' => 'required|confirmed|min:8',
     ]);

     $reset = PasswordReset::where('token', $token)->first();

     if (!$reset) {
         abort(404);
     }

     $user = PasswordReset::where('email', $reset->email)->first();
     
     if (!$user) {
         abort(404);
     }

     $user->update(['password' => Hash::make($request->password)]);

     $reset->delete();

     return redirect()->route('login')->with('message', 'Password reset successfully.');
 }
}







