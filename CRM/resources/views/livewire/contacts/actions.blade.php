<div class="flex border-gray-400 bg-white drop-shadow-md gap-5 py-2 px-2">
    <button wire:click="showNoteForm()" class="bg-green-500 hover:bg-white hover:border-green-500 text-white hover:text-green-500 border-2  border-transparent font-bold  py-2 px-4 rounded inline-flex items-center gap-2">
        <i class="fa fa-plus h-5 w-5 flex items-center"></i>
        <span>New Note</span>
    </button>
    <button wire:click="showTaskForm()" class="bg-blue-500 hover:bg-white hover:border-blue-500 text-white hover:text-blue-500 border-2  border-transparent font-bold py-2 px-4 rounded inline-flex items-center gap-2">
        <i class="fa fa-plus h-5 w-5 flex items-center"></i>
        <span>New Task</span>
    </button>
</div>

@if($noteForm)
@include('livewire.contacts.create')
@endif
<div class="flex border-gray-400 bg-white drop-shadow-md gap-5 py-2 px-2 min-h-[250px] h-full">
    @if(empty($notes))
    <h2 class=""> No history recorded for this contact</h2>
    @endif

    @if(!empty($notes))
    <div class="flex items-center justify-between">
        {{ $notes->links('livewire/Contacts/contact-pagination') }}
    </div>
    @endif
</div>