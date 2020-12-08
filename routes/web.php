<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::namespace('Frontend')->group(function (){
    Route::get('/','HomeController@index')->name('user.home');
//    Route::get('/information','HomeController@information')->name('user.information');
    Route::prefix('skill-development')->group(function (){
        //Skill Development Retrieve
        Route::get('/soft-skill','HomeController@softSkill')->name('user.skill.softskill');
        Route::get('/academic-skill','HomeController@academicSkill')->name('user.skill.academicskill');
        Route::get('/professional-skill','HomeController@professionalSkill')->name('user.skill.professionalskill');
        Route::get('/skill-detail/{slug}','HomeController@skillDetails')->name('user.skill.details');
    });
    Route::prefix('tips-and-tricks')->group(function (){
        //Tips and Tricks Retrieve
        Route::get('interview','HomeController@interviewTips')->name('user.tips.interview');
        Route::get('educational','HomeController@educationalTips')->name('user.tips.educational');
        Route::get('career-and-planing','HomeController@careerAndPlaningTips')->name('user.tips.career');
        Route::get('others','HomeController@othersTips')->name('user.tips.others');
        Route::get('tips-detail/{slug}','HomeController@tipsDetails')->name('user.tips.details');
    });
    Route::get('blog','HomeController@blog')->name('user.blog');
    Route::get('blog/category/{id}','HomeController@category')->name('user.blog.category');
    Route::get('blog/details/{slug}','HomeController@blogDetails')->name('user.blog.details');

    //Basic Section
    Route::get('about','HomeController@about')->name('user.about');
    Route::get('contact','HomeController@contactUs')->name('user.contact.us');
    Route::post('contact/store','HomeController@contactStore')->name('user.contact.store');
    Route::get('soe-team','HomeController@soeTeam')->name('user.soe.team');
    Route::get('blood-donation','HomeController@bloodDonation')->name('user.blood.donation');
    Route::get('event-campaign','HomeController@eventCampaign')->name('user.event');
    Route::get('event-campaign/details/{slug}','HomeController@eventDetails')->name('user.event.detail');
    Route::get('upload-document','HomeController@uploadDocument')->name('user.document.upload')->middleware('auth:web');
    Route::post('trying-upload','HomeController@tryingUpload')->name('user.document.store')->middleware('auth:web');
    Route::get('video-gallery','HomeController@videoGallery')->name('user.video.gallery');
    Route::get('activity/{slug}','HomeController@activityName')->name('user.activity.name');
    Route::get('activity/details/{slug}','HomeController@activityPostDetails')->name('user.activity.post.detail');
    Route::get('profile','HomeController@profile')->name('user.profile')->middleware('auth:web');
    Route::get('profile/edit','HomeController@editProfile')->name('user.profile.edit')->middleware('auth:web');
    Route::get('photo-gallery','HomeController@photoGallery')->name('user.photo.gallery');
    Route::get('photo-gallery/{id}/{year}','HomeController@photoGalleryByYear')->name('user.photo.gallery.year');
    Route::get('news','HomeController@news')->name('user.news');
    Route::get('news/details/{slug}','HomeController@newsDetails')->name('user.news.details');
    Route::post('user-validation','HomeController@validUser')->name('user.valid');
    Route::post('attempt-register-validation','HomeController@attemptRegisterValidation')->name('user.attempt.register');
});













//Admin Route
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('/','HomeController@index')->name('admin.mainpage')->middleware('auth:admin');
    Route::get('/home', 'HomeController@index')->name('admin.home')->middleware('auth:admin');
    //For Skill Development
    Route::prefix('skill-development')->group(function (){
        Route::get('index','SkillController@index')->name('admin.skill.index');
        Route::get('create','SkillController@create')->name('admin.skill.create');
        Route::post('store','SkillController@store')->name('admin.skill.store');
        Route::get('delete/{id}','SkillController@delete')->name('admin.skill.delete');
        Route::get('{id}/edit','SkillController@edit')->name('admin.skill.edit');
        Route::put('{id}/update','SkillController@update')->name('admin.skill.update');
        Route::get('trash','SkillController@trashIndex')->name('admin.skill.trash.index');
        Route::get('{id}/restore','SkillController@restore')->name('admin.skill.trash.restore');
        Route::get('{id}/forcedelete','SkillController@trashDelete')->name('admin.skill.trash.delete');
    });
    //For Tips and Tricks
    Route::prefix('tips-and-tricks')->group(function (){
        Route::get('index','TipsController@index')->name('admin.tips.index');
        Route::get('create','TipsController@create')->name('admin.tips.create');
        Route::post('store','TipsController@store')->name('admin.tips.store');
        Route::get('delete/{id}','TipsController@delete')->name('admin.tips.delete');
        Route::get('{id}/edit','TipsController@edit')->name('admin.tips.edit');
        Route::put('{id}/update','TipsController@update')->name('admin.tips.update');
        Route::get('trash','TipsController@trashIndex')->name('admin.tips.trash.index');
        Route::get('{id}/restore','TipsController@restore')->name('admin.tips.trash.restore');
        Route::get('{id}/forcedelete','TipsController@trashDelete')->name('admin.tips.trash.delete');
    });
    //For Blog
    Route::prefix('blog')->group(function (){
        //For blog Category
        Route::prefix('category')->group(function (){
            Route::get('index','BlogController@categoryIndex')->name('admin.blog.category.index');
            Route::get('create','BlogController@categoryCreate')->name('admin.blog.category.create');
            Route::post('store','BlogController@categoryStore')->name('admin.blog.category.store');
            Route::get('delete/{id}','BlogController@categoryDelete')->name('admin.blog.category.delete');
            Route::get('{id}/edit','BlogController@categoryEdit')->name('admin.blog.category.edit');
            Route::put('{id}/update','BlogController@categoryUpdate')->name('admin.blog.category.update');
            Route::get('trash','BlogController@categoryTrash')->name('admin.blog.category.trash');
            Route::get('{id}/restore','BlogController@categoryRestore')->name('admin.blog.category.restore');
            Route::get('{id}/forcedelete','BlogController@categoryForceDelete')->name('admin.blog.category.forcedelete');
        });
        //For blog
        Route::get('index','BlogController@index')->name('admin.blog.index');
        Route::get('create','BlogController@create')->name('admin.blog.create');
        Route::post('store','BlogController@store')->name('admin.blog.store');
        Route::get('delete/{id}','BlogController@delete')->name('admin.blog.delete');
        Route::get('{id}/edit','BlogController@edit')->name('admin.blog.edit');
        Route::put('{id}/update','BlogController@update')->name('admin.blog.update');
        Route::get('trash','BlogController@trashIndex')->name('admin.blog.trash.index');
        Route::get('{id}/restore','BlogController@restore')->name('admin.blog.trash.restore');
        Route::get('{id}/forcedelete','BlogController@forceDelete')->name('admin.blog.trash.delete');
    });
    //For Partner Panel
    Route::prefix('partner')->group(function (){
        Route::get('index','PartnerController@index')->name('admin.partner.index');
        Route::get('create','PartnerController@create')->name('admin.partner.create');
        Route::post('store','PartnerController@store')->name('admin.partner.store');
        Route::get('delete/{id}','PartnerController@delete')->name('admin.partner.delete');
        Route::get('{id}/edit','PartnerController@edit')->name('admin.partner.edit');
        Route::put('{id}/update','PartnerController@update')->name('admin.partner.update');
        Route::get('trash','PartnerController@trashIndex')->name('admin.partner.trash.index');
        Route::get('{id}/restore','PartnerController@restore')->name('admin.partner.trash.restore');
        Route::get('{id}/forcedelete','PartnerController@forceDelete')->name('admin.partner.trash.delete');
    });
    //For SOE Team
    Route::prefix('team')->group(function (){
        //For SOE team Panel Name
        Route::prefix('panel-name')->group(function (){
            Route::get('index','TeamPanelNameController@index')->name('admin.team.panel.index');
            Route::get('create','TeamPanelNameController@create')->name('admin.team.panel.create');
            Route::post('store','TeamPanelNameController@store')->name('admin.team.panel.store');
            Route::get('delete/{id}','TeamPanelNameController@delete')->name('admin.team.panel.delete');
            Route::get('{id}/edit','TeamPanelNameController@edit')->name('admin.team.panel.edit');
            Route::put('{id}/update','TeamPanelNameController@update')->name('admin.team.panel.update');
            Route::get('trash','TeamPanelNameController@trashIndex')->name('admin.team.panel.trash');
            Route::get('{id}/restore','TeamPanelNameController@restore')->name('admin.team.panel.trash.restore');
            Route::get('{id}/forcedelete','TeamPanelNameController@forceDelete')->name('admin.team.panel.trash.delete');
        });
        //For SOE TEAM
        Route::get('index','TeamController@index')->name('admin.team.index');
        Route::get('create','TeamController@create')->name('admin.team.create');
        Route::post('store','TeamController@store')->name('admin.team.store');
        Route::get('delete/{id}','TeamController@delete')->name('admin.team.delete');
        Route::get('{id}/edit','TeamController@edit')->name('admin.team.edit');
        Route::put('{id}/update','TeamController@update')->name('admin.team.update');
        Route::get('trash','TeamController@trashIndex')->name('admin.team.trash.index');
        Route::get('{id}/restore','TeamController@restore')->name('admin.team.trash.restore');
        Route::get('{id}/forcedelete','TeamController@forceDelete')->name('admin.team.trash.delete');
    });
    Route::prefix('event-campaign')->group(function (){
        Route::get('index','EventController@index')->name('admin.event.index');
        Route::get('create','EventController@create')->name('admin.event.create');
        Route::post('store','EventController@store')->name('admin.event.store');
        Route::get('delete/{id}','EventController@delete')->name('admin.event.delete');
        Route::get('{id}/edit','EventController@edit')->name('admin.event.edit');
        Route::put('{id}/update','EventController@update')->name('admin.event.update');
    });
    //For Media Section
    Route::prefix('media')->group(function (){
        //For Video Gallery
        Route::prefix('video-gallery')->group(function (){
            Route::get('index','VideoController@index')->name('admin.video.index');
            Route::get('create','VideoController@create')->name('admin.video.create');
            Route::post('store','VideoController@store')->name('admin.video.store');
            Route::get('delete/{id}','VideoController@delete')->name('admin.video.delete');
            Route::get('{id}/edit','VideoController@edit')->name('admin.video.edit');
            Route::put('{id}/update','VideoController@update')->name('admin.video.update');
        });
    });

    Route::prefix('single-component')->group(function (){
        //For Success Story
        Route::prefix('success-story')->group(function (){
            Route::get('index','SuccessStoryController@index')->name('admin.story.index');
            Route::get('create','SuccessStoryController@create')->name('admin.story.create');
            Route::post('store','SuccessStoryController@store')->name('admin.story.store');
            Route::get('delete/{id}','SuccessStoryController@delete')->name('admin.story.delete');
            Route::get('{id}/edit','SuccessStoryController@edit')->name('admin.story.edit');
            Route::put('{id}/update','SuccessStoryController@update')->name('admin.story.update');
        });
        //For Slider
        Route::prefix('slider')->group(function (){
            Route::get('index','SliderController@index')->name('admin.slider.index');
            Route::get('create','SliderController@create')->name('admin.slider.create');
            Route::post('store','SliderController@store')->name('admin.slider.store');
            Route::get('delete/{id}','SliderController@delete')->name('admin.slider.delete');
            Route::get('{id}/edit','SliderController@edit')->name('admin.slider.edit');
            Route::put('{id}/update','SliderController@update')->name('admin.slider.update');
        });
        //For photo Gallery
        Route::prefix('photo-gallery')->group(function (){
            Route::get('index','PhotoGalleryController@index')->name('admin.photo.gallery.index');
            Route::get('create','PhotoGalleryController@create')->name('admin.photo.gallery.create');
            Route::post('store','PhotoGalleryController@store')->name('admin.photo.gallery.store');
            Route::get('delete/{id}','PhotoGalleryController@delete')->name('admin.photo.gallery.delete');
            Route::get('{id}/edit','PhotoGalleryController@edit')->name('admin.photo.gallery.edit');
            Route::put('{id}/update','PhotoGalleryController@update')->name('admin.photo.gallery.update');
        });
        //For News
        Route::prefix('news')->group(function (){
            Route::get('index','NewsController@index')->name('admin.news.index');
            Route::get('create','NewsController@create')->name('admin.news.create');
            Route::post('store','NewsController@store')->name('admin.news.store');
            Route::get('delete/{id}','NewsController@delete')->name('admin.news.delete');
            Route::get('{id}/edit','NewsController@edit')->name('admin.news.edit');
            Route::put('{id}/update','NewsController@update')->name('admin.news.update');
        });
    });

    Route::prefix('our-activity')->group(function(){
        //Activity NAME
        Route::prefix('activity')->group(function (){
            Route::get('index','ActivityController@index')->name('admin.activity.index');
            Route::get('create','ActivityController@create')->name('admin.activity.create');
            Route::post('store','ActivityController@store')->name('admin.activity.store');
            Route::get('delete/{id}','ActivityController@delete')->name('admin.activity.delete');
            Route::get('{id}/edit','ActivityController@edit')->name('admin.activity.edit');
            Route::put('{id}/update','ActivityController@update')->name('admin.activity.update');
        });
        //Activity Panel Name
        Route::prefix('activity-panel')->group(function (){
            Route::get('index','ActivityPanelController@index')->name('admin.activity.panel.index');
            Route::get('create','ActivityPanelController@create')->name('admin.activity.panel.create');
            Route::post('store','ActivityPanelController@store')->name('admin.activity.panel.store');
            Route::get('delete/{id}','ActivityPanelController@delete')->name('admin.activity.panel.delete');
            Route::get('{id}/edit','ActivityPanelController@edit')->name('admin.activity.panel.edit');
            Route::put('{id}/update','ActivityPanelController@update')->name('admin.activity.panel.update');
        });
        //Activity Post
        Route::prefix('activity-post')->group(function (){
            Route::get('index','ActivityPostController@index')->name('admin.activity.post.index');
            Route::get('create','ActivityPostController@create')->name('admin.activity.post.create');
            Route::post('store','ActivityPostController@store')->name('admin.activity.post.store');
            Route::get('delete/{id}','ActivityPostController@delete')->name('admin.activity.post.delete');
            Route::get('{id}/edit','ActivityPostController@edit')->name('admin.activity.post.edit');
            Route::put('{id}/update','ActivityPostController@update')->name('admin.activity.post.update');
        });
    });
    //Document Upload Section
    Route::prefix('document-upload')->group(function (){
        Route::prefix('user-upload')->group(function (){
            Route::get('pending','UserDocumentController@pending')->name('admin.document.user.pending');
            Route::get('approve','UserDocumentController@approve')->name('admin.document.user.approve');
            Route::get('{id}/approve','UserDocumentController@approveDocument')->name('admin.document.user.approve.attempt');
            Route::get('reject','UserDocumentController@reject')->name('admin.document.user.reject');
            Route::get('{id}/reject','UserDocumentController@rejectDocument')->name('admin.document.user.reject.attempt');
            Route::get('{id}/delete','UserDocumentController@deleteDocument')->name('admin.document.user.delete');
        });
    });


    //Admin Login
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

});

