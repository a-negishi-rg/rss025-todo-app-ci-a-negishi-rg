<template>
    <div id="app" class="flex flex-col min-h-screen">
        <Header />
        <div class="flex-grow">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>

import Header from './components/Header.vue';

export default {
    name: 'App',
    components: {
        Header, 
    },
};
</script>

<style scoped>
h1 {
    color: #42b983;
}
</style>
