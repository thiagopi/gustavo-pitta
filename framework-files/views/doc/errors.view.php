@extends('templates/doc-template.view.php')


@section('content')
<h1>Errors</h1>

<h2>Tipos</h2>
<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&#123;"result":0,"type":1,"msg":"Faltando código CSRF."&#125;</span>
</pre>
<ul>
    <li>1- Faltando código CSRF.</li>
    <li>2- Campos não permitodos.</li>
    <li>3- Faltando campos.</li>
    <li>4- Login ou senha inválidos.</li>
    <li>5- Senha incorreta.</li>
    <li>6- Nome de usuário inválido.</li>
    <li>7- A senha não pôde ser atualizada. Problemas com a intenet.</li>
    <li>8- Sem registros na base de dados.</li>
    <li>9- Não foi possível consultar o saldo do cartão.</li>
    <li>10- Não foi possível alterar o status da transação.</li>
    <li>11- Erro ao atualizar o saldo.</li>
    <li>12- Erro ao inserir transação.</li>
    <li>13- Erro ao inserir crédito.</li>
    <li>14- Data de vencimento expirada.</li>
    <li>15- Erro ao inserir no banco de dados.</li>
    <li>16- Erro ao conectar-se ao banco de dados.</li>
    <li>99- Permissão negada</li>
</ul>



@endsection