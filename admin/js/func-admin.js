
jQuery(function($) {

    var sjs_tabs_hash = window.location.hash,
        sjs_current_tab = window.location.hash.replace('!', '');

    if (sjs_tabs_hash && sjs_tabs_hash.indexOf('sjs-tab') >= 0) {
        var sjs_post_action = $('#post').attr('action');
        $('.absoute-swiper-nav-tab').find('.active').removeClass('active');
        $('.absoute-swiper-nav-tab li').find('a[href="' + sjs_current_tab + '"]').parent('li').addClass('active');
        $('.absoluteSwiperSettingsSection .tab-content .tabSec').hide();
        $('.absoluteSwiperSettingsSection .tab-content '+ sjs_current_tab).fadeIn();
        if (sjs_post_action) {
            sjs_post_action = sjs_post_action.split('#')[0];
            $('#post').attr('action', sjs_post_action + window.location.hash);
        }
    }else{
        $('.absoluteSwiperSettingsSection .tab-content .tabSec').first().fadeIn();
    }


    var file_frame;

    checkData();

    $(document).on('click', 'a.gallery-add', function(e) {

        e.preventDefault();

        if (file_frame) file_frame.close();

        file_frame = wp.media.frames.file_frame = wp.media({
            title: $(this).data('uploader-title'),
            button: {
                text: $(this).data('uploader-button-text'),
            },
            multiple: true,
            library: { type: 'image' },
            priority:   20,
            toolbar:    'main-gallery',
            filterable: 'uploaded',
            editable:   true,
            allowLocalEdits: true,
            displaySettings: true,
            displayUserSettings: true
        });

        file_frame.on('select', function() {
            var listIndex = $('#gallery-metabox-list li').index($('#gallery-metabox-list li:last')),
                selection = file_frame.state().get('selection');

            selection.map(function(attachment, i) {
                attachment = attachment.toJSON(),
                    index = listIndex + (i + 1);
                var html =
                    '<li>'+
                        '<input type="hidden" name="_absolute_swiper_slider_post[gallery][' + index + ']" value="' + attachment.id + '">'+
                        '<img class="image-preview" src="' + attachment.sizes.thumbnail.url + '">'+
                        '<div class="actionButtons">'+
                            '<a class="change-image button button-small" href="#" data-uploader-title="Change image" data-uploader-button-text="Change image">'+
                                '<span class="dashicons dashicons-edit"></span>'+
                            '</a>'+
                            '<a class="remove-image button button-small" href="#">'+
                                '<span class="dashicons dashicons-trash"></span>'+
                            '</a>'+
                        '</div>'+
                    '</li>';
                $('#gallery-metabox-list').append(html);
                checkData();
            });
        });

        makeSortable();
        file_frame.open();
    });

    $(document).on('click', 'a.change-image', function(e) {

        e.preventDefault();
        var that = $(this);
        if (file_frame) file_frame.close();

        file_frame = wp.media.frames.file_frame = wp.media({
            title: $(this).data('uploader-title'),
            button: {
                text: $(this).data('uploader-button-text'),
            },
            multiple: false,
            toolbar:    'main-gallery',
            editable:   true,
            allowLocalEdits: true,
            displaySettings: true,
            displayUserSettings: true
        });

        file_frame.on('select', function() {
            attachment = file_frame.state().get('selection').first().toJSON();

            that.parent().find('input:hidden').attr('value', attachment.id);
            that.parent().find('img.image-preview').attr('src', attachment.sizes.thumbnail.url);
        });

        file_frame.open();

    });

    function resetIndex() {
        $('#gallery-metabox-list li').each(function(i) {
            $(this).find('input:hidden').attr('name', '_s_s_m_gallery_id[' + i + ']');
        });
    }

    function makeSortable() {
        $('#gallery-metabox-list').sortable({
            opacity: 0.6,
            stop: function() {
                resetIndex();
            }
        });
    }

    function checkData(){
        //console.log($('#gallery-metabox-list li').length);
        if($('#gallery-metabox-list li').length > 0){
            $('.noDataFound').slideUp();
        }else{
            $('.noDataFound').slideDown();
        }
        
    }

    $(document).on('click', 'a.remove-image', function(e) {
        e.preventDefault();
        if (confirm('Are you sure you want to remove this image?')) {
            $(this).parents('li').animate({ opacity: 0 }, 200, function() {
                $(this).remove();
                resetIndex();
                checkData();
            });
        }
    }).on('click', 'a.removeAll', function(e){
        e.preventDefault();
        if (confirm('Are you sure you want to remove all images?')) {
            $('#gallery-metabox-list').html('');
            resetIndex();
            checkData();
        }
    }).on('click', 'a.saveAll', function(e){
        e.preventDefault();
        $('#publish').trigger('click');
    });
    
    makeSortable();

    $('body').on('click', '.absoluteSwiperSettingsSection .absoute-swiper-nav-tab li a', function(e){
        e.preventDefault();
        var t = $(this),
            v = t.attr('href'),
            d = t.attr('data-tab-id'),
            s = $('.absoute-swiper-nav-tab').attr('data-update-hashbang'),
            b = ((typeof t.attr('href') !== 'undefined') ? t.attr('href') : d);
        $('.absoute-swiper-nav-tab li').removeClass('active');
        t.closest('li').addClass('active');
        $('.absoluteSwiperSettingsSection .tab-content .tabSec').hide();
        $('.absoluteSwiperSettingsSection .tab-content '+v).fadeIn();

        if (s === '1') {
            window.location.hash = b.split('#').join('#!');
            var sjs_post_action = $('#post').attr('action');
            if (sjs_post_action) {
                sjs_post_action = sjs_post_action.split('#')[0];
                $('#post').attr('action', sjs_post_action + window.location.hash);
            } 
        }
    });

    $('.copyData').click(function(e) {
        e.preventDefault();
        $(this).prev().focus();
        $(this).prev().select();
        document.execCommand('copy');
    });

    $(".addShortCode").on('click', function(e) {
        //send_to_editor(jQuery("#sc_select :selected").val());
        e.preventDefault();
    });

});