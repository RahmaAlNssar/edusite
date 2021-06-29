@forelse ($tags as $tag)
<span class="badge badge badge-success">{{ $tag['name'] }}</span>
@empty
no tags found
@endforelse
