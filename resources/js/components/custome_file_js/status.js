export const status = {
    template: '<div class="status m-5 position-fixed w-50 font-amiri z-9999" style="left: 25%;top: 5%;direction: rtl;" ref="stat"><div class="border alert alert-danger"><div class="fa fa-check"></div><div class="h5"></div>message</div ></div > ',
    methods: {
        formateDate(created_at) {
            return moment(created_at, false).fromNow();
        },
        formateDateWith(created_at, format) {
            return moment(created_at).format(format);
        }
    },
}


