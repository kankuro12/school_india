<?php

use App\Http\Controllers\Admin\AcademicYearController;
use App\Http\Controllers\Admin\AssessmentController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\ExamSubjectController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\StudentAttendanceController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SliderController;
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
//     foreach (\App\Data::assesments as $key => $assement) {
//         # code...
//     }
// })->name('welcome');

Route::get('',[HomeController::class,'index'])->name('home');
Route::get('image',[HomeController::class,'image'])->name('image');
Route::get('page/@{type}',[HomeController::class,'pageType'])->name('page.type');
Route::get('page/{id}',[HomeController::class,'page'])->name('page');

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware('guest')->group(function(){
        route::match(['GET','POST'],'login',[AuthController::class,'login'])->name('login');
    });
    Route::middleware(['auth'])->group(function () {
        
        Route::prefix('dashboard')->name('dashboard.')->group(function(){
            Route::match(['GET','POST'],'',[DashboardController::class,'index'])->name('index');
        });
        route::match(['GET','POST'],'email',[AuthController::class,'email'])->name('email');
        Route::prefix('student')->name('student.')->group(function(){
            Route::match(['get', 'post'], 'add',[StudentController::class,'add'])->name('add');
            Route::match(['get', 'post'], 'update',[StudentController::class,'update'])->name('update');
            Route::match(['get', 'post'], '',[StudentController::class,'index'])->name('index');
            Route::prefix('attendance')->name('attendance.')->group(function(){
                Route::match(['get', 'post'], 'add',[StudentAttendanceController::class,'add'])->name('add');
                Route::match(['get', 'post'], 'update',[StudentAttendanceController::class,'update'])->name('update');
                Route::match(['get', 'post'], '',[StudentAttendanceController::class,'index'])->name('index');
            });
        });
    
        Route::prefix('page')->name('page.')->group(function(){
            Route::get('@{type}',[PageController::class,'index'])->name('index');
            Route::match(['get', 'post'],'add/@{type}',[PageController::class,'add'])->name('add');
            Route::match(['get', 'post'],'edit/{page}',[PageController::class,'edit'])->name('edit');
            Route::match(['get', 'post'],'del/{page}',[PageController::class,'del'])->name('del');
            Route::match(['get', 'post'],'delDoc',[PageController::class,'delDoc'])->name('delDoc');
        });
        Route::prefix('setting')->name('setting.')->group(function(){
            Route::match(['GET','POST'],'@{type}',[AdminSettingController::class,'index'])->name('index');
            
            Route::prefix('slider')->name('slider.')->group(function(){
                Route::get('',[SliderController::class,'index'])->name('index');
                Route::match(['get', 'post'],'add',[SliderController::class,'add'])->name('add');
                Route::match(['get', 'post'],'edit/{slider}',[SliderController::class,'edit'])->name('edit');
                Route::match(['get', 'post'],'del/{slider}',[SliderController::class,'del'])->name('del');
            });

            Route::prefix('footer')->name('footer.')->group(function(){
                Route::match(['GET','POST'],'',[FooterController::class,'index'])->name('index');
              
            });
        });

        Route::prefix('menu')->name('menu.')->group(function(){
            Route::get('',[MenuController::class,'index'])->name('index');
            Route::match(['get', 'post'],'add/',[MenuController::class,'add'])->name('add');
            Route::match(['get', 'post'],'edit',[MenuController::class,'edit'])->name('edit');
            Route::match(['get', 'post'],'del',[MenuController::class,'del'])->name('del');
        });
    
    
        Route::prefix('assessment')->name('assessment.')->group(function(){
            Route::match(['get', 'post'], 'add',[AssessmentController::class,'add'])->name('add');
            Route::match(['get', 'post'], 'addPoint',[AssessmentController::class,'addPoint'])->name('addPoint');
            Route::match(['get', 'post'], 'del',[AssessmentController::class,'del'])->name('del');
            Route::match(['get', 'post'], 'update',[AssessmentController::class,'update'])->name('update');
            Route::match(['get', 'post'], '',[AssessmentController::class,'index'])->name('index');
            Route::match(['get', 'post'], 'manage',[AssessmentController::class,'manage'])->name('manage');
        });
    
    
    
    
    
        Route::prefix('exam')->name('exam.')->group(function(){
            Route::match(['get', 'post'], 'add',[ExamController::class,'add'])->name('add');
            Route::match(['get', 'post'], 'update/{exam}',[ExamController::class,'update'])->name('update');
            Route::post('delete',[ExamController::class,'delete'])->name('delete');
            Route::match(['get', 'post'], 'info/{id}',[ExamController::class,'info'])->name('info');
            Route::match(['get', 'post'], '',[ExamController::class,'index'])->name('index');
            Route::prefix('subject')->name('subject.')->group(function(){
                Route::match(['get', 'post'], 'add/{exam}',[ExamSubjectController::class,'add'])->name('add');
                Route::match(['get', 'post'], 'update/{exam}',[ExamSubjectController::class,'update'])->name('update');
                Route::post('delete',[ExamSubjectController::class,'delete'])->name('delete');
                // Route::match(['get', 'post'], 'info/{info}',[ExamSubjectController::class,'info'])->name('info');
                Route::match(['get', 'post'], 'mark/{subject}',[ExamSubjectController::class,'mark'])->name('mark');
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
});
