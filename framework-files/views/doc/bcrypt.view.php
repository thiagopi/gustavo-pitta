@extends('templates/doc-template.view.php')


@section('content')
<h1>Bcrypt</h1>

<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;?php</span>
<span>use Security\Bcrypt;</span>
<span></span>
<span>/* create a password hash */</span>
<span>Bcrypt::hashPassword($password2);</span>
<span></span>
<span>/* check if password is valid */</span>
<span>Bcrypt::checkPassword($password, $hash);</span>
</pre>
@endsection