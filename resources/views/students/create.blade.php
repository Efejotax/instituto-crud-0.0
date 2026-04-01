<x-layouts.layout>

    <div class="flex justify-center items-center min-h-full bg-gray-200">

        <form method="POST" action="{{ route('students.store') }}" class="bg-white p-4 rounded-2xl">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{old('name')}}" required />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{old('address')}}" required />
            </div>

            <!-- Birthday -->
            <div class="mt-4">
                <x-input-label for="birthday" :value="__('Birthday')" />
                <x-text-input id="birthday" class="block mt-1 w-full" type="date" name="birthday" value="{{old('birthday')}}" required />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" value="{{old('phone')}}" required />
            </div>

            <!-- Course -->
            <div class="mt-4">
                <x-input-label for="course" :value="__('Course')" />
                <select name="course" class="block mt-1 w-full">
                    @foreach(config("courses") as $course)
                        <option value="{{$course}}">{{$course}}</option>
                    @endforeach
                </select>
            </div>

            <!-- Email -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{old('email')}}" required />
            </div>

            <!-- Button -->
            <div class="flex justify-end mt-6">
                <x-primary-button>
                    {{ __('Create Student') }}
                </x-primary-button>
            </div>

        </form>

    </div>

</x-layouts.layout>
