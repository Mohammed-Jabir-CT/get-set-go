<x-layouts.app title="Teams" description="Teams Listing page for GetSetGo task manager.">
    <div class="flex items-center justify-between">
        <h1 class="flex gap-2 items-center text-xl font-bold text-neutral px-2">
            <x-icon name="groups" />
            Teams
        </h1>
        <button onclick="addTeam()" class="btn btn-sm btn-circle btn-outline tooltip tooltip-bottom" data-tip="Add Team">
            <x-icon name="add"></x-icon>
        </button>
    </div>
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
                                    <button onclick="editTeam({{ $team }})"
                                        class="join-item btn btn-circle btn-sm bg-transparent hover:bg-yellow-100 hover:border-none tooltip"
                                        data-tip="Edit">
                                        <x-icon name="edit" class="text-lg" />
                                    </button>
                                    <button onclick="deleteTeam({{ $team }})"
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


    <dialog id="addModal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Add Team</h3>
            <form action="" method="post" class="flex flex-col gap-2">
                @method('post')
                @csrf
                <input type="hidden" name="id" value=""></input>
                <x-form-input type="text" name="name" placeholder="" label="Name" autocomplete="name"
                    value="" />
                <x-form-radio name="status" label="Status" />
                <span class="label-text-alt text-xs text-info">{{ session('status') }}</span>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <button type="button" onclick="editModal.close()" class="btn text-gray border-gray">Cancel</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- EditModal --}}
    <dialog id="editModal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Edit Team</h3>
            <form action="" method="post" class="flex flex-col gap-2">
                @method('put')
                @csrf
                <input type="hidden" name="id" value=""></input>
                <x-form-input type="text" name="name" placeholder="" label="Name" autocomplete="name"
                    value="" />
                <select class="select select-bordered w-full">
                    <option disabled selected>Owner</option>
                    <option>Han Solo</option>
                    <option>Greedo</option>
                </select>
                <select class="select select-bordered w-full">
                    <option disabled selected>Members</option>
                    <option>Han Solo</option>
                    <option>Greedo</option>
                </select>
                <span class="label-text-alt text-xs text-info">{{ session('status') }}</span>
                <div class="modal-action">
                    <button type="submit" class="btn btn-primary">Edit</button>
                    <button type="button" onclick="editModal.close()" class="btn text-gray border-gray">Close</button>
                </div>
            </form>
        </div>
    </dialog>

    {{-- DeleteModal --}}
    <dialog id="deleteModal" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Delete</h3>
            <form action="" method="post" class="flex flex-col gap-2">
                @method('delete')
                @csrf
            </form>
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Delete</button>
                <button type="button" onclick="deleteModal.close()" class="btn text-gray border-gray">Close</button>
            </div>
        </div>
    </dialog>
    <script>
        function addTeam() {
            addModal.showModal();
            document.querySelector('#addModal form').action = `teams/create`;


        }

        function editTeam(team) {
            editModal.showModal();
            console.log(team);
            document.querySelector('#editModal form input[name="id"]').value = team.id;
            document.querySelector('#editModal form input[name="name"]').value = team.name;
            document.querySelector('#editModal form input[name="status"]').checked = team.status;
            document.querySelector('#editModal form').action = `teams/${team.id}`;
        }

        function deleteTeam(team) {
            deleteModal.showModal();
            document.querySelector('#deleteModal form').action = `teams/${team.id}`;
        }
    </script>
</x-layouts.app>
