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
            <div class="px-6 py-8">
                <div class="container flex justify-between mx-auto">
                    <div class="w-full lg:w-8/12">
                        <div class="flex items-center justify-between ">
                            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                            <div>
                                <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <option>Latest</option>
                                    <option>Last Week</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">Jun 1,
                                2020</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                                </div>
                                <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Build
                                        Your New Idea with Laravel Freamwork.</a>
                                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                                        reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                                </div>
                                <div class="flex items-center justify-between mt-4"><a href="#"
                                                                                       class="text-blue-500 hover:underline">Read more</a>
                                    <div><a href="#" class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">Alex John</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">mar 4,
                                2019</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Design</a>
                                </div>
                                <div class="mt-2"><a href="#"
                                                     class="text-2xl font-bold text-gray-700 hover:underline">Accessibility tools for
                                        designers and developers</a>
                                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                                        reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                                </div>
                                <div class="flex items-center justify-between mt-4"><a href="#"
                                                                                       class="text-blue-500 hover:underline">Read more</a>
                                    <div><a href="#" class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">Jane Doe</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">Feb 14,
                                2019</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">PHP</a>
                                </div>
                                <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">PHP:
                                        Array to Map</a>
                                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                                        reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                                </div>
                                <div class="flex items-center justify-between mt-4"><a href="#"
                                                                                       class="text-blue-500 hover:underline">Read more</a>
                                    <div><a href="#" class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">Lisa Way</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">Dec 23,
                                2018</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Django</a>
                                </div>
                                <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">Django
                                        Dashboard - Learn by Coding</a>
                                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                                        reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                                </div>
                                <div class="flex items-center justify-between mt-4"><a href="#"
                                                                                       class="text-blue-500 hover:underline">Read more</a>
                                    <div><a href="#" class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">Steve Matt</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-between"><span class="font-light text-gray-600">Mar 10,
                                2018</span><a href="#"
                                              class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">Testing</a>
                                </div>
                                <div class="mt-2"><a href="#" class="text-2xl font-bold text-gray-700 hover:underline">TDD
                                        Frist</a>
                                    <p class="mt-2 text-gray-600">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        Tempora expedita dicta totam aspernatur doloremque. Excepturi iste iusto eos enim
                                        reprehenderit nisi, accusamus delectus nihil quis facere in modi ratione libero!</p>
                                </div>
                                <div class="flex items-center justify-between mt-4"><a href="#"
                                                                                       class="text-blue-500 hover:underline">Read more</a>
                                    <div><a href="#" class="flex items-center"><img
                                                src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                                alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                            <h1 class="font-bold text-gray-700 hover:underline">Khatab Wedaa</h1>
                                        </a></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <div class="flex">
                                <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                                    previous
                                </a>

                                <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                    1
                                </a>

                                <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                    2
                                </a>

                                <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                    3
                                </a>

                                <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="hidden w-4/12 -mx-8 lg:block">
                        <div class="px-8">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">Authors</h1>
                            <div class="flex flex-col max-w-sm px-6 py-4 mx-auto bg-white rounded-lg shadow-md">
                                <ul class="-mx-4">
                                    <li class="flex items-center"><img
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                        <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Alex John</a><span
                                                class="text-sm font-light text-gray-700">Created 23 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1464863979621-258859e62245?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=333&amp;q=80"
                                            alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                        <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Jane Doe</a><span
                                                class="text-sm font-light text-gray-700">Created 52 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1531251445707-1f000e1e87d0?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=281&amp;q=80"
                                            alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                        <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Lisa Way</a><span
                                                class="text-sm font-light text-gray-700">Created 73 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1500757810556-5d600d9b737d?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=735&amp;q=80"
                                            alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                        <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Steve Matt</a><span
                                                class="text-sm font-light text-gray-700">Created 245 Posts</span></p>
                                    </li>
                                    <li class="flex items-center mt-6"><img
                                            src="https://images.unsplash.com/photo-1502980426475-b83966705988?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=373&amp;q=80"
                                            alt="avatar" class="object-cover w-10 h-10 mx-4 rounded-full">
                                        <p><a href="#" class="mx-1 font-bold text-gray-700 hover:underline">Khatab
                                                Wedaa</a><span class="text-sm font-light text-gray-700">Created 332 Posts</span>
                                        </p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="px-8 mt-10">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">Categories</h1>
                            <div class="flex flex-col max-w-sm px-4 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <ul>
                                    <li><a href="#" class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            AWS</a></li>
                                    <li class="mt-2"><a href="#"
                                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            Laravel</a></li>
                                    <li class="mt-2"><a href="#"
                                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- Vue</a>
                                    </li>
                                    <li class="mt-2"><a href="#"
                                                        class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            Design</a></li>
                                    <li class="flex items-center mt-2"><a href="#"
                                                                          class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">-
                                            Django</a></li>
                                    <li class="flex items-center mt-2"><a href="#"
                                                                          class="mx-1 font-bold text-gray-700 hover:text-gray-600 hover:underline">- PHP</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="px-8 mt-10">
                            <h1 class="mb-4 text-xl font-bold text-gray-700">Recent Post</h1>
                            <div class="flex flex-col max-w-sm px-8 py-6 mx-auto bg-white rounded-lg shadow-md">
                                <div class="flex items-center justify-center"><a href="#"
                                                                                 class="px-2 py-1 text-sm text-green-100 bg-gray-600 rounded hover:bg-gray-500">Laravel</a>
                                </div>
                                <div class="mt-4"><a href="#" class="text-lg font-medium text-gray-700 hover:underline">Build
                                        Your New Idea with Laravel Freamwork.</a></div>
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center"><img
                                            src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="object-cover w-8 h-8 rounded-full"><a href="#"
                                                                                                      class="mx-3 text-sm text-gray-700 hover:underline">Alex John</a></div><span
                                        class="text-sm font-light text-gray-600">Jun 1, 2020</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
</x-master>
