<x-app-layout>
    <x-slot name="header">
            Liste des emplacements
    </x-slot>

    <div class="flex flex-col items-center">
        {{-- Créer un nouvel emplacement --}}
        <a href="{{ route('locations.create') }}" class="group mt-4 mb-16 py-1.5 px-4 flex gap-2 items-center bg-white hover:bg-light-gray transition duration-200 ease-in-out border rounded-md border-main-gray">
            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
            <span class="font-akazan text-base text-gray-600">Ajouter un emplacement</span>
        </a>

        {{-- Liste des emplacements --}}
        <div>
            <div class="bg-light-gray font-proxima flex gap-16 items-center">
                <h1 class="text-lg pl-4 pr-28 py-4">Liste des emplacements</h1>
            </div>

            @foreach ($locations as $location)
                <div class="flex relative py-1 items-center">
                    <p class="px-4 py-3 rounded font-proxima border-b">{{ $location->name }}</p>

                    <div class="absolute -right-44 flex gap-6 items-center">
                        {{-- edit --}}
                        <a href="{{ route('locations.edit', $location) }}" class="rounded-md">
                            <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7566 2.62145C16.5852 0.792851 19.55 0.792851 21.3786 2.62145C23.2072 4.45005 23.2072 7.41479 21.3786 9.24339L11.8933 18.7287C11.3514 19.2706 11.0323 19.5897 10.6774 19.8665C10.2592 20.1927 9.80655 20.4725 9.32766 20.7007C8.92136 20.8943 8.49334 21.037 7.76623 21.2793L4.43511 22.3897L3.63303 22.6571C2.98247 22.8739 2.26522 22.7046 1.78032 22.2197C1.29542 21.7348 1.1261 21.0175 1.34296 20.367L2.72068 16.2338C2.96303 15.5067 3.10568 15.0787 3.29932 14.6724C3.52755 14.1935 3.80727 13.7409 4.13354 13.3226C4.41035 12.9677 4.72939 12.6487 5.27137 12.1067L14.7566 2.62145ZM4.40051 20.8201L7.24203 19.8729C8.03314 19.6092 8.36927 19.4958 8.68233 19.3466C9.06287 19.1653 9.42252 18.943 9.75492 18.6837C10.0284 18.4704 10.2801 18.2205 10.8698 17.6308L18.4393 10.0614C17.6506 9.78321 16.6346 9.26763 15.6835 8.31651C14.7324 7.36538 14.2168 6.34939 13.9387 5.56075L6.36917 13.1302C5.77951 13.7199 5.52959 13.9716 5.3163 14.2451C5.05704 14.5775 4.83476 14.9371 4.65341 15.3177C4.50421 15.6307 4.3908 15.9669 4.12709 16.758L3.17992 19.5995L4.40051 20.8201ZM15.1554 4.34404C15.1896 4.519 15.2474 4.75684 15.3438 5.03487C15.561 5.66083 15.9712 6.48288 16.7442 7.25585C17.5171 8.02881 18.3392 8.43903 18.9651 8.6562C19.2432 8.75266 19.481 8.81046 19.656 8.84466L20.3179 8.18272C21.5607 6.93991 21.5607 4.92492 20.3179 3.68211C19.0751 2.4393 17.0601 2.4393 15.8173 3.68211L15.1554 4.34404Z" fill="#1C274C"/>
                            </svg>
                        </a>

                        {{-- delete --}}
                        <form action="{{ route('locations.destroy', $location) }}" method="POST" x-data="{ open: false }">
                            @method('DELETE')
                            @csrf
                            <button type="button" @click="open = true" class="rounded-md px-3 py-1.5 border decoration-main-gray text-gray-500 text-sm hover:bg-light-gray">
                                <svg enable-background="new 0 0 40 40" width="20px" height="30px" id="Слой_1" version="1.1" viewBox="0 0 40 40" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g><path d="M28,40H11.8c-3.3,0-5.9-2.7-5.9-5.9V16c0-0.6,0.4-1,1-1s1,0.4,1,1v18.1c0,2.2,1.8,3.9,3.9,3.9H28c2.2,0,3.9-1.8,3.9-3.9V16   c0-0.6,0.4-1,1-1s1,0.4,1,1v18.1C33.9,37.3,31.2,40,28,40z"/></g>
                                    <g><path d="M33.3,4.9h-7.6C25.2,2.1,22.8,0,19.9,0s-5.3,2.1-5.8,4.9H6.5c-2.3,0-4.1,1.8-4.1,4.1S4.2,13,6.5,13h26.9   c2.3,0,4.1-1.8,4.1-4.1S35.6,4.9,33.3,4.9z M19.9,2c1.8,0,3.3,1.2,3.7,2.9h-7.5C16.6,3.2,18.1,2,19.9,2z M33.3,11H6.5   c-1.1,0-2.1-0.9-2.1-2.1c0-1.1,0.9-2.1,2.1-2.1h26.9c1.1,0,2.1,0.9,2.1,2.1C35.4,10.1,34.5,11,33.3,11z"/></g>
                                    <g><path d="M12.9,35.1c-0.6,0-1-0.4-1-1V17.4c0-0.6,0.4-1,1-1s1,0.4,1,1v16.7C13.9,34.6,13.4,35.1,12.9,35.1z"/></g>
                                    <g><path d="M26.9,35.1c-0.6,0-1-0.4-1-1V17.4c0-0.6,0.4-1,1-1s1,0.4,1,1v16.7C27.9,34.6,27.4,35.1,26.9,35.1z"/></g>
                                    <g><path d="M19.9,35.1c-0.6,0-1-0.4-1-1V17.4c0-0.6,0.4-1,1-1s1,0.4,1,1v16.7C20.9,34.6,20.4,35.1,19.9,35.1z"/></g>
                                </svg>
                            </button>

                            {{-- Confirmation modal window --}}
                            {{-- Overlay --}}
                            <div x-show="open" x-cloak class="fixed top-0 left-0 w-full h-screen bg-black/50"></div>

                            {{-- Full width container --}}
                            <div x-show="open" x-transition x-cloak class="fixed left-0 top-0 w-full h-screen z-10 flex justify-center items-center">
                                {{-- Modal --}}
                                <div @click.outside="open = false" class="bg-main-gray flex flex-col p-24 items-center gap-24 rounded border shadow z-10 w-6/12">
                                    <p class="font-semibold text-3xl">Êtes-vous sûr de vouloir supprimer cet emplacement ?</p>
                                    <div class="flex gap-20">
                                        <button type="submit" class="rounded-md bg-main-orange hover:bg-red py-1.5 px-8">Oui</button>
                                        <button type="button" @click="open = false" class="rounded-md py-1.5 bg-main-gray hover:bg-anthracite-grey border border-gray-700 px-8">Non</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            @endforeach
        </div>

    </div>

    </div>
</x-app-layout>