<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\chatAdminController;
use App\Http\Controllers\dashboardController;

// dashboard routes

Route::prefix('dashboard')->middleware('auth')->group(function(){
    Route::get('/' , [dashboardController::class , 'index'])->name('index');
    Route::get('admins_show' , [dashboardController::class , 'adminsShow'])->name('adminsShow');
    Route::get('admins_add' , [dashboardController::class , 'adminsAdd'])->name('adminsAdd');
    Route::get('category' , [dashboardController::class , 'categoryShow'])->name('categoryShow');
    Route::get('add_category' , [dashboardController::class , 'categoryAdd'])->name('categoryAdd');
    Route::get('news' , [dashboardController::class , 'newsShow'])->name('newsShow');
    Route::get('add_news' , [dashboardController::class , 'newsAdd'])->name('newsAdd');
    Route::get('articles' , [dashboardController::class , 'articleShow'])->name('articleShow');
    Route::get('add_article' , [dashboardController::class , 'articleAdd'])->name('articleAdd');
    Route::get('comments' , [dashboardController::class , 'showComments'])->name('showComments');
    Route::get('admins' , [dashboardController::class , 'showAdmins'])->name('showAdmins');
    Route::get('profile' , [dashboardController::class , 'profile'])->name('profile');
    Route::get('edit_profile/{id}' , [dashboardController::class , 'editProfile'])->name('editProfile');
    // post route
    Route::post('submit_category' , [dashboardController::class , 'submitCategory'])->name('submitCategory');
    Route::post('submit_news' , [dashboardController::class , 'submitNews'])->name('submitNews');
    Route::post('submit_article' , [dashboardController::class , 'submitArticle'])->name('submitArticle');
    Route::post('send_email/{id}' , [dashboardController::class , 'sendEmail'])->name('sendEmail');
    Route::post('verify_code' , [dashboardController::class , 'verifyCode'])->name('verifyCode');
    Route::post('update_password' , [dashboardController::class , 'updatePassword'])->name('updatePassword');
    Route::post('update_profile' , [dashboardController::class , 'updateProfile'])->name('updateProfile');

    // ajax edit & delete
    //   category
    Route::get('category/{id}' , [dashboardController::class , 'categoryEdit'])->name('categoryEdit');
    Route::post('category_update' , [dashboardController::class , 'categoryUpdate'])->name('categoryUpdate');
    Route::delete('category_delete/{id}' , [dashboardController::class , 'categoryDelete'])->name('categoryDelete');
    //  news
    Route::get('news/{id}' , [dashboardController::class , 'newsEdit'])->name('newsEdit');
    Route::post('news_update' , [dashboardController::class , 'newsUpdate'])->name('newsUpdate');
    Route::delete('news_delete/{id}' , [dashboardController::class , 'newsDelete'])->name('newsDelete');
    // chat
    Route::get('messages_admins', [chatAdminController::class , 'index'])->name('chatAdmin_');
    Route::get('chat/{id}', [chatAdminController::class , 'chat'])->name('chat');
    Route::post('msg_chat/{id}', [chatAdminController::class , 'sendMessage'])->name('send');
    // notification
    Route::post('notification_as_read', [dashboardController::class , 'markAsRead'])->name('read');
    // admins
    Route::post('admins_add_submit' , [dashboardController::class , 'adminsAddSubmit'])->name('adminsAddSubmit');

});