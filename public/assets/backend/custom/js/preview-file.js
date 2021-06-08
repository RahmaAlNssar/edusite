function previewFile(file) {
    if (file.files && file.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#show-file').attr('src', e.target.result);
            if (file.files[0].type.split("/")[0] == 'video')
                $('#show-file').parent()[0].load();
        }
        reader.readAsDataURL(file.files[0]);
    }
}
