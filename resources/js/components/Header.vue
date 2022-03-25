<template>
    <div>
        <router-link :to="{ name: 'home' }">Home</router-link>
        <router-link :to="{ name: 'about' }">Chi Siamo</router-link>
    </div>
</template>

<script>
export default {
    name: 'Header',

}
</script>

<style scoped>

</style>