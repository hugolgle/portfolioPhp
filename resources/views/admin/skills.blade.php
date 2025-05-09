<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __(key: 'Compétences') }}
    </h2>
  </x-slot>
  @section('contentAdmin')
  @endsection
</x-app-layout>