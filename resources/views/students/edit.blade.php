<x-layouts.layout>

    <div class="flex justify-center items-center min-h-full bg-gray-200">

        <form method="POST"
              action="{{ route('students.update', $student->id) }}?page={{ request()->get('page') }}"
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
                    :value="$student->name"
                    value="{{$student->name}}"
                    required
                />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="name" :value="__('Phone')" />
                <x-text-input
                    id="phone"
                    class="block mt-1 w-full"
                    type="text"
                    name="phone"
                    :value="$student->phone"
                    required
                />
            </div>

            <!-- Course -->
            <div class="mt-4">
                <x-input-label for="course" :value="__('Course')" />
                <select name="course" >
                    @foreach(config("courses") as $course)
                        <option {{ $student->course == $course ? "selected" : ""  }} value="{{$course}}">{{$course}}</option>
                    @endforeach
                </select>

                @error("course")
                <div class="text-xm text-red-200"> {{$message}}</div>
                @enderror
            </div>

            <!-- email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input
                    id="email"
                    class="block mt-1 w-full"
                    type="text"
                    name="email"
                    :value="$student->email"
                />
            </div>

            <!-- Button -->
            <div class="flex justify-end mt-6 space-x-2 ">
                <x-primary-button>
                    {{ __('Update Student') }}
                </x-primary-button>
                <x-href-button class="" href="{{route('students.index')}}">
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
                    title: "¿Quieres actualizar este alumno?",
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



