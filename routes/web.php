  <?php

use App\Http\Controllers\User\UserPendingController;
use Illuminate\Support\Facades\Route;

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



Route::group(['namespace' => 'App\Http\Controllers'], function()
    {   
            Route::get('/', function () {
              return redirect('/login');
    });

//REGISTER ROUTE

Route::group(['middleware' => ['guest']], function() {
           
    Route::get('/register', 'RegisterController@show')->name('register.show');
    Route::post('/registerUser', 'RegisterController@register')->name('register.perform');

//REGISTER USER ROUTE
    Route::get('/registration', 'RegistrationController@show')->name('registration.show');
    Route::post('/registration', 'RegistrationController@register')->name('registration.perform');
    

//LOGIN ROUTE

    Route::get('/login', 'LoginController@show')->name('login.show');
    Route::post('/login', 'LoginController@login')->name('login.perform');



    });

//ADMIN DASHBOARRD/LOGOUT

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function() {
            
    Route::get('/logout', 'LogoutController@logout')->name('logout.perform');
    Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('admin.dashboard');

#ADMIN

// TRANSACTION ROUTES
    Route::get('/transaction/new', 'TransactionController@newtransaction')->name('transaction.new');
    Route::post('/transaction/new/store', 'TransactionController@storetransaction')->name('transaction.store');
    Route::get('/transaction/pending', 'PendingController@pendingtransaction')->name('transaction.pending');
    Route::get('/transaction/approved', 'ApprovedController@approvedtransaction')->name('transaction.approved');

//LOGS ROUTES
    Route::get('/log/document', 'LogController@documentlog')->name('log.document');
   
      

//TRANSACTION EDIT/ DELETE/ VIEW
    Route::get('/pending/edit/{id}', 'PendingController@edittransaction')->name('pending.edit');
    Route::post('/pending/edit/update', 'PendingController@updatetransaction')->name('pending.edit.update');
    Route::get('/pending/delete/{id}', 'PendingController@deletetransaction')->name('pending.delete');


    Route::get('/pending/view/{id}', 'PendingController@viewlog')->name('pending.view');
    Route::post('/pending/edit/view', 'PendingController@viewlog')->name('pending.edit.view');
    Route::post('/record-visit',[TrackingController::class, 'recordVisit']);
        
       

//EMPLOYEE ROUTES
    Route::get('/employee/new', 'EmployeeController@newemployee')->name('employee.new');
    Route::post('/employee/new/save', 'EmployeeController@saveemployee')->name('employee.save');
    Route::get('/employee/list', 'ListController@listemployee')->name('employee.list');

//EMPLOYEE EDIT DELETE
    Route::get('/list/edit/{id}', 'ListController@editlist')->name('list.edit');
    Route::post('/list/edit/update', 'ListController@updatelist')->name('list.edit.update');   
    Route::get('/list/delete/{id}', 'ListController@deletelist')->name('list.delete');

    Route::get('/transactionLogs/{id}', 'LogController@adminViewLog')->name('view.log');
    Route::post('/searchTransaction', 'LogController@searchTransaction')->name('admin.search.transaction');

    Route::post('/rejectNotification', 'RejectedController@rejectNotification')->name('admin.rejected.notif');
    Route::post('/approvedNotification', 'ApprovedController@approvedNotification')->name('admin.approved.notif');

    });
//APPROVED ROUTES
    Route::get('/approved', [ApprovedController::class, 'index'])->name('approved.status');


    Route::get('/viewPending', 'PendingController@viewPending')->name('admin.view.pending');
    Route::get('/viewApproved', 'ApprovedController@viewApproved')->name('admin.view.approved');
    Route::get('/viewRejected', 'RejectedController@viewRejected')->name('admin.view.rejected');
    

#USERS

//DASHBOARD/LOGOUT

    Route::group(['middleware' => ['user'],'prefix' => 'user'], function() {

    Route::get('/logout', 'LogoutController@logout')->name('user.logout.perform');
    Route::get('/dashboard', 'User\DashboardController@index')->name('user.dashboard');


//TRANSACTIONS
    
    Route::get('/transaction/pending', 'User\UserPendingController@userpendingtransaction')->name('pending.user');
    Route::get('/transaction/approved', 'User\UserApprovedController@approved')->name('approved.user');


//LOGS
    
    

    });  
    
});

//USER TRANSACTION

Route::group(['middleware' => ['user']], function() {
    $controller_path = 'App\Http\Controllers';
    Route::post('transactions/approve', $controller_path . '\User\UserPendingController@approveTransaction')->name('user.approveTransaction');
    Route::get('/log/document', $controller_path .'\User\UserLogController@userdocumentlog')->name('user.log.document');

    Route::post('user/searchTransaction', $controller_path . '\User\UserLogController@userSearchTransaction')->name('search.transaction');
    Route::get('/user/transactionLogs/{id}', $controller_path. '\LogController@userViewLog')->name('user.view.log');
    Route::get('/user/newTransaction', $controller_path. '\User\DashboardController@userViewNewTransaction')->name('user.new.transaction');
    Route::get('/user/rejectedTransactions', $controller_path. '\User\UserRejectController@rejectedTransactions')->name('user.rejected.transactions');
    Route::post('/user/userNewTransaction', $controller_path. '\User\DashboardController@userNewTransaction')->name('user.store.transaction');
    Route::post('/user/rejectTransaction', $controller_path. '\User\UserRejectController@rejectTransaction')->name('user.reject.transaction');

});  


    

        
        
