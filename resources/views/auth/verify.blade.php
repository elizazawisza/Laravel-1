@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Potwierdź swój adres email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nowy link weryfikacyjny został wysłany na Twojego maila') }}
                        </div>
                    @endif

                    {{ __('Sprawdź pocztę w celu potwierdzenia adresu email.') }}
                    {{ __('Jeżeli nie dostałeś maila') }}, <a href="{{ route('verification.resend') }}">{{ __('kliknij, by ponownie przesłać') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
