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
/*Route::get('/', function () {
    return view('home.index');
});*/


//Route::get('/','HomeController@index');
Route::match(['get','post'],'/','HomeController@index');






Route::get('home', 'HomeController@index')->name('home');
Route::get('header', 'HomeController@header')->name('header');

Route::get('login', 'AuthController@loginPage')->name('login');
Route::post('login', 'AuthController@login')->name('login');
Route::post('phone-login', 'AuthController@phonelogin')->name('phone.login');
Route::post('login-model', 'AuthController@loginModel')->name('login.model');
Route::post('phone-login-model', 'AuthController@phoneloginModel')->name('phone.login.model');
Route::get('register', 'AuthController@registerPage')->name('register');
Route::post('register', 'AuthController@register')->name('register');

Route::get('password-recovery', 'AuthController@passwordRecovery')->name('password.recovery');
Route::post('password-recovery', 'AuthController@passwordRecoveryMailSend')->name('password.recovery');
Route::get('business-partners', 'HomeController@businessPartners')->name('business.partners');
Route::get('appointment-book', 'HomeController@appointmentBook')->name('appointment.book');


Route::get('blog', 'HomeController@blog')->name('blogs.list1');
//Route::get('doctor', 'HomeController@doctor');
Route::get('ask-question', 'HomeController@askQuestion')->name('ask.question');
Route::post('ask-question', 'HomeController@saveaskQuestion')->name('ask.question');

Route::get('contact', 'HomeController@contact')->name('contact');
Route::post('contact', 'HomeController@contactSave')->name('contact');


Route::post('query', 'HomeController@query')->name('query');

Route::get('policy', 'HomeController@policy')->name('policy');

Route::get('about-us', 'HomeController@about')->name('about');

Route::get('category', 'HomeController@categories')->name('category');
Route::get('products/{category_id}', 'HomeController@products')->name('products');
Route::get('product-details/{id}', 'HomeController@productDetails')->name('productDetails');

Route::post('searched-product', 'HomeController@searchedProduct')->name('searched.product');
Route::get('searched-product', 'HomeController@searchedProduct')->name('searched.product');
Route::get('blood-bank', 'HomeController@bloodbank')->name('blood.bank');
Route::post('searched-blood-bank', 'HomeController@searchedBloodBank')->name('searched.blood.bank');
Route::get('searched-blood-bank', 'HomeController@searchedBloodBank')->name('searched.blood.bank');
Route::get('blood-bank-Request/Donate/{id}', 'HomeController@bloodbankDetails')->name('blood.bank.details');
Route::post('blood-bank-Request/Donate/{id}', 'HomeController@bloodbankRequest')->name('blood.bank.request');

Route::post('searched-blog', 'HomeController@searchedBlog')->name('searched.blog');
Route::get('searched-blog', 'HomeController@searchedBlog')->name('searched.blog');

Route::post('searched-doctor-hospital-diagonostics-specialization-location', 'HomeController@searchedhome')->name('searched.dochosdig.location');
Route::get('searched-doctor-hospital-diagonostics-specialization-location', 'HomeController@searchedhome')->name('searched.dochosdig.location');

Route::post('searched-doctor-hospital-diagnostic-loc', 'HomeController@searchedDocaddress')->name('searched.dochosdig.loc');
Route::get('searched-doctor-hospital-diagnostic-loc', 'HomeController@searchedDocaddress')->name('searched.dochosdig.loc');

Route::post('searched-doctor-hospital-diagnostic', 'HomeController@searchedDocDigHos')->name('searched.dochosdig');
Route::get('searched-doctor-hospital-diagnostic', 'HomeController@searchedDocDigHos')->name('searched.dochosdig');

Route::post('searched-doctor-hospital-diagnostic-keyword', 'HomeController@searchedDocDigHosKeyword')->name('searched.dochosdig.keyword');
Route::get('searched-doctor-hospital-diagnostic-keyword', 'HomeController@searchedDocDigHosKeyword')->name('searched.dochosdig.keyword');


Route::post('minmax', 'HomeController@searchedDocminmax')->name('searched.dochosdig.min');

Route::post('searched-doctor-hospital-diagnostic-speciality', 'HomeController@searchedDocspeciality')->name('searched.dochosdig.speciality');
Route::get('searched-doctor-hospital-diagnostic-speciality', 'HomeController@searchedDocspeciality')->name('searched.dochosdig.speciality');

/*---------------------shailendra start-----------------------*/



Route::get('/doctor/search','HomeController@searchdoctor')->name('doctor');


Route::get('/doctors/{id}','HomeController@searchdoctors')->name('doctors');

Route::get('/specelists/{id}','HomeController@specelists')->name('specelists');


Route::match(['get','post'],'/doctor-profile/{id}','HomeController@viewdoctorprofile');
Route::match(['get','post'],'/doctor-profiles/{id}','HomeController@viewprofiles')->name('doctor.profile');


Route::get('/doctor-booking/{id}','DoctorController@doctorbooking');

Route::get('/doctor-bookings/{id}','DoctorController@doctorbookings');




Route::get('/appointment-history','HistoryController@appointmenthistory')->name('appointment.history.list');


 Route::post('historyget','HistoryController@historyget')->name('historyget');




Route::get('/view-blog-grid','HomeController@view_blog_grid')->name('blogs');

Route::get('/search_blog','BlogController@search_blog')->name('search_blog');

Route::get('/blog-details/{id}','BlogController@blogdetails');
Route::post('/blogcomment','BlogController@blogcomment')->name('blogcomment');
Route::post('/search_blogconatent','BlogController@search_blogconatent')->name('search_blogconatent');






/*---------------------shailendra end-----------------------*/


//---------------User Login------------------

Route::group(['middleware' => ['hp']], function() {
        Route::post('addCart', 'HomeController@addCart')->name('addCart');
        Route::get('cart', 'HomeController@cart')->name('cart');
        Route::post('cart', 'HomeController@deleteCartProduct')->name('deleteCartProduct');
        Route::post('update-cart', 'HomeController@updateQuantity')->name('updateQuantity');
        Route::get('order-history', 'HomeController@orderHistory')->name('orderHistory');
        Route::get('orders-invoice/print/{id}', 'HomeController@invoiceprint')->name('invoice.orders.print');
        Route::get('my-profile', 'HomeController@myProfile')->name('myProfile');
        Route::post('my-profile', 'HomeController@updateProfile')->name('myProfile');
        Route::get('change-password', 'HomeController@editPassword')->name('password.change');
        Route::get('logout', 'AuthController@logout')->name('userLogout');
        Route::post('change-password', 'HomeController@savePassword')->name('password.change');
      
        Route::get('checkout', 'HomeController@checkout')->name('checkout');
        Route::post('checkout', 'HomeController@placeOrder')->name('placeorder');

        Route::get('product-payment', 'HomeController@productPayment')->name('product.payment');
        Route::post('product-payment', 'HomeController@productPaymentpay')->name('product.payment');
        
        
            Route::get('otp-phone', 'AuthController@otpPageCreate')->name('phone.otp');
        Route::post('otp-phone', 'AuthController@otpPageSave')->name('phone.otp');
/*-------------------------shailendra-----------------*/
        Route::post('doctor-profile-reviews','HomeController@savereviews')->name('doctor-profile-reviews');
       Route::post('comment-form','HomeController@comments')->name('comment-form');



 

            /**---------------------------blog start--------------------------------*/

 
         
            Route::get('/add-blog','BlogController@add_blog')->name('add-blog');
            Route::post('/add-blog','BlogController@store')->name('add-blog');

            Route::get('/new','BlogController@new');

            Route::get('/edit-blog/{id}','BlogController@editblog')->name('edit-blog');
            Route::post('/edit-blog/{id}','BlogController@edit')->name('edit-blog');

            Route::post('/delete-blog','BlogController@deleteblog')->name('delete-blog');
/*----------------------------shailendra end-------------------*/

    });


//-------------------------------Admin---------------------------------------


Route::group(['prefix'=>'auth'], function(){

Route::get('logout', 'AuthController@logout')->name('logout');
Route::get('my-profile/update', 'UserController@editMyProfile')->name('my.profile.update');
Route::post('my-profile/img/update', 'UserController@saveImgMyProfile')->name('img.my.profile.update');
Route::post('my-profile/basic/update', 'UserController@saveBasicMyProfile')->name('basic.my.profile.update');
Route::post('my-profile/general/update', 'UserController@saveGeneralMyProfile')->name('general.my.profile.update');
Route::post('my-profile/acc/update', 'UserController@saveAccMyProfile')->name('acc.my.profile.update');
Route::post('my-profile/hospital/update', 'UserController@saveHospitalMyProfile')->name('hospital.my.profile.update');
Route::post('my-profile/education/update', 'UserController@saveEducationMyProfile')->name('education.my.profile.update');
Route::post('my-profile/services-specialization/update', 'UserController@saveServicesDetaileMyProfile')->name('services.my.profile.update');
Route::post('my-profile/dec-img/update', 'UserController@saveDecImgMyProfile')->name('img.document.profile.update');

Route::get('my-profile/view', 'UserController@myProfile')->name('my.profile.view');

Route::get('password/update', 'UserController@editPassword')->name('password.update');
Route::post('password/update', 'UserController@savePassword')->name('password.update');

Route::post('product-comment', 'HomeController@commentSave')->name('product.comment');
Route::post('product-comment-reply', 'HomeController@commentreplySave')->name('product.comment.reply');

Route::get('my-orders-his', 'OrderController@myorderHis')->name('my.orders.his.list');
 Route::get('orders/print/{id}', 'OrderController@print')->name('orders.print');

Route::get('subscription-plan/{buspart_id}', 'HomeController@subscriptionplanshome')->name('subscription.plan');


     Route::get('my-blog-list','BlogController@myblog')->name('my.blogs.list');
});



Route::group(['prefix'=>'admin'], function(){
Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::get('dashboard', 'DashboardController@admin')->name('admin.dashboard');

    Route::get('categories', 'CategoryController@index')->name('categories.list');
    Route::get('categories/create', 'CategoryController@create')->name('categories.create');
    Route::post('categories/create', 'CategoryController@save')->name('categories.create');
    Route::get('categories/update/{id}', 'CategoryController@edit')->name('categories.update');
    Route::post('categories/update/{id}', 'CategoryController@update')->name('categories.update');
    Route::post('categories/destroy', 'CategoryController@destroy')->name('categories.destroy');

 
    Route::get('All-products-list', 'ProductController@index')->name('products.list');
    
    
       Route::get('blog-list','BlogController@blog')->name('blogs.list');
       
    Route::get('ask-question', 'AskquestionController@index')->name('ask.question.list');
    Route::post('ask-question/destroy', 'AskquestionController@destroy')->name('ask.question.destroy');

    Route::get('all-messages', 'MsgController@index')->name('msg.list');
    Route::get('new-messages', 'MsgController@new')->name('msg.new');
    Route::get('messages/details/{id}', 'MsgController@view')->name('msg.view');

    Route::get('query', 'QueryController@index')->name('query.list');
    Route::post('query/destroy', 'QueryController@destroy')->name('queries.destroy');

    Route::get('orders', 'OrderController@index')->name('orders.list');
    Route::get('orders/view/{id}', 'OrderController@view')->name('orders.view');
   
    Route::get('orders/new', 'OrderController@new')->name('orders.new');
    Route::get('orders/processing', 'OrderController@processing')->name('orders.processing');
    Route::get('orders/completed', 'OrderController@completed')->name('orders.completed');
    Route::get('orders/cancelled', 'OrderController@cancelled')->name('orders.cancelled');
 
    Route::post('orders/status/update', 'OrderController@statusUpdate')->name('orders.status.update');
    Route::post('orders/payment/update', 'OrderController@paymentUpdate')->name('orders.payment.update');
    Route::post('user/approve/update', 'UserController@approveUpdate')->name('user.approve.update');
    
   //Route::post('subscription/approve/update', 'SubscriptionPaymentController@statusUpdate')->name('subscription.approve.update');

    Route::get('payments', 'PaymentController@index')->name('payments.list');
    Route::get('payments/new', 'PaymentController@new')->name('payments.new');
    Route::get('payments/month', 'PaymentController@month')->name('payments.month');
    Route::get('payments/year', 'PaymentController@year')->name('payments.year');
    Route::get('payments/print', 'PaymentController@print')->name('payments.print');
    
   
    
    Route::get('home-notification', 'HomenotificationController@index')->name('home.notification.list');
   
    Route::get('home-notification/update/{id}', 'HomenotificationController@edit')->name('home.notification.update');
    Route::post('home-notification/update/{id}', 'HomenotificationController@update')->name('home.notification.update');
   

    Route::get('business_partners', 'BusinessPartnerController@index')->name('business.partners.list');
    Route::get('business_partners/create', 'BusinessPartnerController@create')->name('business.partners.create');
    Route::post('business_partners/create', 'BusinessPartnerController@save')->name('business.partners.create');
    Route::get('business_partners/update/{id}', 'BusinessPartnerController@edit')->name('business.partners.update');
    Route::post('business_partners/update/{id}', 'BusinessPartnerController@update')->name('business.partners.update');
    Route::post('business_partners/destroy', 'BusinessPartnerController@destroy')->name('business.partners.destroy');
   
    Route::get('specialities-list', 'SpecialitieController@index')->name('specialities.list');
    Route::get('specialities/create', 'SpecialitieController@create')->name('specialities.create');
    Route::post('specialities/create', 'SpecialitieController@save')->name('specialities.create');
    Route::get('specialities/update/{id}', 'SpecialitieController@edit')->name('specialities.update');
    Route::post('specialities/update/{id}', 'SpecialitieController@update')->name('specialities.update');
    Route::post('specialities/destroy', 'SpecialitieController@destroy')->name('specialities.destroy');
   
    Route::get('All-subscription_plans-list', 'SubscriptionPlanController@index')->name('subscription.plans.list');

    Route::get('subscription_plans/create', 'SubscriptionPlanController@create')->name('subscription.plans.create');
    Route::post('subscription_plans/create', 'SubscriptionPlanController@save')->name('subscription.plans.create');
    Route::get('subscription_plans/update/{id}', 'SubscriptionPlanController@edit')->name('subscription.plans.update');
    Route::post('subscription_plans/update/{id}', 'SubscriptionPlanController@update')->name('subscription.plans.update');
    Route::post('subscription_plans/destroy', 'SubscriptionPlanController@destroy')->name('subscription.plans.destroy');
    Route::get('subscription_plans/view/{id}', 'SubscriptionPlanController@view')->name('subscription.plans.view');
   
    Route::get('All-subscription_payment-list', 'SubscriptionPaymentController@index')->name('subscription.payment.list');
Route::post('subscription_payment-status-update', 'SubscriptionPaymentController@statusUpdate')->name('subscription.payment.status.update');  

    Route::get('website-settings', 'WebController@index')->name('web.info');
    Route::post('website-settings', 'WebController@saveInfo')->name('web.info');
   

    Route::get('all-doctors', 'DoctorController@index')->name('doctors.list');
    Route::get('doctors/create', 'DoctorController@create')->name('doctors.create');
    Route::post('doctors/create', 'DoctorController@save')->name('doctors.create');
    Route::get('doctors/update/{id}', 'DoctorController@edit')->name('doctors.update');
    Route::post('doctors/update/{id}', 'DoctorController@update')->name('doctors.update');
    Route::post('doctors/img/update/{id}', 'DoctorController@saveImgupdate')->name('doctors.img.update');
    Route::post('doctors/general/update/{id}', 'DoctorController@saveGeneralProfile')->name('doctors.general.profile.update');
    Route::post('doctors/acc/update/{id}', 'DoctorController@saveAccProfile')->name('doctors.acc.profile.update');
    Route::post('doctors/info/hospital/update/{id}', 'DoctorController@saveHospitalInfoProfile')->name('hospital.doc.info.profile.update');
    Route::post('doctors/dec-img/update/{id}', 'DoctorController@saveDecImgInfoProfile')->name('doctors.img.document.profile.update');
    Route::post('doctors/education/update/{id}', 'DoctorController@saveEducationProfile')->name('doctors.education.profile.update');
    Route::post('doctors/services-specialization/update/{id}', 'DoctorController@saveServicesDetaileProfile')->name('doctors.services.profile.update');
    Route::get('doctors/view/{id}', 'DoctorController@view')->name('doctors.view');
    Route::post('doctors/destroy', 'DoctorController@destroy')->name('doctors.destroy');

    Route::get('all-blood_bank', 'BloodbankController@index')->name('blood.bank.list');
    Route::get('blood_bank/create', 'BloodbankController@create')->name('blood.bank.create');
    Route::post('blood_bank/create', 'BloodbankController@save')->name('blood.bank.create');
    Route::get('blood_bank/update/{id}', 'BloodbankController@edit')->name('blood.bank.update');
    Route::post('blood_bank/update/{id}', 'BloodbankController@update')->name('blood.bank.update');
    Route::post('blood_bank/img/update/{id}', 'BloodbankController@saveImgupdate')->name('blood.bank.img.update');
    Route::post('blood_bank/acc/update/{id}', 'BloodbankController@saveAccProfile')->name('blood.bank.acc.profile.update');
    
    Route::get('blood_bank/view/{id}', 'BloodbankController@view')->name('blood.bank.view');
    Route::post('blood_bank/destroy', 'BloodbankController@destroy')->name('blood.bank.destroy');

    Route::get('all-diagnostic', 'DiagonosticController@index')->name('diagonostics.list');
    Route::get('diagnostic/create', 'DiagonosticController@create')->name('diagonostics.create');
    Route::post('diagnostic/create', 'DiagonosticController@save')->name('diagonostics.create');
    Route::get('diagnostic/update/{id}', 'DiagonosticController@edit')->name('diagonostics.update');
    Route::post('diagnostic/update/{id}', 'DiagonosticController@update')->name('diagonostics.update');
    Route::post('diagnostic/acc/update/{id}', 'DiagonosticController@saveAccProfile')->name('diagonostics.acc.profile.update');
    Route::post('diagnostic/img/update/{id}', 'DiagonosticController@saveImgupdate')->name('diagonostics.img.update');
    Route::post('diagnostic/hospital/update/{id}', 'DiagonosticController@saveHospitalInfoProfile')->name('hospital.dig.info.profile.update');
    Route::post('diagnostic/dec-img/update/{id}', 'DiagonosticController@saveDecImgInfoProfile')->name('diagonostics.img.document.profile.update');
    Route::post('diagnostic/education/update/{id}', 'DiagonosticController@saveEducationProfile')->name('diagonostics.education.profile.update');
    Route::post('diagnostic/services-specialization/update/{id}', 'DiagonosticController@saveServicesDetaileProfile')->name('diagonostics.services.profile.update');
    Route::get('diagnostic/view/{id}', 'DiagonosticController@view')->name('diagonostics.view');
    Route::post('diagnostic/destroy', 'DiagonosticController@destroy')->name('diagonostics.destroy');

    Route::get('all-hospital', 'HospitalController@index')->name('hospital.list');
    Route::get('hospital/create', 'HospitalController@create')->name('hospital.create');
    Route::post('hospital/create', 'HospitalController@save')->name('hospital.create');
    Route::get('hospital/update/{id}', 'HospitalController@edit')->name('hospital.update');
    Route::post('hospital/update/{id}', 'HospitalController@update')->name('hospital.update');
    Route::post('hospital/img/update/{id}', 'HospitalController@saveImgupdate')->name('hospital.img.update');
    Route::post('hospital/acc/update/{id}', 'HospitalController@saveAccProfile')->name('hospital.acc.profile.update');
    Route::post('hospital/info/hospital/update/{id}', 'HospitalController@saveHospitalInfoProfile')->name('hospital.hos.info.profile.update');
    Route::post('hospital/dec-img/update/{id}', 'HospitalController@saveDecImgInfoProfile')->name('hospital.img.document.profile.update');
    Route::post('hospital/services-specialization/update/{id}', 'HospitalController@saveServicesDetaileProfile')->name('hospital.services.profile.update');
    Route::get('hospital/view/{id}', 'HospitalController@view')->name('hospital.view');
    Route::post('hospital/destroy', 'HospitalController@destroy')->name('hospital.destroy');

    Route::get('all-pharmacy', 'PharmacyController@index')->name('pharmacy.list');
    Route::get('pharmacy/create', 'PharmacyController@create')->name('pharmacy.create');
    Route::post('pharmacy/create', 'PharmacyController@save')->name('pharmacy.create');
    Route::get('pharmacy/update/{id}', 'PharmacyController@edit')->name('pharmacy.update');
    Route::post('pharmacy/update/{id}', 'PharmacyController@update')->name('pharmacy.update');
    Route::post('pharmacy/img/update/{id}', 'PharmacyController@saveImgupdate')->name('pharmacy.img.update');
    Route::post('pharmacy/acc/update/{id}', 'PharmacyController@saveAccProfile')->name('pharmacy.acc.profile.update');
    Route::get('pharmacy/view/{id}', 'PharmacyController@view')->name('pharmacy.view');
    Route::post('pharmacy/destroy', 'PharmacyController@destroy')->name('pharmacy.destroy');

    Route::get('all-patient', 'PatientController@index')->name('patient.list');
    Route::get('patient/create', 'PatientController@create')->name('patient.create');
    Route::post('patient/create', 'PatientController@save')->name('patient.create');
    Route::get('patient/update/{id}', 'PatientController@edit')->name('patient.update');
    Route::post('patient/update/{id}', 'PatientController@update')->name('patient.update');
    Route::post('patient/img/update/{id}', 'PatientController@saveImgupdate')->name('patient.img.update');
    Route::post('patient/acc/update/{id}', 'PatientController@saveAccProfile')->name('patient.acc.profile.update');
    Route::get('patient/view/{id}', 'PatientController@view')->name('patient.view');
    Route::post('patient/destroy', 'PatientController@destroy')->name('patient.destroy');


    Route::get('all-employee', 'EmployeeController@index')->name('employee.list');
    Route::get('employee/create', 'EmployeeController@create')->name('employee.create');
    Route::post('employee/create', 'EmployeeController@save')->name('employee.create');
    Route::get('employee/update/{id}', 'EmployeeController@edit')->name('employee.update');
    Route::post('employee/update/{id}', 'EmployeeController@update')->name('employee.update');
    Route::post('employee/destroy', 'EmployeeController@destroy')->name('employee.destroy');


    Route::get('blood-bank-all-request', 'BloodbankRequestController@indexRequest')->name('blood.bank.all.request.list');
    Route::get('blood-bank-all-donate', 'BloodbankRequestController@indexDonate')->name('blood.bank.all.donate.list');
    Route::post('blood-bank/status/update', 'BloodbankRequestController@statusUpdate')->name('blood.bank.status.update');
    Route::post('blood_bank-request/destroy', 'BloodbankRequestController@destroy')->name('blood.request.destroy');

    Route::get('home-slide-settings', 'HomeSlideController@index')->name('home.slide.list');
    Route::get('home-slide-settings/create', 'HomeSlideController@create')->name('home.slide.create');
    Route::post('home-slide-settings/create', 'HomeSlideController@save')->name('home.slide.create');
    Route::get('home-slide-settings/update/{id}', 'HomeSlideController@edit')->name('home.slide.update');
    Route::post('home-slide-settings/update/{id}', 'HomeSlideController@update')->name('home.slide.update');

    Route::get('home-about_us-settings', 'AboutController@index')->name('about.list');
    Route::get('home-about_us-settings/update/{id}', 'AboutController@edit')->name('about.update');
    Route::post('home-about_us-settings/update/{id}', 'AboutController@update')->name('about.update');

    Route::get('home-policy-settings', 'PolicyController@index')->name('policy.list');
    Route::get('home-policy-settings/update/{id}', 'PolicyController@edit')->name('policy.update');
    Route::post('home-policy-settings/update/{id}', 'PolicyController@update')->name('policy.update');

    Route::get('update/password/{id}', 'UserController@updateUserPassword')->name('my.user.update.password');
    Route::post('update/password/{id}', 'UserController@saveUserPassword')->name('my.user.update.password');
   


});
});


Route::group(['prefix'=>'mydashboard'], function(){
    Route::group(['middleware' => ['auth', 'adminpharmacy']], function() {

        Route::get('dashboard-pharmacy', 'DashboardController@pharmacy')->name('pharmacy.dashboard');
       
        Route::get('pharmacy-subscription_plans-list', 'SubscriptionPlanController@planPharmacy')->name('subscription.pharmacy.plans.list');

        Route::get('my-products', 'ProductController@mylist')->name('products.mylist');
        Route::get('products/create', 'ProductController@create')->name('products.create');
        Route::post('products/create', 'ProductController@save')->name('products.create');
        Route::get('products/update/{id}', 'ProductController@edit')->name('products.update');
        Route::post('products/update/{id}', 'ProductController@update')->name('products.update');
        Route::post('products/destroy', 'ProductController@destroy')->name('products.destroy');
        
       
        Route::get('categories/{id}/products', 'ProductController@cProducts')->name('products.cProducts');
        Route::get('products/view/{id}', 'ProductController@view')->name('products.view');
        
        Route::get('my-orders', 'OrderController@myorder')->name('my.orders.list');
        
    
        Route::get('orders-seller/view/{id}', 'OrderController@sellerview')->name('seller.orders.view');
        Route::get('orders-seller/print/{id}', 'OrderController@sellerprint')->name('seller.orders.print');

        Route::get('my-payments', 'PaymentController@myPayment')->name('seller.payments.list');
    
    });
});

Route::group(['prefix'=>'mydashboard_blood_bank'], function(){
    Route::group(['middleware' => ['auth', 'adminbloodbank']], function() {

        Route::get('dashboard-blood_bank', 'DashboardController@blood_bank')->name('blood_bank.dashboard');
        Route::get('blood-bank-subscription_plans-list', 'SubscriptionPlanController@planBloodBank')->name('subscription.blood.bank.plans.list');
       
         Route::get('blood-bank-my-request', 'BloodbankRequestController@myRequest')->name('blood.bank.my.request.list');
        Route::get('blood-bank-my-donate', 'BloodbankRequestController@myDonate')->name('blood.bank.my.donate.list');
         
        
    });
});
       
Route::group(['prefix'=>'mydashboard'], function(){
    Route::group(['middleware' => ['auth', 'admindiagonostics']], function() {

        Route::get('dashboard-diagnostic', 'DashboardController@diagonostics')->name('diagonostics.dashboard'); 
        Route::get('diagnostic-subscription_plans-list', 'SubscriptionPlanController@planDiagonostics')->name('subscription.diagonostics.plans.list');

    });
});
       
Route::group(['prefix'=>'mydashboard_doctor'], function(){
    Route::group(['middleware' => ['auth', 'admindoctor']], function() {

        Route::get('dashboard-doctor', 'DashboardController@doctor')->name('doctor.dashboard');
        Route::get('doctors-subscription_plans-list', 'SubscriptionPlanController@planDoctors')->name('subscription.doctors.plans.list');
    });
});

Route::group(['prefix'=>'mydashboard_hospital'], function(){
    Route::group(['middleware' => ['auth', 'adminhospital']], function() {

        Route::get('dashboard-hospital', 'DashboardController@hospital')->name('hospital.dashboard');
        Route::get('hospital-subscription_plans-list', 'SubscriptionPlanController@planHospital')->name('subscription.hospital.plans.list');

    });
});

Route::group(['prefix'=>'mydashboard'], function(){
    Route::group(['middleware' => ['auth', 'adminpatient']], function() {

        Route::get('dashboard-patient', 'DashboardController@patient')->name('patient.dashboard');




        /*---------------------- shailendra apointment listing start--------------------------------*/
Route::get('/appointments_listing','HomeController@appointlisting')->name('appointments_listing');




Route::post('/edit-time','ScheduletimeController@edit')->name('edit-time');


/*----------------------apointment listing end--------------------------------*/











/*--------------------------------doctor start------------------------------ */

Route::get('favourite-doctor','DoctorController@fav_doctor')->name('favourite.doctor.like');
Route::post('/doctor_like','DoctorController@doctor_like')->name('doctor_like');
Route::post('/doctor_dislike','DoctorController@doctor_dislike')->name('doctor_dislike');

//Route::get('/doctor-booking/{id}','DoctorController@doctorbooking');




Route::post('scheduletimes_dayfront','DoctorController@scheduletimes_dayfront')->name('scheduletimes_dayfront');


Route::post('booktime','DoctorController@booktime')->name('booktime');

/*--------------------------------doctor end------------------------------ */
/*--------------------------shailendra end--------------------*/
    });
});


Route::group(['prefix'=>'mydashboard'], function(){
    Route::group(['middleware' => ['auth', 'alladminhospitaldoctorblloph']], function() {
     
     Route::get('subscription_plans/detail/view/{id}', 'SubscriptionPlanController@planview')->name('subscription.plans.detail.view');
Route::get('subscription_plans/payment/', 'SubscriptionPaymentController@planpay')->name('subscription.plans.payment');

Route::post('subscription_payment/create', 'SubscriptionPaymentController@atoSavePayment')->name('subscription.payment.create');

Route::get('my-subscription_payment-list', 'SubscriptionPaymentController@myindex')->name('subscription.my.payment.list');
Route::get('subscription_payment-invoice/print/{id}', 'SubscriptionPaymentController@print')->name('subscription.payment.invoice');   
        
    });
});        
        
Route::group(['prefix'=>'mydashboard'], function(){
    Route::group(['middleware' => ['auth', 'adminhospitaldoctor']], function() {



/*------------------shailendra schedule-timing-----------------------*/

Route::get('/schedule-timing','ScheduletimeController@scheduletime')->name('schedule-time');


Route::post('scheduletimes_day','ScheduletimeController@scheduletimes_day')->name('scheduletimes_day');


Route::post('/addscheduletime','ScheduletimeController@addscheduletime')->name('scheduletime.addscheduletime');
/*------------------schedule-timing-----------------------*/

        /*----------------------------hospital start-------------------------------------*/

Route::get('/patient_appointment','AllUserController@patientappoint')->name('patient.appointment.list');
Route::get('patient_appointment_cancel/{id}','AllUserController@patientappointcancel')->name('patient_appointment_cancel');
Route::get('patient_appointment_active/{id}','AllUserController@patientappointactive')->name('patient_appointment_active');

/*Route::get('/hospital-reviews','HomeController@hospitalreviews');
*/
Route::post('hospitalreviews_like','AllUserController@hospitalreviews_like')->name('hospitalreviews_like');

Route::post('apointment_view','AllUserController@apointment_view')->name('apointment_view');
Route::get('/reviews','AllUserController@viewReview')->name('reviews.list');

/*----------------------------hospital end-------------------------------------*/

/*------------------------------Appointment Histroy start-------------------------*/




/*------------------------------Appointment Histroy end-------------------------*/

/*-------------------------------- Add Prescriptions------------------------------ */


Route::get('prescriptions/{id}', 'DoctorController@prescriptions')->name('prescriptions');

Route::post('/add-prescriptions','DoctorController@prescriptionsstore')->name('add-prescriptions');


/*-------------------------------- Add Prescriptions end------------------------------ */
       
/*------------------------------add-medical-records------------------------*/
Route::get('medical-records/{id}', 'DoctorController@medicalrecords')->name('medical-records');




Route::post('/add-medical-records','DoctorController@addmedicalrecords')->name('add-medical-records');



/*------------------------------add-medical-records end------------------------*/


/*--------------------------------shailendra end----------------------------*/





    });
});



Route::post('/delete-scheduletimes','ScheduletimeController@deletescheduletimes')->name('delete-scheduletimes');


Route::get('history_payment-invoice/print/{id}', 'HistoryController@print')->name('history.payment.invoice');

/*------------------------------shailendra start-------------------------*/
/*-----------------------home search ----------------------------*/
Route::get('homesearch','DoctorController@homesearch')->name('homesearch');
Route::get('homesearchloc','HomeController@homesearchloc')->name('homesearchloc');

Route::get('hospitalname','HomeController@hospitalname')->name('hospitalname');

Route::get('homespeciality','HomeController@homespeciality')->name('homespeciality');

Route::post('searchdocs','HomeController@searchdocs')->name('searchdocs');

/*---------------------shailendra  home search end---------------------------*/
