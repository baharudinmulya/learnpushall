<?php

use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;
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
Route::get('/', 'LoginController@index');
Route::post('/userlogin', 'LoginController@login')->name('userlogin');
Route::get('/userlogout', 'LoginController@logout')->name('userlogout');
Route::get('/forgot', 'LoginController@forgot')->name('userforgot');
Route::get('/personal', 'PersonalController@personal')->name('personal');
Route::get('/personal/memberpersonal', 'PersonalController@memberpersonal')->name('memberpersonal');
Route::post('/personal/store', 'PersonalController@store')->name('personal.store');
Route::post('/personal/storedatadiri', 'PersonalController@storedatadiri')->name('personal.storedatadiri');


Route::group(['middleware'=>'CekLoginMiddleware'],function () {

  
    Route::get('/admin', function () {
        return view('admin.home');
        
        });
        Route::get('/userlist', 'UserListController@index')->name('userlist');
        Route::get('/userlist/create', 'UserListController@create')->name('useradd');
        Route::post('/userlist/store', 'UserListController@store')->name('user.store');
        Route::get('/userlist/{user:id}', 'UserListController@show')->name('userview');
        Route::get('/userprofile/{user:id}', 'UserListController@profile')->name('userprofile');
        Route::patch('/userprofile/{id}', 'UserListController@changepassword')->name('user.changepassword');
        
        //User GA

        Route::get('/userga', 'UserGAController@index')->name('userga');
        Route::get('/userga/create', 'UserGAController@create')->name('usergaadd');
        Route::post('/userga/store', 'UserGAController@store')->name('userga.store');
        Route::get('/userga/{user:id}', 'UserGAController@show')->name('usergaview');
        
        Route::get('/usertype', 'UserTypeController@index')->name('usertype');
    
        Route::get('/about', 'AboutController@index')->name('about');
    
        Route::get('/location', 'LocationController@index')->name('location');
        Route::get('/location/create', 'LocationController@create')->name('location.create');
        Route::post('/location/store', 'LocationController@store')->name('location.store');
        Route::get('/location/{location:locationid}', 'LocationController@show')->name('location.show');
        Route::patch('/location/{id}', 'LocationController@edit')->name('location.edit');
        Route::delete('/location/delete/{id}', 'LocationController@delete')->name('location.delete');
    
        Route::get('/area', 'AreaController@index')->name('area');
        Route::get('/area/create', 'AreaController@create')->name('area.create');
        Route::post('/area/store', 'AreaController@store')->name('area.store');
        Route::get('/area/{area:areaid}', 'AreaController@show')->name('area.show');
        Route::patch('/area/{id}', 'AreaController@edit')->name('area.edit');
        Route::delete('/area/delete/{id}', 'AreaController@delete')->name('area.delete');
    
    
        Route::get('/city', 'CityController@index')->name('city');
        Route::get('/city/create', 'CityController@create')->name('city.create');
        Route::post('/city/store', 'CityController@store')->name('city.store');
        Route::patch('/city/{id}', 'CityController@editdata')->name('city.edit');
        Route::delete('/city/delete/{id}', 'CityController@delete')->name('city.delete');
    
    
        Route::get('/city/{city:cityid}', 'CityController@show')->name('city.show');
    
    
        Route::get('/member', 'MemberController@index')->name('member');
        Route::get('/member/create', 'MemberController@create');
        Route::get('/member/{member:memberid}', 'MemberController@show');
    
        Route::get('/memberpayment', 'MemberPaymentController@index')->name('memberpayment');
        Route::get('/memberpayment/create', 'MemberPaymentController@create')->name('memberpayment.create');
        Route::get('/memberpaymentcompany', 'MemberPaymentCompanyController@index')->name('memberpaymentcompany');
    
        Route::get('/memberexpired', 'MemberExpiredController@index')->name('memberexpired');
        
        Route::patch('/memberexpired/{memberid}', 'MemberExpiredController@edit')->name('memberexpired.edit');
        Route::get('/memberexpired/{member:memberid}', 'MemberExpiredController@show')->name('memberexpired.show');
        
       Route::post('image','MemberExpiredController@upload');

        Route::get('/membercompany', 'MemberCompanyController@index')->name('membercompany');
        Route::get('/membercompany/create', 'MemberCompanyController@create')->name('membercompany.create');
        Route::post('/membercompany/store', 'MemberCompanyController@store')->name('membercompany.store');
        Route::get('/membercompany/{member:memberid}', 'MemberCompanyController@show')->name('membercompany.show');

        //personal

        // Route::get('/personal', 'PersonalController@Dhasboard')->name('userpersonal');
        Route::get('/personal/showupdate/{memberid}', 'PersonalController@showupdate');
        Route::get('/userga/create', 'UserGAController@create')->name('usergaadd');
        Route::get('Dhasboard', 'PersonalController@Dhasboard')->name('userprofilepersonal');
        Route::get('/personal/update', 'PersonalController@update')->name('personal.updateprofile');;
        Route::post('/userga/store', 'UserGAController@store')->name('userga.store');
        Route::get('/userga/{user:id}', 'UserGAController@show')->name('usergaview');
        
        Route::get('/usertype', 'UserTypeController@index')->name('usertype');
    
        Route::get('/about', 'AboutController@index')->name('about');
    
        Route::get('/location', 'LocationController@index')->name('location');
        Route::get('/location/create', 'LocationController@create')->name('location.create');
        Route::post('/location/store', 'LocationController@store')->name('location.store');
        Route::get('/location/{location:locationid}', 'LocationController@show')->name('location.show');
        Route::patch('/location/{id}', 'LocationController@edit')->name('location.edit');
        Route::delete('/location/delete/{id}', 'LocationController@delete')->name('location.delete');
    
        Route::get('/area', 'AreaController@index')->name('area');
        Route::get('/area/create', 'AreaController@create')->name('area.create');
        Route::post('/area/store', 'AreaController@store')->name('area.store');
        Route::get('/area/{area:areaid}', 'AreaController@show')->name('area.show');
        Route::patch('/area/{id}', 'AreaController@edit')->name('area.edit');
        Route::delete('/area/delete/{id}', 'AreaController@delete')->name('area.delete');
    
    
        Route::get('/city', 'CityController@index')->name('city');
        Route::get('/city/create', 'CityController@create')->name('city.create');
        Route::post('/city/store', 'CityController@store')->name('city.store');
        Route::patch('/city/{id}', 'CityController@editdata')->name('city.edit');
        Route::delete('/city/delete/{id}', 'CityController@delete')->name('city.delete');
    
    
        Route::get('/city/{city:cityid}', 'CityController@show')->name('city.show');
    
    
        Route::get('/member', 'MemberController@index')->name('member');
        Route::get('/member/create', 'MemberController@create');
        Route::get('/member/{member:memberid}', 'MemberController@show');
    
        Route::get('/memberpayment', 'MemberPaymentController@index')->name('memberpayment');
        Route::get('/memberpayment/create', 'MemberPaymentController@create')->name('memberpayment.create');
        Route::get('/memberpaymentcompany', 'MemberPaymentCompanyController@index')->name('memberpaymentcompany');
    
        Route::get('/memberexpired', 'MemberExpiredController@index')->name('memberexpired');
        
        Route::patch('/memberexpired/{memberid}', 'MemberExpiredController@edit')->name('memberexpired.edit');
        Route::get('/memberexpired/{member:memberid}', 'MemberExpiredController@show')->name('memberexpired.show');
        
       Route::post('image','MemberExpiredController@upload');

        Route::get('/membercompany', 'MemberCompanyController@index')->name('membercompany');
        Route::get('/membercompany/create', 'MemberCompanyController@create')->name('membercompany.create');
        Route::post('/membercompany/store', 'MemberCompanyController@store')->name('membercompany.store');
        Route::get('/membercompany/{member:memberid}', 'MemberCompanyController@show')->name('membercompany.show');
    

//Building Management
         Route::get('/membercompanylist/cari', 'MemberCompanyController@cari');
         Route::get('/membercompanylist/cari2', 'MemberCompanyController@cari2');
         Route::get('/yogihome', 'MemberCompanyController@indexbmapp2');
        Route::get('/membercompanybuildingapprove2', 'MemberCompanyController@indexbmapp2');
        Route::get('/membercompanybuilding', 'MemberCompanyController@indexbm')->name('membercompanybuilding');
        Route::get('/membercompanybuildingpersonal', 'MemberCompanyController@indexbmlist')->name('membercompanybuildinglist');
        Route::get('/membercompanybuildingpersonalapprove', 'MemberCompanyController@indexbmlistapprove')->name('membercompanybuildinglistapprove');
         Route::get('/membercompany/{member:memberid}', 'MemberCompanyController@show')->name('membercompany.show');
         Route::get('/membercompany/indexbmlistview/{companyid}', 'MemberCompanyController@indexbmlistview');
         Route::get('/membercompany/indexbmlistviewapprove/{companyid}', 'MemberCompanyController@indexbmlistviewapprove');
        // Route::get('/membercompanybuildingview', 'MemberCompanyController@indexbmlistview')->name('membercompanybuildingview');

        // Route::get('/membercompanybuildingapprove', 'MemberCompanyController@indexbmapp')->name('membercompanybuildingapp');
        Route::get('/membercompanybmview/{member:memberid}', 'MemberCompanyController@showbm')->name('memberbm.show');
        Route::get('/membercompanybuilding', 'MemberCompanyController@showcompany')->name('showcompany');
        Route::get('/membercompanybuildingapprove', 'MemberCompanyController@showcompanyapprove')->name('showcompanyapprove');

        Route::patch('/membercompanybuildingview/{id}', 'MemberCompanyController@updatebm')->name('updatebm');  
        Route::patch('/membercompanybuildingview/{active}', 'MemberCompanyController@updaterijek')->name('updaterijek');        
        Route::patch('/membercompanybmview/{id}', 'MemberCompanyController@storebm')->name('memberbm.edit');
        

        Route::get('/membercompanylist', 'MemberCompanyController@index2');
        Route::get('/membercompanylist/filterdate', 'MemberCompanyController@filterdate')->name('filter');;
        Route::get('/membercompanylist2', 'MemberCompanyController@indexnotapprovemb');
        Route::patch('/membercompanylist/{id}', 'MemberCompanyController@store2')->name('membercompanylist.edit');
        
        Route::get('/membercompanylist/{member:memberid}', 'MemberCompanyController@show2')->name('membercompany2.show');
    
        Route::get('/maintenance', 'MaintenanceController@index')->name('maintenance');
        Route::get('/promotion', 'PromotionController@index')->name('promotion');
    
    
        Route::get('/transaction', 'TransactionController@index')->name('transaction');
        Route::get('/transaction/{transaction:transactionid}', 'TransactionController@show');
    
        Route::get('/item', 'ItemController@index')->name('item');
        Route::get('/item/create', 'ItemController@create')->name('item.create');
        Route::post('/item/store', 'ItemController@store')->name('item.store');
        Route::get('/item/{item:itemid}', 'ItemController@show')->name('item.show');
        Route::patch('/item/{id}', 'ItemController@editdata')->name('item.edit');
        Route::delete('/item/delete/{id}', 'ItemController@delete')->name('item.delete');
    
        Route::get('/department', 'DepartmentController@index')->name('department');
        Route::get('/department/create', 'DepartmentController@create')->name('department.create');
        Route::post('/department/store', 'DepartmentController@store')->name('department.store');
        Route::get('/department/{department:deptid}', 'DepartmentController@show')->name('department.show');
        Route::patch('/department/{id}', 'DepartmentController@edit')->name('department.edit');
        Route::delete('/department/delete/{id}', 'DepartmentController@delete')->name('department.delete');
    
    
        Route::get('/position', 'PositionController@index')->name('position');
        Route::get('/position/create', 'PositionController@create')->name('position.create');
        Route::post('/position/store', 'PositionController@store')->name('position.store');
        Route::get('/position/{position:positionid}', 'PositionController@show')->name('position.show');
        Route::patch('/position/{id}', 'PositionController@edit')->name('position.edit');
        Route::delete('/position/delete/{id}', 'PositionController@delete')->name('position.delete');
    
       
    
    
        Route::get('/terminal', 'TerminalController@index')->name('terminal');
        Route::get('/terminal/{terminal:terminalid}', 'TerminalController@show')->name('terminal.show');
    
        Route::get('/vehicle', 'VehicleController@index')->name('vehicle');
        Route::get('/vehicle/create', 'VehicleController@create')->name('vehicle.create');
    
        Route::get('/vehicle/{vehicle:carid}', 'VehicleController@show')->name('vehicle.show');
        Route::patch('/vehicle/{id}', 'VehicleController@editdata')->name('vehicle.edit');
        Route::delete('/vehicle/delete/{id}', 'VehicleController@delete')->name('vehicle.delete');
    
    
        Route::get('/membertype', 'MemberTypeController@index')->name('membertype');
        Route::get('/membertype/create', 'MemberTypeController@create')->name('membertype.create');
        Route::post('/membertype/store', 'MemberTypeController@store')->name('membertype.store');
        Route::get('/membertype/{membertype:membertypeid}', 'MemberTypeController@show')->name('membertype.show');
        Route::patch('/membertype/{id}', 'MemberTypeController@edit')->name('membertype.edit');
    
        Route::delete('/membertype/delete/{id}', 'MemberTypeController@delete')->name('membertype.delete');

        //Member Duration
        Route::get('/memberduration', 'MemberDurationController@index')->name('memberduration');
        Route::get('/memberduration/create', 'MemberDurationController@create')->name('memberduration.create');
        Route::post('/memberduration/store', 'MemberDurationController@store')->name('memberduration.store');
        Route::get('/memberduration/{memberduration:durationid}', 'MemberDurationController@show')->name('memberduration.show');
        Route::patch('/memberduration/{id}', 'MemberDurationController@edit')->name('memberduration.edit');
        Route::delete('/memberduration/delete/{id}', 'MemberDurationController@delete')->name('memberduration.delete');

        //Tarif
        Route::get('/tarif', 'TarifController@index')->name('tarif');
        Route::get('/tarif/create', 'MemberDurationController@create')->name('tarif.create');
        Route::post('/tarif/store', 'MemberDurationController@store')->name('tarif.store');
        Route::get('/tarif/{tarif:costid}', 'TarifController@show')->name('tarif.show');
        Route::patch('/tarif/{id}', 'MemberDurationController@edit')->name('tarif.edit');
        Route::delete('/tarif/delete/{id}', 'MemberDurationController@delete')->name('tarif.delete');
    
    
        Route::get('/company', 'CompanyController@index')->name('company');
        Route::get('/company/create', 'CompanyController@create')->name('company.create');
        Route::post('/company/store', 'CompanyController@store')->name('company.store');
        Route::get('/company/{company:companyid}', 'CompanyController@show')->name('company.show');
        Route::patch('/company/{id}', 'CompanyController@edit')->name('company.edit');
        Route::delete('/company/delete/{id}', 'CompanyController@delete')->name('company.delete');
    
        Route::get('/staff', 'StaffController@index')->name('staff');
        Route::get('/staff/create', 'StaffController@create')->name('staff.create');
        Route::post('/staff/store', 'StaffController@store')->name('staff.store');
        Route::get('/staff/{staff:staffid}', 'StaffController@show')->name('staff.show');
        Route::patch('/staff/{id}', 'StaffController@editdata')->name('staff.edit');
        Route::delete('/staff/delete/{id}', 'StaffController@delete')->name('staff.delete');
    
        Route::get('/staffmember', 'StaffMemberController@index')->name('staffmember');
        Route::get('/staffmember/create', 'StaffMemberController@create')->name('staffmember.create');
        Route::get('/staffmember/{staffmember:staffid}', 'StaffMemberController@show')->name('staffmember.show');
        Route::patch('/staffmember/{id}', 'StaffMemberController@editdata')->name('staffmember.edit');
    
        Route::get('/itemcategory', 'ItemCategoryController@index')->name('itemcategory');
        Route::get('/itemcategory/create', 'ItemCategoryController@create')->name('itemcategory.create');
        Route::post('/itemcategory/store', 'ItemCategoryController@store')->name('itemcategory.store');
        Route::get('/itemcategory/{itemcategory:itemtypeid}', 'ItemCategoryController@show')->name('itemcategory.show');
        Route::patch('/itemcategory/{id}', 'ItemCategoryController@edit')->name('itemcategory.edit');
        Route::delete('/itemcategory/delete/{id}', 'ItemCategoryController@delete')->name('itemcategory.delete');
    
    
        Route::get('/paymenttype', 'PaymentTypeController@index')->name('paymenttype');
        Route::get('/paymenttype/create', 'PaymentTypeController@create')->name('paymenttype.create');
        Route::post('/paymenttype/store', 'PaymentTypeController@store')->name('paymenttype.store');
        Route::get('/paymenttype/{paymenttype:paymenttypeid}', 'PaymentTypeController@show')->name('paymenttype.show');
        Route::patch('/paymenttype/{id}', 'PaymentTypeController@edit')->name('paymenttype.edit');
        Route::delete('/paymenttype/delete/{id}', 'PaymentTypeController@delete')->name('paymenttype.delete');
    
    
        Route::get('/shift', 'ShiftController@index')->name('shift');
        Route::get('/shift/create', 'ShiftController@create')->name('shift.create');
        Route::post('/shift/store', 'ShiftController@store')->name('shift.store');
        Route::get('/shift/{shift:shiftid}', 'ShiftController@show')->name('shift.show');
        Route::patch('/shift/{id}', 'ShiftController@edit')->name('shift.edit');
        Route::delete('/shift/delete/{id}', 'ShiftController@delete')->name('shift.delete');
    
    
        Route::get('/contact', function () {
            return view('contact');
        });
   
        
        
    


    
    });