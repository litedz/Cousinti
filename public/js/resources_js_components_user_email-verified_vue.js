/*! For license information please see resources_js_components_user_email-verified_vue.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["resources_js_components_user_email-verified_vue"],{"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/user/email-verified.vue?vue&type=script&lang=js":(e,s,r)=>{r.r(s),r.d(s,{default:()=>o});const o={props:["status"],data:function(){return{message:"Verifying your email will help us keep your account secure and provide you with the best user experience Please check Link Below",show_link:!0}},methods:{SendMail:function(){var e=this;this.show_link=!1,axios.post("/user/email/verification").then((function(s){s.data.message&&(e.message=s.data.message,e.show_link=!1)})).catch((function(s){e.show_link=!0}))}}}},"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/user/email-verified.vue?vue&type=template&id=225487bc":(e,s,r)=>{r.r(s),r.d(s,{render:()=>i});var o=r("./node_modules/vue/dist/vue.esm-bundler.js"),l={key:0,class:"email-status end-0 mx-3 position-fixed top-45 w-25-perso w-50-sc z-9999"},t={class:"alert alert-warning"},u=(0,o.createElementVNode)("div",{class:"fw-bold text-center",style:{color:"#541833"}},"Email Not verified ",-1),d={class:"fs-6 message"};function i(e,s,r,i,n,a){return 1!==r.status?((0,o.openBlock)(),(0,o.createElementBlock)("div",l,[(0,o.createElementVNode)("div",t,[u,(0,o.createElementVNode)("div",d,(0,o.toDisplayString)(n.message),1),n.show_link?((0,o.openBlock)(),(0,o.createElementBlock)("a",{key:0,class:"fw-bolder",href:"#",onClick:s[0]||(s[0]=function(e){return a.SendMail()}),style:{color:"#541833"}},"verified email")):(0,o.createCommentVNode)("v-if",!0)])])):(0,o.createCommentVNode)("v-if",!0)}},"./resources/js/components/user/email-verified.vue":(e,s,r)=>{r.r(s),r.d(s,{default:()=>t});var o=r("./resources/js/components/user/email-verified.vue?vue&type=template&id=225487bc"),l=r("./resources/js/components/user/email-verified.vue?vue&type=script&lang=js");const t=(0,r("./node_modules/vue-loader/dist/exportHelper.js").default)(l.default,[["render",o.render],["__file","resources/js/components/user/email-verified.vue"]])},"./resources/js/components/user/email-verified.vue?vue&type=script&lang=js":(e,s,r)=>{r.r(s),r.d(s,{default:()=>o.default});var o=r("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/user/email-verified.vue?vue&type=script&lang=js")},"./resources/js/components/user/email-verified.vue?vue&type=template&id=225487bc":(e,s,r)=>{r.r(s),r.d(s,{render:()=>o.render});var o=r("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/user/email-verified.vue?vue&type=template&id=225487bc")}}]);