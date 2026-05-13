@extends('templates/main-template.view.php')

@push('styles')
<link rel="stylesheet" href="<?=assets('css/making-of.min.css')?>?ver=<?=date("YmdHis")?>">
@endpush

@section('content')

<section id="cover" class="content-out internal making-of">
	<div class="content-in">
        <h1>Making of</h1>
	</div>
</section>

<section class="content-out menu-categories">
    <a href="{{ base_url() }}gastronomia" class="btn btn-white btn-outline rounded">Gastronomia</a>
    <a href="{{ base_url() }}joias" class="btn btn-white btn-outline rounded">Joias</a>
    <a href="{{ base_url() }}still" class="btn btn-white btn-outline rounded">Still</a>
    <a href="{{ base_url() }}retratos" class="btn btn-white btn-outline rounded">Retratos</a>
    <a href="{{ base_url() }}moda-beleza" class="btn btn-white btn-outline rounded">Beauty</a>
    <a href="{{ base_url() }}ambiente-e-decoracao" class="btn btn-white btn-outline rounded">Ambiente e Decoração</a>
    <div class="btn btn-blue rounded">Making of</a>
</section>

<section id="making-of" class="content-out category">
    <div class="content-in">
        <div class="wrapper">
            <div class="video">
                <video width="320" height="240" poster="{{ assets('videos/making-of-grand-cru.jpg') }}" controls>
                    <source src="{{ assets('videos/making-of-grand-cru.m4v?v=') }}{{date('YmdHis')}}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <h3>
                    Making of - Cliente Grand Cru<br/>
                    Fotografia Gustavo Pitta<br/>
                    Vídeo Korvo
                </h3>
            </div>

            <div class="video">
                <video width="320" height="240" poster="{{ assets('videos/making-of-renata-fan.jpg') }}" controls>
                    <source src="{{ assets('videos/making-of-renata-fan.m4v?v=') }}{{date('YmdHis')}}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <h3>
                    Making of - Cliente HS Consórcios/Grupo Herval<br/>
                    Fotografia Gustavo Pitta<br/>
                    Modelo Renata Fan<br/>
                    Vídeo Korvo
                </h3>
            </div>

            <div class="video">
                <video width="320" height="240" poster="{{ assets('videos/making-of-skintec.jpg') }}" controls>
                    <source src="{{ assets('videos/making-of-skintec.m4v?v=') }}{{date('YmdHis')}}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <h3>
                    Making of - Cliente Skintec<br/>
                    Fotografia Gustavo Pitta<br/>
                    Vídeo Korvo
                </h3>
            </div>

            <div class="video">
                <video width="320" height="240" poster="{{ assets('videos/making-of-band.jpg') }}" controls>
                    <source src="{{ assets('videos/making-of-band.m4v?v=') }}{{date('YmdHis')}}" type="video/mp4" />
                    Your browser does not support the video tag.
                </video>
                <h3>
                    Making of - Cliente Band TV<br/>
                    Fotografia Gustavo Pitta<br/>
                    Vídeo Korvo
                </h3>
            </dv>
        </div>
        
        
    </div>
</section>

@endsection



@push('scripts')
<script type="text/javascript" src="{{ assets('js/portfolio.js?v=') }}{{date('YmdHis')}}"></script>
@endpush