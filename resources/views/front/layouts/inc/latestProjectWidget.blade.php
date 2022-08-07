<!--widget-latest-posts-->
<div class="widget ">
    <div class="section-title">
        <h5>Son Projeler</h5>
    </div>
    <ul class="widget-latest-posts">
        @php($i=1)
        @foreach($latestProject as $latest)
            <li class="last-post">
                <div class="image">
                    <a href="{{ route('front.singleProject',$latest->slug) }}">
                        <img src="/storage/project/{{ $latest->image }}" alt="...">
                    </a>
                </div>
                <div class="nb">{{ $i++ }}</div>
                <div class="content">
                    <p>
                        <a href="{{ route('front.singleProject',$latest->slug) }}">{{ $latest->name }}</a>
                    </p>
                    <small>
                        <span class="icon_clock_alt"></span>{{ $latest->created_at->format('d-m-y') }}</small>
                </div>
            </li>

        @endforeach
    </ul>
</div>
<!--/-->
