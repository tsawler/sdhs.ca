<?php

//Route::get('/', function(){
//    return view('public.base');
//});


// home page
Route::get('/', 'PageController@showHome');

// laravel file manager
Route::group(array('before' => 'auth'), function ()
{
    Route::get('/laravel-filemanager', '\Tsawler\Laravelfilemanager\controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\Tsawler\Laravelfilemanager\controllers\LfmController@upload');
});

Route::get('/auth/login', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogin');
Route::get('/admin', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogin');
Route::get('/auth', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogin');
Route::get('/login', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogin');
Route::post('/admin/login', 'LoginController@postLogin');

// inside page
Route::get('/{page}', 'PageController@showPage');


/**
 * Admin routes
 */
Route::group(array('middleware' => 'auth'), function () // make sure authenticated
{
    Route:: group(array('middleware' => 'auth.admin'), function () // make sure admin
    {

        Route:: group(array('middleware' => 'auth.menus'), function () // make sure admin
        {
            // menus
            Route::get('/menu/menujson', '\Tsawler\Vcms5\controllers\VcmsMenuController@getMenujson');
            Route::get('/menu/ddmenujson', '\Tsawler\Vcms5\controllers\VcmsMenuController@getDdmenujson');
            Route::get('/menu/ddsortitems', '\Tsawler\Vcms5\controllers\VcmsMenuController@getDdsortitems');
            Route::get('/menu/sortitems', '\Tsawler\Vcms5\controllers\VcmsMenuController@getSortitems');
            Route::post('/menu/saveddmenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postSaveddmenuitem');
            Route::post('/menu/savemenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postSavemenuitem');
            Route::post('/menu/deletemenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postDeletemenuitem');
            Route::post('/admin/deletemenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postDeletemenuitem');
            Route::post('/menu/deleteddmenuitem', '\Tsawler\Vcms5\controllers\VcmsMenuController@postDeleteddmenuitem');
        });

        Route:: group(array('middleware' => 'auth.pages'), function () // make sure admin
        {
            // pages
            Route::post('/page/savepage', '\Tsawler\Vcms5\controllers\VcmsPageController@savePage');
            Route::get('/admin/page/all-pages', '\Tsawler\Vcms5\controllers\VcmsPageController@getAllPages');
            Route::get('/admin/page/deletepage', '\Tsawler\Vcms5\controllers\VcmsPageController@getDeletePage');
        });

        Route:: group(array('middleware' => 'auth.pages'), function () // make sure admin
        {
            // pages
            Route::post('/page/savepage', '\Tsawler\Vcms5\controllers\VcmsPageController@savePage');
            Route::get('/admin/page/all-pages', '\Tsawler\Vcms5\controllers\VcmsPageController@getAllPages');
            Route::get('/admin/page/page', '\Tsawler\Vcms5\controllers\VcmsPageController@getEditpage');
            Route::post('/admin/page/page', '\Tsawler\Vcms5\controllers\VcmsPageController@postEditpage');
            Route::get('/admin/page/deletepage', '\Tsawler\Vcms5\controllers\VcmsPageController@getDeletePage');

        });

        Route:: group(array('middleware' => 'auth.events'), function () // make sure admin
        {
            // events
            Route::get('/events/movedate', '\Tsawler\Vcms5\controllers\VcmsEventsController@getMoveDate');
            Route::get('/events/moveenddates', '\Tsawler\Vcms5\controllers\VcmsEventsController@getMoveEndDate');
            Route::post('/events/save_event', '\Tsawler\Vcms5\controllers\VcmsEventsController@postSaveEvent');
            Route::get('/events/retrieve_event', '\Tsawler\Vcms5\controllers\VcmsEventsController@retrieveEvent');
            Route::get('/events/delete_event', '\Tsawler\Vcms5\controllers\VcmsEventsController@deleteEvent');
            Route::get('/admin/calendar', '\Tsawler\Vcms5\controllers\VcmsEventsController@showCalForAdmin');
            Route::get('/admin/jsoneventsadmin', '\Tsawler\Vcms5\controllers\VcmsEventsController@getJsonEventsForAdmin');
        });

        Route:: group(array('middleware' => 'auth.blogs'), function () // make sure admin
        {
            // blog
            Route::post('/admin/post/editinplace', '\Tsawler\Vcms5\controllers\VcmsPostsController@postEditInPlace');
            Route::get('/admin/blogs/all-blogs', '\Tsawler\Vcms5\controllers\VcmsBlogController@getAllBlogs');
            Route::get('/admin/blogs/blog', '\Tsawler\Vcms5\controllers\VcmsBlogController@getEditBlog');
            Route::post('/admin/blogs/blog', '\Tsawler\Vcms5\controllers\VcmsBlogController@postEditBlog');
            Route::get('/admin/blogs/deleteblog', '\Tsawler\Vcms5\controllers\VcmsBlogController@getDeleteBlog');
            Route::get('/admin/blogs/post', '\Tsawler\Vcms5\controllers\VcmsBlogController@getEditPost');
            Route::post('/admin/blogs/post', '\Tsawler\Vcms5\controllers\VcmsBlogController@postEditPost');
            Route::get('/admin/blogs/deletepost', '\Tsawler\Vcms5\controllers\VcmsPostsController@getDeletePost');
            Route::get('/admin/blogs/posts', '\Tsawler\Vcms5\controllers\VcmsPostsController@getAllPosts');
        });

        Route:: group(array('middleware' => 'auth.galleries'), function () // make sure admin
        {
            // galleries
            Route::get('/admin/galleries/all-galleries', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getAllGalleries');
            Route::get('/admin/galleries/gallery', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getEditGallery');
            Route::post('/admin/galleries/gallery', '\Tsawler\Vcms5\controllers\VcmsGalleryController@postEditGallery');
            Route::get('/admin/galleries/deletegallery', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getDeleteGallery');
            Route::post('/admin/galleries/save-gallery-item', '\Tsawler\Vcms5\controllers\VcmsGalleryController@postSaveItem');
            Route::get('/admin/galleries/deleteitem', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getDeleteItem');
            Route::get('/admin/galleries/retrieve_item', '\Tsawler\Vcms5\controllers\VcmsGalleryController@getRetrieveItem');
        });

        Route:: group(array('middleware' => 'auth.users'), function () // make sure admin
        {
            // users
            Route::get('admin/users/all-users', '\Tsawler\Vcms5\controllers\VcmsUserController@getAllUsers');
            Route::get('admin/users/user', '\Tsawler\Vcms5\controllers\VcmsUserController@getEditUser');
            Route::post('admin/users/user', '\Tsawler\Vcms5\controllers\VcmsUserController@postEditUser');
            Route::post('admin/users/editroles', '\Tsawler\Vcms5\controllers\VcmsUserController@postEditUserRoles');
            Route::get('admin/users/deleteuser', '\Tsawler\Vcms5\controllers\VcmsUserController@getDeleteUser');
        });

        Route:: group(array('middleware' => 'auth.news'), function () // make sure admin
        {
            // news
            Route::post('/news/savenews', '\Tsawler\Vcms5\controllers\VcmsNewsController@saveNews');
            Route::get('/admin/news/all-newsitems', '\Tsawler\Vcms5\controllers\VcmsNewsController@getAllNews');
            Route::get('/admin/news/newsitem', '\Tsawler\Vcms5\controllers\VcmsNewsController@getEditnews');
            Route::post('/admin/news/newsitem', '\Tsawler\Vcms5\controllers\VcmsNewsController@postEditnews');
            Route::get('/admin/news/deletenews', '\Tsawler\Vcms5\controllers\VcmsNewsController@getDeleteNews');
        });

        Route:: group(array('middleware' => 'auth.faqs'), function () // make sure admin
        {
            // faqs
            Route::get('/admin/faqs/all-faqs', '\Tsawler\Vcms5\controllers\VcmsFaqController@getAllFaqs');
            Route::get('/admin/faqs/faq', '\Tsawler\Vcms5\controllers\VcmsFaqController@editFaq');
            Route::post('/admin/faqs/faq', '\Tsawler\Vcms5\controllers\VcmsFaqController@postEditFaq');
            Route::get('/admin/faqs/deletefaq', '\Tsawler\Vcms5\controllers\VcmsFaqController@deleteFaq');
        });

        // logout
        Route::get('/admin/logout', '\Tsawler\Vcms5\controllers\VcmsLoginController@getLogout');

        // admin dashboard
        Route::get('/admin/dashboard', '\Tsawler\Vcms5\controllers\VcmsAdminController@getDashboard');

        // profile
        Route::get('/admin/users/profile', '\Tsawler\Vcms5\controllers\VcmsProfileController@getProfile');
        Route::post('/admin/users/profile', '\Tsawler\Vcms5\controllers\VcmsProfileController@postProfile');
        Route::post('/admin/users/prefs/{id?}', '\Tsawler\Vcms5\controllers\VcmsProfileController@postPrefs');

        // error pages
        Route::get('/admin/unauthorized', '\Tsawler\Vcms5\controllers\VcmsAdminController@get403');
    });
});