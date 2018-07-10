<li class="<?php is_active_page(['departments', 'view_dept']);?>"
    style="display: !Auth::isAdmin() ? 'none' : '';">
    <a href="view_dept.php">
        <i class="zmdi zmdi-accounts-list-alt"></i> Departments
    </a>
</li>

<li class="<?php is_active_page(['view_jobs']); ?>"
    style="display: !Auth::isAdmin() ? 'none' : '';">
    <a href="view_jobs.php">
        <i class="zmdi zmdi-case"></i> Job Titles
    </a>
</li>

<li class="<?php is_active_page(['staff']); ?>"
    style="display: !Auth::isAdmin() ? 'none' : '';">
    <a href="staff.php">
        <i class="zmdi zmdi-accounts"></i> Staff List
    </a>
</li>