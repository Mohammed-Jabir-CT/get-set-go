<x-layouts.app title="Teams" description="Teams Listing page for GetSetGo task manager.">
    <h1 class="flex gap-2 items-center text-xl font-bold text-neutral px-2">
        <x-icon name="groups" />
        Teams
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
                        <th>Created By</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>{{ $team->id }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $team->creator->name }}</td>
                            <td>{{ $team->status }}</td>
                            <td>
                                <span class="flex items-center join shadow-sm rounded-full">
                                    <a href="{{ route('teams.show', ['team' => $team->id]) }}"
                                        class="join-item btn btn-circle btn-sm bg-transparent hover:bg-green-100 hover:border-none tooltip"
                                        data-tip="View">
                                        <x-icon name="visibility" class="text-lg" />
                                    </a>
                                    <button onclick="editModal.showModal()"
                                        class="join-item btn btn-circle btn-sm bg-transparent hover:bg-yellow-100 hover:border-none tooltip"
                                        data-tip="Edit">
                                        <x-icon name="edit" class="text-lg" />
                                    </button>
                                    <button onclick="deleteModal.showModal()"
                                        class="join-item btn btn-circle btn-sm bg-transparent hover:bg-red-100 hover:border-none tooltip"
                                        data-tip="Delete">
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
            {{ $teams->links() }}
        </div>
    </div>
    <x-modal id="editModal" title="Edit"></x-modal>
    <x-modal id="deleteModal" title="Delete"></x-modal>
</x-layouts.app>
