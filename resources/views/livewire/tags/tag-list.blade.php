<div class="bg-white shadow overflow-hidden sm:rounded-md">
    <ul class="divide-y divide-gray-200">
        @foreach($this->tags as $tag)
            <li>
                <a href="{{ route('marketplaceful::tags.show', ['tag' => $tag]) }}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                    <div class="px-4 py-4 flex items-center">
                        <div class="min-w-0 flex-1 md:grid md:grid-cols-12 md:gap-4">
                            <div class="md:flex md:col-span-8 md:items-center">
                                <div class="text-sm leading-5 font-medium text-gray-800 truncate">
                                    {{ $tag->name }}
                                </div>
                            </div>
                            <div class="hidden md:flex md:col-span-2 md:items-center">
                                <div class="flex items-center">
                                    <div class="text-xs leading-4 text-gray-500">
                                        {{ $tag->slug }}
                                    </div>
                                </div>
                            </div>
                            <div class="hidden md:flex md:col-span-2 md:items-center">
                                <div>
                                    <div class="text-xs leading-4 text-gray-500">
                                        {{ $tag->listings_count }} listings
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ml-5 flex-shrink-0">
                            <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
