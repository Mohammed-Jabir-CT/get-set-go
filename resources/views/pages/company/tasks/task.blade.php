<x-layouts.app title="Tasks" description="Tasks Listing page for GetSetGo task manager.">
    <div class="flex justify-between">
        <h1 class="flex gap-2 items-center text-xl font-bold text-neutral px-2">
            <x-icon name="list_alt" />
            {{ $task->name }} <span @class([
                'capitalize badge badge-outline',
                'badge-error' => $task->status === 'initiated',
                'badge-warning' => $task->status === 'ongoing',
                'badge-success' => $task->status === 'completed',
            ])>{{ $task->status }}</span> 
        </h1>
        <span class="flex items-center justify-end join shadow-sm rounded-full">
            <button onclick="toggleEdit()" class="join-item btn btn-circle bg-transparent hover:bg-yellow-100 hover:border-none tooltip"  data-tip="Edit">
                <x-icon name="edit" class="text-lg" />
            </button>
            <button class="join-item btn btn-circle bg-transparent hover:bg-red-100 hover:border-none tooltip"  data-tip="Delete">
                <x-icon name="delete" class="text-lg" />
            </button>
        </span>
    </div>
    <div class="divider my-2"></div>
    <div class="grid grid-cols-10 join shadow-md rounded-box">
        <ul class="flex flex-col gap-2 [&_span]:text-neutral col-span-8 rounded-box p-2 border bg-base-100 join-item">
            <li>
                <label class="form-control text-md">
                    <textarea id="description" class="textarea textarea-bordered w-full h-fit resize-none" placeholder="Description" readonly>{{ $task->description }}</textarea>
                </label>
            </li>

        </ul>
        <ul
            class="flex flex-col gap-2 [&_span]:text-neutral rounded-box p-2 border col-span-2 bg-base-100 text-sm join-item">
            <li class="flex items-center gap-1">
                <span>Created By: </span>
                <span><a href="" class="btn btn-ghost btn-sm">{{ $task->assigner->name }}</a></span>
            </li>
            <hr>
            <li class="flex items-center gap-1">
                <span>Assigned to: </span>
                <span><a href="" class="btn btn-ghost btn-sm">{{ $task->assignee->name }}</a></span>
            </li>
            <hr>
            <li>
                Date Created: <span class="btn btn-ghost btn-sm pointer-events-none"
                    readonly>{{ $task->created_at }}</span>
            </li>
        </ul>
    </div>
    <script>
        function toggleEdit(){
            let isReadOnly = document.querySelector('#description').readOnly;
            document.querySelector('#description').readOnly = !isReadOnly;
            console.log(document.querySelector('#description').readOnly);
            
        }
    </script>
</x-layouts.app>
