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