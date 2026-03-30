<x-layouts.layout>



    <div class="flex justify-center items-center min-h-full bg-gray-200">

        <form method="POST"
              action="{{ route('teachers.update', $teacher->id) }}?page={{ request()->get('page') }}"
              onsubmit="return confirmarUpdate(event)"
              class="bg-white p-4 rounded-2xl">
            @csrf
            @method('PATCH')
            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input
                    id="name"
                    class="block mt-1 w-full"
                    type="text"
                    name="name"
                    :value="$teacher->name"
                    value="{{$teacher->name}}"
                    required
                />
            </div>

            <!-- Description -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Phone')" />
                <x-text-input
                    id="phone"
                    class="block mt-1 w-full"
                    type="text"
                    name="phone"
                    :value="$teacher->phone"
                    required
                />
            </div>

            <!-- Hours -->
            <div class="mt-4">
                <x-input-label for="department" :value="__('Department')" />
                <select name="department" >
                    @foreach(config("departments") as $department)
                        <option {{ $teacher->department == $department ? "selected" : ""  }} value="{{$department}}">{{$department}}</option>
                    @endforeach
                </select>

                @error("department")
                <div class="text-xm text-red-200"> {{$message}}</div>
                @enderror
            </div>

            <!-- Start Date -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="text"
                    name="email"
                    :value="$teacher->email"
                />
            </div>

            <div class="flex justify-end mt-6 space-x-2 ">
                <x-primary-button>
                    {{ __('Update Teacher') }}
                </x-primary-button>
                <x-href-button class="" href="{{route('teachers.index')}}">
                    {{ __('Cancelar') }}
                </x-href-button>
            </div>

        </form>

    </div>

    @push('scripts')
        <script>
            function confirmarUpdate(e){
                e.preventDefault();

                Swal.fire({
                    title: "¿Quieres actualizar este profesor?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Sí, actualizar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        e.target.submit();
                    }
                });

                return false;
            }
        </script>
    @endpush

</x-layouts.layout>



