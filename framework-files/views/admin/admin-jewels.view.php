@extends('templates/admin-template.view.php')

@push('styles')
<!-- <link rel="stylesheet" href="<?=assets('css/sdsdsdsdsdsd.css')?>?ver=<?=date("YmdHis")?>"> -->
@endpush

@section('content')

<section class="content-out menu-categories">
    <a href="{{ base_url() }}admin/gastronomia" class="btn btn-white btn-outline rounded">Gastronomia</a>
    <div class="btn btn-blue rounded">Joias</div>
    <a href="{{ base_url() }}admin/still" class="btn btn-white btn-outline rounded">Still</a>
    <a href="{{ base_url() }}admin/retratos" class="btn btn-white btn-outline rounded">Retratos</a>
    <a href="{{ base_url() }}admin/moda" class="btn btn-white btn-outline rounded">Moda</a>
    <a href="{{ base_url() }}admin/ambiente-e-decoracao" class="btn btn-white btn-outline rounded">Ambiente e Decoração</a>
    <a href="{{ base_url() }}admin/upload" class="btn btn-white btn-outline rounded">Upload</a>
</section>

<section id="jewels" class="content-out admin">
    <div class="content-in main">
            <form name="formPortfolioEdit" class="wrapper">
                <table class="tbl-pictures">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Texto</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody class="sortable">
                        @foreach($arr as $key=>$value)
                        <tr class="single-wrapper" data-position="{{ $key }}">
                            <td>
                                <figure><img src="{{ assets('images/portfolio/joias/'.$value['s_file']) }}" alt="{{ $value['s_text1'] }}" draggable="false" /></figure>
                            </td>
                            <td>
                                <input type="hidden" name="id{{ $value['id_picture'] }}" class="id" value="{{ $value['id_picture'] }}" data-prop="id" />
                                <input type="text" name="text{{ $key }}" value="{{ $value['s_text1'] }}" class="text" data-prop="text" />
                                <input type="hidden" name="position{{ $key }}" class="position" value="{{ $key }}" data-prop="position" />
                            </td>
                            <td onclick="removePicture(this, {{ $value['id_picture'] }});"><img src="{{ assets('images/icons/icon-error.svg')}}" alt="Remover" draggable="false" class="remove" /></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="btn-group">
                    <div class="btn btn-blue rounded btn-save">Salvar</div>
                </div>
            </form>
    </div>
</section>

@endsection


@push('scripts')
<script type="text/javascript" src="{{ assets('js/Sortable.js?v=') }}{{date('YmdHis')}}"></script>
<script type="text/javascript" src="{{ assets('js/admin/admin-portfolio.js?v=') }}{{date('YmdHis')}}"></script>
@endpush