<div class="vertical-menu">

    <div data-simplebar class="h-100">
        @php
            $id = Auth::user()->id;
            $adminData = App\Models\User::find($id);
        @endphp
        <!-- User details -->
        <div class="user-profile text-center mt-3">
            <div class="">
                @if(auth()->check() && !empty(auth()->user()->profile_picture))
                    <img src="{{ asset('/ProfilePicture/' . auth()->user()->profile_picture) }}" alt="User Profile Picture" class="avatar-md rounded-circle">
                @else
                    <img src="{{ url('upload/no_image.jpg') }}" alt="Failed to load" class="avatar-md rounded-circle">
                @endif
            </div>

            <div class="mt-3">
                <h4 class="font-size-16 mb-1">{{ $adminData->name }}</h4>
                <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i>
                    Online</span>
            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{route('user.dashboard')}}" class="waves-effect">
                        <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('post.view')}}" class="waves-effect">
                        <i class="fa fa-book"></i><span class="badge rounded-pill bg-success float-end"></span>
                        <span>User Post</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
