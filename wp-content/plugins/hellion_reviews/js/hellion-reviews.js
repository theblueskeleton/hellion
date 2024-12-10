jQuery(document).ready(function ($) {
    // Handle Genre Filtering
    $('#genre-filter').on('change', function () {
        const genre = $(this).val();
        $.ajax({
            url: hellion_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'filter_reviews',
                genre: genre
            },
            success: function (response) {
                $('#reviews-container').html(response);
            },
            error: function (xhr, status, error) {
                console.error('AJAX Genre Filter Error:', error);
                alert('Failed to load reviews. Please try again.');
            }
        });
    });

    // Handle Like and Dislike
    $('.review-voting button').on('click', function () {
        const postId = $(this).data('post-id');
        const type = $(this).hasClass('like-button') ? 'like' : 'dislike';

        $.ajax({
            url: hellion_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'like_dislike',
                post_id: postId,
                type: type
            },
            success: function (response) {
                if (response.success) {
                    const newCount = response.data.new_count;
                    $(`.${type}-button[data-post-id="${postId}"]`).text(`${type.charAt(0).toUpperCase() + type.slice(1)} (${newCount})`);
                } else {
                    console.error('AJAX Like/Dislike Error:', response.data);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX Like/Dislike Error:', error);
                alert('Failed to process your request. Please try again.');
            }
        });
    });
});
