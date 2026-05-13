@extends('templates/doc-template.view.php')


@section('content')


<h1>Controller</h1>

<ul class="summary">
    <li><a href="#introduction">Introdução</a></li>
    <li>
        <a href="#basic-controlers">O Básico de Controlers</a>
        <ul>
            <li><a href="#defining-controllers">Definindo Controlers</a></li>
            <li><a href="#controllers-and-namespaces">Controllers & Namespaces</a></li>
        </ul>
    </li>
    <li><a href="#controller-middleware">Controller Middleware</a></li>
</ul>

<div id="introduction"></div>
<h2>Introdução</h2>

<p>
    Os controladores servirão para você colocar toda a lógica de manipulação de solicitações. Os controladores são armazenados no diretório app/Controllers.
</p>

<!-- =====================================================
                    basic-controlers
====================================================== -->
<div id="basic-controlers"></div>
<h2>O Básico de Controllers</h2>

<!-- =====================================================
                    defining-controllers
====================================================== -->
<div id="defining-controllers"></div>
<h3>Definindo Controllers</h3>

<p>No exemplo abaixo você verá o básico de uma classe Controller</p>

<pre>
<span>&#60;?php</span>
<span>namespace App\Controllers\Doc;</span>
<span>use App\Controllers\Controller;</span>
<span>use Blade\BladeOne;</span>
<span>class HomeController extends Controller{</span>
<span>  public static function viewhome(){</span>
<span>      $blade = new BladeOne();</span>
<span>      return $blade->run('home');</span>
<span>  }</span>
<span>}</span>
</pre>

<p>E você pode definir uma rota para este controlador da seguinte forma:</p>

<pre>
<span>&#60;?php</span>
<span>$router = new Router();</span>
<span>$router->get('/home', function() { HomeController::viewhome(); });</span>
</pre>


<!-- =====================================================
                controllers-and-namespaces
====================================================== -->
<div id="controllers-and-namespaces"></div>
<h3>Controllers & Namespaces</h3>
<p>
    Para usarmos os controladores nas rotas, temos duas opções: A primeira importando a classe:
</p>
<pre>
<span>&#60;?php</span>
<span>use App\Controllers\HomeController;</span>
<span>$router = new Router();</span>
<span>$router->get('/home', function() { HomeController::viewhome(); });</span>
</pre>

<p>
    E o segundo modo é colocar o namespace junto com o nome da classe do controlador:
</p>
<pre>
<span>&#60;?php</span>
<span>$router = new Router();</span>
<span>$router->get('/home', function() { App\Controllers\HomeController::viewhome(); });</span>
</pre>


<!-- =====================================================
                controller-middleware
====================================================== -->
<div id="controller-middleware"></div>
<h2>Controller Middleware</h2>
<p>Com os Middlewares podemos fazer uma verificação por exemplo, se o usuário está logado no sistema, e então decidirmos se ele poderá acessar a rota informada ou não. Ela terá o papel de um filtro para a rota acessada executando alguma ação quando for feita a sua requisição. As Middlewares poderão ser passadas através de um array, ou se for apenas uma, como uma simples string.</p>

<pre>
<span>&#60;?php</span>
<span>$router = new Router();</span>
<span>$router->get('/home', function() { App\Controllers\HomeController::viewhome(); }, 'nomeMiddleware');</span>
<span>$router->get('/post', function() { App\Controllers\PostController::viewPost(); }, ['nomeMiddleware1', 'nomeMiddleware2']);</span>
</pre>

@endsection