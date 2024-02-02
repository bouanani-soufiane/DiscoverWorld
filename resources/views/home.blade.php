@php use Illuminate\Support\Facades\Auth; @endphp
<x-master title="Page d'accueil">
    @if(Session::has('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 px-4 py-3" role="alert">
            <p class="font-bold">{{session::get('success')}}</p>
        </div>
    @endif
        <!-- component -->
        <div class="py-16 bg-gradient-to-br from-green-50 to-cyan-100">
            <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6">
                <div class="mb-12 space-y-2 text-center">
                    <span class="block w-max mx-auto px-3 py-1.5 border border-green-200 rounded-full bg-green-100 text-green-600">Blog</span>
                    <h2 class="text-2xl text-cyan-900 font-bold md:text-4xl">Sharing is Caring</h2>
                    <p class="lg:w-6/12 lg:mx-auto">Quam hic dolore cumque voluptate rerum beatae et quae, tempore sunt, debitis dolorum officia aliquid explicabo? Excepturi, voluptate?</p>
                </div>

                <div class="grid gap-12 lg:grid-cols-4">
                    @foreach($continents as $continent)
                    <div class="p-1 rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
                        <img src="{{ asset('storage/' . $continent->image->text) }}" alt="art cover" loading="lazy" width="1000" height="667" class="h-56 sm:h-full w-full sm:w-5/12 object-cover object-top rounded-lg transition duration-500 group-hover:rounded-xl">
                        <div class="sm:w-7/12 pl-0 p-5">
                            <div class="space-y-2">
                                <div class="space-y-4">
                                    <h4 class="text-2xl font-semibold text-cyan-900">{{$continent->nameContinent}}</h4>
                                    <p class="text-gray-600">{{$continent->description}}</p>
                                </div>
                                <a href="{{route('aventure.continent',$continent->id)}}" class="block w-max text-cyan-600">Read more</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="overflow-x-hidden bg-gray-100">
            <h1 class="text-center p-7 mb-8 mt-8 bold" style="font-size: 50px;">See All Adventure</h1>
            <div class="px-6 py-8">
                <div class="container flex justify-between mx-auto">
                    <div class="w-full lg:w-8/12">
                        <div class="flex items-center justify-center ">

                            {{-- filter adventure --}}
                            <form action="{{ route('home') }}" method="get" class="mt-4">
                                <div class="flex justify-around">
                                    <div class="flex justify-around ">
                                        <label for="sort" class=" p-2 text-lg font-semibold text-gray-700">Sort By:</label>
                                        <select id="sort" name="sort" class="block ml-3 mt-1 p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                                            <option disabled selected>Filter by Time</option>
                                            <option value="oldest">Oldest</option>
                                            <option value="newest">Newest</option>
                                        </select>
                                    </div>
                                    <div  class="flex justify-around space-x-4 ">
                                        <label for="country" class=" p-2 text-lg font-semibold text-gray-700 ml-4">Filter By Country:</label>
                                        <select id="country" name="country" class="block ml-1 p-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:border-indigo-500 focus:ring focus:ring-indigo-200">
                                            <option value="">All Countries</option>
                                            @foreach ($continents as $country)
                                                <option value="{{ $country->nameContinent }}">{{ $country->nameContinent }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mx-auto max-w-sm mt-4">
                                    <button type="submit" class="p-2 w-full border border-blue-800   bg-blue-700 text-white rounded-md hover:bg-white hover:text-blue-700 transition duration-300 ease-in-out">Apply</button>
                                </div>
                            </form>



                        </div>
                        @foreach($adventures as $aventure)
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">{{$aventure->created_at->format('j F Y')}}</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">{{$aventure->created_at->diffForHumans()}}</a>
                                </div>
                                <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">{{$aventure->titre}}</a>
                                    <p class="mt-2 text-gray-600">{{$aventure->aventureDescription}}</p>
                                    <p class="mt-2 text-gray-600">{!! mb_strimwidth($aventure->consiel, 0, 100, '...') !!}</p>
                                    <p>{{$aventure->continent->nameContinent}}</p>
                                </div>
                                <div class="flex items-center justify-between mt-4"><a href="{{route('aventure.single',$aventure->id)}}"
                                                                                       class="text-blue-500 hover:underline">Read more</a>
                                    <div><a class="flex items-center"><img
                                                src="bouanani.png"
                                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">{{$aventure->user->username}}</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="hidden w-4/12 -mx-8 lg:block">
                        <div class="px-8">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">le nombre total d'aventures</h1>
                            <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                                Total Aventures: {{ $adventures->count() }}
                            </div>
                        </div>
                        <div class="px-8 mt-10">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">les destinations les plus populaires</h1>
                            <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <ul>
                                    <li>
                                        <a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            @if ($continentWithMostAdventures)
                                                    Continent with Most Adventures: {{ $continentWithMostAdventures->nameContinent }}
                                            @endif
                                        </a>
                                        <br>
                                        <a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            @if ($continentWithMostAdventures)
                                                Adventure Count: {{ $continentWithMostAdventures->adventure_count }}
                                            @endif
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="px-8 mt-10">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">nombre d'utilisateurs actifs</h1>
                            <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
                                Total users  : {{$usersCount}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
</x-master>
