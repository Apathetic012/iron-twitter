<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('user/{user}/{limit?}', function($user, $limit = 5)
{
	return Twitter::
        getUserTimeline(
            array(
                'screen_name' => $user,
                'count' => $limit
            )
        );
});

Route::get('search/{query}/{limit?}', function($query, $limit = 5)
{
    return Response::json(Twitter::
        getSearch(
            array(
                'include_entities' => true,
                'count' => $limit,
                'q' => $query
            )
        )
    );
});
