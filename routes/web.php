<?php

use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamSubjectController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\SettingController;
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

// Route::get('/', function () {
//     $data=['Teacher'];
//     $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

//     file_put_contents(base_path('resources/lang/en.json'), stripslashes($newJsonString));
// })->name('welcome');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest')->group(function(){
        route::match(['GET','POST'],'login',[AuthController::class,'login'])->name('login');
    });
    route::match(['GET','POST'],'email',[AuthController::class,'email'])->name('email');
    Route::prefix('student')->name('student.')->group(function(){
        Route::match(['get', 'post'], 'add',[StudentController::class,'add'])->name('add');
        Route::match(['get', 'post'], 'update',[StudentController::class,'update'])->name('update');
        Route::match(['get', 'post'], '',[StudentController::class,'index'])->name('index');
    });

    Route::prefix('exam')->name('exam.')->group(function(){
        Route::match(['get', 'post'], 'add',[ExamController::class,'add'])->name('add');
        Route::match(['get', 'post'], 'update/{exam}',[ExamController::class,'update'])->name('update');
        Route::post('delete',[ExamController::class,'delete'])->name('delete');
        Route::match(['get', 'post'], 'info/{id}',[ExamController::class,'info'])->name('info');
        Route::match(['get', 'post'], '',[ExamController::class,'index'])->name('index');
        Route::prefix('subect')->name('subect.')->group(function(){
            Route::match(['get', 'post'], 'add/{exam}',[ExamSubjectController::class,'add'])->name('add');
            Route::match(['get', 'post'], 'update/{exam}',[ExamSubjectController::class,'update'])->name('update');
            Route::post('delete',[ExamSubjectController::class,'delete'])->name('delete');
            Route::match(['get', 'post'], 'info/{id}',[ExamSubjectController::class,'info'])->name('info');
            Route::match(['get', 'post'], 'setup/{exam}',[ExamSubjectController::class,'index'])->name('index');
        });
    });
    Route::prefix('setting')->name('setting.')->group(function(){
        Route::match(['GET','POST'],'caste',[SettingController::class,'caste'])->name('caste');
        Route::match(['GET','POST'],'category',[SettingController::class,'category'])->name('category');
        Route::match(['GET','POST'],'religion',[SettingController::class,'religion'])->name('religion');
        Route::match(['GET','POST'],'scheme',[SettingController::class,'scheme'])->name('scheme');
        Route::prefix('academicyear')->name('academicyear.')->group(function(){
            route::get('',[AcademicYearController::class,'index'])->name('index');
            route::post('add',[AcademicYearController::class,'add'])->name('add');
            route::post('update',[AcademicYearController::class,'update'])->name('update');
            route::post('delete',[AcademicYearController::class,'delete'])->name('delete');
        });

        Route::prefix('level')->name('level.')->group(function(){
            route::get('',[LevelController::class,'index'])->name('index');
            route::post('add',[LevelController::class,'add'])->name('add');
            route::post('update',[LevelController::class,'update'])->name('update');
            route::post('delete',[LevelController::class,'delete'])->name('delete');
            route::get('section/{level}',[LevelController::class,'section'])->name('section');
            route::post('sectionAdd',[LevelController::class,'sectionAdd'])->name('sectionAdd');
            route::post('sectionUpdate',[LevelController::class,'sectionUpdate'])->name('sectionUpdate');
            route::post('sectionDelete',[LevelController::class,'sectionDelete'])->name('sectionDelete');

        });

    });
    Route::prefix('employee')->name('employee.')->group(function(){
        route::get('',[EmployeeController::class,'index'])->name('index');
        route::match(['GET','POST'],'add',[EmployeeController::class,'add'])->name('add');
        route::match(['GET','POST'],'update/{employee}',[EmployeeController::class,'update'])->name('update');
        route::post('delete',[EmployeeController::class,'delete'])->name('delete');
    });
});
