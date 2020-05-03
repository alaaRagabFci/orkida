    $(document).ready(function() {

        // start code model 

        $('#click-check').on('click', function() {
            $('.show-textarea').show()
        });

        $('#continue').on('click', function() {
            $('#first_form').hide();
            $('#modal-body-title').hide();
            $('#secand_form').show();
        });
        $('.close').on('click', function() {
            $('#first_form').show();
            $('#modal-body-title').show();
            $('#secand_form').hide();
        });


        // start code BackToTop
        var BackToTop = $("#buttonBackToTop");
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                BackToTop.addClass('show');
            } else {
                BackToTop.removeClass('show');
            }
        });

        BackToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, '300');
        });

        // start fixed home navbar

        var NavBar = $("#NavBar");
        var ExtraNav = $("#ExtraNav");
        $(window).scroll(function() {
            if ($(window).scrollTop() > 0) {
                NavBar.addClass('fixed');
                ExtraNav.addClass('fixed');
            } else {
                NavBar.removeClass('fixed');
                ExtraNav.removeClass('fixed');
            }
        });
        // nice select 
        $('.nice-select').niceSelect();
        // mobile nav toggle
        $('.navbar-toggler').click(function() {
            $(this).toggleClass("on");
            $('.navbar-toggler').addClass('show');
        });
        // tabs active class
        $('.nav-tabs li').click(function() {
            $(this).siblings('li').removeClass('active-tab');
            $(this).addClass('active-tab');

        });
        $('.main-title').click(function() {
            $('.nav-tabs li').siblings('li').removeClass('active-tab');
            $('.notShow').removeClass('active show');
            $('#menu0').addClass('active show');
        });

        // start slider with submnil

        var bigimage = $("#big");
        var thumbs = $("#thumbs");
        var syncedSecondary = true;
        bigimage
            .owlCarousel({
                items: 1,
                slideSpeed: 2000,
                nav: true,
                rtl: true,
                dots: false,
                margin: 0,
                loop: true,
                responsiveRefreshRate: 200,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                        dots: false
                    },
                    1000: {
                        items: 1,
                        nav: true,
                        dots: false
                    }


                },
                navText: [
                    '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                ]
            })
            .on("changed.owl.carousel", syncPosition);

        thumbs
            .on("initialized.owl.carousel", function() {
                thumbs
                    .find(".owl-item")
                    .eq(0)
                    .addClass("current");
            })
            .owlCarousel({
                items: 8,
                dots: true,
                rtl: true,
                nav: true,
                margin: 0,
                navText: [
                    '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                    '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                ],
                smartSpeed: 200,
                slideSpeed: 500,
                slideBy: 8,
                responsiveRefreshRate: 100,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 3,
                        nav: false,
                        dots: false
                    },
                    1000: {
                        items: 8,
                        nav: false,
                        dots: false
                    }

                }
            })
            .on("changed.owl.carousel", syncPosition2);

        function syncPosition(el) {
            //if loop is set to false, then you have to uncomment the next line
            //var current = el.item.index;

            //to disable loop, comment this block
            console.log(el);
            var count = el.item.count - 1;
            var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

            if (current < 0) {
                current = count;
            }
            if (current > count) {
                current = 0;
            }
            //to this
            thumbs
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = thumbs.find(".owl-item.active").length - 1;
            console.log(onscreen);
            var start = thumbs
                .find(".owl-item.active")
                .first()
                .index();
            var end = thumbs
                .find(".owl-item.active")
                .last()
                .index();
            console.log(end);
            if (current > end) {
                thumbs.data("owl.carousel").to(current, 100, true);
            }
            if (current < start) {
                thumbs.data("owl.carousel").to(current - onscreen, 100, true);
            }
        }

        function syncPosition2(el) {
            if (syncedSecondary) {
                var number = el.item.index;
                bigimage.data("owl.carousel").to(number, 100, true);
            }
        }

        thumbs.on("click", ".owl-item", function(e) {
            e.preventDefault();
            var number = $(this).index();
            bigimage.data("owl.carousel").to(number, 300, true);
        });


    });

    var videoWrappers = document.querySelectorAll('.video-wrapper');

    function renderVideoPlayButtons() {
        videoWrappers.forEach(function(videoWrapper) {
            var video = videoWrapper.querySelector("video");
            if (video) {
                formatVideoPlayButton(videoWrapper);
                video.classList.add('has-media-controls-hidden');

                var videoPlayButton = videoWrapper.querySelector('.video-overlay-play-button');
                videoPlayButton.addEventListener('click', function() {
                    hideVideoPlayButton(video, videoPlayButton);
                });
            }
        });
    }

    function formatVideoPlayButton(videoWrapper) {
        videoWrapper.insertAdjacentHTML('beforeend', '<svg class="video-overlay-play-button" viewBox="0 0 200 200" alt="Play video"><circle cx="100" cy="100" r="90" fill="none" stroke-width="15" stroke="#fff"/><polygon points="70, 55 70, 145 145, 100" fill="#fff"/></svg>');
    }

    function hideVideoPlayButton(video, videoPlayButton) {
        video.play()
        videoPlayButton.classList.add('is-hidden')
        video.classList.remove('has-media-controls-hidden')
        video.setAttribute('controls', 'controls')
    }

    renderVideoPlayButtons();

    function openNav() {
        document.getElementById("myNav").style.width = "100%";
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }

    function openNavSearch() {
        $("#openSearch").toggle();
    }