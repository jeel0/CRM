<div class="flex p-4">
    <div class="flex items-center w-full gap-2">
        <div class="flex w-full gap-2">
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <i class="fa fa-home text-gray-800 text-3xl"></i>
                    {{ __('Home') }}
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="/calendar" :active="request()->routeIs('calendar')">
                    <i class="fa fa-calendar text-3xl text-purple-500"></i>
                    {{ __('Calendar') }}
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="{{ route('contacts') }}" :active="request()->routeIs('contacts')">
                    <i class="fa fa-group text-3xl text-red-500"></i>
                    {{ __('Contacts') }}
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="/reports" :active="request()->routeIs('reports')">
                    <i class="fa fa-bar-chart text-3xl text-green-500"></i>
                    {{ __('Reports') }}
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="/tasks" :active="request()->routeIs('tasks')">
                    <i class="fa fa-th-list text-3xl text-blue-500"></i>
                    {{ __('Tasks') }}
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="/import" :active="request()->routeIs('import')">
                    <i class="fa fa-upload text-3xl text-orange-500"></i>
                    {{ __('Import') }}
                </x-jet-nav-link>
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-6 sm:flex sm:flex-col">
                <x-jet-nav-link class="flex flex-col text-xs hover:border-gray-800" href="/profile" :active="request()->routeIs('settings')">
                    <i class="fa fa-sliders text-3xl text-teal-500"></i>
                    {{ __('Settings') }}
                </x-jet-nav-link>
            </div>
        </div>
    </div>
</div>