<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Tsawler\Vcms5\controllers\VcmsBaseController;

class LoginController extends VcmsBaseController {

    /**
     * Display login page
     *
     * @return mixed
     */
    public function getLogin()
    {
        return View::make('vcms5::public.login')
            ->with('page_title', "Login")
            ->with('page_content', "")
            ->with('meta', "")
            ->with('meta_tags', "")
            ->with('active', 1)
            ->with('page_id', 0);
    }


    /**
     * Log in
     *
     * @return mixed
     */
    public function postLogin()
    {
        // get the supplied login credentials
        $credentials = array('email' => Input::get('email'), 'password' => Input::get('password'));
        $remember = false;

        // try logging in
        if (Auth::attempt($credentials, $remember)) {
            Session::put('KCFINDER', false);
            if (strlen(Input::get('targetUrl')) > 0) {
                return Redirect::to(Input::get('targetUrl'));
            } else {
                return Redirect::to('/admin/page/all-pages');
            }
        } else {
            return Redirect::to('/admin/login')
                ->with('error', Lang::get('vcms5.common.incorrect_username_password'))
                ->withInput();
        }
    }


    /**
     * Logout
     *
     * @return mixed
     */
    public function getLogout()
    {
        Auth::logout();

        return Redirect::to('/login')
            ->with('message', Lang::get('vcms5.common.logged_out'));
    }

}
