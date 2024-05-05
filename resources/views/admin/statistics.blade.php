<x-admin-layout>
    <!-- New Table -->

    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                Statistics
            </h2>
            <!-- CTA -->
            <div class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
               >
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <span>Last update: <span class="mx-3 "> {{ $updates->last()  }}</span></span>
                </div>
              
                    <div class="relative inline-block text-left">
                        <div>
                          <button type="button" class="w-full justify-center gap-x-1.5 rounded-md  px-2  text-sm font-semibold dropdown_toggle">
                          Updates  &RightArrow;
                         
                          </button>
                     
                        </div>
                      
      
                            <div id="dropdown" class="z-10  bg-white divide-y divide-gray-100 rounded-lg shadow  dark:bg-gray-700 absolute " style="margin-top: 20px;width:7rem">

                            <ul class="py-2  text-gray-700 dark:text-gray-200 " >
                                @foreach ($updates as $item)
                                <li>
                                    <form method="post" action="{{ route('statistics') }}" >
                                        @csrf
                                        <input type="hidden" value="{{ $item->date }}" name="date">
                                        <button  type="submit" class=" px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-800 text-xs">{{ $item->date }}</button>
                                    </form>
                                   
                                  </li> 
                                @endforeach
                             
                        
                              </ul>
                        
                        </div>
                      </div>

                      





                 
            </div>
        

       
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full ">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3 text-center">№</th>
                                <th class="px-4 py-3 ">Repository</th>
                                <th class="px-4 py-3 text-center">Date</th>
                                <th class="px-4 py-3 text-center">Duration</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th class="px-4 py-3 text-center">Error Message</th>
                                <th class="px-4 py-3 text-center">Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @php $№ = 1; @endphp
                            @foreach ($stats as $item)
                                <tr class="text-gray-700 dark:text-gray-400">

                                    <td class="px-4 py-3 text-sm">
                                   {{$№++}}
                                    </td>
                                    <td class="px-4 py-3 text-sm ">
                                        {{ $item->repository }}
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        {{ $item->date }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ ceil($item->duration / 60) }}
                                        @if ($item->duration / 60 > 1)
                                            minutes
                                        @else
                                            minute
                                        @endif
                                    </td>

                                    @if ($item->status == 'success')
                                        <td class="px-4 py-3 text-xs">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @else
                                        <td class="px-4 py-3 text-xs text-center">
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-700">
                                                {{ $item->status }}
                                            </span>
                                        </td>
                                    @endif

                                    <td class="px-4 py-3 text-xs text-center">
                                        <p class="text-xs text-gray-600 dark:text-gray-400">

                                            @if ($item->error_message )
                                            {{ $item->error_message }}  
                                            @else
                                                -
                                            @endif
                                           
                                        </p>

                                    </td>
                                    <td class="px-4 py-3 text-sm text-center">
                                        {{ $item->quantity }}
                                    </td>
                                </tr>
                            @endforeach() 
                        </tbody>
                    </table>
                </div>
                <div
                 {{-- {!! $stats->links() !!} --}}
                    class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                    <span class="flex items-center col-span-3">
                        Showing 21-30 of 100
                    </span>
                    <span class="col-span-2"></span>
                    <!-- Pagination -->
                    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                        <nav aria-label="Table navigation">
                            <ul class="inline-flex items-center">
                                <li>
                                    <button
                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Previous">
                                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        1
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        2
                                    </button>
                                </li>
                                <li>
                                    <button
                                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        3
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        4
                                    </button>
                                </li>
                                <li>
                                    <span class="px-3 py-1">...</span>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        8
                                    </button>
                                </li>
                                <li>
                                    <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                        9
                                    </button>
                                </li>
                                <li>
                                    <button
                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                        aria-label="Next">
                                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                                            <path
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </li>
                            </ul>
                        </nav>
                    </span>
                </div>
            </div>
        </div>
    </main>
</x-admin-layout>
<script>
$(".dropdown_toggle").click(function () {
$("#dropdown").slideToggle('fast');
});
// $(document).on('click', function (e) {
//     if ($(e.target).closest("#dropdown").length === 0) {
//       $("#dropdown").slideUp('fast');
//     }
//   });

</script>