@extends('layouts.app')
@section('title', __('Add User'))
@section('content')
<div class="bg-white dark:bg-slate-800 p-6 rounded shadow">
  <h2 class="text-xl font-semibold mb-4">{{ __('Add User') }}</h2>
  <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
    @csrf
    <div>
      <label class="block text-sm">{{ __('Name') }}</label>
      <input name="name" value="{{ old('name') }}" class="w-full mt-1 p-2 border rounded" required>
      @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    <div>
      <label class="block text-sm">{{ __('Email') }}</label>
      <input name="email" type="email" value="{{ old('email') }}" class="w-full mt-1 p-2 border rounded" required>
      @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    <div>
      <label class="block text-sm">{{ __('Password') }}</label>
      <input name="password" type="password" class="w-full mt-1 p-2 border rounded" required>
      @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    <div class="flex gap-2">
      <button class="bg-green-600 text-white px-4 py-2 rounded">{{ __('Save') }}</button>
      <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">{{ __('Cancel') }}</a>
    </div>
  </form>
</div>
@endsection
