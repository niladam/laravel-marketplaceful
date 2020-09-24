<ul class="divide-y divide-gray-200">
    @foreach ($this->users as $user)
        <li>
            <a href="{{ route('marketplaceful::users.show', ['user' => $user]) }}" class="block hover:bg-gray-50 focus:outline-none focus:bg-gray-50 transition duration-150 ease-in-out">
                <div class="flex items-center px-4 py-4 sm:px-6">
                    <div class="min-w-0 flex-1 flex items-center">
                        <div class="flex-shrink-0">
                            <img class="h-9 w-9 rounded-full text-white shadow-solid" src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" />
                        </div>
                        <div class="min-w-0 flex-1 px-4 md:grid md:grid-cols-2 md:gap-4">
                            <div>
                                <div class="text-base leading-6 font-medium text-gray-900 truncate">{{ $user->name }}</div>
                                <div class="text-xs leading-4 text-gray-500">
                                    <span class="truncate">Last seen: {{ $user->last_seen_at ? $user->last_seen_at->diffForHumans() : 'never' }}</span>
                                </div>
                            </div>
                            <div class="hidden md:flex items-center justify-end">
                                <div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                </div>
            </a>
        </li>
    @endforeach
</ul>
