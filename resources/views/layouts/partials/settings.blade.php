@if(isPermission('state.index') || isPermission('city.index'))
    <x-sidebar-dropdown>
        <x-slot name="icon">
            <svg style="padding-right: 2px" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.1401 12.9404C19.1801 12.6404 19.2001 12.3304 19.2001 12.0004C19.2001 11.6804 19.1801 11.3604 19.1301 11.0604L21.1601 9.48039C21.3401 9.34039 21.3901 9.07039 21.2801 8.87039L19.3601 5.55039C19.2401 5.33039 18.9901 5.26039 18.7701 5.33039L16.3801 6.29039C15.8801 5.91039 15.3501 5.59039 14.7601 5.35039L14.4001 2.81039C14.3601 2.57039 14.1601 2.40039 13.9201 2.40039H10.0801C9.84011 2.40039 9.65011 2.57039 9.61011 2.81039L9.25011 5.35039C8.66011 5.59039 8.12011 5.92039 7.63011 6.29039L5.24011 5.33039C5.02011 5.25039 4.77011 5.33039 4.65011 5.55039L2.74011 8.87039C2.62011 9.08039 2.66011 9.34039 2.86011 9.48039L4.89011 11.0604C4.84011 11.3604 4.80011 11.6904 4.80011 12.0004C4.80011 12.3104 4.82011 12.6404 4.87011 12.9404L2.84011 14.5204C2.66011 14.6604 2.61011 14.9304 2.72011 15.1304L4.64011 18.4504C4.76011 18.6704 5.01011 18.7404 5.23011 18.6704L7.62011 17.7104C8.12011 18.0904 8.65011 18.4104 9.24011 18.6504L9.60011 21.1904C9.65011 21.4304 9.84011 21.6004 10.0801 21.6004H13.9201C14.1601 21.6004 14.3601 21.4304 14.3901 21.1904L14.7501 18.6504C15.3401 18.4104 15.8801 18.0904 16.3701 17.7104L18.7601 18.6704C18.9801 18.7504 19.2301 18.6704 19.3501 18.4504L21.2701 15.1304C21.3901 14.9104 21.3401 14.6604 21.1501 14.5204L19.1401 12.9404ZM12.0001 15.6004C10.0201 15.6004 8.40011 13.9804 8.40011 12.0004C8.40011 10.0204 10.0201 8.40039 12.0001 8.40039C13.9801 8.40039 15.6001 10.0204 15.6001 12.0004C15.6001 13.9804 13.9801 15.6004 12.0001 15.6004Z" fill="white"></path>
            </svg>
        </x-slot>
        <x-slot name="label">
            System Settings
        </x-slot>
        <x-slot name="activeTab">
            {!! ( isCurrentRoute('state.index') || isCurrentRoute('city.index') )?'show':'' !!}
        </x-slot>
        @if(isPermission('state.index'))
            <li class="nav-item {!! isCurrentRoute('state.index')?'live-active':'' !!}">
                <a class="nav-link" href="{{route('state.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-users" aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    States
                </a>
            </li>
        @endif

        @if(isPermission('city.index'))
            <li class="nav-item {!! isCurrentRoute('city.index')?'live-active':'' !!}">
                <a class="nav-link" href="{{route('city.index')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                         stroke-linejoin="round" class="feather feather-users" aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                    Cities
                </a>
            </li>
        @endif





    </x-sidebar-dropdown>
@endif
