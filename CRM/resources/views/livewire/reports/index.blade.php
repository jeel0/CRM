<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Reports
    </h2>
</x-slot>
<div>
    <div class="max-w-6xl mx-auto pb-10 pt-2 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="flex flex-col justify-center items-center rounded-lg p-4 gap-4">
                <div class="flex w-full gap-4">
                    <article class="flex w-full items-center gap-4 p-6 bg-white border border-gray-100 rounded-lg">
                        <div class="flex w-full items-center gap-4">
                            <span class="p-3 text-red-500 h-14 bg-gray-200 rounded-full">
                                <i class="text-3xl fa fa-group"></i>
                            </span>
                            <div>
                                <p class="text-2xl font-medium text-gray-900">{{count($contacts)}}</p>
                                <p class="text-sm text-gray-400">Total Contacts</p>
                            </div>
                        </div>
                        <div class="flex w-full items-center">
                            <div>
                                <p class="text-2xl font-medium text-gray-900">{{count($contactsByUser)}}</p>

                                <p class="text-sm text-gray-400">Your Contacts</p>
                            </div>
                        </div>
                    </article>
                    <article class="flex w-full items-center gap-4 p-6 bg-white border border-gray-100 rounded-lg">
                        <div class="flex w-full items-center gap-4">
                            <span class="p-3 text-blue-500 h-14 bg-gray-200 rounded-full">
                                <i class="text-3xl fa fa-th-list"></i>
                            </span>
                            <div>
                                <p class="text-2xl font-medium text-gray-900">{{count($tasks)}}</p>

                                <p class="text-sm text-gray-400">Total Tasks</p>
                            </div>
                        </div>
                        <div class="flex w-full items-center">
                            <div>
                                <p class="text-2xl font-medium text-gray-900">{{count($tasksByUser)}}</p>

                                <p class="text-sm text-gray-400">Your Tasks</p>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="flex w-full gap-4">
                    <div class="h-[400px] bg-white w-full">
                        <livewire:livewire-pie-chart key="{{ $contactsByUserPieChart->reactiveKey() }}" :pie-chart-model="$contactsByUserPieChart" />
                    </div>
                    <div class="h-[400px] bg-white w-full">
                        <livewire:livewire-pie-chart key="{{ $tasksByUserPieChart->reactiveKey() }}" :pie-chart-model="$tasksByUserPieChart" />
                    </div>
                </div>
                <div class="flex w-full gap-4">
                    <div class="h-[400px] bg-white w-full">
                        <livewire:livewire-column-chart key="{{ $contactNotesByAuthorColumnChart->reactiveKey() }}" :column-chart-model="$contactNotesByAuthorColumnChart" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>