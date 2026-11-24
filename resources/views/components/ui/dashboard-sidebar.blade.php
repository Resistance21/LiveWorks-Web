@props(['role', 'projects', 'currentProject', 'user'])

<aside class="sidebar">
    <div class="sidebar-content">
        <header class="site-header sidebar-header">
            <div>
                <a href="{{ route('ui.sign-in') }}">
                    <span>NORTH METROPOLITAN TAFE</span>
                    <strong>LiveWorks Archive</strong>
                </a>
            </div>
        </header>

        <label class="project-search">
            <x-ui.icons.search />
            <input type="search" placeholder="Search projects...">
        </label>

        <section class="projects">
            @foreach ($projects as $project)
                <x-ui.sidebar-project :project="$project" :role="$role" :current="$currentProject === $project['slug']" />
            @endforeach
        </section>
    </div>

    @if ($role === 'staff')
        <a class="new-project" href="{{ route('ui.staff.projects.create') }}"
            @if (request()->routeIs('ui.staff.projects.create', 'ui.staff.projects.publishing')) aria-current="page" @endif>
            New Project
        </a>
    @endif

    <footer class="user-profile">
        <div>
            <strong>{{ $user['name'] }}</strong>
            <span>{{ $user['number'] }}</span>
        </div>
        <div class="account-links">
            <a href="{{ route('ui.sign-in') }}">&#9881;</a>
            <form method="POST" action="{{ route('ui.logout') }}">
                @csrf
                <button type="submit">Log out</button>
            </form>
        </div>
    </footer>
</aside>
