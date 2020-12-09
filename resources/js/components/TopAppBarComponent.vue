<template>
    <v-app-bar class="primary white--text" fixed app clipped-left flat>
        <v-icon class="white--text">mdi-account</v-icon>
        <v-toolbar-title>{{ userName }}</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn v-on:click="logout" icon>
            <v-icon class="white--text">mdi-logout</v-icon>
        </v-btn>
    </v-app-bar>
</template>
<script>
    export default {
        props: {
            userName: {
                type: String,
            },
        },
        methods: {
            logout() {
                axios.post('/logout').then(response => {
                    window.location.href = '/login'
                })
            },
        },
    }
</script>
