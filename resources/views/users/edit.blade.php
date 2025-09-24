@extends('layouts.app')
@section('title', __('Edit User'))
@section('content')
<div class="bg-white dark:bg-slate-800 p-6 rounded shadow">
  <h2 class="text-xl font-semibold mb-4">{{ __('Edit User') }}</h2>
  <form method="POST" action="{{ route('users.update', $user) }}" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
      <label class="block text-sm">{{ __('Name') }}</label>
      <input name="name" value="{{ old('name', $user->name) }}" class="w-full mt-1 p-2 border rounded" required>
      @error('name') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    <div>
      <label class="block text-sm">{{ __('Email') }}</label>
      <input name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full mt-1 p-2 border rounded" required>
      @error('email') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    <div>
      <label class="block text-sm">{{ __('Password') }} <span class="text-xs text-slate-500">({{ __('leave blank to keep current') }})</span></label>
      <input name="password" type="password" class="w-full mt-1 p-2 border rounded">
      @error('password') <div class="text-red-600 text-sm">{{ $message }}</div> @enderror
    </div>
    <div class="flex gap-2">
      <button class="bg-blue-600 text-white px-4 py-2 rounded">{{ __('Update') }}</button>
      <a href="{{ route('users.index') }}" class="px-4 py-2 border rounded">{{ __('Cancel') }}</a>
    </div>
  </form>
</div>
@endsection
