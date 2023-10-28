/*! For license information please see resources_js_components_index_vue.js.LICENSE.txt */
"use strict";(self.webpackChunk=self.webpackChunk||[]).push([["resources_js_components_index_vue"],{"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=script&lang=js":(e,t,n)=>{n.r(t),n.d(t,{default:()=>s});var a=n("./node_modules/moment/moment.js"),r=n.n(a);const s={inject:["w_path"],mounted:function(){window.addEventListener("scroll",this.wheneScroll),this.availableTypes(),this.getRecipes()},unmounted:function(){window.removeEventListener("scroll",this.wheneScroll)},data:function(){return{recipesMonthly:"",UserMostPosted:"",MostComment:"",BestRecipes:"",RatingRecipe:"",LatestRecipes:"",types_recipe:"",effectImg:!1,imgBestRecipe:!1,show:"",activeComponent:"",showSubmenu:"",subscribe:"",buttonSubscrube:!0}},methods:{getRecipes:function(){var e=this;axios({method:"get",url:"/guest/recipe"}).then((function(t){t.data&&(e.UserMostPosted=t.data.UserMostPosted,console.log("finish 1"),e.BestRecipes=t.data.BestRecipe,console.log("finish 2"),e.MostComment=t.data.MostComment,console.log("finish 3"),e.recipesMonthly=t.data.recipesOfMonth,e.RatingRecipe=t.data.RatingRecipe,e.LatestRecipes=t.data.LatestRecipes,document.getElementById("Top-recipes").style.height="auto",document.getElementById("MostCommentRecipe").style.height="auto")})).catch((function(e){}))},formateData:function(e,t){return r()(e,!0).format(t)},backTop:function(){document.documentElement.scrollTop=0},availableTypes:function(){var e=this;axios({method:"get",url:"types_recipe"}).then((function(t){t.data&&(e.types_recipe=t.data)})).catch((function(e){}))},EffectCategorie:function(){this.effectImg=!this.effectImg,this.effectImg?($("#"+event.target.id).find("img").css({transform:"scale(1.1)"}),$("#"+event.target.id).find(".squar").css({height:"100%"})):($("#"+event.target.id).find(".squar").css({height:"10%"}),$("#"+event.target.id).find("img").css({transform:"scale(1)"}))},EffectBestRecipe:function(){this.imgBestRecipe=!this.imgBestRecipe,this.imgBestRecipe?($(event.target).find(".opc").css("opacity","0.7"),$(event.target).find(".icon").css("opacity","1")):($(event.target).find(".opc").css("opacity","0"),$(event.target).find(".icon").css("opacity","0"))},scrollSlider:function(e,t){var n=document.getElementById(t),a=parseInt(n.style.right),r=n.offsetWidth;"right"===e?n.style.right=a<r-300?a+300+"px":"0px":a>0&&(n.style.right=a-300+"px")},wheneScroll:function(){$(window).scrollTop()>200?$("#btn-back-to-top").fadeIn():$("#btn-back-to-top").fadeOut()},hoverLink:function(e){"leave"==e?($("#"+event.target.getAttribute("data-menu")).fadeOut(),$(".sub-menu").fadeOut()):($(".index-nav li a").removeClass("link-nav"),$(event.target).addClass("link-nav"),0==$(event.target).hasClass(".link-nav")&&$(".sub-menu").fadeOut(),$("#"+event.target.getAttribute("data-menu")).fadeIn())},toggleNav:function(){$(".nav").fadeToggle()}}}},"./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=template&id=2ac2c897&scoped=true":(e,t,n)=>{n.r(t),n.d(t,{render:()=>It});var a=n("./node_modules/vue/dist/vue.esm-bundler.js"),r=function(e){return(0,a.pushScopeId)("data-v-2ac2c897"),e=e(),(0,a.popScopeId)(),e},s={class:"wrapper d-grid gap-5",dir:"rtl"},c={class:"header d-grid gap-5 h-100 mw-100"},o=r((function(){return(0,a.createElementVNode)("div",{class:"nav-bar-home"},null,-1)})),l={class:"Top-recipes w-100",dir:"rtl",style:{height:"500px"},id:"Top-recipes"},i={class:"container-fluid"},d={class:"row"},u={class:"position-relative recipe h-100 w-100"},p={class:"align-items-center d-flex flex-column fs-2 h-100 justify-content-end overlay pb-4 position-absolute text-white w-100",style:{background:"linear-gradient(1deg, black,transparent, transparent)"}},m={class:"name-recipe"},g=["href"],f={class:"px-4 text-start w-100",style:{"letter-spacing":"1px"},bis_skin_checked:"1"},v={bis_skin_checked:"1",class:"badge bg-danger bg-gradient fs-6 fw-bolder text-white type"},h={class:"d-flex flex-row-reverse justify-content-between justify-content-center px-4 w-100"},b={class:"date fs-6 text-white-50"},y={key:0},x=["srcset"],E=["srcset"],w=["src"],N={key:1},V=["srcset"],_=["srcset"],k=["src"],j=r((function(){return(0,a.createElementVNode)("img",null,null,-1)})),S={class:"Trending mt-xl-5"},B={class:"container"},R={class:"row"},C={class:"col-4 col-md-5 p-d-none-sc right-bar"},L={class:"trend"},M=r((function(){return(0,a.createElementVNode)("div",{class:"align-items-center border d-flex flex-row-reverse gap-1 header justify-content-between pe-3"},[(0,a.createElementVNode)("span",{class:"fa fa-arrow-trend-up fs-4 h-100 p-2 third-color"}),(0,a.createElementVNode)("span",{class:"fs-3 text-black-title"},"وصفات هذا الشهر")],-1)})),D={class:"border d-flex mt-2 p-1 recipe text-truncate"},T={key:0},$=["srcset"],I=["srcset"],O=["src"],P={key:1},F=["srcset"],z=["srcset"],U=["src"],A={class:"d-flex flex-column gap-1 mx-2"},q={class:"name-recipe"},H=["href","title"],W=["href"],J=r((function(){return(0,a.createElementVNode)("div",{class:"populer"},null,-1)})),K={class:"col-12 col-md-7 d-grid gap-4 left-bar"},Q=r((function(){return(0,a.createElementVNode)("div",{class:"fs-2 header position-relative text-black-title"},"رمضانيات",-1)})),Y={class:"row gy-3",style:{height:"500px"},id:"MostCommentRecipe"},G={key:0,class:"col-12"},X={class:"recipe overflow-hidden"},Z={class:"w-100"},ee={class:"img-container position-relative w-100"},te={class:"d-flex fw-bolder gap-4 info justify-content-center position-absolute text-center text-white third-color top-50 w-100 z-9999"},ne={class:"level"},ae={class:"mx-2"},re=r((function(){return(0,a.createElementVNode)("span",{class:"fa fa-signal-perfect"},null,-1)})),se={class:"time"},ce={class:"mx-2"},oe=r((function(){return(0,a.createElementVNode)("span",{class:"fa fa-clock-four"},null,-1)})),le=r((function(){return(0,a.createElementVNode)("div",{class:"align-items-center bg-first-color d-flex h-100 justify-content-center overlay p-2 position-absolute w-100"},null,-1)})),ie={key:0},de=["srcset"],ue=["srcset"],pe=["src"],me={key:1},ge=["srcset"],fe=["srcset"],ve=["src"],he={class:"fs-3 title"},be={class:"d-grid gap-1"},ye=["href"],xe={class:"data second-color fs-6"},Ee={class:""},we=r((function(){return(0,a.createElementVNode)("span",{class:"fa fa-calendar-alt"},null,-1)})),Ne={class:"d-grid position-relative recipe"},Ve={class:"img-container position-relative"},_e=(0,a.createStaticVNode)('<div class="d-flex fw-bolder gap-2 info justify-content-center position-absolute text-center text-white third-color top-50 w-100 z-9999" data-v-2ac2c897><span class="level" data-v-2ac2c897><span class="mx-2" data-v-2ac2c897>Beginner</span><span class="fa fa-signal-perfect" data-v-2ac2c897></span></span><span class="time" data-v-2ac2c897><span class="mx-2" data-v-2ac2c897>30 Min</span><span class="fa fa-clock-four" data-v-2ac2c897></span></span></div><div class="align-items-center bg-first-color d-flex h-100 justify-content-center overlay p-2 position-absolute w-100" data-v-2ac2c897></div>',2),ke=["srcset"],je=["srcset"],Se=["src"],Be={class:"fs-3 title text-truncate"},Re={class:"d-grid gap-1"},Ce=["href"],Le={class:"data second-color fs-6"},Me={class:""},De=r((function(){return(0,a.createElementVNode)("span",{class:"fa fa-calendar-alt"},null,-1)})),Te={class:"categories d-grid gap-5"},$e={class:"align-items-center d-flex flex-column heading justify-content-center position-relative text-center"},Ie=["srcset"],Oe=["srcset"],Pe=["src"],Fe=r((function(){return(0,a.createElementVNode)("span",{class:"fs-1 mt-2 position-absolute top-50 w-100"},"Heading",-1)})),ze={class:"container-fluid"},Ue={class:"row justify-content-center"},Ae={class:"img-container position-relative"},qe=["srcset"],He=["srcset"],We=["src"],Je={class:"h1 position-absolute text-center text-white title top-50 w-100 opacity-0",style:{background:"#a52a2a82"}},Ke=(0,a.createStaticVNode)('<section class="subscribee mt-5" data-v-2ac2c897><div class="p-4 position-relative z-5555" data-v-2ac2c897><div class="container" data-v-2ac2c897><div class="d-flex flex-column gap-2 justify-content-center p-4 position-relative w-100 z-9999" data-v-2ac2c897><div class="d-flex flex-column text-center" data-v-2ac2c897><span class="fs-1" data-v-2ac2c897>Enjoy with Our Website</span><span class="fs-5 text-black-50" data-v-2ac2c897>Onclick and you are clitch</span></div><div class="d-flex gap-1 justify-content-center" data-v-2ac2c897><input type="text" name="" id="" placeholder="Please Subscribesubscribee Here . . ." class="form-control w-100-sc w-25-perso" data-v-2ac2c897><button type="button" class="bg-second-color border-0 btn btn-danger" name="subscribee" data-v-2ac2c897>Subscribesubscribee</button></div></div></div>\x3c!-- &lt;div class=&quot;bg-black h-100 opacity-25 overlay position-absolute top-0 w-100&quot;&gt;&lt;/div&gt; --\x3e</div></section>',1),Qe={class:"random-recipe mt-5"},Ye={class:""},Ge={class:"container pb-5"},Xe={class:"row"},Ze={class:"align-self-center col-12 col-md-6"},et={class:"align-items-start d-flex flex-column fs-6 gap-4 lh-lg p-3 rounded"},tt=r((function(){return(0,a.createElementVNode)("div",{class:"fs-1 title"},"مشكلة الفطور في اليوم",-1)})),nt=r((function(){return(0,a.createElementVNode)("div",{class:"text"},"هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد، النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع. ومن هنا وجب على المصمم أن يضع نصوصا مؤقتة على التصميم.",-1)})),at={class:"d-flex gap-2 gap-3 justify-content-center"},rt=r((function(){return(0,a.createElementVNode)("button",{type:"button",class:"bg-white border btn btn-lg fw-bolder",style:{color:"#1c292c"}},"اختيار حسب المقادير",-1)})),st={class:"col-12 col-md-6 d-flex justify-content-center cover"},ct=["srcset"],ot=["srcset"],lt=["src"],it={class:"compnent-random-recipe"},dt={class:"d-grid interesting"},ut={class:"border-top container d-grid gap-5 mt-1"},pt={class:"d-flex flex-column fs-1 heading-separator mb-3 mt-3 position-relative text-center"},mt=r((function(){return(0,a.createElementVNode)("span",{class:""},"interesting",-1)})),gt=["srcset"],ft=["srcset"],vt=["src"],ht={class:"border-top pt-3 row"},bt={class:"col-3 col-md-4 right-bar p-d-none-sc"},yt=(0,a.createStaticVNode)('<div class="border col-12 mb-2 social-media" data-v-2ac2c897><div class="bg-second-color fs-5 fw-bolder heading p-2 text-center text-white" data-v-2ac2c897><span data-v-2ac2c897>Follow Us</span></div><div class="d-flex fs-4 gap-2 justify-content-center p-3 text-black-title" data-v-2ac2c897><i class="fa-brands fa-facebook" data-v-2ac2c897></i><i class="fa-brands fa-youtube" data-v-2ac2c897></i><i class="fa-brands fa-instagram" data-v-2ac2c897></i></div></div>',1),xt={class:"border col-12 top-user"},Et=r((function(){return(0,a.createElementVNode)("div",{class:"bg-gradient bg-second-color fs-5 heading p-2 text-center text-white"},[(0,a.createElementVNode)("span",null,"Most Posted")],-1)})),wt=["src"],Nt={class:"d-flex flex-column gap-1 justify-content-start"},Vt=["href"],_t={class:"first-color fs-6"},kt={class:"content col-12 col-md-8"},jt={class:"row"},St={class:"d-flex"},Bt=r((function(){return(0,a.createElementVNode)("picture",null,[(0,a.createElementVNode)("source",{srcset:"https://picsum.photos/200"}),(0,a.createElementVNode)("source",{srcset:"https://picsum.photos/200"}),(0,a.createElementVNode)("img",{src:"https://picsum.photos/200",alt:"image",width:"120",height:"120",class:"img-thumbnail img-fluid rounded"})],-1)})),Rt={class:"d-grid px-3"},Ct={class:""},Lt=["href"],Mt={class:"discption text-truncate fs-6 text-black-title"},Dt={class:"date font-italic fs-6 second-color"},Tt={class:"footer"},$t=[r((function(){return(0,a.createElementVNode)("i",{class:"fas fa-arrow-up"},null,-1)}))];function It(e,t,n,r,It,Ot){var Pt=(0,a.resolveComponent)("status"),Ft=(0,a.resolveComponent)("footer-page");return(0,a.openBlock)(),(0,a.createElementBlock)("div",s,[(0,a.createVNode)(Pt,{ref:"status"},null,512),(0,a.createElementVNode)("section",c,[o,(0,a.createElementVNode)("div",l,[(0,a.createElementVNode)("div",i,[(0,a.createElementVNode)("div",d,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(It.BestRecipes,(function(e){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:"col-12 col-md-4 p-0",key:e.best},[(0,a.createElementVNode)("div",u,[(0,a.createElementVNode)("div",p,[(0,a.createElementVNode)("div",m,[(0,a.createElementVNode)("a",{href:"/recipes/"+e.id,"aria-label":"read More",class:"text-decoration-none text-white"},(0,a.toDisplayString)(e.name),9,g)]),(0,a.createElementVNode)("div",f,[(0,a.createElementVNode)("div",v,(0,a.toDisplayString)(e.type_recipe.type),1)]),(0,a.createElementVNode)("div",h,[(0,a.createElementVNode)("span",b,(0,a.toDisplayString)(Ot.formateData(e.created_at,"LLLL")),1),(0,a.createCommentVNode)(' <span class="fs-6 text-white-50">25 views</span> ')])]),0!==e.images_recipe.length?((0,a.openBlock)(),(0,a.createElementBlock)("picture",y,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,x),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,E),(0,a.createElementVNode)("img",{fetchpriority:"high",class:"img-fluid",src:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name,alt:"image",height:"1000",width:"1000"},null,8,w)])):((0,a.openBlock)(),(0,a.createElementBlock)("picture",N,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/default-cover.png"},null,8,V),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/default-cover.png"},null,8,_),(0,a.createElementVNode)("img",{class:"img-fluid",src:Ot.w_path+"/storage/recipes/default-cover.png",alt:"image",height:"1000",width:"1000"},null,8,k)])),j])])})),128))])])])]),(0,a.createElementVNode)("section",S,[(0,a.createElementVNode)("div",B,[(0,a.createElementVNode)("div",R,[(0,a.createElementVNode)("div",C,[(0,a.createElementVNode)("div",L,[M,((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(It.recipesMonthly,(function(e){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:"border d-grid p-3 px-3",style:{direction:"rtl"},key:It.recipesMonthly.recipe},[(0,a.createElementVNode)("div",D,[0!==e.images_recipe.length?((0,a.openBlock)(),(0,a.createElementBlock)("picture",T,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,$),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,I),(0,a.createElementVNode)("img",{class:"img-fluid",src:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name,alt:"image recipe",title:"image recipe",style:{height:"80px"}},null,8,O)])):((0,a.openBlock)(),(0,a.createElementBlock)("picture",P,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/default-cover.webp"},null,8,F),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/default-cover.webp"},null,8,z),(0,a.createElementVNode)("img",{class:"img-fluid",src:Ot.w_path+"/storage/recipes/default-cover.webp",alt:"image recipe",title:"image recipe",style:{height:"80px"}},null,8,U)])),(0,a.createElementVNode)("div",A,[(0,a.createElementVNode)("div",q,[(0,a.createElementVNode)("a",{href:Ot.w_path+"/recipes/"+e.id,"aria-label":"Read more",class:"text-black-title fs-3 text-decoration-none","data-toggle":"tooltip","data-placement":"top",title:e.name},(0,a.toDisplayString)(e.name),9,H)]),(0,a.createElementVNode)("a",{href:"/similar/"+e.type_recipe.type,"aria-label":"go to similar type recipe",class:"type text-decoration-none color-link"},(0,a.toDisplayString)(e.type_recipe.type),9,W)])])])})),128))]),J]),(0,a.createElementVNode)("div",K,[Q,(0,a.createElementVNode)("div",Y,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(It.MostComment,(function(e,t){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{key:e.MostComment},[(0,a.createCommentVNode)(" Print first Image  "),0==t?((0,a.openBlock)(),(0,a.createElementBlock)("div",G,[(0,a.createElementVNode)("div",X,[(0,a.createElementVNode)("div",Z,[(0,a.createElementVNode)("div",ee,[(0,a.createElementVNode)("div",te,[(0,a.createElementVNode)("span",ne,[(0,a.createElementVNode)("span",ae,(0,a.toDisplayString)(e.level),1),re]),(0,a.createElementVNode)("span",se,[(0,a.createElementVNode)("span",ce,(0,a.toDisplayString)(e.how_long)+" Min",1),oe])]),le,0!==e.images_recipe.length?((0,a.openBlock)(),(0,a.createElementBlock)("picture",ie,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,de),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,ue),(0,a.createElementVNode)("img",{src:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name,class:"img-fluid",alt:"image_recipe"},null,8,pe)])):null==e.images_recipe.length?((0,a.openBlock)(),(0,a.createElementBlock)("picture",me,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/default-cover.png"},null,8,ge),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/default-cover.png"},null,8,fe),(0,a.createElementVNode)("img",{src:Ot.w_path+"/storage/recipes/default-cover.png",alt:"image_recipe",class:"img-fluid"},null,8,ve)])):(0,a.createCommentVNode)("v-if",!0)]),(0,a.createElementVNode)("div",he,(0,a.toDisplayString)(e.name),1),(0,a.createElementVNode)("div",be,[(0,a.createElementVNode)("a",{href:"/profile/"+e.author.id,"aria-label":"got to profile ",class:"author fst-italic fw-bolder color-link text-decoration-none"},(0,a.toDisplayString)(e.author.username),9,ye),(0,a.createElementVNode)("span",xe,[(0,a.createElementVNode)("span",Ee,(0,a.toDisplayString)(Ot.formateData(e.created_at,"LL")),1),we])])])])])):(0,a.createCommentVNode)("v-if",!0)])})),128)),0!==e.index?((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,{key:0},(0,a.renderList)(It.MostComment,(function(e,t){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:"col-6 col-md-6 col-lg-3",key:e.MostComment},[(0,a.createElementVNode)("div",Ne,[(0,a.createElementVNode)("div",Ve,[_e,(0,a.createElementVNode)("picture",null,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,ke),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name},null,8,je),(0,a.createElementVNode)("img",{src:Ot.w_path+"/storage/recipes/"+e.images_recipe[0].name,alt:"image",class:"img-fluid",height:"1000",width:"1000"},null,8,Se)])]),(0,a.createElementVNode)("div",Be,(0,a.toDisplayString)(e.name),1),(0,a.createElementVNode)("div",Re,[(0,a.createElementVNode)("a",{href:"/profile/"+e.author.id,"aria-label":"got to profile",class:"author fst-italic fw-bolder color-link text-decoration-none"},(0,a.toDisplayString)(e.author.username),9,Ce),(0,a.createElementVNode)("span",Le,[(0,a.createElementVNode)("span",Me,(0,a.toDisplayString)(Ot.formateData(e.created_at,"LL")),1),De])])])])})),128)):(0,a.createCommentVNode)("v-if",!0)])])])])]),(0,a.createElementVNode)("section",Te,[(0,a.createElementVNode)("div",$e,[(0,a.createElementVNode)("picture",null,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/images/shape-v2.png"},null,8,Ie),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/images/shape-v2.png"},null,8,Oe),(0,a.createElementVNode)("img",{src:Ot.w_path+"/images/shape-v2.png",class:"img-fluid",style:{width:"120px"},alt:"image",width:"120",height:"120"},null,8,Pe)]),Fe]),(0,a.createElementVNode)("div",ze,[(0,a.createElementVNode)("div",Ue,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(It.types_recipe,(function(e){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:"categorie col-3 col-md-2 overflow-hidden p-0",key:e.recipe},[(0,a.createElementVNode)("div",Ae,[(0,a.createElementVNode)("picture",null,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/types/"+e.image},null,8,qe),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/storage/types/"+e.image},null,8,He),(0,a.createElementVNode)("img",{src:Ot.w_path+"/storage/types/"+e.image,alt:"image type",class:"img-fluid",height:"500",width:"500"},null,8,We)]),(0,a.createElementVNode)("div",Je,(0,a.toDisplayString)(e.type),1)])])})),128))])])]),Ke,(0,a.createElementVNode)("section",Qe,[(0,a.createElementVNode)("div",Ye,[(0,a.createElementVNode)("div",Ge,[(0,a.createElementVNode)("div",Xe,[(0,a.createElementVNode)("div",Ze,[(0,a.createElementVNode)("div",et,[tt,nt,(0,a.createElementVNode)("div",at,[(0,a.createElementVNode)("button",{onClick:t[0]||(t[0]=function(e){return It.activeComponent="random-recipe"}),type:"button",name:"recipeOfthe Day",class:"bg-second-color btn btn-lg fw-bolder",style:{color:"#2c1c1c"}},"وصفة اليوم"),rt])])]),(0,a.createElementVNode)("div",st,[(0,a.createElementVNode)("picture",null,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/images/cover3.webp"},null,8,ct),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/images/cover3.webp"},null,8,ot),(0,a.createElementVNode)("img",{class:"img-fluid",src:Ot.w_path+"/images/cover3.webp",alt:"image random",height:"1000",width:"1000"},null,8,lt)])])])])])]),(0,a.createElementVNode)("section",it,[((0,a.openBlock)(),(0,a.createBlock)(a.KeepAlive,null,[((0,a.openBlock)(),(0,a.createBlock)((0,a.resolveDynamicComponent)(It.activeComponent),{onCloseRecipe:t[1]||(t[1]=function(e){return It.activeComponent="empty"})},null,32))],1024))]),(0,a.createElementVNode)("section",dt,[(0,a.createElementVNode)("div",ut,[(0,a.createElementVNode)("div",pt,[mt,(0,a.createElementVNode)("picture",null,[(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/images/seperator-interesting.png"},null,8,gt),(0,a.createElementVNode)("source",{srcset:Ot.w_path+"/images/seperator-interesting.png"},null,8,ft),(0,a.createElementVNode)("img",{src:Ot.w_path+"/images/seperator-interesting.png",alt:"image seperatore",class:"position-absolute w-25 img-fluid",style:{left:"38%",top:"85%"},height:"1000",width:"1000"},null,8,vt)])]),(0,a.createElementVNode)("div",ht,[(0,a.createElementVNode)("div",bt,[yt,(0,a.createElementVNode)("div",xt,[Et,((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(It.UserMostPosted,(function(e){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:"bg-light d-flex gap-2 m-1 px-2 rounded user",key:e.posted},[(0,a.createElementVNode)("img",{src:Ot.w_path+"/storage/"+e.avatar,alt:"avatar",title:"avatar",style:{width:"70px",height:"70px"},class:"rounded-circle img-fluid"},null,8,wt),(0,a.createElementVNode)("div",Nt,[(0,a.createElementVNode)("a",{href:Ot.w_path+"/profile/"+e.id,"aria-label":"profile show",class:"fs-4 name text-black-title"},(0,a.toDisplayString)(e.username),9,Vt),(0,a.createElementVNode)("span",_t,(0,a.toDisplayString)(e.rank.rank),1)])])})),128))])]),(0,a.createElementVNode)("div",kt,[(0,a.createElementVNode)("div",jt,[((0,a.openBlock)(!0),(0,a.createElementBlock)(a.Fragment,null,(0,a.renderList)(It.RatingRecipe,(function(e){return(0,a.openBlock)(),(0,a.createElementBlock)("div",{class:"col-12",key:e.rating},[(0,a.createElementVNode)("div",St,[Bt,(0,a.createElementVNode)("div",Rt,[(0,a.createElementVNode)("div",Ct,[(0,a.createElementVNode)("a",{class:"fs-4 title text-decoration-none text-black-title","aria-label":"Show Recipe",href:Ot.w_path+"/recipes/"+e.id},(0,a.toDisplayString)(e.name),9,Lt)]),(0,a.createElementVNode)("div",Mt,(0,a.toDisplayString)(e.description),1),(0,a.createElementVNode)("div",Dt,(0,a.toDisplayString)(Ot.formateData(e.created_at,"LL")),1)])])])})),128))])])])])]),(0,a.createElementVNode)("section",Tt,[(0,a.createVNode)(Ft)]),(0,a.createElementVNode)("button",{onClick:t[2]||(t[2]=function(e){return Ot.backTop()}),type:"button",class:"btn btn-info btn-floating btn-lg position-fixed rounded-pill z-7777",style:{right:"5%",bottom:"5%",display:"none"},id:"btn-back-to-top"},$t)])}},"./public/images/cover-subscribe.webp":(e,t,n)=>{n.r(t),n.d(t,{default:()=>a});const a="/images/cover-subscribe.webp?f7962b4a93ba00bbe150179182292de9"},"./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=style&index=0&id=2ac2c897&scoped=true&lang=css":(e,t,n)=>{n.r(t),n.d(t,{default:()=>d});var a=n("./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js"),r=n.n(a),s=n("./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/getUrl.js"),c=n.n(s),o=n("./public/images/cover-subscribe.webp"),l=r()((function(e){return e[1]})),i=c()(o.default);l.push([e.id,"\n.wrapper[data-v-2ac2c897] {\r\n\tmax-width: 100%;\r\n\theight: auto;\n}\n.random-recipes .recipe:hover .overlay[data-v-2ac2c897] {\r\n\r\n\topacity: 1 !important;\r\n\ttransition: all 1s;\n}\n.left-bar .header[data-v-2ac2c897]:after {\r\n\tcontent: '';\r\n\tbackground: #bdbdbd;\r\n\twidth: 100%;\r\n\theight: 1px;\r\n\tposition: absolute;\r\n\ttop: 50%;\r\n\tmargin: 0 30px;\r\n\ttext-shadow: 1px 1px red;\n}\n.left-bar .header[data-v-2ac2c897]:before {\r\n\tcontent: '';\r\n\theight: 44px;\r\n\twidth: 70px;\r\n\tbackground: #c9c9c900;\r\n\tposition: absolute;\r\n\t/* top: 39%; */\r\n\tz-index: 1;\r\n\topacity: 0.2;\r\n\tborder-radius: 50%;\r\n\tright: 6%;\r\n\tz-index: 2;\r\n\tborder-left: 5px solid red;\n}\n.Trending .img-container .overlay[data-v-2ac2c897] {\r\n\topacity: 0;\n}\n.Trending .img-container .info[data-v-2ac2c897] {\r\n\topacity: 0;\n}\n.Trending .img-container:hover .overlay[data-v-2ac2c897] {\r\n\topacity: 0.8;\r\n\ttransition: all 1s;\n}\n.Trending .img-container:hover .info[data-v-2ac2c897] {\r\n\topacity: 1;\r\n\ttransition: all 1s;\n}\n.categories .heading span[data-v-2ac2c897]::after {\r\n\tcontent: '';\r\n\twidth: 45%;\r\n\theight: 1px;\r\n\tposition: absolute;\r\n\tbackground: #c9c9c9;\r\n\ttop: 50%;\r\n\tleft: 0;\r\n\tmargin: 0 10px;\n}\n.categories .heading span[data-v-2ac2c897]::before {\r\n\tcontent: '';\r\n\twidth: 45%;\r\n\theight: 1px;\r\n\tposition: absolute;\r\n\tbackground: #c9c9c9;\r\n\ttop: 50%;\r\n\tright: 0;\r\n\tmargin: 0 10px;\n}\n.categories .img-container img[data-v-2ac2c897] {\r\n\ttransform: scale(1);\r\n\ttransition: all 1s;\n}\n.categories .img-container:hover img[data-v-2ac2c897] {\r\n\ttransform: scale(1.1);\r\n\ttransition: all 1s;\n}\n.categories .img-container:hover .title[data-v-2ac2c897] {\r\n\topacity: 1 !important;\r\n\ttransition: all 1s;\n}\nsection.subscribee div[data-v-2ac2c897]:first-of-type {\r\n\tbackground: url("+i+");\r\n\tbackground-size: cover;\r\n\tbackground-attachment: fixed;\r\n\tbackground-position: center;\n}\r\n\r\n\r\n\r\n/* .random-recipe .carousel-indicators {\r\n\twidth: 20px !important;\r\n\theight: 20px !important;\r\n\tborder-radius: 50% !important;\r\n} */\r\n/* Slider */\n.carousel-indicators button.thumbnail[data-v-2ac2c897] {\r\n\twidth: 100px;\n}\n.carousel-indicators button.thumbnail[data-v-2ac2c897]:not(.active) {\r\n\topacity: 0.7;\n}\n.carousel-indicators[data-v-2ac2c897] {\r\n\tposition: static;\n}\n.traditional-recipes .carousel-inner[data-v-2ac2c897] {\r\n\tpadding: 1em;\n}\n.traditional-recipes .card[data-v-2ac2c897] {\r\n\tmargin: 0 0.5em;\r\n\tborder-radius: 0;\r\n\tbox-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);\r\n\tfont-size: 0.9em;\n}\n.traditional-recipes .carousel-control-prev[data-v-2ac2c897],\r\n.traditional-recipes .carousel-control-next[data-v-2ac2c897] {\r\n\twidth: 6vh;\r\n\theight: 6vh;\r\n\tbackground-color: #e1e1e1;\r\n\tborder-radius: 50%;\r\n\ttop: 50%;\r\n\ttransform: translateY(-50%);\r\n\topacity: 0.5;\n}\n.traditional-recipes .carousel-control-prev[data-v-2ac2c897]:hover,\r\n.traditional-recipes .carousel-control-next[data-v-2ac2c897]:hover {\r\n\topacity: 0.8;\n}\n@media only screen and (max-width: 767px) {\n.Trending .trend .recipe[data-v-2ac2c897] {\r\n\t\tflex-direction: column !important;\n}\r\n\r\n\t/* Slider */\n.traditional-recipes .carousel-inner[data-v-2ac2c897] {\r\n\t\tdisplay: flex;\n}\n.traditional-recipes .carousel-item[data-v-2ac2c897] {\r\n\t\tdisplay: block;\r\n\t\tmargin-right: 0;\r\n\t\tflex: 0 0 calc(100% / 3);\n}\n.traditional-recipes .img-wrapper[data-v-2ac2c897] {\r\n\t\theight: 21vw;\n}\n}\n@media only screen and ((min-width: 767px) and (max-width: 920px)) {\n.Trending .recipe .name-recipe[data-v-2ac2c897] {\r\n\t\twidth: 50%;\r\n\t\toverflow: hidden;\r\n\t\ttext-overflow: ellipsis;\r\n\t\twhite-space: nowrap;\n}\n}\r\n",""]);const d=l},"./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/api.js":e=>{e.exports=function(e){var t=[];return t.toString=function(){return this.map((function(t){var n=e(t);return t[2]?"@media ".concat(t[2]," {").concat(n,"}"):n})).join("")},t.i=function(e,n,a){"string"==typeof e&&(e=[[null,e,""]]);var r={};if(a)for(var s=0;s<this.length;s++){var c=this[s][0];null!=c&&(r[c]=!0)}for(var o=0;o<e.length;o++){var l=[].concat(e[o]);a&&r[l[0]]||(n&&(l[2]?l[2]="".concat(n," and ").concat(l[2]):l[2]=n),t.push(l))}},t}},"./node_modules/laravel-mix/node_modules/css-loader/dist/runtime/getUrl.js":e=>{e.exports=function(e,t){return t||(t={}),"string"!=typeof(e=e&&e.__esModule?e.default:e)?e:(/^['"].*['"]$/.test(e)&&(e=e.slice(1,-1)),t.hash&&(e+=t.hash),/["'() \t\n]/.test(e)||t.needQuotes?'"'.concat(e.replace(/"/g,'\\"').replace(/\n/g,"\\n"),'"'):e)}},"./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=style&index=0&id=2ac2c897&scoped=true&lang=css":(e,t,n)=>{n.r(t),n.d(t,{default:()=>o});var a=n("./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js"),r=n.n(a),s=n("./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=style&index=0&id=2ac2c897&scoped=true&lang=css"),c={insert:"head",singleton:!1};r()(s.default,c);const o=s.default.locals||{}},"./node_modules/style-loader/dist/runtime/injectStylesIntoStyleTag.js":(e,t,n)=>{var a,r=function(){return void 0===a&&(a=Boolean(window&&document&&document.all&&!window.atob)),a},s=function(){var e={};return function(t){if(void 0===e[t]){var n=document.querySelector(t);if(window.HTMLIFrameElement&&n instanceof window.HTMLIFrameElement)try{n=n.contentDocument.head}catch(e){n=null}e[t]=n}return e[t]}}(),c=[];function o(e){for(var t=-1,n=0;n<c.length;n++)if(c[n].identifier===e){t=n;break}return t}function l(e,t){for(var n={},a=[],r=0;r<e.length;r++){var s=e[r],l=t.base?s[0]+t.base:s[0],i=n[l]||0,d="".concat(l," ").concat(i);n[l]=i+1;var u=o(d),p={css:s[1],media:s[2],sourceMap:s[3]};-1!==u?(c[u].references++,c[u].updater(p)):c.push({identifier:d,updater:v(p,t),references:1}),a.push(d)}return a}function i(e){var t=document.createElement("style"),a=e.attributes||{};if(void 0===a.nonce){var r=n.nc;r&&(a.nonce=r)}if(Object.keys(a).forEach((function(e){t.setAttribute(e,a[e])})),"function"==typeof e.insert)e.insert(t);else{var c=s(e.insert||"head");if(!c)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");c.appendChild(t)}return t}var d,u=(d=[],function(e,t){return d[e]=t,d.filter(Boolean).join("\n")});function p(e,t,n,a){var r=n?"":a.media?"@media ".concat(a.media," {").concat(a.css,"}"):a.css;if(e.styleSheet)e.styleSheet.cssText=u(t,r);else{var s=document.createTextNode(r),c=e.childNodes;c[t]&&e.removeChild(c[t]),c.length?e.insertBefore(s,c[t]):e.appendChild(s)}}function m(e,t,n){var a=n.css,r=n.media,s=n.sourceMap;if(r?e.setAttribute("media",r):e.removeAttribute("media"),s&&"undefined"!=typeof btoa&&(a+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(s))))," */")),e.styleSheet)e.styleSheet.cssText=a;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(a))}}var g=null,f=0;function v(e,t){var n,a,r;if(t.singleton){var s=f++;n=g||(g=i(t)),a=p.bind(null,n,s,!1),r=p.bind(null,n,s,!0)}else n=i(t),a=m.bind(null,n,t),r=function(){!function(e){if(null===e.parentNode)return!1;e.parentNode.removeChild(e)}(n)};return a(e),function(t){if(t){if(t.css===e.css&&t.media===e.media&&t.sourceMap===e.sourceMap)return;a(e=t)}else r()}}e.exports=function(e,t){(t=t||{}).singleton||"boolean"==typeof t.singleton||(t.singleton=r());var n=l(e=e||[],t);return function(e){if(e=e||[],"[object Array]"===Object.prototype.toString.call(e)){for(var a=0;a<n.length;a++){var r=o(n[a]);c[r].references--}for(var s=l(e,t),i=0;i<n.length;i++){var d=o(n[i]);0===c[d].references&&(c[d].updater(),c.splice(d,1))}n=s}}}},"./resources/js/components/index.vue":(e,t,n)=>{n.r(t),n.d(t,{default:()=>s});var a=n("./resources/js/components/index.vue?vue&type=template&id=2ac2c897&scoped=true"),r=n("./resources/js/components/index.vue?vue&type=script&lang=js");n("./resources/js/components/index.vue?vue&type=style&index=0&id=2ac2c897&scoped=true&lang=css");const s=(0,n("./node_modules/vue-loader/dist/exportHelper.js").default)(r.default,[["render",a.render],["__scopeId","data-v-2ac2c897"],["__file","resources/js/components/index.vue"]])},"./resources/js/components/index.vue?vue&type=script&lang=js":(e,t,n)=>{n.r(t),n.d(t,{default:()=>a.default});var a=n("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=script&lang=js")},"./resources/js/components/index.vue?vue&type=template&id=2ac2c897&scoped=true":(e,t,n)=>{n.r(t),n.d(t,{render:()=>a.render});var a=n("./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=template&id=2ac2c897&scoped=true")},"./resources/js/components/index.vue?vue&type=style&index=0&id=2ac2c897&scoped=true&lang=css":(e,t,n)=>{n.r(t);n("./node_modules/style-loader/dist/cjs.js!./node_modules/laravel-mix/node_modules/css-loader/dist/cjs.js??clonedRuleSet-10.use[1]!./node_modules/vue-loader/dist/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-10.use[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/components/index.vue?vue&type=style&index=0&id=2ac2c897&scoped=true&lang=css")}}]);