function showNotify(message, type) {
    $('#notify').removeClass("text-bg-info");
    $('#notify').removeClass("text-bg-success");
    $('#notify').removeClass("text-bg-warning");
    $('#notify').removeClass("text-bg-danger");
    var icon = "";

    switch(type) {
        case 'info': {
            $('#notify').addClass("text-bg-info");
            icon = '<i class="bi bi-info-lg me-2"></i>';
            break;
        }

        case 'success': {
            $('#notify').addClass("text-bg-success");
            break;
        }

        case 'warning': {
            $('#notify').addClass("text-bg-warning");
            break;
        }

        case 'danger': {
            $('#notify').addClass("text-bg-danger");
            break;
        }
    }

    $('#notify').find('.toast-body').text(message);
}

var mainPage = $('.main-page');

mainPage.on('keypress', '.search', function(e) {
    if(e.keyCode == 13) {
        $('.search-btn').click();
    }
});

mainPage.on('click', '.search-btn', function() {
    var searchQuery = $(this).prev('input').val();
    alert(searchQuery);
    if(searchQuery.trim() != "") {
        $.ajax({
            type: 'POST',
            url: window.location.href,
            data: {search: searchQuery},
            success: function(data) {
            }
        });
    }
});