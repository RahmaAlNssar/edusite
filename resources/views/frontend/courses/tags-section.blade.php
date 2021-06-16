<div class="sidebar_section">
    <div class="sidebar_section_title">Tags</div>
    <div class="sidebar_tags">
        <ul class="tags_list">
            @foreach ($tags as $tag)
            <li><a href="#">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
