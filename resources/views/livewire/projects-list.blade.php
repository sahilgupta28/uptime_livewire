<div class="bg-gray-900">
    <div class="mx-auto max-w-7xl">
        <div class="bg-gray-900 py-10">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="sm:flex sm:items-center">
                    <div class="sm:flex-auto">
                        <h1 class="text-base font-semibold leading-6 text-white">Projects</h1>
                        <p class="mt-2 text-sm text-gray-300">A list of all the projects in your account.</p>
                    </div>
                    <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                        <a type="button" class="block rounded-md bg-indigo-500 px-3 py-2 text-center text-sm
                        font-semibold text-white hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2
                        focus-visible:outline-offset-2 focus-visible:outline-indigo-500" href="{{route('project.create')}}">Add Project</a>
                    </div>
                </div>
                <div class="mt-8 flow-root">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                            <table class="min-w-full divide-y divide-gray-700">
                                <thead>
                                <tr>
                                    <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-white sm:pl-0">Project Name</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">URL</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-white">Status</th>
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
                                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-white sm:pl-0">{{$project->name}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">{{$project->url}}</td>
                                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-300">
                                            {{optional($project->uptimeLogsLatestFirst)->status ? 'Active': 'Inactive' }}
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="#" class="text-indigo-400 hover:text-indigo-300">Edit<span class="sr-only">, {{$project->name}}</span></a>
                                        </td>
                                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                            <a href="#" class="text-indigo-400 hover:text-indigo-300">Delete<span class="sr-only">, {{$project->name}}</span></a>
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


