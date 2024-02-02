<x-master title="Page d'accueil">

<div class="max-w-screen-lg mx-auto p-5 sm:p-10 md:p-16">

    <style>

        .flex-img {
            width: 200px; /* Set the width to 200px */
            height: auto; /* Maintain aspect ratio */
            margin: 5px; /* Add margin for spacing between images */
        }
    </style>

    <div class="mb-10 rounded overflow-hidden flex flex-col mx-auto text-center">
        <a href="#" class="max-w-3xl mx-auto space-y-4 text-xl sm:text-5xl mb-6 font-semibold inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-6">{{$aventure->titre}}</a>
        <div class="flex justify-center items-center">
            @foreach($aventure->images as $img)
                <img class="flex-img" src="{{ asset('storage/' . $img->text) }}" alt="Sunset in the mountains">
            @endforeach
        </div>


        <a href="#" class="max-w-3xl mx-auto text-xl sm:text-2xl font-semibold inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-6">{{$aventure->aventureDescription}}</a>

        <p class="text-gray-700 text-base leading-8 max-w-2xl mx-auto mb-4">
            {!! $aventure->consiel !!}
        </p>
        <div class="py-5 text-sm font-regular text-gray-900 flex items-center justify-center mb-4">
            <span class="mr-3 flex flex-row items-center">
                <svg class="text-indigo-600" fill="currentColor" height="13px" width="13px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                        <g>
                            <path d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256
			c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128
			c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z" />
                        </g>
                    </g>
                </svg>
                <span class="ml-1">{{$aventure->created_at->diffForHumans()}}</span></span>
            <a href="#" class="flex flex-row items-center hover:text-indigo-600  mr-3">
                <svg class="text-indigo-600" fill="currentColor" height="16px" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path fill="currentColor" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"></path>
                    <path d="M0 0h24v24H0z" fill="none"></path>
                </svg>
                <span class="ml-1">{{$aventure->user->username}}</span></a>


        </div>

        <div class="py-5 text-sm font-regular text-gray-900 flex items-center justify-center mb-4">
            <a href="#" class="flex flex-row items-center hover:text-indigo-600">

            </a>
        </div>
    </div>

</div>
</x-master>
