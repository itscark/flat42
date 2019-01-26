@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bestätige deine Email-Adresse') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ein neuer Bestätigungslink wurde an Ihre E-Mail-Adresse gesendet.') }}
                        </div>
                    @endif

                    {{ __('Bevor Sie fortfahren, überprüfen Sie bitte Ihre E-Mail auf einen Bestätigungslink.') }}
                    {{ __('Wenn Sie die E-Mail nicht erhalten haben') }}, <a href="{{ route('verification.resend') }}">{{ __('klicken Sie hier, um eine neue anzufordern.') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
