<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route("admin.user.update",$user->id) }}">
            @csrf
            @method("PATCH")

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{$user->email}}" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>





                <x-primary-button class="ml-3 mt-3">
                   Change
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
