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

            <div class="grid gap-12 lg:grid-cols-2">
                @foreach($aventures as $aventure)
                <div class="p-1 rounded-xl group sm:flex space-x-6 bg-white bg-opacity-50 shadow-xl hover:rounded-2xl">
                    @foreach($aventure->images as $img)
                        <img src="{{ asset('storage/' . $img->text) }}" alt="art cover" loading="lazy" width="1000" height="667" class="h-56 sm:h-full w-full sm:w-5/12 object-cover object-top rounded-lg transition duration-500 group-hover:rounded-xl">
                        @break

                    @endforeach
                        <div class="sm:w-7/12 pl-0 p-5">
                        <div class="space-y-2">
                            <div class="space-y-4">
                                <h4 class="text-2xl font-semibold text-cyan-900">{{$aventure->titre}}</h4>
                                <p class="text-gray-600">{!! $aventure->aventureDescription !!}</p>
                                <p class="text-gray-600">{{$aventure->continent->nameContinent}}</p>
                                <p class="text-gray-600">{!! mb_strimwidth($aventure->consiel, 0, 100, '...') !!}</p>
                                <p class="text-gray-600">{{$aventure->user->username}}</p>
                            </div>
                            <a href="{{route('aventure.single',$aventure->id)}}" class="block w-max text-cyan-600">Read more</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-master>
