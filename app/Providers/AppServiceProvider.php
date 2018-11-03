<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

use DB; // if u want to use Query SQL

// fix error when migration isn't enough lenght
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(['inc.sidebar2','recruit.account_info'], function ($view) {
            $recruitId = Request::session()->get('recruitID');
            $data_recruit = \Illuminate\Support\Facades\DB::table('recruiter')
                ->where('id_account_recruiter', '=', $recruitId)
                ->get();
            $account_recruit = \Illuminate\Support\Facades\DB::table('account_recruiter')
                ->where('id','=',$recruitId)
                ->get();

            //pass the data to the view
            $view->with('data_recruit_info', $data_recruit)
                ->with('account_recruit', $account_recruit);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
