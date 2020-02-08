<li class="nav-item {{Request::is('/adminpanel') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/') }}" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">لوحة التحكم</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/settings') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/settings') }}" class="nav-link nav-toggle">
        <i class="fa fa-cogs"></i>
        <span class="title">الأعدادات</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/site_phones') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/site_phones') }}" class="nav-link nav-toggle">
        <i class="fas fa-address-book"></i>
        <span class="title">أرقام هواتف الموقع</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/categories') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/categories') }}" class="nav-link nav-toggle">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
        <span class="title">الأقسام الرئيسية</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/users') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/users') }}" class="nav-link ">
        <i class="fa fa-users"></i>
        <span class="title"> الأعضاء </span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/services', 'adminpanel/services/*', 'adminpanel/services_types', 'adminpanel/services/create') ? 'start active open':'' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-server"></i>
        <span class="title">الخدمات</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{Request::is('adminpanel/services/create') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/services/create') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">أضافة خدمه</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item {{Request::is('adminpanel/services') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/services') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">مشاهدة الخدمات</span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item  {{Request::is('adminpanel/blogs', 'adminpanel/blogs/*', 'adminpanel/blogs/create') ? 'start active open':'' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <span class="icon">
            <i class="fas fa-blog"></i>
        </span>
        <span class="title">المقالات</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{Request::is('adminpanel/blogs/create') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/blogs/create') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">أضافة مقال</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item {{Request::is('adminpanel/blogs') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/blogs') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">مشاهدة المقالات</span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{Request::is('adminpanel/article_types') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/article_types') }}" class="nav-link nav-toggle">
       <span class="icon">
            <i class="fas fa-blog"></i>
        </span>
        <span class="title">أقسام المدونة</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/pest_libraries', 'adminpanel/pest_libraries/*', 'adminpanel/pest_libraries/create') ? 'start active open':'' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <span class="icon">
            <i class="fas fa-pastafarianism"></i>
         </span>
        <span class="title">مكتبة الأفات</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{Request::is('adminpanel/pest_libraries/create') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/pest_libraries/create') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">أضافة مكتبه</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item {{Request::is('adminpanel/pest_libraries') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/pest_libraries') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">مشاهدة مكتبة الأفات</span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{Request::is('adminpanel/ads') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/ads') }}" class="nav-link nav-toggle">
        <span class="icon">
        <i class="fas fa-audio-description"></i>
        </span>
        <span class="title">الأعلانات</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/about_us') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/about_us') }}" class="nav-link nav-toggle">
        <i class="fas fa-address-card"></i>
        <span class="title">من نحن</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/company_valuables') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/company_valuables') }}" class="nav-link nav-toggle">
        <i class="fa fa-server"></i>
        <span class="title">فيم الشركه</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/faqs', 'adminpanel/faqs/*', 'adminpanel/faqs/create') ? 'start active open':'' }}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <span class="icon">
            <i class="fas fa-question"></i>
         </span>
        <span class="title">الأسئله الشائعه</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item {{Request::is('adminpanel/services/create') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/faqs/create') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">أضافة سؤال</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item {{Request::is('adminpanel/faqs') ? 'start active open':'' }}">
            <a href="{{ url('adminpanel/faqs') }}" class="nav-link nav-toggle">
                <i class="fas fa-angle-left"></i>
                <span class="title">مشاهدة الاسئله</span>
                <span class="selected"></span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item {{Request::is('adminpanel/orders') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/orders') }}" class="nav-link nav-toggle">
        <i class="fab fa-first-order"></i>
        <span class="title">الطلبات</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/messages') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/messages') }}" class="nav-link nav-toggle">
        <i class="fab fa-facebook-messenger"></i>
        <span class="title">الرسايل</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item {{Request::is('adminpanel/sliders') ? 'start active open':'' }}">
    <a href="{{ url('adminpanel/sliders') }}" class="nav-link nav-toggle">
        <i class="fab fa-adversal"></i>
        <span class="title">سلايدر العروض</span>
        <span class="selected"></span>
    </a>
</li>


