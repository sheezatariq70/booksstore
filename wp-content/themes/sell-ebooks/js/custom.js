jQuery(document).ready(function(e) {
    if(jQuery('.footer-wrap').hasClass('style2')){
        jQuery( ".footer-wrap .copyright" ).append('<p class="credits">'+sell_ebooks_script.power_text+'<a href="'+sell_ebooks_script.credits_link+'" target="_blank">'+sell_ebooks_script.credits_text+'</a></p>');
    }
});
(function(e) {
    e.fn.appear = function(t, n) {
        var i = e.extend({
            data: void 0,
            one: !0,
            accX: 0,
            accY: 0
        }, n);
        return this.each(function() {
            var n = e(this);
            if (n.appeared = !1,
            !t)
                return void n.trigger("appear", i.data);
            var s = e(window)
              , r = function() {
                if (!n.is(":visible"))
                    return void (n.appeared = !1);
                var e = s.scrollLeft()
                  , t = s.scrollTop()
                  , r = n.offset()
                  , a = r.left
                  , u = r.top
                  , o = i.accX
                  , d = i.accY
                  , l = n.height()
                  , c = s.height()
                  , f = n.width()
                  , p = s.width();
                u + l + d >= t && t + c + d >= u && a + f + o >= e && e + p + o >= a ? n.appeared || n.trigger("appear", i.data) : n.appeared = !1
            }
              , a = function() {
                if (n.appeared = !0,
                i.one) {
                    s.unbind("scroll", r);
                    var a = e.inArray(r, e.fn.appear.checks);
                    a >= 0 && e.fn.appear.checks.splice(a, 1)
                }
                t.apply(this, arguments)
            };
            i.one ? n.one("appear", i.data, a) : n.bind("appear", i.data, a),
            s.scroll(r),
            e.fn.appear.checks.push(r),
            r()
        })
    }
    ,
    e.extend(e.fn.appear, {
        checks: [],
        timeout: null,
        checkAll: function() {
            var t = e.fn.appear.checks.length;
            if (t > 0)
                for (; t--; )
                    e.fn.appear.checks[t]()
        },
        run: function() {
            e.fn.appear.timeout && clearTimeout(e.fn.appear.timeout),
            e.fn.appear.timeout = setTimeout(e.fn.appear.checkAll, 20)
        }
    }),
    e.each(["append", "prepend", "after", "before", "attr", "removeAttr", "addClass", "removeClass", "toggleClass", "remove", "css", "show", "hide"], function(t, n) {
        var i = e.fn[n];
        i && (e.fn[n] = function() {
            var t = i.apply(this, arguments);
            return e.fn.appear.run(),
            t
        }
        )
    })
})(jQuery);
/* start Mobile Menu */
(function ($) {
    $.fn.menumaker = function (options) {
        var cssmenu = $(this),
            settings = $.extend({ title: "", format: "dropdown", sticky: false }, options);
        return this.each(function () {
            cssmenu.prepend('<div id="menu-button"></div>');
            jQuery(this).find("#menu-button").on('click', function () {
                jQuery(this).toggleClass('menu-opened');
                var mainmenu = jQuery(this).next('ul');
                if (mainmenu.hasClass('open')) {
                    mainmenu.removeClass('open');
                } else {
                    mainmenu.addClass('open');
                    if (settings.format === "dropdown") {
                        mainmenu.find('ul').addClass('open');
                    }
                }
            });
            cssmenu.find('li ul').parent().addClass('has-sub');
            multiTg = function () {
                cssmenu.find(".has-sub").prepend('<span class="submenu-button"></span>');
                cssmenu.find('.submenu-button').on('click', function () {
                    jQuery(this).toggleClass('submenu-opened');
                    if (jQuery(this).siblings('ul').hasClass('open')) {
                        jQuery(this).siblings('ul').removeClass('open').hide();
                    } else {
                        jQuery(this).siblings('ul').addClass('open').show();
                    }
                });
            };
            if (settings.format === 'multitoggle') multiTg();
            else cssmenu.addClass('dropdown');
            if (settings.sticky === true) cssmenu.css('position', 'fixed');
            resizeFix = function () {
                if (jQuery(window).width() > 1024) {
                    cssmenu.find('ul').show();
                }
                if (jQuery(window).width() <= 1024) {
                    cssmenu.find('ul').removeClass('open');
                }
            };
            resizeFix();
            return jQuery(window).on('resize', resizeFix);
        });
    };
})(jQuery);

    jQuery(document).ready(function() {        
            jQuery("#cssmenu").menumaker({
                title: "",
                format: "multitoggle"
            }),
            jQuery("#cssmenu").prepend("<div id='menu-line'></div>");
            var t, n, i, s, r = !1, a = 0, u = jQuery("#cssmenu #menu-line");
            jQuery("#cssmenu > ul > li").each(function() {
                jQuery(this).hasClass("active") && (t = jQuery(this),
                r = !0)
            }),
            r === !1 && (t = jQuery("#cssmenu > ul > li").first()),
            s = n = t.width(),
            i = a = (t.position())?t.position().left:'',
            u.css("width", n),
            u.css("left", a),
            jQuery("#cssmenu > ul > li").hover(function() {
                t = e(this),
                n = t.width(),
                a = t.position().left,
                u.css("width", n),
                u.css("left", a)
            }, function() {
                u.css("left", i),
                u.css("width", s)
            })
        
        var t = jQuery(window).width();
        jQuery("#cssmenu ul ul li").mouseenter(function() {
            var e = jQuery(this).find(".sub-menu").length;
            if (e > 0) {
                var n = jQuery(this).find(".sub-menu").width()
                  , i = jQuery(this).find(".sub-menu").parent().offset().left + n;
                n + i > t ? (jQuery(this).find(".sub-menu").removeClass("submenu-left"),
                jQuery(this).find(".sub-menu").addClass("submenu-right")) : (jQuery(this).find(".sub-menu").removeClass("submenu-right"),
                jQuery(this).find(".sub-menu").addClass("submenu-left"))
            }
        })
    });

jQuery(document).ready(function() {
    jQuery("div").hasClass("sow-slider-base") && jQuery("div").removeClass("heading-hide"),
    jQuery(".menu-options").click(function() {
        jQuery(".port_menu1").slideToggle("slow")
    }),
    jQuery(window).width() < 767 && (jQuery("li").hasClass("portfolioCategories") ? jQuery(".port_menu1 li a").click(function() {
        jQuery(".selected-option").text(jQuery(this).text()),
        jQuery(".port_menu1").slideToggle("slow")
    }) : jQuery(".menu-options").hide()),    
    jQuery("div").hasClass("panel-grid") && jQuery("div").removeClass("sm_pages"),
    jQuery(".back-to-top a").click(function(e) {
        jQuery("html, body").animate({
            scrollTop: 0
        }, 800),
        e.preventDefault
    })
});
jQuery(window).scroll(function() {
    1 == sell_ebooks_script.fixed_header && (jQuery(window).scrollTop() > 50 ? (jQuery(".themesnav").addClass("fixed-header", 1e3, "easeInOutSine"),
    jQuery(".default-heading").removeClass("default-heading-fixed", 1e3, "easeInOutSine")) : jQuery(".themesnav").removeClass("fixed-header", 1e3, "easeInOutSine"),
    jQuery(".themesnav").addClass("home-fixed-class", 1e3, "easeInOutSine"),
    jQuery(".themesnav").addClass("fixed-header", 1e3, "easeInOutSine")),
    jQuery(this).scrollTop() < 50 && (jQuery(".themesnav").removeClass("home-fixed-class", 1e3, "easeInOutSine"),
    jQuery(".themesnav").removeClass("fixed-header", 1e3, "easeInOutSine")),
    jQuery(this).scrollTop() > 600 ? (jQuery(".back-to-top").show(),
    jQuery(".back-to-top a").fadeIn()) : jQuery(".back-to-top a").fadeOut()
});
jQuery(window).load(function() {
    jQuery(".preloader-block").delay(400).fadeOut(500),jQuery("#page_effect").delay(400).fadeIn(400);
});
