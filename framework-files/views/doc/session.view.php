@extends('templates/doc-template.view.php')


@section('content')
<h1>Session</h1>

<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;?php</span>
<span>use Security\Bcrypt;</span>
<span></span>
<span>/* storing data */</span>
<span>Session::put('key', 'value');</span>
<span></span>
<span>/* retrieving some data */</span>
<span>Session::put('key');</span>
<span></span>
<span>/* deleting session */</span>
<span>Session::forget('key');</span>
<span></span>
<span>/* get all sessions */</span>
<span>Session::all();</span>
</pre>

@endsection