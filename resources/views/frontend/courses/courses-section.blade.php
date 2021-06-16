<div class="courses_search_container">
    <form action="#" id="courses_search_form"
        class="courses_search_form d-flex flex-row align-items-center justify-content-start">
        <input type="search" class="courses_search_input" placeholder="Search Courses" required="required">
        <select id="courses_search_select" class="courses_search_select courses_search_input">
            <option>All Categories</option>
            <option>Category</option>
            <option>Category</option>
            <option>Category</option>
        </select>
        <button action="submit" class="courses_search_button ml-auto">search now</button>
    </form>
</div>
<div class="courses_container">
    <div class="row courses_row">

        @forelse ($courses as $course)
        <div class="col-lg-6 course_col">
            @include('frontend.includes.course-card')
        </div>
        @empty
        <p class="text-center">no courses found</p>
        @endforelse

    </div>
    <div class="d-flex justify-content-center">
        {!! $courses->links() !!}
    </div>
</div>
