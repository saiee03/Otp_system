@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Verify OTP</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Enter the 6-digit OTP sent to your {{ $type === 'email' ? 'email' : 'phone' }}.</p>
                    <livewire:otp-input :type="$type" />
                </div>
            </div>
        </div>
    </div>
@endsection