<?php

namespace App\Http\Controllers;

use App\DTO\Auth\RegistrationData;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use App\Services\AuthService;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Contracts\View\View;


class AuthController extends Controller
{

    public function __construct(
        public readonly AuthService $authService
    )
    {}

    /**
     * @return Factory|View
     */
    public function login(): Factory|View
    {
        return view('auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function customLogin(LoginRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            return redirect()->intended('dashboard');
        }

        return redirect()->route('login');
    }

    /**
     * @return View
     */
    public function registration(): View
    {
        return view('auth.registration');
    }

    /**
     * @param RegistrationRequest $request
     * @return RedirectResponse
     */
    public function customRegistration(RegistrationRequest $request): RedirectResponse
    {
        $data = RegistrationData::create($request);
        $this->authService->registrationUser($data);

        return redirect()->route('login');
    }

    /**
     * @return View|RedirectResponse
     */
    public function dashboard(): View|RedirectResponse
    {
        if(Auth::check()){
            return view('home');
        }

        return redirect("login");
    }

    /**
     * @return RedirectResponse
     */
    public function signOut(): RedirectResponse
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
