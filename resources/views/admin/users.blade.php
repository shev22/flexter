        <x-admin-layout>

            <main class="h-full pb-16 overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Users
                    </h2>
                    <!-- CTA -->
                    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
                        href="https://github.com/estevanmaito/windmill-dashboard">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span>Star this project on GitHub</span>
                        </div>
                        <span>View more &RightArrow;</span>
                    </a>

                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">№</th>
                                        <th class="px-4 py-3">name</th>
                                        <th class="px-4 py-3">email</th>
                                        <th class="px-4 py-3">Date</th>
                                        <th class="px-4 py-3">role</th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    {{-- @php $№ = 1; @endphp --}}
                                    @foreach ($users as $user)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                {{ $user->id}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        {{-- <img class="object-cover w-full h-full rounded-full"
                                                            src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjE3Nzg0fQ"
                                                            alt="" loading="lazy" /> --}}

                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="https://ui-avatars.com/api/?name={{ $user->name }}"
                                                            alt="" loading="lazy">

                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{ $user->name }}</p>
                                                        <p class="text-xs text-red-600 dark:text-purple-400">
                                                            {{ $user->role }}
                                                        </p>
                                                    </div>
                                                </div>

                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                {{ $user->email }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $user->created_at }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">

                                                <form method="post" action="role">
                                                    @csrf
                                                    @if ($user->role == 'admin')
                                                        <button type="submit" name="id"
                                                            value="{{ $user->id }}"
                                                            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                                            Admin
                                                        </button>
                                                    @else
                                                        <button type="submit" name="id"
                                                            value="{{ $user->id }}"
                                                            class="px-3 py-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                                                            User
                                                        </button>
                                                    @endif
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div
                                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                                <span class="flex items-center col-span-3">
                        

                                    Showing {{ ($users->currentPage() - 1) * $users->perPage() + 1 }}-{{ min($users->currentPage() * $users->perPage(), $users->total()) }} of {{ $users->total() }}
                                </span>
                                <span class="col-span-2"></span>
                                <!-- Pagination -->
                                {{ $users->onEachSide(2)->links('admin-paginate') }}
                                {{-- {!! $users->links() !!} --}}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </x-admin-layout>
