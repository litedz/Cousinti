/*! For license information please see resources_js_components_admin_users_vue.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["resources_js_components_admin_users_vue"],{"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/admin/users.vue?vue&type=script&lang=js":(e,t,a)=>{a.r(t),a.d(t,{default:()=>l});const l={mounted:function(){this.getTableUsers(),this.getAvailableRoles()},data:function(){return{Show_form_roles:!1,users:"",usersFilter:"",searchValue:"",searchKey:"",start_date:"",end_date:"",SelectRole:"",UserIdSelected:"",Roles:"",UserEdit:""}},watch:{searchValue:{handler:function(){this.searchKey="",0==this.searchValue.length&&(this.usersFilter=Object.values(this.users).filter((function(e){return!0})))}}},methods:{FiltredBy:function(e){},FormEditRole:function(e){this.Show_form_roles=!0,this.UserEdit=e},getAvailableRoles:function(){var e=this;axios({method:"get",url:"/panel/roles"}).then((function(t){t.data&&t.data&&(e.Roles=t.data.roles)})).catch((function(e){}))},getTableUsers:function(e){var t=this;axios({method:"get",url:"/panel/users"}).then((function(e){e.data&&e.data&&(console.log(e.data),t.users=e.data.users,t.usersFilter=e.data.users)})).catch((function(e){}))},deleteUser:function(e){var t=this,a=new FormData;a.append("user_id",e),a.append("_method","DELETE"),axios({method:"POST",url:"/panel/users/"+e,data:a}).then((function(e){e.data&&e.data&&(t.$refs.status.Display(e.data.style,e.data.message,e.data.status,e.data.icon),t.getTableUsers())})).catch((function(e){}))},AssingRoleUser:function(e){var t=this,a=new FormData;a.append("user_id",e),a.append("role",this.SelectRole),axios({method:"POST",url:"/panel/role/change",data:a}).then((function(e){e.data&&e.data&&(t.$refs.status.Display(e.data.style,e.data.message,e.data.status,e.data.icon),t.getTableUsers(),t.Show_form_roles=!1)})).catch((function(e){}))},ApproveUser:function(){axios({method:"get",url:"/logout"}).then((function(e){e.data&&e.data})).catch((function(e){}))},NotifyUserForVerification:function(e){var t=new FormData;t.append("body","Please verified you email"),t.append("from","admin@contact.com"),t.append("recipient_id",e),axios.post("/messages",t).then((function(e){}))},SortedByKey:function(e,t){var a=this;this.searchKey=e,this.searchValue="",this.usersFilter="email_verified_at"===e?"unverified"===t?Object.values(this.users).filter((function(e){return null==e.email_verified_at})):Object.values(this.users).filter((function(e){return null!==e.email_verified_at})):"date"===e?Object.values(this.users).filter((function(e){return e.created_at>a.start_date&&e.created_at<a.end_date})):"old"==t?Object.values(this.users).sort((function(e,t){return e[a.searchKey]<t[a.searchKey]?-1:1})):Object.values(this.users).sort((function(e,t){return e[a.searchKey]<t[a.searchKey]?-1:1})).reverse()},SortedByValue:function(){var e=this;this.searchKey="",this.usersFilter=Object.values(this.users).filter((function(t){return t.username.match(e.searchValue)}))},ClearFilter:function(){this.usersFilter=Object.values(this.users).filter((function(e){return!0})),this.searchKey="",this.searchValue=""}}}},"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/admin/users.vue?vue&type=template&id=0b7dbe4d":(e,t,a)=>{a.r(t),a.d(t,{render:()=>Ne});var l=a("./node_modules/vue/dist/vue.esm-bundler.js"),s={id:"users-list"},r=(0,l.createElementVNode)("h1",{class:"border-bottom"},"Users Table",-1),o={class:"bg-white d-grid"},n={class:"filter mb-1 rounded-1 text-white",style:{background:"slategray"}},c={class:"w-100"},d={class:"row"},i={class:"col border-end"},u={class:"p-2"},m=(0,l.createElementVNode)("div",{class:"fs-4 text-black-50 title"},"Filter By Status",-1),f={class:"d-flex flex-column"},p={class:"border-bottom d-flex gap-1 justify-content-between w-50"},h=(0,l.createElementVNode)("label",{class:"form-check-label",for:"flexRadioDefault1"}," verified ",-1),v=["checked"],b={class:"d-flex gap-1 justify-content-between w-50"},V=(0,l.createElementVNode)("label",{class:"form-check-label",for:"flexRadioDefault2"}," unverified ",-1),E=["checked"],N={class:"col border-end"},y={class:"p-2"},g=(0,l.createElementVNode)("div",{class:"fs-4 text-black-50 title"},"Filter By Username",-1),x=(0,l.createElementVNode)("label",{for:"name"},null,-1),k={class:"col border-end"},_={class:"p-2"},S=(0,l.createElementVNode)("div",{class:"fs-4 text-black-50 title"},"Filter Date",-1),D=(0,l.createElementVNode)("label",{for:"Date"},null,-1),j=(0,l.createElementVNode)("div",null," To",-1),w=["disabled"],B={class:"col border-end"},R={class:"p-2"},U=(0,l.createElementVNode)("div",{class:"fs-4 text-black-50 title"},"Filter By Sing Up",-1),C={class:"d-flex flex-column"},F={class:"border-bottom d-flex gap-1 justify-content-between w-50"},K=(0,l.createElementVNode)("label",{class:"form-check-label",for:"flexRadioDefault3"}," News Users ",-1),z={class:"d-flex gap-1 justify-content-between w-50"},T=(0,l.createElementVNode)("label",{class:"form-check-label",for:"flexRadioDefault4"}," Old Users ",-1),A={class:"col border-end"},O={class:"p-2"},L=(0,l.createElementVNode)("div",{class:"fs-4 text-black-50 title"},"Filter By Age",-1),M={class:"d-flex flex-column"},P={class:"d-flex gap-1 justify-content-between w-25"},$=(0,l.createElementVNode)("label",{class:"form-check-label"},"Age ",-1),H=["checked"],I={class:"shadow"},q={class:"table table-hover text-center"},G=(0,l.createElementVNode)("thead",{class:"bg-gray-700 fw-lighter text-white"},[(0,l.createElementVNode)("tr",null,[(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"#"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"username"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"First"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"Last"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"email"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"age"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"phone"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"Email Veréfication"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"Status"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"Date Sing Up"),(0,l.createElementVNode)("th",{scope:"col",class:"text-capitalize"},"Actions")])],-1),J={scope:"row"},Q={class:"fs-6 text-capitalize"},W={class:"fs-6 text-capitalize"},X={class:"fs-6 text-capitalize"},Y={class:"fs-6"},Z={class:"fs-6"},ee={class:"fs-6"},te={class:"fs-6"},ae={key:0,class:"badge bg-success"},le={key:1,class:"badge bg-danger"},se={key:0,class:"badge bg-orange"},re={key:1,class:"badge bg-info"},oe={key:2,class:"badge bg-gray-700"},ne={class:""},ce=["onClick"],de=["onClick"],ie=["onClick"],ue={key:0,class:"bg-gray h-50 left-45 mx-auto p-3 position-fixed rounded-4 top-50 w-25",id:"form-role"},me={class:"d-grid gap-2"},fe=(0,l.createElementVNode)("div",{class:"title w-100 text-center text-muted fs-5 border-bottom"},"Assigne Role for User",-1),pe={for:"username"},he={class:"d-flex gap-2"},ve=(0,l.createElementVNode)("span",null,"Current Role :",-1),be={class:"fw-bolder"},Ve=(0,l.createElementVNode)("label",{for:"role"},null,-1),Ee=["value"];function Ne(e,t,a,Ne,ye,ge){var xe=(0,l.resolveComponent)("status"),ke=(0,l.resolveComponent)("Button");return(0,l.openBlock)(),(0,l.createElementBlock)("div",s,[(0,l.createVNode)(xe,{ref:"status"},null,512),r,(0,l.createElementVNode)("div",o,[(0,l.createElementVNode)("div",n,[(0,l.createElementVNode)("div",c,[(0,l.createElementVNode)("div",d,[(0,l.createElementVNode)("div",i,[(0,l.createElementVNode)("div",u,[(0,l.createVNode)(ke,{type:"button",class:"btn btn-info mb-1",onClick:t[0]||(t[0]=function(e){return ge.ClearFilter()})},{default:(0,l.withCtx)((function(){return[(0,l.createTextVNode)("Clear Filter")]})),_:1}),m,(0,l.createElementVNode)("div",f,[(0,l.createElementVNode)("div",p,[h,(0,l.createElementVNode)("input",{onClick:t[1]||(t[1]=function(e){return ge.SortedByKey("email_verified_at","verified")}),class:"form-check-input",type:"radio",name:"flexRadioDefault",id:"flexRadioDefault1",checked:"email_verified_at"==ye.searchKey},null,8,v)]),(0,l.createElementVNode)("div",b,[V,(0,l.createElementVNode)("input",{class:"form-check-input",type:"radio",name:"flexRadioDefault",onClick:t[2]||(t[2]=function(e){return ge.SortedByKey("email_verified_at","unverified")}),id:"flexRadioDefault2",checked:"email_verified_at"==ye.searchKey},null,8,E)])])])]),(0,l.createElementVNode)("div",N,[(0,l.createElementVNode)("div",y,[g,x,(0,l.withDirectives)((0,l.createElementVNode)("input",{type:"text",class:"form-control",name:"username",placeholder:"username ...","onUpdate:modelValue":t[3]||(t[3]=function(e){return ye.searchValue=e}),onKeypress:t[4]||(t[4]=function(e){return ge.SortedByValue()})},null,544),[[l.vModelText,ye.searchValue]])])]),(0,l.createElementVNode)("div",k,[(0,l.createElementVNode)("div",_,[S,D,(0,l.withDirectives)((0,l.createElementVNode)("input",{type:"date",class:"form-control",name:"name",placeholder:"name ...","onUpdate:modelValue":t[5]||(t[5]=function(e){return ye.start_date=e})},null,512),[[l.vModelText,ye.start_date]]),j,(0,l.withDirectives)((0,l.createElementVNode)("input",{type:"date",class:"form-control",name:"name",placeholder:"name ...","onUpdate:modelValue":t[6]||(t[6]=function(e){return ye.end_date=e})},null,512),[[l.vModelText,ye.end_date]]),(0,l.createElementVNode)("button",{class:"btn btn-primary mt-3",onClick:t[7]||(t[7]=function(e){return ge.SortedByKey("date")}),disabled:0==ye.start_date.length||0==ye.end_date.length},"Between Dates",8,w)])]),(0,l.createElementVNode)("div",B,[(0,l.createElementVNode)("div",R,[U,(0,l.createElementVNode)("div",C,[(0,l.createElementVNode)("div",F,[K,(0,l.createElementVNode)("input",{class:"form-check-input",type:"radio",name:"flexRadioDefault1",onClick:t[8]||(t[8]=function(e){return ge.SortedByKey("created_at","new")}),id:"flexRadioDefault3"})]),(0,l.createElementVNode)("div",z,[T,(0,l.createElementVNode)("input",{class:"form-check-input",type:"radio",name:"flexRadioDefault1",onClick:t[9]||(t[9]=function(e){return ge.SortedByKey("created_at","old")}),id:"flexRadioDefault4"})])])])]),(0,l.createElementVNode)("div",A,[(0,l.createElementVNode)("div",O,[L,(0,l.createElementVNode)("div",M,[(0,l.createElementVNode)("div",P,[$,(0,l.createElementVNode)("input",{class:"form-check-input",type:"radio",name:"age",onClick:t[10]||(t[10]=function(e){return ge.SortedByKey("age")}),checked:"age"==ye.searchKey,id:"age"},null,8,H)])])])])])])]),(0,l.createElementVNode)("div",I,[(0,l.createElementVNode)("table",q,[G,(0,l.createCommentVNode)(" User Table  "),(0,l.createElementVNode)("tbody",null,[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(ye.usersFilter,(function(t,a){return(0,l.openBlock)(),(0,l.createElementBlock)("tr",{key:t.info},[(0,l.createElementVNode)("th",J,(0,l.toDisplayString)(a+1),1),(0,l.createElementVNode)("td",Q,(0,l.toDisplayString)(t.username),1),(0,l.createElementVNode)("td",W,(0,l.toDisplayString)(t.first_name),1),(0,l.createElementVNode)("td",X,(0,l.toDisplayString)(t.last_name),1),(0,l.createElementVNode)("td",Y,(0,l.toDisplayString)(t.email),1),(0,l.createElementVNode)("td",Z,(0,l.toDisplayString)(t.age),1),(0,l.createElementVNode)("td",ee,(0,l.toDisplayString)(t.phone),1),(0,l.createElementVNode)("td",te,[null!==t.email_verified_at?((0,l.openBlock)(),(0,l.createElementBlock)("span",ae,"verified")):((0,l.openBlock)(),(0,l.createElementBlock)("span",le,"Unverified"))]),(0,l.createElementVNode)("td",null,["admin"==t.role.role?((0,l.openBlock)(),(0,l.createElementBlock)("span",se,(0,l.toDisplayString)(t.role.role),1)):(0,l.createCommentVNode)("v-if",!0),"moderator"==t.role.role?((0,l.openBlock)(),(0,l.createElementBlock)("span",re,(0,l.toDisplayString)(t.role.role),1)):(0,l.createCommentVNode)("v-if",!0),"user"==t.role.role?((0,l.openBlock)(),(0,l.createElementBlock)("span",oe,(0,l.toDisplayString)(t.role.role),1)):(0,l.createCommentVNode)("v-if",!0)]),(0,l.createElementVNode)("td",null,(0,l.toDisplayString)(e.formateDate(t.created_at)),1),(0,l.createElementVNode)("td",ne,[(0,l.createElementVNode)("span",{class:"fa fa-user-plus mx-2 text-orange pointer",onClick:function(e){return ge.FormEditRole(t)}},null,8,ce),(0,l.createElementVNode)("span",{class:"fa fa-trash mx-2 text-danger pointer",onClick:function(e){return ge.deleteUser(t.id)}},null,8,de),(0,l.createElementVNode)("span",{class:"fa fa-user-check mx-2 pointer text-first",onClick:function(e){return ge.NotifyUserForVerification(t.id)}},null,8,ie)])])})),128))])])])]),(0,l.createCommentVNode)(" Form  Assing Role for User "),ye.Show_form_roles?((0,l.openBlock)(),(0,l.createElementBlock)("div",ue,[(0,l.createElementVNode)("span",{class:"bg-body fa fa-remove p-1 pointer px-2 rounded-circle",onClick:t[11]||(t[11]=function(e){return ye.Show_form_roles=!1})}),(0,l.createElementVNode)("form",me,[fe,(0,l.createElementVNode)("label",pe,(0,l.toDisplayString)(ye.UserEdit.username),1),(0,l.createElementVNode)("div",he,[ve,(0,l.createElementVNode)("span",be,(0,l.toDisplayString)(ye.UserEdit.role.role),1)]),Ve,(0,l.withDirectives)((0,l.createElementVNode)("select",{"onUpdate:modelValue":t[12]||(t[12]=function(e){return ye.SelectRole=e}),class:"form-select"},[((0,l.openBlock)(!0),(0,l.createElementBlock)(l.Fragment,null,(0,l.renderList)(ye.Roles,(function(e,t){return(0,l.openBlock)(),(0,l.createElementBlock)("option",{value:e,key:e},(0,l.toDisplayString)(e),9,Ee)})),128))],512),[[l.vModelSelect,ye.SelectRole]]),(0,l.createElementVNode)("button",{class:"btn btn-primary btn-lg",type:"button",onClick:t[13]||(t[13]=function(e){return ge.AssingRoleUser(ye.UserEdit.id)})},"Assigne Role")])])):(0,l.createCommentVNode)("v-if",!0)])}},"./resources/js/components/admin/users.vue":(e,t,a)=>{a.r(t),a.d(t,{default:()=>r});var l=a("./resources/js/components/admin/users.vue?vue&type=template&id=0b7dbe4d"),s=a("./resources/js/components/admin/users.vue?vue&type=script&lang=js");const r=(0,a("./node_modules/vue-loader/dist/exportHelper.js").default)(s.default,[["render",l.render],["__file","resources/js/components/admin/users.vue"]])},"./resources/js/components/admin/users.vue?vue&type=script&lang=js":(e,t,a)=>{a.r(t),a.d(t,{default:()=>l.default});var l=a("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/admin/users.vue?vue&type=script&lang=js")},"./resources/js/components/admin/users.vue?vue&type=template&id=0b7dbe4d":(e,t,a)=>{a.r(t),a.d(t,{render:()=>l.render});var l=a("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/admin/users.vue?vue&type=template&id=0b7dbe4d")}}]);