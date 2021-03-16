<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col items-start justify-start w-40 text-center">
            <button class="px-8 py-3 text-base font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md hover:bg-indigo-200 md:py-4 md:text-lg md:px-10" id="startButton">START</button>
            <button class="hidden px-8 py-3 text-base font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 md:py-4 md:text-lg md:px-10" id="stopButton">STOP</button>
        </div>
    </x-slot>

    <div class="py-40">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="flex flex-col">
                    <h1 id="headerNames" class="text-xl font-bold text-center text-white lg:text-6xl"></h1>
                </div>
            </div>
        </div>
    </div>
    <script>
        const namesList = [];

        var participants = <?php echo json_encode($participants); ?>;

        participants.forEach(PassNames);

        function PassNames(item, index) {
            namesList.push(item['name']);
        }

        
        // Default variables
        let intervalHandle = null;
        var temp;
        const startButton = document.getElementById('startButton');
        const stopButton = document.getElementById('stopButton');
        const headerNames = document.getElementById('headerNames');
        const tempNames = document.getElementById('tempNames');

        startButton.addEventListener('click', function() {
            this.style.display = "none";
            stopButton.style.display = "block";
            intervalHandle = setInterval(function () {
                temp = Math.floor(Math.random() * namesList.length);;
                headerNames.textContent = namesList[temp];
            }, 50);
        });

        stopButton.addEventListener('click', function() {
            this.style.display = "none";
            startButton.style.display = "block";
            clearInterval(intervalHandle);
            namesList.splice(temp,1);
        });
        </script>
</x-app-layout>
