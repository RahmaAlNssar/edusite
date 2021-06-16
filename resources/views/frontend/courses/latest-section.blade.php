<div class="sidebar_section">
    <div class="sidebar_section_title">Latest Courses</div>
    <div class="sidebar_latest">
        @foreach ($latest as $item)
        <div class="latest d-flex flex-row align-items-start justify-content-start">
            <div class="latest_image">
                <div><img src="{{ $item->image_url }}" alt="{{ $item->title }}"></div>
            </div>
            <div class="latest_content">
                <div class="latest_title">
                    <a href="{{ route('course', [$item->id, $item->slug]) }}" data-toggle="tooltip"
                        title="{{ $item->title }}">
                        {{ Str::limit($item->title, 45, '...') }}
                    </a>
                </div>
                <div class="latest_price">
                    @if ($item->discount)
                    {{ $item->total() }}
                    @else
                    {{ $item->price ? '$' . $item->price : 'FREE' }}
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
