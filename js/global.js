/*
    @2011-8-08  by shuangzhu
    ������չ������������jquery.1.3.2
    ȫ�ֱ���˵����
        WEB_DIR:    ��ǰִ��Ŀ¼
        CART_URL:   ���ﳵ���ݲ�ѯ·��
        APPS_URL:   ����Ӧ�õ��ýӿ�·��
        USER_LOGIN�� �û��Ƿ��¼ "1":��¼ "0"δ��¼
*/

(function($){
    //ʹ�������hover�¼�
    $.fn.hoverClass = function(b) {
        var a = this;
        a.each(function(c) {
            a.eq(c).hover(function() {
                $(this).addClass(b)
            },
            function() {
                $(this).removeClass(b)
            });
        });
        return a;
    };
    //�����ռλ��Ч��
    $.fn.focusText = function(c) {
        var a = this;
        if(typeof(c) === "boolean" && !c){ //���Դ���falseȡ��ռλ��
            a.unbind("focus",_focus);
            a.unbind("blur",_blur);
            return;
        }
        var b = (c == null) ? $(a).val() : c;
        a.val(b);
        a.bind("focus",{"target":a,"placeholder":b},_focus);
        a.bind("blur",{"target":a,"placeholder":b},_blur);
        function _focus(event){
            var tar = event.data.target;
            var text = event.data.placeholder;
            if (tar.val() === text) {
                tar.val("")
            }
        }
        function _blur(event){
            var tar = event.data.target;
            var text = event.data.placeholder;
            if (tar.val() === "") {
                tar.val(text);
            }
        }
        return a;
    };
    //����򽹵���ʽ
    $.fn.focusChangeStyle = function(b) {
        var a = this;
        var b = (b == null) ? "it_focus": b;
        a.focus(function() {
            $(this).addClass(b)
        });
        a.blur(function() {
            $(this).removeClass(b)
        });
        return a
    };
    //����ͼƬͳһ��С
    $.fn.autoImgW = function(d) {
        var a = this;
        var b = (d == null) ? a.width() : d;
        var c = a.find("img");
        c.each(function(f) {
            var e = $(this).width();
            var g = $(this).height();
            var h = $(this).attr("src");
            if (e >= b) {
                $(this).css({
                    width: b,
                    height: g * (b / e)
                }).wrap("<a href=" + h + " target='_blank' title='������´��ڲ鿴��ͼ'></a>")
            }
        });
        return a;
    };
    //����������ת����
    $.fn.openSelVal = function(b) {
        var a = this;
        a.change(function() {
            if (a.val() !== 0) {
                if (b === "self") {
                    window.location = a.val()
                } else {
                    window.open(a.val())
                }
            }
        });
        return a
    };
    //����tab�л�Ч��
    $.fn.overOnlyClass = function(b) {
        var a = this;
        a.each(function(c) {
            a.eq(c).mouseenter(function() {
                a.removeClass(b);
                $(this).addClass(b)
            })
        });
        return a
    };
    
    //����л���� by yinlong
    $.fn.soChange = function(b) {
        b = $.extend({
            botPrev:null,//��ť��һ��
			botNext:null,//��ť��һ��
            changeType:'',//�л���ʽ����ѡ��fade,slide��Ĭ��Ϊfade
            slideTime:1000,//ƽ������ʱ�䣬Ĭ��Ϊ1000ms��Ϊ0��ֵʱ������changeType��ʽ���л�Ч��Ϊֱ����ʾ����
            thumbObj: null, //����Ԫ��
            thumbNowClass: "now", //������ǰ����ʽ
            changeClass: null, //�ֲ���������Ըı�����ʽ��ʾ�����ô���
            thumbOverEvent: true,//����Ԫ���Ƿ�ֱ��mouseover����
            autoChange: true, //�Ƿ��Զ���ʼ�ֲ�
            clickFalse: true, //��ֹ�������ð��
            overStop: true, //����ڵ���ʱ�Ƿ�ֹͣ����
            changeTime: 5000, //�ֲ����ʱ��
            delayTime: 400, //����������¼��ӳ�ʱ��
            start:1 //��ʼ��
        },
        b || {});
        var h = this;
        var i;
        var k = h.length;
        var e = 0;
        var g = 0;
        var c = [];
        var f;
        var hasthumb;
        var thumb;
        
        if(b.thumbObj != null){
            hasthumb = true;
            thumb = $(b.thumbObj);
        }else{
            hasthumb = false;
        }
        
        if($(h).size()<=1){ //ֻ��һ��ͼ��û��ͼ���Ͳ�Ҫ��ʾ������ִ���ֲ���
            if (hasthumb) {
                thumb.remove();
            }
            return;
        }
        
        function d() {
            if (e != g) {
                
                if (hasthumb) {
                    thumb.removeClass(b.thumbNowClass).eq(g).addClass(b.thumbNowClass)
                }
                
                if (b.changeClass != null) {
                    h.eq(e).removeClass(b.changeClass);
                    h.eq(g).addClass(b.changeClass)
                } else {
                        
                    if(b.changeType=='fade' && b.slideTime > 0){
                        h.eq(g).fadeIn(b.slideTime);
                        h.eq(e).fadeOut(b.slideTime);
                    }else{
                        h.eq(g).css("visibility", "visible");
                        h.eq(e).css("visibility", "hidden")
                    }
                }
                e = g;
                if (b.autoChange == true) {
                    stopAll();
                    start();
                }
            }
        }
        function stopAll() {
            for (var i = 0; i < c.length; i++) {
                clearInterval(c[i])
            }
        }
        function start() {
            c.push(setInterval(j, b.changeTime))
        }
        function j() {
            g = (e + 1) % k;
            d();
        }
        
        //�����һ��
		if (b.botNext!=null) {
			$(b.botNext).click(function () {
				if(h.queue().length<1){
				runNext();}
				return false;
			});
		}

        //�����һ��
		if (b.botPrev!=null) {
			$(b.botPrev).click(function () {
				if(h.queue().length<1){
				g = (e + 1) % k;
				d();}
				return false;
		});
		}
        
        if (hasthumb) {
            if(thumb.index($("."+b.thumbNowClass)[0]) !== -1 ){ //����趨������
                g = thumb.index($("."+b.thumbNowClass)[0]);
            }else{
                g = b.start-1; //û���������ʹ��������Ϣ��ֵ
                thumb.removeClass(b.thumbNowClass).eq(0).addClass(b.thumbNowClass);
            }
            
            thumb.click(function() {
                g = thumb.index($(this));
                d();
                if (b.clickFalse == true) {
                    return false
                }
            });
            
            if (b.thumbOverEvent == true) {
                thumb.hover(function() {
                    g = thumb.index($(this));
                    f = setTimeout(function() {
                        d();
                        stopAll()
                    },
                    b.delayTime);
                    return false
                },
                function() {
                    clearTimeout(f);
                    return false
                })
            }
        }
        
        if (b.changeClass != null) {
            h.removeClass(b.changeClass).eq(g).addClass(b.changeClass)
        } else {
            if(b.changeType=='fade' && b.slideTime > 0){
                h.css("display", "none").eq(g).css("display", "block")
            }else{
                h.css("visibility", "hidden").eq(g).css("visibility", "visible")
            }
        }
        
        if (b.autoChange == true) {
            c.push(setInterval(j, b.changeTime));
            if (b.overStop == true) {
                h.mouseover(function() {
                    stopAll();
                    return false
                }).mouseout(function() {
                    start();
                    return false
                })
            }
        }
        
        d(); //��ʼ��ʱ��ִ��һ���ֲ�
        
        this.stop = stopAll;
        this.start = start;
        h.bind("soChange",
        function(event, i) {
            g = i;
            d()
        });
        return this
    }
})(jQuery);

//lazyload
function lazyload(option) {
    var settings = {
        defObj: null,
        defHeight: -200
    };
    settings = $.extend(settings, option || {});
    var defHeight = settings.defHeight,
    defObj = (typeof settings.defObj == "object") ? settings.defObj.find("img") : $(settings.defObj).find("img");
    var pageTop = function() {
        return document.documentElement.clientHeight + Math.max(document.documentElement.scrollTop, document.body.scrollTop) - settings.defHeight
    };
    var imgLoad = function() {
        defObj.each(function() {
            if ($(this).offset().top <= pageTop()) {
                var src2 = $(this).attr("src2");
                if (src2) {
                    $(this).attr("src", src2).removeAttr("src2")
                }
            }
        })
    };
    imgLoad();
    $(window).bind("scroll",
    function() {
        imgLoad()
    })
}
$(function(){
    lazyload({defObj:".lazybox"});
})
function time() {
    return Math.round(new Date().getTime() / 1000)
}