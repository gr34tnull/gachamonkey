<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('List of Names') }}
        </h2>
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
        
                    <section class="px-4 pt-4 pb-4 space-y-4 sm:px-6 lg:px-4 xl:px-6 sm:pb-6 lg:pb-4 xl:pb-6">
                        <header class="flex flex-row items-center justify-between">
                            <h2 class="text-lg font-medium leading-6 text-black uppercase">{{$group->name}}</h2>
                            <div class="flex flex-row justify-end space-x-2">
                                <a href="{{url('/shuffle').'/'.$group->id}}" class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-200 hover:text-gray-800 group">
                                    START SHUFFLE
                                </a>
                                <form method="POST" action="{{route('groups.destroy',$group->id)}}">
                                @csrf
                                @method('delete')
                                    <button class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-900 rounded-md hover:bg-red-200 hover:text-gray-800 group">
                                        DELETE GROUP
                                    </button>
                                </form>
                            </div>
                        </header>
                        <!-- <form class="relative">
                            <svg width="20" height="20" fill="currentColor" class="absolute text-gray-400 transform -translate-y-1/2 left-3 top-1/2">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
                            </svg>
                            <input class="w-full py-2 pl-10 text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none" type="text" aria-label="Filter Groups" placeholder="Filter Groups" />
                        </form> -->
                        <table class="w-full text-xs border-collapse">
                            <thead>
                                <tr>
                                    <th class="hidden p-3 font-bold text-gray-600 uppercase bg-gray-200 border border-gray-300 lg:table-cell"><button onclick="openModal()">ADD NAMES</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($participants as $participant)
                                <tr class="flex flex-row flex-wrap mb-10 bg-white lg:hover:bg-gray-100 lg:table-row lg:flex-row lg:flex-no-wrap lg:mb-0">
                                    <td class="relative block w-full p-1 text-center text-gray-800 border border-b lg:w-auto lg:table-cell lg:static">
                                        <span class="absolute top-0 left-0 px-2 py-1 text-xs font-bold uppercase bg-blue-200 lg:hidden">NAME</span>
                                        {{$participant->name}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$participants->links()}}
                    </section>

                </div>

                <div id="gmodal" class="fixed inset-0 z-10 hidden overflow-y-auto modal">
                    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-64 text-center sm:block sm:p-0">

                        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                            <div class="absolute inset-0 bg-gray-500 opacity-75">Add Item</div>
                        </div>

                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                            <div class="p-2 bg-white">
                                <div class="flex flex-col">
                                    <div class="p-4">
                                        <form action="{{route('names.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                            <x-jet-input type="hidden" name="group_id" value="{{$group->id}}" />
                                            
                                            <div>
                                                <x-jet-label for="name" :value="__('Add Single Item')" />

                                                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" placeholder="Item Name" autofocus />
                                            </div>

                                            <div class="pt-2">
                                                <x-jet-label for="file" :value="__('Excel File Upload')" />

                                                <x-jet-input id="file" class="block w-full mt-1" type="file" name="file" autofocus />
                                            </div>

                                            <div class="flex items-center justify-end mt-4">
                                                <x-jet-button class="w-full">
                                                    {{ __('Add Items') }}
                                                </x-jet-button>                            
                                            </div>
                                            
                                        </form>
                                        <button class="items-center w-full px-4 py-2 mt-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-red-800 border border-transparent rounded-md hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:shadow-outline-gray disabled:opacity-25" onclick="closeModal()">
                                            {{ __('Close') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        function openModal(){
            document.getElementById('gmodal').classList.remove('hidden');
        }
        function closeModal(){
            document.getElementById('gmodal').classList.add('hidden');
        }
    </script>
</x-app-layout>
