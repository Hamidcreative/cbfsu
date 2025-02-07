@if(isPermission('signature.index'))
    <x-sidebar-dropdown>
        <x-slot name="icon">
            <svg style="padding-right: 2px" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20 6H16V4C16 2.89 15.11 2 14 2H10C8.89 2 8 2.89 8 4V6H4C2.89 6 2.01 6.89 2.01 8L2 19C2 20.11 2.89 21 4 21H20C21.11 21 22 20.11 22 19V8C22 6.89 21.11 6 20 6ZM14 6H10V4H14V6Z" fill="white"></path>
            </svg>
        </x-slot>
        <x-slot name="label">
            Seals/Signatures
        </x-slot>
        <x-slot name="activeTab">
            {!! ( isCurrentRoute('signature.index') )?'show':'' !!}
        </x-slot>
        @if(isPermission('signature.index'))
            <li class="nav-item {!! isCurrentRoute('signature.index')?'live-active':'' !!}">
                <a class="nav-link" href="{{route('signature.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-users" aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Seals/Signatures
                </a>
            </li>
        @endif

    </x-sidebar-dropdown>
@endif
