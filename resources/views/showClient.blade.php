@extends('layouts.app')

@section('content')
<div class="px-5">
   <div class="grid grid-cols-1 gap-2 lg:grid-cols-3">
      <div href="#" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$client->name}}</h5>
         <p class="font-normal text-gray-700 dark:text-gray-400">{{$client->name}}</p>
         <p class="font-normal text-gray-700 dark:text-gray-400">{{$client->number}}</p>
         <p class="font-normal text-gray-700 dark:text-gray-400">{{$client->address}}</p>
      </div>
      <div href="#" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$client->business_name}}</h5>
         <p class="font-normal text-gray-700 dark:text-gray-400">GST No. {{$client->gst_no}}</p>
         <p class="font-normal text-gray-700 dark:text-gray-400">Team Size: {{$client->team_size}}</p>
      </div>
      <div href="#" class="block p-6 max-w-sm bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Requirements</h5>
         <p class="font-normal text-gray-700 dark:text-gray-400">{{$client->requirements}}</p>
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Notes</h5>
         <p class="font-normal text-gray-700 dark:text-gray-400">{{$client->notes}}</p>
      </div>
   </div>
   <p class="mt-5 text-xl font-bold">Tasks:</p>
   <!-- timline -->
   <div class=" py-6 flex flex-col justify-center sm:py-12">
      <div class="py-3 sm:mx-auto w-full px-2 sm:px-0">

         <div class="relative antialiased text-sm font-semibold">

            <!-- Vertical bar running through middle -->
            <div class="hidden sm:block w-1 bg-blue-300 absolute h-full left-1/2 transform -translate-x-1/2"></div>
            @foreach($tasks as $task)
            <!-- Left section, set by justify-start and sm:pr-8 -->
            <div class="mt-6 sm:mt-0 sm:mb-12">
               <div class="flex flex-col sm:flex-row items-center">
                     <div class="flex justify-start w-full mx-auto items-center">
                        <div class="w-full sm:w-1/2 sm:pr-8">
                           <p>{{$task->created_at}}</p>
                           <div class="p-4 bg-white rounded shadow">
                              <p>Task id: {{$task->id}}</p>
                              <p>Task: {{$task->task}}</p>
                              <p></p>
                           </div>
                        </div>
                     </div>
                     <div class="rounded-full bg-blue-500 border-white border-4 w-8 h-8 absolute left-1/2 -translate-y-4 sm:translate-y-0 transform -translate-x-1/2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                     </div>
               </div>
            </div>

            @foreach($task->status as $status)
            <!-- Right section, set by justify-start and sm:pr-8 -->
            <div class="mt-6 sm:mt-0 sm:mb-12">
               <div class="flex flex-col sm:flex-row items-center">
                     <div class="flex justify-end w-full mx-auto items-center">
                        <div class="w-full sm:w-1/2 sm:pr-8">
                           <p>{{$status->created_at}}</p>
                           <div class="p-4 rounded shadow bg-slate-900 text-white">
                                 {{$status->status}}
                           </div>
                        </div>
                     </div>
                     <div class="rounded-full bg-blue-500 border-white border-4 w-8 h-8 absolute left-1/2 -translate-y-4 sm:translate-y-0 transform -translate-x-1/2 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                           <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                     </div>
               </div>
            </div>
            @endforeach
            
            @endforeach
      </div>
   </div>
   <!-- endtimeline -->
</div>
@endsection
