<x-layouts.app title="Projects" description="Projects Listing page for GetSetGo task manager.">
    <h1 class="flex gap-2 items-center text-xl font-bold text-neutral px-2">
        <x-icon name="tactic" />
        Projects
    </h1>
    <div class="divider my-2"></div>
    <div class="rounded-box p-2 border">
        <div class="overflow-x-auto rounded-box">
            <table class="table table-zebra">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td>{{ $project->id }}</td>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->description }}</td>
                            <td>{{ $project->creator->name }}</td>
                            <td>{{ $project->status }}</td>
                            <td>
                                <span class="flex items-center join shadow-sm rounded-full">
                                    <button class="join-item btn btn-circle btn-sm bg-transparent hover:bg-green-100 hover:border-none tooltip"  data-tip="View">
                                        <x-icon name="visibility" class="text-lg" />
                                    </button>
                                    <button class="join-item btn btn-circle btn-sm bg-transparent hover:bg-yellow-100 hover:border-none tooltip"  data-tip="Edit">
                                        <x-icon name="edit" class="text-lg" />
                                    </button>
                                    <button class="join-item btn btn-circle btn-sm bg-transparent hover:bg-red-100 hover:border-none tooltip"  data-tip="Delete">
                                        <x-icon name="delete" class="text-lg" />
                                    </button>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-2">
            {{ $projects->links() }}
        </div>
    </div>
</x-layouts.app>
