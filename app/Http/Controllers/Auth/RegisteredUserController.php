<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'busuness_name' => ['required', 'string', 'max:255'],
            'busuness_website' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'phone' => ['required', 'string', 'max:255',"unique:users,phone"],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user_id = (string) $request->phone;
        $user = User::create([
            'user_id' => $user_id,
            'name' => $request->name,
            'busuness_name' => $request->busuness_name,
            'busuness_website' => $request->busuness_website,
            'email' => $request->email,
            'phone' => $request->phone,
            'role_id' => 2,
            'is_approved' => false,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        event(new Registered($user));

        // Send welcome email
        try{
            Mail::to($request->email)->send(new WelcomeEmail($user,$request->password));
        }catch(\Exception $e){
            Log::error("Welcome mail can't send. The error is: " . $e->getMessage());
        }


        return redirect(route('admin', absolute: false));
    }
}
