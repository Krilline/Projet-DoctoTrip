$(document).ready(function() {
    $('.js-search-autocomplete').each(function() {
        let autocompleteUrlCategory = $(this).data('category-url');
        let autocompleteUrlUser = $(this).data('user-url')
        $(this).autocomplete({hint: false}, [
            {
                source: function(query, cb) {
                    $.ajax({
                        url: autocompleteUrlCategory+'?query='+query
                    }).then(function(data) {
                        cb(data.categories);
                    });
                },
                displayKey: 'name'
            },
            {
                source: function(query, cb) {
                    $.ajax({
                        url: autocompleteUrlUser+'?query='+query
                    }).then(function(data) {
                        cb(data.users);
                    });
                },
                displayKey: 'lastname'
            }
        ])
    });
});