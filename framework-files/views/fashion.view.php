@extends('templates/main-template.view.php')

@push('styles')
<!-- <link rel="stylesheet" href="<?=assets('css/sdsdsdsdsdsd.css')?>?ver=<?=date("YmdHis")?>"> -->
@endpush

@section('content')

<section id="cover" class="content-out internal fashion">
	<div class="content-in">
        <h1>Beauty</h1>
	</div>
</section>

<section class="content-out menu-categories">
    <a href="{{ base_url() }}gastronomia" class="btn btn-white btn-outline rounded">Gastronomia</a>
    <a href="{{ base_url() }}joias" class="btn btn-white btn-outline rounded">Joias</a>
    <a href="{{ base_url() }}still" class="btn btn-white btn-outline rounded">Still</a>
    <a href="{{ base_url() }}retratos" class="btn btn-white btn-outline rounded">Retratos</a>
    <div class="btn btn-blue rounded">Beauty</div>
    <a href="{{ base_url() }}ambiente-e-decoracao" class="btn btn-white btn-outline rounded">Ambiente e Decoração</a>
    <a href="{{ base_url() }}making-of" class="btn btn-white btn-outline rounded">Making of</a>
</section>

<section id="fashion" class="content-out category">
    <div class="content-in">
        <div class="wrapper">
            @foreach($arr as $pic)
            <div class="cat">
                <img src="{{ assets('/') }}images/portfolio/moda/{{ $pic['s_file'] }}" alt="{{ $pic['s_text1'] }}" />
                @if($pic['s_text1'] !== "")
                <h3>{{ $pic['s_text1'] }}</h3>
                @endif
            </div>
            @endforeach
        </div>
        <div class="btn-group center">
            <div class="btn btn-blue rounded btn-loadMore" onClick="loadMore(5)">Carregar mais</div>
        </div>
        
    </div>
</section>

@endsection

@push('scripts')
<script type="text/javascript" src="{{ assets('js/portfolio.js?v=') }}{{date('YmdHis')}}"></script>
@endpush