"use strict";(self.webpackChunk=self.webpackChunk||[]).push([[347],{8810:(e,t,o)=>{o.d(t,{Z:()=>a});var r=o(1519),n=o.n(r)()((function(e){return e[1]}));n.push([e.id,"#chat1 .form-outline .form-control~.form-notch div[data-v-a0f7f410]{background:transparent;border:1px solid #eee;box-sizing:border-box;pointer-events:none}#chat1 .form-outline .form-control~.form-notch .form-notch-leading[data-v-a0f7f410]{border-radius:.65rem 0 0 .65rem;border-right:none;height:100%;left:0;top:0}#chat1 .form-outline .form-control~.form-notch .form-notch-middle[data-v-a0f7f410]{border-left:none;border-right:none;flex:0 0 auto;height:100%;max-width:calc(100% - 1rem)}#chat1 .form-outline .form-control~.form-notch .form-notch-trailing[data-v-a0f7f410]{border-left:none;border-radius:0 .65rem .65rem 0;flex-grow:1;height:100%}#chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading[data-v-a0f7f410]{border-bottom:.125rem solid #39c0ed;border-left:.125rem solid #39c0ed;border-top:.125rem solid #39c0ed}#chat1 .form-outline .form-control.active~.form-notch .form-notch-leading[data-v-a0f7f410],#chat1 .form-outline .form-control:focus~.form-notch .form-notch-leading[data-v-a0f7f410]{border-right:none;transition:all .2s linear}#chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle[data-v-a0f7f410]{border-bottom:.125rem solid;border-color:#39c0ed}#chat1 .form-outline .form-control.active~.form-notch .form-notch-middle[data-v-a0f7f410],#chat1 .form-outline .form-control:focus~.form-notch .form-notch-middle[data-v-a0f7f410]{border-left:none;border-right:none;border-top:none;transition:all .2s linear}#chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing[data-v-a0f7f410]{border-bottom:.125rem solid #39c0ed;border-right:.125rem solid #39c0ed;border-top:.125rem solid #39c0ed}#chat1 .form-outline .form-control.active~.form-notch .form-notch-trailing[data-v-a0f7f410],#chat1 .form-outline .form-control:focus~.form-notch .form-notch-trailing[data-v-a0f7f410]{border-left:none;transition:all .2s linear}#chat1 .form-outline .form-control:focus~.form-label[data-v-a0f7f410]{color:#39c0ed}#chat1 .form-outline .form-control~.form-label[data-v-a0f7f410]{color:#bfbfbf}",""]);const a=n},1519:e=>{e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var o=e(t);return t[2]?"@media ".concat(t[2]," {").concat(o,"}"):o})).join("")},t.i=function(e,o,r){"string"==typeof e&&(e=[[null,e,""]]);var n={};if(r)for(var a=0;a<this.length;a++){var c=this[a][0];null!=c&&(n[c]=!0)}for(var i=0;i<e.length;i++){var s=[].concat(e[i]);r&&n[s[0]]||(o&&(s[2]?s[2]="".concat(o," and ").concat(s[2]):s[2]=o),t.push(s))}},t}},3379:(e,t,o)=>{var r,n=function(){return void 0===r&&(r=Boolean(window&&document&&document.all&&!window.atob)),r},a=function(){var e={};return function(t){if(void 0===e[t]){var o=document.querySelector(t);if(window.HTMLIFrameElement&&o instanceof window.HTMLIFrameElement)try{o=o.contentDocument.head}catch(e){o=null}e[t]=o}return e[t]}}(),c=[];function i(e){for(var t=-1,o=0;o<c.length;o++)if(c[o].identifier===e){t=o;break}return t}function s(e,t){for(var o={},r=[],n=0;n<e.length;n++){var a=e[n],s=t.base?a[0]+t.base:a[0],l=o[s]||0,d="".concat(s," ").concat(l);o[s]=l+1;var f=i(d),u={css:a[1],media:a[2],sourceMap:a[3]};-1!==f?(c[f].references++,c[f].updater(u)):c.push({identifier:d,updater:v(u,t),references:1}),r.push(d)}return r}function l(e){var t=document.createElement("style"),r=e.attributes||{};if(void 0===r.nonce){var n=o.nc;n&&(r.nonce=n)}if(Object.keys(r).forEach((function(e){t.setAttribute(e,r[e])})),"function"==typeof e.insert)e.insert(t);else{var c=a(e.insert||"head");if(!c)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");c.appendChild(t)}return t}var d,f=(d=[],function(e,t){return d[e]=t,d.filter(Boolean).join("\n")});function u(e,t,o,r){var n=o?"":r.media?"@media ".concat(r.media," {").concat(r.css,"}"):r.css;if(e.styleSheet)e.styleSheet.cssText=f(t,n);else{var a=document.createTextNode(n),c=e.childNodes;c[t]&&e.removeChild(c[t]),c.length?e.insertBefore(a,c[t]):e.appendChild(a)}}function m(e,t,o){var r=o.css,n=o.media,a=o.sourceMap;if(n?e.setAttribute("media",n):e.removeAttribute("media"),a&&"undefined"!=typeof btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(a))))," */")),e.styleSheet)e.styleSheet.cssText=r;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(r))}}var h=null,p=0;function v(e,t){var o,r,n;if(t.singleton){var a=p++;o=h||(h=l(t)),r=u.bind(null,o,a,!1),n=u.bind(null,o,a,!0)}else o=l(t),r=m.bind(null,o,t),n=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(o)};return r(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;r(e=t)}else n()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=n());var o=s(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var r=0;r<o.length;r++){var n=i(o[r]);c[n].references--}for(var a=s(e,t),l=0;l<o.length;l++){var d=i(o[l]);0===c[d].references&&(c[d].updater(),c.splice(d,1))}o=a}}}},6347:(e,t,o)=>{o.r(t),o.d(t,{default:()=>S});var r=o(821),n=function(e){return(0,r.pushScopeId)("data-v-a0f7f410"),e=e(),(0,r.popScopeId)(),e},a={class:"message bottom-0 end-0 position-fixed"},c={class:"card",id:"chat1",style:{"border-radius":"15px"}},i={class:"card-header d-flex justify-content-between align-items-center p-3 bg-info text-white border-bottom-0",style:{"border-top-left-radius":"15px","border-top-right-radius":"15px"}},s=n((function(){return(0,r.createElementVNode)("i",{class:"fas fa-angle-left"},null,-1)})),l=n((function(){return(0,r.createElementVNode)("p",{class:"mb-0 fw-bold"},"Live chat",-1)})),d={id:"card-body",class:"card-body pt-3 overflow-auto",style:{height:"500px"}},f={key:0,class:"d-flex flex-row justify-content-start mb-4"},u=["src"],m={class:"p-3 ms-3",style:{"border-radius":"15px","background-color":"rgba(57, 192, 237,.2)"}},h={class:"small mb-0"},p={key:1,class:"d-flex flex-row justify-content-end mb-4"},v={class:"p-3 me-3 border",style:{"border-radius":"15px","background-color":"#fbfbfb"}},b={class:"small mb-0"},g=["src"],y={class:"form-outline"},x=n((function(){return(0,r.createElementVNode)("label",{class:"form-label",for:"textAreaExample"},"Type your message",-1)}));o(4155);const w={inject:["w_path"],mounted:function(){this.showChat=this.$attrs.chat,this.getConversation(),this.ss()},watch:{},data:function(){return{message:"",conversation:""}},methods:{ss:function(){var e=document.querySelector(".card-body");e.scrollTop=e.scrollHeight},SendMessage:function(){},getConversation:function(){var e=this,t=(document.querySelector(".card-body"),new FormData);t.append("user_id_recipient",this.$attrs.user_id_recipient),t.append("user_id_send",this.$attrs.user_id_send),axios({method:"post",url:"/messages/conversation",data:t}).then((function(t){t.data&&(e.conversation=t.data,e.$emit("closeScroll"))})).catch((function(t){e.$refs.status.Display("danger",t.response.data.message,"خطاء")})),this.ss()}}};var E=o(3379),k=o.n(E),N=o(8810),C={insert:"head",singleton:!1};k()(N.Z,C);N.Z.locals;const S=(0,o(3744).Z)(w,[["render",function(e,t,o,n,w,E){var k=this,N=(0,r.resolveComponent)("status");return(0,r.openBlock)(),(0,r.createElementBlock)("section",a,[(0,r.createVNode)(N,{ref:"status"},null,512),(0,r.createElementVNode)("div",c,[(0,r.createElementVNode)("div",i,[s,l,(0,r.createElementVNode)("i",{class:"fas fa-times pointer",onClick:t[0]||(t[0]=function(t){return e.$emit("CloseChat")})})]),(0,r.createElementVNode)("div",d,[((0,r.openBlock)(!0),(0,r.createElementBlock)(r.Fragment,null,(0,r.renderList)(w.conversation,(function(e){return(0,r.openBlock)(),(0,r.createElementBlock)("div",{key:e.conversation},[k.$attrs.user_id_send==e.id_user_send?((0,r.openBlock)(),(0,r.createElementBlock)("div",f,[(0,r.createElementVNode)("img",{src:E.w_path+"/storage/"+e.user.avatar,alt:"avatar 1",style:{width:"45px",height:"100%"}},null,8,u),(0,r.createElementVNode)("div",m,[(0,r.createElementVNode)("p",h,(0,r.toDisplayString)(e.message),1)])])):((0,r.openBlock)(),(0,r.createElementBlock)("div",p,[(0,r.createElementVNode)("div",v,[(0,r.createElementVNode)("p",b,(0,r.toDisplayString)(e.message),1)]),(0,r.createElementVNode)("img",{src:E.w_path+"/storage/"+e.user.avatar,alt:"avatar 1",style:{width:"45px",height:"100%"}},null,8,g)]))])})),128)),(0,r.createElementVNode)("div",y,[(0,r.createElementVNode)("textarea",{class:"form-control",id:"textAreaExample",rows:"4",onKeydown:t[1]||(t[1]=(0,r.withKeys)((function(e){return E.SendMessage()}),["enter"]))},null,32),x])])])])}],["__scopeId","data-v-a0f7f410"]])}}]);