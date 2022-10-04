<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            View
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif
    
            <!-- @if($isOpen)
            @include('livewire.tasks.create')
            @endif -->
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between p-2">
                            <div class="">
                                <b>Task #: {{$task_id}} </b>
                            </div>
                            <div class="">
                                <b>Assigned to:   </b>
                            </div>
                            <div class="">
                                <b>Priority:  </b>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-6 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-2">
                             <div class="">
                                 <b>Name:  <p style="border:2px; border-radius:15px; width:500px; height:50px; border-style:solid; border-color:#000000; padding: 16px;"> {{$name}} </p></b>
                             </div>
                             <div class="">
                                 <b>Status:  <p style="border:2px; border-radius:15px; height:50px; border-style:solid; border-color:#000000; padding: 16px;"> status of task </p></b>
                             </div>
                        </div>
                        <div class=" items-center justify-between pt-6 shadow overflow-hidden bg-white border-b border-gray-200 sm:rounded-lg p-2">
                            <b>Due Date: <p style="border:2px; border-radius:15px; width:500px; height:50px; border-style:solid; border-color:#000000; padding: 16px;"> Due Date </p></b>
                            <div class="pt-8">
                            <b>Description: <br/> <textarea name="description" id="" cols="55" rows="5"></textarea></b>
                            </div>
                            <div class="pt-8">
                            <b>Comments: <br/> <textarea name="description" id="" cols="55" rows="5"></textarea></b>
                            </div>
                        </div>
                        <div class="flex items-center justify-between pt-6 shadow overflow-hidden  bg-white border-b border-gray-200 sm:rounded-lg p-2">
                            <div class="pr-30">
                                <button class="bg-red-500 hover:bg-red-700 text-white  font-bold py-2 px-4 rounded ">Delete</button>
                            </div>
                            <div class="flex justify-between items-center p-2">
                                <div class="p-2">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">Cancel</button>
                                </div>
                                <div class="p-2">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ">Save</button>
                                </div>
                            </div>

                        </div">
                    </div>
                </div>
            </div>

        </div>
    </div>
