// $(function () {
//     $("body").on('change', 'input[type=file].select-file', function () {
//         let ele = $(this).parent('.form-group');
//         if (this.files && this.files[0]) {
//             var reader = new FileReader();
//             reader.onload = function(e) {
//                 // ele.attr('src', e.target.result);
//                 ele.find('source')[0].src = e.target.result;
//                 ele.load();
//             }
//             reader.readAsDataURL(this.files[0]);
//         }
//     }); // PREVIEW THE IMAGE WHEN SELECTED
// });

// $(document).on("change", "input[type=file].select-file", function(evt) {
//     var source = $('.review-file source');
//     source[0].src = URL.createObjectURL(this.files[0]);
//     source.parent()[0].load();
// });

// document.querySelector("input[type=file].select-file")
// .onchange = function(event) {
//     let file = event.target.files[0];
//     let blobURL = URL.createObjectURL(file);
//     document.querySelector("review-file source").src = blobURL;
// }
