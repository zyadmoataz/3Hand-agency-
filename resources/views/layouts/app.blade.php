<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', config('app.name','My App'))</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 dark:bg-slate-900 text-slate-900 dark:text-slate-100">
  <div id="app" class="min-h-screen flex">
    <!-- Sidebar (desktop) -->
    <aside class="hidden md:flex md:flex-col w-64 bg-white dark:bg-slate-800 border-r dark:border-slate-700">
      <div class="p-4 border-b dark:border-slate-700">
        <a href="{{ route('home') }}" class="flex items-center gap-3">
          <div class="w-10 h-10 rounded-md bg-indigo-600 text-white flex items-center justify-center font-bold">A</div>
          <div>
            <div class="font-semibold">{{ config('app.name','AppName') }}</div>
            <div class="text-xs text-slate-500">Admin</div>
          </div>
        </a>
      </div>

      <nav class="p-4 space-y-1">
        <a href="{{ route('home') }}" class="block px-3 py-2 rounded hover:bg-slate-100 dark:hover:bg-slate-700">{{ __('Home') }}</a>
        <a href="{{ route('users.index') }}" class="block px-3 py-2 rounded hover:bg-slate-100 dark:hover:bg-slate-700">{{ __('Users') }}</a>
      </nav>

      <div class="mt-auto p-4 border-t dark:border-slate-700">
        <div class="flex items-center gap-2">
          <a href="{{ route('locale.switch','en') }}" class="px-2 py-1 rounded {{ app()->getLocale() === 'en' ? 'bg-slate-100 dark:bg-slate-700' : '' }}">EN</a>
          <a href="{{ route('locale.switch','ar') }}" class="px-2 py-1 rounded {{ app()->getLocale() === 'ar' ? 'bg-slate-100 dark:bg-slate-700' : '' }}">AR</a>
        </div>
      </div>
    </aside>

    <!-- Main -->
    <div class="flex-1 flex flex-col">
      <header class="w-full bg-white dark:bg-slate-800 border-b dark:border-slate-700">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-3 md:px-6">
          <div class="flex items-center gap-3">
            <button id="mobileMenuBtn" class="md:hidden p-2 rounded hover:bg-slate-100 dark:hover:bg-slate-700">☰</button>
            <a href="{{ route('home') }}" class="hidden md:inline text-lg font-bold">{{ config('app.name','AppName') }}</a>
          </div>

          <div class="flex items-center gap-3">
            <button id="themeToggle" aria-label="Toggle theme" class="px-3 py-1 border rounded">🌓</button>
          </div>
        </div>

        <!-- Mobile menu -->
        <div id="mobileMenu" class="md:hidden hidden bg-white dark:bg-slate-800 border-t">
          <div class="p-3">
            <a href="{{ route('home') }}" class="block px-2 py-2 rounded hover:bg-slate-100">{{ __('Home') }}</a>
            <a href="{{ route('users.index') }}" class="block px-2 py-2 rounded mt-1 hover:bg-slate-100">{{ __('Users') }}</a>

            <div class="mt-3 flex gap-2">
              <a href="{{ route('locale.switch','en') }}" class="px-2 py-1 rounded {{ app()->getLocale() === 'en' ? 'bg-slate-100' : '' }}">EN</a>
              <a href="{{ route('locale.switch','ar') }}" class="px-2 py-1 rounded {{ app()->getLocale() === 'ar' ? 'bg-slate-100' : '' }}">AR</a>
            </div>
          </div>
        </div>
      </header>

      <main class="p-4 md:p-8 max-w-7xl mx-auto w-full h-[90%]">
        @if(session('success'))
          <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
        @endif

        @yield('content')
      </main>

      <footer class="border-t dark:border-slate-700 bg-white dark:bg-slate-800 p-4 text-sm text-center h-[66px]">
        © {{ date('Y') }} {{ config('app.name') }}
      </footer>
    </div>
  </div>
</body>
</html>
