<script>
import Header from '../components/Header.vue'

export default {
    name: 'App',
    components: {
        'app-header': Header,
    }
}
</script>

<template>
    <v-app id="main">
        <app-header></app-header>

        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<style>
.v-main {
    background-color: #E8ECEF;
}
</style>
