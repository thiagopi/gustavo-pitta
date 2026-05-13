<?php
use Routers\Router;
use Blade\BladeOne;
use App\Controllers\HomeController;
use App\Controllers\GastronomyController;
use App\Controllers\JewelsController;
use App\Controllers\StillController;
use App\Controllers\PortraitController;
use App\Controllers\FashionController;
use App\Controllers\EnviormentController;
use App\Controllers\MakingOfController;
use App\Controllers\ClientsController;
use App\Controllers\Doc\DocController;
use App\Controllers\PostController;
use App\Controllers\SystemController;
use App\Controllers\WebServicesController;
use App\Controllers\PortfolioController;
use App\Controllers\Admin\AdminPortfolioController;
use App\Controllers\Admin\AdminGastronomyController;
use App\Controllers\Admin\AdminJewelsController;
use App\Controllers\Admin\AdminStillController;
use App\Controllers\Admin\AdminPortraitController;
use App\Controllers\Admin\AdminFashionController;
use App\Controllers\Admin\AdminEnviormentController;
use App\Controllers\Admin\AdminUploadController;

use App\Controllers\Admin\LoginController;
// use Classes\Request\Request;

Router::get('/', function() { HomeController::viewHome(); });
Router::get('/gastronomia', function() { GastronomyController::viewGastronomy(); });
Router::get('/joias', function() { JewelsController::viewJewels(); });
Router::get('/still', function() { StillController::viewStill(); });
Router::get('/retratos', function() { PortraitController::viewStill(); });
Router::get('/moda-beleza', function() { FashionController::viewFashion(); });
Router::get('/ambiente-e-decoracao', function() { EnviormentController::viewEnviorment(); });
Router::get('/making-of', function() { MakingOfController::viewMakingOf(); });
Router::get('/clientes', function() { ClientsController::viewClients(); });
Router::get('/doc', function() { DocController::viewDocHome(); });
Router::get('/403', function() { SystemController::view403(); });
Router::set404(function() { SystemController::view404(); });


/*
    Web services
*/
Router::post('/get-gastronomy-pictures', function() { GastronomyController::getPictures(); });
Router::post('/postContact', function() { WebServicesController::postContact(); });
Router::post('/postPortfolioLoadMore', function() { PortfolioController::postPortfolioLoadMore(); });
//



/*
    Admin
*/
Router::get('/admin', function() { AdminGastronomyController::viewAdminGastronomy(); }, ['LoginMiddleware']);
Router::get('/admin/login', function() { LoginController::viewLogin(); });
Router::get('/admin/gastronomia', function() { AdminGastronomyController::viewAdminGastronomy(); }, ['LoginMiddleware'], true);
Router::get('/admin/joias', function() { AdminJewelsController::viewAdminJewels(); }, ['LoginMiddleware']);
Router::get('/admin/still', function() { AdminStillController::viewAdminStill(); }, ['LoginMiddleware']);
Router::get('/admin/retratos', function() { AdminPortraitController::viewAdminPortrait(); }, ['LoginMiddleware']);
Router::get('/admin/moda', function() { AdminFashionController::viewAdminFashion(); }, ['LoginMiddleware']);
Router::get('/admin/ambiente-e-decoracao', function() { AdminEnviormentController::viewAdminEnviorment(); }, ['LoginMiddleware']);
Router::get('/admin/upload', function() { AdminUploadController::viewAdminUpload(); });

/*
    Admin Web services
*/
Router::post('/admin/postLogin', function() { LoginController::postLogin(); }, 'AuthorizedDomainMiddleware', true);
Router::post('/admin/postLogout', function() { LoginController::postLogout(); });
Router::post('/admin/postPortfolio', function() { AdminPortfolioController::postAdminPortfolio(); }, 'AuthorizedDomainMiddleware', true);
Router::post('/admin/postRemove', function() { AdminPortfolioController::postRemovePicture(); }, 'AuthorizedDomainMiddleware', true);
Router::post('/admin/postUpload', function() { AdminUploadController::postUpload(); });