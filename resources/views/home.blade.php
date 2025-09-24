@extends('layouts.app')

@section('title', __('Welcome to the App'))

@section('content')
<section class="bg-gradient-to-br from-indigo-600 to-indigo-500 text-white rounded-lg p-8 md:p-12 shadow-lg overflow-hidden relative">
  <div class="max-w-3xl">
    <h1 class="text-3xl md:text-5xl font-extrabold leading-tight">{{ __('Welcome to the App') }}</h1>
    <p class="mt-4 text-lg opacity-90">{{ __('Manage your users, switch language, and toggle dark mode.') }}</p>
    <div class="mt-6">
      <a href="{{ route('users.index') }}" class="inline-block bg-white/20 hover:bg-white/30 text-white px-6 py-3 rounded-lg shadow transition transform hover:-translate-y-0.5">
        {{ __('Get Started') }}
      </a>
    </div>
  </div>

  <div class="absolute -right-12 -top-12 w-64 h-64 rounded-full opacity-20 blur-3xl bg-white"></div>
</section>
@endsection
