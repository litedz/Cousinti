"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[681],{6e3:(e,t,a)=>{a.d(t,{Z:()=>r});var n=a(1519),o=a.n(n)()((function(e){return e[1]}));o.push([e.id,"#nav-dashboard[data-v-61334a51]{height:90px}.auth input[type=search][data-v-61334a51]{width:30%}.top-area .form .btn-primary[data-v-61334a51]{width:100%}input[type=search][data-v-61334a51]{width:50%}#quick-menu[data-v-61334a51]{display:none;width:400px;z-index:9999}#quick-menu li[data-v-61334a51]:hover{background:#fafafa}@media only screen and (max-width:780px){.top-area .form .btn-primary[data-v-61334a51]{width:100%}.top-area .form[data-v-61334a51],input[type=search][data-v-61334a51]{width:auto}.socialMedia[data-v-61334a51]{display:none}}",""]);const r=o},1519:e=>{e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var a=e(t);return t[2]?"@media ".concat(t[2]," {").concat(a,"}"):a})).join("")},t.i=function(e,a,n){"string"==typeof e&&(e=[[null,e,""]]);var o={};if(n)for(var r=0;r<this.length;r++){var s=this[r][0];null!=s&&(o[s]=!0)}for(var i=0;i<e.length;i++){var c=[].concat(e[i]);n&&o[c[0]]||(a&&(c[2]?c[2]="".concat(a," and ").concat(c[2]):c[2]=a),t.push(c))}},t}},3379:(e,t,a)=>{var n,o=function(){return void 0===n&&(n=Boolean(window&&document&&document.all&&!window.atob)),n},r=function(){var e={};return function(t){if(void 0===e[t]){var a=document.querySelector(t);if(window.HTMLIFrameElement&&a instanceof window.HTMLIFrameElement)try{a=a.contentDocument.head}catch(e){a=null}e[t]=a}return e[t]}}(),s=[];function i(e){for(var t=-1,a=0;a<s.length;a++)if(s[a].identifier===e){t=a;break}return t}function c(e,t){for(var a={},n=[],o=0;o<e.length;o++){var r=e[o],c=t.base?r[0]+t.base:r[0],l=a[c]||0,d="".concat(c," ").concat(l);a[c]=l+1;var u=i(d),f={css:r[1],media:r[2],sourceMap:r[3]};-1!==u?(s[u].references++,s[u].updater(f)):s.push({identifier:d,updater:v(f,t),references:1}),n.push(d)}return n}function l(e){var t=document.createElement("style"),n=e.attributes||{};if(void 0===n.nonce){var o=a.nc;o&&(n.nonce=o)}if(Object.keys(n).forEach((function(e){t.setAttribute(e,n[e])})),"function"==typeof e.insert)e.insert(t);else{var s=r(e.insert||"head");if(!s)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");s.appendChild(t)}return t}var d,u=(d=[],function(e,t){return d[e]=t,d.filter(Boolean).join("\n")});function f(e,t,a,n){var o=a?"":n.media?"@media ".concat(n.media," {").concat(n.css,"}"):n.css;if(e.styleSheet)e.styleSheet.cssText=u(t,o);else{var r=document.createTextNode(o),s=e.childNodes;s[t]&&e.removeChild(s[t]),s.length?e.insertBefore(r,s[t]):e.appendChild(r)}}function h(e,t,a){var n=a.css,o=a.media,r=a.sourceMap;if(o?e.setAttribute("media",o):e.removeAttribute("media"),r&&"undefined"!=typeof btoa&&(n+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(r))))," */")),e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}var m=null,p=0;function v(e,t){var a,n,o;if(t.singleton){var r=p++;a=m||(m=l(t)),n=f.bind(null,a,r,!1),o=f.bind(null,a,r,!0)}else a=l(t),n=h.bind(null,a,t),o=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(a)};return n(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;n(e=t)}else o()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=o());var a=c(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var n=0;n<a.length;n++){var o=i(a[n]);s[o].references--}for(var r=c(e,t),l=0;l<a.length;l++){var d=i(a[l]);0===s[d].references&&(s[d].updater(),s.splice(d,1))}a=r}}}},2681:(e,t,a)=>{a.r(t),a.d(t,{default:()=>W});var n=a(821),o=function(e){return(0,n.pushScopeId)("data-v-61334a51"),e=e(),(0,n.popScopeId)(),e},r={class:"bg-first-color top-area w-100 h-auto",style:{"z-index":"9999"},id:"nav-dashboard"},s={class:"container-fluid align-items-center d-flex justify-content-between"},i={class:"auth w-100"},c={class:"info d-flex flex-row-reverse justify-content-start align-items-center"},l={key:0,class:""},d=["src"],u={key:1,class:""},f=["href"],h=["src"],m={key:2,class:"dashboard mx-3 position-relative text-right w-auto"},p={key:0,class:""},v={key:0,class:"name text-truncate"},g={href:"/dashboard",class:"text-decoration-none fs-6 fst-italic fw-bolder text-white"},w={class:"bg-white end-0 quick-menu p-3 position-absolute text-center rounded shadow",id:"quick-menu"},b=(0,n.createStaticVNode)('<li class="head fw-bolder" data-v-61334a51>Quick Menu</li><li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded" data-v-61334a51><a href="/dashboard" class="text-decoration-none first-color" data-v-61334a51>لوحة التحكم</a><span class="fa fa-dashboard fs-6 m-2 first-color" data-v-61334a51></span></li><li class="align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded" data-v-61334a51><a href="/recipes" class="text-decoration-none first-color" data-v-61334a51>الوصفات</a><span class="fs-6 m-2 fa fa-list first-color" data-v-61334a51></span></li>',3),x={class:"align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded"},y=o((function(){return(0,n.createElementVNode)("span",{class:"fs-6 m-2 fa fa-heartbeat first-color"},null,-1)})),k=o((function(){return(0,n.createElementVNode)("li",{class:"align-items-center border-bottom d-flex justify-content-end m-2 p-1 pointer rounded"},[(0,n.createElementVNode)("a",{href:"/logout",class:"text-decoration-none first-color"},"الخروج"),(0,n.createElementVNode)("span",{class:"fa fa-door-open fs-6 m-2 first-color"})],-1)})),E={class:"d-flex align-items-center w-100 position-relative"},N=o((function(){return(0,n.createElementVNode)("span",{class:"bg-dark fa fa-search m-1 p-2 rounded-circle text-white position-absolute start-0"},null,-1)})),V={class:"search-found z-9999",style:{}},_={key:0,class:"recipes bg-light d-flex flex-column position-absolute rounded start-0 top-100 w-100 p-3",dir:"rtl",style:{height:"250px","overflow-y":"auto"}},B={class:"image w-25"},C={href:"#"},S=["src"],M={class:"info-recipe d-flex flex-column mx-3 w-100"},j={class:"title fw-bolder"},L={href:"#",class:"text-decoration-none text-black-title"},T=o((function(){return(0,n.createElementVNode)("div",{class:"how_todo text-black-50"},null,-1)})),q={class:"logo w-100"},I={href:"/home"},A={class:"bg-light d-flex justify-content-center m-1 rounded-circle",style:{height:"50px",width:"50px"}},D=["src"],Z={key:0,class:"guest"},z=[(0,n.createStaticVNode)('<div class="socialMedia text-right" data-v-61334a51><a href="#" class="fs-4 m-2 text-decoration-none text-white" data-v-61334a51>Contact :<span class="text-white-50" data-v-61334a51>+200114144</span></a><a href="" class="m-1" data-v-61334a51><img src="https://csfabienmenot.org/wp-content/uploads/2022/02/facebook-logo-3-1.png" alt="" style="width:3%;" data-v-61334a51></a><a href="" class="m-1" data-v-61334a51><img src="https://csfabienmenot.org/wp-content/uploads/2022/02/facebook-logo-3-1.png" alt="" style="width:3%;" data-v-61334a51></a><a href="" class="m-1" data-v-61334a51><img src="https://csfabienmenot.org/wp-content/uploads/2022/02/facebook-logo-3-1.png" alt="" style="width:3%;" data-v-61334a51></a></div>',1)];const F={inject:["w_path"],mounted:function(){window.addEventListener("scroll",this.wheneScroll),window.addEventListener("mousemove",this.wheneMouve)},unmounted:function(){window.removeEventListener("scroll",this.wheneScroll),window.removeEventListener("mousemove",this.wheneMouve)},data:function(){return{name:"test",Request_response:"",text_search:"",recipes_found:"",showWishList:!1}},methods:{search:function(){var e=this;0!==this.text_search.length?axios({method:"post",url:"/recipes/search/"+this.text_search}).then((function(t){t.data&&(e.recipes_found=t.data)})).catch((function(e){})):this.recipes_found=""},toggleMenu:function(){$("#"+event.target.getAttribute("data-link")).fadeToggle("slow")},wheneScroll:function(){$(window).scrollTop()>300?$("#nav-dashboard").css({position:"fixed",top:0}):$("#nav-dashboard").css({position:"relative"})},wheneMouve:function(){}}};var O=a(3379),R=a.n(O),U=a(6e3),H={insert:"head",singleton:!1};R()(U.Z,H);U.Z.locals;const W=(0,a(3744).Z)(F,[["render",function(e,t,a,o,$,F){return(0,n.openBlock)(),(0,n.createElementBlock)("div",r,[(0,n.createElementVNode)("div",s,[(0,n.createElementVNode)("div",i,[(0,n.createElementVNode)("div",c,[1==this.$attrs.auth_status&&1==this.$attrs.checkmediauser?((0,n.openBlock)(),(0,n.createElementBlock)("div",l,[(0,n.createElementVNode)("img",{src:this.$attrs.avatar,style:{width:"50px",height:"50px"},alt:"avatar",class:"rounded-circle m-2"},null,8,d)])):(0,n.createCommentVNode)("",!0),1==this.$attrs.auth_status&&0==this.$attrs.checkmediauser?((0,n.openBlock)(),(0,n.createElementBlock)("div",u,[(0,n.createElementVNode)("a",{href:F.w_path+"/profile/"+this.$attrs.user_id},[(0,n.createElementVNode)("img",{src:F.w_path+"/storage/"+this.$attrs.avatar,style:{width:"50px",height:"50px"},alt:"avatar",class:"rounded-circle m-2"},null,8,h)],8,f)])):(0,n.createCommentVNode)("",!0),1==this.$attrs.auth_status?((0,n.openBlock)(),(0,n.createElementBlock)("div",m,[1==this.$attrs.auth_status?((0,n.openBlock)(),(0,n.createElementBlock)("div",p,[void 0!==this.$attrs.user?((0,n.openBlock)(),(0,n.createElementBlock)("div",v,[(0,n.createElementVNode)("a",g,(0,n.toDisplayString)(this.$attrs.user),1)])):(0,n.createCommentVNode)("",!0)])):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("a",{class:"fa fa-bars-staggered fs-4 text-white pointer text-decoration-none",onClick:t[0]||(t[0]=function(e){return F.toggleMenu()}),"data-link":"quick-menu","data-toggle":"navSlide"}),(0,n.createElementVNode)("div",w,[b,(0,n.createElementVNode)("li",x,[(0,n.createElementVNode)("a",{href:"#",class:"text-decoration-none first-color",onClick:t[1]||(t[1]=function(e){return $.showWishList=!0})},"المفضلة"),y]),k])])):(0,n.createCommentVNode)("",!0),(0,n.createElementVNode)("div",E,[N,(0,n.withDirectives)((0,n.createElementVNode)("input",{class:"form-control font-amiri w-100",type:"search",placeholder:"البحث عن وصفة  . . .",name:"search",onKeyup:t[2]||(t[2]=function(e){return F.search()}),dir:"rtl","onUpdate:modelValue":t[3]||(t[3]=function(e){return $.text_search=e})},null,544),[[n.vModelText,$.text_search]]),(0,n.createElementVNode)("div",V,[0!==$.recipes_found.length?((0,n.openBlock)(),(0,n.createElementBlock)("div",_,[((0,n.openBlock)(!0),(0,n.createElementBlock)(n.Fragment,null,(0,n.renderList)($.recipes_found,(function(e){return(0,n.openBlock)(),(0,n.createElementBlock)("div",{class:"bg-light border-bottom d-flex mt-1 pb-2",key:e.found},[(0,n.createElementVNode)("div",B,[(0,n.createElementVNode)("a",C,[(0,n.createElementVNode)("img",{class:"rounded w-100",src:F.w_path+"/storage/"+e.author.id+"/"+e.images_recipe[0].name,alt:""},null,8,S)])]),(0,n.createElementVNode)("div",M,[(0,n.createElementVNode)("div",j,[(0,n.createElementVNode)("a",L,(0,n.toDisplayString)(e.name),1)]),T])])})),128))])):(0,n.createCommentVNode)("",!0)])]),(0,n.createElementVNode)("div",q,[(0,n.createElementVNode)("a",I,[(0,n.createElementVNode)("div",A,[(0,n.createElementVNode)("img",{class:"",src:this.w_path+"/images/logo.png",alt:""},null,8,D)])])])])]),0==this.$attrs.auth_status?((0,n.openBlock)(),(0,n.createElementBlock)("div",Z,z)):(0,n.createCommentVNode)("",!0)])])}],["__scopeId","data-v-61334a51"]])}}]);