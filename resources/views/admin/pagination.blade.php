 <div class=" w-3/5  flex items-center justify-between border-t border-gray-200
            lg:flex-1 lg:px-4 ">
     @if ($paginator->onFirstPage())
         <div class="flex items-center pt-3 text-gray-600 hover:text-lime-500 cursor-pointer">
             <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M1.1665 4L4.49984 7.33333" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M1.1665 4.00002L4.49984 0.666687" stroke="currentColor" stroke-width="1.25"
                     stroke-linecap="round" stroke-linejoin="round" />
             </svg>
             <p class="text-sm ml-3 font-medium leading-none ">
                 Previous
             </p>
         </div>
     @else
         <div class="flex items-center pt-3 text-gray-600 hover:text-lime-500 cursor-pointer">
             <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M1.1665 4L4.49984 7.33333" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M1.1665 4.00002L4.49984 0.666687" stroke="currentColor" stroke-width="1.25"
                     stroke-linecap="round" stroke-linejoin="round" />
             </svg>
             <p class="text-sm ml-3 font-medium leading-none ">
                 <a href="{{ $paginator->previousPageUrl() }}">Previous</a>
             </p>
         </div>
     @endif
     <div class="flex lg:hidden">

         @foreach ($paginator->links()->elements[0] as $page => $url)
             @if ($page == $paginator->currentPage())
                 <p
                     class="text-sm font-medium leading-none cursor-pointer text-gray-600 hover:text-lime-500 border-t border-transparent hover:border-lime-500 pt-3 mr-4 px-2">
                     {{ $page }}
                 </p>
             @else
                 <p
                     class="text-sm font-medium leading-none cursor-pointer text-gray-600 hover:text-lime-500 border-t border-transparent hover:border-lime-500 pt-3 mr-4 px-2">
                     <a href="{{ $paginator->url($page) }}">{{ $page }}</a>
                 </p>
             @endif
         @endforeach
     </div>

     @if ($paginator->hasMorePages())
         <div class="flex items-center pt-3 text-gray-600 hover:text-lime-500 cursor-pointer">
             <p class="text-sm font-medium leading-none mr-3">
                 <a href="{{ $paginator->nextPageUrl() }}">Next</a>
             </p>
             <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M9.5 7.33333L12.8333 4" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M9.5 0.666687L12.8333 4.00002" stroke="currentColor" stroke-width="1.25"
                     stroke-linecap="round" stroke-linejoin="round" />
             </svg>
         </div>
     @else
         <div class="flex items-center pt-3 text-gray-600 hover:text-lime-500 cursor-pointer">
             <p class="text-sm font-medium leading-none mr-3">Next</p>
             <svg width="14" height="8" viewBox="0 0 14 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                 <path d="M1.1665 4H12.8332" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M9.5 7.33333L12.8333 4" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                     stroke-linejoin="round" />
                 <path d="M9.5 0.666687L12.8333 4.00002" stroke="currentColor" stroke-width="1.25"
                     stroke-linecap="round" stroke-linejoin="round" />
             </svg>
         </div>
     @endif
 </div>
