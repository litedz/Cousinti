/*! For license information please see resources_js_components_dashboard_notifications_vue.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["resources_js_components_dashboard_notifications_vue"],{"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/dashboard/notifications.vue?vue&type=script&lang=js":(e,t,o)=>{o.r(t),o.d(t,{default:()=>s});const s={mounted:function(){var e=this;this.getNotifications(),setInterval((function(){e.getNotifications()}),1e4)},data:function(){return{notifications:""}},methods:{getNotifications:function(){var e=this;axios.get("/user/notifi/"+this.$attrs.user.id).then((function(t){t.data&&(e.notifications=t.data)})).catch((function(e){}))},DeleteNotification:function(e){var t=this,o=new FormData;o.append("notification_id",e),o.append("_method","DELETE"),axios.post("/user/notifi/"+e,o).then((function(e){e.data&&(t.$refs.status.Display(e.data.style,e.data.message,e.data.status,e.data.icon),t.getNotifications())})).catch((function(e){}))}}}},"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/dashboard/notifications.vue?vue&type=template&id=c9fd4c9c":(e,t,o)=>{o.r(t),o.d(t,{render:()=>k});var s=o("./node_modules/vue/dist/vue.esm-bundler.js"),n={class:"container"},a={class:"row"},i={class:"box shadow-sm rounded bg-white mb-3"},d=(0,s.createElementVNode)("div",{class:"box-title border-bottom p-3"},[(0,s.createElementVNode)("h6",{class:"fs-1 m-0"},"Notifications ")],-1),r={class:"box-body p-0"},l={key:0,class:"alert alert-primary text-center"},c=[(0,s.createElementVNode)("span",{class:"fs-3"},"You dont have any notification",-1)],u={class:"align-items-center border-bottom d-flex gap-2 osahan-post-header p-3"},m={key:0,class:"dropdown-list-image bg-danger p-2 px-3 rounded-circle text-capitalize text-white"},p={key:1,class:"rounded-circle",src:"https://bootdey.com/img/Content/avatar/avatar3.png",alt:"",width:"60",height:"60"},f={class:"font-weight-bold mr-3"},v={class:"text-truncate"},b={class:"small"},h={class:"ml-auto mb-auto position-relative"},g={class:"btn-group end-0 position-absolute"},j=["onClick"],y=[(0,s.createElementVNode)("i",{class:"fa fa-trash text-danger"},null,-1)],E=(0,s.createElementVNode)("br",null,null,-1),N={class:"fs-6 fst-italic fw-lighter fw-normal text-info time"};function k(e,t,o,k,x,_){var V=(0,s.resolveComponent)("status");return(0,s.openBlock)(),(0,s.createElementBlock)(s.Fragment,null,[(0,s.createVNode)(V,{ref:"status"},null,512),(0,s.createElementVNode)("div",n,[(0,s.createElementVNode)("div",a,[(0,s.createElementVNode)("div",i,[d,(0,s.createElementVNode)("div",r,[0==x.notifications.length?((0,s.openBlock)(),(0,s.createElementBlock)("div",l,c)):(0,s.createCommentVNode)("v-if",!0),((0,s.openBlock)(!0),(0,s.createElementBlock)(s.Fragment,null,(0,s.renderList)(x.notifications,(function(t){return(0,s.openBlock)(),(0,s.createElementBlock)("div",u,["Recipe"==t.type||"like"==t.type||"comment"==t.type?((0,s.openBlock)(),(0,s.createElementBlock)("div",m,(0,s.toDisplayString)(t.type.charAt(0)),1)):((0,s.openBlock)(),(0,s.createElementBlock)("img",p)),(0,s.createElementVNode)("div",f,[(0,s.createElementVNode)("div",v,(0,s.toDisplayString)(t.subject),1),(0,s.createElementVNode)("div",b,(0,s.toDisplayString)(t.message),1)]),(0,s.createElementVNode)("span",h,[(0,s.createElementVNode)("div",g,[(0,s.createElementVNode)("button",{type:"button",class:"btn btn-light btn-sm rounded",onClick:function(e){return _.DeleteNotification(t.id)}},y,8,j)]),E,(0,s.createElementVNode)("div",N,(0,s.toDisplayString)(e.formateDate(t.created_at)),1)])])})),256))])])])])],64)}},"./resources/js/components/dashboard/notifications.vue":(e,t,o)=>{o.r(t),o.d(t,{default:()=>a});var s=o("./resources/js/components/dashboard/notifications.vue?vue&type=template&id=c9fd4c9c"),n=o("./resources/js/components/dashboard/notifications.vue?vue&type=script&lang=js");const a=(0,o("./node_modules/vue-loader/dist/exportHelper.js").default)(n.default,[["render",s.render],["__file","resources/js/components/dashboard/notifications.vue"]])},"./resources/js/components/dashboard/notifications.vue?vue&type=script&lang=js":(e,t,o)=>{o.r(t),o.d(t,{default:()=>s.default});var s=o("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/dashboard/notifications.vue?vue&type=script&lang=js")},"./resources/js/components/dashboard/notifications.vue?vue&type=template&id=c9fd4c9c":(e,t,o)=>{o.r(t),o.d(t,{render:()=>s.render});var s=o("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/dashboard/notifications.vue?vue&type=template&id=c9fd4c9c")}}]);