<div class="position-sticky pt-3 sidebar">
    <ul class="nav flex-column">
        @if(isPermission('dashboard.index'))
            <li class="nav-item {!! isCurrentRoute('dashboard')?'live-active':'' !!}">
                <a class="nav-link" href="/">
                    <svg width="18" height="18" class="mr-1" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11 21H5C3.9 21 3 20.1 3 19V5C3 3.9 3.9 3 5 3H11V21ZM13 21H19C20.1 21 21 20.1 21 19V12H13V21ZM21 10V5C21 3.9 20.1 3 19 3H13V10H21Z" fill="white"></path>
                    </svg>
                   <span class="title-text">Dashboard</span>
                </a>
            </li>
        @endif

        @include('layouts.partials.user_management')
        @include('layouts.partials.customers')
        @include('layouts.partials.bonds')
{{--        @include('layouts.partials.projects')--}}
        @include('layouts.partials.insurer')
        @include('layouts.partials.agents')
        @include('layouts.partials.authority')
        @include('layouts.partials.signature')
        @include('layouts.partials.settings')
{{--        @if(isPermission('notifications.index'))--}}
{{--            <li class="nav-item {!! isCurrentRoute('notifications.index') ? 'live-active':'' !!}">--}}
{{--                <a class="nav-link" href="{{route('notifications.index')}}">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-1" width="16" height="16" viewBox="0 0 24 24" fill="none">--}}
{{--                        <g clip-path="url(#clip0_2626_1396)">--}}
{{--                            <path d="M22.555 13.662L20.655 6.82595C20.0981 4.82328 18.8877 3.06424 17.2163 1.82842C15.5449 0.592603 13.5084 -0.0490638 11.4304 0.00541635C9.3525 0.0598965 7.35239 0.807397 5.74805 2.1291C4.1437 3.4508 3.02719 5.27085 2.57598 7.29995L1.10498 13.915C0.942497 14.6459 0.946254 15.404 1.11597 16.1333C1.2857 16.8626 1.61705 17.5444 2.08556 18.1285C2.55408 18.7126 3.1478 19.184 3.82289 19.5079C4.49798 19.8318 5.23721 20 5.98598 20H7.09998C7.3295 21.1302 7.94271 22.1464 8.83572 22.8763C9.72874 23.6062 10.8466 24.005 12 24.005C13.1533 24.005 14.2712 23.6062 15.1642 22.8763C16.0573 22.1464 16.6705 21.1302 16.9 20H17.738C18.5088 20 19.2692 19.8218 19.9597 19.4794C20.6503 19.1369 21.2523 18.6395 21.7188 18.0258C22.1853 17.4122 22.5036 16.699 22.6488 15.942C22.794 15.185 22.7622 14.4046 22.556 13.662H22.555ZM12 22C11.3817 21.9974 10.7794 21.8039 10.2753 21.4459C9.77121 21.0879 9.39007 20.5829 9.18398 20H14.816C14.6099 20.5829 14.2288 21.0879 13.7247 21.4459C13.2206 21.8039 12.6182 21.9974 12 22ZM20.126 16.815C19.8473 17.1846 19.4863 17.4842 19.0716 17.6899C18.6569 17.8956 18.1999 18.0018 17.737 18H5.98598C5.53677 17.9999 5.0933 17.8989 4.68832 17.7045C4.28334 17.5101 3.92719 17.2273 3.64614 16.8768C3.3651 16.5264 3.16634 16.1173 3.06454 15.6798C2.96274 15.2423 2.9605 14.7875 3.05798 14.349L4.52798 7.73295C4.88233 6.13916 5.75929 4.70955 7.01944 3.6714C8.27959 2.63324 9.85061 2.04612 11.4828 2.00336C13.1149 1.96061 14.7145 2.46467 16.0273 3.43542C17.3401 4.40617 18.2907 5.7879 18.728 7.36095L20.628 14.1969C20.7535 14.6423 20.7735 15.1108 20.6864 15.5653C20.5992 16.0197 20.4074 16.4476 20.126 16.815Z" fill="#fff"></path>--}}
{{--                        </g>--}}
{{--                        <defs>--}}
{{--                            <clipPath id="clip0_2626_1396">--}}
{{--                                <rect width="24" height="24" fill="white"></rect>--}}
{{--                            </clipPath>--}}
{{--                        </defs>--}}
{{--                    </svg>--}}
{{--                    <span class="title-text"> Notification </span>--}}

{{--                </a>--}}
{{--            </li>--}}
{{--        @endif--}}

    </ul>
</div>

