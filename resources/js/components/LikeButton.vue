<template>
    <button class="btn btn-primary" @click="likePost" v-text="buttonText"
    style="background-color: Transparent; border: none; ">

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
            likePost() {
                axios.post('/like/'+this.postId).then(response => {
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
            buttonText() {
                return(this.status) ? '❤' : '♡';
            }
        },
    }
</script>
