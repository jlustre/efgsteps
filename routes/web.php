<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\ChecklistController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\backend\StepController;

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

require __DIR__.'/auth.php';

//Admin Group Middleware
Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    // Route::get('admin/add/step/fap', [AdminController::class, 'AdminAddStepFap'])->name('admin.add.step.fap');
    // Route::post('admin/step/store/fap', [AdminController::class, 'AdminStepStoreFap'])->name('admin.step.store.fap');
    // Route::get('admin/edit/step/{id}', [AdminController::class, 'AdminEditStep'])->name('admin.edit.step');
    // Route::post('admin/update/step/{id}', [AdminController::class, 'AdminUpdateStep'])->name('admin.update.step');
    // Route::get('admin/delete/step/{id}', [AdminController::class, 'AdminDeleteStep'])->name('admin.delete.step');


}); //end Group Admin Middleware

//Trainer Group Middleware
Route::middleware(['auth', 'role:trainer'])->group(function(){
    Route::get('cft/dashboard', [TrainerController::class, 'TrainerDashboard'])->name('trainer.dashboard');
}); //end Group Trainer Middleware

// Route::controller(ChecklistController::class)->group(function(){
//     Route::get('admin/checklist/fap',  'AdminChecklistfap')->name('admin.checklist.fap');
//     Route::get('admin/checklist/cft',  'AdminChecklistCft')->name('admin.checklist.cft');
// });

//Admin Users
Route::controller(AdminController::class)->group(function(){
    Route::get('all/admin',  'AllAdmin')->name('all.admin');
    Route::get('add/admin',  'AddAdmin')->name('add.admin');
    Route::get('edit/admin/{id}',  'EditAdmin')->name('edit.admin');
    Route::post('update/admin/{id}',  'UpdateAdmin')->name('update.admin');
    Route::get('delete/admin/{id}',  'DeleteAdmin')->name('delete.admin');
    Route::post('store/admin',  'StoreAdmin')->name('store.admin');
});

//Roles and Permissions
Route::controller(RoleController::class)->group(function(){
    //Permissions
    Route::get('/all/permission',  'AllPermission')->name('all.permissions');
    Route::get('/add/permission',  'AddPermission')->name('add.permission');
    Route::post('/store/permission',  'StorePermission')->name('store.permission');
    Route::get('/edit/permission/{id}',  'EditPermission')->name('edit.permission');
    Route::post('/update/permission/{id}',  'UpdatePermission')->name('update.permission');
    Route::get('/delete/permission/{id}',  'DeletePermission')->name('delete.permission');
    Route::get('/import/permission',  'ImportPermission')->name('import.permission');
    Route::get('/export',  'Export')->name('export');
    Route::post('/import',  'Import')->name('import');

    //Roles
    Route::get('/all/role',  'AllRole')->name('all.roles');
    Route::get('/add/role',  'AddRole')->name('add.role');
    Route::post('/store/role',  'Storerole')->name('store.role');
    Route::get('/edit/role/{id}',  'EditRole')->name('edit.role');
    Route::post('/update/role/{id}',  'UpdateRole')->name('update.role');
    Route::get('/delete/role/{id}',  'DeleteRole')->name('delete.role');

    //Roles Permission
    Route::get('/add/roles/permission',  'AddRolesPermission')->name('add.roles.permission');
    Route::post('/role/permission/store',  'RolePermissionStore')->name('role.permission.store');
    Route::get('/all/roles/permission',  'AllRolesPermission')->name('all.roles.permission');
    Route::get('/admin/edit/roles/{id}',  'AdminEditRoles')->name('admin.edit.roles');
    Route::post('/admin/roles/update/{id}',  'AdminRolesUpdate')->name('admin.roles.update');
    Route::get('/admin/delete/roles/{id}',  'AdminDeleteRoles')->name('admin.delete.roles');
});

//Steps
Route::controller(StepController::class)->group(function(){
    //Steps
    Route::get('/all/step/fap/{country}',  'AllStepFAP')->name('all.steps.fap');
    Route::get('/add/step/fap/{country}',  'AddStepFAP')->name('add.step.fap');
    Route::post('/store/step/fap',  'StoreStepFAP')->name('store.step.fap');
    Route::get('/edit/step/fap/{id}',  'EditStepFAP')->name('edit.step.fap');
    Route::post('/update/step/fap/{id}',  'UpdateStepFAP')->name('update.step.fap');
    Route::get('/delete/step/fap/{id}',  'DeleteStepFAP')->name('delete.step.fap');

});

Route::get('admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login');