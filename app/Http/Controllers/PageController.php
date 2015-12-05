<?php namespace App\Http\Controllers;

use App\FileUploader;
use App\FrontPage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Tsawler\Vcms5\controllers\VcmsBaseController;
use Tsawler\Vcms5\Localize;
use Tsawler\Vcms5\models\Page;


/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends VcmsBaseController {

    /**
     * Show the home page
     *
     * @return mixed
     */
    public function showHome()
    {
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;

        $results = DB::table('pages')->where('slug', '=', "home")->get();

        foreach ($results as $result) {
            $active = $result->active;

            if (($active > 0) || ((Auth::check()) && (Auth::user()->access_level == 3))) {
                if ((Session::get('lang') == null) || (Session::get('lang') == "en")) {
                    $page_title = $result->page_title;
                    $page_content = $result->page_content;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $fragments = Page::find($result->id)->fragments;
                } else {
                    $page_title = $result->page_title_fr;
                    $page_content = $result->page_content_fr;
                    $meta = $result->meta;
                    $page_id = $result->id;
                    $meta_keywords = $result->meta_tags;
                    $fragments = Page::find($result->id)->fragments;
                }

            }
        }

        return View::make('public.home')
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id)
            ->with('fragments', $fragments)
            ->with('menu', $this->menu);
    }

    /**
     * Show a page
     *
     * @return mixed
     */
    public function showPage()
    {
        $slug = Request::segment(1);
        $page_title = "Not active";
        $page_content = "Either the page you requested is not active, or it does not exist.";
        $meta = "";
        $meta_keywords = "";
        $active = 1;
        $page_id = 0;

        $results = DB::table('pages')->where('slug', '=', $slug)->get();

        foreach ($results as $result) {
            $active = $result->active;

            if (($active > 0) || ((Auth::check()) && (Auth::user()->hasRole('pages')))) {
                $page_title_field = Localize::localize('page_title');
                $page_content_field = Localize::localize('page_content');
                $page_title = $result->$page_title_field;
                $page_content = $result->$page_content_field;
                $page_id = $result->id;
                $meta_keywords = $result->meta_tags;
                $meta = $result->meta;
            }
        }

        return View::make('public.inside')
            ->with('page_title', $page_title)
            ->with('page_content', $page_content)
            ->with('meta', $meta)
            ->with('meta_tags', $meta_keywords)
            ->with('active', $active)
            ->with('page_id', $page_id)
            ->with('menu', $this->menu);
    }



}
