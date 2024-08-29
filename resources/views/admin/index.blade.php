<div>
    <x-slot name="header">
        Accueil
    </x-slot>
    
    <div class="bg-light-gray w-full min-h-screen flex justify-center">

        {{-- Page container --}}
        <div class="w-8xl mx-4">

            {{-- Bar --}}
            <div class="flex justify-between max-w-8xl my-6">
                {{-- 'Create' links --}}
                <div class="flex gap-6 items-center">
                    <a href="{{ route('devices.create') }}"
                        class="group py-1.5 px-4 flex gap-2 items-center bg-white border-main-gray">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="text-anthracite-grey font-akazan text-base group-hover:text-gray-600 transition duration-300 ease-in-out">Nouvel équipement</span>
                    </a>
                    <a href="{{ route('owners.create') }}"
                        class="group py-1.5 px-4 flex gap-2 items-center bg-white border-main-gray">
                        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 12H20M12 4V20" stroke="#000000" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <span class="text-anthracite-grey font-akazan text-base group-hover:text-gray-600 transition duration-300 ease-in-out">Nouvel utilisateur</span>
                    </a>
                </div>

                {{-- Export and search --}}
                <div class="flex gap-8 items-center">

                    {{-- Export buttons --}}
                    <div class="flex items-center gap-5">
                        {{-- PDF --}}
                        <button type="button" class="group flex flex-col gap-2" title="Exporter la sélection actuelle au format PDF" wire:click="export('pdf')">
                            <svg width="30" height="30" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.172 0C23.7022 0 24.2107 0.210507 24.5857 0.585255L36.4137 12.4044C36.7891 12.7795 37 13.2884 37 13.8191V35.3333C37 37.9107 34.8689 40 32.24 40H7.76C5.13112 40 3 37.9107 3 35.3333V4.66667C3 2.08934 5.13112 0 7.76 0H23.172Z" fill="#FD5555"/>
                                <g filter="url(#filter0_d_1255_158068)">
                                <path d="M35.1548 12.1381C35.4678 12.4537 35.2443 12.9902 34.7998 12.9902H29C26.4227 12.9902 24.0976 10.7233 24.0976 8.21031V2.20435C24.0976 1.75791 24.6382 1.53528 24.9526 1.85224L35.1548 12.1381Z" fill="white" fill-opacity="0.24" shape-rendering="crispEdges"/>
                                </g>
                                <path d="M16.0667 15.9902C15.2131 15.9902 14.5111 16.6922 14.5111 17.5458C14.5111 18.6069 15.1007 19.9243 15.7215 21.1625C15.2362 22.6816 14.6856 24.3096 13.9813 25.6833C12.5397 26.2489 11.2542 26.6693 10.4812 27.2923C10.4692 27.3046 10.4578 27.3176 10.4472 27.3312C10.1648 27.62 10 28.0133 10 28.4347C10 29.2883 10.702 29.9902 11.5556 29.9902C11.9718 29.9902 12.3736 29.8349 12.6639 29.5382C12.6739 29.5304 12.6837 29.5223 12.6931 29.5138C13.262 28.8345 13.9328 27.6021 14.5306 26.4757C15.9081 25.9338 17.3519 25.3824 18.7451 25.0513C19.7622 25.871 21.2336 26.4125 22.4444 26.4125C23.298 26.4125 24 25.7105 24 24.8569C24 24.0033 23.298 23.3013 22.4444 23.3013C21.4734 23.3013 20.0623 23.648 18.9833 24.0111C18.1088 23.1901 17.3053 22.1647 16.7278 21.075C17.1404 19.8038 17.6222 18.532 17.6222 17.5458C17.6222 16.6922 16.9203 15.9902 16.0667 15.9902ZM16.0667 16.9236C16.4158 16.9236 16.6889 17.1966 16.6889 17.5458C16.6889 18.0127 16.4389 18.8723 16.1493 19.7965C15.7624 18.8974 15.4444 18.0348 15.4444 17.5458C15.4444 17.1966 15.7175 16.9236 16.0667 16.9236ZM16.334 22.2465C16.8019 22.9907 17.3498 23.6832 17.9479 24.2979C17.0254 24.5501 16.1245 24.8733 15.2354 25.2118C15.6648 24.2426 16.0086 23.2368 16.334 22.2465ZM22.4444 24.2347C22.7936 24.2347 23.0667 24.5077 23.0667 24.8569C23.0667 25.2061 22.7936 25.4791 22.4444 25.4791C21.7435 25.4791 20.7472 25.1627 19.9507 24.7208C20.8649 24.4623 21.8625 24.2347 22.4444 24.2347ZM13.1597 27.0201C12.7223 27.8009 12.2875 28.5297 11.9833 28.8965C11.8794 28.9958 11.7412 29.0569 11.5556 29.0569C11.2064 29.0569 10.9333 28.7838 10.9333 28.4347C10.9333 28.2704 11.0032 28.1072 11.0986 28.002C11.4635 27.7196 12.2574 27.3812 13.1597 27.0201Z" fill="white"/>
                                <defs>
                                <filter id="filter0_d_1255_158068" x="22.0977" y="1.70337" width="15.2031" height="15.2869" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="2"/>
                                <feGaussianBlur stdDeviation="1"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1255_158068"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1255_158068" result="shape"/>
                                </filter>
                                </defs>
                            </svg>
                            <p class="text-sm text-anthracite-grey group-hover:text-gray-600 transition duration-200 ease-in-out border rounded bg-white font-akazan">PDF</p>
                        </button>

                        {{-- Excel --}}
                        <button type="button" class="group flex flex-col gap-2 items-center" title="Exporter la sélection actuelle vers Excel" wire:click="export('xlsx')">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="fill-main-blue" d="M23.172 0C23.7022 0 24.2107 0.210507 24.5857 0.585255L36.4137 12.4044C36.7891 12.7795 37 13.2884 37 13.8191V35.3333C37 37.9107 34.8689 40 32.24 40H7.76C5.13112 40 3 37.9107 3 35.3333V4.66667C3 2.08934 5.13112 0 7.76 0H23.172Z" />
                                <g filter="url(#filter0_d_1255_158054)">
                                <path d="M35.1548 12.1381C35.4678 12.4537 35.2443 12.9902 34.7998 12.9902H29C26.4227 12.9902 24.0976 10.7233 24.0976 8.21031V2.20435C24.0976 1.75791 24.6382 1.53528 24.9526 1.85224L35.1548 12.1381Z" fill="white" fill-opacity="0.24" shape-rendering="crispEdges"/>
                                </g>
                                <path d="M23.9959 16L23.9956 16.0112L24 16.0113V30H22.8337L22.8336 29.9983H19.3263L18.1603 30L18.1601 29.9983H15.8517L14.6855 30L14.6854 29.9983H11.1701L10.0041 30L10.0039 29.9983L10.0017 28.8328L10.0039 28.8326V25.3104L10.0009 24.1449L10.0039 24.1447V20.6224L10 20.6227V19.457L10.0039 19.4568V17.1657L10 17.1657V16H23.9959ZM14.6854 25.3104H11.1701V28.8326H14.6854V25.3104ZM18.1601 25.3104H15.8517V28.8326H18.1601V25.3104ZM22.8336 25.3104H19.3263V28.8326H22.8336V25.3104ZM14.6854 20.6224H11.1701V24.1447H14.6854V20.6224ZM18.1601 20.6224H15.8517V24.1447H18.1601V20.6224ZM22.8336 20.6224H19.3263V24.1447H22.8336V20.6224ZM22.8336 17.1657H11.1701V19.4568H22.8336V17.1657Z" fill="white"/>
                                <defs>
                                <filter id="filter0_d_1255_158054" x="22.0977" y="1.70337" width="15.2031" height="15.2869" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="2"/>
                                <feGaussianBlur stdDeviation="1"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.04 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1255_158054"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1255_158054" result="shape"/>
                                </filter>
                                </defs>
                            </svg>
                            <p class="text-sm text-anthracite-grey group-hover:text-gray-600 transition duration-200 ease-in-out border rounded bg-white px-1 font-akazan">XLSX</p>
                        </button>
                    </div>

                    {{-- Search bar --}}
                    <input wire:model.live="search" type="search" placeholder="Rechercher..." aria-label="Rechercher du contenu dans l'application" class="border rounded-md border-main-gray">
                </div>

                
                
            </div>

            {{-- Main table --}}
            <div>
                {{-- Heading --}}
                <div class="bg-main-gray px-4 py-6 rounded">
                    <ul class="flex font-proxima">
                        <li class="basis-28 text-center">Poste</li>
                        <li class="basis-44 text-center">Type</li>
                        <li class="basis-48 text-center">Utilisateur</li>
                        <li class="basis-36 text-center">Emplacement</li>
                        <li class="basis-32 text-center">Service</li>
                        <li class="basis-36 text-center">Téléphone</li>
                        <li class="basis-32 text-center">IP</li>
                    </ul>
                </div>

                {{-- Content --}}
                @foreach ($devices as $device)
                    <div class="bg-white px-4 text-gray-900 py-6 rounded flex items-center border-b" wire:key="{{ $device->id }}">
                    
                        {{-- Poste --}}
                        <p class="basis-28 font-semibold text-center">{{ $device->code }}</p>
                    
                        {{-- Type --}}
                        <div class="basis-44">
                            <p class="text-center">{{ $device->type->name }}</p>
                        </div>
                    
                        {{-- Owner --}}
                        <div class="basis-48">
                            @if ($device->owner)
                                <p class="text-center">{{ $device->owner->name }}</p>
                            @else
                                <p class="text-center text-anthracite-grey">Pas d'utilisateur assigné</p>
                            @endif
                        </div>
                    
                        {{-- Location --}}
                        <div class="basis-36">
                            @if ($device->location)
                                <p class="text-center">{{ $device->location->name }}</p>
                            @else
                                <p class="text-center text-anthracite-grey">Non défini</p>
                            @endif
                            
                        </div>

                        {{-- Service --}}
                        <div class="basis-32">
                            @if ($device->service)
                                <p class="text-center">{{ $device->service->name }}</p>
                            @else
                                <p class="text-center text-anthracite-grey">Non défini</p>
                            @endif
                                
                        </div>
                    
                        {{-- Phone number --}}
                        <div class="basis-36">
                            <p class="text-center">{{ $device->phone_number ? preg_replace('/(\d{2})(\d{2})(\d{2})(\d{2})(\d{2})/', '$1 $2 $3 $4 $5', '0' . $device->phone_number) : '' }}</p>
                        </div>

                        {{-- IP --}}
                        <div class="basis-32">
                            <p class="text-center">{{ $device->ip }}</p>
                        </div>
                    
                        {{-- Buttons --}}
                        <div class="flex gap-6 ml-12">
                            {{-- Edit --}}
                            <a href="{{ route('devices.edit', $device) }}" class="rounded-md border border-gray-300 px-3 py-1.5 bg-main-gray hover:bg-main-gray/75 transition duration-200 ease">Modifier</a>
                        
                            {{-- Delete --}}
                            <form action="{{ route('devices.destroy', $device) }}" method="POST" x-data="{ open: false }">
                                @method('DELETE')
                                @csrf
                                <button type="button" @click="open = true" class="rounded-md shadow-sm px-3 py-1.5 bg-light-orange hover:bg-main-orange transition duration-200 ease">Supprimer</button>
                            
                                {{-- Confirmation modal window --}}
                                {{-- Overlay --}}
                                <div x-show="open" x-cloak class="absolute top-0 left-0 w-full h-screen bg-black/50"></div>
                            
                                {{-- Full width container --}}
                                <div x-show="open" x-transition x-cloak class="fixed left-0 top-0 w-full h-screen flex justify-center items-center">
                                    {{-- Modal --}}
                                    <div @click.outside="open = false" class="bg-main-gray flex flex-col p-24 items-center gap-24 rounded border shadow z-10 w-6/12">
                                        <p class="font-semibold text-3xl">Êtes-vous sûr de vouloir supprimer cet équipement ?</p>
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
    
    
</div>