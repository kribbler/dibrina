(function(n){"use strict";var i={slide:0,delay:7e3,preload:!1,preloadImage:!1,preloadVideo:!1,timer:!0,overlay:!1,autoplay:!0,shuffle:!1,cover:!0,color:null,align:"center",valign:"center",transition:"fade",transitionDuration:1e3,transitionRegister:[],animation:null,animationDuration:"auto",animationRegister:[],init:function(){},play:function(){},pause:function(){},walk:function(){},slides:[]},t={},r=function(t,r){this.elmt=t,this.settings=n.extend({},i,n.vegas.defaults,r),this.slide=this.settings.slide,this.total=this.settings.slides.length,this.noshow=this.total<2,this.paused=!this.settings.autoplay||this.noshow,this.$elmt=n(t),this.$timer=null,this.$overlay=null,this.$slide=null,this.timeout=null,this.transitions=["fade","fade2","blur","blur2","flash","flash2","negative","negative2","burn","burn2","slideLeft","slideLeft2","slideRight","slideRight2","slideUp","slideUp2","slideDown","slideDown2","zoomIn","zoomIn2","zoomOut","zoomOut2","swirlLeft","swirlLeft2","swirlRight","swirlRight2"],this.animations=["kenburns","kenburnsLeft","kenburnsRight","kenburnsUp","kenburnsUpLeft","kenburnsUpRight","kenburnsDown","kenburnsDownLeft","kenburnsDownRight"],this.settings.transitionRegister instanceof Array==!1&&(this.settings.transitionRegister=[this.settings.transitionRegister]),this.settings.animationRegister instanceof Array==!1&&(this.settings.animationRegister=[this.settings.animationRegister]),this.transitions=this.transitions.concat(this.settings.transitionRegister),this.animations=this.animations.concat(this.settings.animationRegister),this.support={objectFit:"objectFit"in document.body.style,transition:"transition"in document.body.style||"WebkitTransition"in document.body.style,video:n.vegas.isVideoCompatible()},this.settings.shuffle===!0&&this.shuffle(),this._init()};r.prototype={_init:function(){var i,r,f,e=this.elmt.tagName==="BODY",o=this.settings.timer,u=this.settings.overlay,t=this;this._preload(),e||(this.$elmt.css("height",this.$elmt.css("height")),i=n('<div class="vegas-wrapper">').css("overflow",this.$elmt.css("overflow")).css("padding",this.$elmt.css("padding")),this.$elmt.css("padding")||i.css("padding-top",this.$elmt.css("padding-top")).css("padding-bottom",this.$elmt.css("padding-bottom")).css("padding-left",this.$elmt.css("padding-left")).css("padding-right",this.$elmt.css("padding-right")),this.$elmt.clone(!0).children().appendTo(i),this.elmt.innerHTML=""),o&&this.support.transition&&(f=n('<div class="vegas-timer"><div class="vegas-timer-progress">'),this.$timer=f,this.$elmt.prepend(f)),u&&(r=n('<div class="vegas-overlay">'),typeof u=="string"&&r.css("background-image","url("+u+")"),this.$overlay=r,this.$elmt.prepend(r)),this.$elmt.addClass("vegas-container"),e||this.$elmt.append(i),setTimeout(function(){t.trigger("init"),t._goto(t.slide),t.settings.autoplay&&t.trigger("play")},1)},_preload:function(){for(var i,t,n=0;n<this.settings.slides.length;n++)(this.settings.preload||this.settings.preloadImages)&&this.settings.slides[n].src&&(t=new Image,t.src=this.settings.slides[n].src),(this.settings.preload||this.settings.preloadVideos)&&this.support.video&&this.settings.slides[n].video&&(i=this._video(this.settings.slides[n].video))},_random:function(n){return n[Math.floor(Math.random()*(n.length-1))]},_slideShow:function(){var n=this;this.total>1&&!this.paused&&!this.noshow&&(this.timeout=setTimeout(function(){n.next()},this._options("delay")))},_timer:function(n){var t=this;(clearTimeout(this.timeout),this.$timer)&&((this.$timer.removeClass("vegas-timer-running").find("div").css("transition-duration","0ms"),this.paused||this.noshow)||n&&setTimeout(function(){t.$timer.addClass("vegas-timer-running").find("div").css("transition-duration",t._options("delay")-100+"ms")},100))},_video:function(n){var i,u,r=n.toString();return t[r]?t[r]:(n instanceof Array==!1&&(n=[n]),i=document.createElement("video"),i.preload=!0,n.forEach(function(n){u=document.createElement("source"),u.src=n,i.appendChild(u)}),t[r]=i,i)},_fadeOutSound:function(n,t){var r=this,u=t/10,i=n.volume-.09;i>0?(n.volume=i,setTimeout(function(){r._fadeOutSound(n,t)},u)):n.pause()},_fadeInSound:function(n,t){var r=this,u=t/10,i=n.volume+.09;i<1&&(n.volume=i,setTimeout(function(){r._fadeInSound(n,t)},u))},_options:function(n,t){return(t===undefined&&(t=this.slide),this.settings.slides[t][n]!==undefined)?this.settings.slides[t][n]:this.settings[n]},_goto:function(t){function w(){h._timer(!0),setTimeout(function(){r&&(h.support.transition?(s.css("transition","all "+e+"ms").addClass("vegas-transition-"+r+"-out"),s.each(function(){var n=s.find("video").get(0);n&&(n.volume=1,h._fadeOutSound(n,e))}),u.css("transition","all "+e+"ms").addClass("vegas-transition-"+r+"-in")):u.fadeIn(e));for(var n=0;n<s.length-4;n++)s.eq(n).remove();h.trigger("walk"),h._slideShow()},100)}typeof this.settings.slides[t]=="undefined"&&(t=0),this.slide=t;var u,v,c,s=this.$elmt.children(".vegas-slide"),k=this.settings.slides[t].src,o=this.settings.slides[t].video,y=this._options("delay"),b=this._options("align"),d=this._options("valign"),nt=this._options("color")||this.$elmt.css("background-color"),a=this._options("cover")?"cover":"contain",h=this,g=s.length,i,l,r=this._options("transition"),e=this._options("transitionDuration"),f=this._options("animation"),p=this._options("animationDuration");(r==="random"||r instanceof Array)&&(r=r instanceof Array?this._random(r):this._random(this.transitions)),(f==="random"||f instanceof Array)&&(f=f instanceof Array?this._random(f):this._random(this.animations)),(e==="auto"||e>y)&&(e=y),p==="auto"&&(p=y),u=n('<div class="vegas-slide"></div>'),this.support.transition&&r&&u.addClass("vegas-transition-"+r),this.support.video&&o?(i=o instanceof Array?this._video(o):this._video(o.src),i.loop=o.loop!==undefined?o.loop:!0,i.muted=o.mute!==undefined?o.mute:!0,i.muted===!1?(i.volume=0,this._fadeInSound(i,e)):i.pause(),c=n(i).addClass("vegas-video").css("background-color",nt),this.support.objectFit?c.css("object-position",b+" "+d).css("object-fit",a).css("width","100%").css("height","100%"):a==="contain"&&c.css("width","100%").css("height","100%"),u.append(c)):(l=new Image,v=n('<div class="vegas-slide-inner"></div>').css("background-image","url("+k+")").css("background-color",nt).css("background-position",b+" "+d).css("background-size",a),this.support.transition&&f&&v.addClass("vegas-animation-"+f).css("animation-duration",p+"ms"),u.append(v)),this.support.transition||u.css("display","none"),g?s.eq(g-1).after(u):this.$elmt.prepend(u),h._timer(!1),i?(i.readyState===4&&(i.currentTime=0),i.play(),w()):(l.src=k,l.onload=w)},shuffle:function(){for(var i,t,n=this.total-1;n>0;n--)t=Math.floor(Math.random()*(n+1)),i=this.settings.slides[n],this.settings.slides[n]=this.settings.slides[t],this.settings.slides[t]=i},play:function(){this.paused&&(this.paused=!1,this.next(),this.trigger("play"))},pause:function(){this._timer(!1),this.paused=!0,this.trigger("pause")},toggle:function(){this.paused?this.play():this.pause()},playing:function(){return!this.paused&&!this.noshow},current:function(n){return n?{slide:this.slide,data:this.settings.slides[this.slide]}:this.slide},jump:function(n){n<0||n>this.total-1||n===this.slide||(this.slide=n,this._goto(this.slide))},next:function(){this.slide++,this.slide>=this.total&&(this.slide=0),this._goto(this.slide)},previous:function(){this.slide--,this.slide<0&&(this.slide=this.total-1),this._goto(this.slide)},trigger:function(n){var t=[];t=n==="init"?[this.settings]:[this.slide,this.settings.slides[this.slide]],this.$elmt.trigger("vegas"+n,t),typeof this.settings[n]=="function"&&this.settings[n].apply(this.$elmt,t)},options:function(t,r){var u=this.settings.slides.slice();if(typeof t=="object")this.settings=n.extend({},i,n.vegas.defaults,t);else if(typeof t=="string"){if(r===undefined)return this.settings[t];this.settings[t]=r}else return this.settings;this.settings.slides!==u&&(this.total=this.settings.slides.length,this.noshow=this.total<2,this._preload())},destroy:function(){clearTimeout(this.timeout),this.$elmt.removeClass("vegas-container"),this.$elmt.find("> .vegas-slide").remove(),this.$elmt.find("> .vegas-wrapper").clone(!0).children().appendTo(this.$elmt),this.$elmt.find("> .vegas-wrapper").remove(),this.$timer.remove(),this.$overlay.remove(),this.elmt._vegas=null}},n.fn.vegas=function(n){var u=arguments,i=!1,t;if(n===undefined||typeof n=="object")return this.each(function(){this._vegas||(this._vegas=new r(this,n))});if(typeof n=="string"){if(this.each(function(){var r=this._vegas;if(!r)throw new Error("No Vegas applied to this element.");typeof r[n]=="function"&&n[0]!=="_"?t=r[n].apply(r,[].slice.call(u,1)):i=!0}),i)throw new Error('No method "'+n+'" in Vegas.');return t!==undefined?t:this}},n.vegas={},n.vegas.defaults=i,n.vegas.isVideoCompatible=function(){return!/(Android|webOS|Phone|iPad|iPod|BlackBerry|Windows Phone)/i.test(navigator.userAgent)}})(window.jQuery||window.Zepto)