@forelse ($images as $image)
<img src="{{ $image->image_url }}" width="150px" class="img-thumbnail">
@empty
no image
@endforelse
