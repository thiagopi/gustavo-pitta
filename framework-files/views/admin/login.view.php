@extends('templates/admin-template.view.php')

@push('styles')
<!-- <link rel="stylesheet" href="<?=assets('css/sdsdsdsdsdsd.css')?>?ver=<?=date("YmdHis")?>"> -->
@endpush

@section('content')

<section id="login" class="content-out admin">
    <div class="content-in main">

        <form id="formLogin" name="formLogin">
            <div class="form-group">
                <input type="text" name="username" maxlength="15" placeholder="Username">
            </div>
            <div class="form-group">
                <input type="password" name="password" maxlength="15" placeholder="Password">
            </div>
            <div class="btn-group center">
                <div class="btn btn-blue rounded" onClick="validateForm();">Entrar</div>
            </div>
        </form>
        
    </div>
</section>

@endsection


@push('scripts')
<script type="text/javascript" src="{{ assets('js/admin/login.js?v=') }}{{date('YmdHis')}}"></script>
@endpush