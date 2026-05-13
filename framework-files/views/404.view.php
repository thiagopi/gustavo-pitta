@extends('templates/main-template.view.php')

@push('styles')
<link rel="stylesheet" href="<?=assets('css/forbidden.css')?>?ver=<?=date("YmdHis")?>">
@endpush

@section('content')
    
    <h1>404: Página não encontrada</h1>
    <!-- <figure class="full ghost"><img src="{{ assets('images/ghost.svg') }}" alt="" width="249" height="319"></figure> -->
    <p><a href="http://www.gustavopitta.com.br/">www.<span>gustavopitta</span>.digital</a></p>

@endsection