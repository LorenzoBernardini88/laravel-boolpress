<template>
    <div class="container">
        <h1>{{posts.title}}</h1>
        <div v-html="posts.content"></div>
        <p v-if="posts.category"><strong>Categoria</strong></p>
        <div v-if="posts.tags.length > 0 ">
            <strong>Tags</strong>
            <ul>
                <li v-for="tag in posts.tags" :key="tag.id">
                    {{tag.name}}
                </li>
            </ul>
        </div>
        <div>
            <h4>Lascia un Commmento</h4>
            <form @submit.prevent="addComment()">
                <input type="text" id="name" placeholder="Nome Utente" v-model="formData.name">
                <textarea name="" id="content" cols="30" rows="10" placeholder="Inserisci Commento" v-model="formData.content"></textarea>
                <div v-if="formErrors.content" style="background:red; color:white;">
                    <ul>
                        <li v-for="(error,index) in formErrors.content" :key="index">
                            {{error}}
                        </li>
                    </ul>
                </div>
                <button type="submit">Aggiungi Commento</button>
            </form>
            <div v-show="commentSent" style="background:green; color:white;">
                commento in fase di approvazione!
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data(){
        return {
            posts:{},
            formData:{
                name:"",
                content:"",
                post_id:null,
            },
            commentSent: false,
            formErrors: {}
        }
    },
    created(){
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((api)=>{
            this.posts = api.data;
            this.formData.post_id = this.post.id
        })
        .catch((error)=>{
            //handle
            this.$router.push({name:'page-404'})
        })
    },
    methods:{
        addComment(){
            axios
            .post(`/api/comments/`,this.formData)
            .then( (response)=>{
                this.formData.name = "";
                this.formData.content = "";
                this.commentSent = true;
            })
            .catch((error)=>{
                this.formErrors = error.response.data.errors;
            })
        }
    }
}
</script>

<style>

</style>