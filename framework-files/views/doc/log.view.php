@extends('templates/doc-template.view.php')


@section('content')
<h1>Log</h1>

<ul class="summary">
    <li><a href="#introduction">Introdução</a></li>
    <li><a href="#writing-log-messages">Escrevendo as mensagens de log</a></li>
</ul>

<div id="introduction"></div>
<h2>Introdução</h2>

<p>
    A classe Log irá nos permitir adicionar strings em arquivos textos para podermos acompanhar algum erro ou algo do tipo. Estes arquivos possuem o nome com a data atual no formato yyyy-mm-dd a extensão .log. Eles ficam armazenados na pasta framework-files/logs.
</p>

<div id="writing-log-messages"></div>
<h2>Escrevendo as mensagens de log</h2>

<p>
    Você pode enviar informações em diferentes níveis. Atualmente têm: <strong>info, warning, debug e error</strong>. E para escrever a mensagem de logo, basta fazer o seguinte:
</p>

<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;?php</span>
<span>use Log\Log;</span>
<span></span>
<span>Log::info($message);</span>
<span>Log::warning($message);</span>
<span>Log::debug($message);</span>
<span>Log::debug($error);</span>
</pre>

@endsection