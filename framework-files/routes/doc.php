<?php
use Routers\Router;
use Blade\BladeOne;
use App\Controllers\Doc\DocControllerController;
// use Classes\Request\Request;


/*
    Documentation
*/
// Router::get('/doc', function() { DocController::viewDocHome(); });
Router::get('/doc', function() { 
    $blade = new BladeOne();
    $blade->run('doc.home');
});
Router::get('/doc/blade', function() { 
    $blade = new BladeOne();
    $blade->run('doc.blade');
});
Router::get('/doc/controller', function() { 
    $blade = new BladeOne();
    $blade->run('doc.controller');
});
Router::get('/doc/errors', function() { 
    $blade = new BladeOne();
    $blade->run('doc.errors');
});
Router::get('/doc/functions', function() { 
    $blade = new BladeOne();
    $blade->run('doc.functions');
});
Router::get('/doc/log', function() { 
    $blade = new BladeOne();
    $blade->run('doc.log');
});
Router::get('/doc/mail', function() { 
    $blade = new BladeOne();
    $blade->run('doc.mail');
});
Router::get('/doc/request', function() { 
    $blade = new BladeOne();
    $blade->run('doc.request');
});
Router::get('/doc/route', function() { 
    $blade = new BladeOne();
    $blade->run('doc.route');
});
Router::get('/doc/bcrypt', function() { 
    $blade = new BladeOne();
    $blade->run('doc.bcrypt');
});
Router::get('/doc/session', function() { 
    $blade = new BladeOne();
    $blade->run('doc.session');
});
Router::get('/doc/tools', function() { 
    $blade = new BladeOne();
    $blade->run('doc.tools');
});

//
// Router::run();