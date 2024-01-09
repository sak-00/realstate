<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Backend\PropertyTypeController;
use App\Http\Controllers\Backend\RoleControll;
use GuzzleHttp\Middleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


//if I want to write multi variable middleware
Route::group(['middleware' => ['roles:super Admin,admin']], function () {

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/Logout', [AdminController::class, 'adminLogout'])->name('adminLogout');
    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('adminProfile');
    Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('adminProfileStore');
    Route::get('/admin/changePasswordPage', [AdminController::class, 'ChangePasswordPage'])->name('ChangePasswordPage');

    Route::post('/admin/updatePassword', [AdminController::class, 'adminUpdatePassword'])->name('adminUpdatePassword');
});

// route::middleware(['auth', 'roles:admin'])->group(function () {

//     Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
//     Route::get('/admin/Logout', [AdminController::class, 'adminLogout'])->name('adminLogout');
//     Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('adminProfile');
//     Route::post('/admin/profile/store', [AdminController::class, 'adminProfileStore'])->name('adminProfileStore');
//     Route::get('/admin/changePasswordPage', [AdminController::class, 'ChangePasswordPage'])->name('ChangePasswordPage');

//     Route::post('/admin/updatePassword', [AdminController::class, 'adminUpdatePassword'])->name('adminUpdatePassword');
// });

Route::get('/admin/Login', [AdminController::class, 'adminLogin'])->name('adminLogin');


route::middleware(['auth', 'roles:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'agentDashboard'])->name('agent.dashboard');
});



Route::group(['middleware' => ['roles:super Admin,admin']], function () {

    Route::controller(PropertyTypeController::class)->group(function () {
        Route::get('/all/type', 'AllType')->name('allType')->Middleware('permission:all.type');
        Route::get('/add/type', 'addType')->name('addType')->Middleware('permission:add.type');
        Route::post('/store/type', 'storeType')->name('storeType');
        Route::get('/edit/type/{id}', 'edit_type')->name('edit_type')->Middleware('permission:edit.type');
        Route::get('/delete/type/{id}', 'delete_type')->name('delete_type')->Middleware('permission:delete.type');

        Route::Post('/update/type', 'updateType')->name('updateType');


        //amenities all methods
        Route::get('/all/amenitie', 'allAmenitie')->name('allAmenitie')->Middleware('permission:amenities.all');
        Route::get('/add/amenitie', 'addAmenities')->name('addAmenities')->Middleware('permission:amenities.add');
        Route::post('/store/amenitie', 'storeAmenities')->name('storeAmenities');
        Route::get('/edit/amenitie/{id}', 'edit_amenities')->name('edit_amenities')->Middleware('permission:amenities.edit');
        Route::get('/delete/amenitie/{id}', 'delete_amenities')->name('delete_amenities')->Middleware('permission:amenities.delete');
        Route::Post('/update/amenitie', 'updateAmenities')->name('updateAmenities');
    });

    //permission

    Route::controller(RoleControll::class)->group(function () {

        Route::get('/all/permission', 'allPermission')->name('allPermission');
        Route::get('/add/permission', 'addPremission')->name('addPremission');
        Route::post('/store/permission', 'storePremission')->name('storePremission');
        Route::get('/edit/permission/{id}', 'edit_premission')->name('edit_premission');
        Route::get('/delete/permission/{id}', 'delete_premission')->name('delete_premission');
        Route::Post('/update/permission', 'updatePermission')->name('updatePermission');


        Route::get('/import/permission', 'importPremission')->name('importPremission');
        Route::get('/export', 'Export')->name('export');
        Route::post('/import', 'Import')->name('import');



        Route::get('/all/Roles', 'allRoles')->name('allRoles');
        Route::get('/add/Roles', 'addRoles')->name('addRoles');
        Route::post('/store/Roles', 'storeRoles')->name('storeRoles');
        Route::get('/edit/Roles/{id}', 'edit_roles')->name('edit_roles');
        Route::Post('/update/Roles', 'updateRoles')->name('updateRoles');
        Route::get('/delete/Roles/{id}', 'delete_roles')->name('delete_roles');


        ///add role to permissions
        Route::get('/Roles/permission', 'addRoleToPermission')->name('role_permission');
        Route::post('/store/Roles/Permissions', 'storeRolesinPermission')->name('storeRolesinPermission');
        Route::get('/all/Roles/permission', 'allRolesInPermissions')->name('allRolesInPermissions');
        Route::get('/edit/Roles/permission/{id}', 'admin_edit_roles')->name('admin_edit_roles');
        Route::post('/update/Roles/permission/{id}', 'updateRolesinPermission')->name('updateRolesinPermission');
        Route::get('/delete/Roles/permission/{id}', 'deleteRolesinPermission')->name('deleteRolesinPermission');
    });


    //admin controller
    Route::controller(AdminController::class)->group(function () {
        Route::get('/all/admin', 'allAdmin')->name('allAdmin');
        Route::get('/add/admin', 'addAdmin')->name('addAdmin');
        Route::post('/store/admin', 'storeAdmin')->name('storeAdmin');
        Route::get('/edit/admin/{id}', 'edit_admin')->name('edit_admin');
        Route::post('/update/admin/{id}', 'updateAdmin')->name('updateAdmin');
        Route::get('/delete/admin/{id}', 'deleteAdmin')->name('deleteAdmin');
    });
});
// route::middleware(['auth', 'roles:admin'])->group(function () {

//     Route::controller(PropertyTypeController::class)->group(function () {
//         Route::get('/all/type', 'AllType')->name('allType')->Middleware('permission:all.type');
//         Route::get('/add/type', 'addType')->name('addType')->Middleware('permission:add.type');
//         Route::post('/store/type', 'storeType')->name('storeType');
//         Route::get('/edit/type/{id}', 'edit_type')->name('edit_type')->Middleware('permission:edit.type');
//         Route::get('/delete/type/{id}', 'delete_type')->name('delete_type')->Middleware('permission:delete.type');

//         Route::Post('/update/type', 'updateType')->name('updateType');


//         //amenities all methods
//         Route::get('/all/amenitie', 'allAmenitie')->name('allAmenitie')->Middleware('permission:amenities.all');
//         Route::get('/add/amenitie', 'addAmenities')->name('addAmenities')->Middleware('permission:amenities.add');
//         Route::post('/store/amenitie', 'storeAmenities')->name('storeAmenities');
//         Route::get('/edit/amenitie/{id}', 'edit_amenities')->name('edit_amenities')->Middleware('permission:amenities.edit');
//         Route::get('/delete/amenitie/{id}', 'delete_amenities')->name('delete_amenities')->Middleware('permission:amenities.delete');
//         Route::Post('/update/amenitie', 'updateAmenities')->name('updateAmenities');
//     });

//     //permission

//     Route::controller(RoleControll::class)->group(function () {

//         Route::get('/all/permission', 'allPermission')->name('allPermission');
//         Route::get('/add/permission', 'addPremission')->name('addPremission');
//         Route::post('/store/permission', 'storePremission')->name('storePremission');
//         Route::get('/edit/permission/{id}', 'edit_premission')->name('edit_premission');
//         Route::get('/delete/permission/{id}', 'delete_premission')->name('delete_premission');
//         Route::Post('/update/permission', 'updatePermission')->name('updatePermission');


//         Route::get('/import/permission', 'importPremission')->name('importPremission');
//         Route::get('/export', 'Export')->name('export');
//         Route::post('/import', 'Import')->name('import');



//         Route::get('/all/Roles', 'allRoles')->name('allRoles');
//         Route::get('/add/Roles', 'addRoles')->name('addRoles');
//         Route::post('/store/Roles', 'storeRoles')->name('storeRoles');
//         Route::get('/edit/Roles/{id}', 'edit_roles')->name('edit_roles');
//         Route::Post('/update/Roles', 'updateRoles')->name('updateRoles');
//         Route::get('/delete/Roles/{id}', 'delete_roles')->name('delete_roles');


//         ///add role to permissions
//         Route::get('/Roles/permission', 'addRoleToPermission')->name('role_permission');
//         Route::post('/store/Roles/Permissions', 'storeRolesinPermission')->name('storeRolesinPermission');
//         Route::get('/all/Roles/permission', 'allRolesInPermissions')->name('allRolesInPermissions');
//         Route::get('/edit/Roles/permission/{id}', 'admin_edit_roles')->name('admin_edit_roles');
//         Route::post('/update/Roles/permission/{id}', 'updateRolesinPermission')->name('updateRolesinPermission');
//         Route::get('/delete/Roles/permission/{id}', 'deleteRolesinPermission')->name('deleteRolesinPermission');
//     });


//     //admin controller
//     Route::controller(AdminController::class)->group(function () {
//         Route::get('/all/admin', 'allAdmin')->name('allAdmin');
//         Route::get('/add/admin', 'addAdmin')->name('addAdmin');
//         Route::post('/store/admin', 'storeAdmin')->name('storeAdmin');
//         Route::get('/edit/admin/{id}', 'edit_admin')->name('edit_admin');
//         Route::post('/update/admin/{id}', 'updateAdmin')->name('updateAdmin');
//         Route::get('/delete/admin/{id}', 'deleteAdmin')->name('deleteAdmin');
//     });
// });
