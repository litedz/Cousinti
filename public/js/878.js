"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[878],{9184:(e,n,t)=>{t.d(n,{Z:()=>r});var o=t(1519),a=t.n(o)()((function(e){return e[1]}));a.push([e.id,'body{margin-top:20px}.gray-bg{background:#eee}.pageloader{height:100%;left:0;opacity:1;overflow:hidden;position:fixed;top:0;width:100%;z-index:9999}.loader{display:table-cell;text-align:center;vertical-align:middle}.loader span{color:#1abc9c;display:block;font-size:60px;font-weight:300;margin-top:40px}.sp-hydrogen{animation:spHydro .7s linear infinite;border:3px solid #1abc9c;border-radius:50%;clear:both;height:96px;margin:60px auto;position:relative;width:96px}.sp-hydrogen:after,.sp-hydrogen:before{background-color:#252830;border-radius:50%;content:"";height:30px;position:absolute;width:30px}.sp-hydrogen:before{left:calc(50% - 15px);top:calc(50% - 15px)}.sp-hydrogen:after{left:-3px;top:-3px}@keyframes spHydro{0%{transform:rotate(0deg)}to{transform:rotate(359deg)}}.animated{animation-duration:1s;animation-fill-mode:both}.animated.infinite{animation-iteration-count:infinite}@keyframes fadeIn{0%{opacity:0}to{opacity:1}}.fadeIn{animation-name:fadeIn}@keyframes fadeOut{0%{opacity:1}to{opacity:0}}.fadeOut{animation-name:fadeOut}',""]);const r=a},1519:e=>{e.exports=function(e){var n=[];return n.toString=function(){return this.map((function(n){var t=e(n);return n[2]?"@media ".concat(n[2]," {").concat(t,"}"):t})).join("")},n.i=function(e,t,o){"string"==typeof e&&(e=[[null,e,""]]);var a={};if(o)for(var r=0;r<this.length;r++){var i=this[r][0];null!=i&&(a[i]=!0)}for(var c=0;c<e.length;c++){var d=[].concat(e[c]);o&&a[d[0]]||(t&&(d[2]?d[2]="".concat(t," and ").concat(d[2]):d[2]=t),n.push(d))}},n}},3379:(e,n,t)=>{var o,a=function(){return void 0===o&&(o=Boolean(window&&document&&document.all&&!window.atob)),o},r=function(){var e={};return function(n){if(void 0===e[n]){var t=document.querySelector(n);if(window.HTMLIFrameElement&&t instanceof window.HTMLIFrameElement)try{t=t.contentDocument.head}catch(e){t=null}e[n]=t}return e[n]}}(),i=[];function c(e){for(var n=-1,t=0;t<i.length;t++)if(i[t].identifier===e){n=t;break}return n}function d(e,n){for(var t={},o=[],a=0;a<e.length;a++){var r=e[a],d=n.base?r[0]+n.base:r[0],s=t[d]||0,l="".concat(d," ").concat(s);t[d]=s+1;var f=c(l),u={css:r[1],media:r[2],sourceMap:r[3]};-1!==f?(i[f].references++,i[f].updater(u)):i.push({identifier:l,updater:g(u,n),references:1}),o.push(l)}return o}function s(e){var n=document.createElement("style"),o=e.attributes||{};if(void 0===o.nonce){var a=t.nc;a&&(o.nonce=a)}if(Object.keys(o).forEach((function(e){n.setAttribute(e,o[e])})),"function"==typeof e.insert)e.insert(n);else{var i=r(e.insert||"head");if(!i)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");i.appendChild(n)}return n}var l,f=(l=[],function(e,n){return l[e]=n,l.filter(Boolean).join("\n")});function u(e,n,t,o){var a=t?"":o.media?"@media ".concat(o.media," {").concat(o.css,"}"):o.css;if(e.styleSheet)e.styleSheet.cssText=f(n,a);else{var r=document.createTextNode(a),i=e.childNodes;i[n]&&e.removeChild(i[n]),i.length?e.insertBefore(r,i[n]):e.appendChild(r)}}function p(e,n,t){var o=t.css,a=t.media,r=t.sourceMap;if(a?e.setAttribute("media",a):e.removeAttribute("media"),r&&"undefined"!=typeof btoa&&(o+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(r))))," */")),e.styleSheet)e.styleSheet.cssText=o;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(o))}}var h=null,m=0;function g(e,n){var t,o,a;if(n.singleton){var r=m++;t=h||(h=s(n)),o=u.bind(null,t,r,!1),a=u.bind(null,t,r,!0)}else t=s(n),o=p.bind(null,t,n),a=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(t)};return o(e),function(n){if(n){if(n.css===e.css&&n.media===e.media&&n.sourceMap===e.sourceMap)return;o(e=n)}else a()}}e.exports=function(e,n){(n=n||{}).singleton||"boolean"==typeof n.singleton||(n.singleton=a());var t=d(e=e||[],n);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var o=0;o<t.length;o++){var a=c(t[o]);i[a].references--}for(var r=d(e,n),s=0;s<t.length;s++){var l=c(t[s]);0===i[l].references&&(i[l].updater(),i.splice(l,1))}t=r}}}},878:(e,n,t)=>{t.r(n),t.d(n,{default:()=>f});var o=t(821),a={class:"loading-page"},r=[(0,o.createElementVNode)("div",{class:"pageloader gray-bg flex-center gray-bg pageloader"},[(0,o.createElementVNode)("div",{class:"loader"},[(0,o.createElementVNode)("span",null,"Cousinti"),(0,o.createElementVNode)("div",{class:"sp-hydrogen"})])],-1)];const i={mounted:function(){this.Loading()},methods:{Loading:function(){$(window).on("load",(function(){$(".loading-page").fadeOut("slow")}))}}};var c=t(3379),d=t.n(c),s=t(9184),l={insert:"head",singleton:!1};d()(s.Z,l);s.Z.locals;const f=(0,t(3744).Z)(i,[["render",function(e,n,t,i,c,d){return(0,o.openBlock)(),(0,o.createElementBlock)("div",a,r)}]])}}]);