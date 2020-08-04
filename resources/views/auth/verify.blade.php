@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('auth.very_email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ trans('auth.very_notify') }}
                        </div>
                    @endif

                    {{ trans('auth.check_email') }}
                    {{ trans('auth.not_receive_email') }}, <a href="{{ route('verification.resend') }}">{{ trans('auth.another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
