<div>
    @if ($users->count()>0)
    <div class="sm:flex sm:flex-col md:grid md:grid-cols-2 md:grid-rows-9 lg:grid-cols-3 lg:grid-rows-6 gap-5 mt-4">
        @foreach ($users as $user)
            <div class="mt-8">
                <div class="bg-white dark:bg-gray-900 rounded-t-lg p-3 text-left">
                    <p class="text-white font-bold text-xl">{{$user->name}}</p>
                    <p class="text-white text-sm">Email: {{$user->email}}</p>
                    <p class="text-white text-sm">Tipo de usuario: {{ $user->role == 0 ? 'Administrador' : 'Cliente'; }}</p>
                </div>
                <div class="flex w-full">
                    <button
                        wire:click="$emit('showAlertDelete',{{$user->id}})"
                        class="dark:text-white bg-red-800 rounded-b-lg p-3 hover:bg-red-600 hover:cursor-pointer flex justify-center w-full"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg> <span class="hidden md:block"> Eliminar </span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    <div class="m-5">
        {{ $users->links() }}
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script>
    Livewire.on('showAlertDelete', userId => {
        Swal.fire({
            title: 'Estás seguro de eliminar el usuario?',
            html: '<div class="text-white text-sm bg-red-700 p-2 rounded-lg">No podrás recuperar lo eliminado!</div>',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#166534',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminalo'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('deleteUser',userId);
                Swal.fire(
                    'Eliminado exitosamente!',
                    '<div class="text-white text-sm bg-green-700 p-2 rounded-lg">Eliminado exitosamente!</div>',
                    'success',
                )
            }
        })
    })
</script>
@endpush
