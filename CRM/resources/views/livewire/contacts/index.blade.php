<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Contacts
    </h2>
</x-slot>

<div>
    <div class="max-w-6xl mx-auto pb-10 pt-2 sm:px-6 lg:px-8">
        @if (session()->has('message'))

        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3 fixed top-0  w-full lg:w-1/2 left-1/2 -translate-x-2/4 " role="alert">

            <div class="flex">

                <div>

                    <p class="text-sm">{{ session('message') }}</p>

                </div>

            </div>

        </div>

        @endif

        @if($isOpen)
        @include('livewire.contacts.create')
        @endif

        @if($deleteIsOpen)
        @include('livewire.contacts.delete', ['first_name' => $delContactFname, 'last_name' => $delContactLname, 'contact_id' => $delContactId,])
        @endif
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between">
                        {{ $contacts->links('livewire/Contacts/contact-pagination') }}
                        <button wire:click="openPopup()" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add contact</button>
                    </div>
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg mt-3">

                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead class="border-gray-200 border-t-2">
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        First Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Last Name
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Phone
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-black uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $contact->id }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $contact->firstName }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $contact->lastName }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $contact->email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                        {{ $contact->phone }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a wire:click="viewContact({{ $contact->id }})" class="mb-2 mr-2">
                                            <button class="bg-transparent hover:bg-green-500 text-green-600 font-semibold hover:text-white py-2 px-2 border border-green-500 hover:border-transparent rounded">
                                                <i class="fa fa-eye mr-1"> </i> View
                                            </button>
                                        </a>
                                        <a wire:click="editContact({{ $contact->id }})" class="mb-1 mr-1">
                                            <button class="bg-transparent hover:bg-indigo-500 text-indigo-600 font-semibold hover:text-white py-2 px-2 border border-indigo-500 hover:border-transparent rounded">
                                                <i class="fa fa-pencil mr-1"></i> Edit
                                            </button>
                                        </a>
                                        <button type="submit" wire:click="delete({{$contact->id}})" class="bg-transparent hover:bg-red-500 text-red-600 font-semibold hover:text-white py-2 px-2 border border-red-500 hover:border-transparent rounded" data-toggle="modal" data-target="#deleteContactModal">
                                            <i class="fa fa-trash mr-1"> </i> Delete
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>