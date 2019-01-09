<div class="fvv-sidebar-content">
    <div class="list-f-sidebar">
        <h3>Danh sách</h3>
        <ul>
            <li class="{{ request()->is('/') ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> Trang chủ
                </a>
            </li>
            <li class="{{ request()->is('album*') ? 'active' : '' }}">
                <a href="{{ url('album') }}">
                    <i class="fa fa-tv"></i> Phim bộ
                </a>
            </li>
            <li class="{{ request()->is('item*') ? 'active' : '' }}">
                <a href="{{ url('item') }}">
                    <i class="fa fa-camera-retro"></i> Phim lẻ
                </a>
            </li>
        </ul>
    </div>
</div>