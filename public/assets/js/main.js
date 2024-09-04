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

function likes(){
    function toggleLike(el, isLike){
        const postId = el.data('post-id');
        const token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: `/posts/${postId}/like`,
            type: 'POST',
            data: {
                '_token': token,
                'is_like': isLike
            },
            dataType: 'json',
            success: function(response) {
                if (!response['success']) return;

                if(isLike){
                    if($(`button[data-post-id="${postId}"][data-type="btn-like"] > i`).hasClass('fas')){
                        $(`button[data-post-id="${postId}"][data-type="btn-like"]`).html('<i class="far fa-thumbs-up"></i>');
                    }
                    else{
                        $(`button[data-post-id="${postId}"][data-type="btn-dislike"]`).html('<i class="far fa-thumbs-down"></i>');
                        $(`button[data-post-id="${postId}"][data-type="btn-like"]`).html('<i class="fas fa-thumbs-up"></i>');
                    }
                }else{
                    if($(`button[data-post-id="${postId}"][data-type="btn-dislike"] > i`).hasClass('fas')) {
                        $(`button[data-post-id="${postId}"][data-type="btn-dislike"]`).html('<i class="far fa-thumbs-down"></i>');
                    } else {
                        $(`button[data-post-id="${postId}"][data-type="btn-dislike"]`).html('<i class="fas fa-thumbs-down"></i>');
                        $(`button[data-post-id="${postId}"][data-type="btn-like"]`).html('<i class="far fa-thumbs-up"></i>');
                    }
                }

                $(`[data-type="like-count-${postId}"]`).text(response['likesCount']);
                $(`[data-type="dislike-count-${postId}"]`).text(response['dislikesCount']);
            }
        });
    }

    $(document).on('click', '[data-type="btn-like"]', function(){
        toggleLike($(this), 1);
    });

    $(document).on('click', '[data-type="btn-dislike"]', function() {
       toggleLike($(this), 0);
    });
}

document.addEventListener('DOMContentLoaded', function(){
    previewAvatar();
    likes();
});
