<x-layouts.layout>
    <h1 class="bg-accent text-4xl flex justify-center p-8">DASHBOARD</h1>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('dashboard') }}
        </h2>
    </x-slot>

  {{--  <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>--}}

    {{--Componente de daisyUI--}}
    <div role="alert" class="alert alert-info m-8 mt-6">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="h-6 w-6 shrink-0 stroke-current">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <span>

            {{__("You are loged in")}}

        </span>
    </div>

    <div class="bg-accent card p-5 m-8">
        <ul>
            <li>Datos</li>
            <li>Notificaciones</li>
            <li>Opciones</li>
        </ul>
    </div>
</x-layouts.layout>
