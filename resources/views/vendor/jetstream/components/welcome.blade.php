<div class="p-6 bg-white border-b border-gray-200">
    
    <section class="px-4 pt-4 pb-4 space-y-4 sm:px-6 lg:px-4 xl:px-6 sm:pb-6 lg:pb-4 xl:pb-6">
        <header class="flex items-center justify-between">
            <h2 class="text-lg font-medium leading-6 text-black uppercase">Groups of {{auth()->user()->name}}</h2>
            <button class="flex items-center px-4 py-2 text-sm font-medium rounded-md hover:bg-light-blue-200 hover:text-light-blue-800 group bg-light-blue-100 text-light-blue-600" onclick="openModal()">
            <svg class="mr-2 group-hover:text-light-blue-600 text-light-blue-500" width="12" height="20" fill="currentColor">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 5a1 1 0 011 1v3h3a1 1 0 110 2H7v3a1 1 0 11-2 0v-3H2a1 1 0 110-2h3V6a1 1 0 011-1z"/>
            </svg>
            Create Group
            </button>
        </header>
        <!-- <form class="relative">
            <svg width="20" height="20" fill="currentColor" class="absolute text-gray-400 transform -translate-y-1/2 left-3 top-1/2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" />
            </svg>
            <input class="w-full py-2 pl-10 text-sm text-black placeholder-gray-500 border border-gray-200 rounded-md focus:border-light-blue-500 focus:ring-1 focus:ring-light-blue-500 focus:outline-none" type="text" aria-label="Filter Groups" placeholder="Filter Groups" />
        </form> -->
        @php
        $groups = App\Models\Group::where('user_id',auth()->user()->id)->get();
        @endphp
        <ul class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
            @foreach($groups as $group)
            <li x-for="item in items">
                <a href="{{route('names.show',$group->id)}}" class="block p-4 border border-gray-200 rounded-lg hover:bg-light-blue-500 hover:border-transparent hover:shadow-lg group">
                    <dl class="grid items-center grid-cols-2 grid-rows-2 sm:block lg:grid xl:block">
                    <div>
                        <dt class="sr-only">Name</dt>
                        <dd class="font-medium leading-6 text-black uppercase group-hover:text-pink-600">
                            {{$group->name}}
                        </dd>
                    </div>
                    </dl>
                </a>
            </li>
            @endforeach
            @if(!is_null($groups))
            <li class="flex rounded-lg hover:shadow-lg">
                <button class="flex items-center justify-center w-full py-4 text-sm font-medium border-2 border-gray-200 border-dashed rounded-lg modal-open hover:border-transparent hover:shadow-xs" onclick="openModal()">
                    Create Group
                </button>
            </li>
            @endif       
        </ul>
    </section>

</div>

<div id="gmodal" class="fixed inset-0 z-10 hidden overflow-y-auto modal">
    <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-64 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75">Create Group</div>
        </div>

        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

        <div class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <div class="p-2 bg-white">
                <div class="flex flex-col">
                    <div class="p-4">
                        <form action="{{route('groups.store')}}" method="POST">
                        @csrf
                            <div>
                                <x-jet-label for="name" :value="__('Group Name')" />

                                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" required autofocus />
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <x-jet-button class="w-full">
                                    {{ __('Create Group') }}
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

<script>
    function openModal(){
        document.getElementById('gmodal').classList.remove('hidden');
    }
    function closeModal(){
        document.getElementById('gmodal').classList.add('hidden');
    }
</script>