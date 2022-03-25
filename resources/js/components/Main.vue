<template>
    <div>
        <div v-for="(post, index) in posts" :key="index">
            <h1>Post {{post.id}}</h1>
            <h2>Titolo: {{post.title}}</h2>
            <p>Contenuto: {{post.content}}</p>
            <p>Autore: {{post.post_author}}</p>
            <p>Data: {{post.post_date}}</p>
            <p>Categoria: {{post.category ? post.category.name : "-"}}</p>
            <span> Tags:</span>
            <span v-for="(tag, index) in post.tags" :key="index">{{tag.name}}</span>


        </div>
    </div>
</template>

<script>
export default {
    name: 'Main',
    data(){
        return {
            posts:[]
        }
    },
    created(){
        axios
        .get("/api/posts")
        .then((api)=>{
            this.posts = api.data;
        })
    }

}
</script>

<style scoped>

</style>