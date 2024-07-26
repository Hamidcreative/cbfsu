@if(isPermission('authority.index'))
    <li class="nav-item {!! isCurrentRoute('authority')?'live-active':'' !!}">
        <a class="nav-link" href="{!! route('authority.index') !!}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M21 8H3V4H21V8ZM21 10H3V14H21V10ZM21 16H3V20H21V16Z" fill="white"></path>
                </svg>
            <span class="title-text">Authority</span>
        </a>
    </li>
@endif
