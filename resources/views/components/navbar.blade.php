<div class="navbar bg-base-100 shadow-md px-3 flex items-center justify-between">
    <div>
        <x-app-logo />
        <nav>
            <ul class="menu menu-horizontal px-2">
                <li>
                    <a href="{{ route('tasks.index', ['mytasks' => 1]) }}">
                        <x-icon name="task" />
                        My Tasks</a>
                </li>
                <li>
                    <a href="#">
                        <x-icon name="monitoring" />
                        Perfomance
                    </a>
                </li>
                <li>
                    <details class="z-10">
                        <summary>
                            <x-icon name="corporate_fare" />
                            Company
                        </summary>
                        <ul class="bg-base-100 rounded-t-none p-2">
                            <li>
                                <a href="{{ route('teams.index') }}">
                                    <x-icon name="groups" />
                                    Teams
                                </a>
                            </li>
                            <li>
                                <a href="{{route('projects.index')}}">
                                    <x-icon name="tactic" />
                                    Projects
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tasks.index') }}">
                                    <x-icon name="list_alt" />
                                    Tasks
                                </a>
                            </li>
                        </ul>
                    </details>
                </li>
            </ul>
        </nav>
    </div>
    <div>
        <button class="btn btn-ghost btn-circle">
            <x-icon name="search" />
        </button>
        <button class="btn btn-ghost btn-circle">
            <x-icon name="notifications" />
        </button>
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                <div class="avatar placeholder">
                    <div class="bg-neutral text-neutral-content w-10 rounded-full">
                        <span>Ad</span>
                    </div>
                </div>
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                <li><span onclick="document.getElementById('logout-form').submit()">
                        <x-icon name="logout" />
                        Logout
                    </span>
                </li>
            </ul>
        </div>
    </div>
</div>
<form action="{{ url('logout') }}" method="post" id="logout-form" class="hidden">
    @csrf
</form>
