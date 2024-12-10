<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\Response;

class local
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // كود حسب لغة المتصفح

        $lang = $request->header('accept-language');
        $lang_arr = explode(',' , $lang);
        $locale = $lang_arr[0] ??  App::getLocale();
        // }else{

        // $locale = request('lang' , Session::get('lang' , 'en'));
        // Session::put('lang' , $locale);
        // اجيبه من الرابط
        $locale = $request->route('locale' , $locale);
        $array_locale_lang = ['en' , 'ar'];
        if (!in_array($locale,$array_locale_lang)) {
            abort(404);
        }
        App::setLocale($locale);
        // اعطيه ديفولت
        URL::default([
            'locale' => $locale,
        ]);
        // عشان ما ينبعت بالباراميترز بالكنترولر
        Route::current()->forgetParameter('locale');
        return $next($request);
    }
}
