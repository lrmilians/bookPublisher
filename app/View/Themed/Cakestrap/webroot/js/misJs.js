$(document).ready(function() {
    menuActions();
    sortableContent();
});

function menuActions() {
    $('.navigation li').hover(
            function() {
                $('.level1', this).fadeIn();
            },
            function() {
                $('.level1', this).fadeOut();
            }
    );
    $('.level1 li').hover(
            function() {
                $('.level2', this).fadeIn();
            },
            function() {
                $('.level2', this).fadeOut();
            }
    );
}

function sortableContent () {
    $('.sortable').nestedSortable({
        handle: 'div',
        items: 'li',
        toleranceElement: '> div'
    });
}

function updateContent() {
    var k = 0;
    $(".sortable li").each(function(i) {
        k = i + 1;
        if ($('li#item_' + k).find("ol").length == 0) {
            $('li#item_' + k).attr('is_parent', '0');
        } else {
            if ($('li#item_' + k).find("ol").length > 0) {
                $('li#item_' + k).attr('is_parent', '1');
            }
        }
    });
    
    var arrayItem = new Array (new Array ());
    var dataArray = $('.sortable').nestedSortable('toArray');
    var id;
    var parentId;
    var level;
    var children;
    var i = 0;
    
    while (dataArray[i] != null) {
        if ($('li#item_' + dataArray[i]['item_id']).attr('item_id') != null) {
            id = $('li#item_' + dataArray[i]['item_id']).attr('item_id');
            level = dataArray[i]['depth'];
            if (dataArray[i]['parent_id'] == null) {
                parentId = 0; 
            } else {
                parentId = dataArray[i]['parent_id']; 
            }
            children = $('li#item_' + dataArray[i]['item_id']).attr('is_parent')
            arrayItem[i-1] =  [id, level, i, parentId, children];
        }
        i++;
    }
    
    $.ajax({
        type: 'post',
        url: '',
        async: false,
        data: {values: arrayItem},
        success: function(data) {
           alert("Contenido actualizado"); 
        },
        error: function(obj, resultCode, c) {
            console.log(resultCode);     
        }     
    });
}

function showContentSelect() {
    $.ajax({
        type: 'post',
        url: '',
        //async: false,
        data: {values: arrayItem},
        success: function(data) {
           alert("Contenido actualizado"); 
        },
        error: function(obj, resultCode, c) {
            console.log(resultCode);     
        }     
    });
}

