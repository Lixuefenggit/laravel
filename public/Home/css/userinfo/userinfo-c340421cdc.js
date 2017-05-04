!
function(t) {
    function e(n) {
        if (i[n]) return i[n].exports;
        var o = i[n] = {
            exports: {},
            id: n,
            loaded: !1
        };
        return t[n].call(o.exports, o, o.exports, e),
        o.loaded = !0,
        o.exports
    }
    var i = {};
    return e.m = t,
    e.c = i,
    e.p = "",
    e(0)
} ({
    0 : function(t, e, i) {
        var n = i(46),
        o = i(49),
        s = i(13),
        a = i(1),
        r = i(45),
        l = i(209),
        d = i(2),
        c = i(210),
        u = r.extend({
            __init: function(t) {
                this.__supr(t),
                this.__initTab(),
                this.__initData(),
                this.__initStaffInfo()
            },
            __initTab: function() {
                var t = $(".infoTabItem"),
                e = $(".tabContent");
                t.on("click",
                function(i) {
                    var n = $(i.target),
                    o = n.attr("data-index");
                    n.hasClass("active") || (t.removeClass("active"), e.removeClass("active"), n.addClass("active"), e.eq(o).addClass("active"), "1" === o ? this.__initUserInterestedData(!1) : this.__initUserInfoData())
                }.bind(this))
            },
            __initData: function() {
                this.__initUserInfoData(),
                this.__initUserInterestedData(!0)
            },
            __initUserInfoData: function() {
                var t = n.getDetail();
                t.done(function(t) {
                    var e = $("#j-userInfoFormTemplate").jqote(t.data);
                    $("#j-userinfoForm").html(e),
                    new l({
                        data: {
                            parent: ".j-birthdayParent",
                            originalBirthdayYear: t.data.birthYear,
                            originalBirthdayMonth: t.data.birthMonth,
                            originalBirthdayDay: t.data.birthDay
                        }
                    }),
                    this.__initUserInfoEvent()
                }.bind(this)),
                t.fail(function(t, e) {
                    s.notify(e || "aaaaaaa", "error")
                })
            },
            __initUserInterestedData: function(t) {
                var e = n.getInterestedCate();
                e.done(function(e) {
                    if (e.data && e.data.length > 0) {
                        var i = $("#j-userInterestCateTemplate").jqote(e);
                        $("#j-userInterestedCate").html(i),
                        t && this.__initUserInterestedEven()
                    }
                }.bind(this)),
                e.fail(function(t, e, i) {
                    s.notify(e || "bbbbbbbbbbb", "error")
                })
            },
            __initStaffInfo: function() {
                var t = this,
                e = o.getEnterpriseInfo();
                e.done(function(e) {
                    var i = e.data,
                    n = {};
                    n.status = i.status,
                    n.is163 = i.is163EmailDomain,
                    1 == i.isEnterpriseMember && t.__getStaffInfo(n)
                })
            },
            __getStaffInfo: function(t) {
                var e = this,
                i = o.getEmployeeInfo();
                i.done(function(i) {
                    var n = $("#j-staffInfoTemplate").jqote({
                        data: i.data,
                        params: t
                    });
                    $("#j-staffInfo").html(n),
                    e.__unbind()
                })
            },
            __initUserInfoEvent: function() {
                $(".j-bindMobile").bind("click", "#j-userinfoForm", $.proxy(this.__bindMobile, this)),
                $(".j-submit").bind("click", "#j-userinfoForm", $.proxy(this.__saveInfo, this));
                var t = $(".j-thirdLoginLogo"),
                e = d.getCookie("S_OINFO") || "";
                e.indexOf("@wx.163.com") > -1 ? t.addClass("icon-normal-third-weixin-s") : e.indexOf("@sina.163.com") > -1 ? t.addClass("icon-normal-third-weibo-s") : e.indexOf("@tencent.163.com") > -1 && t.addClass("icon-normal-third-qq-s")
            },
            __initUserInterestedEven: function() {
                $(".tabContent").delegate(".w-interestedItem", "click",
                function(t) {
                    var e = $(t.currentTarget);
                    e.hasClass("checked") ? (e.removeClass("checked"), e.find('input[type="checkbox"]').removeAttr("checked")) : (e.addClass("checked"), e.find('input[type="checkbox"]').attr({
                        checked: "checked"
                    }))
                }),
                $(".tabContent").delegate(".j-submitBtn", "click",
                function(t) {
                    var e = $(".w-interestedItem.checked");
                    if (!e || 0 === e.length) return void this.__toggleInterestedTips("最少选择一个哦");
                    var i = [];
                    e.each(function(t, e) {
                        var n = $(e).attr("data-categoryCode");
                        i.push(n)
                    });
                    var o = n.saveInterestedCate(i);
                    o.done(function(t) {
                        t.data ? this.__toggleInterestedTips("提交成功！") : this.__toggleInterestedTips("保存失败！")
                    }.bind(this)),
                    o.fail(function(t, e, i) {
                        this.__toggleInterestedTips(e || "保存失败")
                    }.bind(this))
                }.bind(this))
            },
            __toggleInterestedTips: function(t) {
                var e = $(".j-submitTips");
                e.text(t),
                e.removeClass("f-hide");
                var i = window.setTimeout(function() {
                    clearTimeout(i),
                    i = null,
                    e.addClass("f-hide")
                },
                3e3)
            },
            __unbind: function() {
                $(".j-unbind").on("click",
                function() {
                    c.show()
                })
            },
            __bindMobile: function() {
                new a({
                    data: {
                        title: "绑定手机"
                    },
                    events: {
                        onsucc: function(t) {
                            t = t.replace(/^(\d{3})\d{4}(\d{4})$/, "$1****$2"),
                            $(".j-bindMobileShow").text(t).removeClass("f-hide"),
                            setTimeout(function() {
                                s.notify("绑定成功", "success")
                            },
                            500)
                        }
                    }
                })
            },
            __saveInfo: function() {
                var t = $("#j-userinfoForm"),
                e = $("#j-error"),
                i = $("#j-errorText"),
                o = t.find(".j-warn"),
                s = t.find("input[name='gender']:checked").val(),
                a = {
                    nickname: t.find("input[name='nickname']").val(),
                    gender: void 0 == s ? 2 : s,
                    birthYear: t.find("select[name='birthYear']").val(),
                    birthMonth: t.find("select[name='birthMonth']").val(),
                    birthDay: t.find("select[name='birthDay']").val()
                };
                if (e.hide(), !a.nickname) return void o.text("请输入昵称!").show();
                var r = n.saveDetail(a);
                r.done(function(t) {
                    var e = "",
                    i = t.data || {};
                    i.scoreData && (e = "成长值 +" + i.scoreData),
                    o.text("保存成功！ " + e).show(),
                    setTimeout(function() {
                        o.fadeOut()
                    },
                    3e3),
                    $("#j-sideNickname").text(a.nickname),
                    $(".js-userCenterToggle .j-nickname").text(a.nickname)
                }),
                r.fail(function(t, n) {
                    "该昵称已被注册" == n ? (i.text(n), e.show(), o.text("保存失败!").show()) : o.text(n || "保存失败!").show(),
                    setTimeout(function() {
                        o.fadeOut()
                    },
                    3e3)
                })
            }
        });
        $(function() {
            new u
        })
    },
    1 : function(t, e, i) {
        var n = i(2),
        o = i(4),
        s = i(6),
        a = i(8),
        r = i(11),
        l = (i(13), i(14)),
        d = '<div>                        <div class="title j-title">&nbsp;</div>                         <div class="desp j-desp">&nbsp;</div>                       <div class="input-wrap">                          <input class="mobile w-form-control j-mobile" type="text" placeholder="输入手机号">                          <a class="msgBtn w-button w-button-disabled w-button-l j-msgBtn" href="javascript:void(0);">                              <span>获取验证码</span>                            </a>                          </div>                          <div class="input-wrap">                          <input class="msg w-form-control j-msg" type="text" placeholder="输入6位验证码">                        </div>                          <div class="tips j-tips">错误</div>                       <a class="submitBtn w-button w-button-disabled w-button-l j-submit" href="javascript:void(0);">                             <span>确定</span>                         </a></div>';
        s($);
        var c = o.extend({
            __config: function(t) {
                n._$extend(t, {
                    title: "",
                    desp: ""
                })
            },
            __init: function(t) {
                this.__supr(t),
                this.__initNode()
            },
            __initNode: function() {
                void 0 == this.__data.parent ? this.__body = $(d).showDialog({
                    clsName: "m-mobileValidatePop"
                }) : (this.__body = $('<div class="m-mobileValidate">' + d + "</div>"), $(this.__data.parent).append(this.__body)),
                this.__canGetSend = !0,
                this.__canClickForMsgBtn = !1,
                this.__canClickForSubmitBtn = !1;
                var t = this,
                e = this.__mobile = this.__body.find(".j-mobile").first(),
                i = this.__msgBtn = this.__body.find(".j-msgBtn").first(),
                n = this.__msgInput = this.__body.find(".j-msg").first(),
                o = (this.__tips = this.__body.find(".j-tips").first(), this.__submit = this.__body.find(".j-submit").first()),
                s = this.__body.find(".j-title").first(),
                a = this.__body.find(".j-desp").first();
                s.text(this.__data.title),
                this.__data.desp && a.text(this.__data.desp),
                o.click($.proxy(this.__onSubmitCallBack, this)),
                i.click($.proxy(this.__onGetMsgCallBack, this)),
                e.keyup(function() {
                    var s = e.val(),
                    a = n.val();
                    "" != s ? (i.removeClass("w-button-disabled").addClass("w-button-primary"), t.__canClickForMsgBtn = !0) : (i.removeClass("w-button-primary").addClass("w-button-disabled"), t.__canClickForMsgBtn = !1),
                    "" != s && "" != a ? (o.removeClass("w-button-disabled").addClass("w-button-primary"), t.__canClickForSubmitBtn = !0) : (o.removeClass("w-button-primary").addClass("w-button-disabled"), t.__canClickForSubmitBtn = !1)
                }),
                n.keyup(function() {
                    var i = e.val(),
                    s = n.val();
                    "" != i && "" != s ? (o.removeClass("w-button-disabled").addClass("w-button-primary"), t.__canClickForSubmitBtn = !0) : (o.removeClass("w-button-primary").addClass("w-button-disabled"), t.__canClickForSubmitBtn = !1)
                })
            },
            __onGetMsgCallBack: function() {
                if (this.__canGetSend && this.__canClickForMsgBtn) {
                    var t = this.__mobile.val(),
                    e = 60,
                    i = this;
                    if (!r.isCellPhone(t)) return this.__tips.text("手机号码格式错误！").show(),
                    !1;
                    this.__tips.hide(),
                    this.__canGetSend = !1,
                    this.__msgBtn.removeClass("w-button-primary").addClass("w-button-disabled").text("60秒"),
                    this.__tid = setInterval(function() {
                        e > 0 ? i.__msgBtn.text(e--+"秒") : (i.__msgBtn.removeClass("w-button-disabled").addClass("w-button-primary").text("获取验证码"), i.__canGetSend = !0, clearInterval(i.__tid))
                    },
                    1e3);
                    var n = a.sendCode({
                        mobile: t
                    });
                    n.fail(function(t, e, n) {
                        i.__tips.text(e || "验证码获取过于频繁！").show()
                    })
                }
            },
            __onSubmitCallBack: function() {
                if (this.__canClickForSubmitBtn) {
                    var t = this.__data,
                    e = (t.producId, this.__mobile.val()),
                    i = this.__msgInput.val(),
                    n = this;
                    if (!r.isCellPhone(e)) return this.__tips.text("手机号码格式错误！").show(),
                    !1;
                    if (!/^[0-9]{6}$/.test(i)) return this.__tips.text("验证码格式错误！").show(),
                    !1;
                    this.__tips.hide();
                    var o = a.isMobileBind({
                        mobile: e
                    });
                    o.done(function(t) {
                        1 == t.data ? new l({
                            data: {
                                tips: "此手机号已绑定其他帐号，<br/>继续绑定会解除原帐号绑定关系",
                                okText: "继续绑定",
                                cancelText: "取消"
                            },
                            events: {
                                onok: function() {
                                    n.__verifyCode.bind(n)(i, e)
                                }
                            }
                        }) : n.__verifyCode.bind(n)(i, e)
                    })
                }
            },
            __verifyCode: function(t, e) {
                var i = this,
                n = a.verifyCode({
                    verifyCode: t
                });
                n.done(function(t) {
                    i.__body.closeDialog(),
                    i._$emit("onsucc", e)
                }),
                n.fail(function(t, e, n) {
                    i.__tips.text(e || "验证码错误！").show()
                })
            }
        });
        t.exports = c
    },
    2 : function(t, e, i) {
        var n = i(3),
        o = {
            _baseUID: (new Date).getTime(),
            uid: function(t, e, i) {
                return (t || "id_") + this._baseUID++
            },
            __cookieCache: {},
            setCookie: function(t, e, i, n, o) {
                var s = t + "=" + escape(e),
                n = n || "/";
                if (i && -1 != i) {
                    var a = new Date;
                    a.setTime(a.getTime() + 24 * i * 60 * 60 * 1e3),
                    s += ";expires=" + a.toGMTString()
                }
                s += ";path=" + n,
                o && (s += ";domain=" + o),
                document.cookie = s + ";",
                this.clearCookieCache()
            },
            clearCookieCache: function() {
                this.__cookieCache = {}
            },
            getCookie: function(t) {
                var e = "",
                i = this.__cookieCache;
                i.lastTime ? e = (new Date).getTime() - i.lastTime < 1e3 ? i.cookie: i.cookie = document.cookie: (i.lastTime = (new Date).getTime(), e = i.cookie = document.cookie);
                var n = new RegExp(t + "=([^;]+)"),
                o = n.exec(e);
                return o ? o[1] : null
            },
            escapeHTML: function(t) {
                return t ? ("number" == typeof t && (t = t.toString()), t.replace(/[\u0000]/g, "").replace(/&/g, "&amp;").replace(/>/g, "&gt;").replace(/</g, "&lt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;")) : ""
            },
            paddingLeft: function(t, e, i) {
                if (t += "", t.length < e) {
                    for (var n = "",
                    o = 0; o < e - t.length; o++) n += i;
                    return n + t
                }
                return t
            },
            extend: function(t, e) {
                for (var i in e)"Function" != typeof t[i] && (t[i] = e[i])
            },
            trimEnd: function(t, e) {
                for (var i = t.length - 1,
                n = t.length - 1; n >= 0; n--) if ( - 1 == e.indexOf(t.charAt(n))) {
                    i = n;
                    break
                }
                return t.substring(0, i + 1)
            },
            getPrice: function(t) {
                return t / 100
            },
            getUrl: function(t) {
                return $URL.contextPath + t
            },
            getPicUrl: function(t, e) {
                var t = t + "?imageView&thumbnail=",
                i = "";
                return i = "S" == e ? "50y50": "M" == e ? "120y120": "L" == e ? "530y530": "V" == e ? "610y500": e.indexOf("y") > 0 ? e: "120y120",
                t + i + "&quality=100"
            },
            _$forIn: function(t, e, i) {
                if (!t || !n._$isFunction(e)) return null;
                if (n._$isNumber(t.length)) {
                    for (var s = 0,
                    a = t.length; a > s; s++) if (e.call(i, t[s], s, t)) return s
                } else if (n._$isObject(t)) return o._$loop(t, e, i);
                return null
            },
            _$loop: function(t, e, i) {
                if (t && e) {
                    var n;
                    for (var o in t) if (t.hasOwnProperty(o) && (n = e.call(i, t[o], o, t))) return o
                }
            },
            _$extend: function(t, e, i) {
                for (var n in e)(void 0 == t[n] || i) && (t[n] = e[n]);
                return t
            },
            _$typeOf: function(t) {
                return null == t ? String(t) : {}.toString.call(t).slice(8, -1).toLowerCase()
            },
            _$merge: function(t, e) {
                var i, n = o._$typeOf(t),
                s = o._$typeOf(e);
                if (n !== s) return e;
                switch (s) {
                case "object":
                    for (var a in e) e.hasOwnProperty(a) && (t[a] = o._$merge(t[a], e[a]));
                    break;
                case "array":
                    for (var a = 0,
                    i = e.length; i > a; a++) t[a] = o._$merge(t[a], e[a]);
                    t.length = e.length;
                    break;
                default:
                    return e
                }
                return t
            },
            _$isNew: function() {
                return !! this.getCookie("yx_aui")
            },
            _$isLogin: function() {
                var t = window.$global;
                return t && 0 != t.userid || !!this.getCookie("S_INFO") || !!this.getCookie("S_OINFO")
            },
            _$isLogin2: function() {
                return !! this.getCookie("S_INFO") || !!this.getCookie("S_OINFO")
            },
            _$isLogin3: function() {
                return !! this.getCookie("S_INFO") || !!this.getCookie("S_OINFO")
            },
            _$getFullUrsName: function() {
                var t = "";
                if (this.getCookie("S_INFO")) t = "P_INFO";
                else {
                    if (!this.getCookie("S_OINFO")) return "";
                    t = "P_OINFO"
                }
                var e = decodeURIComponent(this.getCookie(t)).replace(/(^\"*)|(\"*$)/g, "") || "",
                i = e.indexOf("|");
                return i > 0 && (e = e.substring(0, i) + ""),
                e
            },
            _$getFullUserName: function() {
                var t = this._$getFullUrsName(),
                e = window.$global;
                return e.nickname || t
            },
            _$smoothTo: function(t, e, i) {
                function n() {
                    c += .05,
                    c > 1 && (c = 1),
                    window.scrollTo(l.x * c + s.x, s.y + c * l.y),
                    1 > c ? r = setTimeout(n, d) : o()
                }
                function o() {
                    clearTimeout(r),
                    document.onmousewheel = null
                }
                if ("string" == typeof t && (t = $(t)), 0 != t.length) {
                    void 0 === i && (i = 0);
                    var s = {
                        x: Math.max(document.body.scrollLeft, document.documentElement.scrollLeft),
                        y: Math.max(document.body.scrollTop, document.documentElement.scrollTop)
                    },
                    a = t.offset();
                    a.top += i;
                    var r, l = {
                        x: a.left - s.x,
                        y: a.top - s.y
                    },
                    e = e || 500,
                    d = e / 60,
                    c = .01;
                    return document.onmousewheel = o,
                    r = setTimeout(n, d),
                    this
                }
            },
            _$getArrayItems: function(t, e) {
                var i = [];
                for (var n in t) i.push(t[n]);
                for (var o = [], s = 0; e > s && i.length > 0; s++) {
                    var a = Math.floor(Math.random() * i.length);
                    o[s] = i[a],
                    i.splice(a, 1)
                }
                return o
            },
            _$string2object: function(t, e) {
                var i = {};
                return this._$forIn((t || "").split(e),
                function(t) {
                    var e = t.split("=");
                    if (e && e.length) {
                        var n = e.shift();
                        n && (i[decodeURIComponent(n)] = decodeURIComponent(e.join("=")))
                    }
                }),
                i
            },
            _$getUrlParams: function() {
                return this._$string2object(window.location.search.replace("?", ""), "&")
            },
            _$getUrlHashParams: function() {
                return this._$string2object(window.location.hash.replace("#", ""), "&")
            },
            _$getUrlParam: function(t) {
                return this._$getUrlParams()[t] || ""
            },
            _$offset: function() {
                var t = function(t) {
                    return t == document.body || t == document.documentElement
                };
                return function(e, i) {
                    if (!e) return null;
                    i = i || null;
                    for (var n, o, s, a = e,
                    r = {
                        x: 0,
                        y: 0
                    }; a && a != i;) n = t(a) || a == e,
                    o = n ? 0 : a.scrollLeft,
                    s = parseInt($(a).css("borderLeftWidth").slice(0, -2)) || 0,
                    r.x += a.offsetLeft + s - o,
                    o = n ? 0 : a.scrollTop,
                    s = parseInt($(a).css("borderTopWidth").slice(0, -2)) || 0,
                    r.y += a.offsetTop + s - o,
                    a = a.offsetParent;
                    return r
                }
            } (),
            _$openKefu: function() {
                if (window.ysf) {
                    var t = window.$global;
                    if (this._$isLogin()) {
                        var e = (this._$getFullUserName(), this._$getFullUrsName());
                        ysf.config({
                            uid: "0" != t.userid ? t.userid: 0,
                            name: "0" != t.userid ? t.userid: 0,
                            email: e
                        })
                    }
                    ysf.open()
                } else console.log("please load ysf!")
            },
            _$uniqueID: function() {
                var t = +new Date;
                return function() {
                    return "" + t++
                }
            } (),
            _$getLoginConfig: function(t) {
                var e = {
                    product: "yanxuan_web",
                    promark: "SkeBZeG",
                    host: "you.163.com",
                    page: "login",
                    placeholder: {
                        account: "邮箱帐号",
                        pwd: "输入密码"
                    },
                    single: 1,
                    gotoRegTextMb: "注册手机帐号",
                    regUrl: "http://reg.163.com/reg/reg.jsp?product=yanxuan_web",
                    cssDomain: "http://yanxuan.nosdn.127.net/",
                    cssFiles: "2792f72d1bf6308f637e10b70a977cf4.css",
                    oauthLoginConfig: [{
                        name: "weixin"
                    },
                    {
                        name: "qq"
                    },
                    {
                        name: "weibo"
                    }]
                };
                return t ? e.includeBox = "j-loginFormWrap": (e.frameSize = {
                    width: 386,
                    height: 444
                },
                e.iframeShowAnimation = "showAnimation.5s"),
                e
            },
            _$getRebateLoginConfig: function(t) {
                var e = {
                    product: "yanxuan_web",
                    promark: "SkeBZeG",
                    host: "you.163.com",
                    page: "login",
                    loginText: "立即查询返现金额",
                    placeholder: {
                        account: "邮箱帐号",
                        pwd: "输入密码"
                    },
                    single: 1,
                    regUrl: "http://reg.163.com/reg/reg.jsp?product=yanxuan_web",
                    cssDomain: "http://yanxuan.nosdn.127.net/",
                    cssFiles: "5b62fbe888cddbef97b87ab515a34fd2.css"
                };
                return t ? e.includeBox = "j-login-form": (e.frameSize = {
                    width: 390,
                    height: 330
                },
                e.iframeShowAnimation = "showAnimation.5s"),
                e
            },
            _$getDownloadLink: function() {
                var t = this.getCookie("yx_from") || "",
                e = this._$getUrlParam("channel"),
                i = "/downloadapp";
                return "" != t && (i += "?_stat_from=" + t),
                "" != e && (i += i.indexOf("?") > 0 ? "&channel=" + e: "?channel=" + e),
                i
            },
            _$addUrlQuery: function(t) {
                var e = this.getCookie("yx_from") || "",
                i = this._$getUrlParam("channel"),
                n = t;
                return "" != e && (n += "&_stat_from=" + e),
                "" != i && (n += "&channel=" + i),
                n
            },
            _$getUrlQRnode: function(t, e, i) {
                var n = "https://m.you.163.com/downloadapp?" + this._$addUrlQuery(i),
                o = new AraleQRCode({
                    text: n,
                    size: t,
                    correctLevel: 2
                });
                return o
            },
            _$getDownloadQRnode: function(t, e) {
                var i = "http://m.you.163.com" + this._$getDownloadLink(),
                n = new AraleQRCode({
                    text: i,
                    size: t,
                    correctLevel: 2
                });
                return n
            },
            _$createIframe: function(t, e) {
                var i = document.createElement("iframe");
                i.src = t,
                e && (i.attachEvent ? i.attachEvent("onload",
                function() {
                    e(),
                    document.body.removeChild(i)
                }) : i.onload = function() {
                    e(),
                    document.body.removeChild(i)
                }),
                document.body.appendChild(i)
            },
            _$debounce: function(t, e) {
                var i;
                return function() {
                    var n = this,
                    o = arguments;
                    clearTimeout(i),
                    i = setTimeout(function() {
                        t.apply(n, o)
                    },
                    e)
                }
            },
            _$length: function(t) {
                return t.replace(/[^\x00-\xff]/g, "**").length
            },
            _$substring: function(t, e) {
                if (this._$length(e) <= t) return e;
                var i = e.replace(/\*/g, "1").replace(/[^\x00-\xff]/g, "**");
                return i = i.substring(0, t),
                /[\*\*]*\*$/.test(i) && (i = i.substring(0, t - 1)),
                i = i.replace(/\*\*/g, "我"),
                e.substring(0, i.length)
            },
            _$countDown: function(t, e) {
                var i = t.serverTime || Date.parse(new Date),
                n = t.leftTime || 0,
                o = Date.parse(new Date),
                s = i + n,
                a = null;
                a = window.setInterval(function() {
                    n = s - Date.parse(new Date) + o - i,
                    0 >= n && (n = 0, clearInterval(a));
                    var t = Math.floor(n / 1e3 % 60),
                    r = Math.floor(n / 6e4 % 60),
                    l = Math.floor(n / 36e5 % 24),
                    d = Math.floor(n / 864e5);
                    e({
                        leftTime: n,
                        seconds: t > 9 ? "" + t: "0" + t,
                        minutes: r > 9 ? "" + r: "0" + r,
                        hours: l > 9 ? "" + l: "0" + l,
                        days: d > 9 ? "" + d: "0" + d
                    })
                },
                1e3)
            }
        };
        t.exports = o
    },
    3 : function(t, e) {
        var i = {},
        n = function(t, e) {
            try {
                return e = e.toLowerCase(),
                null === t ? "null" == e: void 0 === t ? "undefined" == e: {}.toString.call(t).toLowerCase() == "[object " + e + "]"
            } catch(i) {
                return ! 1
            }
        };
        i._$isFunction = function(t) {
            return n(t, "function")
        },
        i._$isString = function(t) {
            return n(t, "string")
        },
        i._$isNumber = function(t) {
            return n(t, "number")
        },
        i._$isBoolean = function(t) {
            return n(t, "boolean")
        },
        i._$isDate = function(t) {
            return n(t, "date")
        },
        i._$isArray = function(t) {
            return n(t, "array")
        },
        i._$isObject = function(t) {
            return n(t, "object")
        },
        t.exports = i
    },
    4 : function(t, e, i) {
        var n = i(5),
        o = [].slice,
        s = n({
            __init: function(t) {
                this.__data = {},
                t = t || {},
                t.events && this._$on(t.events),
                this.__data = t.data || {},
                this.__config && this.__config(this.__data)
            },
            __config: function(t) {},
            _$on: function(t, e) {
                if ("object" == typeof t) for (var i in t) this._$on(i, t[i]);
                else {
                    var n = this,
                    o = n._handles || (n._handles = {}),
                    s = o[t] || (o[t] = []);
                    s.push(e)
                }
                return this
            },
            _$off: function(t, e) {
                var i = this;
                if (i._handles) {
                    t || (this._handles = {});
                    var n, o = i._handles;
                    if (n = o[t]) {
                        if (!e) return o[t] = [],
                        i;
                        for (var s = 0,
                        a = n.length; a > s; s++) if (e === n[s]) return n.splice(s, 1),
                        i
                    }
                    return i
                }
            },
            _$emit: function(t) {
                var e, i, n, s = this,
                a = s._handles;
                if (t) {
                    var i = o.call(arguments, 1),
                    n = t;
                    if (!a) return s;
                    if (e = a[n.slice(1)]) for (var r = 0,
                    l = e.length; l > r; r++) e[r].apply(s, i);
                    if (! (e = a[n])) return s;
                    for (var d = 0,
                    l = e.length; l > d; d++) e[d].apply(s, i);
                    return s
                }
            }
        });
        t.exports = s
    },
    5 : function(t, e, i) {
        var n, o; !
        function(s, a, r) {
            n = r,
            o = "function" == typeof n ? n.call(e, i, e, t) : n,
            !(void 0 !== o && (t.exports = o))
        } ("klass", this,
        function() {
            function t(t) {
                return o.call(e(t) ? t: function() {},
                t, 1)
            }
            function e(t) {
                return typeof t === s
            }
            function i(t, e, i) {
                return function() {
                    var n = this.__supr;
                    this.__supr = i[r][t];
                    var o = {}.fabricatedUndefined,
                    s = o;
                    try {
                        s = e.apply(this, arguments)
                    } finally {
                        this.__supr = n
                    }
                    return s
                }
            }
            function n(t, n, o) {
                for (var s in n) n.hasOwnProperty(s) && (t[s] = e(n[s]) && e(o[r][s]) && a.test(n[s]) ? i(s, n[s], o) : n[s])
            }
            function o(t, i) {
                function o() {}
                function s() {
                    this.__init ? this.__init.apply(this, arguments) : (i || d && a.apply(this, arguments), c.apply(this, arguments))
                }
                o[r] = this[r];
                var a = this,
                l = new o,
                d = e(t),
                c = d ? t: this,
                u = d ? {}: t;
                return s.methods = function(t) {
                    return n(l, t, a),
                    s[r] = l,
                    this
                },
                s.methods.call(s, u).prototype.constructor = s,
                s.extend = arguments.callee,
                s[r].implement = s.statics = function(t, e) {
                    return t = "string" == typeof t ?
                    function() {
                        var i = {};
                        return i[t] = e,
                        i
                    } () : t,
                    n(this, t, a),
                    this
                },
                s
            }
            var s = "function",
            a = /xyz/.test(function() {
                xyz
            }) ? /\b__supr\b/: /.*/,
            r = "prototype";
            return t
        })
    },
    6 : function(t, e, i) {
        t.exports = function(t) { !
            function(t) {
                function e() {
                    null == l && (t(document.body).append(s), l = t("#widgetDialogContainer"))
                }
                function n(e) {
                    var i = t(window).height(),
                    n = e.outerHeight();
                    i - n > 0 ? e.css("top", (i - n) / 2).show() : e.css("top", 0).show()
                }
                var o = '<div class="m-overlay m-overlay-ani <%=this.dialogClsName||""%> ">         <div class="w-mask w-mask-ani j-mask"></div>            <div class="m-pop f-scroll-y overlay-container-ani f-tlbr j-overlay-container <%=this.clsName||""%>">               <div class="j-w-dialog-body">                   <div class="j-w-dialog-head">                       <div class="w-close j-close-pop"></div>                 </div>                  <div class="popwin-bd j-w-dialog-content">                  </div>              </div>          </div></div>',
                s = '<div id="widgetDialogContainer"></div>',
                a = 1130,
                r = 20,
                l = null,
                d = i(7);
                t.fn.extend({
                    showDialog: function(i) {
                        var s, c, u, h, p, f = this;
                        return i = i || {},
                        t("body").addClass("modal-open"),
                        e(),
                        s = t(t.jqote(o, i)),
                        c = s.find(".j-w-dialog-body"),
                        u = s.find(">.j-mask"),
                        h = s.find(">.j-overlay-container"),
                        p = c.find(">.j-w-dialog-content"),
                        p.append(f.html()),
                        l.append(s),
                        n(h),
                        t(window).resize(function() {
                            n(h)
                        }),
                        d.dockIn(c, t(window), {
                            position: "middle,center",
                            dockFunc: "css"
                        }),
                        i.close === !1 && s.find(".j-close-pop").hide(),
                        a += r,
                        s.css("z-index", a),
                        s.removeClass("f-ani-overlay"),
                        u.addClass("f-ani-mask"),
                        h.addClass("f-ani-bouncein"),
                        c.find(".j-close-pop").bind("click",
                        function() {
                            s.closeDialog(i)
                        }),
                        s
                    },
                    closeDialog: function(e) {
                        var i = this;
                        t("html");
                        i.addClass("f-ani-overlay"),
                        setTimeout(function() {
                            e && "function" == typeof e.onbeforeclose && e.onbeforeclose(),
                            mask = i.find(">.j-mask"),
                            overlay = i.find(">.j-overlay-container"),
                            mask.removeClass("f-ani-mask"),
                            overlay.removeClass("f-ani-bouncein"),
                            i.remove(),
                            e && "function" == typeof e.onclose && e.onclose(),
                            t("body").removeClass("modal-open")
                        },
                        200)
                    }
                })
            } (t)
        }
    },
    7 : function(t, e) {
        function i(t) {
            var e = 0;
            if ("BODY" == t.get(0).tagName) return 0;
            "absolute" != t.css("position") && (e = t.scrollTop());
            var n = t.parent();
            return n && n.get(0) ? e + i(n) : e
        }
        var n = 64,
        o = [],
        s = "",
        a = {
            dockV: function(t, e, n) {
                var o = "",
                s = "";
                if (n = $.extend({
                    axis: "left,bottom"
                },
                n), n.axis) {
                    var a = n.axis.match(new RegExp("(left|center|right)"));
                    a && a.length > 0 && (o = a[0]);
                    var a = n.axis.match(new RegExp("(bottom|middle|top)"));
                    a && a.length > 0 && (s = a[0])
                }
                var r = e.offset(),
                l = e.outerWidth(),
                d = e.outerHeight(),
                c = t.offsetParent();
                if (n.position && (l = 0, d = 0, r = n.position), n.iframe) {
                    var u = n.iframe.offset();
                    r.top = r.top + u.top,
                    r.left = r.left + u.left
                }
                var h = t.outerWidth(),
                p = t.outerHeight(),
                f = c.offset(),
                g = f.left,
                m = f.top,
                v = 0;
                "left" == o ? v = r.left: "right" == o ? v = r.left + l - h: "center" == o && (v = r.left - (h - l) / 2),
                v -= g;
                var _ = 1,
                y = 0;
                "bottom" == s ? (y = r.top + d, y -= _) : "top" == s ? (y = r.top - p, y += _) : "middle" == s && (y = r.top - (p - d) / 2),
                y -= m;
                var w = i(t);
                y += w;
                var b = $.extend({
                    x: 0,
                    y: 0
                },
                n.positionFix);
                v += b.x,
                y += b.y,
                t.css("left", v + "px"),
                t.css("top", y + "px")
            },
            dockIn: function(t, e, i) {
                var n = "center",
                o = "middle";
                if (i.axis) {
                    var s = i.axis.match(new RegExp("(left|center|right)"));
                    s && s.length > 0 && (n = s[0]);
                    var s = i.axis.match(new RegExp("(bottom|middle|top)"));
                    s && s.length > 0 && (o = s[0])
                }
                var a = 0,
                r = 0,
                e = e || $(window),
                l = e.outerWidth(),
                d = e.outerHeight(),
                c = e.scrollTop(),
                u = t.outerWidth(),
                h = t.outerHeight();
                "center" == n ? a = (l - u) / 2 : "right" == n ? a = l - u: "left" == n && (a = 0),
                "middle" == o ? r = (d - h) / 2 : "bottom" == o ? r = d - h: "top" == o && (r = 0),
                r = c + r;
                var p = $.extend({
                    x: 0,
                    y: 0
                },
                i.positionFix);
                a += p.x,
                r += p.y,
                "css" === i.dockFunc ? t.css({
                    left: a,
                    top: r
                }) : t.offset({
                    left: a,
                    top: r
                })
            },
            addPop: function(t, e) {
                var i = $(t);
                i.css("z-index", n++),
                o.push(i),
                void 0 != e && (s = e)
            },
            clearPop: function(t) {
                for (var e = $(t), i = o.length - 1; i >= 0; i--) {
                    var n = o[i];
                    if (n.hasClass("f-ani-ppnlmenu")) {
                        if (0 == e.length || e.length > 0 && !$.contains(n.get(0), e.get(0)) && "" == s || e.length > 0 && s.length > 0 && !$.contains(s.get(0), e.get(0))) {
                            try {
                                n.removeClass("f-ani-ppnlmenu"),
                                n.hasClass("js-dropmenu-ppnl") ? n.addClass("f-hide") : setTimeout(function() {
                                    n.addClass("f-hide")
                                },
                                200)
                            } catch(a) {
                                n.remove()
                            }
                            o.splice(i, 1)
                        }
                    } else o.splice(i, 1)
                }
            }
        };
        $(document).bind("mousedown",
        function(t) {
            return a.clearPop(t.target),
            !0
        }),
        t.exports = a
    },
    8 : function(t, e, i) {
        var n = i(9),
        o = {
            _ajax: function(t, e, i) {
                var o = e || {},
                s = $.Deferred();
                return n.ajax({
                    url: t,
                    data: o,
                    success: function(t) {
                        s.resolve(t)
                    },
                    error: function(t, e, i) {
                        s.reject(t, e, i)
                    },
                    type: i || "POST"
                }),
                s
            },
            sendCode: function(t) {
                return this._ajax("/xhr/userMobile/sendBindMobileCode.json", t, "POST")
            },
            verifyCode: function(t) {
                return this._ajax("/xhr/userMobile/bindMobile.json", t, "POST")
            },
            isMobileBind: function(t) {
                return this._ajax("/xhr/userMobile/isMobileBind.json", t, "POST")
            },
            sendOldMobileCode: function(t) {
                return this._ajax("/xhr/userMobile/sendOldMobileCode.json", t, "POST")
            },
            verifyOldMobileCode: function(t) {
                return this._ajax("/xhr/userMobile/verifyOldMobileCode.json", t, "POST")
            },
            sendNewMobileCode: function(t) {
                return this._ajax("/xhr/userMobile/sendNewMobileCode.json", t, "POST")
            },
            changeMobile: function(t) {
                return this._ajax("/xhr/userMobile/changeMobile.json", t, "POST")
            }
        };
        t.exports = o
    },
    9 : function(t, e, i) {
        var n = i(10),
        o = i(2),
        s = {
            xhrQueue: {},
            ajax: function(t) {
                var e = this,
                i = t.url;
                if (!i) return ! 1;
                t.requestTime = new Date,
                t.param && (i = n.appendURL(i, t.param)),
                o.getCookie("yx_csrf") && (i = n.appendURL(i, {
                    csrf_token: o.getCookie("yx_csrf")
                })),
                t.type && "get" == t.type.toLowerCase() && (i = n.appendURL(i, {
                    __timestamp: t.requestTime.getTime()
                }));
                var s, a, r = t.data || {};
                s = t.dataType ? t.dataType: "json",
                t.contentType && (a = t.contentType),
                "undefined" == typeof a || a === $.ajaxSettings.contentType ? r = $.param(r, !0) : "application/json" === a && (r = $.toJSON(r));
                var l = i + $.toJSON(r),
                d = e.xhrQueue[l];
                if (d) {
                    var c = d[d.length - 1];
                    if (e.xhrQueue[l].push(t), t.requestTime - c.requestTime < 3e4) return
                } else e.xhrQueue[l] = [t];
                var u = function(t, i, n) {
                    var o = e.xhrQueue[l];
                    delete e.xhrQueue[l],
                    o && ($.each(o,
                    function(e, o) {
                        o.error && o.error(t, i, n)
                    }), $.each(o,
                    function(e, o) {
                        o.exception && o.exception.dispatch(t, i, n)
                    }))
                },
                h = function(t) {
                    var i = e.xhrQueue[l];
                    delete e.xhrQueue[l],
                    $.each(i,
                    function(e, i) {
                        i.success && i.success(t)
                    })
                },
                p = {
                    url: i,
                    type: t.type || "POST",
                    dataType: s,
                    contentType: a,
                    data: r,
                    async: 0 == t.async ? !1 : !0,
                    success: function(t) { / ^(html | text) $ / i.test(s) ? h(t) : t ? t.status && t.statusText ? u(t.status, t.status || "", t) : "S_OK" == t.code || "200" == t.code || "201" == t.code ? h(t) : t.code ? u(t.code, t.errorCode || "", t) : h(t) : u("502", "error", "no reponse text")
                    }.bind(this),
                    error: function(t, e, i) {
                        u("NET_ERROR", "", e)
                    }.bind(this)
                };
                $.ajax(p)
            }
        };
        t.exports = s,
        $.ajaxSettings.contentType = "application/x-www-form-urlencoded; charset=UTF-8"
    },
    10 : function(t, e) {
        var i = {
            cropURL: function(t, e) {
                for (var i = t,
                n = 0; n < e.length; n++) {
                    var o = new RegExp("[&]?" + e[n] + "=[^&]+", "g");
                    i = i.replace(o, "").replace("?&", "?")
                }
                return i
            },
            getUrlParams: function(t) {
                var e = {};
                if (!t || -1 == t.indexOf("?")) return e;
                for (var i = t.indexOf("?"), n = t.substring(i + 1), o = n.split("&"), s = 0; s < o.length; s++) {
                    var i = o[s].indexOf("="); - 1 != i && (e[o[s].substring(0, i)] = decodeURIComponent(o[s].substring(i + 1)))
                }
                return e
            },
            appendURL: function(t, e) {
                var i = t || "";
                if (!e) return i;
                var n = i.split("?"),
                o = n[0] + "?" + $.param(e, !0);
                return 2 == n.length && (o = o + "&" + n[1]),
                o.replace(/&+/gm, "&")
            },
            urlHttpsile: function(t, e) {
                var i = t || "",
                n = $URL.proxyURL;
                return e && (n = $URL.mimgProxyURL),
                0 == i.indexOf("http://") ? n + i.replace("http://", "") : i
            },
            jsonp: function(t, e, i) {
                var n = $.extend({
                    charset: "utf-8"
                },
                i),
                o = "_tmp_jsonp_callback" + +new Date;
                n.funcName && (o = n.funcName),
                window[o] = function() {
                    e && e.apply(window, arguments);
                    try {
                        delete window[o]
                    } catch(t) {}
                };
                var s = {};
                s[n.callbackName || "callback"] = o;
                var a = this.appendURL(t, s);
                this.getScript(a, n.charset,
                function() {
                    try {
                        window[o](),
                        delete window[o]
                    } catch(t) {}
                })
            },
            getScript: function(t, e, i, n) {
                var o = function() {
                    i && i.apply(window, arguments)
                };
                this._getScript(t, e, o, n)
            },
            _getScript: function(t, e, i, n) {
                setTimeout(function() {
                    var o = /loaded|complete|undefined/,
                    s = document.createElement("script");
                    s.setAttribute("charset", e || "utf-8"),
                    s.setAttribute("type", "text/javascript"),
                    s.setAttribute("src", t),
                    s.async = "async";
                    var a = function(t) {
                        o.test(s.readyState) && (s.onload = s.onerror = s.onreadystatechange = null, s.parentNode.removeChild(s), s = void 0, t ? "function" == typeof i && setTimeout(i, 0) : "function" == typeof n ? setTimeout(n, 0) : "function" == typeof i && setTimeout(i, 0))
                    };
                    s.onload = function() {
                        a(!0)
                    },
                    s.onerror = function() {
                        a(!1)
                    },
                    s.onreadystatechange = function() {
                        a(!0)
                    };
                    var r = document.getElementsByTagName("head")[0];
                    r.appendChild(s)
                },
                0)
            },
            getPicUrl: function(t, e, i) {
                var i = i || 90,
                n = {
                    quality: i
                };
                return e && (n.thumbnail = e),
                this.appendURL(t, n) + "&imageView"
            }
        };
        t.exports = i
    },
    11 : function(t, e, i) {
        var n = i(12),
        o = {
            isEmpty: function(t) {
                return "" == $.trim(t) ? !0 : !1
            },
            isLegal: function(t, e) {
                var i = /[,%\'\"\/\\;|&*\<\>]/;
                return i.test(t) ? !1 : !0
            },
            isTel: function(t) {
                var e = /^\d+$/g;
                return 0 != t.search(e) ? !0 : !1
            },
            isTelPhone: function(t) {
                return /^\d{3,4}-\d{7,8}$/.test(t) ? !0 : !1
            },
            isNumber: function(t) {
                return /^[0-9]*$/.test(t) ? !0 : !1
            },
            isEmail: function(t) {
                return n.isValid(t) ? !0 : !1
            },
            isCellPhone: function(t) {
                return 11 == t.length && /^1[34578][0-9]{9}$/.test(t) ? !0 : !1
            },
            isChinaPhone: function(t) {
                return /^\d{8,20}$/.test(t) ? !0 : !1
            },
            isOverflow: function(t, e) {
                return e = e || 20,
                this.getStringLength(t) > e ? !0 : !1
            },
            isDate: function(t, e) {
                t = (t + "").replace("-", "");
                var i = /(\d{4})(0\d|1[012])(0\d|[12]\d|3[01])/;
                if (t.length < 6 || t.length > 8 || /[^0-9]/g.test(t)) return "日期格式不正确";
                if (6 == t.length) t = t.replace(/((?=((\d){1,2})$))/g, "0");
                else if (7 == t.length) {
                    var n = t.replace(/(\d)$/g, "0$1");
                    t = i.test(n) ? n: t.replace(/(\d{3})$/g, "0$1")
                }
                return i.test(t) ? (t = t.replace(/((?=((\d{2}){1,2})$))/g, "-"), e ? t: !0) : "日期格式不正确"
            },
            isPic: function(t) {
                var e, i = !1;
                if ( - 1 !== t.indexOf(".")) {
                    e = t.substring(t.lastIndexOf(".") + 1, t.length).toLowerCase();
                    for (var n = ["bmp", "jpg", "png", "tiff", "gif", "pcx", "tga", "exif", "fpx", "svg", "cdr", "pcd", "dxf", "ufo", "eps", "raw"], o = 0; o < n.length; o++) if (e === n[o]) {
                        i = !0;
                        break
                    }
                }
                return e && i
            },
            getStringLength: function(t) {
                var e = 0,
                i = 0;
                for (i = 0; i < t.length; i++) t.charCodeAt(i) > 255 ? e += 2 : e++;
                return e
            },
            isChinese: function(t) {
                for (var e = !1,
                i = 0,
                n = t.length; n > i; i++) if (t.charCodeAt(i) > 255) {
                    e = !0;
                    break
                }
                return e
            },
            is163Email: function(t, e) {
                var i = this,
                n = ["163.com", "126.com", "yeah.net", "vip.163.com", "vip.126.com", "188.com"];
                if (n = $.makeArray(e).concat(n), i.isEmail(t)) {
                    var o = t.split("@")[1];
                    return $.inArray(o, n) < 0 ? !1 : !0
                }
                return ! 1
            },
            __log: function(t) {
                console.log(t)
            },
            checkPositiveNumber: function(t, e, i) {
                return i || "undefined" != typeof e ? "number" != typeof e ? (this.__log(t, "应该是数字"), !1) : 0 >= e ? (this.__log(t, "应该是正数"), !1) : !0 : !0
            },
            checkNotNegativeNumber: function(t, e, i) {
                return i || "undefined" != typeof e ? "number" != typeof e ? (this.__log(t, "应该是数字"), !1) : 0 > e ? (this.__log(t, "应该是非负数"), !1) : !0 : !0
            },
            checkNotEmptyString: function(t, e, i) {
                return i || "undefined" != typeof e && ("string" != typeof e || "" !== e) ? "string" != typeof e ? (this.__log(t, "应该是字符串"), !1) : 0 === $.trim(e).length ? (this.__log(t, "应该是非空字符串"), !1) : !0 : !0
            },
            checkStringInArray: function(t, e, i, n) {
                return n || "undefined" != typeof e ? this.checkNotEmptyString(t, e, n) ? -1 === $.inArray(e, i) ? (this.__log(t, "字符串应该在数组中"), !1) : !0 : !1 : !0
            },
            checkArray: function(t, e, i, n) {
                if (!n && "undefined" == typeof e) return ! 0;
                if (!$.isArray(e)) return this.__log(t, "应该是数组"),
                !1;
                for (var o = 0; o < e.length; o++) if (typeof e[o] !== i) return this.__log(t, "应该是类型：" + i),
                !1;
                return ! 0
            },
            checkBoolean: function(t, e, i) {
                return (i || "undefined" != typeof e) && "boolean" != typeof e ? (this.__log(t, "应该是boolean"), !1) : !0
            },
            isID: function(t) {
                var e = /^(\d{6})(\d{4})(\d{2})(\d{2})(\d{3})([0-9]|X)$/;
                return e.test(t) ? !0 : !1
            }
        };
        t.exports = o
    },
    12 : function(t, e) {
        for (var i = "([\\w!#$%&'*+-/=?\\^_`{|}~\\.]+)",
        n = "([-\\w]+(\\.[-\\w]+)+)",
        o = i + "@" + n,
        s = ['\\"(.+)\\"[ ]*<' + o + ">", "\\'(.+)\\'[ ]*<" + o + ">", "([^\"']+)<" + o + ">", "<" + o + ">", '\\"' + o + '\\"', "\\'" + o + "\\'", o, "[ \\\"\\']?(.+)[ \\\"\\']?[ ]*<[ ]*" + o + "[ ]*>"], a = [], r = s.length - 1; r >= 0; r--) a.push(new RegExp(s[r]));
        var l = {
            _cache: {},
            emailPattern: "(\\w+[\\w\\-\\+]*\\w+@\\w+[\\w\\.\\-]*\\w+)",
            DEFAULT_SEP: ";",
            isValid: function(t) {
                return null != this._parseEmail(t)
            },
            _parseEmail: function(t) {
                t = $.trim(t);
                for (var e = {},
                i = 0; i < a.length; i++) {
                    var n = t.match(a[i]);
                    if (null != n) return 5 == n.length ? (e.name = n[1].replace(/"/g, ""), e.mail = n[2] + "@" + n[3], e) : 4 == n.length ? (e.name = n[1].replace(/"/g, ""), e.mail = n[1] + "@" + n[2], e) : null
                }
            }
        };
        t.exports = l
    },
    13 : function(t, e, i) {
        var n = i(4),
        o = i(2),
        s = i(3),
        a = n.extend({
            template: '<div class="m-notify hide"><div class="text j-text"></div></div>',
            iconMap: {
                success: "u-ok",
                fail: "u-fail",
                error: "u-fail",
                warning: "u-warning"
            },
            __config: function(t) {
                o._$extend(t, {
                    messages: "",
                    isHide: !0,
                    type: "",
                    clazz: "hide",
                    duration: 2e3
                })
            },
            __init: function(t) {
                this.__supr(t),
                this.__body = $(this.template),
                this.__textCon = this.__body.find(".j-text").first(),
                $(document.body).append(this.__body)
            },
            notify: function(t, e, i, n) {
                t && "object" == typeof t && (e = t.type, t = t.message, i = t.duration, n = t.callback),
                this.__data.duration = i || this.__data.duration,
                this.__data.message = t,
                this.__data.type = e || "success",
                this.__data.callback = n || null,
                this.__body.css("display", "block"),
                this.__textCon.html(this.__data.message);
                var o = this.__clear.bind(this, t);
                return setTimeout(function() {
                    this.__body.removeClass("hide").addClass("show")
                }.bind(this), 0),
                this.__timer && clearTimeout(this.__timer),
                -1 != this.__data.duration && (this.__timer = setTimeout(o, this.__data.duration)),
                o
            },
            __clear: function(t) {
                this.__body.removeClass("show").addClass("hide"),
                s._$isFunction(this.__data.callback) && this.__data.callback(),
                setTimeout(function() {
                    this.__body.css("display", "none")
                }.bind(this), 500)
            }
        }),
        r = new a;
        r.Notify = a,
        t.exports = r
    },
    14 : function(t, e, i) {
        var n = i(2),
        o = i(4),
        s = (i(13), i(6)),
        a = '<div>                      <div class="w-title j-title"></div>                     <div class="w-tips j-text"></div>                       <a class="w-button w-button-primary w-button-l pos-l j-ok"></a>                     <a class="w-button w-button-l pos-r j-cancel"></a></div>';
        s($);
        var r = o.extend({
            __config: function(t) {
                n._$extend(t, {
                    title: "",
                    tips: "",
                    okText: "确定",
                    cancelText: "取消"
                })
            },
            __init: function(t) {
                this.__supr(t),
                this.__initNode()
            },
            __initNode: function() {
                this.__body = $(a).showDialog({});
                var t = this.__body.find(".j-ok").first(),
                e = this.__body.find(".j-cancel").first(),
                i = this.__body.find(".j-text").first(),
                n = this.__body.find(".j-title").first();
                n.html(this.__data.title),
                i.html(this.__data.tips),
                e.html(this.__data.cancelText),
                t.html(this.__data.okText),
                t.click($.proxy(this.__onOkCallback, this)),
                e.click($.proxy(this.__onCancelCallback, this))
            },
            __onOkCallback: function() {
                this.__body.closeDialog(),
                this._$emit("onok")
            },
            __onCancelCallback: function() {
                this.__body.closeDialog(),
                this._$emit("oncancel")
            }
        });
        t.exports = r
    },
    16 : function(t, e, i) {
        var n = i(4),
        o = i(2),
        s = i(17),
        a = i(19),
        r = i(28),
        l = i(35),
        d = i(36),
        c = i(37),
        u = i(39),
        h = i(41),
        p = n.extend({
            __config: function(t) {
                o._$extend(t, {
                    isHideHeader: !1,
                    isHideFooter: !1,
                    isHideFixedTool: !1,
                    isHideNewUserCookie: !1,
                    isShowNewUserGift: !1,
                    isShowOldUserModal: !1
                })
            },
            __init: function(t) {
                this.__supr(t),
                this.__data.isHideHeader || new r,
                this.__data.isHideFooter || new a,
                this.__data.isHideFixedTool || (new s, this.__isShowNewUserEntrance()),
                o._$isNew() || this.__data.isHideNewUserCookie ? this.__initNewUserGift() : l.confirm({
                    url: location.pathname + location.search
                }).done(function(t) {
                    this.__initNewUserGift()
                }.bind(this)),
                $("video").each(function(t, e) {
                    e.volume = .1
                }),
                this.__data.isShowOldUserModal && this.__initOldUserModal()
            },
            __initNewUserGift: function() {
                var t = this;
                if ("web_in_morenye" == o._$getUrlParam("from")) return void d.show().done(function(e) {
                    var i = e.data;
                    if (i.showGiftWin && i.newUserGift) {
                        new c({
                            data: {
                                obj: i.newUserGift
                            },
                            events: {
                                onCancel: function() {
                                    t.__isShowNewUserEntrance()
                                },
                                onOk: function() {
                                    t.__isShowNewUserEntrance()
                                }
                            }
                        })
                    }
                });
                window.PAGE_KEY = location.href;
                for (var e = unescape(o.getCookie("yx_pagekey_list") || ""), i = "" == e ? [] : e.split(","), n = !0, s = 0, a = i.length; a > s; s++) if (i[s] == window.PAGE_KEY) {
                    n = !1;
                    break
                }
                n && i.length < 31 && window.PAGE_KEY.length < 250 && (i.push(window.PAGE_KEY), o.setCookie("yx_pagekey_list", i.join(",")));
                var r = !0,
                l = o._$getFullUrsName();
                this.__data.isShowNewUserGift && $(window).bind("focus",
                function() {
                    var e = unescape(o.getCookie("yx_pagekey_list") || ""),
                    i = "" == e ? [] : e.split(","),
                    n = o.getCookie("yx_newUserModal_show");
                    l != o._$getFullUrsName() && (l = o._$getFullUrsName(), r = !0),
                    r && 1 == n && 1 == i.length && (r = !1, d.show().done(function(e) {
                        var i = e.data;
                        if (i.showGiftWin && i.newUserGift) {
                            new c({
                                data: {
                                    obj: i.newUserGift
                                },
                                events: {
                                    onCancel: function() {
                                        t.__isShowNewUserEntrance()
                                    },
                                    onOk: function() {
                                        t.__isShowNewUserEntrance()
                                    }
                                }
                            })
                        }
                    }))
                }),
                window.onbeforeunload = function(t) {
                    t = t || window.event;
                    for (var e = unescape(o.getCookie("yx_pagekey_list") || ""), i = e.split(","), n = [], s = 0, a = i.length; a > s; s++) i[s] != window.PAGE_KEY && n.push(i[s]);
                    o.setCookie("yx_pagekey_list", n.join(",")),
                    o.setCookie("yx_newUserModal_show", 1)
                }
            },
            __isShowNewUserEntrance: function() {
                return null == o.getCookie("yx_showNewUserEntrance") ? ($("#js-fixedtool").removeClass("m-fixedtool-newuser"), void $(".j-newuser").hide()) : void d.isNewUser().done(function(t) {
                    t.data && t.data.isNewUser && t.data.showEntrance ? ($("#js-fixedtool").addClass("m-fixedtool-newuser"), $(".j-newuser").show()) : ($("#js-fixedtool").removeClass("m-fixedtool-newuser"), $(".j-newuser").hide())
                })
            },
            __initOldUserModal: function() {
                "web_in_morenye" == o._$getUrlParam("from") && h.show().done(function(t) {
                    t.data && setTimeout(function() {
                        new u({})
                    },
                    5e3)
                })
            }
        });
        t.exports = p
    },
    17 : function(t, e, i) {
        var n = i(2),
        o = i(4),
        s = i(18),
        a = o.extend({
            __init: function(t) {
                this.__supr(t),
                this.__fixedtool = $("#js-fixedtool"),
                this.__goTopBtn = $("#js-fixedtoolGoTop"),
                this.__fixedtool.length && (this.__initFixedTool(), this.__initEventBind(), this.__initKeFu(), this.__downloadQRcode(), this.__initfixedToolStatistics())
            },
            __initFixedTool: function() {
                var t = this.__fixedtool;
                this.__positionFixedtool(),
                this.__showGoTopIfNeeded(),
                t.show()
            },
            __initEventBind: function() {
                $(window).on("resize.fixedtool", this.__positionFixedtool.bind(this)),
                $(window).on("scroll.fixedtool", this.__showGoTopIfNeeded.bind(this)),
                $("body").on("click.fixedtool", "#js-fixedtoolGoTop",
                function(t) {
                    return t.preventDefault(),
                    this.__goTop(),
                    !1
                }.bind(this))
            },
            __initKeFu: function() {
                $("#js-fixedtoolCustomerService").click(function() {
                    n._$openKefu()
                })
            },
            __positionFixedtool: function() {
                var t = this.__fixedtool,
                e = document.documentElement.clientWidth,
                i = parseInt(t.css("right")),
                n = 1350 >= e ? 1280 >= e ? 0 : (e - 1090) / 2 - 95 : (e - 1090) / 2 - 130;
                i !== n && t.css("right", n)
            },
            __showGoTopIfNeeded: function() {
                var t = this.__goTopBtn,
                e = $(document).scrollTop(),
                i = document.documentElement.clientHeight;
                e >= i ? t.addClass("active") : t.removeClass("active")
            },
            __goTop: function() {
                $("body, html").animate({
                    scrollTop: 0
                },
                800)
            },
            __downloadQRcode: function() {
                var t = n._$getDownloadQRnode(75, 20);
                $("#js-fixedtool .j-qrcode").append(t),
                $("#js-fixedtool .j-downloadlink").attr("href", n._$getDownloadLink())
            },
            __initfixedToolStatistics: function() {
                $(".j-fixedToolActivity").each(function() {
                    var t = $(this),
                    e = n.getCookie("yx_aui"),
                    i = t.data("id");
                    s({
                        uuid: e,
                        key: "侧边栏活动展示",
                        id: i
                    })
                })
            }
        });
        t.exports = a
    },
    18 : function(t, e) {
        t.exports = function(t) {
            var e = [];
            for (var i in t) t.hasOwnProperty(i) && e.push("" + i + "=" + t[i]);
            e.push("type=web&rid=" + (new Date).getTime());
            var n = "http://stat.mail.163.com/you/a.js?" + e.join("&");
            n = encodeURI(n);
            var o = $.get(n);
            setTimeout(function() {
                o.abort()
            },
            3e4)
        }
    },
    19 : function(t, e, i) {
        var n = i(20),
        o = i(2),
        s = i(4),
        a = s.extend({
            __init: function(t) {
                this.__supr(t),
                $("#j-feedback").click(function(t) {
                    t.preventDefault(),
                    n.show()
                }),
                $("#j-kefu").click(function() {
                    o._$openKefu()
                });
                var e = o._$getDownloadQRnode(104, 25);
                $(".m-ftAppDownload .j-qrcode").append(e)
            }
        });
        t.exports = a
    },
    20 : function(t, e, i) {
        function n() {
            r($)
        }
        function o() {
            d.init({
                before: function(t) {
                    s = $(c),
                    s.find("#j-feedbackFormWrap").append(t),
                    a = s.showDialog({
                        clsName: "m-feedbackPop"
                    })
                },
                success: function() {
                    a.closeDialog(),
                    setTimeout(function() {
                        l.notify("谢谢你的建议")
                    },
                    100)
                }
            })
        }
        var s, a, r = i(6),
        l = (i(2), i(13)),
        d = i(21),
        c = ["<div>", '<div class="m-feedbackModal">', '<h3 class="title">关于严选，我们还有很多希望与您交流</h3>', '<div id="j-feedbackFormWrap"></div>', "</div>", "</div>"].join("");
        e.show = o,
        n()
    },
    21 : function(t, e, i) {
        function n(t) {
            M = t,
            o(),
            I.click(function(t) {
                t.preventDefault(),
                d()
            }),
            A.limitIpt({
                limit: 500,
                update: function(t) {
                    j.text(t.length)
                }
            }),
            S.click(function() {
                v()
            }),
            D.click(function(t) {
                t.preventDefault(),
                v()
            })
        }
        function o() {
            var t = s(M.formType);
            M.before(t),
            k = $("#j-feedbackForm"),
            T = $("#j-feedbackError"),
            j = $("#j-feedbackTotalCount"),
            S = $("#j-feedbackCaptcha"),
            D = $("#j-feedbackUnclear"),
            I = $("#j-feedbackSubmit"),
            O = $("#j-type"),
            A = k.find("[name=content]"),
            E = k.find("[name=mobile]"),
            U = k.find("[name=verifyCode]"),
            $uploadImage = k.find(".j-uploadImage"),
            a(),
            y(E),
            A.val("")
        }
        function s(t) {
            var t = t || "suggestion",
            e = _();
            return $(B).jqote($.extend({
                captchaUrl: e
            },
            N[t]))
        }
        function a() {
            $(".j-options").on("click",
            function(t) {
                t.preventDefault(),
                $(".options").removeClass("f-hide"),
                r()
            }),
            $uploadImage.uploadImage({
                maxNumberOfFiles: 4
            })
        }
        function r() {
            var t = $(".options");
            t.find(".item").unbind(),
            t.find(".item").on("click",
            function(e) {
                e.preventDefault();
                var i = $(this).text(),
                n = $(this).attr("data-id");
                t.addClass("f-hide"),
                $(".typeVal").attr("data-id", n).text(i),
                e.stopPropagation()
            })
        }
        function l(t) {
            for (var e = [], i = 0; i < t.length; i++) e.push({
                picUrl: t[i]
            });
            return {
                picList: e
            }
        }
        function d() {
            var t = {},
            e = $.trim(E.val()),
            i = !1,
            n = l($uploadImage.uploadImage("getImageList"));
            e && e == P && (i = !0),
            h(),
            c(i) && (t.picUrlListJson = JSON.stringify(n), t.type = parseInt(O.attr("data-id")), t.content = $.trim(A.val()), e && (t.mobile = e), t.verifyCode = $.trim(U.val()), C.submit(t).then(function(t) {
                u(),
                M.success()
            },
            function(t, e) {
                g(e)
            }))
        }
        function c(t) {
            var e = parseInt(O.attr("data-id")),
            i = $.trim(A.val()),
            n = $.trim(E.val()),
            o = $.trim(U.val());
            if (0 == e) {
                var s = $(".typeOpts");
                return g("请选择反馈类型"),
                f(s),
                !1
            }
            return i ? !n || w.isCellPhone(n) || t ? o ? !0 : (g("验证码不能为空"), f(U), p(U), !1) : (E.val(n.replace(/\*/g, "")), g("手机号码格式错误"), f(E), p(E), !1) : (g("请填写反馈内容"), f(A.parent()), p(A), !1)
        }
        function u() {
            h(),
            A.val(""),
            E.val(""),
            U.val(""),
            v()
        }
        function h() {
            m(),
            $(".typeOpts").removeClass("error"),
            A.parent().removeClass("error"),
            E.removeClass("error"),
            U.removeClass("error")
        }
        function p(t) {
            t.focus()
        }
        function f(t) {
            t.addClass("error")
        }
        function g(t) {
            T.find(".text").text(t),
            T.removeClass("f-hide")
        }
        function m() {
            T.addClass("f-hide")
        }
        function v() {
            S.attr("src", _())
        }
        function _() {
            return F + "&rand=" + b.uid()
        }
        function y(t) {
            C.getUserMobile().then(function(e) {
                "" != e.data && (P = e.data, t.val(e.data))
            })
        }
        var w = i(11),
        b = i(2),
        x = i(22),
        C = i(23);
        i(13);
        i(24);
        var k, T, j, S, D, I, P, O, A, E, U, M, N = {
            suggestion: {
                cntLabel: "反馈内容",
                cntPlaceholder: "对我们网站、商品、服务，您还有什么建议吗？您还希望在严选上买到什么？请告诉我们..."
            },
            expert: {
                cntLabel: "自我介绍",
                cntPlaceholder: "例如，小严，男，程序猿，擅长甄选家居用品、数码产品。因为父母从事家居用品相关的行业而受熏陶，且自身爱好摄影等数码产品。我觉得严选一个性价比很高的网站，有“花小钱办大事”的感觉，希望能成为甄选家中的一员，为广大普通消费者甄选良心价的好东西。等等……",
                clsName: "feedbackForm-expert"
            }
        },
        F = "/xhr/feedback/verifyCode.do?csrf_token=" + b.getCookie("yx_csrf"),
        B = ['<script type="text/x-jqote-template">', '<form id="j-feedbackForm" class="form m-feedbackForm <%= this.clsName %>">', '<div class="formGroup formGroup-type">', "<label>反馈类型&nbsp;:</label>", '<div class="typeOpts ">', '<div class="j-options">', '<span class="typeVal " id="j-type" data-id="0">请选择</span>', '<i class="w-icon-normal icon-normal-select-arrow downIcon"></i>', "</div>", '<div class="options f-hide">', "<ul>", '<li class="item" data-id="1">商品相关</li>', '<li class="item" data-id="2">物流状况</li>', '<li class="item" data-id="3">客户服务</li>', '<li class="item" data-id="4">优惠活动</li>', '<li class="item" data-id="5">产品体验</li>', '<li class="item" data-id="6">其他</li>', "</ul>", "</div>", "</div>", "</div>", '<div class="formGroup formGroup-feedbackCnt">', "<label><%= this.cntLabel %>&nbsp;:</label>", '<div class="inputControl">', '<textarea class="inputArea" name="content" placeholder="<%= this.cntPlaceholder %>"></textarea>', '<div class="tip"><span id="j-feedbackTotalCount">0</span>/500</div>', "</div>", "</div>", '<div class="formGroup formGroup-pics">', "<label>相关图片&nbsp;:</label>", '<div class="j-uploadImage uploadImage"></div>', "</div>", '<div class="formGroup formGroup-phone">', "<label>手&nbsp;机&nbsp;号&nbsp;:</label>", '<div class="inputGroup">', '<input class="inputControl" autocomplete="off" name="mobile" placeholder="方便我们与您联系" type="text">', "</div>", "</div>", '<div class="formGroup formGroup-captcha">', "<label>验&nbsp;证&nbsp;码&nbsp;:</label>", '<div class="inputGroup">', '<input class="inputControl" autocomplete="off" name="verifyCode" type="text">', '<img id="j-feedbackCaptcha" class="captcha" src="<%= this.captchaUrl %>">', '<a id="j-feedbackUnclear" class="unclear w-link" href="javascript:;">看不清</a>', "</div>", "</div>", '<div class="submitGroup">', '<a id="j-feedbackSubmit" class="w-button w-button-primary w-button-l">提交</a>', '<div id="j-feedbackError" class="w-tipMsg tipMsg f-hide" href="javascript:;">', '<i class="icon w-icon-normal icon-normal-disable"></i>', '<span class="text"></span>', "</div>", "</div>", "</form>", "</script>"].join("");
        x($),
        e.init = n
    },
    22 : function(t, e) {
        t.exports = function(t) {
            t.fn.limitIpt = function(e) {
                var i = t(this);
                i.on("keyup cut paste input",
                function() {
                    var t = i.val();
                    t.length > e.limit && (t = t.substring(0, e.limit), i.val(t)),
                    e.update.apply(this, [t])
                })
            }
        }
    },
    23 : function(t, e, i) {
        var n = i(9),
        o = {
            submit: function(t) {
                var e = $.Deferred();
                return n.ajax({
                    url: "/xhr/feedback/submit.json",
                    contentType: "application/json",
                    data: t,
                    success: function(t) {
                        e.resolve(t)
                    },
                    error: function(t, i, n) {
                        e.reject(t, i)
                    },
                    type: "POST"
                }),
                e
            },
            getUserMobile: function(t) {
                var e = $.Deferred();
                return n.ajax({
                    url: "/xhr/feedback/getUserMobile.json",
                    contentType: "application/json",
                    data: t,
                    success: function(t) {
                        e.resolve(t)
                    },
                    error: function(t, i, n) {
                        e.reject(t, i)
                    },
                    type: "POST"
                }),
                e
            }
        };
        t.exports = o
    },
    24 : function(t, e, i) {
        var n = i(13);
        i(25),
        i(26),
        i(27);
        var o = function(t) {
            var e, i = $(this),
            o = '<div class="m-uploadImage"><div class="queue j-queue"></div><div class="w-button-upload j-button-upload">  <input class="file-input j-fileInput" type="file" name="file"  accept="image/*" multiple></div></div>',
            s = '<div class="w-upload-img"><img class="img"/><a class="detele" href="javascript:;">删除</a><div class="progress">0%</div></div>',
            a = "/xhr/file/upload.json",
            r = 0;
            if (!i.hasClass("uploadImageInited")) {
                i.append(o);
                var l = i.find(".j-fileInput"),
                d = i.find(".j-button-upload"),
                c = i.find(".j-queue");
                e = $.extend({
                    url: a,
                    maxNumberOfFiles: 8,
                    sequentialUploads: !0,
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|bmp|png)$/i,
                    maxFileSize: 2e7,
                    formAcceptCharset: "UTF-8",
                    dataType: "json",
                    type: "post",
                    autoUpload: !1,
                    messages: {
                        acceptFileTypes: "只能上传gif,jpg,jpeg,png,bmp格式的图片",
                        maxFileSize: "您上传的图片太大了"
                    }
                },
                t),
                l.fileupload(e).bind("fileuploadadd",
                function(t, e) {
                    r++
                }).bind("fileuploaddone",
                function(t, i) {
                    if (void 0 != i.context && void 0 != i.result) {
                        var n = i.context,
                        o = i.result;
                        "200" == o.code ? (n.find(".progress").hide(), n.find(".img").attr("src", o.data[0]), n.find(".detele").on("click", u.bind(this, i)), n.addClass("success"), "function" == typeof e.callback && e.callback()) : r = h(r, i, o.errorCode)
                    }
                }).bind("fileuploadfail",
                function(t, e) {
                    r = h(r, e, "文件上传失败！")
                }).bind("fileuploadprocessalways ",
                function(t, e) {
                    if (r > e.maxNumberOfFiles) return void(r = h(r, e, "最多只能上传" + e.maxNumberOfFiles + "张图片"));
                    r == e.maxNumberOfFiles && d.hide();
                    var i = e.index,
                    n = e.files[i];
                    n.error ? r = h(r, e, n.error) : (e.context = $(s).appendTo(c), e.submit())
                }).bind("fileuploadprogress",
                function(t, e) {
                    if (void 0 != e.context) {
                        var i = parseInt(e.loaded / e.total * 100, 10) + "%",
                        n = e.context.find(".progress");
                        n.length > 0 && n.text(i)
                    }
                }),
                i.addClass("uploadImageInited");
                var u = function(t) {
                    r = h(r, t)
                },
                h = function(t, e, i) {
                    return i && (notifyFlag = !1, n.notify(i, "error")),
                    void 0 != e.context && e.context.remove(),
                    t--,
                    t < e.maxNumberOfFiles && d.show(),
                    t
                }
            }
        },
        s = function() {
            var t = [];
            return $(this).find(".img").each(function() {
                t.push($(this).attr("src"))
            }),
            t
        },
        a = function(t) {
            return "getImageList" === t ? s.apply(this) : void $(this).each(function() {
                o.apply(this, [t])
            })
        };
        $.fn.uploadImage = a
    },
    25 : function(t, e) { !
        function(t) {
            var e = 0,
            i = Array.prototype.slice;
            t.cleanData = function(e) {
                return function(i) {
                    var n, o, s;
                    for (s = 0; null != (o = i[s]); s++) try {
                        n = t._data(o, "events"),
                        n && n.remove && t(o).triggerHandler("remove")
                    } catch(a) {}
                    e(i)
                }
            } (t.cleanData),
            t.widget = function(e, i, n) {
                var o, s, a, r, l = {},
                d = e.split(".")[0];
                return e = e.split(".")[1],
                o = d + "-" + e,
                n || (n = i, i = t.Widget),
                t.expr[":"][o.toLowerCase()] = function(e) {
                    return !! t.data(e, o)
                },
                t[d] = t[d] || {},
                s = t[d][e],
                a = t[d][e] = function(t, e) {
                    return this._createWidget ? void(arguments.length && this._createWidget(t, e)) : new a(t, e)
                },
                t.extend(a, s, {
                    version: n.version,
                    _proto: t.extend({},
                    n),
                    _childConstructors: []
                }),
                r = new i,
                r.options = t.widget.extend({},
                r.options),
                t.each(n,
                function(e, n) {
                    return t.isFunction(n) ? void(l[e] = function() {
                        var t = function() {
                            return i.prototype[e].apply(this, arguments)
                        },
                        o = function(t) {
                            return i.prototype[e].apply(this, t)
                        };
                        return function() {
                            var e, i = this._super,
                            s = this._superApply;
                            return this._super = t,
                            this._superApply = o,
                            e = n.apply(this, arguments),
                            this._super = i,
                            this._superApply = s,
                            e
                        }
                    } ()) : void(l[e] = n)
                }),
                a.prototype = t.widget.extend(r, {
                    widgetEventPrefix: s ? r.widgetEventPrefix || e: e
                },
                l, {
                    constructor: a,
                    namespace: d,
                    widgetName: e,
                    widgetFullName: o
                }),
                s ? (t.each(s._childConstructors,
                function(e, i) {
                    var n = i.prototype;
                    t.widget(n.namespace + "." + n.widgetName, a, i._proto)
                }), delete s._childConstructors) : i._childConstructors.push(a),
                t.widget.bridge(e, a),
                a
            },
            t.widget.extend = function(e) {
                for (var n, o, s = i.call(arguments, 1), a = 0, r = s.length; r > a; a++) for (n in s[a]) o = s[a][n],
                s[a].hasOwnProperty(n) && void 0 !== o && (t.isPlainObject(o) ? e[n] = t.isPlainObject(e[n]) ? t.widget.extend({},
                e[n], o) : t.widget.extend({},
                o) : e[n] = o);
                return e
            },
            t.widget.bridge = function(e, n) {
                var o = n.prototype.widgetFullName || e;
                t.fn[e] = function(s) {
                    var a = "string" == typeof s,
                    r = i.call(arguments, 1),
                    l = this;
                    return a ? this.each(function() {
                        var i, n = t.data(this, o);
                        return "instance" === s ? (l = n, !1) : n ? t.isFunction(n[s]) && "_" !== s.charAt(0) ? (i = n[s].apply(n, r), i !== n && void 0 !== i ? (l = i && i.jquery ? l.pushStack(i.get()) : i, !1) : void 0) : t.error("no such method '" + s + "' for " + e + " widget instance") : t.error("cannot call methods on " + e + " prior to initialization; attempted to call method '" + s + "'")
                    }) : (r.length && (s = t.widget.extend.apply(null, [s].concat(r))), this.each(function() {
                        var e = t.data(this, o);
                        e ? (e.option(s || {}), e._init && e._init()) : t.data(this, o, new n(s, this))
                    })),
                    l
                }
            },
            t.Widget = function() {},
            t.Widget._childConstructors = [],
            t.Widget.prototype = {
                widgetName: "widget",
                widgetEventPrefix: "",
                defaultElement: "<div>",
                options: {
                    disabled: !1,
                    create: null
                },
                _createWidget: function(i, n) {
                    n = t(n || this.defaultElement || this)[0],
                    this.element = t(n),
                    this.uuid = e++,
                    this.eventNamespace = "." + this.widgetName + this.uuid,
                    this.bindings = t(),
                    this.hoverable = t(),
                    this.focusable = t(),
                    n !== this && (t.data(n, this.widgetFullName, this), this._on(!0, this.element, {
                        remove: function(t) {
                            t.target === n && this.destroy()
                        }
                    }), this.document = t(n.style ? n.ownerDocument: n.document || n), this.window = t(this.document[0].defaultView || this.document[0].parentWindow)),
                    this.options = t.widget.extend({},
                    this.options, this._getCreateOptions(), i),
                    this._create(),
                    this._trigger("create", null, this._getCreateEventData()),
                    this._init()
                },
                _getCreateOptions: t.noop,
                _getCreateEventData: t.noop,
                _create: t.noop,
                _init: t.noop,
                destroy: function() {
                    this._destroy(),
                    this.element.unbind(this.eventNamespace).removeData(this.widgetFullName).removeData(t.camelCase(this.widgetFullName)),
                    this.widget().unbind(this.eventNamespace).removeAttr("aria-disabled").removeClass(this.widgetFullName + "-disabled ui-state-disabled"),
                    this.bindings.unbind(this.eventNamespace),
                    this.hoverable.removeClass("ui-state-hover"),
                    this.focusable.removeClass("ui-state-focus")
                },
                _destroy: t.noop,
                widget: function() {
                    return this.element
                },
                option: function(e, i) {
                    var n, o, s, a = e;
                    if (0 === arguments.length) return t.widget.extend({},
                    this.options);
                    if ("string" == typeof e) if (a = {},
                    n = e.split("."), e = n.shift(), n.length) {
                        for (o = a[e] = t.widget.extend({},
                        this.options[e]), s = 0; s < n.length - 1; s++) o[n[s]] = o[n[s]] || {},
                        o = o[n[s]];
                        if (e = n.pop(), 1 === arguments.length) return void 0 === o[e] ? null: o[e];
                        o[e] = i
                    } else {
                        if (1 === arguments.length) return void 0 === this.options[e] ? null: this.options[e];
                        a[e] = i
                    }
                    return this._setOptions(a),
                    this
                },
                _setOptions: function(t) {
                    var e;
                    for (e in t) this._setOption(e, t[e]);
                    return this
                },
                _setOption: function(t, e) {
                    return this.options[t] = e,
                    "disabled" === t && (this.widget().toggleClass(this.widgetFullName + "-disabled", !!e), e && (this.hoverable.removeClass("ui-state-hover"), this.focusable.removeClass("ui-state-focus"))),
                    this
                },
                enable: function() {
                    return this._setOptions({
                        disabled: !1
                    })
                },
                disable: function() {
                    return this._setOptions({
                        disabled: !0
                    })
                },
                _on: function(e, i, n) {
                    var o, s = this;
                    "boolean" != typeof e && (n = i, i = e, e = !1),
                    n ? (i = o = t(i), this.bindings = this.bindings.add(i)) : (n = i, i = this.element, o = this.widget()),
                    t.each(n,
                    function(n, a) {
                        function r() {
                            return e || s.options.disabled !== !0 && !t(this).hasClass("ui-state-disabled") ? ("string" == typeof a ? s[a] : a).apply(s, arguments) : void 0
                        }
                        "string" != typeof a && (r.guid = a.guid = a.guid || r.guid || t.guid++);
                        var l = n.match(/^([\w:-]*)\s*(.*)$/),
                        d = l[1] + s.eventNamespace,
                        c = l[2];
                        c ? o.delegate(c, d, r) : i.bind(d, r)
                    })
                },
                _off: function(e, i) {
                    i = (i || "").split(" ").join(this.eventNamespace + " ") + this.eventNamespace,
                    e.unbind(i).undelegate(i),
                    this.bindings = t(this.bindings.not(e).get()),
                    this.focusable = t(this.focusable.not(e).get()),
                    this.hoverable = t(this.hoverable.not(e).get())
                },
                _delay: function(t, e) {
                    function i() {
                        return ("string" == typeof t ? n[t] : t).apply(n, arguments)
                    }
                    var n = this;
                    return setTimeout(i, e || 0)
                },
                _hoverable: function(e) {
                    this.hoverable = this.hoverable.add(e),
                    this._on(e, {
                        mouseenter: function(e) {
                            t(e.currentTarget).addClass("ui-state-hover")
                        },
                        mouseleave: function(e) {
                            t(e.currentTarget).removeClass("ui-state-hover")
                        }
                    })
                },
                _focusable: function(e) {
                    this.focusable = this.focusable.add(e),
                    this._on(e, {
                        focusin: function(e) {
                            t(e.currentTarget).addClass("ui-state-focus")
                        },
                        focusout: function(e) {
                            t(e.currentTarget).removeClass("ui-state-focus")
                        }
                    })
                },
                _trigger: function(e, i, n) {
                    var o, s, a = this.options[e];
                    if (n = n || {},
                    i = t.Event(i), i.type = (e === this.widgetEventPrefix ? e: this.widgetEventPrefix + e).toLowerCase(), i.target = this.element[0], s = i.originalEvent) for (o in s) o in i || (i[o] = s[o]);
                    return this.element.trigger(i, n),
                    !(t.isFunction(a) && a.apply(this.element[0], [i].concat(n)) === !1 || i.isDefaultPrevented())
                }
            },
            t.each({
                show: "fadeIn",
                hide: "fadeOut"
            },
            function(e, i) {
                t.Widget.prototype["_" + e] = function(n, o, s) {
                    "string" == typeof o && (o = {
                        effect: o
                    });
                    var a, r = o ? o === !0 || "number" == typeof o ? i: o.effect || i: e;
                    o = o || {},
                    "number" == typeof o && (o = {
                        duration: o
                    }),
                    a = !t.isEmptyObject(o),
                    o.complete = s,
                    o.delay && n.delay(o.delay),
                    a && t.effects && t.effects.effect[r] ? n[e](o) : r !== e && n[r] ? n[r](o.duration, o.easing, s) : n.queue(function(i) {
                        t(this)[e](),
                        s && s.call(n[0]),
                        i()
                    })
                }
            });
            t.widget
        } (jQuery)
    },
    26 : function(t, e) { !
        function(t) {
            "use strict";
            var e = 0;
            t.ajaxTransport("iframe",
            function(i) {
                if (i.async) {
                    var n, o, s, a = i.initialIframeSrc || "javascript:false;";
                    return {
                        send: function(r, l) {
                            n = t('<form style="display:none;"></form>'),
                            n.attr("accept-charset", i.formAcceptCharset),
                            s = /\?/.test(i.url) ? "&": "?",
                            "DELETE" === i.type ? (i.url = i.url + s + "_method=DELETE", i.type = "POST") : "PUT" === i.type ? (i.url = i.url + s + "_method=PUT", i.type = "POST") : "PATCH" === i.type && (i.url = i.url + s + "_method=PATCH", i.type = "POST"),
                            e += 1,
                            o = t('<iframe src="' + a + '" name="iframe-transport-' + e + '"></iframe>').bind("load",
                            function() {
                                var e, s = t.isArray(i.paramName) ? i.paramName: [i.paramName];
                                o.unbind("load").bind("load",
                                function() {
                                    var e;
                                    try {
                                        if (e = o.contents(), !e.length || !e[0].firstChild) throw new Error
                                    } catch(i) {
                                        e = void 0
                                    }
                                    l(200, "success", {
                                        iframe: e
                                    }),
                                    t('<iframe src="' + a + '"></iframe>').appendTo(n),
                                    window.setTimeout(function() {
                                        n.remove()
                                    },
                                    0)
                                }),
                                n.prop("target", o.prop("name")).prop("action", i.url).prop("method", i.type),
                                i.formData && t.each(i.formData,
                                function(e, i) {
                                    t('<input type="hidden"/>').prop("name", i.name).val(i.value).appendTo(n)
                                }),
                                i.fileInput && i.fileInput.length && "POST" === i.type && (e = i.fileInput.clone(), i.fileInput.after(function(t) {
                                    return e[t]
                                }), i.paramName && i.fileInput.each(function(e) {
                                    t(this).prop("name", s[e] || i.paramName)
                                }), n.append(i.fileInput).prop("enctype", "multipart/form-data").prop("encoding", "multipart/form-data"), i.fileInput.removeAttr("form")),
                                n.submit(),
                                e && e.length && i.fileInput.each(function(i, n) {
                                    var o = t(e[i]);
                                    t(n).prop("name", o.prop("name")).attr("form", o.attr("form")),
                                    o.replaceWith(n)
                                })
                            }),
                            n.append(o).appendTo(document.body)
                        },
                        abort: function() {
                            o && o.unbind("load").prop("src", a),
                            n && n.remove()
                        }
                    }
                }
            }),
            t.ajaxSetup({
                converters: {
                    "iframe text": function(e) {
                        return e && t(e[0].body).text()
                    },
                    "iframe json": function(e) {
                        return e && t.parseJSON(t(e[0].body).text())
                    },
                    "iframe html": function(e) {
                        return e && t(e[0].body).html()
                    },
                    "iframe xml": function(e) {
                        var i = e && e[0];
                        return i && t.isXMLDoc(i) ? i: t.parseXML(i.XMLDocument && i.XMLDocument.xml || t(i.body).html())
                    },
                    "iframe script": function(e) {
                        return e && t.globalEval(t(e[0].body).text())
                    }
                }
            })
        } (jQuery)
    },
    27 : function(t, e) { !
        function(t) {
            "use strict";
            function e(e) {
                var i = "dragover" === e;
                return function(n) {
                    n.dataTransfer = n.originalEvent && n.originalEvent.dataTransfer;
                    var o = n.dataTransfer;
                    o && -1 !== t.inArray("Files", o.types) && this._trigger(e, t.Event(e, {
                        delegatedEvent: n
                    })) !== !1 && (n.preventDefault(), i && (o.dropEffect = "copy"))
                }
            }
            t.support.fileInput = !(new RegExp("(Android (1\\.[0156]|2\\.[01]))|(Windows Phone (OS 7|8\\.0))|(XBLWP)|(ZuneWP)|(WPDesktop)|(w(eb)?OSBrowser)|(webOS)|(Kindle/(1\\.0|2\\.[05]|3\\.0))").test(window.navigator.userAgent) || t('<input type="file">').prop("disabled")),
            t.support.xhrFileUpload = !(!window.ProgressEvent || !window.FileReader),
            t.support.xhrFormDataFileUpload = !!window.FormData,
            t.support.blobSlice = window.Blob && (Blob.prototype.slice || Blob.prototype.webkitSlice || Blob.prototype.mozSlice),
            t.widget("blueimp.fileupload", {
                options: {
                    dropZone: t(document),
                    pasteZone: void 0,
                    fileInput: void 0,
                    replaceFileInput: !0,
                    paramName: void 0,
                    singleFileUploads: !0,
                    limitMultiFileUploads: void 0,
                    limitMultiFileUploadSize: void 0,
                    limitMultiFileUploadSizeOverhead: 512,
                    sequentialUploads: !1,
                    limitConcurrentUploads: void 0,
                    forceIframeTransport: !1,
                    redirect: void 0,
                    redirectParamName: void 0,
                    postMessage: void 0,
                    multipart: !0,
                    maxChunkSize: void 0,
                    uploadedBytes: void 0,
                    recalculateProgress: !0,
                    progressInterval: 100,
                    bitrateInterval: 500,
                    autoUpload: !0,
                    messages: {
                        uploadedBytes: "Uploaded bytes exceed file size"
                    },
                    i18n: function(e, i) {
                        return e = this.messages[e] || e.toString(),
                        i && t.each(i,
                        function(t, i) {
                            e = e.replace("{" + t + "}", i)
                        }),
                        e
                    },
                    formData: function(t) {
                        return t.serializeArray()
                    },
                    add: function(e, i) {
                        return e.isDefaultPrevented() ? !1 : void((i.autoUpload || i.autoUpload !== !1 && t(this).fileupload("option", "autoUpload")) && i.process().done(function() {
                            i.submit()
                        }))
                    },
                    processData: !1,
                    contentType: !1,
                    cache: !1,
                    timeout: 0
                },
                _specialOptions: ["fileInput", "dropZone", "pasteZone", "multipart", "forceIframeTransport"],
                _blobSlice: t.support.blobSlice &&
                function() {
                    var t = this.slice || this.webkitSlice || this.mozSlice;
                    return t.apply(this, arguments)
                },
                _BitrateTimer: function() {
                    this.timestamp = Date.now ? Date.now() : (new Date).getTime(),
                    this.loaded = 0,
                    this.bitrate = 0,
                    this.getBitrate = function(t, e, i) {
                        var n = t - this.timestamp;
                        return (!this.bitrate || !i || n > i) && (this.bitrate = (e - this.loaded) * (1e3 / n) * 8, this.loaded = e, this.timestamp = t),
                        this.bitrate
                    }
                },
                _isXHRUpload: function(e) {
                    return ! e.forceIframeTransport && (!e.multipart && t.support.xhrFileUpload || t.support.xhrFormDataFileUpload)
                },
                _getFormData: function(e) {
                    var i;
                    return "function" === t.type(e.formData) ? e.formData(e.form) : t.isArray(e.formData) ? e.formData: "object" === t.type(e.formData) ? (i = [], t.each(e.formData,
                    function(t, e) {
                        i.push({
                            name: t,
                            value: e
                        })
                    }), i) : []
                },
                _getTotal: function(e) {
                    var i = 0;
                    return t.each(e,
                    function(t, e) {
                        i += e.size || 1
                    }),
                    i
                },
                _initProgressObject: function(e) {
                    var i = {
                        loaded: 0,
                        total: 0,
                        bitrate: 0
                    };
                    e._progress ? t.extend(e._progress, i) : e._progress = i
                },
                _initResponseObject: function(t) {
                    var e;
                    if (t._response) for (e in t._response) t._response.hasOwnProperty(e) && delete t._response[e];
                    else t._response = {}
                },
                _onProgress: function(e, i) {
                    if (e.lengthComputable) {
                        var n, o = Date.now ? Date.now() : (new Date).getTime();
                        if (i._time && i.progressInterval && o - i._time < i.progressInterval && e.loaded !== e.total) return;
                        i._time = o,
                        n = Math.floor(e.loaded / e.total * (i.chunkSize || i._progress.total)) + (i.uploadedBytes || 0),
                        this._progress.loaded += n - i._progress.loaded,
                        this._progress.bitrate = this._bitrateTimer.getBitrate(o, this._progress.loaded, i.bitrateInterval),
                        i._progress.loaded = i.loaded = n,
                        i._progress.bitrate = i.bitrate = i._bitrateTimer.getBitrate(o, n, i.bitrateInterval),
                        this._trigger("progress", t.Event("progress", {
                            delegatedEvent: e
                        }), i),
                        this._trigger("progressall", t.Event("progressall", {
                            delegatedEvent: e
                        }), this._progress)
                    }
                },
                _initProgressListener: function(e) {
                    var i = this,
                    n = e.xhr ? e.xhr() : t.ajaxSettings.xhr();
                    n.upload && (t(n.upload).bind("progress",
                    function(t) {
                        var n = t.originalEvent;
                        t.lengthComputable = n.lengthComputable,
                        t.loaded = n.loaded,
                        t.total = n.total,
                        i._onProgress(t, e)
                    }), e.xhr = function() {
                        return n
                    })
                },
                _isInstanceOf: function(t, e) {
                    return Object.prototype.toString.call(e) === "[object " + t + "]"
                },
                _initXHRData: function(e) {
                    var i, n = this,
                    o = e.files[0],
                    s = e.multipart || !t.support.xhrFileUpload,
                    a = "array" === t.type(e.paramName) ? e.paramName[0] : e.paramName;
                    e.headers = t.extend({},
                    e.headers),
                    e.contentRange && (e.headers["Content-Range"] = e.contentRange),
                    s && !e.blob && this._isInstanceOf("File", o) || (e.headers["Content-Disposition"] = 'attachment; filename="' + encodeURI(o.name) + '"'),
                    s ? t.support.xhrFormDataFileUpload && (e.postMessage ? (i = this._getFormData(e), e.blob ? i.push({
                        name: a,
                        value: e.blob
                    }) : t.each(e.files,
                    function(n, o) {
                        i.push({
                            name: "array" === t.type(e.paramName) && e.paramName[n] || a,
                            value: o
                        })
                    })) : (n._isInstanceOf("FormData", e.formData) ? i = e.formData: (i = new FormData, t.each(this._getFormData(e),
                    function(t, e) {
                        i.append(e.name, e.value)
                    })), e.blob ? i.append(a, e.blob, o.name) : t.each(e.files,
                    function(o, s) { (n._isInstanceOf("File", s) || n._isInstanceOf("Blob", s)) && i.append("array" === t.type(e.paramName) && e.paramName[o] || a, s, s.uploadName || s.name)
                    })), e.data = i) : (e.contentType = o.type || "application/octet-stream", e.data = e.blob || o),
                    e.blob = null
                },
                _initIframeSettings: function(e) {
                    var i = t("<a></a>").prop("href", e.url).prop("host");
                    e.dataType = "iframe " + (e.dataType || ""),
                    e.formData = this._getFormData(e),
                    e.redirect && i && i !== location.host && e.formData.push({
                        name: e.redirectParamName || "redirect",
                        value: e.redirect
                    })
                },
                _initDataSettings: function(t) {
                    this._isXHRUpload(t) ? (this._chunkedUpload(t, !0) || (t.data || this._initXHRData(t), this._initProgressListener(t)), t.postMessage && (t.dataType = "postmessage " + (t.dataType || ""))) : this._initIframeSettings(t)
                },
                _getParamName: function(e) {
                    var i = t(e.fileInput),
                    n = e.paramName;
                    return n ? t.isArray(n) || (n = [n]) : (n = [], i.each(function() {
                        for (var e = t(this), i = e.prop("name") || "files[]", o = (e.prop("files") || [1]).length; o;) n.push(i),
                        o -= 1
                    }), n.length || (n = [i.prop("name") || "files[]"])),
                    n
                },
                _initFormSettings: function(e) {
                    e.form && e.form.length || (e.form = t(e.fileInput.prop("form")), e.form.length || (e.form = t(this.options.fileInput.prop("form")))),
                    e.paramName = this._getParamName(e),
                    e.url || (e.url = e.form.prop("action") || location.href),
                    e.type = (e.type || "string" === t.type(e.form.prop("method")) && e.form.prop("method") || "").toUpperCase(),
                    "POST" !== e.type && "PUT" !== e.type && "PATCH" !== e.type && (e.type = "POST"),
                    e.formAcceptCharset || (e.formAcceptCharset = e.form.attr("accept-charset"))
                },
                _getAJAXSettings: function(e) {
                    var i = t.extend({},
                    this.options, e);
                    return this._initFormSettings(i),
                    this._initDataSettings(i),
                    i
                },
                _getDeferredState: function(t) {
                    return t.state ? t.state() : t.isResolved() ? "resolved": t.isRejected() ? "rejected": "pending"
                },
                _enhancePromise: function(t) {
                    return t.success = t.done,
                    t.error = t.fail,
                    t.complete = t.always,
                    t
                },
                _getXHRPromise: function(e, i, n) {
                    var o = t.Deferred(),
                    s = o.promise();
                    return i = i || this.options.context || s,
                    e === !0 ? o.resolveWith(i, n) : e === !1 && o.rejectWith(i, n),
                    s.abort = o.promise,
                    this._enhancePromise(s)
                },
                _addConvenienceMethods: function(e, i) {
                    var n = this,
                    o = function(e) {
                        return t.Deferred().resolveWith(n, e).promise()
                    };
                    i.process = function(e, s) {
                        return (e || s) && (i._processQueue = this._processQueue = (this._processQueue || o([this])).pipe(function() {
                            return i.errorThrown ? t.Deferred().rejectWith(n, [i]).promise() : o(arguments)
                        }).pipe(e, s)),
                        this._processQueue || o([this])
                    },
                    i.submit = function() {
                        return "pending" !== this.state() && (i.jqXHR = this.jqXHR = n._trigger("submit", t.Event("submit", {
                            delegatedEvent: e
                        }), this) !== !1 && n._onSend(e, this)),
                        this.jqXHR || n._getXHRPromise()
                    },
                    i.abort = function() {
                        return this.jqXHR ? this.jqXHR.abort() : (this.errorThrown = "abort", n._trigger("fail", null, this), n._getXHRPromise(!1))
                    },
                    i.state = function() {
                        return this.jqXHR ? n._getDeferredState(this.jqXHR) : this._processQueue ? n._getDeferredState(this._processQueue) : void 0
                    },
                    i.processing = function() {
                        return ! this.jqXHR && this._processQueue && "pending" === n._getDeferredState(this._processQueue)
                    },
                    i.progress = function() {
                        return this._progress
                    },
                    i.response = function() {
                        return this._response
                    }
                },
                _getUploadedBytes: function(t) {
                    var e = t.getResponseHeader("Range"),
                    i = e && e.split("-"),
                    n = i && i.length > 1 && parseInt(i[1], 10);
                    return n && n + 1
                },
                _chunkedUpload: function(e, i) {
                    e.uploadedBytes = e.uploadedBytes || 0;
                    var n, o, s = this,
                    a = e.files[0],
                    r = a.size,
                    l = e.uploadedBytes,
                    d = e.maxChunkSize || r,
                    c = this._blobSlice,
                    u = t.Deferred(),
                    h = u.promise();
                    return this._isXHRUpload(e) && c && (l || r > d) && !e.data ? i ? !0 : l >= r ? (a.error = e.i18n("uploadedBytes"), this._getXHRPromise(!1, e.context, [null, "error", a.error])) : (o = function() {
                        var i = t.extend({},
                        e),
                        h = i._progress.loaded;
                        i.blob = c.call(a, l, l + d, a.type),
                        i.chunkSize = i.blob.size,
                        i.contentRange = "bytes " + l + "-" + (l + i.chunkSize - 1) + "/" + r,
                        s._initXHRData(i),
                        s._initProgressListener(i),
                        n = (s._trigger("chunksend", null, i) !== !1 && t.ajax(i) || s._getXHRPromise(!1, i.context)).done(function(n, a, d) {
                            l = s._getUploadedBytes(d) || l + i.chunkSize,
                            h + i.chunkSize - i._progress.loaded && s._onProgress(t.Event("progress", {
                                lengthComputable: !0,
                                loaded: l - i.uploadedBytes,
                                total: l - i.uploadedBytes
                            }), i),
                            e.uploadedBytes = i.uploadedBytes = l,
                            i.result = n,
                            i.textStatus = a,
                            i.jqXHR = d,
                            s._trigger("chunkdone", null, i),
                            s._trigger("chunkalways", null, i),
                            r > l ? o() : u.resolveWith(i.context, [n, a, d])
                        }).fail(function(t, e, n) {
                            i.jqXHR = t,
                            i.textStatus = e,
                            i.errorThrown = n,
                            s._trigger("chunkfail", null, i),
                            s._trigger("chunkalways", null, i),
                            u.rejectWith(i.context, [t, e, n])
                        })
                    },
                    this._enhancePromise(h), h.abort = function() {
                        return n.abort()
                    },
                    o(), h) : !1
                },
                _beforeSend: function(t, e) {
                    0 === this._active && (this._trigger("start"), this._bitrateTimer = new this._BitrateTimer, this._progress.loaded = this._progress.total = 0, this._progress.bitrate = 0),
                    this._initResponseObject(e),
                    this._initProgressObject(e),
                    e._progress.loaded = e.loaded = e.uploadedBytes || 0,
                    e._progress.total = e.total = this._getTotal(e.files) || 1,
                    e._progress.bitrate = e.bitrate = 0,
                    this._active += 1,
                    this._progress.loaded += e.loaded,
                    this._progress.total += e.total
                },
                _onDone: function(e, i, n, o) {
                    var s = o._progress.total,
                    a = o._response;
                    o._progress.loaded < s && this._onProgress(t.Event("progress", {
                        lengthComputable: !0,
                        loaded: s,
                        total: s
                    }), o),
                    a.result = o.result = e,
                    a.textStatus = o.textStatus = i,
                    a.jqXHR = o.jqXHR = n,
                    this._trigger("done", null, o)
                },
                _onFail: function(t, e, i, n) {
                    var o = n._response;
                    n.recalculateProgress && (this._progress.loaded -= n._progress.loaded, this._progress.total -= n._progress.total),
                    o.jqXHR = n.jqXHR = t,
                    o.textStatus = n.textStatus = e,
                    o.errorThrown = n.errorThrown = i,
                    this._trigger("fail", null, n)
                },
                _onAlways: function(t, e, i, n) {
                    this._trigger("always", null, n)
                },
                _onSend: function(e, i) {
                    i.submit || this._addConvenienceMethods(e, i);
                    var n, o, s, a, r = this,
                    l = r._getAJAXSettings(i),
                    d = function() {
                        return r._sending += 1,
                        l._bitrateTimer = new r._BitrateTimer,
                        n = n || ((o || r._trigger("send", t.Event("send", {
                            delegatedEvent: e
                        }), l) === !1) && r._getXHRPromise(!1, l.context, o) || r._chunkedUpload(l) || t.ajax(l)).done(function(t, e, i) {
                            r._onDone(t, e, i, l)
                        }).fail(function(t, e, i) {
                            r._onFail(t, e, i, l)
                        }).always(function(t, e, i) {
                            if (r._onAlways(t, e, i, l), r._sending -= 1, r._active -= 1, l.limitConcurrentUploads && l.limitConcurrentUploads > r._sending) for (var n = r._slots.shift(); n;) {
                                if ("pending" === r._getDeferredState(n)) {
                                    n.resolve();
                                    break
                                }
                                n = r._slots.shift()
                            }
                            0 === r._active && r._trigger("stop")
                        })
                    };
                    return this._beforeSend(e, l),
                    this.options.sequentialUploads || this.options.limitConcurrentUploads && this.options.limitConcurrentUploads <= this._sending ? (this.options.limitConcurrentUploads > 1 ? (s = t.Deferred(), this._slots.push(s), a = s.pipe(d)) : (this._sequence = this._sequence.pipe(d, d), a = this._sequence), a.abort = function() {
                        return o = [void 0, "abort", "abort"],
                        n ? n.abort() : (s && s.rejectWith(l.context, o), d())
                    },
                    this._enhancePromise(a)) : d()
                },
                _onAdd: function(e, i) {
                    var n, o, s, a, r = this,
                    l = !0,
                    d = t.extend({},
                    this.options, i),
                    c = i.files,
                    u = c.length,
                    h = d.limitMultiFileUploads,
                    p = d.limitMultiFileUploadSize,
                    f = d.limitMultiFileUploadSizeOverhead,
                    g = 0,
                    m = this._getParamName(d),
                    v = 0;
                    if (!u) return ! 1;
                    if (p && void 0 === c[0].size && (p = void 0), (d.singleFileUploads || h || p) && this._isXHRUpload(d)) if (d.singleFileUploads || p || !h) if (!d.singleFileUploads && p) for (s = [], n = [], a = 0; u > a; a += 1) g += c[a].size + f,
                    (a + 1 === u || g + c[a + 1].size + f > p || h && a + 1 - v >= h) && (s.push(c.slice(v, a + 1)), o = m.slice(v, a + 1), o.length || (o = m), n.push(o), v = a + 1, g = 0);
                    else n = m;
                    else for (s = [], n = [], a = 0; u > a; a += h) s.push(c.slice(a, a + h)),
                    o = m.slice(a, a + h),
                    o.length || (o = m),
                    n.push(o);
                    else s = [c],
                    n = [m];
                    return i.originalFiles = c,
                    t.each(s || c,
                    function(o, a) {
                        var d = t.extend({},
                        i);
                        return d.files = s ? a: [a],
                        d.paramName = n[o],
                        r._initResponseObject(d),
                        r._initProgressObject(d),
                        r._addConvenienceMethods(e, d),
                        l = r._trigger("add", t.Event("add", {
                            delegatedEvent: e
                        }), d)
                    }),
                    l
                },
                _replaceFileInput: function(e) {
                    var i = e.fileInput,
                    n = i.clone(!0),
                    o = i.is(document.activeElement);
                    e.fileInputClone = n,
                    t("<form></form>").append(n)[0].reset(),
                    i.after(n).detach(),
                    o && n.focus(),
                    t.cleanData(i.unbind("remove")),
                    this.options.fileInput = this.options.fileInput.map(function(t, e) {
                        return e === i[0] ? n[0] : e
                    }),
                    i[0] === this.element[0] && (this.element = n)
                },
                _handleFileTreeEntry: function(e, i) {
                    var n, o = this,
                    s = t.Deferred(),
                    a = function(t) {
                        t && !t.entry && (t.entry = e),
                        s.resolve([t])
                    },
                    r = function(t) {
                        o._handleFileTreeEntries(t, i + e.name + "/").done(function(t) {
                            s.resolve(t)
                        }).fail(a)
                    },
                    l = function() {
                        n.readEntries(function(t) {
                            t.length ? (d = d.concat(t), l()) : r(d)
                        },
                        a)
                    },
                    d = [];
                    return i = i || "",
                    e.isFile ? e._file ? (e._file.relativePath = i, s.resolve(e._file)) : e.file(function(t) {
                        t.relativePath = i,
                        s.resolve(t)
                    },
                    a) : e.isDirectory ? (n = e.createReader(), l()) : s.resolve([]),
                    s.promise()
                },
                _handleFileTreeEntries: function(e, i) {
                    var n = this;
                    return t.when.apply(t, t.map(e,
                    function(t) {
                        return n._handleFileTreeEntry(t, i)
                    })).pipe(function() {
                        return Array.prototype.concat.apply([], arguments)
                    })
                },
                _getDroppedFiles: function(e) {
                    e = e || {};
                    var i = e.items;
                    return i && i.length && (i[0].webkitGetAsEntry || i[0].getAsEntry) ? this._handleFileTreeEntries(t.map(i,
                    function(t) {
                        var e;
                        return t.webkitGetAsEntry ? (e = t.webkitGetAsEntry(), e && (e._file = t.getAsFile()), e) : t.getAsEntry()
                    })) : t.Deferred().resolve(t.makeArray(e.files)).promise()
                },
                _getSingleFileInputFiles: function(e) {
                    e = t(e);
                    var i, n, o = e.prop("webkitEntries") || e.prop("entries");
                    if (o && o.length) return this._handleFileTreeEntries(o);
                    if (i = t.makeArray(e.prop("files")), i.length) void 0 === i[0].name && i[0].fileName && t.each(i,
                    function(t, e) {
                        e.name = e.fileName,
                        e.size = e.fileSize
                    });
                    else {
                        if (n = e.prop("value"), !n) return t.Deferred().resolve([]).promise();
                        i = [{
                            name: n.replace(/^.*\\/, "")
                        }]
                    }
                    return t.Deferred().resolve(i).promise()
                },
                _getFileInputFiles: function(e) {
                    return e instanceof t && 1 !== e.length ? t.when.apply(t, t.map(e, this._getSingleFileInputFiles)).pipe(function() {
                        return Array.prototype.concat.apply([], arguments)
                    }) : this._getSingleFileInputFiles(e)
                },
                _onChange: function(e) {
                    var i = this,
                    n = {
                        fileInput: t(e.target),
                        form: t(e.target.form)
                    };
                    this._getFileInputFiles(n.fileInput).always(function(o) {
                        n.files = o,
                        i.options.replaceFileInput && i._replaceFileInput(n),
                        i._trigger("change", t.Event("change", {
                            delegatedEvent: e
                        }), n) !== !1 && i._onAdd(e, n)
                    })
                },
                _onPaste: function(e) {
                    var i = e.originalEvent && e.originalEvent.clipboardData && e.originalEvent.clipboardData.items,
                    n = {
                        files: []
                    };
                    i && i.length && (t.each(i,
                    function(t, e) {
                        var i = e.getAsFile && e.getAsFile();
                        i && n.files.push(i)
                    }), this._trigger("paste", t.Event("paste", {
                        delegatedEvent: e
                    }), n) !== !1 && this._onAdd(e, n))
                },
                _onDrop: function(e) {
                    e.dataTransfer = e.originalEvent && e.originalEvent.dataTransfer;
                    var i = this,
                    n = e.dataTransfer,
                    o = {};
                    n && n.files && n.files.length && (e.preventDefault(), this._getDroppedFiles(n).always(function(n) {
                        o.files = n,
                        i._trigger("drop", t.Event("drop", {
                            delegatedEvent: e
                        }), o) !== !1 && i._onAdd(e, o)
                    }))
                },
                _onDragOver: e("dragover"),
                _onDragEnter: e("dragenter"),
                _onDragLeave: e("dragleave"),
                _initEventHandlers: function() {
                    this._isXHRUpload(this.options) && (this._on(this.options.dropZone, {
                        dragover: this._onDragOver,
                        drop: this._onDrop,
                        dragenter: this._onDragEnter,
                        dragleave: this._onDragLeave
                    }), this._on(this.options.pasteZone, {
                        paste: this._onPaste
                    })),
                    t.support.fileInput && this._on(this.options.fileInput, {
                        change: this._onChange
                    })
                },
                _destroyEventHandlers: function() {
                    this._off(this.options.dropZone, "dragenter dragleave dragover drop"),
                    this._off(this.options.pasteZone, "paste"),
                    this._off(this.options.fileInput, "change")
                },
                _setOption: function(e, i) {
                    var n = -1 !== t.inArray(e, this._specialOptions);
                    n && this._destroyEventHandlers(),
                    this._super(e, i),
                    n && (this._initSpecialOptions(), this._initEventHandlers())
                },
                _initSpecialOptions: function() {
                    var e = this.options;
                    void 0 === e.fileInput ? e.fileInput = this.element.is('input[type="file"]') ? this.element: this.element.find('input[type="file"]') : e.fileInput instanceof t || (e.fileInput = t(e.fileInput)),
                    e.dropZone instanceof t || (e.dropZone = t(e.dropZone)),
                    e.pasteZone instanceof t || (e.pasteZone = t(e.pasteZone))
                },
                _getRegExp: function(t) {
                    var e = t.split("/"),
                    i = e.pop();
                    return e.shift(),
                    new RegExp(e.join("/"), i)
                },
                _isRegExpOption: function(e, i) {
                    return "url" !== e && "string" === t.type(i) && /^\/.*\/[igm]{0,3}$/.test(i)
                },
                _initDataAttributes: function() {
                    var e = this,
                    i = this.options,
                    n = this.element.data();
                    t.each(this.element[0].attributes,
                    function(t, o) {
                        var s, a = o.name.toLowerCase();
                        /^data-/.test(a) && (a = a.slice(5).replace(/-[a-z]/g,
                        function(t) {
                            return t.charAt(1).toUpperCase()
                        }), s = n[a], e._isRegExpOption(a, s) && (s = e._getRegExp(s)), i[a] = s)
                    })
                },
                _create: function() {
                    this._initDataAttributes(),
                    this._initSpecialOptions(),
                    this._slots = [],
                    this._sequence = this._getXHRPromise(!0),
                    this._sending = this._active = 0,
                    this._initProgressObject(this),
                    this._initEventHandlers()
                },
                active: function() {
                    return this._active
                },
                progress: function() {
                    return this._progress
                },
                add: function(e) {
                    var i = this;
                    e && !this.options.disabled && (e.fileInput && !e.files ? this._getFileInputFiles(e.fileInput).always(function(t) {
                        e.files = t,
                        i._onAdd(null, e)
                    }) : (e.files = t.makeArray(e.files), this._onAdd(null, e)))
                },
                send: function(e) {
                    if (e && !this.options.disabled) {
                        if (e.fileInput && !e.files) {
                            var i, n, o = this,
                            s = t.Deferred(),
                            a = s.promise();
                            return a.abort = function() {
                                return n = !0,
                                i ? i.abort() : (s.reject(null, "abort", "abort"), a)
                            },
                            this._getFileInputFiles(e.fileInput).always(function(t) {
                                if (!n) {
                                    if (!t.length) return void s.reject();
                                    e.files = t,
                                    i = o._onSend(null, e),
                                    i.then(function(t, e, i) {
                                        s.resolve(t, e, i)
                                    },
                                    function(t, e, i) {
                                        s.reject(t, e, i)
                                    })
                                }
                            }),
                            this._enhancePromise(a)
                        }
                        if (e.files = t.makeArray(e.files), e.files.length) return this._onSend(null, e)
                    }
                    return this._getXHRPromise(!1, e && e.context)
                }
            });
            var i = t.blueimp.fileupload.prototype.options.add;
            t.widget("blueimp.fileupload", t.blueimp.fileupload, {
                options: {
                    processQueue: [],
                    add: function(e, n) {
                        var o = t(this);
                        n.process(function() {
                            return o.fileupload("process", n)
                        }),
                        i.call(this, e, n)
                    }
                },
                processActions: {},
                _processFile: function(e, i) {
                    var n = this,
                    o = t.Deferred().resolveWith(n, [e]),
                    s = o.promise();
                    return this._trigger("process", null, e),
                    t.each(e.processQueue,
                    function(e, o) {
                        var a = function(e) {
                            return i.errorThrown ? t.Deferred().rejectWith(n, [i]).promise() : n.processActions[o.action].call(n, e, o)
                        };
                        s = s.pipe(a, o.always && a)
                    }),
                    s.done(function() {
                        n._trigger("processdone", null, e),
                        n._trigger("processalways", null, e)
                    }).fail(function() {
                        n._trigger("processfail", null, e),
                        n._trigger("processalways", null, e)
                    }),
                    s
                },
                _transformProcessQueue: function(e) {
                    var i = [];
                    t.each(e.processQueue,
                    function() {
                        var n = {},
                        o = this.action,
                        s = this.prefix === !0 ? o: this.prefix;
                        t.each(this,
                        function(i, o) {
                            "string" === t.type(o) && "@" === o.charAt(0) ? n[i] = e[o.slice(1) || (s ? s + i.charAt(0).toUpperCase() + i.slice(1) : i)] : n[i] = o
                        }),
                        i.push(n)
                    }),
                    e.processQueue = i
                },
                processing: function() {
                    return this._processing
                },
                process: function(e) {
                    var i = this,
                    n = t.extend({},
                    this.options, e);
                    return n.processQueue && n.processQueue.length && (this._transformProcessQueue(n), 0 === this._processing && this._trigger("processstart"), t.each(e.files,
                    function(o) {
                        var s = o ? t.extend({},
                        n) : n,
                        a = function() {
                            return e.errorThrown ? t.Deferred().rejectWith(i, [e]).promise() : i._processFile(s, e)
                        };
                        s.index = o,
                        i._processing += 1,
                        i._processingQueue = i._processingQueue.pipe(a, a).always(function() {
                            i._processing -= 1,
                            0 === i._processing && i._trigger("processstop")
                        })
                    })),
                    this._processingQueue
                },
                _create: function() {
                    this._super(),
                    this._processing = 0,
                    this._processingQueue = t.Deferred().resolveWith(this).promise()
                }
            }),
            t.blueimp.fileupload.prototype.options.processQueue.push({
                action: "validate",
                always: !0,
                acceptFileTypes: "@",
                maxFileSize: "@",
                minFileSize: "@",
                maxNumberOfFiles: "@",
                disabled: "@disableValidation"
            }),
            t.widget("blueimp.fileupload", t.blueimp.fileupload, {
                options: {
                    getNumberOfFiles: t.noop,
                    messages: {
                        maxNumberOfFiles: "Maximum number of files exceeded",
                        acceptFileTypes: "File type not allowed",
                        maxFileSize: "File is too large",
                        minFileSize: "File is too small"
                    }
                },
                processActions: {
                    validate: function(e, i) {
                        if (i.disabled) return e;
                        var n, o = t.Deferred(),
                        s = this.options,
                        a = e.files[e.index];
                        return (i.minFileSize || i.maxFileSize) && (n = a.size),
                        "number" === t.type(i.maxNumberOfFiles) && (s.getNumberOfFiles() || 0) + e.files.length > i.maxNumberOfFiles ? a.error = s.i18n("maxNumberOfFiles") : !i.acceptFileTypes || i.acceptFileTypes.test(a.type) || i.acceptFileTypes.test(a.name) ? n > i.maxFileSize ? a.error = s.i18n("maxFileSize") : "number" === t.type(n) && n < i.minFileSize ? a.error = s.i18n("minFileSize") : delete a.error: a.error = s.i18n("acceptFileTypes"),
                        a.error || e.files.error ? (e.files.error = !0, o.rejectWith(this, [e])) : o.resolveWith(this, [e]),
                        o.promise()
                    }
                }
            })
        } (jQuery)
    },
    28 : function(t, e, i) {
        var n = i(13),
        o = i(2),
        s = i(4),
        a = i(29),
        r = i(30),
        l = (i(31), i(18)),
        d = i(32),
        c = s.extend({
            __init: function(t) {
                this.__supr(t),
                this.__initNoticeList(),
                this.__initDownloadQRnode(),
                this.__initCartNum(),
                this.__initUcenterDropDown(),
                this.__initcustmServiceDropDown(),
                this.__initTopbarLink(),
                this.__initNav(),
                this.__initSubNav(),
                this.__initNavItem(),
                new d,
                this.__initMiniCartEvent()
            },
            __initCouponCount: function() {
                r.count().done(function(t) {
                    void 0 != t.data && $(".useableCouponCount").text("(" + t.data.count + ")")
                })
            },
            __initCollectionCount: function() {},
            __initDownloadQRnode: function() {
                var t = o._$getDownloadQRnode(117, 30);
                $(".m-hdAppDownload .j-qrcode").append(t),
                $(".m-hdAppDownload .j-downloadlink").attr("href", o._$getDownloadLink())
            },
            __initNoticeList: function() {
                var t = $(".j-topNoticeList");
                t.css("display", "block"),
                t.each(function() {
                    function e() {
                        setTimeout(function() {
                            clearTimeout(i),
                            n.stop(!0, !0).animate({
                                top: parseInt(n.css("top")) - a
                            },
                            500,
                            function() {
                                var t = parseInt(n.css("top"));
                                t + n.height() <= a && n.css({
                                    top: 0
                                }),
                                i = e()
                            })
                        },
                        5e3)
                    }
                    var i, n = $(this).find(".j-list"),
                    s = n.find(".j-notice"),
                    a = t.height();
                    t.each(function(t, e) {
                        $(e).hasClass("limitLength") && $(e).find(".j-notice").each(function(t, e) {
                            var i = $(e).find(".txt"),
                            n = 20,
                            o = "...";
                            i.text().length > n && i.text(i.text().substring(0, n + 1) + o)
                        })
                    }),
                    s.length > 1 && ($(s[0]).clone().appendTo(n), i = e(), s.each(function(t, e) {
                        var i = $(e).find("a"),
                        n = i.text(),
                        s = i.attr("href") + "&_stat_refer=" + window.location.pathname;
                        i.attr("href", s),
                        "" != n && l({
                            uuid: o.getCookie("yx_aui"),
                            page: window.location.pathname,
                            content: n,
                            key: "notice_board"
                        })
                    }))
                })
            },
            __initCartNum: function() {
                var t = this;
                this.__updateCartNum(),
                $(".j-cart-num").on("refreshCartNum", t.__updateCartNum),
                $(".j-cart-num").on("addCartItem",
                function(e, i) {
                    t.__updateCartNum(),
                    $(".j-mini-cart").is(":animated") || t.__getCartData(t.__miniCartAnimation),
                    "/cart/itemPool" == window.location.pathname && $(window).trigger("updateItemPoolTotalPrice")
                })
            },
            __miniCartAnimation: function() {
                $(".j-mini-cart").slideDown(500,
                function() {
                    this.__delayAnmation = window.setTimeout(function() {
                        $(".j-mini-cart").stop(!0, !1).slideUp(300)
                    },
                    2e3)
                })
            },
            __updateCartNum: function() {
                a.getMiniCartNum().done(function(t) {
                    t.data > 99 ? $(".j-cart-num").html("99+").addClass("icon-normal-badge-l").removeClass("icon-normal-badge") : $(".j-cart-num").html(t.data)
                }).fail(function(t) {})
            },
            __renderMiniCart: function(t) {
                var e = this,
                i = '       <%if(this.groupList.length > 0){%>        <div class="wrap">            <i class="tw-1"></i>            <i class="tw-2"></i>            <div class="g-cartInfo j-cartInfo">           <div class="cartInfo-inner">              <%for(var m=0, item, className = ""; item=this.groupList[m++]; ){%>               <%if(item.promType && item.promType === 105){%>                   <%if(item.suitStatus ===1) {className= " disValidSuit"}else {className = ""}%>                  <%if(m === 1) {className += " firstSuit"}%>                 <div class="suitCart<%=className%>">                      <div class="suitCartHd">                      <span class="suitFlag">套装</span>                        <span class="suitIntro">                          <span class="suitName f-text-overflow f-word-break" title="<%= item.suitName%>"><%= item.suitName%></span>                          <span class="suitCount">x<%= item.suitCount%></span>                      </span>                     <span class="suitPrice">&yen;<%= item.suitTotalPrice.toFixed(2)%></span>                        <span class="deleteSuit j-deleteSuit" data-promid="<%= item.promId%>"><i class="w-icon-normal icon-normal-cart-close" style="width:10px;height:10px;display:inline-block;"></i></span>                    </div>                  <%}%>               <% for(var i=0, data=item.cartItemList; i<data.length; i++){%>                  <div class="cartItem">                    <div class="item item-left">                      <a href="/item/detail?id=<%=data[i].itemId%>"><img src="<%=data[i].pic%>?quality=90&thumbnail=60x60&imageView" /></a>                   <%if(data[i].preSellStatus != null && data[i].preSellStatus ==1){%>                       <%if(data[i].preSellVolume == 0){%>                       <p class="g-sellOut">已售罄</p>                      <%}%>                     <%}else{%>                        <%if(data[i].valid && data[i].sellVolume == 0){%>                         <p class="g-sellOut">已售罄</p>                      <%}%>                       <%if(!data[i].valid){%>                       <p class="g-offShift">已下架</p>                     <%}%>                     <%}%>                 </div>                  <div class="item item-middle">                    <p><a href="/item/detail?id=<%=data[i].itemId%>" title="<%=data[i].itemName%>"><%=data[i].itemName%></a></p>                    <p><span class="specValue" title="<% for(var j=0; j<data[i].specList.length; j++){%> <%=data[i].specList[j].specValue} %>"><% for(var j=0; j<data[i].specList.length; j++){%> <%=data[i].specList[j].specValue} %></a></span> <span class="count">x&nbsp;<%=data[i].cnt%></span></p>                  </div>                  <div class="item item-right">                     <p class="price">&yen;<%= Number(data[i].actualPrice).toFixed(2)%></p>                      <p class="deleteItem j-deleteItem"><i class="w-icon-normal icon-normal-cart-close" style="width:10px;height:10px;display:inline-block;"></i></p>                    <input type="hidden" value="<%=data[i].skuId%>" />                    </div>                </div>                  <%}%>               <%if(item.promType && item.promType === 105){%>                 </div>                  <%}%>             <%}%>             </div>            </div>          <div class="cartBottom">             <div class="totalPrice">商品合计:&nbsp;<span>&yen;<%= Number(this.totalPrice).toFixed(2)%></span></div>             <div class="goToCart"><a class="btn w-button w-button-primary" href="/cart">去购物车结算</a></div>           </div></div>        <%}';
                _data = t.data,
                0 == _data.groupList.length && e.__enableBodyScroll();
                var n = $.jqote(i, _data);
                $("#newMiniCart").html(n),
                e.__scrollTopValue && ($(".j-cartInfo").scrollTop(e.__scrollTopValue), e.__scrollTopValue = 0),
                e.__bindDeleteEvent()
            },
            __getCartData: function(t) {
                var e = a.getMiniCart();
                e.done(function(e) {
                    this.__renderMiniCart(e),
                    t && setTimeout(function() {
                        t()
                    },
                    10)
                }.bind(this))
            },
            __bindDeleteEvent: function() {
                var t = this;
                $(".j-deleteItem").on("click",
                function() {
                    var e = $(this).parent().children("input").val();
                    t.__scrollTopValue = $(".j-cartInfo").scrollTop(),
                    t.__deleteCartItem(e)
                }),
                $(".j-deleteSuit").on("click",
                function(e) {
                    var i;
                    t.__scrollTopValue = $(".j-cartInfo").scrollTop(),
                    i = $(e.currentTarget).attr("data-promid"),
                    t.__deleteCartSuitItem(i)
                })
            },
            __handleCartHover: function() {
                return this.__urlHasCart() ? !1 : (this.__getCartData(), this.__updateCartNum(), void $(".j-mini-cart").show())
            },
            __forbidBodyScroll: function() {
                var t = $("body").width();
                $("body").css("overflow", "hidden");
                var e = $("body").width();
                $("body").css("marginRight", e - t),
                $(".m-funcTab-fixed").css("paddingRight", e - t),
                this.__fixedToolRight = Number.parseInt($(".m-fixedtool").css("right")),
                $(".m-fixedtool").css("right", this.__fixedToolRight + e - t)
            },
            __enableBodyScroll: function() {
                $("body").css({
                    overflow: "auto",
                    marginRight: 0
                }),
                $(".m-funcTab-fixed").css("paddingRight", 0),
                $(".m-fixedtool").css("right", this.__fixedToolRight)
            },
            __urlHasCart: function() {
                var t, e = window.location.pathname;
                return t = e.indexOf("/cart") >= 0 && e.indexOf("/itemPool") < 0 ? !0 : !1
            },
            __initMiniCartEvent: function() {
                var t = this;
                $(".j-button-cart, .j-cart").on("mouseenter",
                function() {
                    var e = $(".j-mini-cart").css("display");
                    return "block" == e ? !1 : void t.__handleCartHover()
                }),
                $(".j-button-cart, .j-cart").on("mouseleave",
                function(t) {
                    var e = $(t.relatedTarget);
                    return e.hasClass("j-mini-cart") ? !1 : ($(".j-cartInfo").scrollTop(0), void $(".j-mini-cart").hide())
                }),
                $(".j-mini-cart").on("mouseleave",
                function(e) {
                    t.__enableBodyScroll();
                    var i = $(e.relatedTarget);
                    return i.hasClass("cart-blackcart") ? !1 : ($(".j-cartInfo").scrollTop(0), void $(".j-mini-cart").hide())
                }),
                $(".j-mini-cart").on("mouseenter",
                function() {
                    t.__forbidBodyScroll(),
                    $(this).stop(!0),
                    $(this).show(),
                    window.clearTimeout(this.__delayAnmation)
                })
            },
            __deleteCartItem: function(t, e) {
                var i = a.deleteCart({
                    selectedSku: JSON.stringify({
                        skuList: [{
                            skuId: t,
                            gift: !1,
                            promId: 0,
                            type: 0
                        }]
                    })
                });
                i.then(function() {
                    this.__getCartData(),
                    this.__updateCartNum()
                }.bind(this),
                function(t, e, i) {
                    n.notify(e || "删除购物车失败", "error"),
                    this.__getCartData()
                }.bind(this))
            },
            __deleteCartSuitItem: function(t) {
                var e = a.deleteCart({
                    selectedSku: JSON.stringify({
                        skuList: [{
                            promId: t,
                            type: 1
                        }]
                    })
                });
                e.then(function() {
                    this.__getCartData(),
                    this.__updateCartNum()
                }.bind(this),
                function(t, e, i) {
                    n.notify(e || "删除购物车失败", "error"),
                    this.__getCartData()
                }.bind(this))
            },
            __initUcenterDropDown: function() {
                var t = null,
                e = this;
                $(".js-userCenterToggle").on("click",
                function(t) {
                    t.stopPropagation()
                }),
                $(".js-userCenter").hover(function() {
                    e.__initCouponCount(),
                    e.__initCollectionCount(),
                    t = setTimeout(function() {
                        $(this).find(".js-userCenterToggle").trigger("show.jq-dropdown")
                    }.bind(this), 200)
                },
                function() {
                    clearTimeout(t),
                    $(this).find(".js-userCenterToggle").trigger("hide.jq-dropdown")
                })
            },
            __initcustmServiceDropDown: function() {
                var t, e, i;
                e = $(".custmService"),
                i = e.find(".js-custmServiceToggle"),
                e.on("click",
                function(t) {
                    t.stopPropagation()
                }),
                e.hover(function() {
                    t = setTimeout(function() {
                        i.trigger("show")
                    },
                    200)
                },
                function() {
                    clearTimeout(t),
                    i.trigger("hide")
                }),
                $(".j-onlineService").click(function(t) {
                    o._$openKefu()
                }),
                e.delegate(".item", "click",
                function(t) {
                    i.trigger("hide")
                })
            },
            __initTopbarLink: function() {
                var t = $(".j-topRegister");
                t.length && t.attr("href", t.data("href") + "&url=" + encodeURIComponent(window.location.href)),
                $(".j-topLogin").attr("href", "/u/login?callback=" + encodeURIComponent(window.location.href.replace(window.location.protocol + "//" + window.location.host, "")))
            },
            __initNav: function() {
                var t = $("#js-funcTabWrap"),
                e = $("#js-funcTab");
                t.height(e.height());
                var i = (e.find(".j-tab-logo").hasClass("tab-log-activity"),
                function() {
                    $(document).scrollTop() >= 192 ?
                    function() {
                        e.addClass("m-funcTab-fixed")
                    } () : function() {
                        e.removeClass("m-funcTab-fixed")
                    } ()
                });
                $(window).on("scroll.miniNav", i),
                i()
            },
            __initSubNav: function() {
                var t = this;
                $(window).on("resize.cateCard",
                function() {
                    t.__resizeCatecard()
                })
            },
            __resizeCatecard: function() {
                var t = $("body"),
                e = $(".j-nav-cateCard"),
                i = t.width();
                e.css({
                    width: i,
                    left: -i / 2
                })
            },
            __initNavItem: function() {
                var t = this;
                t.__changeWidthFlag = 0,
                $(".j-nav-item").mouseenter(function(e) {
                    t.__changeWidthFlag ? t.__changeWidthFlag++:t.__resizeCatecard();
                    var i = $(this).find(".j-nav-dropdown");
                    i.stop(!0, !0).fadeIn(200)
                }),
                $(".j-nav-item").mouseleave(function(t) {
                    var e = $(this).find(".j-nav-dropdown"),
                    i = $(t.relatedTarget);
                    if (i.hasClass("j-nav-item")) {
                        var n = i.find(".j-nav-dropdown");
                        e.stop(!0, !0).fadeOut(0),
                        n.stop(!0, !0).fadeIn(0)
                    } else e.stop(!0, !0).fadeOut(200)
                })
            },
            __initSearch: function() {
                function t(t) {
                    p = "",
                    "placeholder" in document.createElement("input") && l.attr("placeholder", ""),
                    s.call(this, t)
                }
                function e() {
                    var t = o.escapeHTML($.trim(l.val()) || $.trim(l.attr("placeholder")));
                    "" != t && (u.__suggestRender({
                        operate: "add"
                    },
                    t), "" != p && void 0 != p && "" == $.trim(l.val()) ? top.location.href = p: top.location.href = h + "?keyword=" + encodeURIComponent(t) + "#page=1&sortType=0&descSorted=true&categoryId=0&matchType=0")
                }
                function i(t) {
                    var e = t.find(".hl-item-txt").text();
                    if (e = o.escapeHTML(e), u.__suggestRender({
                        operate: "add"
                    },
                    e), t.hasClass("hl-itemHot")) {
                        var i = t.data("url");
                        if (i) return i = currentPageIsIndex ? i.indexOf("?") > -1 ? i + "&_stat_search=hot&_stat_referer=index": i + "?_stat_search=hot&_stat_referer=index": i.indexOf("?") > -1 ? i + "&_stat_search=hot": i + "?_stat_search=hot",
                        i.indexOf("keyword") < 0 && (i = i + "&keyword=" + encodeURIComponent(e)),
                        void(top.location.href = i)
                    }
                    top.location.href = h + "?keyword=" + encodeURIComponent(e) + "#page=1&sortType=0&descSorted=true&categoryId=0&matchType=0"
                }
                function n() {
                    var t = $(this).val() || "";
                    "" != t && SearchService.searchAutoComplete({
                        keywordPrefix: t
                    }).done(function(t) {
                        u.__suggestRender({
                            operate: "autoComplete",
                            $content: r
                        },
                        t.data || [])
                    })
                }
                function s(t) {
                    if (38 != t.keyCode && 40 != t.keyCode && 13 != t.keyCode) {
                        var e = $(this).val() || "";
                        "" == e ? u.__suggestRender({
                            $content: r
                        }) : n.apply(this)
                    }
                }
                var a = $("#j-search");
                if (0 != a.length) {
                    var r = a.find(".js-ppnl-content"),
                    l = a.find(".j-searchInput"),
                    d = a.find(".j-searchButton"),
                    c = a.find(".j-searchSuggest"),
                    u = this,
                    h = "/search",
                    p = d.data("searchurl");
                    this.__hotKeyWordList = [],
                    SearchService.getHotKeyword().done(function(t) {
                        u.__hotKeyWordList = t.data
                    }),
                    l.placeholder(),
                    Suggest.inputSuggest(c, l, {
                        callback: i
                    }),
                    d.on("click", e),
                    c.on("click mousedown", ".j-delete",
                    function(t) {
                        return u.__suggestRender({
                            operate: "delete",
                            $content: r
                        },
                        $(t.currentTarget).data("index")),
                        !1
                    }),
                    c.on("click mousedown", ".j-deleteAll",
                    function(t) {
                        return u.__suggestRender({
                            operate: "deleteAll",
                            $content: r
                        }),
                        !1
                    }),
                    l.on("keydown",
                    function(t) {
                        13 == t.keyCode && 0 == c.find(".hl-item-selected").length && e()
                    }).on("keyup", s).on("focus", t).on("blur",
                    function() {
                        "" == l.val() && (l.attr("placeholder", l.data("defaultword")), p = d.data("searchurl"))
                    }),
                    $(document).on("mousemove.search",
                    function(t) {
                        0 == $(t.target).parents("#j-search").length && _suggest.hideSuggest(c)
                    })
                }
            },
            __suggestRender: function(t, e) {
                var i = $.extend({},
                {
                    operate: "init",
                    template: '<ul class="m-list">                    <%if(this.suggestHistory.length>0){%>                     <%if("' + t.operate + '"!="autoComplete"){%>                        <li class="top-item">                           <span class="top-item-txt">最近搜索</span>                          <span class="w-icon-normal icon-normal-deleteAll j-deleteAll"></span>                       </li>                       <%}%>                     <%}%>                   <% var maxLen = "' + t.operate + '"!="autoComplete" ? 5 :10;                      var len = this.suggestHistory.length < maxLen ? this.suggestHistory.length : maxLen%>                       <%for (var i = 0;i<len;i++){%>                    <li class="hl-item">                        <span class="hl-item-txt"><%= this.suggestHistory[i]%></span>                       <%if("' + t.operate + '"!="autoComplete"){%><span class="w-icon-normal icon-normal-delete j-delete" data-index="<%=i%>"></span> <%}%>                   </li>                   <%}%>                   <%if("' + t.operate + '"!="autoComplete"){%>                    <%if(this.hotKeyWordList.length>0){%>                   <li class="top-itemHot" style="margin-top:5px;">                      <span class="top-item-txt">大家都在搜</span>                   </li>                   <%for (var i = 0;i< this.hotKeyWordList.length;i++){%>                      <li class="hl-item hl-itemHot" data-url=<%=this.hotKeyWordList[i].schemeUrl%>>                          <span class="hl-item-txt"><%=this.hotKeyWordList[i].keyword%></span>                    </li>                   <%}}%>                      <%}%></ul>'
                },
                t),
                n = JSON.parse(unescape(o.getCookie("_search_history"))) || [];
                switch (i.operate) {
                case "add":
                    if ("string" == typeof e && "" != $.trim(e)) {
                        for (var s = 0; s < n.length; s++) n[s] == e && n.splice(s, 1);
                        n.length >= 5 && n.splice(4, 1),
                        n.unshift(e)
                    }
                    break;
                case "delete":
                    "number" == typeof e && e >= 0 && 9 >= e && n.splice(e, 1);
                    break;
                case "deleteAll":
                    n = [];
                    break;
                case "autoComplete":
                    n = e || []
                }
                "autoComplete" != i.operate && o.setCookie("_search_history", JSON.stringify(n), 365),
                i.$content && (i.$content.html($.jqote(i.template, {
                    suggestHistory: n,
                    hotKeyWordList: this.__hotKeyWordList
                })), 0 == n.length && 0 == this.__hotKeyWordList.length ? Suggest.hideSuggest($("#j-search").find(".j-searchSuggest")) : Suggest.showSuggest($("#j-search").find(".j-searchSuggest"), $("#j-search").find(".j-searchInput")))
            }
        });
        t.exports = c
    },
    29 : function(t, e, i) {
        var n = i(9),
        o = {
            add: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/add.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            updateByNum: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/updateByNum.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            updateByCheck: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/updateByCheck.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            selectAll: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/selectAll.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            choosePromotion: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/choosePromotion.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            updateSkuSpec: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/updateSkuSpec.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            deleteCart: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/delete.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "POST"
                }),
                i
            },
            getCarts: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/getCarts.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    }
                }),
                i
            },
            getMiniCart: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/getMiniCart.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    }
                }),
                i
            },
            selectGift: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/selectGift.json",
                    data: e,
                    contentType: "application/json",
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    }
                }),
                i
            },
            getMiniCartNum: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/getMiniCartNum.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            getRcmdItems: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/rcmd.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            addSuit: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/addSuit.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            updateSuitCount: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/updateSuitCount.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            updateSuitCheck: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/updateSuitCheck.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    },
                    type: "GET"
                }),
                i
            },
            addSuit: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/cart/addSuit.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e, n)
                    },
                    type: "GET"
                }),
                i
            }
        };
        t.exports = o
    },
    30 : function(t, e, i) {
        var n = i(9),
        o = {
            list: function(t) {
                var e = $.Deferred();
                return n.ajax({
                    url: "/xhr/coupon/list.json",
                    data: t,
                    success: function(t) {
                        e.resolve(t)
                    },
                    error: function(t, i, n) {
                        e.reject(t, i, n)
                    },
                    type: "GET"
                }),
                e
            },
            del: function(t) {
                var e = $.Deferred();
                return n.ajax({
                    url: "/xhr/coupon/delete.json",
                    data: {
                        id: t
                    },
                    success: function(t) {
                        e.resolve(t)
                    },
                    error: function(t, i, n) {
                        e.reject(t, i, n)
                    },
                    type: "POST"
                }),
                e
            },
            activate: function(t) {
                var e = $.Deferred();
                return n.ajax({
                    url: "/xhr/coupon/activate.json",
                    data: {
                        activationCode: t
                    },
                    success: function(t) {
                        var i = {
                            1 : "兑换成功",
                            2 : "此优惠码已被兑换",
                            3 : "优惠码错误",
                            4 : "兑换次数超限",
                            5 : "此兑换码为新用户专享",
                            6 : "需要绑定手机",
                            7 : "该帐号下手机号曾与" + t.data.countInfo + "绑定领取过",
                            8 : "该帐号下手机号曾与" + t.data.countInfo + "绑定消费过",
                            99 : "优惠码已过期"
                        };
                        t.data = {
                            status: t.data.status,
                            tipMsg: i[t.data.status] || "优惠码错误"
                        },
                        e.resolve(t)
                    },
                    error: function(t, i, n) {
                        e.reject(t, i, n)
                    },
                    type: "POST"
                }),
                e
            },
            count: function() {
                var t = $.Deferred();
                return n.ajax({
                    url: "/xhr/coupon/countUnused.json",
                    success: function(e) {
                        t.resolve(e)
                    },
                    error: function(e, i, n) {
                        t.reject(e, i, n)
                    },
                    type: "POST"
                }),
                t
            }
        };
        t.exports = o
    },
    31 : function(t, e, i) {
        var n = i(9),
        o = {
            _ajax: function(t, e, i, o) {
                var s = e || {},
                a = $.Deferred();
                return n.ajax({
                    url: t,
                    data: s,
                    success: function(t) {
                        a.resolve(t)
                    },
                    error: function(t, e, i) {
                        a.reject(t, e, i)
                    },
                    type: i || "POST",
                    contentType: o || ""
                }),
                a
            },
            getCollectNum: function(t) {
                return this._ajax("/xhr/item/countItemCollection.json", t, "GET")
            },
            setItemCollect: function(t) {
                return this._ajax("/xhr/item/collectItem.json", t, "GET")
            },
            getCollectList: function(t) {
                return this._ajax("/xhr/item/itemCollectionList.json", t, "GET")
            },
            topicCollectionList: function(t) {
                return this._ajax("/xhr/topic/topicCollectionList.json", t, "GET")
            },
            deleteCollect: function(t) {
                return this._ajax("/xhr/topic/deleteCollect.json", t, "POST")
            }
        };
        t.exports = o
    },
    32 : function(t, e, i) {
        var n = i(4),
        o = i(33),
        s = i(34),
        a = i(2),
        r = i(10),
        l = n.extend({
            __init: function(t) {
                this.__supr(t),
                this.__initElement() && (this.__initEvent(), this.__initData())
            },
            __initElement: function() {
                var t = $("#j-search");
                if (0 == t.length) return ! 1;
                this.__$sInput = t.find(".j-searchInput"),
                this.__$sButton = t.find(".j-searchButton"),
                this.__$sSuggest = t.find(".j-searchSuggest"),
                this.__$sDefault = t.find(".j-showDefaultWord");
                return $ssContent = this.__$ssContent = t.find(".j-ssContent"),
                !0
            },
            __initEvent: function() {
                var t = this;
                this.__$sInput.on("keydown", $.proxy(this.__searchKeydownEvent, this)).on("focus", $.proxy(this.__initSearchInput, this)).on("blur", $.proxy(this.__searchBlurEvent, this)).on("input propertychange", $.proxy(this.__judgeSuggestRender, this)),
                this.__$sButton.on("click", $.proxy(this.__search, this)),
                s.inputSuggest(this.__$sSuggest, this.__$sInput, {
                    callback: $.proxy(this.__selectedCallBack, this)
                }),
                this.__$sSuggest.on("mousedown", ".j-delete",
                function(e) {
                    return t.__updateSuggestCookie("delete", $(e.currentTarget).data("index")),
                    t.__suggestRender("history&hot"),
                    !1
                }),
                this.__$sSuggest.on("mousedown", ".j-deleteAll",
                function() {
                    return t.__updateSuggestCookie("deleteAll"),
                    t.__suggestRender("history&hot"),
                    !1
                }),
                $("#j-search").on("mouseleave",
                function() {
                    setTimeout(function() {
                        s.hideSuggest(t.__$sSuggest)
                    },
                    500)
                }),
                this.__$sDefault.bind("click",
                function() {
                    var e = t.__$sInput.is(":focus");
                    0 == e && t.__$sInput.trigger("focus")
                })
            },
            __initData: function() {
                this.__getHotKeywordList(),
                this.__getPaintedEggshell()
            },
            __getHotKeywordList: function() {
                this.__hotKeywordList = [],
                o.getHotKeyword().done(function(t) {
                    this.__hotKeywordList = t.data
                }.bind(this))
            },
            __getPaintedEggshell: function() {
                this.__colorfulEggWords = [],
                o.getPaintedEggshellWords().done(function(t) {
                    this.__colorfulEggWords = t.data
                }.bind(this))
            },
            __showPaintedEggshell: function(t) {
                a.setCookie("showPaintedEggshell", !1);
                for (var e = 0; e < this.__colorfulEggWords.length; e++) if (this.__colorfulEggWords[e].keyword === t) {
                    a.setCookie("showPaintedEggshell", !0);
                    break
                }
            },
            __searchKeydownEvent: function(t) {
                13 == t.keyCode && 0 == this.__$sSuggest.find(".hl-item-selected").length && this.__search()
            },
            __searchBlurEvent: function() {
                "" == this.__$sInput.val() && this.__$sDefault.show(),
                this.__getHotKeywordList()
            },
            __initSearchInput: function(t) {
                this.__judgeSuggestRender.call(this, t)
            },
            __judgeSuggestRender: function(t) {
                if (38 != t.keyCode && 40 != t.keyCode && 13 != t.keyCode) {
                    var e = this.__$sInput.val();
                    "" == e ? (this.__$sDefault.show(), this.__suggestRender("history&hot")) : (this.__$sDefault.hide(), this.__autoComplete(e))
                }
            },
            __autoComplete: function(t) {
                "" != t && void 0 != t && o.searchAutoComplete({
                    keywordPrefix: t
                }).done(function(t) {
                    this.__suggestRender("autoComplete", t.data || [])
                }.bind(this))
            },
            __selectedCallBack: function(t) {
                var e = t.find(".hl-item-txt").text(),
                i = t.find(".hl-item-txt").data("type");
                e = a.escapeHTML(e),
                this.__search(e, i)
            },
            __search: function(t, e) {
                var i = null,
                n = null,
                o = "",
                s = null,
                r = $.trim(this.__$sDefault.text()),
                l = $.trim(this.__$sInput.val()),
                t = "string" == typeof t ? $.trim(t) : "",
                d = a.escapeHTML(t || l || r);
                if ("" != d) {
                    if (t ? e = e: l ? e = "userhand": r && (e = "default"), this.__showPaintedEggshell(d), s = this.__getKeywordFromList(d, this.__colorfulEggWords), s && s.schemeUrl) return void(top.location.href = this.__addStatParams(s.schemeUrl, e, d));
                    if (i = this.__getKeywordFromList(d, this.__hotKeywordList), i && i.schemeUrl) return void(top.location.href = this.__addStatParams(i.schemeUrl, e, d));
                    if (n = this.__getDefaultword(d), n && n.contentUrl) return void(top.location.href = this.__addStatParams(n.contentUrl, e, d));
                    this.__updateSuggestCookie("add", d),
                    o = (new Date).getTime(),
                    top.location.href = this.__addStatParams("/search?keyword=" + encodeURIComponent(d), e) + "&timestamp=" + o + "#page=1&sortType=0&descSorted=true&categoryId=0&matchType=0"
                }
            },
            __getDefaultword: function(t) {
                var e = null;
                return $.each(window.defaultwordList,
                function(i, n) {
                    return n.content == t ? (e = n, !1) : void 0
                }.bind(this)),
                e
            },
            __getKeywordFromList: function(t, e) {
                var i = null;
                return $.each(e,
                function(e, n) {
                    return n.keyword == t ? (i = n, !1) : void 0
                }.bind(this)),
                i
            },
            __addStatParams: function(t, e, i) {
                var n = {};
                return t && (n = r.getUrlParams(t), t = r.appendURL(t, {
                    _stat_search: e
                }), currentPageIsIndex && (t = r.appendURL(t, {
                    _stat_referer: "index"
                })), void 0 === n.keyword && void 0 !== i && (t = r.appendURL(t, {
                    keyword: encodeURIComponent(i)
                }))),
                t
            },
            __updateSuggestCookie: function(t, e) {
                var i = JSON.parse(unescape(a.getCookie("_search_history"))) || [];
                switch (t) {
                case "add":
                    if ("string" == typeof e && "" != $.trim(e)) {
                        for (var n = 0; n < i.length; n++) i[n] == e && i.splice(n, 1);
                        i.length > 4 && i.splice(4, 1),
                        i.unshift(e)
                    }
                    break;
                case "delete":
                    "number" == typeof e && e >= 0 && 9 >= e && i.splice(e, 1);
                    break;
                case "deleteAll":
                    i = []
                }
                a.setCookie("_search_history", JSON.stringify(i), 365)
            },
            __suggestRender: function(t, e) {
                var i = "",
                n = e || [],
                o = JSON.parse(unescape(a.getCookie("_search_history"))) || [],
                r = this.__hotKeywordList,
                l = '<ul class="m-list">                                <% var len = this.autoCompleteList.length < 10 ? this.autoCompleteList.length : 10;                                 for (var i = 0;i<len;i++){%>                                        <li class="hl-item">                                            <span class="hl-item-txt" data-type="userhand"><%= this.autoCompleteList[i]%></span>                                        </li>                                   <%}%></ul>',
                d = '<ul class="m-list">                                <%if(this.suggestHistory.length>0){%>                                   <li class="top-item">                                       <span class="top-item-txt">最近搜索</span>                                      <span class="w-icon-normal icon-normal-deleteAll j-deleteAll"></span>                                   </li>                                   <% var len = this.suggestHistory.length < 5 ? this.suggestHistory.length : 5;                                       for (var i = 0;i<len;i++){%>                                            <li class="hl-item">                                                <span class="hl-item-txt" data-type="history"><%= this.suggestHistory[i]%></span>                                               <span class="w-icon-normal icon-normal-delete j-delete" data-index="<%=i%>"></span>                                         </li>                                       <%}%>                               <%}%>                               <%if(this.hotKeywordList.length>0){%>                                   <li class="top-itemHot" style="margin-top:5px;">                                      <span class="top-item-txt">大家都在搜</span>                                   </li>                                   <%for (var i = 0;i< this.hotKeywordList.length;i++){%>                                      <li class="hl-item hl-itemHot <%if(this.hotKeywordList[i].highlight == 1){%>highlight<%}%>" data-url=<%=this.hotKeywordList[i].schemeUrl%>>                                         <span class="hl-item-txt" data-type="hot"><%=this.hotKeywordList[i].keyword%></span>                                        </li>                                   <%}%>                               <%}%></ul>';
                "autoComplete" == t ? i = $.jqote(l, {
                    autoCompleteList: n
                }) : "history&hot" == t && (i = $.jqote(d, {
                    suggestHistory: o,
                    hotKeywordList: r
                })),
                this.__$ssContent.html(i),
                "autoComplete" == t && 0 == n.length || "history&hot" == t && 0 == o.length && 0 == r.length ? s.hideSuggest(this.__$sSuggest) : s.showSuggest(this.__$sSuggest, this.__$sInput)
            }
        });
        t.exports = l
    },
    33 : function(t, e, i) {
        var n = i(9),
        o = {
            _ajax: function(t, e, i, o) {
                var s = e || {},
                a = $.Deferred();
                return n.ajax({
                    url: t,
                    data: s,
                    success: function(t) {
                        a.resolve(t)
                    },
                    error: function(t, e, i) {
                        a.reject(t, e, i)
                    },
                    type: i || "POST",
                    contentType: o || ""
                }),
                a
            },
            listByItemSearch: function(t) {
                return this._ajax("/xhr/item/listByItemSearch.json", t, "GET")
            },
            searchAutoComplete: function(t) {
                return this._ajax("/xhr/search/searchAutoComplete.json", t, "GET")
            },
            search: function(t) {
                return this._ajax("/xhr/search/search.json", t, "GET")
            },
            getHotKeyword: function(t) {
                return this._ajax("/xhr/search/queryHotKeyWord.json", t, "GET")
            },
            rcmd: function(t) {
                return this._ajax("/xhr/search/rcmd.json", t, "GET")
            },
            orderSearch: function(t) {
                return this._ajax("/xhr/search/orderSearch.json", t, "GET")
            },
            getPaintedEggshellWords: function(t) {
                return this._ajax("/xhr/search/colorfulEgg.json", t, "GET")
            }
        };
        t.exports = o
    },
    34 : function(t, e, i) {
        var n = i(7);
        _suggest = {
            inputSuggest: function(t, e, i, n) {
                function o(e) {
                    t.removeClass("js-dropmenu-ppnl"),
                    t.removeClass("f-ani-ppnlmenu"),
                    t.addClass("f-hide"),
                    i.callback && "function" == typeof i.callback && i.callback(e)
                }
                function s() {
                    var e = t.find(".hl-item-selected:first");
                    e.length > 0 && o(e)
                }
                var a = e;
                if (!a.data("__bindInputsuggest")) {
                    if (a.data("__bindInputsuggest", !0), "INPUT" === a.get(0).tagName) var e = a;
                    else var e = a.find('input[type="text"]');
                    t.delegate(".hl-item", "mouseover",
                    function(t) {
                        var e = $(t.currentTarget);
                        e.siblings(".hl-item-hover").removeClass("hl-item-hover"),
                        e.addClass("hl-item-hover")
                    }),
                    t.delegate(".hl-item", "mouseout",
                    function(t) {
                        var e = $(t.currentTarget);
                        e.removeClass("hl-item-hover")
                    }),
                    t.delegate(".hl-item", "mousedown",
                    function(t) {
                        var e = $(t.currentTarget);
                        o(e)
                    }),
                    e.bind("keydown",
                    function(e) {
                        if (13 == e.keyCode) s();
                        else {
                            if (38 == e.keyCode) {
                                var i = 0 == t.find(".hl-item-selected:first").length ? t.find(".hl-item:first") : t.find(".hl-item-selected:first"),
                                n = i.prevAll(":visible:first");
                                return n.hasClass("top-itemHot") && (n = t.find(".top-itemHot").prevAll(":visible:first")),
                                n.length > 0 && !n.hasClass("top-item") && !n.hasClass("top-item") && (n.addClass("hl-item-selected"), i.removeClass("hl-item-selected")),
                                !1
                            }
                            if (40 == e.keyCode) {
                                var i = 0 == t.find(".hl-item-selected:first").length ? t.find(".hl-item:first") : t.find(".hl-item-selected:first"),
                                o = i.nextAll(":visible:first");
                                return o.hasClass("top-itemHot") && (o = t.find(".top-itemHot").nextAll(":visible:first")),
                                i.hasClass("hl-item-selected") ? o.length > 0 && (o.addClass("hl-item-selected"), i.removeClass("hl-item-selected")) : i.addClass("hl-item-selected"),
                                !1
                            }
                        }
                    }),
                    e.bind("blur",
                    function() {
                        _suggest.hideSuggest(t)
                    }),
                    e.bind("focus",
                    function(e) {
                        return 13 == e.keyCode || 38 == e.keyCode || 40 == e.keyCode ? !1 : void _suggest.showSuggest(t, a, n)
                    })
                }
            },
            hideSuggest: function(t) {
                t.removeClass("js-dropmenu-ppnl"),
                t.removeClass("f-ani-ppnlmenu"),
                t.addClass("f-hide")
            },
            showSuggest: function(t, e, i) {
                return t.find(".hl-item").each(function(t, e) {
                    var i = $(e);
                    i.removeClass("hl-item-hover hl-item-selected")
                }),
                0 == t.find(".hl-item").length ? (_suggest.hideSuggest(t), !1) : (t.removeClass("f-hide"), t.addClass("js-dropmenu-ppnl"), setTimeout(function() {
                    t.addClass("f-ani-ppnlmenu")
                },
                30), i = $.extend({
                    axis: "left,bottom"
                },
                i), "border-box" === (e.css("box-sizing") || e.css("-webkit-box-sizing") || e.css("-moz-sizing")) ? t.css("width", e.outerWidth()) : t.css("width", e.width()), void n.dockV(t, e, i))
            }
        },
        t.exports = _suggest
    },
    35 : function(t, e, i) {
        var n = i(9),
        o = {
            confirm: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/welcome/confirm.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    }
                }),
                i
            }
        };
        t.exports = o
    },
    36 : function(t, e, i) {
        var n = i(9),
        o = {
            _ajax: function(t, e, i) {
                var o = e || {},
                s = $.Deferred();
                return n.ajax({
                    url: t,
                    data: o,
                    success: function(t) {
                        s.resolve(t)
                    },
                    error: function(t, e, i) {
                        s.reject(t, e, i)
                    },
                    type: i || "POST"
                }),
                s
            },
            show: function(t) {
                return this._ajax("/xhr/gift/newUserGift/show.json", t, "POST")
            },
            isNewUser: function(t) {
                return this._ajax("/xhr/gift/newUserGift/isNewUser.json", t, "GET")
            },
            get: function(t) {
                return this._ajax("/xhr/gift/newUserGift/get.json", t, "POST")
            }
        };
        t.exports = o
    },
    37 : function(t, e, i) {
        var n = i(4),
        o = i(30),
        s = i(36),
        a = i(38),
        r = i(2),
        l = i(10),
        d = i(13);
        i(6)($);
        var c = '<script id="j-template-newGiftModal" type="x-jqote-template">    <div>     <div class="title">         <div class="border"></div>        <div class="text">新人专享好礼</div>        </div>      <div class="desc">          感谢您访问网易严选，我们为您准备了一份专享礼物     </div>      <img src="<%=this.itemPic%>?imageView&quality=90&thumbnail=520y296" alt="" />       <div class="info">          <div class="left">              <p class="manuDesc"><%=this.manuDesc%></p>              <p class="itemName"><%if(this.pieceNum > 0){%><%=this.pieceNum%><%=this.pieceUnitDesc%>装<%if(this.colorNum < 2){%>&nbsp;&nbsp;<%}%><%}%><%if(this.pieceNum > 0 && this.colorNum > 1){%>/<%}%><%if(this.colorNum > 1){%><%=this.colorNum%>色可选&nbsp;&nbsp;<%}%><%= this.itemName %></p>               <p class="price">                   <span class="retailPrice">&yen;&nbsp;<span class="yen"><%=this.retailPrice%></span></span>                  <% if(this.comparePrice!=null){%>                   <span class="comparePrice">参考价：&yen;<%=this.comparePrice%>*</span>                  <%}%>               </p>            </div>          <div class="right">             <a href="javascript:void(0);" class="w-button w-button-primary w-button-xl btn j-ok">新人领券再减&yen;<%=this.reducePrice%></a>               <a href="/item/detail?id=<%=this.itemId%>" class="w-button w-button-primary w-button-xl btn j-link" style="display:none;">立即购买</a>              <a href="/gift/newUserGift?_stat_referer=newUserGiftModal" class="more">更多新用户优惠&gt;&gt;</a>         </div>      </div>    </div></script>',
        u = n.extend({
            __config: function(t) {
                r._$extend(t, {
                    obj: {}
                })
            },
            __init: function(t) {
                this.__supr(t),
                this.__initNode(),
                null == r.getCookie("yx_showNewUserEntrance") && r.setCookie("yx_showNewUserEntrance", "true", 100)
            },
            __initNode: function() {
                var t = this.__data.obj;
                this.__body = $($(c).jqote(t)).showDialog({
                    clsName: "m-newGiftModal",
                    onclose: function() {
                        this.__onCancelCallback()
                    }.bind(this)
                });
                var e = this.__okBtn = this.__body.find(".j-ok").first();
                this.__linkBtn = this.__body.find(".j-link").first();
                e.click($.proxy(this.__onOkCallback, this))
            },
            __onCancelCallback: function() {
                this._$emit("onCancel")
            },
            __onOkCallback: function() {
                var t = this,
                e = {
                    _stat_referer: "newUserGiftModal",
                    _stat_area: "giftItem",
                    _stat_id: t.__data.obj.itemId || 0
                };
                a.checklogin().then(function() {
                    s.isNewUser(e),
                    o.activate(t.__data.obj.activationCode).done(function(e) {
                        var i = e.data;
                        1 == i.status ? (d.notify("领取成功", "error"), t._$emit("onOk"), t.__okBtn.hide(), t.__linkBtn.show()) : 6 == i.status ? location.href = "/yxhdcn/forNewUserGift?code=" + t.__data.obj.activationCode: d.notify(i.tipMsg, "error")
                    })
                },
                function() {
                    location.href = "/u/login?callback=" + encodeURIComponent(l.appendURL("/yxhdcn/forNewUserGift?code=" + t.__data.obj.activationCode, e))
                })
            }
        });
        t.exports = u
    },
    38 : function(t, e, i) {
        var n = i(9),
        o = {
            checklogin: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/common/checklogin.json",
                    data: e,
                    success: function(t) {
                        t.data ? i.resolve() : i.reject()
                    },
                    error: function(t, e, n) {
                        i.reject(t, e, n)
                    },
                    type: "GET"
                }),
                i
            }
        };
        t.exports = o
    },
    39 : function(t, e, i) {
        var n = i(4);
        i(40),
        i(6)($);
        var o = '<script id="j-template-oldUserModal" type="x-jqote-template">      <div>           <div class="modalHead">             <div class="firstLine">4.1—4.11&nbsp;网易严选1周年庆手机专享价会场</div>              <div class="secondLine">22款商品<strong>限时秒杀</strong>，百余款商品<strong>低至5折</strong></div>             <div class="modalIcon"><i class="w-icon-normal icon-normal-close-modal j-modalClose"></i></div>         </div>          <div class="modalBody">             <ul id="j-picSlick">                    <li class="pic"><img src="http://yanxuan.nosdn.127.net/ede952c2016559654076334e22f0892e.jpg" alt="科技感防盗双肩包" /></li>                 <li class="pic"><img src="http://yanxuan.nosdn.127.net/d3109a4a8854838f6d004ac3a528ec50.jpg" alt="牛皮复古双肩背包" /></li>                 <li class="pic"><img src="http://yanxuan.nosdn.127.net/8a3f7c7812e8b9a10dc5399653e64747.jpg" alt="男士莫代尔圆领T恤" /></li>                </ul>           </div>      </div></script>',
        s = n.extend({
            __init: function(t) {
                this.__supr(t),
                this.__initNode(),
                this.__initEvent()
            },
            __initNode: function() {
                $dialog = $($(o).jqote()).showDialog({
                    dialogClsName: "m-oldUserModal",
                    clsName: "oldUserModalContent",
                    close: !1
                });
                var t = $dialog.find(".j-modalClose");
                t.on("click",
                function() {
                    $dialog.closeDialog()
                })
            },
            __initEvent: function() {
                this.__initSlick()
            },
            __initSlick: function() {
                $("#j-picSlick").slick({
                    arrows: !1,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    fade: !0,
                    mobileFirst: !1,
                    autoplay: !0,
                    autoplaySpeed: 3e3,
                    speed: 300,
                    waitForAnimate: !1
                })
            }
        });
        t.exports = s
    },
    40 : function(t, e) { !
        function(t) {
            "use strict";
            t(jQuery)
        } (function(t) {
            "use strict";
            var e = window.Slick || {};
            e = function() {
                function e(e, n) {
                    var o, s = this;
                    s.defaults = {
                        accessibility: !0,
                        adaptiveHeight: !1,
                        appendArrows: t(e),
                        appendDots: t(e),
                        arrows: !0,
                        asNavFor: null,
                        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button">Previous</button>',
                        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button">Next</button>',
                        autoplay: !1,
                        autoplaySpeed: 3e3,
                        centerMode: !1,
                        centerPadding: "50px",
                        cssEase: "ease",
                        customPaging: function(t, e) {
                            return '<button type="button" data-role="none" role="button" aria-required="false" tabindex="0">' + (e + 1) + "</button>"
                        },
                        dots: !1,
                        dotsClass: "slick-dots",
                        draggable: !0,
                        easing: "linear",
                        edgeFriction: .35,
                        fade: !1,
                        focusOnSelect: !1,
                        infinite: !0,
                        initialSlide: 0,
                        lazyLoad: "ondemand",
                        mobileFirst: !1,
                        pauseOnHover: !0,
                        pauseOnDotsHover: !1,
                        respondTo: "window",
                        responsive: null,
                        rows: 1,
                        rtl: !1,
                        slide: "",
                        slidesPerRow: 1,
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        speed: 500,
                        swipe: !0,
                        swipeToSlide: !1,
                        touchMove: !0,
                        touchThreshold: 5,
                        useCSS: !0,
                        variableWidth: !1,
                        vertical: !1,
                        verticalSwiping: !1,
                        waitForAnimate: !0,
                        zIndex: 1e3
                    },
                    s.initials = {
                        animating: !1,
                        dragging: !1,
                        autoPlayTimer: null,
                        currentDirection: 0,
                        currentLeft: null,
                        currentSlide: 0,
                        direction: 1,
                        $dots: null,
                        listWidth: null,
                        listHeight: null,
                        loadIndex: 0,
                        $nextArrow: null,
                        $prevArrow: null,
                        slideCount: null,
                        slideWidth: null,
                        $slideTrack: null,
                        $slides: null,
                        sliding: !1,
                        slideOffset: 0,
                        swipeLeft: null,
                        $list: null,
                        touchObject: {},
                        transformsEnabled: !1,
                        unslicked: !1
                    },
                    t.extend(s, s.initials),
                    s.activeBreakpoint = null,
                    s.animType = null,
                    s.animProp = null,
                    s.breakpoints = [],
                    s.breakpointSettings = [],
                    s.cssTransitions = !1,
                    s.hidden = "hidden",
                    s.paused = !1,
                    s.positionProp = null,
                    s.respondTo = null,
                    s.rowCount = 1,
                    s.shouldClick = !0,
                    s.$slider = t(e),
                    s.$slidesCache = null,
                    s.transformType = null,
                    s.transitionType = null,
                    s.visibilityChange = "visibilitychange",
                    s.windowWidth = 0,
                    s.windowTimer = null,
                    o = t(e).data("slick") || {},
                    s.options = t.extend({},
                    s.defaults, o, n),
                    s.currentSlide = s.options.initialSlide,
                    s.originalSettings = s.options,
                    "undefined" != typeof document.mozHidden ? (s.hidden = "mozHidden", s.visibilityChange = "mozvisibilitychange") : "undefined" != typeof document.webkitHidden && (s.hidden = "webkitHidden", s.visibilityChange = "webkitvisibilitychange"),
                    s.autoPlay = t.proxy(s.autoPlay, s),
                    s.autoPlayClear = t.proxy(s.autoPlayClear, s),
                    s.changeSlide = t.proxy(s.changeSlide, s),
                    s.clickHandler = t.proxy(s.clickHandler, s),
                    s.selectHandler = t.proxy(s.selectHandler, s),
                    s.setPosition = t.proxy(s.setPosition, s),
                    s.swipeHandler = t.proxy(s.swipeHandler, s),
                    s.dragHandler = t.proxy(s.dragHandler, s),
                    s.keyHandler = t.proxy(s.keyHandler, s),
                    s.autoPlayIterator = t.proxy(s.autoPlayIterator, s),
                    s.instanceUid = i++,
                    s.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/,
                    s.registerBreakpoints(),
                    s.init(!0),
                    s.checkResponsive(!0)
                }
                var i = 0;
                return e
            } (),
            e.prototype.addSlide = e.prototype.slickAdd = function(e, i, n) {
                var o = this;
                if ("boolean" == typeof i) n = i,
                i = null;
                else if (0 > i || i >= o.slideCount) return ! 1;
                o.unload(),
                "number" == typeof i ? 0 === i && 0 === o.$slides.length ? t(e).appendTo(o.$slideTrack) : n ? t(e).insertBefore(o.$slides.eq(i)) : t(e).insertAfter(o.$slides.eq(i)) : n === !0 ? t(e).prependTo(o.$slideTrack) : t(e).appendTo(o.$slideTrack),
                o.$slides = o.$slideTrack.children(this.options.slide),
                o.$slideTrack.children(this.options.slide).detach(),
                o.$slideTrack.append(o.$slides),
                o.$slides.each(function(e, i) {
                    t(i).attr("data-slick-index", e)
                }),
                o.$slidesCache = o.$slides,
                o.reinit()
            },
            e.prototype.animateHeight = function() {
                var t = this;
                if (1 === t.options.slidesToShow && t.options.adaptiveHeight === !0 && t.options.vertical === !1) {
                    var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
                    t.$list.animate({
                        height: e
                    },
                    t.options.speed)
                }
            },
            e.prototype.animateSlide = function(e, i) {
                var n = {},
                o = this;
                o.animateHeight(),
                o.options.rtl === !0 && o.options.vertical === !1 && (e = -e),
                o.transformsEnabled === !1 ? o.options.vertical === !1 ? o.$slideTrack.animate({
                    left: e
                },
                o.options.speed, o.options.easing, i) : o.$slideTrack.animate({
                    top: e
                },
                o.options.speed, o.options.easing, i) : o.cssTransitions === !1 ? (o.options.rtl === !0 && (o.currentLeft = -o.currentLeft), t({
                    animStart: o.currentLeft
                }).animate({
                    animStart: e
                },
                {
                    duration: o.options.speed,
                    easing: o.options.easing,
                    step: function(t) {
                        t = Math.ceil(t),
                        o.options.vertical === !1 ? (n[o.animType] = "translate(" + t + "px, 0px)", o.$slideTrack.css(n)) : (n[o.animType] = "translate(0px," + t + "px)", o.$slideTrack.css(n))
                    },
                    complete: function() {
                        i && i.call()
                    }
                })) : (o.applyTransition(), e = Math.ceil(e), o.options.vertical === !1 ? n[o.animType] = "translate3d(" + e + "px, 0px, 0px)": n[o.animType] = "translate3d(0px," + e + "px, 0px)", o.$slideTrack.css(n), i && setTimeout(function() {
                    o.disableTransition(),
                    i.call()
                },
                o.options.speed))
            },
            e.prototype.asNavFor = function(e) {
                var i = this,
                n = i.options.asNavFor;
                n && null !== n && (n = t(n).not(i.$slider)),
                null !== n && "object" == typeof n && n.each(function() {
                    var i = t(this).slick("getSlick");
                    i.unslicked || i.slideHandler(e, !0)
                })
            },
            e.prototype.applyTransition = function(t) {
                var e = this,
                i = {};
                e.options.fade === !1 ? i[e.transitionType] = e.transformType + " " + e.options.speed + "ms " + e.options.cssEase: i[e.transitionType] = "opacity " + e.options.speed + "ms " + e.options.cssEase,
                e.options.fade === !1 ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
            },
            e.prototype.autoPlay = function() {
                var t = this;
                t.autoPlayTimer && clearInterval(t.autoPlayTimer),
                t.slideCount > t.options.slidesToShow && t.paused !== !0 && (t.autoPlayTimer = setInterval(t.autoPlayIterator, t.options.autoplaySpeed))
            },
            e.prototype.autoPlayClear = function() {
                var t = this;
                t.autoPlayTimer && clearInterval(t.autoPlayTimer)
            },
            e.prototype.autoPlayIterator = function() {
                var t = this;
                t.options.infinite === !1 ? 1 === t.direction ? (t.currentSlide + 1 === t.slideCount - 1 && (t.direction = 0), t.slideHandler(t.currentSlide + t.options.slidesToScroll)) : (t.currentSlide - 1 === 0 && (t.direction = 1), t.slideHandler(t.currentSlide - t.options.slidesToScroll)) : t.slideHandler(t.currentSlide + t.options.slidesToScroll)
            },
            e.prototype.buildArrows = function() {
                var e = this;
                e.options.arrows === !0 && (e.$prevArrow = t(e.options.prevArrow).addClass("slick-arrow"), e.$nextArrow = t(e.options.nextArrow).addClass("slick-arrow"), e.slideCount > e.options.slidesToShow ? (e.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"), e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.prependTo(e.options.appendArrows), e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.appendTo(e.options.appendArrows), e.options.infinite !== !0 && e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true")) : e.$prevArrow.add(e.$nextArrow).addClass("slick-hidden").attr({
                    "aria-disabled": "true",
                    tabindex: "-1"
                }))
            },
            e.prototype.buildDots = function() {
                var e, i, n = this;
                if (n.options.dots === !0 && n.slideCount > n.options.slidesToShow) {
                    for (i = '<div class="slick-dots-wrap"><ul class="' + n.options.dotsClass + '">', e = 0; e <= n.getDotCount(); e += 1) i += "<li>" + n.options.customPaging.call(this, n, e) + "</li>";
                    i += "</ul></div>",
                    n.$dots = t(i).appendTo(n.options.appendDots),
                    n.$dots.find("li").first().addClass("slick-active").attr("aria-hidden", "false")
                }
            },
            e.prototype.buildOut = function() {
                var e = this;
                e.$slides = e.$slider.children(e.options.slide + ":not(.slick-cloned)").addClass("slick-slide"),
                e.slideCount = e.$slides.length,
                e.$slides.each(function(e, i) {
                    t(i).attr("data-slick-index", e).data("originalStyling", t(i).attr("style") || "")
                }),
                e.$slidesCache = e.$slides,
                e.$slider.addClass("slick-slider"),
                e.$slideTrack = 0 === e.slideCount ? t('<div class="slick-track"/>').appendTo(e.$slider) : e.$slides.wrapAll('<div class="slick-track"/>').parent(),
                e.$list = e.$slideTrack.wrap('<div aria-live="polite" class="slick-list"/>').parent(),
                e.$slideTrack.css("opacity", 0),
                (e.options.centerMode === !0 || e.options.swipeToSlide === !0) && (e.options.slidesToScroll = 1),
                t("img[data-lazy]", e.$slider).not("[src]").addClass("slick-loading").each(function() {
                    t(this).attr("src", "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC")
                }),
                e.setupInfinite(),
                e.buildArrows(),
                e.buildDots(),
                e.updateDots(),
                e.setSlideClasses("number" == typeof e.currentSlide ? e.currentSlide: 0),
                e.options.draggable === !0 && e.$list.addClass("draggable")
            },
            e.prototype.buildRows = function() {
                var t, e, i, n, o, s, a, r = this;
                if (n = document.createDocumentFragment(), s = r.$slider.children(), r.options.rows > 1) {
                    for (a = r.options.slidesPerRow * r.options.rows, o = Math.ceil(s.length / a), t = 0; o > t; t++) {
                        var l = document.createElement("div");
                        for (e = 0; e < r.options.rows; e++) {
                            var d = document.createElement("div");
                            for (i = 0; i < r.options.slidesPerRow; i++) {
                                var c = t * a + (e * r.options.slidesPerRow + i);
                                s.get(c) && d.appendChild(s.get(c))
                            }
                            l.appendChild(d)
                        }
                        n.appendChild(l)
                    }
                    r.$slider.html(n),
                    r.$slider.children().children().children().css({
                        width: 100 / r.options.slidesPerRow + "%",
                        display: "inline-block"
                    })
                }
            },
            e.prototype.checkResponsive = function(e, i) {
                var n, o, s, a = this,
                r = !1,
                l = a.$slider.width(),
                d = window.innerWidth || t(window).width();
                if ("window" === a.respondTo ? s = d: "slider" === a.respondTo ? s = l: "min" === a.respondTo && (s = Math.min(d, l)), a.options.responsive && a.options.responsive.length && null !== a.options.responsive) {
                    o = null;
                    for (n in a.breakpoints) a.breakpoints.hasOwnProperty(n) && (a.originalSettings.mobileFirst === !1 ? s < a.breakpoints[n] && (o = a.breakpoints[n]) : s > a.breakpoints[n] && (o = a.breakpoints[n]));
                    null !== o ? null !== a.activeBreakpoint ? (o !== a.activeBreakpoint || i) && (a.activeBreakpoint = o, "unslick" === a.breakpointSettings[o] ? a.unslick(o) : (a.options = t.extend({},
                    a.originalSettings, a.breakpointSettings[o]), e === !0 && (a.currentSlide = a.options.initialSlide), a.refresh(e)), r = o) : (a.activeBreakpoint = o, "unslick" === a.breakpointSettings[o] ? a.unslick(o) : (a.options = t.extend({},
                    a.originalSettings, a.breakpointSettings[o]), e === !0 && (a.currentSlide = a.options.initialSlide), a.refresh(e)), r = o) : null !== a.activeBreakpoint && (a.activeBreakpoint = null, a.options = a.originalSettings, e === !0 && (a.currentSlide = a.options.initialSlide), a.refresh(e), r = o),
                    e || r === !1 || a.$slider.trigger("breakpoint", [a, r])
                }
            },
            e.prototype.changeSlide = function(e, i) {
                var n, o, s, a = this,
                r = t(e.target);
                switch (r.is("a") && e.preventDefault(), r.is("li") || (r = r.closest("li")), s = a.slideCount % a.options.slidesToScroll !== 0, n = s ? 0 : (a.slideCount - a.currentSlide) % a.options.slidesToScroll, e.data.message) {
                case "previous":
                    o = 0 === n ? a.options.slidesToScroll: a.options.slidesToShow - n,
                    a.slideCount > a.options.slidesToShow && a.slideHandler(a.currentSlide - o, !1, i);
                    break;
                case "next":
                    o = 0 === n ? a.options.slidesToScroll: n,
                    a.slideCount > a.options.slidesToShow && a.slideHandler(a.currentSlide + o, !1, i);
                    break;
                case "index":
                    var l = 0 === e.data.index ? 0 : e.data.index || r.index() * a.options.slidesToScroll;
                    a.slideHandler(a.checkNavigable(l), !1, i),
                    r.children().trigger("focus");
                    break;
                default:
                    return
                }
            },
            e.prototype.checkNavigable = function(t) {
                var e, i, n = this;
                if (e = n.getNavigableIndexes(), i = 0, t > e[e.length - 1]) t = e[e.length - 1];
                else for (var o in e) {
                    if (t < e[o]) {
                        t = i;
                        break
                    }
                    i = e[o]
                }
                return t
            },
            e.prototype.cleanUpEvents = function() {
                var e = this;
                e.options.dots && null !== e.$dots && (t("li", e.$dots).off("click.slick", e.changeSlide), e.options.pauseOnDotsHover === !0 && e.options.autoplay === !0 && t("li", e.$dots).off("mouseenter.slick", t.proxy(e.setPaused, e, !0)).off("mouseleave.slick", t.proxy(e.setPaused, e, !1))),
                e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && (e.$prevArrow && e.$prevArrow.off("click.slick", e.changeSlide), e.$nextArrow && e.$nextArrow.off("click.slick", e.changeSlide)),
                e.$list.off("touchstart.slick mousedown.slick", e.swipeHandler),
                e.$list.off("touchmove.slick mousemove.slick", e.swipeHandler),
                e.$list.off("touchend.slick mouseup.slick", e.swipeHandler),
                e.$list.off("touchcancel.slick mouseleave.slick", e.swipeHandler),
                e.$list.off("click.slick", e.clickHandler),
                t(document).off(e.visibilityChange, e.visibility),
                e.$list.off("mouseenter.slick", t.proxy(e.setPaused, e, !0)),
                e.$list.off("mouseleave.slick", t.proxy(e.setPaused, e, !1)),
                e.options.accessibility === !0 && e.$list.off("keydown.slick", e.keyHandler),
                e.options.focusOnSelect === !0 && t(e.$slideTrack).children().off("click.slick", e.selectHandler),
                t(window).off("orientationchange.slick.slick-" + e.instanceUid, e.orientationChange),
                t(window).off("resize.slick.slick-" + e.instanceUid, e.resize),
                t("[draggable!=true]", e.$slideTrack).off("dragstart", e.preventDefault),
                t(window).off("load.slick.slick-" + e.instanceUid, e.setPosition),
                t(document).off("ready.slick.slick-" + e.instanceUid, e.setPosition)
            },
            e.prototype.cleanUpRows = function() {
                var t, e = this;
                e.options.rows > 1 && (t = e.$slides.children().children(), t.removeAttr("style"), e.$slider.html(t))
            },
            e.prototype.clickHandler = function(t) {
                var e = this;
                e.shouldClick === !1 && (t.stopImmediatePropagation(), t.stopPropagation(), t.preventDefault())
            },
            e.prototype.destroy = function(e) {
                var i = this;
                i.autoPlayClear(),
                i.touchObject = {},
                i.cleanUpEvents(),
                t(".slick-cloned", i.$slider).detach(),
                i.$dots && i.$dots.remove(),
                i.options.arrows === !0 && (i.$prevArrow && i.$prevArrow.length && (i.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), i.htmlExpr.test(i.options.prevArrow) && i.$prevArrow.remove()), i.$nextArrow && i.$nextArrow.length && (i.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), i.htmlExpr.test(i.options.nextArrow) && i.$nextArrow.remove())),
                i.$slides && (i.$slides.removeClass("slick-slide slick-active slick-center slick-visible slick-current").removeAttr("aria-hidden").removeAttr("data-slick-index").each(function() {
                    t(this).attr("style", t(this).data("originalStyling"))
                }), i.$slideTrack.children(this.options.slide).detach(), i.$slideTrack.detach(), i.$list.detach(), i.$slider.append(i.$slides)),
                i.cleanUpRows(),
                i.$slider.removeClass("slick-slider"),
                i.$slider.removeClass("slick-initialized"),
                i.unslicked = !0,
                e || i.$slider.trigger("destroy", [i])
            },
            e.prototype.disableTransition = function(t) {
                var e = this,
                i = {};
                i[e.transitionType] = "",
                e.options.fade === !1 ? e.$slideTrack.css(i) : e.$slides.eq(t).css(i)
            },
            e.prototype.fadeSlide = function(t, e) {
                var i = this;
                i.cssTransitions === !1 ? (i.$slides.eq(t).css({
                    zIndex: i.options.zIndex
                }), i.$slides.eq(t).animate({
                    opacity: 1
                },
                i.options.speed, i.options.easing, e)) : (i.applyTransition(t), i.$slides.eq(t).css({
                    opacity: 1,
                    zIndex: i.options.zIndex
                }), e && setTimeout(function() {
                    i.disableTransition(t),
                    e.call()
                },
                i.options.speed))
            },
            e.prototype.fadeSlideOut = function(t) {
                var e = this;
                e.cssTransitions === !1 ? e.$slides.eq(t).animate({
                    opacity: 0,
                    zIndex: e.options.zIndex - 2
                },
                e.options.speed, e.options.easing) : (e.applyTransition(t), e.$slides.eq(t).css({
                    opacity: 0,
                    zIndex: e.options.zIndex - 2
                }))
            },
            e.prototype.filterSlides = e.prototype.slickFilter = function(t) {
                var e = this;
                null !== t && (e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.filter(t).appendTo(e.$slideTrack), e.reinit())
            },
            e.prototype.getCurrent = e.prototype.slickCurrentSlide = function() {
                var t = this;
                return t.currentSlide
            },
            e.prototype.getDotCount = function() {
                var t = this,
                e = 0,
                i = 0,
                n = 0;
                if (t.options.infinite === !0) for (; e < t.slideCount;)++n,
                e = i + t.options.slidesToShow,
                i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll: t.options.slidesToShow;
                else if (t.options.centerMode === !0) n = t.slideCount;
                else for (; e < t.slideCount;)++n,
                e = i + t.options.slidesToShow,
                i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll: t.options.slidesToShow;
                return n - 1
            },
            e.prototype.getLeft = function(t) {
                var e, i, n, o = this,
                s = 0;
                return o.slideOffset = 0,
                i = o.$slides.first().outerHeight(!0),
                o.options.infinite === !0 ? (o.slideCount > o.options.slidesToShow && (o.slideOffset = o.slideWidth * o.options.slidesToShow * -1, s = i * o.options.slidesToShow * -1), o.slideCount % o.options.slidesToScroll !== 0 && t + o.options.slidesToScroll > o.slideCount && o.slideCount > o.options.slidesToShow && (t > o.slideCount ? (o.slideOffset = (o.options.slidesToShow - (t - o.slideCount)) * o.slideWidth * -1, s = (o.options.slidesToShow - (t - o.slideCount)) * i * -1) : (o.slideOffset = o.slideCount % o.options.slidesToScroll * o.slideWidth * -1, s = o.slideCount % o.options.slidesToScroll * i * -1))) : t + o.options.slidesToShow > o.slideCount && (o.slideOffset = (t + o.options.slidesToShow - o.slideCount) * o.slideWidth, s = (t + o.options.slidesToShow - o.slideCount) * i),
                o.slideCount <= o.options.slidesToShow && (o.slideOffset = 0, s = 0),
                o.options.centerMode === !0 && o.options.infinite === !0 ? o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2) - o.slideWidth: o.options.centerMode === !0 && (o.slideOffset = 0, o.slideOffset += o.slideWidth * Math.floor(o.options.slidesToShow / 2)),
                e = o.options.vertical === !1 ? t * o.slideWidth * -1 + o.slideOffset: t * i * -1 + s,
                o.options.variableWidth === !0 && (n = o.slideCount <= o.options.slidesToShow || o.options.infinite === !1 ? o.$slideTrack.children(".slick-slide").eq(t) : o.$slideTrack.children(".slick-slide").eq(t + o.options.slidesToShow), e = n[0] ? -1 * n[0].offsetLeft: 0, o.options.centerMode === !0 && (n = o.options.infinite === !1 ? o.$slideTrack.children(".slick-slide").eq(t) : o.$slideTrack.children(".slick-slide").eq(t + o.options.slidesToShow + 1), e = n[0] ? -1 * n[0].offsetLeft: 0, e += (o.$list.width() - n.outerWidth()) / 2)),
                e
            },
            e.prototype.getOption = e.prototype.slickGetOption = function(t) {
                var e = this;
                return e.options[t]
            },
            e.prototype.getNavigableIndexes = function() {
                var t, e = this,
                i = 0,
                n = 0,
                o = [];
                for (e.options.infinite === !1 ? t = e.slideCount: (i = -1 * e.options.slidesToScroll, n = -1 * e.options.slidesToScroll, t = 2 * e.slideCount); t > i;) o.push(i),
                i = n + e.options.slidesToScroll,
                n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll: e.options.slidesToShow;
                return o
            },
            e.prototype.getSlick = function() {
                return this
            },
            e.prototype.getSlideCount = function() {
                var e, i, n, o = this;
                return n = o.options.centerMode === !0 ? o.slideWidth * Math.floor(o.options.slidesToShow / 2) : 0,
                o.options.swipeToSlide === !0 ? (o.$slideTrack.find(".slick-slide").each(function(e, s) {
                    return s.offsetLeft - n + t(s).outerWidth() / 2 > -1 * o.swipeLeft ? (i = s, !1) : void 0
                }), e = Math.abs(t(i).attr("data-slick-index") - o.currentSlide) || 1) : o.options.slidesToScroll
            },
            e.prototype.goTo = e.prototype.slickGoTo = function(t, e) {
                var i = this;
                i.changeSlide({
                    data: {
                        message: "index",
                        index: parseInt(t)
                    }
                },
                e)
            },
            e.prototype.init = function(e) {
                var i = this;
                t(i.$slider).hasClass("slick-initialized") || (t(i.$slider).addClass("slick-initialized"), i.buildRows(), i.buildOut(), i.setProps(), i.startLoad(), i.loadSlider(), i.initializeEvents(), i.updateArrows(), i.updateDots()),
                e && i.$slider.trigger("init", [i]),
                i.options.accessibility === !0 && i.initADA()
            },
            e.prototype.initArrowEvents = function() {
                var t = this;
                t.options.arrows === !0 && t.slideCount > t.options.slidesToShow && (t.$prevArrow.on("click.slick", {
                    message: "previous"
                },
                t.changeSlide), t.$nextArrow.on("click.slick", {
                    message: "next"
                },
                t.changeSlide))
            },
            e.prototype.initDotEvents = function() {
                var e = this,
                i = e.options.changeSlideByHoverOnDots ? "mouseenter.slick": "click.slick";
                e.options.dots === !0 && e.slideCount > e.options.slidesToShow && e.$dots.find("li").on(i, {
                    message: "index"
                },
                e.changeSlide),
                e.options.dots === !0 && e.options.pauseOnDotsHover === !0 && e.options.autoplay === !0 && t("li", e.$dots).on("mouseenter.slick", t.proxy(e.setPaused, e, !0)).on("mouseleave.slick", t.proxy(e.setPaused, e, !1))
            },
            e.prototype.initializeEvents = function() {
                var e = this;
                e.initArrowEvents(),
                e.initDotEvents(),
                e.$list.on("touchstart.slick mousedown.slick", {
                    action: "start"
                },
                e.swipeHandler),
                e.$list.on("touchmove.slick mousemove.slick", {
                    action: "move"
                },
                e.swipeHandler),
                e.$list.on("touchend.slick mouseup.slick", {
                    action: "end"
                },
                e.swipeHandler),
                e.$list.on("touchcancel.slick mouseleave.slick", {
                    action: "end"
                },
                e.swipeHandler),
                e.$list.on("click.slick", e.clickHandler),
                t(document).on(e.visibilityChange, t.proxy(e.visibility, e)),
                e.$list.on("mouseenter.slick", t.proxy(e.setPaused, e, !0)),
                e.$list.on("mouseleave.slick", t.proxy(e.setPaused, e, !1)),
                e.options.accessibility === !0 && e.$list.on("keydown.slick", e.keyHandler),
                e.options.focusOnSelect === !0 && t(e.$slideTrack).children().on("click.slick", e.selectHandler),
                t(window).on("orientationchange.slick.slick-" + e.instanceUid, t.proxy(e.orientationChange, e)),
                t(window).on("resize.slick.slick-" + e.instanceUid, t.proxy(e.resize, e)),
                t("[draggable!=true]", e.$slideTrack).on("dragstart", e.preventDefault),
                t(window).on("load.slick.slick-" + e.instanceUid, e.setPosition),
                t(document).on("ready.slick.slick-" + e.instanceUid, e.setPosition)
            },
            e.prototype.initUI = function() {
                var t = this;
                t.options.arrows === !0 && t.slideCount > t.options.slidesToShow && (t.$prevArrow.show(), t.$nextArrow.show()),
                t.options.dots === !0 && t.slideCount > t.options.slidesToShow && t.$dots.show(),
                t.options.autoplay === !0 && t.autoPlay()
            },
            e.prototype.keyHandler = function(t) {
                var e = this;
                t.target.tagName.match("TEXTAREA|INPUT|SELECT") || (37 === t.keyCode && e.options.accessibility === !0 ? e.changeSlide({
                    data: {
                        message: "previous"
                    }
                }) : 39 === t.keyCode && e.options.accessibility === !0 && e.changeSlide({
                    data: {
                        message: "next"
                    }
                }))
            },
            e.prototype.lazyLoad = function() {
                function e(e) {
                    t("img[data-lazy]", e).each(function() {
                        var e = t(this),
                        i = t(this).attr("data-lazy"),
                        n = document.createElement("img");
                        n.onload = function() {
                            e.animate({
                                opacity: 0
                            },
                            100,
                            function() {
                                e.attr("src", i).animate({
                                    opacity: 1
                                },
                                200,
                                function() {
                                    e.removeAttr("data-lazy").removeClass("slick-loading").addClass("img-lazyloaded")
                                })
                            })
                        },
                        n.src = i
                    })
                }
                var i, n, o, s, a = this;
                a.options.centerMode === !0 ? a.options.infinite === !0 ? (o = a.currentSlide + (a.options.slidesToShow / 2 + 1), s = o + a.options.slidesToShow + 2) : (o = Math.max(0, a.currentSlide - (a.options.slidesToShow / 2 + 1)), s = 2 + (a.options.slidesToShow / 2 + 1) + a.currentSlide) : (o = a.options.infinite ? a.options.slidesToShow + a.currentSlide: a.currentSlide, s = o + a.options.slidesToShow, a.options.fade === !0 && (o > 0 && o--, s <= a.slideCount && s++)),
                i = a.$slider.find(".slick-slide").slice(o, s),
                e(i),
                a.slideCount <= a.options.slidesToShow ? (n = a.$slider.find(".slick-slide"), e(n)) : a.currentSlide >= a.slideCount - a.options.slidesToShow ? (n = a.$slider.find(".slick-cloned").slice(0, a.options.slidesToShow), e(n)) : 0 === a.currentSlide && (n = a.$slider.find(".slick-cloned").slice( - 1 * a.options.slidesToShow), e(n))
            },
            e.prototype.loadSlider = function() {
                var t = this;
                t.setPosition(),
                t.$slideTrack.css({
                    opacity: 1
                }),
                t.$slider.removeClass("slick-loading"),
                t.initUI(),
                "progressive" === t.options.lazyLoad && t.progressiveLazyLoad()
            },
            e.prototype.next = e.prototype.slickNext = function() {
                var t = this;
                t.changeSlide({
                    data: {
                        message: "next"
                    }
                })
            },
            e.prototype.orientationChange = function() {
                var t = this;
                t.checkResponsive(),
                t.setPosition()
            },
            e.prototype.pause = e.prototype.slickPause = function() {
                var t = this;
                t.autoPlayClear(),
                t.paused = !0
            },
            e.prototype.play = e.prototype.slickPlay = function() {
                var t = this;
                t.paused = !1,
                t.autoPlay()
            },
            e.prototype.postSlide = function(t) {
                var e = this;
                e.$slider.trigger("afterChange", [e, t]),
                e.animating = !1,
                e.setPosition(),
                e.swipeLeft = null,
                e.options.autoplay === !0 && e.paused === !1 && e.autoPlay(),
                e.options.accessibility === !0 && e.initADA()
            },
            e.prototype.prev = e.prototype.slickPrev = function() {
                var t = this;
                t.changeSlide({
                    data: {
                        message: "previous"
                    }
                })
            },
            e.prototype.preventDefault = function(t) {
                t.preventDefault()
            },
            e.prototype.progressiveLazyLoad = function() {
                var e, i, n = this;
                e = t("img[data-lazy]", n.$slider).length,
                e > 0 && (i = t("img[data-lazy]", n.$slider).first(), i.attr("src", i.attr("data-lazy")).removeClass("slick-loading").load(function() {
                    i.removeAttr("data-lazy"),
                    n.progressiveLazyLoad(),
                    n.options.adaptiveHeight === !0 && n.setPosition()
                }).error(function() {
                    i.removeAttr("data-lazy"),
                    n.progressiveLazyLoad()
                }))
            },
            e.prototype.refresh = function(e) {
                var i = this,
                n = i.currentSlide;
                i.destroy(!0),
                t.extend(i, i.initials, {
                    currentSlide: n
                }),
                i.init(),
                e || i.changeSlide({
                    data: {
                        message: "index",
                        index: n
                    }
                },
                !1)
            },
            e.prototype.registerBreakpoints = function() {
                var e, i, n, o = this,
                s = o.options.responsive || null;
                if ("array" === t.type(s) && s.length) {
                    o.respondTo = o.options.respondTo || "window";
                    for (e in s) if (n = o.breakpoints.length - 1, i = s[e].breakpoint, s.hasOwnProperty(e)) {
                        for (; n >= 0;) o.breakpoints[n] && o.breakpoints[n] === i && o.breakpoints.splice(n, 1),
                        n--;
                        o.breakpoints.push(i),
                        o.breakpointSettings[i] = s[e].settings
                    }
                    o.breakpoints.sort(function(t, e) {
                        return o.options.mobileFirst ? t - e: e - t
                    })
                }
            },
            e.prototype.reinit = function() {
                var e = this;
                e.$slides = e.$slideTrack.children(e.options.slide).addClass("slick-slide"),
                e.slideCount = e.$slides.length,
                e.currentSlide >= e.slideCount && 0 !== e.currentSlide && (e.currentSlide = e.currentSlide - e.options.slidesToScroll),
                e.slideCount <= e.options.slidesToShow && (e.currentSlide = 0),
                e.registerBreakpoints(),
                e.setProps(),
                e.setupInfinite(),
                e.buildArrows(),
                e.updateArrows(),
                e.initArrowEvents(),
                e.buildDots(),
                e.updateDots(),
                e.initDotEvents(),
                e.checkResponsive(!1, !0),
                e.options.focusOnSelect === !0 && t(e.$slideTrack).children().on("click.slick", e.selectHandler),
                e.setSlideClasses(0),
                e.setPosition(),
                e.$slider.trigger("reInit", [e]),
                e.options.autoplay === !0 && e.focusHandler()
            },
            e.prototype.resize = function() {
                var e = this;
                t(window).width() !== e.windowWidth && (clearTimeout(e.windowDelay), e.windowDelay = window.setTimeout(function() {
                    e.windowWidth = t(window).width(),
                    e.checkResponsive(),
                    e.unslicked || e.setPosition()
                },
                50))
            },
            e.prototype.removeSlide = e.prototype.slickRemove = function(t, e, i) {
                var n = this;
                return "boolean" == typeof t ? (e = t, t = e === !0 ? 0 : n.slideCount - 1) : t = e === !0 ? --t: t,
                n.slideCount < 1 || 0 > t || t > n.slideCount - 1 ? !1 : (n.unload(), i === !0 ? n.$slideTrack.children().remove() : n.$slideTrack.children(this.options.slide).eq(t).remove(), n.$slides = n.$slideTrack.children(this.options.slide), n.$slideTrack.children(this.options.slide).detach(), n.$slideTrack.append(n.$slides), n.$slidesCache = n.$slides, void n.reinit())
            },
            e.prototype.setCSS = function(t) {
                var e, i, n = this,
                o = {};
                n.options.rtl === !0 && (t = -t),
                e = "left" == n.positionProp ? Math.ceil(t) + "px": "0px",
                i = "top" == n.positionProp ? Math.ceil(t) + "px": "0px",
                o[n.positionProp] = t,
                n.transformsEnabled === !1 ? n.$slideTrack.css(o) : (o = {},
                n.cssTransitions === !1 ? (o[n.animType] = "translate(" + e + ", " + i + ")", n.$slideTrack.css(o)) : (o[n.animType] = "translate3d(" + e + ", " + i + ", 0px)", n.$slideTrack.css(o)))
            },
            e.prototype.setDimensions = function() {
                var t = this;
                t.options.vertical === !1 ? t.options.centerMode === !0 && t.$list.css({
                    padding: "0px " + t.options.centerPadding
                }) : (t.$list.height(t.$slides.first().outerHeight(!0) * t.options.slidesToShow), t.options.centerMode === !0 && t.$list.css({
                    padding: t.options.centerPadding + " 0px"
                })),
                t.listWidth = t.$list.width(),
                t.listHeight = t.$list.height(),
                t.options.vertical === !1 && t.options.variableWidth === !1 ? (t.slideWidth = Math.ceil(t.listWidth / t.options.slidesToShow), t.$slideTrack.width(Math.ceil(t.slideWidth * t.$slideTrack.children(".slick-slide").length))) : t.options.variableWidth === !0 ? t.$slideTrack.width(5e3 * t.slideCount) : (t.slideWidth = Math.ceil(t.listWidth), t.$slideTrack.height(Math.ceil(t.$slides.first().outerHeight(!0) * t.$slideTrack.children(".slick-slide").length)));
                var e = t.$slides.first().outerWidth(!0) - t.$slides.first().width();
                t.options.variableWidth === !1 && t.$slideTrack.children(".slick-slide").width(t.slideWidth - e)
            },
            e.prototype.setFade = function() {
                var e, i = this;
                i.$slides.each(function(n, o) {
                    e = i.slideWidth * n * -1,
                    i.options.rtl === !0 ? t(o).css({
                        position: "relative",
                        right: e,
                        top: 0,
                        zIndex: i.options.zIndex - 2,
                        opacity: 0
                    }) : t(o).css({
                        position: "relative",
                        left: e,
                        top: 0,
                        zIndex: i.options.zIndex - 2,
                        opacity: 0
                    })
                }),
                i.$slides.eq(i.currentSlide).css({
                    zIndex: i.options.zIndex - 1,
                    opacity: 1
                })
            },
            e.prototype.setHeight = function() {
                var t = this;
                if (1 === t.options.slidesToShow && t.options.adaptiveHeight === !0 && t.options.vertical === !1) {
                    var e = t.$slides.eq(t.currentSlide).outerHeight(!0);
                    t.$list.css("height", e)
                }
            },
            e.prototype.setOption = e.prototype.slickSetOption = function(e, i, n) {
                var o, s, a = this;
                if ("responsive" === e && "array" === t.type(i)) for (s in i) if ("array" !== t.type(a.options.responsive)) a.options.responsive = [i[s]];
                else {
                    for (o = a.options.responsive.length - 1; o >= 0;) a.options.responsive[o].breakpoint === i[s].breakpoint && a.options.responsive.splice(o, 1),
                    o--;
                    a.options.responsive.push(i[s])
                } else a.options[e] = i;
                n === !0 && (a.unload(), a.reinit())
            },
            e.prototype.setPosition = function() {
                var t = this;
                t.setDimensions(),
                t.setHeight(),
                t.options.fade === !1 ? t.setCSS(t.getLeft(t.currentSlide)) : t.setFade(),
                t.$slider.trigger("setPosition", [t])
            },
            e.prototype.setProps = function() {
                var t = this,
                e = document.body.style;
                t.positionProp = t.options.vertical === !0 ? "top": "left",
                "top" === t.positionProp ? t.$slider.addClass("slick-vertical") : t.$slider.removeClass("slick-vertical"),
                (void 0 !== e.WebkitTransition || void 0 !== e.MozTransition || void 0 !== e.msTransition) && t.options.useCSS === !0 && (t.cssTransitions = !0),
                t.options.fade && ("number" == typeof t.options.zIndex ? t.options.zIndex < 3 && (t.options.zIndex = 3) : t.options.zIndex = t.defaults.zIndex),
                void 0 !== e.OTransform && (t.animType = "OTransform", t.transformType = "-o-transform", t.transitionType = "OTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)),
                void 0 !== e.MozTransform && (t.animType = "MozTransform", t.transformType = "-moz-transform", t.transitionType = "MozTransition", void 0 === e.perspectiveProperty && void 0 === e.MozPerspective && (t.animType = !1)),
                void 0 !== e.webkitTransform && (t.animType = "webkitTransform", t.transformType = "-webkit-transform", t.transitionType = "webkitTransition", void 0 === e.perspectiveProperty && void 0 === e.webkitPerspective && (t.animType = !1)),
                void 0 !== e.msTransform && (t.animType = "msTransform", t.transformType = "-ms-transform", t.transitionType = "msTransition", void 0 === e.msTransform && (t.animType = !1)),
                void 0 !== e.transform && t.animType !== !1 && (t.animType = "transform", t.transformType = "transform", t.transitionType = "transition"),
                t.transformsEnabled = null !== t.animType && t.animType !== !1
            },
            e.prototype.setSlideClasses = function(t) {
                var e, i, n, o, s = this;
                i = s.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true"),
                s.$slides.eq(t).addClass("slick-current"),
                s.options.centerMode === !0 ? (e = Math.floor(s.options.slidesToShow / 2), s.options.infinite === !0 && (t >= e && t <= s.slideCount - 1 - e ? s.$slides.slice(t - e, t + e + 1).addClass("slick-active").attr("aria-hidden", "false") : (n = s.options.slidesToShow + t, i.slice(n - e + 1, n + e + 2).addClass("slick-active").attr("aria-hidden", "false")), 0 === t ? i.eq(i.length - 1 - s.options.slidesToShow).addClass("slick-center") : t === s.slideCount - 1 && i.eq(s.options.slidesToShow).addClass("slick-center")), s.$slides.eq(t).addClass("slick-center")) : t >= 0 && t <= s.slideCount - s.options.slidesToShow ? s.$slides.slice(t, t + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false") : i.length <= s.options.slidesToShow ? i.addClass("slick-active").attr("aria-hidden", "false") : (o = s.slideCount % s.options.slidesToShow, n = s.options.infinite === !0 ? s.options.slidesToShow + t: t, s.options.slidesToShow == s.options.slidesToScroll && s.slideCount - t < s.options.slidesToShow ? i.slice(n - (s.options.slidesToShow - o), n + o).addClass("slick-active").attr("aria-hidden", "false") : i.slice(n, n + s.options.slidesToShow).addClass("slick-active").attr("aria-hidden", "false")),
                "ondemand" === s.options.lazyLoad && s.lazyLoad()
            },
            e.prototype.setupInfinite = function() {
                var e, i, n, o = this;
                if (o.options.fade === !0 && (o.options.centerMode = !1), o.options.infinite === !0 && o.options.fade === !1 && (i = null, o.slideCount > o.options.slidesToShow)) {
                    for (n = o.options.centerMode === !0 ? o.options.slidesToShow + 1 : o.options.slidesToShow, e = o.slideCount; e > o.slideCount - n; e -= 1) i = e - 1,
                    t(o.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i - o.slideCount).prependTo(o.$slideTrack).addClass("slick-cloned");
                    for (e = 0; n > e; e += 1) i = e,
                    t(o.$slides[i]).clone(!0).attr("id", "").attr("data-slick-index", i + o.slideCount).appendTo(o.$slideTrack).addClass("slick-cloned");
                    o.$slideTrack.find(".slick-cloned").find("[id]").each(function() {
                        t(this).attr("id", "")
                    })
                }
            },
            e.prototype.setPaused = function(t) {
                var e = this;
                e.options.autoplay === !0 && e.options.pauseOnHover === !0 && (e.paused = t, t ? e.autoPlayClear() : e.autoPlay())
            },
            e.prototype.selectHandler = function(e) {
                var i = this,
                n = t(e.target).is(".slick-slide") ? t(e.target) : t(e.target).parents(".slick-slide"),
                o = parseInt(n.attr("data-slick-index"));
                return o || (o = 0),
                i.slideCount <= i.options.slidesToShow ? (i.setSlideClasses(o), void i.asNavFor(o)) : void i.slideHandler(o)
            },
            e.prototype.slideHandler = function(t, e, i) {
                var n, o, s, a, r = null,
                l = this;
                return e = e || !1,
                l.animating === !0 && l.options.waitForAnimate === !0 || l.options.fade === !0 && l.currentSlide === t || l.slideCount <= l.options.slidesToShow ? void 0 : (e === !1 && l.asNavFor(t), n = t, r = l.getLeft(n), a = l.getLeft(l.currentSlide), l.currentLeft = null === l.swipeLeft ? a: l.swipeLeft, l.options.infinite === !1 && l.options.centerMode === !1 && (0 > t || t > l.getDotCount() * l.options.slidesToScroll) ? void(l.options.fade === !1 && (n = l.currentSlide, i !== !0 ? l.animateSlide(a,
                function() {
                    l.postSlide(n)
                }) : l.postSlide(n))) : l.options.infinite === !1 && l.options.centerMode === !0 && (0 > t || t > l.slideCount - l.options.slidesToScroll) ? void(l.options.fade === !1 && (n = l.currentSlide, i !== !0 ? l.animateSlide(a,
                function() {
                    l.postSlide(n)
                }) : l.postSlide(n))) : (l.options.autoplay === !0 && clearInterval(l.autoPlayTimer), o = 0 > n ? l.slideCount % l.options.slidesToScroll !== 0 ? l.slideCount - l.slideCount % l.options.slidesToScroll: l.slideCount + n: n >= l.slideCount ? l.slideCount % l.options.slidesToScroll !== 0 ? 0 : n - l.slideCount: n, l.animating = !0, l.$slider.trigger("beforeChange", [l, l.currentSlide, o]), s = l.currentSlide, l.currentSlide = o, l.setSlideClasses(l.currentSlide), l.updateDots(), l.updateArrows(), l.options.fade === !0 ? (i !== !0 ? (l.fadeSlideOut(s), l.fadeSlide(o,
                function() {
                    l.postSlide(o)
                })) : l.postSlide(o), void l.animateHeight()) : void(i !== !0 ? l.animateSlide(r,
                function() {
                    l.postSlide(o)
                }) : l.postSlide(o))))
            },
            e.prototype.startLoad = function() {
                var t = this;
                t.options.arrows === !0 && t.slideCount > t.options.slidesToShow && (t.$prevArrow.hide(), t.$nextArrow.hide()),
                t.options.dots === !0 && t.slideCount > t.options.slidesToShow && t.$dots.hide(),
                t.$slider.addClass("slick-loading")
            },
            e.prototype.swipeDirection = function() {
                var t, e, i, n, o = this;
                return t = o.touchObject.startX - o.touchObject.curX,
                e = o.touchObject.startY - o.touchObject.curY,
                i = Math.atan2(e, t),
                n = Math.round(180 * i / Math.PI),
                0 > n && (n = 360 - Math.abs(n)),
                45 >= n && n >= 0 ? o.options.rtl === !1 ? "left": "right": 360 >= n && n >= 315 ? o.options.rtl === !1 ? "left": "right": n >= 135 && 225 >= n ? o.options.rtl === !1 ? "right": "left": o.options.verticalSwiping === !0 ? n >= 35 && 135 >= n ? "left": "right": "vertical"
            },
            e.prototype.swipeEnd = function(t) {
                var e, i = this;
                if (i.dragging = !1, i.shouldClick = i.touchObject.swipeLength > 10 ? !1 : !0, void 0 === i.touchObject.curX) return ! 1;
                if (i.touchObject.edgeHit === !0 && i.$slider.trigger("edge", [i, i.swipeDirection()]), i.touchObject.swipeLength >= i.touchObject.minSwipe) switch (i.swipeDirection()) {
                case "left":
                    e = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide + i.getSlideCount()) : i.currentSlide + i.getSlideCount(),
                    i.slideHandler(e),
                    i.currentDirection = 0,
                    i.touchObject = {},
                    i.$slider.trigger("swipe", [i, "left"]);
                    break;
                case "right":
                    e = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide - i.getSlideCount()) : i.currentSlide - i.getSlideCount(),
                    i.slideHandler(e),
                    i.currentDirection = 1,
                    i.touchObject = {},
                    i.$slider.trigger("swipe", [i, "right"])
                } else i.touchObject.startX !== i.touchObject.curX && (i.slideHandler(i.currentSlide), i.touchObject = {})
            },
            e.prototype.swipeHandler = function(t) {
                var e = this;
                if (! (e.options.swipe === !1 || "ontouchend" in document && e.options.swipe === !1 || e.options.draggable === !1 && -1 !== t.type.indexOf("mouse"))) switch (e.touchObject.fingerCount = t.originalEvent && void 0 !== t.originalEvent.touches ? t.originalEvent.touches.length: 1, e.touchObject.minSwipe = e.listWidth / e.options.touchThreshold, e.options.verticalSwiping === !0 && (e.touchObject.minSwipe = e.listHeight / e.options.touchThreshold), t.data.action) {
                case "start":
                    e.swipeStart(t);
                    break;
                case "move":
                    e.swipeMove(t);
                    break;
                case "end":
                    e.swipeEnd(t)
                }
            },
            e.prototype.swipeMove = function(t) {
                var e, i, n, o, s, a = this;
                return s = void 0 !== t.originalEvent ? t.originalEvent.touches: null,
                !a.dragging || s && 1 !== s.length ? !1 : (e = a.getLeft(a.currentSlide), a.touchObject.curX = void 0 !== s ? s[0].pageX: t.clientX, a.touchObject.curY = void 0 !== s ? s[0].pageY: t.clientY, a.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(a.touchObject.curX - a.touchObject.startX, 2))), a.options.verticalSwiping === !0 && (a.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(a.touchObject.curY - a.touchObject.startY, 2)))), i = a.swipeDirection(), "vertical" !== i ? (void 0 !== t.originalEvent && a.touchObject.swipeLength > 4 && t.preventDefault(), o = (a.options.rtl === !1 ? 1 : -1) * (a.touchObject.curX > a.touchObject.startX ? 1 : -1), a.options.verticalSwiping === !0 && (o = a.touchObject.curY > a.touchObject.startY ? 1 : -1), n = a.touchObject.swipeLength, a.touchObject.edgeHit = !1, a.options.infinite === !1 && (0 === a.currentSlide && "right" === i || a.currentSlide >= a.getDotCount() && "left" === i) && (n = a.touchObject.swipeLength * a.options.edgeFriction, a.touchObject.edgeHit = !0), a.options.vertical === !1 ? a.swipeLeft = e + n * o: a.swipeLeft = e + n * (a.$list.height() / a.listWidth) * o, a.options.verticalSwiping === !0 && (a.swipeLeft = e + n * o), a.options.fade === !0 || a.options.touchMove === !1 ? !1 : a.animating === !0 ? (a.swipeLeft = null, !1) : void a.setCSS(a.swipeLeft)) : void 0)
            },
            e.prototype.swipeStart = function(t) {
                var e, i = this;
                return 1 !== i.touchObject.fingerCount || i.slideCount <= i.options.slidesToShow ? (i.touchObject = {},
                !1) : (void 0 !== t.originalEvent && void 0 !== t.originalEvent.touches && (e = t.originalEvent.touches[0]), i.touchObject.startX = i.touchObject.curX = void 0 !== e ? e.pageX: t.clientX, i.touchObject.startY = i.touchObject.curY = void 0 !== e ? e.pageY: t.clientY, void(i.dragging = !0))
            },
            e.prototype.unfilterSlides = e.prototype.slickUnfilter = function() {
                var t = this;
                null !== t.$slidesCache && (t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.appendTo(t.$slideTrack), t.reinit())
            },
            e.prototype.unload = function() {
                var e = this;
                t(".slick-cloned", e.$slider).remove(),
                e.$dots && e.$dots.remove(),
                e.$prevArrow && e.htmlExpr.test(e.options.prevArrow) && e.$prevArrow.remove(),
                e.$nextArrow && e.htmlExpr.test(e.options.nextArrow) && e.$nextArrow.remove(),
                e.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "")
            },
            e.prototype.unslick = function(t) {
                var e = this;
                e.$slider.trigger("unslick", [e, t]),
                e.destroy()
            },
            e.prototype.updateArrows = function() {
                var t, e = this;
                t = Math.floor(e.options.slidesToShow / 2),
                e.options.arrows === !0 && e.slideCount > e.options.slidesToShow && !e.options.infinite && (e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"), 0 === e.currentSlide ? (e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : e.currentSlide >= e.slideCount - e.options.slidesToShow && e.options.centerMode === !1 ? (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")) : e.currentSlide >= e.slideCount - 1 && e.options.centerMode === !0 && (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")))
            },
            e.prototype.updateDots = function() {
                var t = this;
                null !== t.$dots && (t.$dots.find("li").removeClass("slick-active").attr("aria-hidden", "true"), t.$dots.find("li").eq(Math.floor(t.currentSlide / t.options.slidesToScroll)).addClass("slick-active").attr("aria-hidden", "false"))
            },
            e.prototype.visibility = function() {
                var t = this;
                document[t.hidden] ? (t.paused = !0, t.autoPlayClear()) : t.options.autoplay === !0 && (t.paused = !1, t.autoPlay())
            },
            e.prototype.initADA = function() {
                var e = this;
                e.$slides.add(e.$slideTrack.find(".slick-cloned")).attr({
                    "aria-hidden": "true",
                    tabindex: "-1"
                }).find("a, input, button, select").attr({
                    tabindex: "-1"
                }),
                e.$slideTrack.attr("role", "listbox"),
                e.$slides.not(e.$slideTrack.find(".slick-cloned")).each(function(i) {
                    t(this).attr({
                        role: "option",
                        "aria-describedby": "slick-slide" + e.instanceUid + i
                    })
                }),
                null !== e.$dots && e.$dots.attr("role", "tablist").find("li").each(function(i) {
                    t(this).attr({
                        role: "presentation",
                        "aria-selected": "false",
                        "aria-controls": "navigation" + e.instanceUid + i,
                        id: "slick-slide" + e.instanceUid + i
                    })
                }).first().attr("aria-selected", "true").end().find("button").attr("role", "button").end().closest("div").attr("role", "toolbar"),
                e.activateADA()
            },
            e.prototype.activateADA = function() {
                var t = this,
                e = t.$slider.find("*").is(":focus");
                t.$slideTrack.find(".slick-active").attr({
                    "aria-hidden": "false",
                    tabindex: "0"
                }).find("a, input, button, select").attr({
                    tabindex: "0"
                }),
                e && t.$slideTrack.find(".slick-active").focus()
            },
            e.prototype.focusHandler = function() {
                var e = this;
                e.$slider.on("focus.slick blur.slick", "*",
                function(i) {
                    i.stopImmediatePropagation();
                    var n = t(this);
                    setTimeout(function() {
                        e.isPlay && (n.is(":focus") ? (e.autoPlayClear(), e.paused = !0) : (e.paused = !1, e.autoPlay()))
                    },
                    0)
                })
            },
            t.fn.slick = function() {
                var t, i = this,
                n = arguments[0],
                o = Array.prototype.slice.call(arguments, 1),
                s = i.length,
                a = 0;
                for (a; s > a; a++) if ("object" == typeof n || "undefined" == typeof n ? i[a].slick = new e(i[a], n) : t = i[a].slick[n].apply(i[a].slick, o), "undefined" != typeof t) return t;
                return i
            }
        })
    },
    41 : function(t, e, i) {
        var n = i(9),
        o = {
            show: function(t) {
                var e = t || {},
                i = $.Deferred();
                return n.ajax({
                    url: "/xhr/oldUserPop/isPop.json",
                    data: e,
                    success: function(t) {
                        i.resolve(t)
                    },
                    error: function(t, e, n) {
                        i.reject(t, e)
                    }
                }),
                i
            }
        };
        t.exports = o
    },
    45 : function(t, e, i) {
        var n = i(16),
        o = (i(2), i(46)),
        s = i(30),
        a = i(47),
        r = i(49);
        UcenterModule = n.extend({
            __init: function(t) {
                this.__supr(t),
                this.__initUcenterSide()
            },
            __initUcenterSide: function() {
                var t = o.getSimple();
                t.done(function(t) {
                    null != t.data.avatar && "" != t.data.avatar && $("#j-sideAvatar").attr("src", t.data.avatar),
                    $("#j-sideNickname").text(t.data.nickname).attr("title", t.data.nickname)
                }),
                this.__initEnterpriseLogo(),
                this.__initUserCouponNum(),
                $("#j-sideAvatarWarp").bind("click", this.__updateAvatar)
            },
            __updateAvatar: function() {
                var t = this;
                new a({
                    events: {
                        onok: function(e) {
                            $(t).find("#j-sideAvatar").attr("src", e)
                        }
                    }
                })
            },
            __initUserCouponNum: function() {
                var t = s.count();
                t.done(function(t) {
                    var e = 0;
                    t.data.count && t.data.count > 0 && (e = t.data.count),
                    $(".j-userCouponNum").text("优惠券（" + e + "）")
                }),
                t.fail(function() {
                    $(".j-userCouponNum").text("优惠券（0）")
                })
            },
            __initEnterpriseLogo: function() {
                var t = r.getEnterpriseInfo();
                t.done(function(t) {
                    var e = t.data;
                    1 == e.isEnterpriseMember && $("#j-logo").removeClass("hidden").attr("title", e.enterpriseName).css("background-image", "url(" + e.iconUrl + ")")
                })
            }
        }),
        t.exports = UcenterModule
    },
    46 : function(t, e, i) {
        var n = i(9),
        o = {
            _ajax: function(t, e, i, o) {
                var s = e || {},
                a = $.Deferred();
                return n.ajax({
                    url: t,
                    data: s,
                    success: function(t) {
                        a.resolve(t)
                    },
                    error: function(t, e, i) {
                        a.reject(t, e, i)
                    },
                    type: i || "POST",
                    contentType: o || ""
                }),
                a
            },
            saveDetail: function(t) {
                return this._ajax("/xhr/user/saveDetail.json", t, "POST")
            },
            getDetail: function(t) {
                return this._ajax("/xhr/user/getDetail.json", t, "GET")
            },
            getSimple: function(t) {
                return this._ajax("/xhr/user/getSimple.json", t, "GET")
            },
            saveAvatar: function(t) {
                return this._ajax("/xhr/user/saveAvatar.json", t, "GET")
            },
            getInterestedCate: function(t) {
                return o._ajax("/xhr/interestCategory/list.json", t, "GET")
            },
            saveInterestedCate: function(t) {
                return o._ajax("/xhr/interestCategory/upsert.json", t, "POST", "application/json")
            }
        };
        t.exports = o
    },
    47 : function(t, e, i) {
        var n = (i(2), i(4)),
        o = i(6),
        s = i(46);
        i(13);
        i(25),
        i(26),
        i(27),
        i(48);
        var a = '<div>                      <div class="w-title">设置头像</div>                     <div class="m-avatarUploadWarp j-avatarUploadWarp">                         <div class="w-button w-button-avatarUpload">                                <input class="fileInput j-fileInput" type="file" name="file"  accept="image/*">                             <div class="uploadText">点击上传图片</div>                            </div>                          <div class="w-uploadTips">支持JPEG/BMP/PNG</div>                      </div>                      <div class="j-imageBoxWarp"></div>                      <a class="w-button w-button-primary w-button-l pos-l j-ok bottom50">保存</a>                      <a class="w-button w-button-l pos-r j-cancel bottom50">取消</a>                       <div class="tips j-tips"></div></div>',
        r = '<div class="w-uploadImg">                              <div style="height:295px;"><img class="img"/></div>                             <a class="modify w-icon-normal icon-normal-camera j-fileInput" href="javascript:;">                             <input class="fileInput j-fileModifyInput" type="file" name="file"  accept="image/*"></a>                               <div class="progress">0%</div></div>';
        o($);
        var l = n.extend({
            __config: function(t) {
                this.__existUploadImg = !1,
                this.__saveData = {}
            },
            __init: function(t) {
                this.__supr(t),
                this.__initNode()
            },
            __initNode: function() {
                this.__body = $(a).showDialog({
                    clsName: "m-pop-avatar"
                });
                var t = this.__body.find(".j-ok").first(),
                e = this.__body.find(".j-cancel").first();
                t.click($.proxy(this.__onOkCallback, this)),
                e.click($.proxy(this.__onCancelCallback, this)),
                this.__uploadImage()
            },
            __onOkCallback: function() {
                var t = "",
                e = this;
                if (void 0 == this.__saveData.imgUrl) return void this.__onShowTips("请上传头像");
                t = this.__saveData.imgUrl,
                t += void 0 != this.__saveData.crop ? "?imageView&crop=" + this.__saveData.crop.x + "_" + this.__saveData.crop.y + "_" + this.__saveData.crop.width + "_" + this.__saveData.crop.height + "&quality=95&thumbnail=100y100": "?imageView&quality=95&thumbnail=100y100";
                var i = s.saveAvatar({
                    avatar: t
                });
                i.done(function(i) {
                    var n = "",
                    o = i.data || {};
                    void 0 != typeof membershipOn && 1 == membershipOn && o.scoreData && (n = "成长值 +" + o.scoreData),
                    this.__onShowTips("头像保存成功！ " + n),
                    this._$emit("onok", t),
                    setTimeout(function() {
                        e.__body.closeDialog()
                    },
                    3e3)
                }.bind(this)),
                i.fail(function(t, e) {
                    this.__onShowTips(e || "头像保存失败")
                }.bind(this))
            },
            __onCancelCallback: function() {
                this.__body.closeDialog(),
                this._$emit("oncancel")
            },
            __onShowTips: function(t) {
                $(".j-tips").text(t).show(),
                setTimeout(function() {
                    $(".j-tips").fadeOut()
                },
                3e3)
            },
            __uploadImage: function() {
                var t = "/xhr/file/upload.json",
                e = this,
                i = {
                    url: t,
                    type: "post",
                    dataType: "json",
                    autoUpload: !1,
                    maxNumberOfFiles: 1,
                    maxFileSize: 2e7,
                    sequentialUploads: !0,
                    formAcceptCharset: "UTF-8",
                    acceptFileTypes: /(\.|\/)(gif|jpe?g|bmp|png)$/i,
                    messages: {
                        maxFileSize: "您上传的图片太大了",
                        acceptFileTypes: "只能上传gif,jpg,jpeg,png,bmp格式的图片"
                    }
                },
                n = this.__body.find(".j-fileInput").first(),
                o = this.__body.find(".j-imageBoxWarp").first(),
                s = this.__body.find(".j-avatarUploadWarp").first();
                this.__existUploadImg && (n = this.__body.find(".j-fileModifyInput").first(), n.off("fileuploaddone fileuploadfail fileuploadprocessalways fileuploadprogress")),
                n.fileupload(i).bind("fileuploaddone",
                function(t, i) {
                    if (void 0 != i.context) {
                        var n = i.result,
                        o = i.context,
                        s = o.find(".img"),
                        r = o.find(".progress");
                        $fileModifyInput = o.find(".j-fileModifyInput"),
                        "200" == n.code ? (e.__existUploadImg = !0, e.__saveData.imgUrl = n.data[0], r.hide(), $("<img>").attr("src", n.data[0]).load(function() {
                            this.width / this.height > 1 ? (s.css("width", "100%"), s.css("height", "auto")) : (s.css("width", "auto"), s.css("height", "100%")),
                            s.attr("src", n.data[0])
                        }), setTimeout(function() {
                            s.cropper({
                                aspectRatio: 1,
                                checkCrossOrigin: !1,
                                checkOrientation: !1,
                                autoCropArea: .8,
                                scalable: !1,
                                zoomOnWheel: !1,
                                crop: function(t) {
                                    e.__saveData.crop = {
                                        x: t.x < 0 ? 0 : Math.floor(t.x),
                                        y: t.y < 0 ? 0 : Math.floor(t.y),
                                        width: Math.floor(t.width),
                                        height: Math.floor(t.height)
                                    }
                                }
                            })
                        },
                        500), $fileModifyInput.on("click", e.__uploadImage.bind(e))) : a.bind(e, n.errorCode || "图片上传失败")()
                    }
                }).bind("fileuploadfail",
                function(t, i) {
                    a.bind(e, "图片上传失败")()
                }).bind("fileuploadprocessalways ",
                function(t, i) {
                    var n = i.index,
                    l = i.files[n];
                    l.error ? a.bind(e, "图片上传失败")() : (0 == e.__existUploadImg ? (s.hide(), i.context = o.html(r)) : i.context = o, i.context.find(".img").cropper("destroy"), i.submit())
                }).bind("fileuploadprogress",
                function(t, e) {
                    if (void 0 != e.context) {
                        var i = parseInt(e.loaded / e.total * 100, 10) + "%",
                        n = e.context.find(".progress").show();
                        n.length > 0 && n.text(i)
                    }
                });
                var a = function(t) {
                    this.__existUploadImg || (s.show(), o.hide()),
                    this.__onShowTips(t)
                }
            }
        });
        t.exports = l
    },
    48 : function(t, e) { !
        function(t) {
            "use strict";
            function e(t) {
                return "number" == typeof t && !isNaN(t)
            }
            function i(t) {
                return "undefined" == typeof t
            }
            function n(t, i) {
                var n = [];
                return e(i) && n.push(i),
                n.slice.apply(t, n)
            }
            function o(t, e) {
                var i = n(arguments, 2);
                return function() {
                    return t.apply(e, i.concat(n(arguments)))
                }
            }
            function s(t) {
                var e = t.match(/^(https?:)\/\/([^\:\/\?#]+):?(\d*)/i);
                return e && (e[1] !== w.protocol || e[2] !== w.hostname || e[3] !== w.port)
            }
            function a(t) {
                var e = "timestamp=" + (new Date).getTime();
                return t + ( - 1 === t.indexOf("?") ? "?": "&") + e
            }
            function r(t) {
                return t ? ' crossOrigin="' + t + '"': ""
            }
            function l(t, e) {
                var i;
                return t.naturalWidth && !mt ? e(t.naturalWidth, t.naturalHeight) : (i = document.createElement("img"), i.onload = function() {
                    e(this.width, this.height)
                },
                void(i.src = t.src))
            }
            function d(t) {
                var i = [],
                n = t.rotate,
                o = t.scaleX,
                s = t.scaleY;
                return e(n) && i.push("rotate(" + n + "deg)"),
                e(o) && e(s) && i.push("scale(" + o + "," + s + ")"),
                i.length ? i.join(" ") : "none"
            }
            function c(t, e) {
                var i, n, o = wt(t.degree) % 180,
                s = (o > 90 ? 180 - o: o) * Math.PI / 180,
                a = bt(s),
                r = xt(s),
                l = t.width,
                d = t.height,
                c = t.aspectRatio;
                return e ? (i = l / (r + a / c), n = i / c) : (i = l * r + d * a, n = l * a + d * r),
                {
                    width: i,
                    height: n
                }
            }
            function u(i, n) {
                var o, s, a, r = t("<canvas>")[0],
                l = r.getContext("2d"),
                d = 0,
                u = 0,
                h = n.naturalWidth,
                p = n.naturalHeight,
                f = n.rotate,
                g = n.scaleX,
                m = n.scaleY,
                v = e(g) && e(m) && (1 !== g || 1 !== m),
                _ = e(f) && 0 !== f,
                y = _ || v,
                w = h * wt(g || 1),
                b = p * wt(m || 1);
                return v && (o = w / 2, s = b / 2),
                _ && (a = c({
                    width: w,
                    height: b,
                    degree: f
                }), w = a.width, b = a.height, o = w / 2, s = b / 2),
                r.width = w,
                r.height = b,
                y && (d = -h / 2, u = -p / 2, l.save(), l.translate(o, s)),
                _ && l.rotate(f * Math.PI / 180),
                v && l.scale(g, m),
                l.drawImage(i, kt(d), kt(u), kt(h), kt(p)),
                y && l.restore(),
                r
            }
            function h(e) {
                var i = e.length,
                n = 0,
                o = 0;
                return i && (t.each(e,
                function(t, e) {
                    n += e.pageX,
                    o += e.pageY
                }), n /= i, o /= i),
                {
                    pageX: n,
                    pageY: o
                }
            }
            function p(t, e, i) {
                var n, o = "";
                for (n = e, i += e; i > n; n++) o += Tt(t.getUint8(n));
                return o
            }
            function f(t) {
                var e, i, n, o, s, a, r, l, d, c, u = new C(t),
                h = u.byteLength;
                if (255 === u.getUint8(0) && 216 === u.getUint8(1)) for (d = 2; h > d;) {
                    if (255 === u.getUint8(d) && 225 === u.getUint8(d + 1)) {
                        r = d;
                        break
                    }
                    d++
                }
                if (r && (i = r + 4, n = r + 10, "Exif" === p(u, i, 4) && (a = u.getUint16(n), s = 18761 === a, (s || 19789 === a) && 42 === u.getUint16(n + 2, s) && (o = u.getUint32(n + 4, s), o >= 8 && (l = n + o)))), l) for (h = u.getUint16(l, s), c = 0; h > c; c++) if (d = l + 12 * c + 2, 274 === u.getUint16(d, s)) {
                    d += 8,
                    e = u.getUint16(d, s),
                    mt && u.setUint16(d, 1, s);
                    break
                }
                return e
            }
            function g(t) {
                var e, i = t.replace(Z, ""),
                n = atob(i),
                o = n.length,
                s = new x(o),
                a = new $(s);
                for (e = 0; o > e; e++) a[e] = n.charCodeAt(e);
                return s
            }
            function m(t) {
                var e, i = new $(t),
                n = i.length,
                o = "";
                for (e = 0; n > e; e++) o += Tt(i[e]);
                return "data:image/jpeg;base64," + k(o)
            }
            function v(e, i) {
                this.$element = t(e),
                this.options = t.extend({},
                v.DEFAULTS, t.isPlainObject(i) && i),
                this.isLoaded = !1,
                this.isBuilt = !1,
                this.isCompleted = !1,
                this.isRotated = !1,
                this.isCropped = !1,
                this.isDisabled = !1,
                this.isReplaced = !1,
                this.isLimited = !1,
                this.wheeling = !1,
                this.isImg = !1,
                this.originalUrl = "",
                this.canvas = null,
                this.cropBox = null,
                this.init()
            }
            var _ = t(window),
            y = t(document),
            w = window.location,
            b = window.navigator,
            x = window.ArrayBuffer,
            $ = window.Uint8Array,
            C = window.DataView,
            k = window.btoa,
            T = "cropper",
            j = "cropper-modal",
            S = "cropper-hide",
            D = "cropper-hidden",
            I = "cropper-invisible",
            P = "cropper-move",
            O = "cropper-crop",
            A = "cropper-disabled",
            E = "cropper-bg",
            U = "mousedown touchstart pointerdown MSPointerDown",
            M = "mousemove touchmove pointermove MSPointerMove",
            N = "mouseup touchend touchcancel pointerup pointercancel MSPointerUp MSPointerCancel",
            F = "wheel mousewheel DOMMouseScroll",
            B = "dblclick",
            L = "load." + T,
            H = "error." + T,
            R = "resize." + T,
            z = "build." + T,
            W = "built." + T,
            X = "cropstart." + T,
            q = "cropmove." + T,
            Y = "cropend." + T,
            G = "crop." + T,
            Q = "zoom." + T,
            K = /e|w|s|n|se|sw|ne|nw|all|crop|move|zoom/,
            V = /^data\:/,
            Z = /^data\:([^\;]+)\;base64,/,
            J = /^data\:image\/jpeg.*;base64,/,
            tt = "preview",
            et = "action",
            it = "e",
            nt = "w",
            ot = "s",
            st = "n",
            at = "se",
            rt = "sw",
            lt = "ne",
            dt = "nw",
            ct = "all",
            ut = "crop",
            ht = "move",
            pt = "zoom",
            ft = "none",
            gt = t.isFunction(t("<canvas>")[0].getContext),
            mt = b && /safari/i.test(b.userAgent) && /apple computer/i.test(b.vendor),
            vt = Number,
            _t = Math.min,
            yt = Math.max,
            wt = Math.abs,
            bt = Math.sin,
            xt = Math.cos,
            $t = Math.sqrt,
            Ct = Math.round,
            kt = Math.floor,
            Tt = String.fromCharCode;
            v.prototype = {
                constructor: v,
                init: function() {
                    var t, e = this.$element;
                    if (e.is("img")) {
                        if (this.isImg = !0, this.originalUrl = t = e.attr("src"), !t) return;
                        t = e.prop("src")
                    } else e.is("canvas") && gt && (t = e[0].toDataURL());
                    this.load(t)
                },
                trigger: function(e, i) {
                    var n = t.Event(e, i);
                    return this.$element.trigger(n),
                    n
                },
                load: function(e) {
                    var i, n, o = this.options,
                    s = this.$element;
                    if (e && (s.one(z, o.build), !this.trigger(z).isDefaultPrevented())) {
                        if (this.url = e, this.image = {},
                        !o.checkOrientation || !x) return this.clone();
                        if (i = t.proxy(this.read, this), V.test(e)) return J.test(e) ? i(g(e)) : this.clone();
                        n = new XMLHttpRequest,
                        n.onerror = n.onabort = t.proxy(function() {
                            this.clone()
                        },
                        this),
                        n.onload = function() {
                            i(this.response)
                        },
                        n.open("get", e),
                        n.responseType = "arraybuffer",
                        n.send()
                    }
                },
                read: function(t) {
                    var e, i, n, o = this.options,
                    s = f(t),
                    a = this.image;
                    if (s > 1) switch (this.url = m(t), s) {
                    case 2:
                        i = -1;
                        break;
                    case 3:
                        e = -180;
                        break;
                    case 4:
                        n = -1;
                        break;
                    case 5:
                        e = 90,
                        n = -1;
                        break;
                    case 6:
                        e = 90;
                        break;
                    case 7:
                        e = 90,
                        i = -1;
                        break;
                    case 8:
                        e = -90
                    }
                    o.rotatable && (a.rotate = e),
                    o.scalable && (a.scaleX = i, a.scaleY = n),
                    this.clone()
                },
                clone: function() {
                    var e, i, n = this.options,
                    o = this.$element,
                    l = this.url,
                    d = "";
                    n.checkCrossOrigin && s(l) && (d = o.prop("crossOrigin"), d ? e = l: (d = "anonymous", e = a(l))),
                    this.crossOrigin = d,
                    this.crossOriginUrl = e,
                    this.$clone = i = t("<img" + r(d) + ' src="' + (e || l) + '">'),
                    this.isImg ? o[0].complete ? this.start() : o.one(L, t.proxy(this.start, this)) : i.one(L, t.proxy(this.start, this)).one(H, t.proxy(this.stop, this)).addClass(S).insertAfter(o)
                },
                start: function() {
                    var e = this.$element,
                    i = this.$clone;
                    this.isImg || (i.off(H, this.stop), e = i),
                    l(e[0], t.proxy(function(e, i) {
                        t.extend(this.image, {
                            naturalWidth: e,
                            naturalHeight: i,
                            aspectRatio: e / i
                        }),
                        this.isLoaded = !0,
                        this.build()
                    },
                    this))
                },
                stop: function() {
                    this.$clone.remove(),
                    this.$clone = null
                },
                build: function() {
                    var e, i, n, o = this.options,
                    s = this.$element,
                    a = this.$clone;
                    this.isLoaded && (this.isBuilt && this.unbuild(), this.$container = s.parent(), this.$cropper = e = t(v.TEMPLATE), this.$canvas = e.find(".cropper-canvas").append(a), this.$dragBox = e.find(".cropper-drag-box"), this.$cropBox = i = e.find(".cropper-crop-box"), this.$viewBox = e.find(".cropper-view-box"), this.$face = n = i.find(".cropper-face"), s.addClass(D).after(e), this.isImg || a.removeClass(S), this.initPreview(), this.bind(), o.aspectRatio = yt(0, o.aspectRatio) || NaN, o.viewMode = yt(0, _t(3, Ct(o.viewMode))) || 0, o.autoCrop ? (this.isCropped = !0, o.modal && this.$dragBox.addClass(j)) : i.addClass(D), o.guides || i.find(".cropper-dashed").addClass(D), o.center || i.find(".cropper-center").addClass(D), o.cropBoxMovable && n.addClass(P).data(et, ct), o.highlight || n.addClass(I), o.background && e.addClass(E), o.cropBoxResizable || i.find(".cropper-line, .cropper-point").addClass(D), this.setDragMode(o.dragMode), this.render(), this.isBuilt = !0, this.setData(o.data), s.one(W, o.built), setTimeout(t.proxy(function() {
                        this.trigger(W),
                        this.isCompleted = !0
                    },
                    this), 0))
                },
                unbuild: function() {
                    this.isBuilt && (this.isBuilt = !1, this.isCompleted = !1, this.initialImage = null, this.initialCanvas = null, this.initialCropBox = null, this.container = null, this.canvas = null, this.cropBox = null, this.unbind(), this.resetPreview(), this.$preview = null, this.$viewBox = null, this.$cropBox = null, this.$dragBox = null, this.$canvas = null, this.$container = null, this.$cropper.remove(), this.$cropper = null)
                },
                render: function() {
                    this.initContainer(),
                    this.initCanvas(),
                    this.initCropBox(),
                    this.renderCanvas(),
                    this.isCropped && this.renderCropBox()
                },
                initContainer: function() {
                    var t = this.options,
                    e = this.$element,
                    i = this.$container,
                    n = this.$cropper;
                    n.addClass(D),
                    e.removeClass(D),
                    n.css(this.container = {
                        width: yt(i.width(), vt(t.minContainerWidth) || 200),
                        height: yt(i.height(), vt(t.minContainerHeight) || 300)
                    }),
                    e.addClass(D),
                    n.removeClass(D)
                },
                initCanvas: function() {
                    var e, i = this.options.viewMode,
                    n = this.container,
                    o = n.width,
                    s = n.height,
                    a = this.image,
                    r = a.naturalWidth,
                    l = a.naturalHeight,
                    d = 90 === wt(a.rotate),
                    c = d ? l: r,
                    u = d ? r: l,
                    h = c / u,
                    p = o,
                    f = s;
                    s * h > o ? 3 === i ? p = s * h: f = o / h: 3 === i ? f = o / h: p = s * h,
                    e = {
                        naturalWidth: c,
                        naturalHeight: u,
                        aspectRatio: h,
                        width: p,
                        height: f
                    },
                    e.oldLeft = e.left = (o - p) / 2,
                    e.oldTop = e.top = (s - f) / 2,
                    this.canvas = e,
                    this.isLimited = 1 === i || 2 === i,
                    this.limitCanvas(!0, !0),
                    this.initialImage = t.extend({},
                    a),
                    this.initialCanvas = t.extend({},
                    e)
                },
                limitCanvas: function(t, e) {
                    var i, n, o, s, a = this.options,
                    r = a.viewMode,
                    l = this.container,
                    d = l.width,
                    c = l.height,
                    u = this.canvas,
                    h = u.aspectRatio,
                    p = this.cropBox,
                    f = this.isCropped && p;
                    t && (i = vt(a.minCanvasWidth) || 0, n = vt(a.minCanvasHeight) || 0, r && (r > 1 ? (i = yt(i, d), n = yt(n, c), 3 === r && (n * h > i ? i = n * h: n = i / h)) : i ? i = yt(i, f ? p.width: 0) : n ? n = yt(n, f ? p.height: 0) : f && (i = p.width, n = p.height, n * h > i ? i = n * h: n = i / h)), i && n ? n * h > i ? n = i / h: i = n * h: i ? n = i / h: n && (i = n * h), u.minWidth = i, u.minHeight = n, u.maxWidth = 1 / 0, u.maxHeight = 1 / 0),
                    e && (r ? (o = d - u.width, s = c - u.height, u.minLeft = _t(0, o), u.minTop = _t(0, s), u.maxLeft = yt(0, o), u.maxTop = yt(0, s), f && this.isLimited && (u.minLeft = _t(p.left, p.left + p.width - u.width), u.minTop = _t(p.top, p.top + p.height - u.height), u.maxLeft = p.left, u.maxTop = p.top, 2 === r && (u.width >= d && (u.minLeft = _t(0, o), u.maxLeft = yt(0, o)), u.height >= c && (u.minTop = _t(0, s), u.maxTop = yt(0, s))))) : (u.minLeft = -u.width, u.minTop = -u.height, u.maxLeft = d, u.maxTop = c))
                },
                renderCanvas: function(t) {
                    var e, i, n = this.canvas,
                    o = this.image,
                    s = o.rotate,
                    a = o.naturalWidth,
                    r = o.naturalHeight;
                    this.isRotated && (this.isRotated = !1, i = c({
                        width: o.width,
                        height: o.height,
                        degree: s
                    }), e = i.width / i.height, e !== n.aspectRatio && (n.left -= (i.width - n.width) / 2, n.top -= (i.height - n.height) / 2, n.width = i.width, n.height = i.height, n.aspectRatio = e, n.naturalWidth = a, n.naturalHeight = r, s % 180 && (i = c({
                        width: a,
                        height: r,
                        degree: s
                    }), n.naturalWidth = i.width, n.naturalHeight = i.height), this.limitCanvas(!0, !1))),
                    (n.width > n.maxWidth || n.width < n.minWidth) && (n.left = n.oldLeft),
                    (n.height > n.maxHeight || n.height < n.minHeight) && (n.top = n.oldTop),
                    n.width = _t(yt(n.width, n.minWidth), n.maxWidth),
                    n.height = _t(yt(n.height, n.minHeight), n.maxHeight),
                    this.limitCanvas(!1, !0),
                    n.oldLeft = n.left = _t(yt(n.left, n.minLeft), n.maxLeft),
                    n.oldTop = n.top = _t(yt(n.top, n.minTop), n.maxTop),
                    this.$canvas.css({
                        width: n.width,
                        height: n.height,
                        left: n.left,
                        top: n.top
                    }),
                    this.renderImage(),
                    this.isCropped && this.isLimited && this.limitCropBox(!0, !0),
                    t && this.output()
                },
                renderImage: function(e) {
                    var i, n = this.canvas,
                    o = this.image;
                    o.rotate && (i = c({
                        width: n.width,
                        height: n.height,
                        degree: o.rotate,
                        aspectRatio: o.aspectRatio
                    },
                    !0)),
                    t.extend(o, i ? {
                        width: i.width,
                        height: i.height,
                        left: (n.width - i.width) / 2,
                        top: (n.height - i.height) / 2
                    }: {
                        width: n.width,
                        height: n.height,
                        left: 0,
                        top: 0
                    }),
                    this.$clone.css({
                        width: o.width,
                        height: o.height,
                        marginLeft: o.left,
                        marginTop: o.top,
                        transform: d(o)
                    }),
                    e && this.output()
                },
                initCropBox: function() {
                    var e = this.options,
                    i = this.canvas,
                    n = e.aspectRatio,
                    o = vt(e.autoCropArea) || .8,
                    s = {
                        width: i.width,
                        height: i.height
                    };
                    n && (i.height * n > i.width ? s.height = s.width / n: s.width = s.height * n),
                    this.cropBox = s,
                    this.limitCropBox(!0, !0),
                    s.width = _t(yt(s.width, s.minWidth), s.maxWidth),
                    s.height = _t(yt(s.height, s.minHeight), s.maxHeight),
                    s.width = yt(s.minWidth, s.width * o),
                    s.height = yt(s.minHeight, s.height * o),
                    s.oldLeft = s.left = i.left + (i.width - s.width) / 2,
                    s.oldTop = s.top = i.top + (i.height - s.height) / 2,
                    this.initialCropBox = t.extend({},
                    s)
                },
                limitCropBox: function(t, e) {
                    var i, n, o, s, a = this.options,
                    r = a.aspectRatio,
                    l = this.container,
                    d = l.width,
                    c = l.height,
                    u = this.canvas,
                    h = this.cropBox,
                    p = this.isLimited;
                    t && (i = vt(a.minCropBoxWidth) || 0, n = vt(a.minCropBoxHeight) || 0, i = _t(i, d), n = _t(n, c), o = _t(d, p ? u.width: d), s = _t(c, p ? u.height: c), r && (i && n ? n * r > i ? n = i / r: i = n * r: i ? n = i / r: n && (i = n * r), s * r > o ? s = o / r: o = s * r), h.minWidth = _t(i, o), h.minHeight = _t(n, s), h.maxWidth = o, h.maxHeight = s),
                    e && (p ? (h.minLeft = yt(0, u.left), h.minTop = yt(0, u.top), h.maxLeft = _t(d, u.left + u.width) - h.width, h.maxTop = _t(c, u.top + u.height) - h.height) : (h.minLeft = 0, h.minTop = 0, h.maxLeft = d - h.width, h.maxTop = c - h.height))
                },
                renderCropBox: function() {
                    var t = this.options,
                    e = this.container,
                    i = e.width,
                    n = e.height,
                    o = this.cropBox; (o.width > o.maxWidth || o.width < o.minWidth) && (o.left = o.oldLeft),
                    (o.height > o.maxHeight || o.height < o.minHeight) && (o.top = o.oldTop),
                    o.width = _t(yt(o.width, o.minWidth), o.maxWidth),
                    o.height = _t(yt(o.height, o.minHeight), o.maxHeight),
                    this.limitCropBox(!1, !0),
                    o.oldLeft = o.left = _t(yt(o.left, o.minLeft), o.maxLeft),
                    o.oldTop = o.top = _t(yt(o.top, o.minTop), o.maxTop),
                    t.movable && t.cropBoxMovable && this.$face.data(et, o.width === i && o.height === n ? ht: ct),
                    this.$cropBox.css({
                        width: o.width,
                        height: o.height,
                        left: o.left,
                        top: o.top
                    }),
                    this.isCropped && this.isLimited && this.limitCanvas(!0, !0),
                    this.isDisabled || this.output()
                },
                output: function() {
                    this.preview(),
                    this.isCompleted ? this.trigger(G, this.getData()) : this.isBuilt || this.$element.one(W, t.proxy(function() {
                        this.trigger(G, this.getData())
                    },
                    this))
                },
                initPreview: function() {
                    var e, i = r(this.crossOrigin),
                    n = i ? this.crossOriginUrl: this.url;
                    this.$preview = t(this.options.preview),
                    this.$clone2 = e = t("<img" + i + ' src="' + n + '">'),
                    this.$viewBox.html(e),
                    this.$preview.each(function() {
                        var e = t(this);
                        e.data(tt, {
                            width: e.width(),
                            height: e.height(),
                            html: e.html()
                        }),
                        e.html("<img" + i + ' src="' + n + '" style="display:block;width:100%;height:auto;min-width:0!important;min-height:0!important;max-width:none!important;max-height:none!important;image-orientation:0deg!important;">')
                    })
                },
                resetPreview: function() {
                    this.$preview.each(function() {
                        var e = t(this),
                        i = e.data(tt);
                        e.css({
                            width: i.width,
                            height: i.height
                        }).html(i.html).removeData(tt)
                    })
                },
                preview: function() {
                    var e = this.image,
                    i = this.canvas,
                    n = this.cropBox,
                    o = n.width,
                    s = n.height,
                    a = e.width,
                    r = e.height,
                    l = n.left - i.left - e.left,
                    c = n.top - i.top - e.top;
                    this.isCropped && !this.isDisabled && (this.$clone2.css({
                        width: a,
                        height: r,
                        marginLeft: -l,
                        marginTop: -c,
                        transform: d(e)
                    }), this.$preview.each(function() {
                        var i = t(this),
                        n = i.data(tt),
                        u = n.width,
                        h = n.height,
                        p = u,
                        f = h,
                        g = 1;
                        o && (g = u / o, f = s * g),
                        s && f > h && (g = h / s, p = o * g, f = h),
                        i.css({
                            width: p,
                            height: f
                        }).find("img").css({
                            width: a * g,
                            height: r * g,
                            marginLeft: -l * g,
                            marginTop: -c * g,
                            transform: d(e)
                        })
                    }))
                },
                bind: function() {
                    var e = this.options,
                    i = this.$element,
                    n = this.$cropper;
                    t.isFunction(e.cropstart) && i.on(X, e.cropstart),
                    t.isFunction(e.cropmove) && i.on(q, e.cropmove),
                    t.isFunction(e.cropend) && i.on(Y, e.cropend),
                    t.isFunction(e.crop) && i.on(G, e.crop),
                    t.isFunction(e.zoom) && i.on(Q, e.zoom),
                    n.on(U, t.proxy(this.cropStart, this)),
                    e.zoomable && e.zoomOnWheel && n.on(F, t.proxy(this.wheel, this)),
                    e.toggleDragModeOnDblclick && n.on(B, t.proxy(this.dblclick, this)),
                    y.on(M, this._cropMove = o(this.cropMove, this)).on(N, this._cropEnd = o(this.cropEnd, this)),
                    e.responsive && _.on(R, this._resize = o(this.resize, this))
                },
                unbind: function() {
                    var e = this.options,
                    i = this.$element,
                    n = this.$cropper;
                    t.isFunction(e.cropstart) && i.off(X, e.cropstart),
                    t.isFunction(e.cropmove) && i.off(q, e.cropmove),
                    t.isFunction(e.cropend) && i.off(Y, e.cropend),
                    t.isFunction(e.crop) && i.off(G, e.crop),
                    t.isFunction(e.zoom) && i.off(Q, e.zoom),
                    n.off(U, this.cropStart),
                    e.zoomable && e.zoomOnWheel && n.off(F, this.wheel),
                    e.toggleDragModeOnDblclick && n.off(B, this.dblclick),
                    y.off(M, this._cropMove).off(N, this._cropEnd),
                    e.responsive && _.off(R, this._resize)
                },
                resize: function() {
                    var e, i, n, o = this.options.restore,
                    s = this.$container,
                    a = this.container; ! this.isDisabled && a && (n = s.width() / a.width, (1 !== n || s.height() !== a.height) && (o && (e = this.getCanvasData(), i = this.getCropBoxData()), this.render(), o && (this.setCanvasData(t.each(e,
                    function(t, i) {
                        e[t] = i * n
                    })), this.setCropBoxData(t.each(i,
                    function(t, e) {
                        i[t] = e * n
                    })))))
                },
                dblclick: function() {
                    this.isDisabled || (this.$dragBox.hasClass(O) ? this.setDragMode(ht) : this.setDragMode(ut))
                },
                wheel: function(e) {
                    var i = e.originalEvent || e,
                    n = vt(this.options.wheelZoomRatio) || .1,
                    o = 1;
                    this.isDisabled || (e.preventDefault(), this.wheeling || (this.wheeling = !0, setTimeout(t.proxy(function() {
                        this.wheeling = !1
                    },
                    this), 50), i.deltaY ? o = i.deltaY > 0 ? 1 : -1 : i.wheelDelta ? o = -i.wheelDelta / 120 : i.detail && (o = i.detail > 0 ? 1 : -1), this.zoom( - o * n, e)))
                },
                cropStart: function(e) {
                    var i, n, o = this.options,
                    s = e.originalEvent,
                    a = s && s.touches,
                    r = e;
                    if (!this.isDisabled) {
                        if (a) {
                            if (i = a.length, i > 1) {
                                if (!o.zoomable || !o.zoomOnTouch || 2 !== i) return;
                                r = a[1],
                                this.startX2 = r.pageX,
                                this.startY2 = r.pageY,
                                n = pt
                            }
                            r = a[0]
                        }
                        if (n = n || t(r.target).data(et), K.test(n)) {
                            if (this.trigger(X, {
                                originalEvent: s,
                                action: n
                            }).isDefaultPrevented()) return;
                            e.preventDefault(),
                            this.action = n,
                            this.cropping = !1,
                            this.startX = r.pageX || s && s.pageX,
                            this.startY = r.pageY || s && s.pageY,
                            n === ut && (this.cropping = !0, this.$dragBox.addClass(j))
                        }
                    }
                },
                cropMove: function(t) {
                    var e, i = this.options,
                    n = t.originalEvent,
                    o = n && n.touches,
                    s = t,
                    a = this.action;
                    if (!this.isDisabled) {
                        if (o) {
                            if (e = o.length, e > 1) {
                                if (!i.zoomable || !i.zoomOnTouch || 2 !== e) return;
                                s = o[1],
                                this.endX2 = s.pageX,
                                this.endY2 = s.pageY
                            }
                            s = o[0]
                        }
                        if (a) {
                            if (this.trigger(q, {
                                originalEvent: n,
                                action: a
                            }).isDefaultPrevented()) return;
                            t.preventDefault(),
                            this.endX = s.pageX || n && n.pageX,
                            this.endY = s.pageY || n && n.pageY,
                            this.change(s.shiftKey, a === pt ? t: null)
                        }
                    }
                },
                cropEnd: function(t) {
                    var e = t.originalEvent,
                    i = this.action;
                    this.isDisabled || i && (t.preventDefault(), this.cropping && (this.cropping = !1, this.$dragBox.toggleClass(j, this.isCropped && this.options.modal)), this.action = "", this.trigger(Y, {
                        originalEvent: e,
                        action: i
                    }))
                },
                change: function(t, e) {
                    var i, n, o = this.options,
                    s = o.aspectRatio,
                    a = this.action,
                    r = this.container,
                    l = this.canvas,
                    d = this.cropBox,
                    c = d.width,
                    u = d.height,
                    h = d.left,
                    p = d.top,
                    f = h + c,
                    g = p + u,
                    m = 0,
                    v = 0,
                    _ = r.width,
                    y = r.height,
                    w = !0;
                    switch (!s && t && (s = c && u ? c / u: 1), this.limited && (m = d.minLeft, v = d.minTop, _ = m + _t(r.width, l.left + l.width), y = v + _t(r.height, l.top + l.height)), n = {
                        x: this.endX - this.startX,
                        y: this.endY - this.startY
                    },
                    s && (n.X = n.y * s, n.Y = n.x / s), a) {
                    case ct:
                        h += n.x,
                        p += n.y;
                        break;
                    case it:
                        if (n.x >= 0 && (f >= _ || s && (v >= p || g >= y))) {
                            w = !1;
                            break
                        }
                        c += n.x,
                        s && (u = c / s, p -= n.Y / 2),
                        0 > c && (a = nt, c = 0);
                        break;
                    case st:
                        if (n.y <= 0 && (v >= p || s && (m >= h || f >= _))) {
                            w = !1;
                            break
                        }
                        u -= n.y,
                        p += n.y,
                        s && (c = u * s, h += n.X / 2),
                        0 > u && (a = ot, u = 0);
                        break;
                    case nt:
                        if (n.x <= 0 && (m >= h || s && (v >= p || g >= y))) {
                            w = !1;
                            break
                        }
                        c -= n.x,
                        h += n.x,
                        s && (u = c / s, p += n.Y / 2),
                        0 > c && (a = it, c = 0);
                        break;
                    case ot:
                        if (n.y >= 0 && (g >= y || s && (m >= h || f >= _))) {
                            w = !1;
                            break
                        }
                        u += n.y,
                        s && (c = u * s, h -= n.X / 2),
                        0 > u && (a = st, u = 0);
                        break;
                    case lt:
                        if (s) {
                            if (n.y <= 0 && (v >= p || f >= _)) {
                                w = !1;
                                break
                            }
                            u -= n.y,
                            p += n.y,
                            c = u * s
                        } else n.x >= 0 ? _ > f ? c += n.x: n.y <= 0 && v >= p && (w = !1) : c += n.x,
                        n.y <= 0 ? p > v && (u -= n.y, p += n.y) : (u -= n.y, p += n.y);
                        0 > c && 0 > u ? (a = rt, u = 0, c = 0) : 0 > c ? (a = dt, c = 0) : 0 > u && (a = at, u = 0);
                        break;
                    case dt:
                        if (s) {
                            if (n.y <= 0 && (v >= p || m >= h)) {
                                w = !1;
                                break
                            }
                            u -= n.y,
                            p += n.y,
                            c = u * s,
                            h += n.X
                        } else n.x <= 0 ? h > m ? (c -= n.x, h += n.x) : n.y <= 0 && v >= p && (w = !1) : (c -= n.x, h += n.x),
                        n.y <= 0 ? p > v && (u -= n.y, p += n.y) : (u -= n.y, p += n.y);
                        0 > c && 0 > u ? (a = at, u = 0, c = 0) : 0 > c ? (a = lt, c = 0) : 0 > u && (a = rt, u = 0);
                        break;
                    case rt:
                        if (s) {
                            if (n.x <= 0 && (m >= h || g >= y)) {
                                w = !1;
                                break
                            }
                            c -= n.x,
                            h += n.x,
                            u = c / s
                        } else n.x <= 0 ? h > m ? (c -= n.x, h += n.x) : n.y >= 0 && g >= y && (w = !1) : (c -= n.x, h += n.x),
                        n.y >= 0 ? y > g && (u += n.y) : u += n.y;
                        0 > c && 0 > u ? (a = lt, u = 0, c = 0) : 0 > c ? (a = at, c = 0) : 0 > u && (a = dt, u = 0);
                        break;
                    case at:
                        if (s) {
                            if (n.x >= 0 && (f >= _ || g >= y)) {
                                w = !1;
                                break
                            }
                            c += n.x,
                            u = c / s
                        } else n.x >= 0 ? _ > f ? c += n.x: n.y >= 0 && g >= y && (w = !1) : c += n.x,
                        n.y >= 0 ? y > g && (u += n.y) : u += n.y;
                        0 > c && 0 > u ? (a = dt, u = 0, c = 0) : 0 > c ? (a = rt, c = 0) : 0 > u && (a = lt, u = 0);
                        break;
                    case ht:
                        this.move(n.x, n.y),
                        w = !1;
                        break;
                    case pt:
                        this.zoom(function(t, e, i, n) {
                            var o = $t(t * t + e * e),
                            s = $t(i * i + n * n);
                            return (s - o) / o
                        } (wt(this.startX - this.startX2), wt(this.startY - this.startY2), wt(this.endX - this.endX2), wt(this.endY - this.endY2)), e),
                        this.startX2 = this.endX2,
                        this.startY2 = this.endY2,
                        w = !1;
                        break;
                    case ut:
                        if (!n.x || !n.y) {
                            w = !1;
                            break
                        }
                        i = this.$cropper.offset(),
                        h = this.startX - i.left,
                        p = this.startY - i.top,
                        c = d.minWidth,
                        u = d.minHeight,
                        n.x > 0 ? a = n.y > 0 ? at: lt: n.x < 0 && (h -= c, a = n.y > 0 ? rt: dt),
                        n.y < 0 && (p -= u),
                        this.isCropped || (this.$cropBox.removeClass(D), this.isCropped = !0, this.limited && this.limitCropBox(!0, !0))
                    }
                    w && (d.width = c, d.height = u, d.left = h, d.top = p, this.action = a, this.renderCropBox()),
                    this.startX = this.endX,
                    this.startY = this.endY
                },
                crop: function() {
                    this.isBuilt && !this.isDisabled && (this.isCropped || (this.isCropped = !0, this.limitCropBox(!0, !0), this.options.modal && this.$dragBox.addClass(j), this.$cropBox.removeClass(D)), this.setCropBoxData(this.initialCropBox))
                },
                reset: function() {
                    this.isBuilt && !this.isDisabled && (this.image = t.extend({},
                    this.initialImage), this.canvas = t.extend({},
                    this.initialCanvas), this.cropBox = t.extend({},
                    this.initialCropBox), this.renderCanvas(), this.isCropped && this.renderCropBox())
                },
                clear: function() {
                    this.isCropped && !this.isDisabled && (t.extend(this.cropBox, {
                        left: 0,
                        top: 0,
                        width: 0,
                        height: 0
                    }), this.isCropped = !1, this.renderCropBox(), this.limitCanvas(!0, !0), this.renderCanvas(), this.$dragBox.removeClass(j), this.$cropBox.addClass(D))
                },
                replace: function(t, e) { ! this.isDisabled && t && (this.isImg && this.$element.attr("src", t), e ? (this.url = t, this.$clone.attr("src", t), this.isBuilt && this.$preview.find("img").add(this.$clone2).attr("src", t)) : (this.isImg && (this.isReplaced = !0), this.options.data = null, this.load(t)))
                },
                enable: function() {
                    this.isBuilt && (this.isDisabled = !1, this.$cropper.removeClass(A))
                },
                disable: function() {
                    this.isBuilt && (this.isDisabled = !0, this.$cropper.addClass(A))
                },
                destroy: function() {
                    var t = this.$element;
                    this.isLoaded ? (this.isImg && this.isReplaced && t.attr("src", this.originalUrl), this.unbuild(), t.removeClass(D)) : this.isImg ? t.off(L, this.start) : this.$clone && this.$clone.remove(),
                    t.removeData(T)
                },
                move: function(t, e) {
                    var n = this.canvas;
                    this.moveTo(i(t) ? t: n.left + vt(t), i(e) ? e: n.top + vt(e))
                },
                moveTo: function(t, n) {
                    var o = this.canvas,
                    s = !1;
                    i(n) && (n = t),
                    t = vt(t),
                    n = vt(n),
                    this.isBuilt && !this.isDisabled && this.options.movable && (e(t) && (o.left = t, s = !0), e(n) && (o.top = n, s = !0), s && this.renderCanvas(!0))
                },
                zoom: function(t, e) {
                    var i = this.canvas;
                    t = vt(t),
                    t = 0 > t ? 1 / (1 - t) : 1 + t,
                    this.zoomTo(i.width * t / i.naturalWidth, e)
                },
                zoomTo: function(t, e) {
                    var i, n, o, s, a, r = this.options,
                    l = this.canvas,
                    d = l.width,
                    c = l.height,
                    u = l.naturalWidth,
                    p = l.naturalHeight;
                    if (t = vt(t), t >= 0 && this.isBuilt && !this.isDisabled && r.zoomable) {
                        if (n = u * t, o = p * t, e && (i = e.originalEvent), this.trigger(Q, {
                            originalEvent: i,
                            oldRatio: d / u,
                            ratio: n / u
                        }).isDefaultPrevented()) return;
                        i ? (s = this.$cropper.offset(), a = i.touches ? h(i.touches) : {
                            pageX: e.pageX || i.pageX || 0,
                            pageY: e.pageY || i.pageY || 0
                        },
                        l.left -= (n - d) * ((a.pageX - s.left - l.left) / d), l.top -= (o - c) * ((a.pageY - s.top - l.top) / c)) : (l.left -= (n - d) / 2, l.top -= (o - c) / 2),
                        l.width = n,
                        l.height = o,
                        this.renderCanvas(!0)
                    }
                },
                rotate: function(t) {
                    this.rotateTo((this.image.rotate || 0) + vt(t))
                },
                rotateTo: function(t) {
                    t = vt(t),
                    e(t) && this.isBuilt && !this.isDisabled && this.options.rotatable && (this.image.rotate = t % 360, this.isRotated = !0, this.renderCanvas(!0))
                },
                scale: function(t, n) {
                    var o = this.image,
                    s = !1;
                    i(n) && (n = t),
                    t = vt(t),
                    n = vt(n),
                    this.isBuilt && !this.isDisabled && this.options.scalable && (e(t) && (o.scaleX = t, s = !0), e(n) && (o.scaleY = n, s = !0), s && this.renderImage(!0))
                },
                scaleX: function(t) {
                    var i = this.image.scaleY;
                    this.scale(t, e(i) ? i: 1)
                },
                scaleY: function(t) {
                    var i = this.image.scaleX;
                    this.scale(e(i) ? i: 1, t)
                },
                getData: function(e) {
                    var i, n, o = this.options,
                    s = this.image,
                    a = this.canvas,
                    r = this.cropBox;
                    return this.isBuilt && this.isCropped ? (n = {
                        x: r.left - a.left,
                        y: r.top - a.top,
                        width: r.width,
                        height: r.height
                    },
                    i = s.width / s.naturalWidth, t.each(n,
                    function(t, o) {
                        o /= i,
                        n[t] = e ? Ct(o) : o
                    })) : n = {
                        x: 0,
                        y: 0,
                        width: 0,
                        height: 0
                    },
                    o.rotatable && (n.rotate = s.rotate || 0),
                    o.scalable && (n.scaleX = s.scaleX || 1, n.scaleY = s.scaleY || 1),
                    n
                },
                setData: function(i) {
                    var n, o, s, a = this.options,
                    r = this.image,
                    l = this.canvas,
                    d = {};
                    t.isFunction(i) && (i = i.call(this.element)),
                    this.isBuilt && !this.isDisabled && t.isPlainObject(i) && (a.rotatable && e(i.rotate) && i.rotate !== r.rotate && (r.rotate = i.rotate, this.isRotated = n = !0), a.scalable && (e(i.scaleX) && i.scaleX !== r.scaleX && (r.scaleX = i.scaleX, o = !0), e(i.scaleY) && i.scaleY !== r.scaleY && (r.scaleY = i.scaleY, o = !0)), n ? this.renderCanvas() : o && this.renderImage(), s = r.width / r.naturalWidth, e(i.x) && (d.left = i.x * s + l.left), e(i.y) && (d.top = i.y * s + l.top), e(i.width) && (d.width = i.width * s), e(i.height) && (d.height = i.height * s), this.setCropBoxData(d))
                },
                getContainerData: function() {
                    return this.isBuilt ? this.container: {}
                },
                getImageData: function() {
                    return this.isLoaded ? this.image: {}
                },
                getCanvasData: function() {
                    var e = this.canvas,
                    i = {};
                    return this.isBuilt && t.each(["left", "top", "width", "height", "naturalWidth", "naturalHeight"],
                    function(t, n) {
                        i[n] = e[n]
                    }),
                    i
                },
                setCanvasData: function(i) {
                    var n = this.canvas,
                    o = n.aspectRatio;
                    t.isFunction(i) && (i = i.call(this.$element)),
                    this.isBuilt && !this.isDisabled && t.isPlainObject(i) && (e(i.left) && (n.left = i.left), e(i.top) && (n.top = i.top), e(i.width) ? (n.width = i.width, n.height = i.width / o) : e(i.height) && (n.height = i.height, n.width = i.height * o), this.renderCanvas(!0))
                },
                getCropBoxData: function() {
                    var t, e = this.cropBox;
                    return this.isBuilt && this.isCropped && (t = {
                        left: e.left,
                        top: e.top,
                        width: e.width,
                        height: e.height
                    }),
                    t || {}
                },
                setCropBoxData: function(i) {
                    var n, o, s = this.cropBox,
                    a = this.options.aspectRatio;
                    t.isFunction(i) && (i = i.call(this.$element)),
                    this.isBuilt && this.isCropped && !this.isDisabled && t.isPlainObject(i) && (e(i.left) && (s.left = i.left), e(i.top) && (s.top = i.top), e(i.width) && (n = !0, s.width = i.width), e(i.height) && (o = !0, s.height = i.height), a && (n ? s.height = s.width / a: o && (s.width = s.height * a)), this.renderCropBox())
                },
                getCroppedCanvas: function(e) {
                    var i, n, o, s, a, r, l, d, c, h, p;
                    return this.isBuilt && this.isCropped && gt ? (t.isPlainObject(e) || (e = {}), p = this.getData(), i = p.width, n = p.height, d = i / n, t.isPlainObject(e) && (a = e.width, r = e.height, a ? (r = a / d, l = a / i) : r && (a = r * d, l = r / n)), o = kt(a || i), s = kt(r || n), c = t("<canvas>")[0], c.width = o, c.height = s, h = c.getContext("2d"), e.fillColor && (h.fillStyle = e.fillColor, h.fillRect(0, 0, o, s)), h.drawImage.apply(h,
                    function() {
                        var t, e, o, s, a, r, d = u(this.$clone[0], this.image),
                        c = d.width,
                        h = d.height,
                        f = this.canvas,
                        g = [d],
                        m = p.x + f.naturalWidth * (wt(p.scaleX || 1) - 1) / 2,
                        v = p.y + f.naturalHeight * (wt(p.scaleY || 1) - 1) / 2;
                        return - i >= m || m > c ? m = t = o = a = 0 : 0 >= m ? (o = -m, m = 0, t = a = _t(c, i + m)) : c >= m && (o = 0, t = a = _t(i, c - m)),
                        0 >= t || -n >= v || v > h ? v = e = s = r = 0 : 0 >= v ? (s = -v, v = 0, e = r = _t(h, n + v)) : h >= v && (s = 0, e = r = _t(n, h - v)),
                        g.push(kt(m), kt(v), kt(t), kt(e)),
                        l && (o *= l, s *= l, a *= l, r *= l),
                        a > 0 && r > 0 && g.push(kt(o), kt(s), kt(a), kt(r)),
                        g
                    }.call(this)), c) : void 0
                },
                setAspectRatio: function(t) {
                    var e = this.options;
                    this.isDisabled || i(t) || (e.aspectRatio = yt(0, t) || NaN, this.isBuilt && (this.initCropBox(), this.isCropped && this.renderCropBox()))
                },
                setDragMode: function(t) {
                    var e, i, n = this.options;
                    this.isLoaded && !this.isDisabled && (e = t === ut, i = n.movable && t === ht, t = e || i ? t: ft, this.$dragBox.data(et, t).toggleClass(O, e).toggleClass(P, i), n.cropBoxMovable || this.$face.data(et, t).toggleClass(O, e).toggleClass(P, i))
                }
            },
            v.DEFAULTS = {
                viewMode: 0,
                dragMode: "crop",
                aspectRatio: NaN,
                data: null,
                preview: "",
                responsive: !0,
                restore: !0,
                checkCrossOrigin: !0,
                checkOrientation: !0,
                modal: !0,
                guides: !0,
                center: !0,
                highlight: !0,
                background: !0,
                autoCrop: !0,
                autoCropArea: .8,
                movable: !0,
                rotatable: !0,
                scalable: !0,
                zoomable: !0,
                zoomOnTouch: !0,
                zoomOnWheel: !0,
                wheelZoomRatio: .1,
                cropBoxMovable: !0,
                cropBoxResizable: !0,
                toggleDragModeOnDblclick: !0,
                minCanvasWidth: 0,
                minCanvasHeight: 0,
                minCropBoxWidth: 0,
                minCropBoxHeight: 0,
                minContainerWidth: 200,
                minContainerHeight: 100,
                build: null,
                built: null,
                cropstart: null,
                cropmove: null,
                cropend: null,
                crop: null,
                zoom: null
            },
            v.setDefaults = function(e) {
                t.extend(v.DEFAULTS, e)
            },
            v.TEMPLATE = '<div class="cropper-container"><div class="cropper-wrap-box"><div class="cropper-canvas"></div></div><div class="cropper-drag-box"></div><div class="cropper-crop-box"><span class="cropper-view-box"></span><span class="cropper-dashed dashed-h"></span><span class="cropper-dashed dashed-v"></span><span class="cropper-center"></span><span class="cropper-face"></span><span class="cropper-line line-e" data-action="e"></span><span class="cropper-line line-n" data-action="n"></span><span class="cropper-line line-w" data-action="w"></span><span class="cropper-line line-s" data-action="s"></span><span class="cropper-point point-e" data-action="e"></span><span class="cropper-point point-n" data-action="n"></span><span class="cropper-point point-w" data-action="w"></span><span class="cropper-point point-s" data-action="s"></span><span class="cropper-point point-ne" data-action="ne"></span><span class="cropper-point point-nw" data-action="nw"></span><span class="cropper-point point-sw" data-action="sw"></span><span class="cropper-point point-se" data-action="se"></span></div></div>',
            v.other = t.fn.cropper,
            t.fn.cropper = function(e) {
                var o, s = n(arguments, 1);
                return this.each(function() {
                    var i, n, a = t(this),
                    r = a.data(T);
                    if (!r) {
                        if (/destroy/.test(e)) return;
                        i = t.extend({},
                        a.data(), t.isPlainObject(e) && e),
                        a.data(T, r = new v(this, i))
                    }
                    "string" == typeof e && t.isFunction(n = r[e]) && (o = n.apply(r, s))
                }),
                i(o) ? this: o
            },
            t.fn.cropper.Constructor = v,
            t.fn.cropper.setDefaults = v.setDefaults,
            t.fn.cropper.noConflict = function() {
                return t.fn.cropper = v.other,
                this
            }
        } (jQuery)
    },
    49 : function(t, e, i) {
        var n = i(9),
        o = {
            _ajax: function(t, e, i, o) {
                var s = e || {},
                a = $.Deferred();
                return n.ajax({
                    url: t,
                    data: s,
                    success: function(t) {
                        a.resolve(t)
                    },
                    error: function(t, e, i) {
                        a.reject(t, e, i)
                    },
                    type: i || "POST",
                    contentType: o || ""
                }),
                a
            },
            submit: function(t) {
                return this._ajax("/xhr/companyPurchase/submit.json", t, "POST", "application/json")
            },
            getEmployeeInfo: function(t) {
                return this._ajax("/xhr/enterprise/getEmployeeInfo.json", t, "POST")
            },
            getEnterpriseInfo: function(t) {
                return this._ajax("/xhr/enterprise/getEnterpriseInfo.json", t, "POST")
            },
            getPrivilegeDesc: function(t) {
                return this._ajax("/xhr/enterprise/getPrivilegeDesc.json", t, "POST")
            },
            unbind: function(t) {
                return this._ajax("/xhr/enterprise/identity/unbind.json", t, "POST")
            },
            submitAuth: function(t) {
                return this._ajax("/xhr/enterprise/auth/submitAuth.json", t, "POST")
            }
        };
        t.exports = o
    },
    209 : function(t, e, i) {
        var n = (i(2), i(4)),
        o = '<div>                                          <select class="w-select w-select-s pad4 j-birthdayYear" name="birthYear"  value="">                                             <option value="0" <%if(!this.originalBirthdayYear){%>selected="selected"<%}%> >--</option>                                              <%for(var i=this.nowYear;i>=1900;i--){%>                                                        <option value="<%=i%>" <%if(this.originalBirthdayYear==i){%>selected="selected"<%}%> ><%=i%></option>                                               <%}%>                                           </select>                           <label class="unit">年</label>                           <select class="w-select w-select-s pad4 j-birthdayMonth"  name="birthMonth"  value="">                              <option value="0" <%if(!this.originalBirthdayMonth){%>selected="selected"<%}%> >--</option>                             <%if(!!this.originalBirthdayYear){                                  var maxMonth = 12;                                  if(this.originalBirthdayYear == this.nowYear){                                                      maxMonth = this.nowMonth;                                   }                                   for(var i=1;i<=maxMonth;i++){%>                                                         <option value="<%=i%>" <%if(this.originalBirthdayMonth==i){%>selected="selected"<%}%> ><%=i%></option>                                                  <%}                                             }%>                         </select>                           <label class="unit">月</label>                           <select class="w-select w-select-s pad4 j-birthdayDay" name="birthDay"  value="">                               <option value="0" <%if(!this.originalBirthdayDay){%>selected="selected"<%}%> >--</option>                               <%if(!!this.originalBirthdayMonth){                                 var maxDay = this.getMonthDay(this.originalBirthdayMonth, this.originalBirthdayYear);                                   if(this.originalBirthdayYear == this.nowYear && this.originalBirthdayMonth == this.nowMonth){                                                       maxDay = this.nowDay;                                   }                                   for(var i=1;i<=maxDay;i++){%>                                                           <option value="<%=i%>" <%if(this.originalBirthdayDay==i){%>selected="selected"<%}%> ><%=i%></option>                                                    <%}                                             }%>                         </select>                           <label class="unit">日</label></div>',
        s = n.extend({
            __init: function(t) {
                this.__supr(t),
                this.__initNode()
            },
            __initNode: function() {
                var t = this.__data.originalBirthdayYear,
                e = this.__data.originalBirthdayMonth,
                i = this.__data.originalBirthdayDay,
                n = new Date,
                s = this.nowYear = n.getFullYear(),
                a = this.nowMonth = n.getMonth() + 1,
                r = this.nowDay = n.getDate();
                this.__seed_html = $.jqote(o, {
                    originalBirthdayYear: t,
                    originalBirthdayMonth: e,
                    originalBirthdayDay: i,
                    nowYear: s,
                    nowMonth: a,
                    nowDay: r,
                    getMonthDay: this.__getMonthDay
                }),
                this.__body = $(this.__seed_html),
                this.__parent = $(this.__data.parent),
                this.__parent.append(this.__body);
                var l = this.$birthdayYear = this.__body.find(".j-birthdayYear").first(),
                d = this.$birthdayMonth = this.__body.find(".j-birthdayMonth").first();
                this.$birthdayDay = this.__body.find(".j-birthdayDay").first();
                l.change(function() {
                    this.__changeSelectBrithdayMonth()
                }.bind(this)),
                d.change(function() {
                    this.__changeSelectBrithdayDay()
                }.bind(this))
            },
            __changeSelectBrithdayMonth: function() {
                this.$birthdayMonth.empty();
                var t = this.$birthdayYear.val();
                if ($("<option value='0' selected='selected'>--</option>").appendTo(this.$birthdayMonth), 0 != t && "" != t) {
                    var e = 12;
                    t == this.nowYear && (e = this.nowMonth);
                    for (var i = 1; e >= i; i++) $("<option value='" + i + "'>" + i + "</option>").appendTo(this.$birthdayMonth)
                }
                this.__changeSelectBrithdayDay()
            },
            __changeSelectBrithdayDay: function() {
                var t, e = this.$birthdayMonth.val() || 0,
                i = this.$birthdayYear.val() || 0;
                if (t = this.__getMonthDay(e, i), i == this.nowYear && e == this.nowMonth && (t = this.nowDay), this.$birthdayDay.empty(), $("<option value='0' selected='selected'>--</option>").appendTo(this.$birthdayDay), 0 != e && "" != e) for (var n = 1; t >= n; n++) $("<option value='" + n + "'>" + n + "</option>").appendTo(this.$birthdayDay)
            },
            __getMonthDay: function(t, e) {
                var i = 31;
                return i = 0 == t ? 31 : 2 == t ? e % 400 == 0 || e % 4 == 0 && e % 100 != 0 ? 29 : 28 : 4 == t || 6 == t || 9 == t || 11 == t ? 30 : 31
            }
        });
        t.exports = s
    },
    210 : function(t, e, i) {
        function n() {
            u($)
        }
        function o() {
            l = $(f).jqote(),
            l = $("<div/>").append(l),
            d = l.showDialog({
                clsName: "m-pop-unbind"
            }),
            c = $(".j-comfirm"),
            s()
        }
        function s() {
            c.click(function(t) {
                t.preventDefault(),
                a()
            })
        }
        function a() {
            h.unbind().then(function(t) {
                d.closeDialog(),
                setTimeout(function() {
                    p.notify("解除成功")
                },
                200),
                setTimeout(function() {
                    r()
                },
                400)
            },
            function(t, e) {
                d.closeDialog(),
                setTimeout(function() {
                    p.notify(e)
                },
                200)
            })
        }
        function r() {
            window.location.reload()
        }
        var l, d, c, u = i(6),
        h = i(49),
        p = i(13),
        f = ['<script id="j-pop-unbind" type="text/x-jqote-template">', '<div class="content ">', "确定解除企业员工身份？<br/>一旦解除将不再享受企业员工的所有特权", "</div>", '<div class="comfirm">', '<a class="w-button  w-button-l cancel j-close-pop ">取消</a>', '<a class="w-button w-button-primary w-button-l j-comfirm">确定</a>', "</div>", "</script>"].join("");
        e.show = o,
        n()
    }
});
