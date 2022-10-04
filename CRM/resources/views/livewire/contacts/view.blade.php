<x-slot name="header">
    <div class="flex justify-between w-full">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight self-center">
            {{ ('Contact') }} : #{{ $contact->id}}
        </h2>
        <a href="{{ route('contacts') }}">
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center gap-2">
                <i class="fa fa-user h-5 w-5"></i>
                <span>{{ ('Contacts') }}</span>
            </button>
        </a>
    </div>
</x-slot>

<div class="max-w-7xl flex relative w-full gap-3 px-7 mt-6 mx-auto">

    @if($noteForm)
    @include('livewire.contacts.create-note')
    @endif
    @if($editIsOpen)
    @include('livewire.contacts.edit-note', ['id' => $delNoteId])
    @endif
    @if($deleteIsOpen)
    @include('livewire.contacts.delete-note', ['id' => $delNoteId])
    @endif
    <div class="contactinfo flex w-1/3 gap-5">
        <div class="relative flex flex-col w-full px-2 py-4 items-center bg-white drop-shadow-md  border-gray-400 gap-3 break-all h-[600px]">
            @if(!empty($contact->firstName)&& !empty($contact->lastName))
            <div class="flex w-full gap-2">
                <div class="flex justify-center items-center w-2/5">
                    <img class="w-24 h-24 rounded-full" src="{{ $this->getContactPhotoSrc()}}" alt="Rounded contact avatar profile Image">
                </div>
                <div class="flex flex-col gap-1 w-3/5 justify-center">
                    <h2 class="text-xl text-gray-700 font-medium ">{{ $contact->firstName }} {{ $contact->lastName }} </h2>
                    @if(!empty($contact->birthdate))
                    <span class="text-base"> <i class="fa fa-birthday-cake"> </i> : {{ $contact->birthdate }}
                        @if(!empty($contact->age))
                        (<span class="text-sm"> {{ $contact->age }} yrs </span>)
                        @endif</span>
                    @endif
                    @if(!empty($contact->phone))
                    <div class="flex">
                        <span class="text-base"> <i class="fa fa-phone"> </i> : {{ $contact->phone }} </span>
                    </div>
                    @endif
                    @if(!empty($contact->email))
                    <div class="flex">
                        <span class="text-base"> <i class="fa fa-envelope"> </i> : {{ $contact->email }} </span>
                    </div>
                    @endif
                </div>
            </div>
            @endif
            <div class="relative flex flex-col w-full h-full bg-blue-50 mt-2 p-3 rounded-md gap-4 pb-16">
                <div class="flex w-full justify-start mb--2">
                    <h2 class="font-bold">{{ ('Contact Details:') }}</h2>
                </div>
                <div class="flex w-full ">
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">First Inquiry Date</h2>
                            @if(!empty($contact_info->first_inquiry_date))

                            <p class="text-base text-gray-900 font-bold ml-1"> {{ Timezone::convertToLocal( Carbon::parse($contact_info->first_inquiry_date), 'M j, Y', false) }}</p>
                            @else()
                            <p class="text-base text-gray-900 font-bold ml-1">n/a</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">Prospect Name</h2>
                            <p class="text-base text-gray-900 font-bold ml-1">{{ !empty($contact_info->prospect_name) ? $contact_info->prospect_name : 'n/a' }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">Prospect Age</h2>
                            <p class="text-base text-gray-900 font-bold ml-1">{{ !empty($contact_info->prospect_age) ? $contact_info->prospect_age : 'n/a' }}</p>
                        </div>
                    </div>
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">Prospect Relationship</h2>
                            <p class="text-base text-gray-900 font-bold ml-1">{{ !empty($contact_info->prospect_relationship) ? $contact_info->prospect_relationship : 'n/a' }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">Lifestyle Option</h2>
                            <p class="text-base text-gray-900 font-bold ml-1">{{ !empty($contact_info->lifestyle_option) ? $contact_info->lifestyle_option : 'n/a' }}</p>
                        </div>
                    </div>
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">Marketing Source</h2>
                            <p class="text-base text-gray-900 font-bold ml-1">{{ !empty($contact_info->marketing_source) ? $contact_info->marketing_source : 'n/a' }}</p>
                        </div>
                    </div>
                </div>
                <div class="flex w-full">
                    <div class="flex border-l-[3px] border-blue-400 w-full pl-2 h-16 justify-start">
                        <div class="flex flex-col mt--1.5">
                            <h2 class="text-base text-gray-700">Suite Preference</h2>
                            <p class="text-base text-gray-900 font-bold ml-1">{{ !empty($contact_info->suite_preference) ? $contact_info->suite_preference : 'n/a' }}</p>
                        </div>
                    </div>
                </div>

                <button wire:click="editContact({{ $contact->id }})" class="absolute bottom-4 flex flex-row justify-center left-0 right-0 mx-auto w-40 gap-1 h-sm px-3 py-1.5 rounded-sm text-white bg-green-500 active:text-gray-100 active:bg-green-800 active:ring-0 focus:ring-offset-1 focus:ring">
                    <div class="fa fa-pencil"></div>
                    <p class="text-base font-medium">{{ ('Edit Contact') }}</p>
                </button>
            </div>
        </div>
    </div>
    <div class="flex flex-col w-2/3 gap-3">
        <div class="flex contactinfo gap-5 pr-2 justify-between pt-2 items-center" x-data>
            <div class="flex items-center justify-between">
                {{ $items->links('livewire/Contacts/contact-note-pagination'); }}
            </div>
            <div>
                <button wire:click="showNoteForm()" class="bg-green-500 drop-shadow-md  hover:bg-transparent hover:border-green-500 text-white hover:text-green-500 border-2  border-transparent font-bold  py-2 px-4 rounded inline-flex items-center gap-2">
                    <i class="fa fa-plus h-5 w-5 flex items-center"></i>
                    <span>New Note</span>
                </button>
                <!-- <button wire:click="showTaskForm()" class="bg-blue-500 drop-shadow-md  hover:bg-transparent hover:border-blue-500 text-white hover:text-blue-500 border-2  border-transparent font-bold py-2 px-4 rounded inline-flex items-center gap-2">
                <i class="fa fa-plus h-5 w-5 flex items-center"></i>
                <span>New Task</span>
                </button> -->
            </div>
        </div>
        <div class="flex drop-shadow-md gap-5 py-4 pt-5 min-h-[250px] h-full">
            @unless(count($items))
            <h2 class="mx-auto text-xl text-gray-600 font-mono"> No history recorded for this contact!!!</h2>
            @endunless
            <?php //dd($notes); 
            ?>
            @if(count($items))

            <div class="flex flex-col w-full gap-4">

                @foreach ($items as $item)
                <div class="flex flex-col w-full px-4 border-l-2 border-indigo-400 pl-2 bg-white pt-4 pb-1">
                    <div class="flex justify-between ">
                        <h2 class="text-xs text-gray-500">Note by: <b>{{ $this->getAuthorName($item->author, true) }}</b> </h2>
                        <span class="text-xs text-gray-500">@displayDate($item->created_at, 'M j, Y - g:i A', false)</span>
                    </div>
                    <h2 class="mt-2 pt-2 font-bold text-base border-t-2 border-gray-200">{{ $item->title }}</h2>
                    <p class="pl-2 mt-2 break-words	text-sm">{{ $item->note }}</p>
                    <div class="flex justify-between">
                        <div class="flex justify-start mt-2 gap-2 items-end pb-1">
                            @if( !empty($item->last_modified_by) && $item->author != $item->last_modified_by )
                            <h2 class="text-xs text-gray-500">Last Edited by: <b>{{ $this->getAuthorName($item->last_modified_by, false) }}</b> on <b>@displayDate($item->updated_at, 'M j, Y - g:i A', false)</b></h2>
                            @elseif (!empty($item->last_modified_by) && $item->created_at != $item->updated_at )
                            <h2 class="text-xs text-gray-500">Last Edited by: <b>You</b> on <b>@displayDate($item->updated_at, 'M j, Y - g:i A', false)</b></h2>
                            @endif
                        </div>
                        <div class="flex justify-end mt-2 gap-2">
                            <button wire:click="openEditPopup({{$item->id}})" type="button" class="inline-flex justify-center rounded-md border border-transparent px-4 py-2 bg-transparent text-base  leading-6 font-medium text-gray-500 hover:shadow-sm hover:bg-gray-500 hover:text-white hover:no-underline focus:outline-none focus:border-gray-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Edit
                            </button>
                            <button wire:click="openDeletePopup({{$item->id}})" type="button" class="inline-flex justify-center  rounded-md border border-transparent px-4 py-2 bg-transparent text-base leading-6 font-medium text-red-500 hover:shadow-sm hover:bg-red-500 hover:text-white hover:no-underline focus:outline-none focus:border-red-600 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
</div>