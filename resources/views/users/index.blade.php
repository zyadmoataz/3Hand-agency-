@extends('layouts.app')

@section('title', __('Users'))

@section('content')
<div class="flex justify-between items-center mb-6">
  <h2 class="text-2xl font-semibold">{{ __('Users') }}</h2>
  <div class="flex gap-2">
    <a href="{{ route('users.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">{{ __('Add User') }}</a>
    <button id="bulkDeleteBtn" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">{{ __('Delete Selected') }}</button>
  </div>
</div>

<div class="overflow-x-auto bg-white dark:bg-slate-800 rounded shadow-sm border border-slate-200 dark:border-slate-700">
  <table id="usersTable" class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
    <thead class="bg-slate-50 dark:bg-slate-900">
      <tr>
        <th class="p-3 w-12 text-left"><input id="selectAll" type="checkbox" class="h-4 w-4"></th>
        <th class="p-3 text-left">{{ __('Name') }}</th>
        <th class="p-3 text-left">{{ __('Email') }}</th>
        <th class="p-3 text-left">{{ __('Actions') }}</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr data-id="{{ $user->id }}" class="border-t dark:border-slate-700">
        <td class="p-3"><input class="rowCheckbox h-4 w-4" type="checkbox" value="{{ $user->id }}"></td>
        <td class="p-3">{{ $user->name }}</td>
        <td class="p-3">{{ $user->email }}</td>
        <td class="p-3">
          <div class="flex gap-2">
            <a href="{{ route('users.edit',$user) }}" class="px-3 py-1 bg-yellow-400 rounded text-sm">{{ __('Edit') }}</a>
            <form action="{{ route('users.destroy',$user) }}" method="POST" onsubmit="return confirm('{{ __('Delete') }}?')">
              @csrf
              @method('DELETE')
              <button class="px-3 py-1 bg-red-600 text-white rounded text-sm">{{ __('Delete') }}</button>
            </form>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<!-- <p class="mt-4 text-sm text-slate-500">{{ __('Keyboard shortcuts: Alt+H Home, Alt+U Users, Ctrl+A Add') }}</p> -->
@endsection
