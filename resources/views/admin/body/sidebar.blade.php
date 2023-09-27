 <nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
            EFG<span>Steps</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item nav-category">Checklists</li>
            <li class="nav-item">
                <a href="{{ route('all.steps.fap', 'ca') }}" class="nav-link">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">FAP Steps (CA)</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('all.steps.fap', 'us') }}" class="nav-link">
                    <i class="link-icon" data-feather="user-check"></i>
                    <span class="link-title">FAP Steps (US)</span>
                </a>
            </li>

            <li class="nav-item nav-category">web apps</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
                    <i class="link-icon" data-feather="mail"></i>
                    <span class="link-title">Email</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="pages/email/inbox.html" class="nav-link">Inbox</a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/email/read.html" class="nav-link">Read</a>
                    </li>
                    <li class="nav-item">
                        <a href="pages/email/compose.html" class="nav-link">Compose</a>
                    </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a href="pages/apps/chat.html" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Chat</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/apps/calendar.html" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Calendar</span>
                </a>
            </li>

            <li class="nav-item nav-category">Roles & Permissions</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#rolesPermission" role="button" aria-expanded="false" aria-controls="rolesPermission">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Roles & Permissions</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="rolesPermission">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.permissions') }}" class="nav-link">Permissions</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.roles') }}" class="nav-link">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('all.roles.permission') }}" class="nav-link">Permissions In Roles</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('add.roles.permission') }}" class="nav-link">Add Permissions In Roles</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Manage Users</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#manageAdmin" role="button" aria-expanded="false" aria-controls="manageAdmin">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Admin</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="manageAdmin">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('all.admin') }}" class="nav-link">All Admin</a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#errorPages" role="button" aria-expanded="false" aria-controls="errorPages">
                    <i class="link-icon" data-feather="cloud-off"></i>
                    <span class="link-title">Error</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="errorPages">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="pages/error/404.html" class="nav-link">404</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item nav-category">Docs</li>
            <li class="nav-item">
                <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
                    <i class="link-icon" data-feather="hash"></i>
                    <span class="link-title">Documentation</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
