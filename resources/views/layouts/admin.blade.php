<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin')</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex h-screen w-full">
  <header id="header" class="bg-zinc-50 h-full w-[15%] fixed z-10 border-r rounded-r-3xl">
    <div class="px-4 py-4 flex flex-col items-center justify-between h-full w-full">
      <div class="flex flex-col items-center">
        <a href="/admin" class="text-xl font-bold">Admin</a>
        <a href="/" class="font-normal">Site</a>
      </div>
      <nav class="flex flex-col mt-4 gap-y-1 w-full">
        <a href="{{ route('admin.admin') }}" class="hover:bg-zinc-200 transition rounded px-2 py-1 
          {{ request()->routeIs('admin.admin') ? 'bg-zinc-200' : '' }}">Dashboard</a>
        <a href="{{ route('admin.about') }}" class="hover:bg-zinc-200 transition rounded px-2 py-1 
          {{ request()->routeIs('admin.about') ? 'bg-zinc-200' : '' }}">À propos</a>
        <a href="{{ route('admin.skills') }}" class="hover:bg-zinc-200 transition rounded px-2 py-1 
          {{ request()->routeIs('admin.skills') ? 'bg-zinc-200' : '' }}">Compétences</a>
        <a href="{{ route('admin.project') }}" class="hover:bg-zinc-200 transition rounded px-2 py-1 
          {{ request()->routeIs('admin.project') ? 'bg-zinc-200' : '' }}">Projets</a>
      </nav>
      <a href="{{ route('admin.settings') }}" class="w-full hover:bg-zinc-200 transition rounded px-2 py-1 
          {{ request()->routeIs('admin.settings') ? 'bg-zinc-200' : '' }}">Paramètre</a>
    </div>
  </header>

  <main class="ml-auto w-[85%] h-full p-4">
    @yield('contentAdmin')
  </main>
</body>

</html>