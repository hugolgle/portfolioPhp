<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestion des messages') }}
            </h2>
        </div>
    </x-slot>
    @section('contentAdmin')
        <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Nom</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Email</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Sujet</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Message</th>
                    <th class="px-4 py-3 text-left text-sm font-medium text-gray-600">Créé le</th>
                    <th class="px-4 py-3 text-center text-sm font-medium text-gray-600"></th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach ($messages as $message)
                    <tr class="relative hover:bg-gray-50 group">
                        @if (!$message->is_read)
                            <td class="py-2 px-4 text-center relative">
                                <span
                                    class="absolute left-4 top-1/2 -translate-y-1/2 size-2 bg-red-500 rounded-full {{ !$message->is_read ? 'font-bold' : '' }}"></span>
                                {{ $message->name }}
                            </td>
                        @else
                            <td
                                class="px-4 py-3 align-middle text-sm text-gray-700 {{ !$message->is_read ? 'font-bold' : '' }}">
                                {{ $message->name }}</td>
                        @endif
                        <td
                            class="px-4 py-3 align-middle text-sm text-gray-700 {{ !$message->is_read ? 'font-bold' : '' }}">
                            {{ $message->email }}</td>
                        <td
                            class="px-4 py-3 align-middle text-sm text-gray-700 {{ !$message->is_read ? 'font-bold' : '' }}">
                            {{ $message->subject }}</td>
                        <td
                            class="py-2 px-4 text-justify text-sm max-w-60 truncate {{ !$message->is_read ? 'font-bold' : '' }}">
                            {{ $message->message }}</td>
                        <td
                            class="px-4 py-3 align-middle text-sm text-gray-700 {{ !$message->is_read ? 'font-bold' : '' }}">
                            {{ $message->created_at->format('d/m/Y H:i') }}</td>
                        <td class="px-4 py-3 align-middle text-center transition opacity-0 group-hover:opacity-100">
                            <div class="inline-flex items-center justify-center space-x-3">
                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST"
                                    class="inline" onsubmit="return confirm('Supprimer ce message ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500"><i data-lucide="trash2"
                                            class="inline-block size-4"></i></button>
                                </form>
                                <a href="{{ route('admin.messages.show', $message) }}"
                                    onclick="event.preventDefault(); markAsRead({{ $message->id }}); window.location.href=this.href;"
                                    class="inline text-blue-500">
                                    <i data-lucide="eye" class="inline-block size-4"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
    @endsection
</x-app-layout>

<script>
    function markAsRead(id) {
        fetch(`/admin/messages/${id}/visibility`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                is_read: 1
            })
        });
    }
</script>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
    lucide.createIcons();
</script>
