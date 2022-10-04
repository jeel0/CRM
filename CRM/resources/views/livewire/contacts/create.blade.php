<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 mx-auto">

    <div class="flex items-end z-20 justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <form class="w-full" wire:submit.prevent="store">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="w-full border-gray-700 border-b-2">
                        <h2 class="text-lg font-bold text-black">Info:</h2>
                        <i wire:click="closePopup()" class="fa fa-close hover:text-3xl duration-150  text-2xl text-black h-10 w-10 absolute right-3 top-3"></i>
                    </div>
                    <div class="mt-6 pl-2">
                        <div class="flex flex-row w-full gap-4">
                            <div class="mb-4 w-full">

                                <label for="contactFormInput1" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>

                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput1" placeholder="Enter First Name" wire:model.defer="contact.firstName">

                                @error('first_name') <span class="text-red-500">{{ $first_name }}</span>@enderror

                            </div>

                            <div class="mb-4 w-full">

                                <label for="contactFormInput2" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>

                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput2" placeholder="Enter Last Name" wire:model.defer="contact.lastName">

                                @error('last_name') <span class="text-red-500">{{ $last_name }}</span>@enderror

                            </div>
                        </div>
                        <div class="flex flex-row w-full gap-4">
                            <div class="mb-4 w-full">

                                <label for="contactFormInput3" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>

                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput3" placeholder="Enter Email" wire:model.defer="contact.email">

                                @error('email') <span class="text-red-500">{{ $email }}</span>@enderror

                            </div>

                            <div class="mb-4 w-full">

                                <label for="contactFormInput4" class="block text-gray-700 text-sm font-bold mb-2">Phone:</label>

                                <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput4" placeholder="Enter Phone" wire:model.defer="contact.phone">

                                @error('phone') <span class="text-red-500">{{ $phone }}</span>@enderror

                            </div>
                        </div>
                        <div class="flex flex-row w-full gap-4 items-end">
                            <div class="mb-4 w-full">

                                <label for="contactFormInput5" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth:<span class="text-gray-500 text-xs"> (Will overwrite age if set)</span></label>

                                <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput5" placeholder="Enter Date of Birth" wire:model.defer="contact.birthdate">

                                @error('birthdate') <span class="text-red-500">{{ $birthdate }}</span>@enderror

                            </div>
                            <div class="mb-4 w-full">

                                <label for="contactFormInput6" class="block text-gray-700 text-sm font-bold mb-2">Age:</label>

                                <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput6" placeholder="Enter Age" wire:model.defer="contact.age">

                                @error('age') <span class="text-red-500">{{ $age }}</span>@enderror

                            </div>
                        </div>
                    </div>
                    <div class="w-full border-gray-700 border-b-2 mt-4">
                        <h2 class="text-lg font-bold text-black">Optional Fields:</h2>
                    </div>
                    <div class="mt-6 pl-2 w-full">
                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput7" class="block text-gray-700 text-sm font-bold">Date of First Inquiry:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput7" placeholder="Enter First Inquiry Date" wire:model.defer="contact_info.first_inquiry_date">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('first_inquiry_date') <span class="text-red-500">{{ $first_inquiry_date }}</span>@enderror
                            </div>
                        </div>

                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput8" class="block text-gray-700 text-sm font-bold">Prospect Name:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput8" placeholder="Enter Prospect Name" wire:model.defer="contact_info.prospect_name">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('prospect_name') <span class="text-red-500">{{ $prospect_name }}</span>@enderror
                            </div>
                        </div>
                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput9" class="block text-gray-700 text-sm font-bold">Prospect Age:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput9" placeholder="Enter Prospect Age" wire:model.defer="contact_info.prospect_age">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('prospect_age') <span class="text-red-500">{{ $prospect_age }}</span>@enderror
                            </div>
                        </div>
                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput10" class="block text-gray-700 text-sm font-bold">Prospect Relationship:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput10" placeholder="Enter Prospect Relationship" wire:model.defer="contact_info.prospect_relationship">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('prospect_relationship') <span class="text-red-500">{{ $prospect_relationship }}</span>@enderror
                            </div>
                        </div>
                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput11" class="block text-gray-700 text-sm font-bold">Suite Preference:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput11" placeholder="Enter Suite Preference" wire:model.defer="contact_info.suite_preference">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('suite_preference') <span class="text-red-500">{{ $suite_preference }}</span>@enderror
                            </div>
                        </div>
                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput12" class="block text-gray-700 text-sm font-bold">Lifestyle Option:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput12" placeholder="Enter Lifestyle Option" wire:model.defer="contact_info.lifestyle_option">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('lifestyle_option') <span class="text-red-500">{{ $lifestyle_option }}</span>@enderror
                            </div>
                        </div>
                        <div class="w-full mt-6">
                            <div class="text-gray-700 md:flex md:items-start">
                                <div class="mb-1 md:mb-0 md:w-1/4">
                                    <label for="contactFormInput13" class="block text-gray-700 text-sm font-bold">Marketing Source:</label>
                                </div>
                                <div class="md:w-3/4 md:flex-grow">
                                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contactFormInput13" placeholder="Enter Marketing Source" wire:model.defer="contact_info.marketing_source">
                                </div>
                            </div>
                            <div class="md:w-3/4 md:flex-grow ml-auto pl-2">
                                @error('marketing_source') <span class="text-red-500">{{ $marketing_source }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mt-4">
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto sm:min-w-[150px]">
                            <button wire:click="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Save
                            </button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>