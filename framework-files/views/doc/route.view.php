@extends('templates/doc-template.view.php')


@section('content')
<h1>Route</h1>


<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;?php</span>
<span>use Routers\Router;</span>
<span></span>
<span>$router = new Router();</span>
<span>$router->get('/post', function() { PostController::viewPost(); });</span>
<span>$router->get('/post2', function() { PostController::viewPost2(); }, 'Error404Middleware');</span>
<span>$router->get('/post3', function() { PostController::viewPost3(); }, ['Condition1Middleware', 'Condition2Middleware']);</span>
<span>$router->get('/doc', function() { </span>
<span>  $blade = new BladeOne();</span>
<span>  $blade->run('doc.blade');</span>
<span>});</span>
<span>$router->post('/test', function() { SomeController::testPost(); });</span>
<span>$router->run();</span>
</pre>



@endsection