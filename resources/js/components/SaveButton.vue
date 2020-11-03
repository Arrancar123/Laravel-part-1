<template>
    <button class="btn btn-primary" @click="savePost" v-text="buttonIcon"
    style="background-color: Transparent; border: none; font-size: 25px;">

    </button>
</template>

<script>
    export default {

        props:['postId', 'likes'],

        mounted() {
            console.log('postId')
        },

        data: function(){
            return {
                status: this.likes,
            }
        },

        methods: {
            savePost() {
                axios.post('/saves/'+this.postId).then(response => {
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
                return(this.status) ? '☻' : '☺';
            }
        },
    }
</script>
