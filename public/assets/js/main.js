function previewAvatar(){
    const $inputFile = document.querySelector('.custom-file-input');
    const $previewAvatar = document.querySelector('#previewAvatar');

    if(!$inputFile && !$previewAvatar)
        return;

    function createImage(files)
    {
        if (files && files[0]){
            const reader = new FileReader();
            reader.readAsDataURL(files[0]);

            reader.onload = function(e){
                $previewAvatar.src = e.target.result;
            }
        }
    }

    $inputFile.addEventListener('change', function(e){
        const files = e.target.files;
        createImage(files);
    });
}

document.addEventListener('DOMContentLoaded', function(){
    previewAvatar();
});
