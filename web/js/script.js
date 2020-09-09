// $(document).ready(function () {
//     $('.menu-item').click(function () {
//         var elementClick = $(this).attr('data-link');
//         var destination = $(elementClick).offset().top;
//         $('html,body').animate({ scrollTop: destination }, 400);
//         return false;
//     });

// });

function selectMenuItem(e) {
    $('.menu-item').removeClass('active');
    $(e.target).addClass('active');
    var elementClick = $(e.target).attr('data-link');
    var destination = $(elementClick).offset().top;
    $('html,body').animate({ scrollTop: destination }, 400);
}

function selectMenuMobileItem(e) {
    $('.menu-item').removeClass('active');
    $(e.target).addClass('active');
    var elementClick = $(e.target).attr('data-link');
    var destination = $(elementClick).offset().top;
    $('html,body').animate({ scrollTop: destination }, 400);
    hideMenuMobile();
}

function showMenuMobile() {
    $('.menu-mobile').addClass('menu-mobile-on');
    $('.menu-mobile-back').css('display', 'block')
}

function hideMenuMobile() {
    $('.menu-mobile').removeClass('menu-mobile-on');
    $('.menu-mobile-back').css('display', 'none')
}

function selectCourse(e) {
    const id = $(e.target).attr('data-id');
    console.log("selectMenuItem -> id", id)
    $('.fifth-icons-item, .fifth-description').each((i, el) => {
        if ($(el).attr('data-id') == id) {
            $(el).addClass('active');
        } else {
            $(el).removeClass('active');
        }
        // console.log("selectCourse -> i, el", i, el)
    });
    // $('.fifth-description').each((i, el) => {
    //     if ($(el).attr('data-id') == id) {
    //         $(el).addClass('active');
    //     } else {
    //         $(el).removeClass('active');
    //     }
    // });
}

function buy(id) {
    alert(id);
}


// ADMIN

function selectVideo(e) {
    $('#ktModal').modal('show');
    $('#ktModal .modal-body').load('/lesson/video-list');
}

function toggleProgAccess(obj) {
    const progId = $(obj).attr('data-prog-id');
    const userId = $(obj).attr('data-user-id');
    console.log(progId, userId);
    $.ajax({
        url: '/user/toggle-prog-access?prog_id=' + progId + '&user_id=' + userId,
        method: 'GET'
    }).done((res) => {
        console.log("toggleProgAccess -> res", res)
    });
}

function setVideoForLesson(name) {
    $('#lesson-video').val(name);
    $('#ktModal').modal('hide');
}
