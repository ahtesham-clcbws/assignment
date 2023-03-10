<x-welcome-layout>
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block" style="display: flex;">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>
                            @if (isset($selectedLocation) && !empty($selectedLocation))
                                {{ $selectedLocation }}
                            @else
                                Select Location
                            @endif
                        </div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    @foreach (getLocations() as $loc)
                        <x-dropdown-item value:="{{ $loc }}"
                            class:="{{ $selectedLocation === $loc ? 'active' : '' }}">
                            {{ $loc }}</x-dropdown-item>
                    @endforeach
                </x-slot>
            </x-dropdown>
            @if (Route::has('login'))
                @auth
                    <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"
                        style="line-height: 28px; margin-left:15px;">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"
                        style="line-height: 28px; margin-left:15px;">Log in</a>

                @endauth
            @endif
        </div>

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <svg width="375.70625px" height="122px" xmlns="http://www.w3.org/2000/svg"
                    class="h-16 w-auto text-gray-700 sm:h-20" viewBox="62.146874999999994 14 375.70625 122"
                    style="background: rgba(0, 0, 0, 0);" preserveAspectRatio="xMidYMid">
                    <defs>
                        <linearGradient id="editing-outline-gradient" x1="-0.41354545764260087" x2="1.4135454576426008"
                            y1="0.09326335692419985" y2="0.9067366430758002">
                            <stop offset="0" stop-color="#ee4208"></stop>
                            <stop offset="1" stop-color="#4139ff"></stop>
                        </linearGradient>
                        <filter id="editing-outline" x="-100%" y="-100%" width="300%" height="300%">
                            <feMorphology in="SourceGraphic" operator="dilate" radius="1" result="outline">
                            </feMorphology>
                            <feComposite operator="out" in="outline" in2="SourceAlpha"></feComposite>
                        </filter>
                    </defs>
                    <g filter="url(#editing-outline)">
                        <g transform="translate(119.79879486560822, 99)">
                            <path
                                d="M26.05-29.57L26.05-29.57L26.05-29.57Q27.01-31.49 27.01-33.28L27.01-33.28L27.01-33.28Q27.01-35.07 26.82-36.06L26.82-36.06L26.82-36.06Q26.62-37.06 26.18-37.82L26.18-37.82L26.18-37.82Q25.22-39.49 23.30-39.49L23.30-39.49L23.30-39.49Q20.93-39.49 19.01-37.76L19.01-37.76L19.01-37.76Q16.96-35.97 16.96-33.15L16.96-33.15L16.96-33.15Q16.96-31.36 18.21-29.98L18.21-29.98L18.21-29.98Q19.46-28.61 21.38-27.33L21.38-27.33L21.38-27.33Q23.30-26.05 25.47-24.77L25.47-24.77L25.47-24.77Q27.65-23.49 29.57-21.95L29.57-21.95L29.57-21.95Q33.98-18.43 33.98-13.70L33.98-13.70L33.98-13.70Q33.98-10.50 32.29-7.78L32.29-7.78L32.29-7.78Q30.59-5.06 27.78-3.07L27.78-3.07L27.78-3.07Q21.63 1.28 13.50 1.28L13.50 1.28L13.50 1.28Q6.91 1.28 3.52-0.86L3.52-0.86L3.52-0.86Q0.13-3.01 0.13-6.27L0.13-6.27L0.13-6.27Q0.13-12.10 4.67-13.57L4.67-13.57L4.67-13.57Q5.95-14.02 7.90-14.02L7.90-14.02L7.90-14.02Q9.86-14.02 12.10-13.18L12.10-13.18L12.10-13.18Q11.07-10.56 11.07-8.19L11.07-8.19L11.07-8.19Q11.07-3.07 14.72-3.07L14.72-3.07L14.72-3.07Q17.09-3.07 19.04-4.80L19.04-4.80L19.04-4.80Q20.99-6.53 20.99-8.48L20.99-8.48L20.99-8.48Q20.99-10.43 19.74-11.84L19.74-11.84L19.74-11.84Q18.50-13.25 16.64-14.37L16.64-14.37L16.64-14.37Q14.78-15.49 12.64-16.58L12.64-16.58L12.64-16.58Q10.50-17.66 8.64-19.20L8.64-19.20L8.64-19.20Q4.29-22.72 4.29-28.35L4.29-28.35L4.29-28.35Q4.29-32 6.08-34.85L6.08-34.85L6.08-34.85Q7.87-37.70 10.75-39.62L10.75-39.62L10.75-39.62Q16.51-43.52 23.58-43.52L23.58-43.52L23.58-43.52Q30.66-43.52 34.08-41.41L34.08-41.41L34.08-41.41Q37.50-39.30 37.50-35.71L37.50-35.71L37.50-35.71Q37.50-32.58 35.07-30.59L35.07-30.59L35.07-30.59Q32.96-28.93 30.40-28.93L30.40-28.93L30.40-28.93Q27.84-28.93 26.05-29.57ZM64.77-10.82L64.77-10.82L64.77-10.82Q66.37-9.73 66.37-7.33L66.37-7.33L66.37-7.33Q66.37-4.93 65.15-3.39L65.15-3.39L65.15-3.39Q63.94-1.86 61.95-0.83L61.95-0.83L61.95-0.83Q57.86 1.28 53.44 1.28L53.44 1.28L53.44 1.28Q49.02 1.28 46.43 0.32L46.43 0.32L46.43 0.32Q43.84-0.64 42.11-2.43L42.11-2.43L42.11-2.43Q38.72-5.82 38.72-12.03L38.72-12.03L38.72-12.03Q38.72-21.70 43.97-27.58L43.97-27.58L43.97-27.58Q49.60-33.92 59.39-33.92L59.39-33.92L59.39-33.92Q65.47-33.92 68.48-31.36L68.48-31.36L68.48-31.36Q70.72-29.44 70.72-26.30L70.72-26.30L70.72-26.30Q70.72-15.04 51.26-15.04L51.26-15.04L51.26-15.04Q51.01-13.38 51.01-11.97L51.01-11.97L51.01-11.97Q51.01-9.02 52.32-7.90L52.32-7.90L52.32-7.90Q53.63-6.78 56.06-6.78L56.06-6.78L56.06-6.78Q58.50-6.78 61.09-7.90L61.09-7.90L61.09-7.90Q63.68-9.02 64.77-10.82ZM51.71-17.79L51.71-17.79L51.71-17.79Q56.26-17.79 58.88-20.61L58.88-20.61L58.88-20.61Q61.50-23.30 61.50-27.58L61.50-27.58L61.50-27.58Q61.50-29.06 60.96-29.86L60.96-29.86L60.96-29.86Q60.42-30.66 59.33-30.66L59.33-30.66L59.33-30.66Q58.24-30.66 57.31-30.24L57.31-30.24L57.31-30.24Q56.38-29.82 55.42-28.42L55.42-28.42L55.42-28.42Q53.06-25.22 51.71-17.79ZM92.93-17.98L92.93-17.98L92.93-17.98Q95.23-22.08 95.23-26.24L95.23-26.24L95.23-26.24Q95.23-28.99 93.25-28.99L93.25-28.99L93.25-28.99Q91.71-28.99 90.11-26.37L90.11-26.37L90.11-26.37Q88.45-23.74 87.94-20.35L87.94-20.35L84.61 0L71.36 1.28L77.89-32.64L88.45-33.92L87.30-27.46L87.30-27.46Q90.43-33.92 97.47-33.92L97.47-33.92L97.47-33.92Q101.18-33.92 103.20-32L103.20-32L103.20-32Q105.22-30.08 105.22-26.14L105.22-26.14L105.22-26.14Q105.22-22.21 102.62-19.71L102.62-19.71L102.62-19.71Q100.03-17.22 95.62-17.22L95.62-17.22L95.62-17.22Q93.70-17.22 92.93-17.98ZM129.47-31.55L129.47-31.55L129.47-31.55Q131.58-33.92 135.23-33.92L135.23-33.92L135.23-33.92Q137.47-33.92 139.20-32.70L139.20-32.70L139.20-32.70Q140.93-31.49 140.93-29.22L140.93-29.22L140.93-29.22Q140.93-26.94 140.22-24.51L140.22-24.51L140.22-24.51Q139.52-22.08 138.43-19.58L138.43-19.58L138.43-19.58Q136.26-14.72 133.25-10.69L133.25-10.69L133.25-10.69Q129.02-4.86 124.96-1.79L124.96-1.79L124.96-1.79Q120.90 1.28 116.48 1.28L116.48 1.28L116.48 1.28Q112.90 1.28 110.72 0.45L110.72 0.45L110.72 0.45Q110.34-12.99 109.86-17.79L109.86-17.79L109.86-17.79Q109.38-22.59 108.99-25.22L108.99-25.22L108.99-25.22Q108.35-30.34 106.43-31.55L106.43-31.55L106.43-31.55Q107.90-32.83 109.34-33.38L109.34-33.38L109.34-33.38Q110.78-33.92 113.76-33.92L113.76-33.92L113.76-33.92Q116.74-33.92 118.85-31.58L118.85-31.58L118.85-31.58Q120.96-29.25 121.38-25.12L121.38-25.12L121.38-25.12Q121.79-20.99 121.79-16L121.79-16L121.79-16Q121.79-11.01 121.41-4.99L121.41-4.99L121.41-4.99Q123.39-6.40 125.50-10.69L125.50-10.69L125.50-10.69Q128.38-16.64 129.41-23.81L129.41-23.81L129.41-23.81Q129.73-25.98 129.73-28.29L129.73-28.29L129.73-28.29Q129.73-30.59 129.47-31.55ZM158.02-3.52L158.02-3.52L158.02-3.52Q156.03 1.28 149.70 1.28L149.70 1.28L149.70 1.28Q146.43 1.28 144.38-0.96L144.38-0.96L144.38-0.96Q142.66-2.94 142.66-4.93L142.66-4.93L142.66-4.93Q142.66-10.11 145.02-20.22L145.02-20.22L147.39-32.64L160.38-33.92L156.48-13.70L156.48-13.70Q155.39-8.96 155.39-7.30L155.39-7.30L155.39-7.30Q155.39-3.65 158.02-3.52ZM148.54-41.54L148.54-41.54L148.54-41.54Q148.54-44.03 150.62-45.38L150.62-45.38L150.62-45.38Q152.70-46.72 155.71-46.72L155.71-46.72L155.71-46.72Q158.72-46.72 160.54-45.38L160.54-45.38L160.54-45.38Q162.37-44.03 162.37-41.54L162.37-41.54L162.37-41.54Q162.37-39.04 160.35-37.76L160.35-37.76L160.35-37.76Q158.34-36.48 155.33-36.48L155.33-36.48L155.33-36.48Q152.32-36.48 150.43-37.76L150.43-37.76L150.43-37.76Q148.54-39.04 148.54-41.54ZM194.88-26.62L194.88-26.62L194.88-26.62Q194.88-23.94 192.64-22.27L192.64-22.27L192.64-22.27Q190.40-20.61 186.75-20.61L186.75-20.61L186.75-20.61Q185.22-20.61 184.32-21.06L184.32-21.06L184.32-21.06Q185.02-22.72 185.25-24.80L185.25-24.80L185.25-24.80Q185.47-26.88 185.47-27.46L185.47-27.46L185.47-27.46Q185.47-30.14 183.62-30.14L183.62-30.14L183.62-30.14Q182.34-30.14 180.90-28.54L180.90-28.54L180.90-28.54Q179.46-26.94 178.24-24.45L178.24-24.45L178.24-24.45Q175.55-18.69 175.55-12.86L175.55-12.86L175.55-12.86Q175.55-9.66 176.77-8.22L176.77-8.22L176.77-8.22Q177.98-6.78 180.67-6.78L180.67-6.78L180.67-6.78Q184.38-6.78 187.33-9.86L187.33-9.86L187.33-9.86Q188.16-10.82 188.61-11.90L188.61-11.90L188.61-11.90Q191.04-10.62 191.04-7.10L191.04-7.10L191.04-7.10Q191.04-3.52 187.07-1.15L187.07-1.15L187.07-1.15Q182.98 1.28 176.45 1.28L176.45 1.28L176.45 1.28Q163.46 1.28 163.46-12.48L163.46-12.48L163.46-12.48Q163.46-22.53 169.15-28.29L169.15-28.29L169.15-28.29Q174.66-33.92 184.77-33.92L184.77-33.92L184.77-33.92Q194.88-33.92 194.88-26.62ZM222.53-10.82L222.53-10.82L222.53-10.82Q224.13-9.73 224.13-7.33L224.13-7.33L224.13-7.33Q224.13-4.93 222.91-3.39L222.91-3.39L222.91-3.39Q221.70-1.86 219.71-0.83L219.71-0.83L219.71-0.83Q215.62 1.28 211.20 1.28L211.20 1.28L211.20 1.28Q206.78 1.28 204.19 0.32L204.19 0.32L204.19 0.32Q201.60-0.64 199.87-2.43L199.87-2.43L199.87-2.43Q196.48-5.82 196.48-12.03L196.48-12.03L196.48-12.03Q196.48-21.70 201.73-27.58L201.73-27.58L201.73-27.58Q207.36-33.92 217.15-33.92L217.15-33.92L217.15-33.92Q223.23-33.92 226.24-31.36L226.24-31.36L226.24-31.36Q228.48-29.44 228.48-26.30L228.48-26.30L228.48-26.30Q228.48-15.04 209.02-15.04L209.02-15.04L209.02-15.04Q208.77-13.38 208.77-11.97L208.77-11.97L208.77-11.97Q208.77-9.02 210.08-7.90L210.08-7.90L210.08-7.90Q211.39-6.78 213.82-6.78L213.82-6.78L213.82-6.78Q216.26-6.78 218.85-7.90L218.85-7.90L218.85-7.90Q221.44-9.02 222.53-10.82ZM209.47-17.79L209.47-17.79L209.47-17.79Q214.02-17.79 216.64-20.61L216.64-20.61L216.64-20.61Q219.26-23.30 219.26-27.58L219.26-27.58L219.26-27.58Q219.26-29.06 218.72-29.86L218.72-29.86L218.72-29.86Q218.18-30.66 217.09-30.66L217.09-30.66L217.09-30.66Q216.00-30.66 215.07-30.24L215.07-30.24L215.07-30.24Q214.14-29.82 213.18-28.42L213.18-28.42L213.18-28.42Q210.82-25.22 209.47-17.79ZM249.79-22.46L249.79-22.46L249.79-22.46Q250.69-24.83 250.69-26.88L250.69-26.88L250.69-26.88Q250.69-30.66 247.62-30.66L247.62-30.66L247.62-30.66Q246.02-30.66 244.70-29.22L244.70-29.22L244.70-29.22Q243.39-27.78 243.39-25.98L243.39-25.98L243.39-25.98Q243.39-24.70 244.42-23.68L244.42-23.68L244.42-23.68Q245.89-22.27 249.66-19.97L249.66-19.97L249.66-19.97Q253.44-17.66 254.88-15.78L254.88-15.78L254.88-15.78Q256.32-13.89 256.32-11.30L256.32-11.30L256.32-11.30Q256.32-8.70 255.07-6.34L255.07-6.34L255.07-6.34Q253.82-3.97 251.58-2.30L251.58-2.30L251.58-2.30Q246.78 1.28 239.10 1.28L239.10 1.28L239.10 1.28Q234.94 1.28 231.74-0.90L231.74-0.90L231.74-0.90Q228.54-3.01 228.54-5.50L228.54-5.50L228.54-5.50Q228.54-8 230.37-9.47L230.37-9.47L230.37-9.47Q232.19-10.94 234.88-10.94L234.88-10.94L234.88-10.94Q237.57-10.94 239.23-9.92L239.23-9.92L239.23-9.92Q238.40-7.81 238.40-6.40L238.40-6.40L238.40-6.40Q238.40-2.18 241.98-2.18L241.98-2.18L241.98-2.18Q243.52-2.18 244.54-3.14L244.54-3.14L244.54-3.14Q245.57-4.10 245.57-5.76L245.57-5.76L245.57-5.76Q245.57-9.02 240.06-12.48L240.06-12.48L240.06-12.48Q235.58-15.42 234.56-16.58L234.56-16.58L234.56-16.58Q232.83-18.62 232.83-21.18L232.83-21.18L232.83-21.18Q232.83-23.74 234.05-26.18L234.05-26.18L234.05-26.18Q235.26-28.61 237.50-30.34L237.50-30.34L237.50-30.34Q242.18-33.92 250.30-33.92L250.30-33.92L250.30-33.92Q254.46-33.92 256.93-32.26L256.93-32.26L256.93-32.26Q259.39-30.59 259.39-27.78L259.39-27.78L259.39-27.78Q259.39-24.96 257.70-23.36L257.70-23.36L257.70-23.36Q256-21.76 252.93-21.76L252.93-21.76L252.93-21.76Q250.82-21.76 249.79-22.46Z"
                                fill="url(#editing-outline-gradient)"></path>
                        </g>
                    </g>
                    <style>
                        text {
                            font-size: 64px;
                            font-family: Arial Black;
                            dominant-baseline: central;
                            text-anchor: middle;
                        }
                    </style>
                </svg>
            </div>

            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg" style="min-width:250px;">
                {{-- <div class="grid grid-cols-1 md:grid-cols-2"> --}}
                @if (count($services))
                    <div class="grid gridCol1 md:gridCols3">
                        @foreach ($services as $service)
                            <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                                <div class="items-center">
                                    <img class="text-gray-500" src={{ asset($service->image) }}>
                                    <div class="mt-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">
                                        {{ $service->name }} <small><small
                                                style="color:antiquewhite">({{ $service->location }})</small></small>
                                        <br />
                                        {{ getSitePriceVisibility() ? 'Price $ ' . number_format($service->price, 2, '.', ',') : '' }}
                                    </div>
                                </div>

                                <div class="">
                                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                        {{ $service->description }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="p-6" style="width:400px;">
                        <div class="items-center">
                            <div class="text-xxl font-semibold text-gray-900 dark:text-white">
                                No Results Found.
                                <br />
                                <br />
                                Please select another location
                            </div>
                        </div>
                    </div>
                @endif

                {{-- <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round"
                                    d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z" />
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com"
                                    class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript
                                development. Check them out, see for yourself, and massively level up your development
                                skills in the process.
                            </div>
                        </div>
                    </div> --}}

                {{-- <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/"
                                    class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel News is a community driven portal and newsletter aggregating all of the latest
                                and most important news in the Laravel ecosystem, including new package releases and
                                tutorials.
                            </div>
                        </div>
                    </div>

                    <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-gray-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                            </svg>
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant
                                Ecosystem</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                Laravel's robust library of first-party tools and libraries, such as <a
                                    href="https://forge.laravel.com" class="underline">Forge</a>, <a
                                    href="https://vapor.laravel.com" class="underline">Vapor</a>, <a
                                    href="https://nova.laravel.com" class="underline">Nova</a>, and <a
                                    href="https://envoyer.io" class="underline">Envoyer</a> help you take your
                                projects
                                to the next level. Pair them with powerful open source libraries like <a
                                    href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a
                                    href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a
                                    href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a
                                    href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a
                                    href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a
                                    href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and
                                more.
                            </div>
                        </div>
                    </div> --}}
            </div>

        </div>
    </div>
</x-welcome-layout>
