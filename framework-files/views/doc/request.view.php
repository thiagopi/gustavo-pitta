@extends('templates/doc-template.view.php')


@section('content')
<h1>Request</h1>

<p>
    Nossa classe Request, irá nos permitir receber dados via post e get. Ela está preparada para receber post do modo tradicional e também de JSON via body
</p>

<!-- DO NOT INDENT <pre>...</pre> -->   
<pre>
<span>&lt;?php</span>
<span>use Request\Request;</span>
<span></span>
<span>$request = new Request();</span>
<span>$request->all();</span>
<span>$request->input('field_name');</span>
</pre>
@endsection