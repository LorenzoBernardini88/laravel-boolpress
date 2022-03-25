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
    </div>
</template>

<script>
export default {
    name: 'SinglePost',
    data(){
        return {
            posts:{}
        }
    },
    created(){
        axios
        .get(`/api/posts/${this.$route.params.slug}`)
        .then((api)=>{
            this.posts = api.data;
        })
    }
}
</script>

<style>

</style>