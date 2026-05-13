@extends('templates/doc-template.view.php')


@section('content')


<h1>Blade</h1>

<ul class="summary">
    <li><a href="#introduction">Introdução</a></li>
    <li><a href="#template-inheritance">Template herdado</a></li>
    <li><a href="#displaying-data">Mostrando os dados</a></li>
</ul>


<div id="introduction"></div>
<h2>Introdução</h2>

<p>
    Baseado na classe Blade do Laravel, ela foi modificada para não precisar ter um monde de dependências, mas abrangendo os principais recursos que ela provê. Aqui, os arquivos views possuem a extensão .view.php e ficam armazenados na pasta framework-files/views.
</p>


<div id="template-inheritance"></div>
<h2>Template herdado</h2>

<h3>Definindo um layout</h3>

<p>
    Uns dos principais benefícios da Blade são o template herdado e as seções. Vamos ver um exemplo de um template master para o layout de uma  ou mais páginas.
</p>

<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;html&gt;</span>
<span>  &lt;head&gt;</span>
<span>      &lt;title&gt;App Name - &#64;yield('title')&lt;/title&gt;</span>
<span>  &lt;/head&gt;</span>
<span>  &lt;body&gt;</span>
<span>      &#64;section('sidebar')</span>
<span>      Aqui fica a barra lateral.</span>
<span>      &#64;endsection</span>
<span>      &lt;div class="wrapper"&gt;</span>
<span>          &#64;yield('content')</span>
<span>      &lt;/div&gt;</span>
<span>  &lt;/body&gt;</span>
<span>&lt;/html&gt;</span>
</pre>

<p>
    Como você pode ver, este exemplo possui a típica marcação HTML. No entanto, atente para as diretivas &#64;section e &#64;yield. A primeira (&#64;section) define a seção do conteúdo, enquanto que a segunda (&#64;yield) é usada para mostrar o conteúdo, que no caso seria uma &#64;section('content').
</p>

<h3>Extendendo um layout</h3>

<p>
    Quando definimos uma view filha, usamos a diretiva &#64;extends para extender um layout. Uma vez feito isso, o as seções do layout injetará o conteúdo usando a diretiva &#64;section.
</p>

<!-- DO NOT INDENT <pre>...</pre> -->                
<pre>
<span>&#64;extends('templates/main-template.view.php')</span>
<span>&#64;section('content')</span>
<span>  &lt;h1&gt;Hello world!&lt;/h1&gt;</span>
<span>  &lt;img src="images/world.svg"&gt;</span>
<span>  &lt;p&gt;www.vee.digital&lt;/p&gt;</span>
<span>&#64;endsection</span>
</pre>


<div id="displaying-data"></div>
<h2>Mostrando os dados</h2>
<p>
    Você deve mostrar os dados passados para a view encapsulando a variável entre colchetes ( [ ] ). Segue um exemplo através de uma rota:
</p>

<!-- DO NOT INDENT <pre>...</pre> -->  
<pre>
<span>&#36;route->get('/exemple', function () {</span>
<span>  return $blade->run('welcome', ['name' => 'Thiago']);</span>
<span>});</span>
</pre>

<p>
    E agora você pode mostrar o valor da variável na View da seguinte forma:
</p>

<!-- DO NOT INDENT <pre>...</pre> -->  
<pre>
<span>Hello, &#123;&#123; $name &#125;&#125;.</span>
</pre>



@endsection