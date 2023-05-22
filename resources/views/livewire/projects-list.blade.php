<div class="bg-gray-900">
    <div class="mx-auto max-w-7xl">
        <div class="bg-gray-900 ">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Uptime</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-0">
                                        <span class="sr-only">Delete</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-800">
                                    @foreach($projects as $project)
                                    <tr>
                                        <td>
                                            <div class="ml-4 sm:max-w-md">
                                                <div class="font-medium text-gray-300">{{$project->name}}</div>
                                                <div class="mt-1 text-gray-500"><p
                                                        class="{{--break-all--}} text-ellipsis overflow-hidden ...">{{$project->url}}</p></div>
                                            </div>
                                        </td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                            <div class="flex items-center justify-end gap-x-2 sm:justify-start">
                                                <div class="flex-none rounded-full p-1 {{optional
                                                ($project->uptimeLogsLatestFirst)->status ? 'text-green-400':
                                                'text-rose-400'}}">
                                                    <div class="h-1.5 w-1.5 rounded-full bg-current"></div>
                                                </div>
                                                <div class="hidden text-white sm:block uppercase">{{optional
                                                ($project->uptimeLogsLatestFirst)->status ? 'Up': 'Down' }}</div>
                                            </div>
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="#" class="text-indigo-400 hover:text-indigo-300 bg-transparent hover:bg-indigo-500 font-semibold py-2 px-4  border border-indigo-500 hover:border-transparent rounded">Edit<span class="sr-only">, {{$project->name}}</span></a>
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="#" class="text-red-600 hover:text-indigo-300 bg-transparent
                                            hover:bg-red-500 font-semibold py-2 px-4
                                            hover:border-red-700 rounded" wire:click="delete({{$project->id}})
                                            ">Delete<span
                                                    class="sr-only">,
                                                    {{$project->name}}</span></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>








