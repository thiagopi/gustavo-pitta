@extends('templates/main-template.view.php')

@push('styles')
<!-- <link rel="stylesheet" href="<?=assets('css/sdsdsdsdsdsd.css')?>?ver=<?=date("YmdHis")?>"> -->
@endpush

@section('content')

<section id="cover" class="content-out">
	<div class="content-in">
		<div class="text">
			<h1>Gustavo Pitta</h1>
			<p>
				Fotógrafo paulistano, nascido em 1983.<br/><br/>
				Jornalista formado pela PUC-SP, trabalhou como repórter antes de iniciar a carreira na fotografia. Ainda na faculdade de apaixonou pelas imagens.<br/><br/>
				Fez pós-graduação em Fotografia pelo Senac-SP, quando começou a fotografar profissionalmente.<br/><br/>
				Atua como fotógrafo de still, gastronomia, retratos e lifestyle há 15 anos.<br/><br/>
				Tem no portfólio editoriais para Editora Globo (Revista Casa e Jardim), Editora Abril (Men's Health, Women's Health, VIP, SuperInteressante, Mundo Estranho), Editora Três (Revista Status) e MAM-SP (Museu de Arte Moderna de São Paulo).<br/><br/>
				É especializado em fotografia de gastronomia para a publicidade e tem na carteira clientes como Águas Prata, Kitano, Dr. Oetker, SkyyVodca e JungleGin.<br/><br/>
				Entre os clientes corporativos, Gustavo fotografa retratos para a Band TV, Grupo Herval, Basf, Suvinil.
			</p>
		</div>
	</div>
</section>

<section id="clients-wrapper" class="content-out">
	<div class="content-in">
		@foreach($arr as $client)
		<div class="client">
			<img src="{{ assets('/') }}images/clients/{{ $client['s_file'] }}" alt="" />
			<h3>{{ $client['s_text1'] }}</h3>
			<p>{{ $client['s_text2'] ? $client['s_text2'] : "&nbsp;" }}</p>
		</div>
		@endforeach
		
	</div>
</section>

@endsection



@push('scripts')
<script type="text/javascript" src="{{ assets('js/home.js?v=') }}{{date('YmdHis')}}"></script>
@endpush