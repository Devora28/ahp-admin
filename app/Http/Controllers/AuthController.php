<?php
namespace App\Http\Controllers;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class AuthController extends Controller{
    public function loginPage(){
        return view('login');
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:128',
            'password' => 'required|string|min:8|max:128',
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->withErrors($validator);
        }
        $response = Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        if($response){
            return redirect()->route('home');
        }
        else{
            return redirect()->back()->withInput()->withErrors(['general' => 'ایمیل یا رمز عبور نادرست است']);
        }
    }
    public function logout(Request $request){
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();
        return redirect('/');
    }
    public function forgotPasswordPage(){
        return view('forgot-password');
    }
    public function sendResetLink(Request $request){
        $request->validate([
            'email' => ['required','email','max:128'],
        ]);
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
    public function resetPasswordPage(Request $request,$token){
        return view('reset-password',['token'=>$token]);
    }
    public function resetPassword(Request $request){
        $request->validate([
            'token' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required','min:8','confirmed'],
        ]);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                ])->save();
                event(new PasswordReset($user));
            }
        );
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withInput($request->only('email'))
                ->withErrors(['email' => __($status)]);
    }
}
