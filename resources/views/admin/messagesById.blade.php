<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Détails du message') }}
            </h2>
            <button id="btnMarkAsRead" onclick="event.preventDefault(); markAsUnread({{ $message->id }});"
                class="inline-block bg-gray-500 hover:bg-opacity-80 transition text-white px-4 py-2 rounded">
            </button>
        </div>
    </x-slot>
    @section('contentAdmin')
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded p-6 space-y-4">
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Nom</h3>
                <p class="text-gray-800">{{ $message->name }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Email</h3>
                <p class="text-gray-800">{{ $message->email }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Sujet</h3>
                <p class="text-gray-800">{{ $message->subject }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Message</h3>
                <p class="text-gray-800 whitespace-pre-line select-text">{{ $message->message }}</p>
            </div>
            <div>
                <h3 class="text-gray-600 text-sm font-semibold">Créé le</h3>
                <p class="text-gray-800">{{ $message->created_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>
    @endsection
</x-app-layout>

<script>
    const btnMarkAsRead = document.getElementById('btnMarkAsRead');

    if ({{ $message->is_read ? 'true' : 'false' }}) {
        btnMarkAsRead.classList.remove('bg-gray-500');
        btnMarkAsRead.classList.add('bg-gray-500/80');
        btnMarkAsRead.innerText = 'Marquer comme non-lu';
    } else {
        btnMarkAsRead.classList.remove('bg-gray-500/80');
        btnMarkAsRead.classList.add('bg-gray-500');
        btnMarkAsRead.innerText = 'Marquer comme lu';
    }

    function markAsUnread(id) {
        const isRead = {{ $message->is_read ? 'true' : 'false' }};
        const newState = isRead ? 0 : 1;

        fetch(`/admin/messages/${id}/visibility`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                is_read: newState
            })
        }).then(() => location.reload());
    }
</script>
