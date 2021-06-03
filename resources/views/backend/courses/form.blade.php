{{-- START COURSE Title --}}
<div class="form-group">
    <label>Course Title:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="la la-list"></i> </span>
        </div>
        <input type="text" class="form-control" name="title" value="{{ $course->title ?? old('title') }}"
            placeholder="Course Tite">
    </div>
    <span class="red error" id="title-error"></span>
</div>
{{-- START COURSE Title --}}

{{-- START COURSE TEXTAREA --}}
<div class="form-group">
    <label>Course Descrption:</label>
    <div class="input-group">
<textarea class="form-control" id="descrption" name="descrption" rows="2" placeholder="Course Descrption">{{$course->descrption ?? old('descrption')}}</textarea>
{{-- END COURSE TEXTAREA --}}

{{-- START Course Price --}}
<div class="form-group">
    <label>Course Price:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-sort-numeric-up-alt"></i> </span>
        </div>
        <input type="number" class="form-control" name="price" value="{{ $course->price ?? old('price') }}"
            placeholder="Category Order" value="1" min="1">
    </div>
    <span class="red error" id="price-error"></span>
</div>
{{-- END Course Price --}}

{{-- START Course Discount --}}
<div class="form-group">
    <label>Course Discount:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-sort-numeric-up-alt"></i> </span>
        </div>
        <input type="number" class="form-control" name="discount" value="{{ $course->discount ?? old('discount') }}"
            placeholder="Category Order" value="1" min="1">
    </div>
    <span class="red error" id="discount-error"></span>
</div>
{{-- END Course Discount --}}

{{-- START Course Total --}}
<div class="form-group">
    <label>Course Total:</label>
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-sort-numeric-up-alt"></i> </span>
        </div>
        <input type="number" class="form-control" name="total" value="{{ $course->total ?? old('total') }}"
            placeholder="Category Order" value="1" min="1">
    </div>
    <span class="red error" id="total-error"></span>
</div>
{{-- END Course Total --}}



{{-- START COURSE Category --}}
<div class="form-group">
    <label>Category:</label>

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text"> <i class="fas fa-lightbulb"></i> </span>
        </div>
        <select class="form-control" name="category_id">
            {{-- @foreach($categories as $category) 
           <option value="{{$category->id}}"{{isset($course) ? ($course->category_id == $category->id ? 'selected':'') : (old('category_id') == $category->id ? 'selected':'')}}>{{$category->name}}</option>
          
            @endforeach  --}}
        </select>
    </div>
    <span class="red error" id="category_id-error"></span>
</div>
{{-- END COURSE Category--}}
