@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
@endphp

<!--logo start-->
<div class="brand">
    <a href="{{ route('admin.member.index') }}" class="logo">
        GROUP04
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->
<div class="nav notify-row" id="top_menu">
    <!--  notification start -->
    <ul class="nav top-menu">
        <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <i class="fa fa-envelope-o"></i>
                @if($unreadCount > 0)
                    <span class="badge bg-important">{{ $unreadCount }}</span>
                @endif
            </a>
            <ul class="dropdown-menu extended inbox">
                <li>
                    @if($unreadCount > 0)
                        <p class="red">You have {{ $unreadCount }} Mails</p>
                    @else
                        <p>No new mail</p>
                    @endif
                </li>

                @foreach($unreadContacts as $contact)
                    <li>
                        <a href="{{ route('admin.contact.read', ['id' => $contact->id]) }}">
                            <span class="subject">
                                <span class="from">{{ $contact->name }}</span>
                                <span class="time">{{ \Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</span>
                            </span>
                            <span class="message">
                                {{ \Illuminate\Support\Str::limit($contact->message, 50) }}
                            </span>
                        </a>
                    </li>
                @endforeach
                <li>
                    <a href="{{ route('admin.contact.index') }}">See all messages</a>
                </li>
            </ul>
        </li>

    </ul>
</div>
<div class="top-nav clearfix">
    <ul class="nav pull-right top-menu">
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                {{-- <img alt="" src="{{ asset('admin/assets/images/2.png') }}"> --}}
                <span class="username">Show more</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                {{-- <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li> --}}
                <li><a href="{{ route('index') }}"><i class="fa fa-cog"></i> Go To Shop</a></li>
                <li><a href="{{ route('logout') }}"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->

    </ul>
    <!--search & user info end-->
</div>
