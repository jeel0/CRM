<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
    </h2>
</x-slot>

<div class="py-4">
    <div class="max-w-7xl flex relative w-full gap-3 px-7 h-full min-h-[450px] mt-3 mx-auto">
        <div class="flex w-1/3 gap-5 border-gray-400 bg-white drop-shadow-md">
            <div class="relative flex flex-col w-full px-2 py-4 items-center gap-3 break-all">
                <div class="h-auto w-96 bg-white rounded-lg p-4">
                    <h2 class="font-semibold text-xl text-black leading-tight">
                        Your Tasks
                    </h2>
                    @unless(count($tasks))

                    <h2 class="mx-auto mt-12 text-xl text-gray-600 font-mono"> You have no upcoming tasks</h2>

                    @endunless

                    <ul class="my-4">
                        @foreach($tasks as $task)
                        <li class="mt-4" id="1">
                            <div wire:click="viewTask({{ $task->id }})" class="flex  hover:cursor-pointer justify-between border-2 border-transparent hover:border-gray-400 bg-[#b9dbe7] w-full rounded-[7px] h-40 p-2">
                                <div class="flex flex-col justify-start ">
                                    <h3 class="text-sm ">{{ $task->status }}</h3>
                                    <h3 class="text-sm ml-2 text-gray-800 font-semibold">{{$task->name}}</h3>
                                </div>
                                <div class="text-sm text-gray-800 flex flex-col justify-between items-center ml-auto">
                                    <p class="set_date">{{ Timezone::convertToLocal( Carbon::parse($task->dueDate), 'M j, Y' , false) }}</p>
                                    <p class="set_time"> {{ Timezone::convertToLocal( Carbon::parse($task->dueDate), 'g:i A' , false) }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="flex flex-col w-2/3 gap-3">
            <div class="relative h-full col-span-full xl:col-span-6 bg-white shadow-lg rounded-sm border border-slate-200">
                <header class="px-5 py-4 border-b border-slate-100">
                    <h2 class="font-semibold text-slate-800">Recent Activity</h2>
                </header>
                <div class="p-3">
                    <ul class="my-1">
                        @unless(count($recentActivity))

                        <h2 class="mx-auto mt-12 text-xl text-gray-600 font-mono"> You have no upcoming tasks</h2>

                        @endunless

                        @foreach($recentActivity as $activity)
                        <!-- Is Contact -->
                        @if(isset($activity->firstName))

                        <li wire:click="viewContact({{ $activity->id }})" class="flex gap-3 hover:cursor-pointer items-center border-2 border-transparent hover:border-2 hover:border-gray-400">
                            <div class="flex items-center justify-center min-w-[45px] h-[45px] rounded-full bg-red-500">
                                <i class="fa fa-user text-lg text-white"></i>
                            </div>
                            <div class="grow flex flex-col w-full items-start border-b border-slate-100 text-sm py-2">
                                <h2 class="font-bold text-gray-500">@displayDate($activity->created_at, 'M j, Y - g:i A', false)</h2>
                                <div class="grow flex justify-between w-full">
                                    <div class="self-center">
                                        <span class="text-lg font-medium text-slate-800">
                                            <span class="font-bold text-black">{{ $this->getAuthorName($activity->user_id) }}</span> created/updated contact #<b>{{ $activity->id }}</b>: <span class="font-bold text-black">{{ $activity->firstName }} {{ $activity->lastName }}</span>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif

                        <!-- Is Contact Note -->
                        @if(isset($activity->title))
                        <li wire:click="viewContact({{ $activity->contact_id }})" class="flex gap-3 hover:cursor-pointer items-center border-2 border-transparent hover:border-2 hover:border-gray-400">
                            <div class="flex items-center justify-center min-w-[45px] h-[45px] rounded-full bg-green-500">
                                <i class="fa fa-sticky-note text-lg text-white"></i>
                            </div>
                            <div class="grow flex flex-col w-full items-start border-b border-slate-100 text-sm py-2">
                                <h2 class="font-bold text-gray-500">@displayDate($activity->created_at, 'M j, Y - g:i A', false)</h2>
                                <div class="grow flex justify-between w-full">
                                    <div class="self-center">
                                        <span class="text-lg font-medium text-slate-800">
                                            <span class="font-bold text-black">{{ $this->getAuthorName($activity->author) }}</span> added a note with title: <span class="font-bold text-black">{{ $activity->title }}</span> on contact #<b>{{ $activity->contact_id }}</b>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif

                        <!-- Is Task -->
                        @if(isset($activity->name))
                        <li wire:click="viewTask({{ $activity->id }})" class="flex gap-3 hover:cursor-pointer items-center border-2 border-transparent hover:border-2 hover:border-gray-400">
                            <div class="flex items-center justify-center min-w-[45px] h-[45px] rounded-full bg-blue-500">
                                <i class="fa fa-check text-lg text-white"></i>
                            </div>
                            <div class="grow flex flex-col w-full items-start border-b border-slate-100 text-sm py-2">
                                <h2 class="font-bold text-gray-500">@displayDate($activity->created_at, 'M j, Y - g:i A', false)</h2>
                                <div class="grow flex justify-between w-full">
                                    <div class="self-center">
                                        <span class="text-lg font-medium text-slate-800">
                                            <span class="font-bold text-black">
                                                {{ $this->getAuthorName($activity->user_id) }}</span> assigned a task due on <span class="font-bold text-black">{{ Timezone::convertToLocal( Carbon::parse($activity->dueDate)) }}</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif


                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>