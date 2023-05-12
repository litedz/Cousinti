import moment from "moment";
export const Refomate = {

    methods: {
        formateDate(created_at) {
            return moment(created_at, false).fromNow();
        },
        formateDateWith(created_at,format){
            return moment(created_at).creationData().input;
        }
    },
}


