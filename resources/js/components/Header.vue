<script>
export default {
    data: () => ({
        tab: null,
    }),
};
</script>

<template>
    <v-app-bar
        class="bg-grey-lighten-5x"
    >
        <v-container>
            <v-row class="d-flex justify-space-between align-center">
                <v-app-bar-title class="ml-4">User CRUD</v-app-bar-title>
                <v-tabs
                    v-model="tab"
                    align-tabs="center"
                    color="blue-darken-3"
                >
                    <v-tab :value="1" link exact :to="{ name: 'home' }">Home</v-tab>
                    <v-tab :value="2" link exact :to="{ name: 'users' }">Users</v-tab>
                </v-tabs>
            </v-row>
        </v-container>
    </v-app-bar>
</template>
