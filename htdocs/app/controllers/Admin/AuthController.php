<?php

class AuthController extends BaseAdminController {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View::make('admin.home');
    }

    /**
     * Show page login for admin.
     *
     * @return Response
     */
    public function getLogin()
    {
        return View::make('login');
    }

    /**
     * Login for admin.
     *
     * @param AdminLoginRequest $request
     *
     * @return Response
     */
    public function postLogin()
    {
        $login = Auth::attempt(Input::only('username', 'password'), Input::get('remember'));
        if ($login) {
            return Redirect::intended('admin');
        } else {
            return Redirect::to('login')->with('message', trans('messages.login_fail'));
        }
    }

    /**
     * Logout for admin.
     *
     * @return Response
     */
    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('login');
    }
}
