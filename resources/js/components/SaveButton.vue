<template>
    <button class="btn btn-primary" @click="savePost" v-text="buttonIcon"
    style="background-color: Transparent; border: none; font-size: 25px;">

    </button>
</template>

<script>
    export default {

        props:['saveId', 'saved'],

        mounted() {
            console.log('saveId')
        },

        data: function(){
            return {
                status: this.saved,
            }
        },

        methods: {
            savePost() {
                axios.post('/saves/'+this.saveId).then(response => {
                    this.status = !this.status;

                    console.log(response.data);
                })
                .catch(errors => {
                    if(errors.response.status == 401){
                        window.location = '/login';
                    }
                });

            }
        },

        computed: {
            buttonIcon() {
                return(this.status) ? '☺' : '☻';
            }
        },
    }
</script>
