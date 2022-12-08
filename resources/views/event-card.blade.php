@props(['event'])

<a href="{{ route('event.show', $event) }}" class="rounded-lg overflow-hidden shadow-md mb-3">
    {{-- <div class="w-full h-64 bg-top bg-cover" style="background-image: url(https://www.si.com/.image/t_share/MTY4MTkyMjczODM4OTc0ODQ5/cfp-trophy-deitschjpg.jpg)"></div> --}}
    <div class="flex flex-col w-full md:flex-row">
        <div class="flex flex-row justify-around p-4 font-bold leading-none text-gray-800 uppercase bg-green-200 md:flex-col md:items-center md:justify-center md:w-1/4">
            <div class="md:text-3xl">{{ $event->date['month'] }}</div>
            <div class="md:text-6xl">{{ $event->date['day'] }}</div>
            <div class="md:text-xl">{{ $event->date['time'] }}</div>
        </div>
        <div class="p-4 font-normal text-gray-800 bg-white md:w-3/4">
            <h1 class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-800">{{ $event->title }}</h1>
            <p class="leading-normal">{!! $event->description !!}</p>
            <!--div class="flex flex-row items-center mt-4 text-gray-700">
                <div class="w-1/2">
                    Mercedes-Benz Superdome
                </div>
                <div class="w-1/2 flex justify-end">
                    <img src="https://collegefootballplayoff.com/images/section_logo.png" alt="" class="w-8">
                </div>
            </div-->
        </div>
    </div>
</a>
