<x-layouts.app title="Tasks" description="Tasks Listing page for GetSetGo task manager.">
    <h1 class="flex gap-2 items-center text-xl font-bold text-neutral px-2">
        <x-icon name="list_alt" />
        Tasks
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
                        <th>Project</th>
                        <th>Created By</th>
                        <th>Assigned To</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->project->name }}</td>
                            <td>{{ $task->assigner->name }}</td>
                            <td>{{ $task->assignee->name }}</td>
                            <td>
                                <div @class([
                                    'capitalize badge badge-outline',
                                    'badge-error' => $task->status === 'initiated', 
                                    'badge-warning' => $task->status === 'ongoing', 
                                    'badge-success' => $task->status === 'completed',
                                ])>
                                    {{ $task->status }}
                                </div>
                            </td>
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
            {{ $tasks->links() }}
        </div>
    </div>
</x-layouts.app>
