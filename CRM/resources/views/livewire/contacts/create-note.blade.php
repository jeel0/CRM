<div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400 mx-auto">
    <div class="flex items-end z-20 justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <form class="w-full" wire:submit.prevent="createNote">
                <div class="bg-white px-4 py-4">
                    <div class="flex flex-row w-full gap-4">
                        <div class="max-w-screen-2xl mx-auto">
                            <div class="mb-4">
                                <h2 class="text-gray-800 text-left text-xl font-bold mb-2">New Note:</h2>
                                <p class="max-w-screen-md text-gray-500 text-base text-left">Enter a Title and Message to save as a Note for on this contact.</p>
                            </div>
                            <form class="max-w-screen-md grid sm:grid-cols-2 gap-6 mx-auto">
                                <div class="sm:col-span-2 ">
                                    <label for="title" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Title: <span class="text-red-800">*</span></label>
                                    <input name="title" class="w-full bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" wire:model.defer="note.title" />
                                    <span class="text-red-500 mt-2"> @error('note.title') Title field is required @enderror</span>
                                </div>

                                <div class="sm:col-span-2 mt-4 mb-2">
                                    <label for="message" class="inline-block text-gray-800 text-sm sm:text-base mb-2">Message: <span class="text-red-800">*</span></label>
                                    <textarea name="message" class="w-full h-64 bg-gray-50 text-gray-800 border focus:ring ring-indigo-300 rounded outline-none transition duration-100 px-3 py-2" wire:model.defer="note.note"></textarea>
                                    <span class="text-red-500 mt-2">@error('note.note') Note field is required @enderror</span>
                                </div>
                                <div class="sm:col-span-2 flex justify-between items-center gap-3 mt-6">
                                    <button wire:click="createNote()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Save
                                    </button>
                                    <button wire:click="hideNoteForm()" type="button" class="inline-flex justify-center w-3/5 rounded-md border border-transparent px-4 py-2 bg-transparent text-base underline leading-6 font-medium text-gray-600 hover:shadow-sm hover:bg-gray-600 hover:text-white hover:no-underline focus:outline-none focus:border-gray-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Cancel
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <span class="text-red-800 text-sm text-right mt-3 block">*Required</span>
                </div>
            </form>
        </div>
    </div>
</div>