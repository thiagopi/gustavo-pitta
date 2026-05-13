@extends('templates/doc-template.view.php')


@section('content')
<h1>Mail</h1>

<p>
    A classe Mail, nos permitirá enviar e-mails através da famosa classe PHPMailer. Abaixo veremos o código dela em ação:
</p>

<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;?php</span>
<span>use Mail\Mail;</span>
<span></span>
<span>$mail = new Mail();</span>
<span>$data = array();</span>
<span>$data['name'] = "Thiago Pereira";</span>
<span>$data['email'] = "thiago.pereira@vee.digital";</span>
<span>$enviar = $mail</span>
<span>      ->subject('Boas vindas incentivo')</span>
<span>      ->to(['thiago.pereira@vee.digital'])</span>
<span>      ->bcc(['thiagopi@yahoo.com.br', 'thiagopi@hotmail.com'])</span>
<span>      ->fromName('VEE Digital')</span>
<span>      ->view('email/welcome-incentive', $data)</span>
<span>      ->sendMail();</span>

</pre>

@endsection