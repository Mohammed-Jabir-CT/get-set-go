<x-layouts.app title="Team" description="Team Display page for GetSetGo task manager.">
    <h1 class="flex gap-2 items-center text-xl font-bold text-neutral px-2">
        <x-icon name="groups" />
        Teams - {{ $team->name }}
    </h1>
    <div class="divider my-2"></div>
    <div class="rounded-box p-2 border">
        <ul class="flex flex-col gap-2 [&_span]:text-neutral">
            <li class="flex items-center">
                <span>Created By: </span>
                <span><a href="" class="btn btn-ghost btn-sm">{{ $team->creator->name }}</a></span>
            </li>
            <li>
                Status: <span @class([
                    'badge badge-outline',
                    'badge-success' => $team->status,
                    'badge-error' => !$team->status,
                ])>{{ $team->status == 1 ? 'Active' : 'Inactive' }}</span>
            </li>
            <li>
                Date Created: <span class="badge badge-ghost">{{ $team->created_at }}</span>
            </li>
            <li>
                Members:
                <ul class="flex gap-2">
                    @foreach ($team->members as $member)
                        <li>
                            <span><a href=""
                                    class="btn btn-outline btn-primary btn-sm">{{ $member->name }}</a></span>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li>
                Projects:
                <ul class="flex gap-2">
                    @foreach ($team->projects as $project)
                        <li>
                            <span><a href=""
                                    class='btn btn-outline btn-secondary btn-sm'>{{ $project->name }}</a></span>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
    <x-modal id="editModal" title="Edit">
        
    </x-modal>
    <x-modal id="deleteModal" title="Delete"></x-modal>
</x-layouts.app>
