<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Personal Information') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

                @livewire('compulsory-subject-one')

                <x-jet-section-border />

                @livewire('compulsory-subject-two')

                <x-jet-section-border />

                @livewire('compulsory-subject-three')

                <x-jet-section-border />





                {{-- <div class="mt-10 sm:mt-0">
                    @livewire('educational')
                </div>

                <x-jet-section-border />



                <div class="mt-10 sm:mt-0">
                    @livewire('entrepreneurial')
                </div>

                <x-jet-section-border /> --}}

            {{-- @if(Route::currentRouteName()!= 'admin.dashboard')
            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
            @endif

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif --}}
        </div>
    </div>
</x-app-layout>
