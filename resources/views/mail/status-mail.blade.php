@component('mail::message')
# Introduction

Hi {{ $payment->cart->user->name }} 👋

@if ($payment->status === 'pending')
The payment operation was completed successfully,<br>
@endif

Your purchase status has changed to {{ $payment->status }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
