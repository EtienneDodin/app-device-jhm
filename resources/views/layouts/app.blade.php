<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="antialiased">
    <x-banner />

    <div class="min-h-screen flex">
        {{-- @livewire('navigation-menu') --}}

        <header class="w-[4%] min-w-12 flex justify-center">
            {{-- Sidenav --}}
            <nav class="fixed inset-y-1/4 py-4 h-screen">
                <ul class="flex flex-col items-center gap-8 px-2">

                    <li class="hover:-translate-y-2 transition duration-150 ease-in-out">
                        <a href="{{ route('index') }}" class="group flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-dark-blue" height="40px" width="30px" viewBox="0 0 576 512"><path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/></svg>
                            <span class="text-gray-600 absolute invisible opacity-0 group-hover:visible left-14 group-hover:left-16 group-hover:opacity-100 font-akazan text-base">Accueil</span>
                        </a>
                    </li>

                    <li class="hover:-translate-y-2 transition duration-150 ease-in-out">
                        <a href="{{ route('owners.index') }}" class="group flex gap-4 items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-dark-blue" width="35px" height="30px" viewBox="0 0 640 512"><path d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z"/></svg>
                            <span class="text-gray-600 absolute invisible opacity-0 group-hover:visible left-14 group-hover:left-16 group-hover:opacity-100 font-akazan text-base">Utilisateurs</span>
                        </a>
                    </li>

                    <li class="hover:-translate-y-2 transition duration-150 ease-in-out">
                        <a href="{{ route('locations.index') }}" class="group flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-dark-blue" width="30px" height="33px" viewBox="0 0 384 512"><path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                            <span class="text-gray-600 font-akazan absolute invisible opacity-0 group-hover:visible left-14 group-hover:left-16 group-hover:opacity-100 text-base">Emplacements</span>
                        </a>
                    </li>

                    <li class="hover:-translate-y-2 transition duration-150 ease-in-out">
                        <a href="{{ route('services.index') }}" class="group flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="fill-dark-blue" width="30px" height="35px" viewBox="0 0 512 512"><path d="M384 48c8.8 0 16 7.2 16 16l0 384c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16L80 64c0-8.8 7.2-16 16-16l288 0zM96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z"/></svg>
                            <span class="text-gray-600 absolute invisible opacity-0 group-hover:visible left-14 group-hover:left-16 group-hover:opacity-100 font-akazan text-base">Services</span>
                        </a>
                    </li>

                    <li class="hover:-translate-y-2 transition duration-150 ease-in-out">
                        <a href="{{ route('types.index') }}" class="group flex items-center">
                            <svg class="fill-dark-blue" width="40px" height="40px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8,2h8a2,2,0,0,1,2,2V20a2,2,0,0,1-2,2H8a2,2,0,0,1-2-2V4A2,2,0,0,1,8,2M8,4V6h8V4H8m8,4H8v2h8V8m0,10H14v2h2Z" />
                                <rect width="24" height="24" fill="none" />
                            </svg>
                            <span class="text-gray-600 absolute invisible opacity-0 group-hover:visible left-14 group-hover:left-16 group-hover:opacity-100 font-akazan text-base">Types d'équipement</span>
                        </a>
                    </li>

                    <li class="hover:-translate-y-2 transition duration-150 ease-in-out">
                        <x-dropdown align="left" width="48">
                            <x-slot name="trigger">
                                <button type="button">
                                    <svg width="70" height="60" class="hover:fill-dark-blue" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.24" d="M100 156C130.928 156 156 130.928 156 100C156 69.0721 130.928 44 100 44C69.0721 44 44 69.0721 44 100C44 130.928 69.0721 156 100 156Z" fill="#919EAB"/>
                                        <path d="M99.9996 100.426C105.985 100.426 110.837 95.8531 110.837 90.2128C110.837 84.5724 105.985 80 99.9996 80C94.0143 80 89.1622 84.5724 89.1622 90.2128C89.1622 95.8531 94.0143 100.426 99.9996 100.426ZM92.5445 103.604C97.3943 102.09 102.605 102.09 107.455 103.604C112.222 105.092 116.174 108.401 118.415 112.782L119.639 115.174C120.481 116.819 119.801 118.822 118.12 119.647C117.647 119.879 117.125 120 116.595 120H83.4039C81.524 120 80 118.508 80 116.667C80 116.148 80.1235 115.637 80.3606 115.174L81.5843 112.782C83.8255 108.401 87.7774 105.092 92.5445 103.604Z" fill="#919EAB"/>
                                    </svg> 
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Gérer mon compte') }}
                                </div>

                                <x-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Profil') }}
                                </x-dropdown-link>

                                <div class="border-t border-gray-200"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
    
                                    <x-dropdown-link href="{{ route('logout') }}"
                                             @click.prevent="$root.submit();">
                                        {{ __('Se déconnecter') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                        {{-- <span class="text-gray-600 absolute invisible opacity-0 group-hover:visible left-14 group-hover:left-16 group-hover:opacity-100 font-akazan text-base">Admin</span> --}}
                    </li>
                    
                </ul>
            </nav>
        </header>
        

        <!-- Page Content -->
        <main class="w-[96%]">
            <div>
                <div class="flex justify-center">

                    {{-- Heading --}}
                    <div class="mb-4 flex flex-col gap-1 w-8xl">
                        {{-- Title and logo --}}
                        <div class="flex gap-80 items-center justify-center pt-12 pb-10">
                            <h1 class="font-akazan text-6xl text-main-blue">{{ $header }}</h1>
                            <svg width="105" height="29" viewBox="0 0 105 29" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M54.9652 14.2364V28.1262H60.2617V14.3183C60.3014 12.0583 61.4872 10.9487 63.819 10.9487C66.1509 10.9487 67.3369 12.0583 67.4554 14.3183V25.414C67.4554 27.1397 68.3248 28.0028 70.064 28.1262H72.7915V15.428C72.8308 9.223 69.8667 6.14069 63.8981 6.14069C61.2105 6.14069 59.1553 6.71576 57.6533 7.90758C56.1512 6.67516 54.096 6.05859 51.4082 6.05859C45.4398 6.05859 42.4358 9.14053 42.4358 15.3456V28.126H47.7719V14.2364C47.8111 11.9764 48.9971 10.8666 51.3292 10.8666C53.6607 10.8666 54.8467 11.9764 54.9652 14.2364Z"
                                    fill="#007CB0" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M81.5652 28.1598L81.5676 13.1953C81.5681 8.9924 84.9754 5.5857 89.1783 5.5857H104.139V0.226807H88.4538C81.6897 0.226807 76.2063 5.71004 76.2063 12.4741V28.1598H81.5652Z"
                                    fill="#009CB4" />
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M21.2181 0.182129V14.1543V28.1375H26.5144V14.2364C26.5541 11.9763 27.7401 10.8666 30.0717 10.8666C32.4038 10.8666 33.5898 11.9763 33.7083 14.2364V25.414V28.1258H36.3167H39.0444V15.3461C39.0836 9.14087 36.1192 6.05857 30.151 6.05857C28.8312 6.05857 27.7081 6.18527 26.6839 6.46743V2.75345C26.6839 1.33335 25.5327 0.182129 24.1126 0.182129H21.2181Z"
                                    fill="#007CB0" />
                                <mask id="mask0_0_6254" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="6" width="18"
                                    height="23">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M0.00012207 6.05835H17.8268V28.2H0.00012207V6.05835Z" fill="white" />
                                </mask>
                                <g mask="url(#mask0_0_6254)">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M17.8268 20.1042C17.6255 26.7732 12.361 27.791 12.361 27.791C11.3369 28.0732 10.2135 28.2001 8.89371 28.2001C2.92553 28.2001 -0.0388125 25.1176 0.000508128 18.9126V17.1264H5.33647V19.8384V20.0223C5.45516 22.2823 6.64097 23.392 8.97308 23.392C11.3047 23.392 12.4906 22.2823 12.5303 20.0223V8.36207C12.5303 7.08961 13.5618 6.05835 14.834 6.05835H17.8268V20.1042Z"
                                        fill="#007CB0" />
                                </g>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M104.139 8.98901H98.7658V15.288C98.7658 19.4374 95.4019 22.8011 91.2526 22.8011H84.9679V28.16H91.9686C98.6903 28.16 104.139 22.711 104.139 15.9894V8.98901ZM90.1727 17.7237C92.1223 17.7237 93.703 16.1431 93.703 14.1934C93.703 12.2438 92.1223 10.6631 90.1727 10.6631C88.223 10.6631 86.6426 12.2438 86.6426 14.1934C86.6426 16.1431 88.223 17.7237 90.1727 17.7237Z"
                                    fill="#007CB0" />
                            </svg>
                        </div>

                        {{-- Breadcrumb --}}
                        <div class="flex gap-2 text-gray-700">
                            {{-- Home --}}
                            @if (request()->routeIs('index'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                            @endif

                            {{-- First-level links --}}
                            @if (request()->routeIs('owners.index'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('owners.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des utilisateurs</a>
                            @endif

                            @if (request()->routeIs('locations.index'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('locations.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des emplacements</a>
                            @endif
                            
                            @if (request()->routeIs('services.index'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('services.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des services</a>
                            @endif
                            
                            @if (request()->routeIs('types.index'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('types.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des types d'équipement</a>
                            @endif

                            {{-- Second-level links --}}

                            @if (request()->routeIs('devices.create'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('devices.create') }}" class="underline underline-offset-2 decoration-slate-300">Créer un équipement</a>
                            @endif

                            @if (request()->routeIs('devices.edit'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <p>Modifier un équipement</p>
                            @endif

                            @if (request()->routeIs('owners.create'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('owners.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des utilisateurs</a>
                                <span>/</span>
                                <a href="{{ route('owners.create') }}" class="underline underline-offset-2 decoration-slate-300">{{ $header }}</a>
                            @endif

                            @if (request()->routeIs('owners.edit'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('owners.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des utilisateurs</a>
                                <span>/</span>
                                <p>Modifier un utilisateur</p>
                            @endif

                            @if (request()->routeIs('locations.create'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('locations.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des emplacements</a>
                                <span>/</span>
                                <a href="{{ route('locations.create') }}" class="underline underline-offset-2 decoration-slate-300">{{ $header }}</a>
                            @endif

                            @if (request()->routeIs('services.create'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('services.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des services</a>
                                <span>/</span>
                                <a href="{{ route('services.create') }}" class="underline underline-offset-2 decoration-slate-300">{{ $header }}</a>
                            @endif

                            @if (request()->routeIs('types.create'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('types.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des types d'équipement</a>
                                <span>/</span>
                                <a href="{{ route('types.create') }}" class="underline underline-offset-2 decoration-slate-300">{{ $header }}</a>
                            @endif

                            @if (request()->routeIs('types.edit'))
                                <a href="{{ route('index') }}" class="underline underline-offset-2 decoration-slate-300">Accueil</a>
                                <span>/</span>
                                <a href="{{ route('types.index') }}" class="underline underline-offset-2 decoration-slate-300">Gestion des types d'équipement</a>
                                <span>/</span>
                                <p>Modifier un type</p>
                            @endif

                        </div>
                        
                    </div>
                </div>
                
                {{-- Main content --}}

                @if (request()->routeIs('index'))
                    <livewire:home-controller />
                @else
                    {{ $slot }}
                @endif
                
        </main>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>
