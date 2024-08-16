function previewAvatar(){
    const $inputFile = document.querySelectorAll('.custom-file-input');
    const $previewAvatar = document.querySelectorAll('#previewAvatar');

    if(!$inputFile.length && !$previewAvatar.length) return;

    for(let i = 0; i < $inputFile.length; i++){
        function createImage(files)
        {
            if(!$previewAvatar[i]){
                return;
            }

            if (files && files[0]){
                const reader = new FileReader();
                reader.readAsDataURL(files[0]);

                reader.onload = function(e){
                    $previewAvatar[i].src = e.target.result;
                }
            }
        }

        $inputFile[i].addEventListener('change', function(e){
            const files = e.target.files;
            createImage(files);
        });
    }
}

document.addEventListener('DOMContentLoaded', function(){
    previewAvatar();
});
